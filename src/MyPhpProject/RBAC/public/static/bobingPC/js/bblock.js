$(function(){dropdownPlugin(".bb-rock-dhway"),function(){var e,t=$("#J_add-num");t.on("click",function(t){t.preventDefault(),e=layer.open({type:1,shade:!0,closeBtn:!1,shade:[.8,"#000"],shadeClose:!0,title:!1,area:["540px","574px"],content:$("#J_bb-dia-qrcode")})}),$("#J_bb-dia-qrcode .close,#J_bb-dia-qrcode .close-qrcode").on("click",function(t){t.preventDefault(),layer.close(e)})}(),function(){var e,t=$("#J_gain-yb");t.on("click",function(t){t.preventDefault(),e=layer.open({type:1,shade:!0,closeBtn:!1,shade:[.8,"#000"],shadeClose:!0,title:!1,area:["540px","361px"],content:$("#J_bb-dia-zyb")}),$("#J_bb-dia-zyb .close,#J_bb-dia-zyb .close-qrcode").on("click",function(t){t.preventDefault(),layer.close(e)})})}(),function(e,t,s,o){var n=function(){function t(t,i){this.$element=e(t),this.opts=e.extend({},e.fn.slideLock.defaults,i),this._init()}return t.prototype={_init:function(){var t=this;this.originLeft=this.$element.offset().left,this.btnW=this.$element.outerWidth(),this.slideW=this.$element.parent().outerWidth()-this.btnW,this.isMousedown=!1,this.hadSuccess=!1,this.stepOpacity=1/this.slideW,this.$slideBg=e(this.opts.slideBgId),this.$slideTip=e(this.opts.slideTipId),this.$slideStatu=e(this.opts.slideStatuId),this.$element.on("mousedown",function(e){t.isMousedown=!0,t.dx=e.clientX-t.originLeft}),this.$element.on("mousemove",function(e){t.isMousedown&&!t.hadSuccess&&(t.diffX=e.clientX-t.originLeft-t.dx,t.diffX>=t.slideW?t.diffX=t.slideW:t.diffX<=0&&(t.diffX=0),t._btnMove(t.diffX),t._bgMove(t.diffX+t.btnW),t._tipMove(t.diffX*t.stepOpacity),t._statuMove(t.diffX),i.move(t.diffX),!!t.opts.mousemove&&t.opts.mousemove.call(t,t.diffX))}),this.$element.on("mouseup mouseout",function(e){e.stopPropagation(),t.isMousedown=!1,t.hadSuccess||(t.diffX>=t.slideW/2?t.diffX=t.slideW:t.diffX=0,t._btnMove(t.diffX,!0),t._bgMove(t.diffX+t.btnW,!0),t._tipMove(t.diffX*t.stepOpacity),i.move(t.diffX,!0))})},_btnMove:function(e,t){_this=this,t?e>=_this.slideW&&!this.hadSuccess?(this.hadSuccess=!0,this.$element.animate({left:e},200,function(){!!_this.opts.success&&_this.opts.success(),_this.$slideStatu.html("祝您好运！")})):this.$element.animate({left:e},200):this.$element.css({left:e})},_bgMove:function(e,t){t?this.$slideBg.animate({width:e},200):this.$slideBg.css({width:e})},_tipMove:function(e){this.$slideTip.css("opacity",1-e)},_statuMove:function(e){e>=this.slideW/2?this.$slideStatu.html("松开博起来").fadeIn():this.$slideStatu.html("").fadeOut()},reset:function(){}},t}();e.fn.slideLock=function(t){return this.each(function(){var i=e(this),s=i.data("slidelock");if(!s){var s=new n(this,t);s._init(),i.data("slidelock",s)}})},e.fn.slideLock.defaults={slideBgId:"#J_slideunlock-bg",slideTipId:"#J_slideunlock-lable-tip",slideStatuId:"#J_slideunlock-statu",success:function(){},mousedown:function(){},mousemove:function(){}}}(window.jQuery,window,document);var e=function(){return{show:function(e){var t=this._render(e);$("#J_bowl-box").html(t),$("#J_jp-play-rock").trigger("click"),$(".bowl-box .loaded").hide()},_render:function(e){for(var t=[],i=0;i<e.length;i++){var s=i+1;t.push('<span class="dice active dice'+s+'"><img src="images/dices'+e[i]+'.png"/></span>')}return t.join("")}}}(),t=function(e){switch(e){case 6:$("#J_jp-play6").trigger("click");break;case 5:$("#J_jp-play5").trigger("click");break;case 4:$("#J_jp-play4").trigger("click");break;case 3:$("#J_jp-play3").trigger("click");break;case 2:$("#J_jp-play2").trigger("click");break;case 1:$("#J_jp-play1").trigger("click");break;case 0:$("#J_jp-play0").trigger("click")}},i=function(){return initLeft=-333,{$elem:$("#J_plam"),move:function(e,t){var i=this,s=e*(232/254),o=e*(460/254);t?i.$elem.animate({left:initLeft+o,top:-207+s},200):i.$elem.css({left:initLeft+o,top:-207+s})},open:function(){var e=this;this.$elem.removeClass("swing").addClass("open"),setTimeout(function(){e.close()},100)},close:function(){var e=this;e.$elem.animate({left:initLeft,top:-207},250,function(){e.$elem.removeClass("open")})},rotating:function(){this.$elem.addClass("swing")}}}(),s=function(){return{slider:"",dropEnd:function(){$.ajax({url:"http://wnworld.com/BoBingGongJu/pc/php/bbgj.php",type:"post",dataType:"json",beforeSend:function(){i.rotating()},success:function(s){var s={dices:[5,6,3,5,4,3],score:8,titles:"状元插金花",rank:6};i.open(),e.show(s.dices),$.supportCSS3("transform")?$("#J_bowl-box .dice").eq(0).animationEnd(function(){$(".bb-rock-result").html(s.titles+" +"+s.score+"博饼分!").fadeIn(),t(s.rank)}):($(".bb-rock-result").html(s.titles+" +"+s.score+"博饼分!").fadeIn(),t(s.rank)),$("#J_slideunlock-btn2").removeAttr("disabled")},error:function(e,t,i){console.dir(e.status),console.dir(e.readyState),console.dir(t)}})}}}();!function(){$(function(){$("#J_slideunlock-btn1").slideLock({success:function(){s.dropEnd()}}),$("#J_slideunlock-btn2").on("click",function(){$("#J_bowl-box").html(""),$(".bb-rock-result").hide(),$(".bowl-box .loaded").fadeIn(),$(this).attr("disabled","disabled"),s.dropEnd()})})}(),$(function(){$("#jquery_jplayer_0").jPlayer({ready:function(e){$(this).jPlayer("setMedia",{m4a:"./js/jplayer/audio0.mp3"})},cssSelectorAncestor:"#jp_container_0",swfPath:"./js/jplayer",supplied:"m4a, oga",wmode:"window",useStateClassSkin:!0,autoBlur:!1,smoothPlayBar:!0,keyEnabled:!0,remainingDuration:!0,toggleDuration:!0}),$("#jquery_jplayer_1").jPlayer({ready:function(e){$(this).jPlayer("setMedia",{m4a:"./js/jplayer/audio1.mp3"})},cssSelectorAncestor:"#jp_container_1",swfPath:"./js/jplayer",supplied:"m4a, oga",wmode:"window",useStateClassSkin:!0,autoBlur:!1,smoothPlayBar:!0,keyEnabled:!0,remainingDuration:!0,toggleDuration:!0}),$("#jquery_jplayer_2").jPlayer({ready:function(e){$(this).jPlayer("setMedia",{m4a:"./js/jplayer/audio2.mp3"})},cssSelectorAncestor:"#jp_container_2",swfPath:"./js/jplayer",supplied:"m4a, oga",wmode:"window",useStateClassSkin:!0,autoBlur:!1,smoothPlayBar:!0,keyEnabled:!0,remainingDuration:!0,toggleDuration:!0}),$("#jquery_jplayer_3").jPlayer({ready:function(e){$(this).jPlayer("setMedia",{m4a:"./js/jplayer/audio3.mp3"})},cssSelectorAncestor:"#jp_container_3",swfPath:"./js/jplayer",supplied:"m4a, oga",wmode:"window",useStateClassSkin:!0,autoBlur:!1,smoothPlayBar:!0,keyEnabled:!0,remainingDuration:!0,toggleDuration:!0}),$("#jquery_jplayer_4").jPlayer({ready:function(e){$(this).jPlayer("setMedia",{m4a:"./js/jplayer/audio4.mp3"})},cssSelectorAncestor:"#jp_container_4",swfPath:"./js/jplayer",supplied:"m4a, oga",wmode:"window",useStateClassSkin:!0,autoBlur:!1,smoothPlayBar:!0,keyEnabled:!0,remainingDuration:!0,toggleDuration:!0}),$("#jquery_jplayer_5").jPlayer({ready:function(e){$(this).jPlayer("setMedia",{m4a:"./js/jplayer/audio5.mp3"})},cssSelectorAncestor:"#jp_container_5",swfPath:"./js/jplayer",supplied:"m4a, oga",wmode:"window",useStateClassSkin:!0,autoBlur:!1,smoothPlayBar:!0,keyEnabled:!0,remainingDuration:!0,toggleDuration:!0}),$("#jquery_jplayer_6").jPlayer({ready:function(e){$(this).jPlayer("setMedia",{m4a:"./js/jplayer/audio6.mp3"})},cssSelectorAncestor:"#jp_container_6",swfPath:"./js/jplayer",supplied:"m4a, oga",wmode:"window"}),$("#jquery_jplayer_rock").jPlayer({ready:function(e){$(this).jPlayer("setMedia",{m4a:"./js/jplayer/audiott.mp3"})},cssSelectorAncestor:"#jp_container_rock",swfPath:"./js/jplayer",supplied:"m4a, oga",wmode:"window",useStateClassSkin:!0,autoBlur:!1,smoothPlayBar:!0,keyEnabled:!0,remainingDuration:!0,toggleDuration:!0})})});