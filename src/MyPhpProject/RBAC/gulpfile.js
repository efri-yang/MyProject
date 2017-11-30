

const gulp = require("gulp");

// const htmls = require('./gulp/htmls');
// const styles = require('./gulp/styles');
// const scripts = require('./gulp/scripts');
// const images = require('./gulp/images');
// const others = require('./gulp/others');
// const watchs = require('./gulp/watch');
// const servers = require('./gulp/server');
// const cleans = require('./gulp/clean');






// gulp.task('default', gulp.series(cleans, gulp.parallel(htmls.html,htmls.cHtml,scripts.script,scripts.cScript,styles.style,styles.cStyle,images.image,others.other,watchs,servers.server)));


var rev = require('gulp-rev');
 
gulp.task('css', function () {
    return gulp.src('src/**/*.css')
        .pipe(rev())
        .pipe(gulp.dest('dist'))
        .pipe( rev.manifest() )
        .pipe( gulp.dest( 'rev/css' ) );
});
 
gulp.task('scripts', function () {
    return gulp.src('src/js/*.js')
        .pipe(rev())
        .pipe(gulp.dest('dist/js'))
        .pipe( rev.manifest() )
        .pipe( gulp.dest( 'rev/js' ) );
});
 

var revCollector = require('gulp-rev-collector');
var minifyHTML   = require('gulp-minify-html');
 
gulp.task('rev', function () {
    return gulp.src(['rev/**/*.json', 'templates/**/*.html'])
        .pipe( revCollector({
            replaceReved: true,
            dirReplacements: {
                'css': '/dist/css',
                '/js/': '/dist/js/',
                'cdn/': function(manifest_value) {
                    return '//cdn' + (Math.floor(Math.random() * 9) + 1) + '.' + 'exsample.dot' + '/img/' + manifest_value;
                }
            }
        }) )
        .pipe( minifyHTML({
                empty:true,
                spare:true
            }) )
        .pipe( gulp.dest('dist') );
});






