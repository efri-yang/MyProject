

const gulp = require("gulp");

const htmls = require('./FontEndGulp/htmls');
const styles = require('./FontEndGulp/styles');
const scripts = require('./FontEndGulp/scripts');
const images = require('./FontEndGulp/images');
const others = require('./FontEndGulp/others');
const watchs = require('./FontEndGulp/watch');
const servers = require('./FontEndGulp/server');
const cleans = require('./FontEndGulp/clean');






gulp.task('dev', gulp.series(cleans.DevClean, gulp.parallel(gulp.series(scripts.DevScripts,styles.DevStyles),htmls.DevHtmls,images.DevImages,others.DevOthers,watchs.DevWatchs,servers.DevServer)));









