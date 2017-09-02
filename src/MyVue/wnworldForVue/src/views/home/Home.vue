<template>
	<div :class="[isOpen ? 'page-box page-home open' : 'page-box page-home' ]">
		<HeaderHome v-on:drawertoggle="drawerToggleClick"></HeaderHome>
		<!-- <div class="box-main">
			<List :id="id" :pageNum="pageNum" :count="count"></List>
		</div> -->
		<div class="box-main">
			<scroller :on-infinite="infinite" ref="my_scroller">
	            <div class="scroll-placeholder"></div>
	            <ul class="log-list">
	                <li v-for="item in items">
	                    <h2 class="tit"><i class="iconfont icon-iconfonticon05"></i><a href="#" @click="openDetailPage(item.ID)">{{item.post_title}}</a></h2>
	                    <div class="entry-meta">
	                        <span><i class="iconfont icon-time"></i>{{item.post_date}}</span>
	                        <!-- <span><i class="iconfont icon-iconfont90"></i><a href="#">前端开发</a></span> -->
	                        <!-- <span><i class="iconfont icon-xiebiaoqian"></i>次</span> -->
	                        <span><i class="iconfont icon-icon-admin"></i> {{item.meta_value}}</span>
	                    </div>
	                    <div class="desc">
	                        <p v-html="item.post_excerpt"></p>
	                    </div>
	                    <a href="#" class="readmore" @click="openDetailPage(item.ID)">阅读全文</a>
	                </li>
	            </ul>
        	</scroller>
		</div>
		<div :class="[isOpen ? 'wn-drawer-mask open' :'wn-drawer-mask']" ref="drawerMask"></div>
		<Drawer ref="drawer"></Drawer>
	</div>
</template>
<style lang="scss">
@import '../../assets/scss/_functions';
.box-main {
    position: relative;
    height: 100%;
    margin: 0 20px;
}

.scroll-placeholder {
    height: px2rem(110px);
}

.log-list {
    padding-bottom: 5px
}

.log-list li {
    border: 1px solid #cfcfcf;
    background: #fff;
    padding: 15px 20px 65px;
    margin-bottom: 20px;
    position: relative;
    .tit {
        font-size: 42px;
        word-break: break-all;
        font-weight: normal;
        a:visited {
            color: #929292;
        }
        i {
            color: #e96363;
            font-size: 80px;
            padding: 0;
            vertical-align: middle;
            height: px2rem(60px);
            line-height: px2rem(50px);
            overflow: hidden;
            display: inline-block;
        }
        .zd {
            color: #e96363;
            margin-right: 5px;
        }
    }
    .readmore {
        position: absolute;
        color: #fff;
        right: 20px;
        bottom: 15px;
        padding: 12px 28px;
        border-radius: 4px;
        font-size: 28px;
        border-color: #d43f3a;
        background-color: #d9534f;
        &:hover {
            background-color: #c9302c;
            border-color: #ac2925;
        }
        &:active {
            -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
            box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
        }
    }
    .entry-meta {
        color: #999;
        margin-top: 5px;
        padding-bottom: 2px;
        border-bottom: 1px solid #dedede;
        a {
            color: #999;
            &:hover {
                text-decoration: underline;
            }
        }
        span {
            font-size: 28px;
            margin-right: 20px;
            i {
                margin-right: 5px;
                vertical-align: middle;
            }
        }
        .discuss {
            margin-right: 0;
            float: right;
        }
    }
    .desc {
        padding: 15px 10px;
        word-break: break-all;
        line-height: 1.5;
        font-size: 32px;
        color: #666;
        p {
            text-indent: 2em;
            margin-bottom: 10px;
        }
    }
}
.page-box{
	-webkit-transition: -webkit-transform 250ms ease-out;
    top: 0;
    width: 100%;
    height:100%;
    position: absolute;
    background:#e5e5e5;
		&.open{
			transform: translate3d(-50%, 0px, 0px);
			margin-left: 1px;
		}
		.wn-drawer-mask {
		    position: fixed;
		    left:0;
		    top:0;
		    bottom: 0;
		    right:0;
		    background-color: rgba(0, 0, 0, 0.8);
		    visibility: hidden;
		    z-index: 10;
		    opacity: 0;
		    &.open{
		    	opacity:1; 
		    	visibility:visible;
		    	-webkit-transition:all 250ms ease-out;
		    }
		}
	}
	.page-home{
		&.open{
			.wn-drawer{
				display: block;
			}
		}
	}
</style>
<script>
    /**
     * 要给<list><list>传入 id(全部或者某个分类) defaultpage(第几页)  每次请求几页
     */
	import HeaderHome from '../../components/HeaderHome';
	import Drawer from '../../components/Drawer';
	import {mapState} from 'vuex';
	import Scroller from '../../components/Scroller/components/Scroller.vue'
	export default {
		data(){
			return {
				id:"",
				page:1,
				count:5,
				items: [],
                isFinshed:false,
                infiniteFlag:true
			}
		},
		computed:mapState({
				isOpen:state=>state.drawerOpen
		}),
		watch:{
            '$route' (to,from){
                if(to.path !=from.path){
                	this.infiniteFlag=false;
                }

            }
        },
		methods:{
			drawerToggleClick:function(){
				this.$store.state.drawerOpen=!this.$store.state.drawerOpen
			},
			openDetailPage: function(id) {
                event.preventDefault();
                this.$store.commit({
                        type: 'changeAnimate',
                        mode: 'normal',
                    }),
                    this.$router.push({
                        name: "detailpage",
                        params: {
                            id: id
                        }

                    })
            },
            scrollerResize() {
                var _this = this;
                setTimeout(() => {
                    _this.$refs.my_scroller.resize()
                })
            },
            infinite() {
            	if(!this.infiniteFlag) return;
                // console.group("执行了——Home---infinite");
                //箭头函数this问题;
                if (this.isFinshed) {
                    setTimeout(() => {
                        this.$refs.my_scroller.finishInfinite(true)
                    }, 1500)
                    return;
                }

                setTimeout(() => {
                    this.$http.post("/api/wnForVueGetCategory.php", {
                        id: this.id,
                        page: this.page,
                        count: this.count
                    },{emulateJSON:true}).then(response => {
                    	console.dir(response.body)
                        for (var i = 0; i < response.body.length; i++) {
                            this.items.push(response.body[i])
                        }
            			this.page++;
                        this.isFinshed=(response.body.length <this.count) ? true : false
                        this.$store.dispatch('toggleLoading',false);
                        setTimeout(() => {
				            if (this.$refs.my_scroller){
				            	this.$refs.my_scroller.finishInfinite()
				            }
				        })
                    })


                }, 1500)
            }
		},
		beforeCreate(){
			
		},
		beforeMount(){
            //console.group('HOME beforeMount 挂载前状态===============》');
        },
		created(){
			this.$store.dispatch('toggleLoading',true);
			// this.$http.get("/api/wnForVueGetCategory.php").then((response)=>{
			// 	console.dir(response.body);
			// 	this.dataList=response.body;
				
			// })
		},
		
		mounted(){
			var _this=this;
			//console.group('HOME mounted 挂载前状态===============》');
			this.bottom = 20;
            this.scrollerResize();
			this.$refs.drawerMask.onclick=function(event){
				_this.$store.state.drawerOpen=!_this.$store.state.drawerOpen
				event.stopPropagation();
				return false;
			}
		},
		activated:function(){
            //console.group('activated keep-alive切入到该组件状态(home)===============》');
        },
        deactivated:function(){
            //console.group('deactivated keep-alive切出该组件状态(home))===============》');
        },
        updated() {
            // this.scrollerResize();
        },
		components:{
			HeaderHome,
			Drawer,
			Scroller
		}
	}

</script>