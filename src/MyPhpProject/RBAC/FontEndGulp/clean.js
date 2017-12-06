'use strict';

const gulp=require("gulp");
const del=require("del");
const gulpif=require("gulp-if");


const conf=require("./config");



function DevClean(){
	return del([conf.dev]);
}

var delHtml=conf.htmlDistFolder + conf.mod;
var delStatic=conf.serverFolder + conf.mod;
function DistClean(){
	return del([delHtml,delStatic,conf.revSrc]);
}


module.exports={
	DevClean:DevClean,
	DistClean:DistClean
}