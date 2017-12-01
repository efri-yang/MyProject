$(function() {
    //下拉列表插件调用
    dropdownPlugin(".bb-rock-dhway");


    (function() {
        var $add = $("#J_add-num");
        var index;
        $add.on("click", function(event) {
            event.preventDefault();

            index = layer.open({
                type: 1,
                shade: true,
                closeBtn: false,
                shade: [0.8, '#000'],
                shadeClose: true,
                title: false, //不显示标题
                area: ['540px', '574px'],
                content: $('#J_bb-dia-qrcode')
                //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
            });
        });
        $("#J_bb-dia-qrcode .close,#J_bb-dia-qrcode .close-qrcode").on("click", function(event) {
            event.preventDefault();
            layer.close(index);
        })
    })();

    (function() {
        var $gain = $("#J_gain-yb");
        var index;
        $gain.on("click", function(event) {
            event.preventDefault();

            index = layer.open({
                type: 1,
                shade: true,
                closeBtn: false,
                shade: [0.8, '#000'],
                shadeClose: true,
                title: false, //不显示标题
                area: ['540px', '361px'],
                content: $('#J_bb-dia-zyb')
                //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
            });

            $("#J_bb-dia-zyb .close,#J_bb-dia-zyb .close-qrcode").on("click", function(event) {
                event.preventDefault();
                layer.close(index);
            })

        });
    })();



    ;
    (function($, window, document, undefined) {
        var SlideLock = (function() {
            function SlideLock(element, options) {
                this.$element = $(element);
                this.opts = $.extend({}, $.fn.slideLock.defaults, options);
                this._init()
            }
            SlideLock.prototype = {
                _init: function() {
                    var _this = this;
                    this.originLeft = this.$element.offset().left;
                    this.btnW = this.$element.outerWidth();
                    this.slideW = this.$element.parent().outerWidth() - this.btnW;
                    this.isMousedown = false;
                    this.hadSuccess = false;
                    this.stepOpacity = 1 / this.slideW;

                    this.$slideBg = $(this.opts.slideBgId);
                    this.$slideTip = $(this.opts.slideTipId);
                    this.$slideStatu = $(this.opts.slideStatuId);

                    this.$element.on("mousedown", function(event) {
                        _this.isMousedown = true;
                        _this.dx = event.clientX - _this.originLeft;
                    })
                    this.$element.on("mousemove", function(event) {
                        if (!!_this.isMousedown && !_this.hadSuccess) {
                            _this.diffX = event.clientX - _this.originLeft - _this.dx;
                            if (_this.diffX >= _this.slideW) {
                                _this.diffX = _this.slideW;
                            } else if (_this.diffX <= 0) {
                                _this.diffX = 0;
                            }
                            _this._btnMove(_this.diffX);
                            _this._bgMove(_this.diffX + _this.btnW);
                            _this._tipMove(_this.diffX * _this.stepOpacity);
                            _this._statuMove(_this.diffX);
                            Plam.move(_this.diffX);
                            !!_this.opts.mousemove && _this.opts.mousemove.call(_this, _this.diffX);
                        }
                    });
                    this.$element.on("mouseup mouseout", function(event) {
                        event.stopPropagation();
                        _this.isMousedown = false;
                        if (!_this.hadSuccess) {
                            if (_this.diffX >= (_this.slideW / 2)) {
                                _this.diffX = _this.slideW;
                            } else {
                                _this.diffX = 0;
                            }
                        

                            _this._btnMove(_this.diffX, true);
                            _this._bgMove(_this.diffX + _this.btnW, true);
                            _this._tipMove(_this.diffX * _this.stepOpacity);
                            Plam.move(_this.diffX,true);
                        }

                    });

                },
                _btnMove: function(diffX, isAnim) {
                    _this = this;
                    if (!!isAnim) {
                        if (diffX >= _this.slideW && !this.hadSuccess) {
                            this.hadSuccess = true;
                            this.$element.animate({ left: diffX }, 200, function() {
                                !!_this.opts.success && _this.opts.success();
                                _this.$slideStatu.html("祝您好运！")
                            });
                        } else {
                            this.$element.animate({ left: diffX }, 200);
                        }

                    } else {
                        this.$element.css({ "left": diffX });
                    }
                },
                _bgMove: function(diffX, isAnim) {
                    if (!!isAnim) {
                        this.$slideBg.animate({ width: diffX }, 200);

                    } else {
                        this.$slideBg.css({ "width": diffX });
                    }
                },
                _tipMove: function(opacity) {
                    this.$slideTip.css("opacity", 1 - opacity);
                },
                _statuMove: function(diffX) {
                    if (diffX >= this.slideW / 2) {
                        this.$slideStatu.html("松开博起来").fadeIn();
                    } else {
                        this.$slideStatu.html("").fadeOut();
                    }

                },
                reset: function() {

                }
            }
            return SlideLock;
        })();
        $.fn.slideLock = function(options) {
            var self = this;
            return this.each(function() {
                var $this = $(this),
                    instance = $this.data("slidelock");
                if (!instance) {
                    var instance = new SlideLock(this, options);
                    instance._init();
                    $this.data('slidelock', instance);
                }
            })
        };
        $.fn.slideLock.defaults = {
            slideBgId: "#J_slideunlock-bg",
            slideTipId: "#J_slideunlock-lable-tip",
            slideStatuId: "#J_slideunlock-statu",
            success: function() {},
            mousedown: function() {},
            mousemove: function() {}


        }
    })(window.jQuery, window, document);


    //骰子对象
    var Dice = (function() {
        return {
            show: function(dices) {
                var str = this._render(dices);
                $("#J_bowl-box").html(str);
                $("#J_jp-play-rock").trigger("click");
                $(".bowl-box .loaded").hide();
                
            },
            _render: function(dices) {
                var strArr = [];
                for (var i = 0; i < dices.length; i++) {
                    var num = i + 1;
                    strArr.push('<span class="dice active dice' + num + '"><img src="images/dices' + dices[i] + '.png"/></span>');
                }
                return strArr.join("");
            }
        }
    })();

    //声音
    var VoiceTip=function(rank){
        switch(rank){
            case 6 :
                $("#J_jp-play6").trigger("click");
                break;
            case 5 :
                $("#J_jp-play5").trigger("click");
                break;
            case 4 :
                $("#J_jp-play4").trigger("click");
                break;
            case 3:
                $("#J_jp-play3").trigger("click");
                break;
            case 2:
                $("#J_jp-play2").trigger("click");
                break;
            case 1:
                $("#J_jp-play1").trigger("click");
                break;
            case 0:
                $("#J_jp-play0").trigger("click");
                break;
        }
    }

    //手掌对象
    var Plam = (function() {
        var initTop = -207,
            Timer,
            countStep = 0;
        initLeft = -333;
        return {
            $elem: $("#J_plam"),

            move: function(index,isAnim) {
                var _this = this,
                    posTop = index * ((207 + 25) / 254),
                    posLeft = index * ((380 + 80) / 254);
                    if(!isAnim){
                        _this.$elem.css({ left: initLeft + posLeft, top: initTop + posTop });
                     }else{
                        _this.$elem.animate({ left: initLeft + posLeft, top: initTop + posTop },200);
                     }
               
            },
            open: function() {
                var _this = this;
                this.$elem.removeClass('swing').addClass('open');
                setTimeout(function() {
                    _this.close();
                }, 100)
            },
            close: function() {
                var _this = this;
                _this.$elem.animate({ left: initLeft, top: initTop }, 250, function() {
                    _this.$elem.removeClass('open');
                });
            },
            rotating: function() {

                this.$elem.addClass('swing');

            }
        }
    })();
    //博饼动画
    var moonCake = (function() {

        return {
            slider: "",
            //拖拽到最右边的时候
            dropEnd: function() {
                var _this = this;
                $.ajax({
                    url: 'http://wnworld.com/BoBingGongJu/pc/php/bbgj.php',
                    type: "post",
                    dataType: "json",
                    beforeSend: function() {
                        Plam.rotating();
                    },
                    success: function(data) {
                        var data={"dices":[5,6,3,5,4,3],"score":8,"titles":"\u72b6\u5143\u63d2\u91d1\u82b1","rank":6}
                        Plam.open();
                        // if (Math.random() < 0.5) { //假设没有次数的时候

                        // }
                        // console.dir(data.dices);
                        Dice.show(data.dices);
                        if ($.supportCSS3("transform")) {
                            $("#J_bowl-box .dice").eq(0).animationEnd(function() {
                                $(".bb-rock-result").html(data.titles + " +" + data.score + "博饼分!").fadeIn();
                                VoiceTip(data.rank);

                            })
                        } else {
                            $(".bb-rock-result").html(data.titles + " +" + data.score + "博饼分!").fadeIn();
                            VoiceTip(data.rank);
                        }
                        $("#J_slideunlock-btn2").removeAttr("disabled")

                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.dir(XMLHttpRequest.status);
                        console.dir(XMLHttpRequest.readyState);
                        console.dir(textStatus);
                    }


                })






            }
        }
    })();






    (function() {
        $(function() {
             

            

            $("#J_slideunlock-btn1").slideLock({
                success: function() {
                    moonCake.dropEnd();
                }
            });

            $("#J_slideunlock-btn2").on("click",function(){
                    $("#J_bowl-box").html("");
                    $(".bb-rock-result").hide();
                    $(".bowl-box .loaded").fadeIn();
                    $(this).attr("disabled","disabled");
                    moonCake.dropEnd();

                    
            })

            // var $slideunlockBg = $("#J_slideunlock-bg");

            // var slider = moonCake.slider = new SliderUnlock(".slideunlock-slider", {
            //     labelTip: "向右拖拽",
            //     successLabelTip: "博饼开始，祝你好运！",
            //     handInCallBack:function(){
            //         $("#J_bowl-box").html("");
            //         $(".bb-rock-result").hide();
            //     }
            // }, function() {
            //     //拖拽成功后执行下面的函数
            //     moonCake.dropEnd();
            // }, function() {
            //     Plam.move(slider.index);
            // });
            // slider.init();
        })
    })();

    $(function(){
            $("#jquery_jplayer_0").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        m4a: "./js/jplayer/audio0.mp3"
                    });
                },
                cssSelectorAncestor: "#jp_container_0",
                swfPath: "./js/jplayer",
                supplied: "m4a, oga",
                wmode: "window",
                useStateClassSkin: true,
                autoBlur: false,
                smoothPlayBar: true,
                keyEnabled: true,
                remainingDuration: true,
                toggleDuration: true
            });

            $("#jquery_jplayer_1").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        m4a: "./js/jplayer/audio1.mp3"
                    });
                },
                cssSelectorAncestor: "#jp_container_1",
                swfPath: "./js/jplayer",
                supplied: "m4a, oga",
                wmode: "window",
                useStateClassSkin: true,
                autoBlur: false,
                smoothPlayBar: true,
                keyEnabled: true,
                remainingDuration: true,
                toggleDuration: true
            });

            $("#jquery_jplayer_2").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        m4a: "./js/jplayer/audio2.mp3"
                    });
                },
                cssSelectorAncestor: "#jp_container_2",
                swfPath: "./js/jplayer",
                supplied: "m4a, oga",
                wmode: "window",
                useStateClassSkin: true,
                autoBlur: false,
                smoothPlayBar: true,
                keyEnabled: true,
                remainingDuration: true,
                toggleDuration: true
            });

            $("#jquery_jplayer_3").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        m4a: "./js/jplayer/audio3.mp3"
                    });
                },
                cssSelectorAncestor: "#jp_container_3",
                swfPath: "./js/jplayer",
                supplied: "m4a, oga",
                wmode: "window",
                useStateClassSkin: true,
                autoBlur: false,
                smoothPlayBar: true,
                keyEnabled: true,
                remainingDuration: true,
                toggleDuration: true
            });
            $("#jquery_jplayer_4").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        m4a: "./js/jplayer/audio4.mp3"
                    });
                },
                cssSelectorAncestor: "#jp_container_4",
                swfPath: "./js/jplayer",
                supplied: "m4a, oga",
                wmode: "window",
                useStateClassSkin: true,
                autoBlur: false,
                smoothPlayBar: true,
                keyEnabled: true,
                remainingDuration: true,
                toggleDuration: true
            });
            $("#jquery_jplayer_5").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        m4a: "./js/jplayer/audio5.mp3"
                    });
                },
                cssSelectorAncestor: "#jp_container_5",
                swfPath: "./js/jplayer",
                supplied: "m4a, oga",
                wmode: "window",
                useStateClassSkin: true,
                autoBlur: false,
                smoothPlayBar: true,
                keyEnabled: true,
                remainingDuration: true,
                toggleDuration: true
            });

            $("#jquery_jplayer_6").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        m4a: "./js/jplayer/audio6.mp3"
                    });
                },
                cssSelectorAncestor: "#jp_container_6",
                swfPath: "./js/jplayer",
                supplied: "m4a, oga",
                wmode: "window"
            });

            $("#jquery_jplayer_rock").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        m4a: "./js/jplayer/audiott.mp3"
                    });
                },
                cssSelectorAncestor: "#jp_container_rock",
                swfPath: "./js/jplayer",
                supplied: "m4a, oga",
                wmode: "window",
                useStateClassSkin: true,
                autoBlur: false,
                smoothPlayBar: true,
                keyEnabled: true,
                remainingDuration: true,
                toggleDuration: true
            });
    })



})