<style lang="scss">
@import '../assets/scss/_functions';
.content-container {
    border: 1px solid #cfcfcf;
    background: #fff;
    padding: 15px 20px;
    margin:px2rem(110px) 20px 20px;
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
            '$route' (to, from) {
                this.articleData="";
                if(to.name=="detailpage"){
                   this.getData();
                }  
            }
        },
        methods:{
            getData(){
                var _this=this;
                this.$store.dispatch('toggleLoading',true)
                this.$http.post("/api/wnForVueGetDetail.php",{id:_this.$route.params.id},{emulateJSON:true}).then(response=>{
                    this.articleData=response.body[0];
                    this.$store.dispatch('toggleLoading',false)
               
                })
            }
        },
		created(){
            //在keep-alive 下首次创建会执行这个函数
            this.getData();
            window.scroll(0,0)
		},
        activated(){
            //挂载玩以后，激活改组件的时候
            SyntaxHighlighter.highlight();
        },
        deactivated(){

        },
       
        updated(){
            SyntaxHighlighter.highlight();
        },
		components: {
			HeaderInside
		}
	}


</script>