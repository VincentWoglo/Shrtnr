const { series, watch, parallel } = require('gulp')
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const csso = require('gulp-csso');


const Sass = ()=>{
    return gulp.src('./Views/Style/Scss/**/*.scss')
    .pipe(sass())
    .pipe(csso())
    .pipe(gulp.dest('./Views/Style/Css'))
}


const WatchTask = ()=>{
    watch('./Views/Style/Scss/**/*.scss',
    series(Sass))
}
exports.default = series(
    parallel(Sass),
    WatchTask
)