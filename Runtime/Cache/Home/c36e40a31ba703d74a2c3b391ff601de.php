<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>小说</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" type="text/css" href="/Public/css/Autocomplete.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/Button.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/pact.css" />
</head>

<body>
<!--主体-->
<div class="wrap">

    <!--头部-->
    <div class="top-nav" data-l1="1">
        <div class="box-center cf">
            <!--登录注册框-->
            <div class="login-box fr">
                <?php if(($user_name != '')): ?><div class="sign-in">
                        <span>你好，<?php echo ($user_name); ?></span>
                        <a class="black" id="user-name" href="//me.qidian.com" target="_blank" data-eid="qd_A08"></a>
                        <em>|</em>
                        <a class="black" id="msg-btn" href="<?php echo U('HomePage/personalshow');?>" target="" data-eid="qd_A09">
                            消息<cite id="msg-box">(<i>99</i>)</cite></a><em>|</em>
                        <a id="exit-btn" href="<?php echo U('Login/logout');?>" data-eid="qd_A10">退出</a>
                    </div>
                    <?php else: ?>
                    <div class="sign-out">
                        <a id="login-btn" class="black" href="javascript:" data-eid="qd_A06">登录</a>
                        <em>|</em>
                        <a id="reg-btn" href="<?php echo U('Register/register');?>" target="_blank" data-eid="qd_A07">注册</a>
                    </div><?php endif; ?>
                <!--<div class="sign-in">-->
                    <!--<span>你好，<?php echo ($user_name); ?></span>-->
                    <!--<a class="black" id="user-name" href="//me.qidian.com" target="_blank" data-eid="qd_A08"></a>-->
                    <!--<em>|</em>-->
                    <!--<a class="black" id="msg-btn" href="//me.qidian.com/msg/systems.aspx?page=1" target="_blank" data-eid="qd_A09">-->
                        <!--消息<cite id="msg-box">(<i></i>)</cite></a><em>|</em>-->
                    <!--<a id="exit-btn" href="javascript:" data-eid="qd_A10">退出</a>-->
                <!--</div>-->
            </div>
            <!--登录注册框-->
        </div>
    </div>
    <!--头部-->

<!--导航-->
<div class="main-nav-wrap" data-l1="3">
    <div class="main-nav box-center cf">
        <ul>
            <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?><li class="nav-li"><a href="<?php echo U('HomePage/categoryshow',array('category_id'=>$category[id]));?>" data-eid="qd_A15"><?php echo ($category["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <!--<li class="nav-li"><a href="<?php echo U('HomePage/categoryshow');?>" data-eid="qd_A15">都市</a></li>-->
            <!--<li class="nav-li"><a href="" data-eid="qd_A16">灵异</a></li>-->
            <!--<li class="nav-li"><a href="" data-eid="qd_A17">武侠</a></li>-->
            <!--<li class="nav-li"><a href="" data-eid="qd_A18">仙侠</a></li>-->
            <li class="nav-li"><a href="<?php echo U('HomePage/forumshow');?>" target="_blank" data-eid="qd_A19">论坛</a></li>
        </ul>
    </div>
</div>
<!--导航-->
<link rel="stylesheet" type="text/css" href="/Public/css/view.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/forum.css" />

    <!--start论坛-->
    <div class="box-center">
        <div class="wp">
            <div class="bm cl" id="pt">
                <div class="z">
                    <a href="">HOME</a>
                    <em>›</em>
                    <a href="">论坛</a>
                    <em>›</em>
                    <a href=""><?php echo ($forum["category_name"]); ?></a>
                    <em>›</em>
                    <a href=""><?php echo ($forum["forum_name"]); ?></a>
                </div>
            </div>
            <form action="<?php echo U('Forums/editReplays');?>" method="post">
                <div class="ct2_a ct2_a_r wp cl" id="ct">
                    <div class="bm bw0 cl" id="editorbox">
                        <div id="postbox">
                            <div class="pbt cl">
                                <div class="z">
                                        <span class="z">
                                            RE: <?php echo ($replay["r_content"]); ?>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="edt">
                        <input type="hidden" name="replay_id" value="<?php echo ($replay["id"]); ?>">
                        <input type="hidden" name="forum_id" value="<?php echo ($forum["forum_id"]); ?>">
                        <textarea name="r_content" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mtm mbm pnpost">
                        <button type="submit" id="postsubmit" class="pn pnc" value="true" name="replysubmit">
                            <span>参与/回复主题</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--页脚-->
<div class="footer">
    <!--start 友情链接-->
    <div class="box-center cf">
        <!--start 版权-->
        <div class="copy-right">
            <p><span>Copyright © 2002-2017 All Right Reserved</span>版权所有 xxxxxxx</p>
            <p>本站所收录作品、社区话题、书库评论及本站所做之广告均属个人行为，与本站立场无关</p>
        </div>
        <!--end 版权-->
    </div>
</div>
<!--页脚-->
</div>
<!--登录遮罩-->
<!--<div class="mask"></div>-->
<div class="qdlogin-wrap hidden">
    <div class="login-wrap fl">
        <a class="close" id="close" href="javascript:"><em class="iconfont">X</em></a>

        <div class="login-tab cf" id="j_loginTab">
            <ul>
                <li class="lang act stat" tab="qidian" data-stat="qd_L01|账号登录|1">帐号登录</li>
            </ul>
        </div>

        <!-- start 登录切换容器 -->
        <div class="login-switch-wrap" id="j_loginSwitchWrap">
            <!-- start 起点登录 -->
            <div class="qd-login login-box " style="display: block;">

                <!-- start 普通登录 -->
                <div class="normal-login" id="j_normalLogin">
                    <div class="error-tip hidden"></div>
                    <ul>
                        <li>
                            <em class="iconfont"></em>
                            <input type="text" tabindex="1" placeholder="请输入邮箱" id="email" autocomplete="off">
                        </li>
                        <li>
                            <em class="iconfont"></em>
                            <input type="password" tabindex="2" id="password" placeholder="密码" autocomplete="off">
                        </li>
                    </ul>
                    <div class="auto-login-box cf">
                        <div class="link fr">
                            <a href="<?php echo U('Register/register');?>" target="_blank" id="regQd">免费注册</a>
                        </div>
                        <input type="checkbox" id="autologin" tabindex="3" name="checkbox" checked="checked">
                        <label for="autologin" class="ui-checkbox stat" data-stat="qd_L04|勾选自动登录|2" data-off-stat="qd_L05|取消自动登录|2"></label>
                        <label for="autologin">自动登录</label>
                    </div>
                    <a class="red-btn go-login btnLogin" tabindex="4" href="javascript:">登 录</a>
                </div>
                <!-- end 普通登录 -->

            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/Public/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="/Public/js/common.js"></script>
</body>

</html>