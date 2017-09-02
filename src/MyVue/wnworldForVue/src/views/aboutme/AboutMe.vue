<style lang="scss">
	/**
 * about 页面
 */
@import '../../assets/scss/_functions.scss';
.page-aboutme{
    padding-bottom: 20px;
}
.wn-aboutme-box {
    background: #fff;
    border: 1px solid #cfcfcf;
    padding: 15px 20px 35px;
    margin: px2rem(110px) 20px 10px;
    font-size:32px; 
    color:#333
}

.wn-aboutme-box .aboutme-tit {
    font-size: 36px;
    font-weight: bold;
    padding-bottom: 8px;
    border-bottom: 1px dashed #f60;
    margin-bottom: 15px;
}

.aboutme-zj {}

.aboutme-zj a {
    text-decoration: underline;
    color: #339dd2;
}

.aboutme-zj li {
    padding: 15px 15px;
    border-bottom: 1px dashed #e5e5e5;
}

.aboutme-zj li:last-child {
    border-bottom: none;
}

.aboutme-zj li p {
    font-size: 32px;
    line-height: 1.5;
    margin-bottom: 5px;
}

.aboutme-prolist {
    font-size: 32px;
}

.aboutme-prolist li {
    padding: 15px 10px;
    border-bottom: 1px dashed #e5e5e5;
}

.aboutme-prolist li:last-child {
    border-bottom: none;
}

.aboutme-prolist li .item {
    position: relative;
    padding-left: px2rem(110px);
    margin-bottom: 5px;
}

.aboutme-prolist li .item a {
    text-decoration: underline;
    color: #339dd2;
    display: inline-block;
    margin-right: 10px;
}

.aboutme-prolist .lab {
    position: absolute;
    left: 0;
    top: 0;
    width:px2rem(100px);
    text-align: right;
}

.aboutme-table-box {
    padding: 20px 30px;
}

.aboutme-table {
    border: 1px solid #e6e6e6;
    width: 100%;
}

.aboutme-table th {
    padding: 20px 0;
    text-align: center;
}

.aboutme-table .address {
    font-size: 16px;
    line-height: 2;
}

.aboutme-table .address p {
    text-indent: 2em;
}

.aboutme-table td.icon {
    width: 50px;
}

.aboutme-table td.date {
    font-family: arial;
    font-size: 18px;
    color: #666;
    width: 80px
}

.aboutme-table td.icon span {
    font-size: 40px;
    color: #f60;
}

.aboutme-table td {
    padding: 15px 10px;
    border: 1px solid #f60;
}

.aboutme-table td.tit {
    width: 90px;
    text-align: right;
    font-weight: bold;
}

.aboutme-intro {
    line-height: 1.8
}

.aboutme-intro p {
    text-indent: 2em;
    margin-bottom: 15px;
}

.aboutme-table-project {
    font-size: 16px;
    line-height: 2;
}

.aboutme-table-project .center {
    text-align: center;
}

.aboutme-table-project a {
    text-decoration: underline;
}

.aboutme-table-project p {
    text-indent: 2rem;
}

</style>
<template>
    <div class="page-box page-aboutme">
        <HeaderInside :headTitle="headTitle"></HeaderInside>
        <div class="wn-aboutme-box">
            <div class="aboutme-intro">
                <p>散崖，前端工程师一枚！出生于89年的我,不曾有过很大的梦想，却读了时下最火的电子商务专业,2012年,享受完了大学四年的美好光阴，开始了所谓的职场之旅...
                    <p>
                        <p>因果随缘,大学的一门网页制作课程，毕业那年毅然选择了从事web前端,那时移动互联网正兴起， 前端行业也随之突飞猛进发展,各种技术层出不穷，而我却慢慢发现跟不上节奏，自己的脚步越发像蜗牛一样慢，浮躁过，也彷徨过，所以开始建立了这个"蜗牛博客",告诉自己成长没有捷径,需要一步一个脚印！</p>
                        <P>而现在,依旧在路上......，这个世界很奇妙，没有人知道下一秒会放生什么事情!所以选择了远方 便只顾风雨兼程！</p>
            </div>
            <p></p>
            <p></p>
            <div class="aboutme-tit">我的足迹</div>
            <ul class="aboutme-zj">
                <li>
                    <p>
                        <label>时间：</label>2015.2~至今</p>
                    <p>
                        <label>公司：</label>网龙公司</p>
                    <p>
                        <label>岗位：</label>web前端工程师</p>
                    <p>
                        <label>内容：</label>参与云办公,校园招聘H5页面制作</p>
                </li>
                <li>
                    <p>
                        <label>时间：</label>2012.10~2015.01</p>
                    <p>
                        <label>公司：</label>福建众事达信息技术有限公司</p>
                    <p>
                        <label>岗位：</label>web前端工程师</p>
                    <p>
                        <label>内容：</label>参与<a href="http://www.hhczy.com" target="_blank">行行出状元</a>前端开发和制作;<a href="http://www.fjdaze.com/" target="_blank">雨后春笋</a> pc端和移动端微信微页面的前端开发，基于bootstrap的响应式模板制作</p>
                </li>
                <li>
                    <p>
                        <label>时间：</label>2012.01~2012.09</p>
                    <p>
                        <label>公司：</label>福建恒科教育科技发展有限公司</p>
                    <p>
                        <label>岗位：</label>前端专员(实习)</p>
                    <p>
                        <label>内容：</label><a href="http://www.555edu.com" target="_blank">福建高考网</a> 前端开发,页面重构</p>
                </li>
            </ul>
            <div class="aboutme-tit">我的作品</div>
            <ul class="aboutme-prolist">
                <li>
                    <div class="item">
                        <label class="lab">名称：</label>
                        <p>网龙2016校招微页面</p>
                    </div>
                    <div class="item">
                        <label class="lab">地址：</label>
						<p><img src="../../assets/images/aboutme/xzqrcode.png" width="112" height="112"></p>
                    </div>
                    <div class="item">
                        <label class="lab">介绍：</label>
                        <p>一个移动营销服务平台(地皮)，上面有很多的模块(毛胚房),用户只需要根据自己的行业进行选择(装修)，上面有微店、团购、微餐饮模块</p>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <label class="lab">名称：</label>
                        <p>uedc卡片方法网站</p>
                    </div>
                    <div class="item">
                        <label class="lab">地址：</label>
                        <p><a href="http://uedc.nd.com.cn/cardmethod/" target="_blank">点击查看</a></p>
                    </div>
                    <div class="item">
                        <label class="lab">介绍：</label>
                        <p>一个移动营销服务平台(地皮)，上面有很多的模块(毛胚房),用户只需要根据自己的行业进行选择(装修)，上面有微店、团购、微餐饮模块</p>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <label class="lab">名称：</label>
                        <p>掌销宝</p>
                    </div>
                    <div class="item">
                        <label class="lab">地址：</label>
                        <p><img src="../../assets/images/aboutme/erweima.jpg"></p>
                    </div>
                    <div class="item">
                        <label class="lab">介绍：</label>
                        <p>一个基于微信移动营销服务平台，上面有微店、团购、微餐饮模板供公户选择</p>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <label class="lab">名称：</label>
                        <p>城市之星</p>
                    </div>
                    <div class="item">
                        <label class="lab">地址：</label>
                        <p><a href="http://www.citystar.cc" target="_blank">http://www.citystar.cc</a></p>
                    </div>
                    <div class="item">
                        <label class="lab">介绍：</label>
                        <p>一款基于bootstrap的企业展示型的响应式网站模板,满足了移动互联网时代的多屏的切换,而且还提供了肤色的变化！
                            <a href="http://adap1008.chengshizhixing.com/" target="_blank">案例1</a>
                            <a href="http://adap1011.chengshizhixing.com/" target="_blank">案例2</a>
                            <a href="http://adap1003.chengshizhixing.com/" target="_blank">案例3</a>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <label class="lab">名称：</label>
                        <p>行行出状元</p>
                    </div>
                    <div class="item">
                        <label class="lab">地址：</label>
                        <p><a href="http://www.hhczy.com/" target="_blank">http://www.hhczy.com/</a></p>
                    </div>
                    <div class="item">
                        <label class="lab">介绍：</label>
                        <p>行行出状元,帮助广大中小企业在网络经济时代成为行业状元而鼎力打造的“电商企业服务平台”。</p>
                    </div>
                </li>
            </ul>
            <div class="aboutme-tit">兴趣爱好</div>
            <div class="aboutme-love">
                爱篮球、爱动漫、爱毛爷爷、爱.....
            </div>
        </div>
    </div>
</template>
<script>
import HeaderInside from '../../components/HeaderInside';
export default {
        data() {
            return {
                headTitle: "关于散崖"
            }
        },
        created(){
            this.$store.dispatch('toggleLoading',false)
        },
        components: {
            HeaderInside
        }

}
</script>
