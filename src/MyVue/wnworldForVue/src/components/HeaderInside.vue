<template>
	<div class="header">
            <p class="tit">{{headTitle}}</p>
            <a class="header-goback" href="#" @click="goBack"><i class="iconfont icon-fanhui"></i></a>
              
    </div>
</template>
<style lang="scss">
	/**
	 * 这部分的样式和HeaderHome.vue 组件共用
	 */
</style>
<script>
	export default {
		props:["headTitle"],
		methods:{
			goBack:function(event){
				event.preventDefault();
				this.$store.commit({
					type : 'changeAnimate',
					mode : 'reverse',

				});
				this.$router.go(-1);
				this.$store.dispatch('toggleLoading',false)
			}
		}
	}

</script>
