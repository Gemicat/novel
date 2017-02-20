$(function () {
    var commonFunc = function () {
        this.init();
    };

    commonFunc.prototype = {
        init: function () {
            var that = this;

            that.initHtml();
            that.bindEvents();
        },

        // 事件绑定
        bindEvents: function () {
            var that = this;
            var $body = $('body');

            $body.on('click', '#login-btn', $.proxy(that.showPCLogin, that))
                .on('click', '#close', $.proxy(that.cancelLogin, that))
                .on('click', '.btnLogin', $.proxy(that.goLogin, that))
                .on('click', '.J-go-top', $.proxy(that.goTop, that)) // 回到顶部按钮
                .on('click', '.theme_nav_list', $.proxy(that.changeTag, that))
                .on('click', '#sendCodeBtn', $.proxy(that.sendCode, that))

        },

        // 页面初始化
        initHtml: function () {
            var signIn = $('.sign-in').length;

            if (signIn) {

                setInterval(function () {
                    $.ajax({
                        url: '/index.php?m=Home&c=Forums&a=messageNum',
                        type: 'get',
                        dataType: 'json',
                        success: function (res) {

                            if (res.success) {
                                var num = res.data.count || 0;
                                $('#msg-btn').find('i').text(num);
                            } else {
                                console.log(res.message);
                            }
                        }
                    })
                }, 30000);
            }
        },
        /**
         * 回到顶部
         */
        goTop: function () {
            $("body,html").animate({
                scrollTop: 0
            });
        },

        /**
         * 发送验证码
         */
        sendCode: function () {
            var mail = $('#txtemail').val().trim();

            if (mail) {
                $.ajax({
                    url: '123',
                    type: 'get',
                    data: {
                        mail: mail
                    },
                    success: function (res) {

                    }
                })
            };
        },

        // 登录方法
        showPCLogin: function () {
            var $body = $("body");

            if ($(".mask")) {
                $(".mask").remove()
            }
            $('.qdlogin-wrap').show();
            $body.append('<div class="mask"></div>');
        },

        // 取消登录
        cancelLogin: function () {
            $(".mask").remove();
            $('.qdlogin-wrap').hide();
        },

        // 提交登录信息
        goLogin: function(e) {
            e.stopPropagation();
            var curTarget = $(e.currentTarget);
            var form = curTarget.parents('#j_loginSwitchWrap');
            $.ajax({
                url: '/index.php?m=Home&c=Login&a=login',
                type: 'post',
                data: {
                    email: form.find('input#email').val().trim(),
                    password: form.find('input#password').val().trim()
                },
                success: function(data) {
                    var r_data = JSON.parse(data);
                    if (r_data && r_data.success) {
                        location.href = r_data.url
                    }
                }
            })
        },

        // 切换
        changeTag: function (e) {
            e.stopPropagation();
            var curTarget = $(e.currentTarget);
            var index = curTarget.index();

            $('.theme_nav_list').removeClass('current');
            $('.theme_con_index').removeClass('current');
            $('.theme_nav_list').eq(index).addClass('current');
            $('.theme_con_index').eq(index).addClass('current');
        }
    }

    var cf = new commonFunc();
})