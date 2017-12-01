'user strict';

const gulp=require("gulp");
const fileInclude = require("gulp-file-include");
const debug=require('gulp-debug');

const changed = require('gulp-changed');

const gulpif=require("gulp-if");

var conf=require("./config.js");
const server=require("./server.js");
const revCollector = require('gulp-rev-collector');



/**
 * 这个htmlsDev 有个缺陷，就是你修改了include的内容，所有的外围的html 都会被执行复制，效率有问题
 *  gulp-changed 只能检测到.html的更改,对于include 却无能为力
 */

function DevHtmls(){
	return gulp.src(["rev/**/*.json",conf.src + conf.mod + '/**/*.html',"!" + conf.src + conf.mod + '/**/_*.html'])
            .pipe( revCollector({
                // replaceReved: true,
                dirReplacements: {
                    "static/":"xsdfsadfsxx/"
                }
            }))
		  	.pipe(fileInclude({
            	prefix: '@@',
            	basepath: '@file'
        	}))
            .pipe(debug({title: 'htmls-------------'}))
        	.pipe(gulp.dest(conf.dev + conf.mod));
            
}

function cHtmls(){
	return gulp.src([conf.src + conf.commonFile + '/**/*.html',"!" + conf.src + conf.commonFile + '/**/_*.html'])
		  	.pipe(fileInclude({
            	prefix: '@@',
            	basepath: '@file'
        	}))
            .pipe(debug({title: 'htmls-------------'}))
        	.pipe(gulp.dest(conf.dest + conf.commonFile));
}







module.exports={
	DevHtmls:DevHtmls,
	cHtml:cHtmls
};