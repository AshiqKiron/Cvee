var gulp = require('gulp');
var postcss = require('gulp-postcss');
var sass = require('gulp-sass');
var cssnext = require('postcss-cssnext');
var notify = require("gulp-notify");
var livereload = require('gulp-livereload');
var prettify = require('gulp-jsbeautifier');

gulp.task('styles', function () {
    var processors = [
        cssnext({})
    ];
    
    return gulp.src('sass/style.scss')
        .pipe(sass())
        .pipe(postcss(processors))
        .pipe(prettify())
        .pipe(notify("success"))
        .pipe(gulp.dest('.'))
        .pipe(livereload());
});

gulp.task('watch:styles', function(){
    livereload.listen();
    gulp.watch('**/*.scss', ['styles']);
});