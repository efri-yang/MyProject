<template>
	<div class="header">
		<div class="logo-m">蜗牛世界</div>
        <i class="iconfont icon-fenlei header-navbar-toggle" @click="openDrawer"></i> 
	</div>

</template>
<style lang="scss">
@import '../assets/scss/_functions';
.header{
		background: #222;
    	height:px2rem(90px);
    	position:fixed;
    	padding: 0 10px;
    	width:100%;
    	z-index:10;
    	.logo-m{
    		height:px2rem(90px);
		    line-height: px2rem(90px);
		    background: url("../assets/images/logo_m.png") no-repeat;
		    background-size: auto 100%;
		    text-indent: -9999px;
    	}
    	.tit {
		    position: absolute;
		    left: 40px;
		    right: 40px;
		    top: 0;
		    font-size: 40px;
		    color: #fff;
		    line-height:px2rem(90px);
		    text-align: center;
		}
	}
.header-goback {
    width: 28px;
    padding: 0 10px 0 0;
    i {
	    display: inline-block;
	    line-height:px2rem(90px);
	    font-size: px2rem(56px);
	    color: #fff;
	}
}
.header-font {
    position: absolute;
    top: 90px;
    left: 50%;
    margin-left: -180px;
    width: 390px;
    height: 96px;
    background: url("/static/images/header_biaoyu.png") no-repeat center center;
}
.header-navbar-toggle {
    position: absolute;
    right:px2rem(17px);
    top:px2rem(17px);
    line-height:px2rem(56px);
    font-size: px2rem(56px);
    color: #fff;
}
</style>

<script>
	
	export default{
		methods:{
			openDrawer(){
				this.$emit('drawertoggle');
			}
		}
	}
</script>