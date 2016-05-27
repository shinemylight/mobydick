// Sass configuration
var gulp = require('gulp');
var sass = require('gulp-sass');
var minify = require('gulp-minify');

var paths = {
    source: {
        root: './src/',
        styles: './src/styles/',
        js: './src/js/'
    },
    build: {
        root: './build/',
        css: './build/css/',
        js: './build/js/'
    }
};

gulp.task('sass', function() {
    gulp.src(paths.source.styles + 'styles.scss')
        .pipe(sass())
        .pipe(gulp.dest(paths.build.css))
});

gulp.task('html', function () { 
    gulp
        .src(paths.source.root + '*.html')
        .pipe(gulp.dest(paths.build.root));
});

gulp.task('minify', function () { 
    gulp
        .src(paths.source.js + '*.js')
        .pipe(minify())
        .pipe(gulp.dest(paths.build.js));
});

gulp.task('default', ['sass', 'html', 'minify'], function() {
    gulp.watch(paths.source.styles + '*.scss', ['sass']);
    gulp.watch(paths.source.root + '*.html', ['html']);
    gulp.watch(paths.source.js + '*.js', ['minify']);
});