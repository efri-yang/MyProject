<style lang="scss">
@import '../assets/scss/_functions';
.content-container {
    border: 1px solid #cfcfcf;
    background: #fff;
    padding: 15px 20px;
    margin-bottom: 30px;
    margin: 30px 20px 0;
}
.dp-tit {
    color: #333;
    font-size: 48px;
    font-weight: normal;
}

.dp-bar {
    color: #999;
    margin-top: 5px;
    padding-bottom: 2px;
    border-bottom: 1px solid #dedede;
}

.dp-bar a {
    color: #999;
}

.dp-bar span {
    font-size: 28px;
    margin-right: 20px;
}

.dp-bar a:hover {
    text-decoration: underline;
}

.dp-bar i {
    margin-right: 5px;
    vertical-align: middle;
}

.dp-bar .discuss {
    margin-right: 0;
    float: right;
}

.dp-content {
    padding: 25px 10px 10px;
    font-size: 34px;
    color: #2b2b2b;
    line-height: 1.5;
    word-wrap: break-all;
    word-break: break-all;
    overflow: hidden;
}

.dp-content img {
    width: auto;
    max-width: 100% !important;
}

.dp-content p {
    margin-bottom: 15px;
}

.dp-content .tit-1 {
    font-size: 36px;
    font-weight: bold;
}

.dp-content .tit-2 {
    margin-bottom: 5px;
    font-size: 16px;
    text-indent: 2rem;
    font-weight: bold;
}

.dp-content .con-1 {
    text-indent: 2rem;
}

.dp-content .con-2 {
    text-indent: 4rem;
}

.dp-content .dp-table {
    border: 1px solid #e5e5e5;
    width: 100%;
    overflow: hidden;
    table-layout: fixed;
    word-break: break-all;
    word-wrap: break-word
}

.dp-content .dp-table th,
.dp-table td {
    border: 1px solid #e5e5e5;
    padding: 5px;
    text-align: center;
}

.dp-content .dp-table th {
    background: #eeeeee;
}

.dp-content .dp-table .td-left {
    text-align: left;
    padding-left: 10px;
}

.dp-runcodetextarea {
    border: 1px solid #dedede;
    width: 98%;
    margin-bottom: 5px;
    min-height: 230px;
    padding: 10px 0 10px 2%;
    color: #666;
}

.dp-share {
    text-align: right;
}

.dp-share-detail {
    display: inline-block;
    font-size: 0;
    min-width: 155px
}

.dp-dir {
    padding: 15px 0 0;
    border-top: 1px solid #dedede;
}

.dp-dir p {
    line-height: 25px;
    color: #666;
}

.dp-dir p a {}

.dp-dir p a:hover {
    text-decoration: underline;
}

.dp-comment {
    border-top: 1px solid #dedede;
}

.dp-comment {
    margin: 20px 0 15px;
    border: 1px solid #cfcfcf;
    background: #fff;
    padding: 15px 20px;
}

.dp-readnum b {
    padding: 0 2px;
    font-size: 14px;
    font-family: Georgia;
    color: #e96363;
    font-weight: normal
}
.dp-exampleBtn {
    margin-bottom: 10px;
}

.dp-exampleBtn a {
    margin: 0 5px;
}

.dp-exampleBtn-l {
    text-align: left;
}

.dp-exampleBtn-c {
    text-align: center;
}

.dp-exampleBtn-r {
    text-align: right;
}

.dp-exampleBtn a {
    margin-bottom: 10px;
    color: #fff;
}


/**
 * 详细页syntaxhighlighter的样式
 */

.syntaxhighlighter {
    margin-top: 0 !important;
}

.syntaxhighlighter .gutter,
.syntaxhighlighter .code {
    padding: 15px 0 !important;
}

.bdshare-button-style0-24 .bds_more {
    display: none;
}

</style>
<template>
	<div class="page-box page-detail">
        <HeaderInside :headTitle="title"></HeaderInside>
        <div class="content-container">
        	<h1 class="dp-tit">{{articleData.post_title}}</h1>
        	<div class="dp-bar">
                    <span><i class="iconfont icon-time"></i>{{articleData.post_date}}</span>
                    <span><i class="iconfont icon-icon-admin"></i>{{articleData.author}}</span>
                    <!-- <span class="dp-readnum"><b>14</b>人已阅读</span> -->
            </div>
            <div class="dp-content" v-html="articleData.post_content">
            </div>
            <div class="dp-share  clearfix">
                    <div class="dp-share-detail">
                        <!-- 百度分享 start -->
                        <div class="bdsharebuttonbox bdshare-button-style0-24" data-bd-bind="1449408086689">
                            <a href="#" class="bds_more" data-cmd="more"></a>
                            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                            <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                            <a href="#" class="bds_ty" data-cmd="ty" title="分享到天涯社区"></a>
                        </div>
                    </div>
            </div>
        </div>
       
    </div>
</template>
<script>
	import HeaderInside from './HeaderInside';
    import "../assets/lib/syntaxhighlighter3/styles/shCore.css";
    import "../assets/lib/syntaxhighlighter3/styles/shCoreFadeToGrey.css";

	export default {
		data(){
			return {
				articleData:"",
				title:""
			}
		},
        watch:{
            '$route'(to,from){
                console.group('detailpage:watch-route 创建前状态===============》');
                console.dir('detailpage watch-$route to:'+to.path+", from:"+from.path);
                if(to.name=="detailpage"){

                }
                
            }
        },
        methods:{
            
        },
        beforeCreate(){
            console.group('beforeCreate 创建前状态===============》');

        },
		created(){
            console.group('created 创建完毕状态===============》');
			var _this=this;
            // this.$store.dispatch('toggleLoading',true)
			this.$http.post("/api/wnForVueGetDetail.php",{id:_this.$route.params.id},{emulateJSON:true}).then(response=>{
				// console.dir(response.body)
				this.articleData=response.body[0];
                // this.$store.dispatch('toggleLoading',false)
			})
            window.scroll(0,0)
		},
        beforeMount(){
            console.group('beforeMount 挂载前状态===============》');
        },
        mounted(){
            console.group('mounted 挂载前状态===============》');
            setTimeout(function(){
                SyntaxHighlighter.highlight();
            },500)
            window._bd_share_config = {
                "common": {
                    "bdSnsKey": {},
                    "bdText": "",
                    "bdMini": "2",
                    "bdMiniList": [],
                    "bdPic": "",
                    "bdStyle": "0",
                    "bdSize": "24"
                },
                "share": {},
                "image": {
                    "viewList": ["weixin", "tsina", "qzone", "sqq", "ty"],
                    "viewText": "分享到：",
                    "viewSize": "16"
                }
            };
            document.getElementsByTagName('head')[0].appendChild(document.createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5);
        },
        beforeUpdate(){
            console.group('beforeUpdate 更新前状态===============》');
            console.log(this.$el);
        },
        updated(){
            console.group('updated 更新完成状态===============》');
            console.log(this.$el);
        },
        beforeDestroy: function () {
            console.group('beforeDestroy 销毁前状态===============》');
            console.log(this.$el);
        },
        destroyed: function () {
            console.group('destroyed 销毁完成状态===============》');
            console.log(this.$el);
        },
        activated:function(){
            console.group('activated keep-alive切入到该组件状态(detailpage)===============》');
            window.scroll(0,0)
        },
        deactivated:function(){
            console.group('deactivated keep-alive切出该组件状态(detailpage))===============》');
        },
		components: {
			HeaderInside
		}
	}


</script>