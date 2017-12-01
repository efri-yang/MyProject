'use strict';

const gulp=require("gulp");
const del=require("del");
const gulpif=require("gulp-if");


const conf=require("./config");

var delHtmlDist=conf.htmlDist + conf.mod;
var delStaticDist=conf.staticDist + conf.mod;

function DevClean(){
	return del(conf.dev);
}

function DistClean(){
	return del(delHtmlDist,delStaticDist);
}


module.exports={
	DevClean:DevClean,
	DistClean:DistClean
}