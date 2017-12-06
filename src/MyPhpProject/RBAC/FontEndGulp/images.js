'use strict';

const  gulp= require("gulp");
const  imagemin=require("gulp-imagemin");
const  imageminJpegoptim=require("imagemin-jpegoptim");
const  imageminPngquant=require("imagemin-pngquant");

const debug=require('gulp-debug');
const changed = require('gulp-changed');
const gulpif=require("gulp-if");


const conf=require('./config.js');
const server=require("./server.js")

/**
 * .pipe(changed(c_paths.dev)) 拷贝改变的那张就可以了
 * 但是遇到修改、重命名就不行了，所以需要考虑下新方案
 */

function DevImages(){
	return gulp.src(conf.src+ conf.mod +'/**/*.{png,jpg,gif,jpeg,ico,eot,svg,ttf,woff}')
				.pipe(changed(conf.dev))
			    .pipe(gulp.dest(conf.dev+conf.mod))
			    .pipe(server.reload({stream: true}));	
}


function DistImages(){
	return gulp.src(conf.src+ conf.mod +'/**/*.{png,jpg,gif,jpeg,ico,eot,svg,ttf,woff}')
				.pipe(changed(conf.dev))
				.pipe(imagemin({
	                optimizationLevel: 7, //类型：Number  默认：3  取值范围：0-7（优化等级）
	                progressive: true, //类型：Boolean 默认：false 无损压缩jpg图片
	                interlaced: true, //类型：Boolean 默认：false 隔行扫描gif进行渲染
	                multipass: true, //类型：Boolean 默认：false 多次优化svg直到完全优化
	                svgoPlugins: [{removeViewBox: false}],//不要移除svg的viewbox属性
	                use: [imageminPngquant(),imageminJpegoptim()] //使用pngquant深度压缩png图片的imagemin插件
	        	}))
			    .pipe(gulp.dest(conf.dist+conf.mod))
			    .pipe(server.reload({stream: true}));	
}



module.exports={
	DevImages:DevImages,
	DistImages:DistImages
};