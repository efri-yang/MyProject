<template>
	<div class="loading-box">
	    <div class="loader-inner line-scale">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
		<p class="txt">加载中...</p>
	</div>
</template>
<style lang="scss">
	@import "../assets/scss/_functions.scss";

/**
 * Lines
 */
@-webkit-keyframes line-scale {
  0% {
    -webkit-transform: scaley(1);
            transform: scaley(1); }

  50% {
    -webkit-transform: scaley(0.4);
            transform: scaley(0.4); }

  100% {
    -webkit-transform: scaley(1);
            transform: scaley(1); } }
@keyframes line-scale {
  0% {
    -webkit-transform: scaley(1);
            transform: scaley(1); }

  50% {
    -webkit-transform: scaley(0.4);
            transform: scaley(0.4); }

  100% {
    -webkit-transform: scaley(1);
            transform: scaley(1); } }
.line-scale > div:nth-child(1) {
  -webkit-animation: line-scale 1s 0.1s infinite cubic-bezier(.2, .68, .18, 1.08);
          animation: line-scale 1s 0.1s infinite cubic-bezier(.2, .68, .18, 1.08); }
.line-scale > div:nth-child(2) {
  -webkit-animation: line-scale 1s 0.2s infinite cubic-bezier(.2, .68, .18, 1.08);
          animation: line-scale 1s 0.2s infinite cubic-bezier(.2, .68, .18, 1.08); }
.line-scale > div:nth-child(3) {
  -webkit-animation: line-scale 1s 0.3s infinite cubic-bezier(.2, .68, .18, 1.08);
          animation: line-scale 1s 0.3s infinite cubic-bezier(.2, .68, .18, 1.08); }
.line-scale > div:nth-child(4) {
  -webkit-animation: line-scale 1s 0.4s infinite cubic-bezier(.2, .68, .18, 1.08);
          animation: line-scale 1s 0.4s infinite cubic-bezier(.2, .68, .18, 1.08); }
.line-scale > div:nth-child(5) {
  -webkit-animation: line-scale 1s 0.5s infinite cubic-bezier(.2, .68, .18, 1.08);
          animation: line-scale 1s 0.5s infinite cubic-bezier(.2, .68, .18, 1.08); }
.line-scale > div {
  background-color: #fff;
  width: px2rem(6px);
  height:px2rem(52.5px);
  border-radius:px2rem(3px);
  margin:px2rem(18px) px2rem(4px) 0;
  -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
  display: inline-block;
  }



	.loading-box{
	    position: fixed;
	    top: 50%;
	    left: 50%;
	    text-align: center;
	    color: #fff;
	    margin-top:px2rem(-140px/2);
	    margin-left:px2rem(-220px/2);
	    display: block;
	    width:px2rem(220px);
	    height:px2rem(140px);
	    background-color: rgba(0,0,0,0.7);
	    border-radius: 5px;
	    .txt{
	    	font-size: 32px;
	    	text-align: center;
	    }
	}	

</style>