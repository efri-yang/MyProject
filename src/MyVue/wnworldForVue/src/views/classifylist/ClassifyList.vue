<template>
	<div class="page-box category-box">
		<HeaderInside :headTitle="headTitle"></HeaderInside>
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
	</div>
</template>
<script>
	import HeaderInside from '../../components/HeaderInside';
	import Scroller from '../../components/Scroller/components/Scroller.vue'
	export default{
		data(){
			return {
				headTitle:this.$route.params.title,
				id:this.$route.params.id,
				page:1,
				count:5,
				items: [],
				routername:"",
                isFinshed:false,
			}
		},
		mounted(){
			this.bottom = 20;
            this.scrollerResize();
		},
		created(){
			this.headTitle=this.$route.params.title;
			this.id=this.$route.params.id;
			
		},
		watch:{
			'$route':function(to,from){
				this.routername=to.name;
				if(to.name=="category"){
					this.infinite();
				}

			}
		},
		methods:{
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
                // console.group("执行了——classListinfinite");
                //箭头函数this问题;
                if (this.isFinshed) {
                    setTimeout(() => {
                        this.$refs.my_scroller.finishInfinite(true)
                    },1000)
                    return;
                }
                if(this.routername=="category" || !this.routername){
                	setTimeout(() => {
	                    this.$http.post("/api/wnForVueGetCategory.php", {
	                        id: this.id,
	                        page: this.page,
	                        count: this.count
	                    },{emulateJSON:true}).then(response => {
	                        for (var i = 0; i < response.body.length; i++) {
	                            this.items.push(response.body[i])
	                        }
	                        // console.dir(this.items)
	            			this.page++;
	                        this.isFinshed=(response.body.length <this.count) ? true : false
	                        this.$store.dispatch('toggleLoading',false);
	                        setTimeout(() => {
					            if (this.$refs.my_scroller){
					            	this.$refs.my_scroller.finishInfinite()
					            }
					        })
	                    })
                	},1000)
                }
            }
		},
		updated() {
            this.scrollerResize();
        },
        activated(){
        	this.isFinshed=false;
			
			this.headTitle=this.$route.params.title;
			this.id=this.$route.params.id;
			this.page=1;
			this.items=[];
        },
		components:{
			HeaderInside,
			Scroller

		}
	}
</script>