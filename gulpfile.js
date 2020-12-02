/*
Name: Gulp for Wordpress Theme Development
Tips: Make sure you have the BrowserSync extension configured on your browser
*/

var gulp = require('gulp');
var sass = require('gulp-sass');
var livereload = require('gulp-livereload');
var browserSync = require('browser-sync').create();
var prefix      = require('gulp-autoprefixer');
var cssbeautify = require('gulp-cssbeautify');

livereload({ start: true })

/* ====================
    SASS to CSS 
    =================== */
gulp.task('sass', function() {
    return gulp.src('./src/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(prefix())
        .pipe(cssbeautify())
        .pipe(gulp.dest('./dist/'))
        .pipe(livereload());
});

/* ====================
    Watch for changes & Refresh 
    =================== */
gulp.task('watch', function() {
  livereload.listen();
  gulp.watch('./src/*.scss', gulp.series('sass'));
});


/* ====================
    BrowserSync
    =================== */
gulp.task('browser-sync', function() {
  browserSync.init({
      proxy: "localhost:8888/"
  });
});



/* ====================
    Watch for changes 
    =================== */
gulp.task('default', gulp.parallel('sass', 'watch'));


