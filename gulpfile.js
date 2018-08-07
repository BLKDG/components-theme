"use strict";

var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var del = require('del');
var sourceUrls = require('gulp-source-url');
var concat = require('gulp-concat');
var fs = require('fs'); 
var merge = require('merge-stream');
var path = require('path');
var componentsPath = 'components/';
var browserSync = require('browser-sync').create();
var gulpStylelint = require('gulp-stylelint');

function logFileChange(event) {
    var fileName = require('path').relative(__dirname, event.path);
    console.log('[' + 'WATCH'.green + '] ' + fileName.magenta + ' was ' + event.event + ', running tasks...');
}

function getFolders(dir) {
    return fs.readdirSync(dir)
    .filter(function(file) {
        return fs.statSync(path.join(dir, file)).isDirectory();
    });
}

gulp.task('sass:inject', () => {
    return gulp.src('assets/scss/styles.scss')
        .pipe($.inject(
            gulp.src('components/**/*.scss', {read: false})
                .pipe($.sort()),
            {
                transform: (filepath) => {
                    let newPath = filepath
                        .replace(`/components/`, '../../components/')
                        .replace(/_(.*).scss/, (match, p1, offset, string) => p1)
                        .replace('.scss', '');
                    return `@import '${newPath}';`;
                }
            }))
        .pipe(gulp.dest(`assets/scss`))
        .pipe(browserSync.stream());
});

gulp.task('sass', sass);
function sass() {
    return gulp.src(['assets/scss/styles.scss']) 
        .pipe($.sourcemaps.init())
        .pipe($.sass())
        .on('error', $.notify.onError({ message: "<%= error.message %>", title: "Sass Error" }))
        // .pipe(gulpStylelint({
        //     reporters: [
        //         {formatter: 'string', console: true}
        //     ]
        // }))
        .pipe($.concat('styles.css'))
        .pipe($.autoprefixer({ browsers: ['last 2 versions', 'ie >= 9'] }))
        .pipe($.minifyCss())
        .pipe( $.sourcemaps.write('.'))
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.stream())
}

gulp.task('scripts', ['clean:js'], jsComponents);

var jsFiles = [
    'assets/js/**/*.js',
    'components/**/*.js'
];

function jsComponents() {
        return gulp.src([
            'assets/js/**/*.js',
            'components/**/*.js'
        ])
        .pipe($.sourcemaps.init())
        .pipe($.concat('bundle.min.js'))
        .pipe($.uglify())
        .pipe($.sourcemaps.write('.'))
        .pipe(gulp.dest('dist'))
        .pipe(browserSync.stream())
    };


gulp.task('clean:js', function () {
    return del(['assets/js/*.min.js','assets/js/**/*.min.js']);
})

gulp.task('default', ['sass:inject','sass', 'scripts'], function() {

    browserSync.init({
        files: ['{components,templates}/**/*.php', '*.php'],
        proxy: 'http://localhost:8080',
        port: 8080,
        snippetOptions: {
          whitelist: ['/wp-admin/admin-ajax.php'],
          blacklist: ['/wp-admin/**']
        },
      }); 

    $.watch(['components/**/*.scss', 'assets/scss/**/*.scss', '!assets/scss/styles.scss'], function (v) {
        logFileChange(v);
        gulp.run('sass:inject');
    });

    $.watch(jsFiles, function (v) {
        logFileChange(v);
        gulp.run('scripts');
    });
    
});