'use strict';

const gulp = require('gulp');
const filter = require('gulp-filter');
const changed = require('gulp-changed');
const gulpif=require("gulp-if");
const conf = require('./config.js');
const server = require("./server.js")


function DevOthers() {
    return gulp.src([conf.src + conf.mod + '/**/*', '!' + conf.src + conf.mod + '/**/*.{html,js,scss,css,sass,png,jpg,gif,jpeg,ico,eot,svg,ttf,woff}'])
        .pipe(filter(function(file) {
            return file.stat.isFile();
        }))
        .pipe(changed(conf.dev+conf.mod))
        .pipe(gulp.dest(conf.dev+conf.mod));
}

module.exports ={
	DevOthers:DevOthers
}