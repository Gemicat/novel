<?php
/**
 * Created by PhpStorm.
 * User: songjian
 * Date: 17/2/28
 * Time: 下午11:59
 */

namespace Admin\Controller;


use Think\Controller;

class CategoryController extends Controller
{
    public function categoriesList()
    {
        if (session('user_name') != 'admin') {
            redirect(U('Login/loginShow'));
        }
        $this->assign('user_name',session('user_name'));
        $categories = M('Categories')->select();
        $this->assign('categories',$categories);
        $this->display();
    }

    public function delCategory()
    {
        $id = I('get.id',0,'intval');
        if (!$id) {
            $this->error('无效的id号');
        }
        $this->assign('user_name',session('user_name'));
        M('Categories')->where("id = $id")->delete();
        $this->success('删除成功');
    }

    public function updateCategory()
    {
        $this->assign('user_name',session('user_name'));
        $id = I('get.id',0,'intval');
        $category = M('Categories')->find($id);
        $books = M('Books')->where("category_id = $id")->select();
        $this->assign('books',$books);
        $this->assign('category',$category);
        $this->display();

    }

    public function saveCategory()
    {
        if (session('user_name') != 'admin') {
            redirect(U('Login/loginShow'));
        }
        $this->assign('user_name',session('user_name'));
        if (IS_POST) {
            $id = I('post.id',0,'intval');
            $name = I('post.name','','addslashes');
            $des = I('post.description','','addslashes');
            $categories = M('Categories');
            if ($id) {
                if ($name) {
                    $categories->name = $name;
                }
                if ($des) {
                    $categories->description = $des;
                }
                $categories->where("id = $id")->save();
                $recommend = I('post.recommend','','addslashes');
                $ids = '('.implode(',',$recommend).')';
                $books = M('Books');
                $books->where("category_id = $id")->setField('is_recommend',0);
                $books->where("id in $ids")->setField('is_recommend',1);
                $this->success('更新成功');
            } else {
                if (!$data = $categories->create()) {
                    $categories->getError();
                }else{
                    $categories->add($data);
                    $this->success('创建成功');
                }

            }
        }
    }

    public function categoriesNew()
    {
        if (session('user_name') != 'admin') {
            redirect(U('Login/loginShow'));
        }
        $this->assign('user_name',session('user_name'));
        $this->display();
    }

    public function forumslist()
    {
        if (session('user_name') != 'admin') {
            redirect(U('Login/loginShow'));
        }
        $pa = I('get.p',1,'intval');
        $this->assign('user_name',session('user_name'));
        $books = M('Forums b');
        $book = $books->join("left join categories c on c.id = b.category_id")
            ->field("c.id as c_id,c.name as c_name,b.*")->order('b.created_at desc')
            ->page($pa.',5')->select();
        $count = $books->count();
        $Page = new \Think\Page($count,5);
        $show = $Page->show();
        $this->assign('page',$show);
        $this->assign('books',$book);
        $this->display();
    }

    public function forumsDel()
    {
        if (session('user_name') != 'admin') {
            redirect(U('Login/loginShow'));
        }
        $id = I('get.id',0,'intval');
        if ($id == 0) {
            $this->error('无效的id');
        }
        $forum = M('Forums');
        $forum->where("id = $id")->delete();
        $this->success('删除成功');
    }
}