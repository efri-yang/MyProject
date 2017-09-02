<template>
	<div :class="[isOpen ? 'wn-drawer open' : 'wn-drawer']" ref="drawer">
        <ul class="list">
            <li v-for="item in dataList"><a href="#" @click="openDetail(item.meta_value,item.post_title)">{{item.post_title}}</a>
                <ul class="sub-menu" v-show="item.child.length">
                    <li v-for="child in item.child"><a href="#" @click="openDetail(child.meta_value,child.post_title)" v-html="child.name"></a></li>
                </ul>
            </li>
            <li><a href="http://wnworld.com/UIPure/Demo/classify-basestyle.html">ZUI</a></li> 
        </ul>
    </div>
</template>
<style lang="scss">
	@import '../assets/scss/_functions';
	.wn-drawer {
	    position: absolute;
	    right: 0;
	    top: 0;
	    width: 50%;
	    height: 100%;
	    background: #222;
	    z-index: 11;
	    -webkit-transition: -webkit-transform 250ms ease-out;
	    transform: translate3d(100%, 0px, 0px);
	    display: none;
	    >.list{
	    	padding-top: 30px;
	    	>li{
				
			    text-align: left;
			    padding: 0 10px 0 30px;
			    >ul{
			    	padding-left: 40px;
			    	a{
			    		font-size:32px;
			    		color: #fff;
			    		height: px2rem(80px);
			            line-height: px2rem(80px);
			            display: block;
			    	}
			    }
			    >a{
			    	color: #fff;
				    font-size: 36px;
				    display: block;
				    height: px2rem(100px);
			        line-height: px2rem(100px);
			    }
	    	 }
	    }
	}

</style>
<script>
	export default{
		data(){
			return {
				dataList:""
			}
		},
		
		computed:{
			isOpen(){
				return this.$store.state.drawerOpen
			}
		},
		created(){
			this.$http.get("/api/wnForVueGetNav.php").then((response) =>{
				this.dataList=response.body;
			})
		},
		methods:{
			openDetail:function(id,title){
				event.preventDefault();
				this.$store.state.drawerOpen=!this.$store.state.drawerOpen;
				this.$store.commit({
					type : 'changeAnimate',
					mode : 'normal'
				});
				if(title=="首页"){
					this.$router.push({
						path:"wnworldForVue"
					});
				}else{
					this.$router.push({
						name:"category",
						params:{
							id:id,
							title:title
						}
					});
				}
				

				
				
			}
		}
	}
</script>