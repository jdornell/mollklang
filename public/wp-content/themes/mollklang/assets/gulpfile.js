// Gulp Dependencies
const gulp = require('gulp');
const print = require('gulp-print');
const plumber = require('gulp-plumber');
const pump = require('pump');

// Style Dependencies
const sass = require('gulp-sass');
const cssmin = require('gulp-cssmin');

// Scripts Dependencies
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');

// Test Dependencies
//const jasmine = require('gulp-jasmine');
//const mocha = require('gulp-mocha');

// Development Dependencies
const concat = require('gulp-concat');
const rename = require('gulp-rename');

// Error handling
var onError = function (err) {
    gutil.beep();
    console.log(err);
  };

const basePath = {
    src: 'src/',
    dest: 'dist/'
};

const srcAssets = {
    styles: basePath.src + 'stylesheets/',
    script: basePath.src + 'javascript/'
};

const destAssets = {
    styles: basePath.dest + 'stylesheets/',
    script: basePath.dest + 'javascript/'
};

gulp.task('scripts', () => {
    gulp.src('src/**/*.js')
        .pipe(babel({presets: ['env']}))
        .pipe(concat('script.js'))
        .pipe(gulp.dest('dist/js'))
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('dist/js'))
        .pipe(print());
});

gulp.task('compress', function(cb) {
    pump([
        gulp.src('src/**/*.js'),
        uglify(),
        gulp.dest('dist/js')
    ],
    cb
    );
});

/*
gulp.task('test', () => {
    gulp.src('./src/test/**.js')
        .pipe(jasmine());
});
*/

gulp.task('styles', () => {
    gulp.src('./src/scss/*.scss')
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(sass())
        .pipe(gulp.dest('./../'))
        .pipe(cssmin())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./../'))
});

gulp.task('watch', () => {
    gulp.watch('./src/scss/**/*.scss', ['styles']);
    gulp.watch('./src/scss/*.scss', ['styles']);
    gulp.watch('./src/js/*.js', ['js']);
    //gulp.watch('./src/test/*.js', ['test']);
});

gulp.task('default', ['scripts', 'compress', /*'test',*/ 'styles']);