"use strict";

var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var del = require('del');
var sourceUrls = require('gulp-source-url');
var fs = require('fs'); 
var merge = require('merge-stream');
var path = require('path');
var componentsPath = 'components/';
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

//compile blocks sass
// gulp.task('block:inject', () => {
//     return gulp.src('assets/scss/styles.scss')
//         .pipe($.inject(
//             gulp.src('blocks/**/*.scss', {read: false})
//                 .pipe($.sort()),
//             {
//                 transform: (filepath) => {
//                     let newPath = filepath
//                         .replace(`/blocks/`, '../../blocks/')
//                         .replace(/_(.*).scss/, (match, p1, offset, string) => p1)
//                         .replace('.scss', '');
//                     return `@import '${newPath}';`;
//                 }
//             }))   
//         .pipe(gulp.dest(`assets/scss`))
// });

//compile components sass
gulp.task('sass:inject', () => {
    return gulp.src('assets/scss/styles.scss')
        .pipe($.inject(
            gulp.src(['blocks/**/*.scss', 'components/**/*.scss'], {read: false})
                .pipe($.sort()),
            {
                transform: (filepath) => {
                    let newPath = filepath
                        .replace(`/blocks/`, '../../blocks/')
                        .replace(`/components/`, '../../components/')
                        .replace(/_(.*).scss/, (match, p1, offset, string) => p1)
                        .replace('.scss', '');
                    return `@import '${newPath}';`;
                }
            }))
        .pipe(gulp.dest(`assets/scss`))
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
}

gulp.task('js:globals', ['clean:js'], jsGlobals);
function jsGlobals() {
    return gulp.src(['assets/js/*.js'])
        .pipe($.sourcemaps.init())
        .pipe(sourceUrls('.')) 
        .pipe($.uglify())
        .pipe($.rename({ suffix: '.min' }))
        .pipe($.sourcemaps.write('.'))
        .pipe(gulp.dest('assets/js'))
}

gulp.task('js:components', ['clean:components'], jsComponents);
function jsComponents() {
    var compilePublicComponents = getFolders(componentsPath).map(function(folder) {
        return gulp.src([path.join(componentsPath, folder, '/**/*.js')])
            .pipe($.sourcemaps.init())
            .pipe(sourceUrls('.')) 
            .pipe($.concat(folder + '.min.js'))
            .pipe(gulp.dest(componentsPath + folder))
            .pipe($.uglify())
            .pipe($.sourcemaps.write('.'))
            .pipe(gulp.dest(componentsPath + folder))
    });

    return compilePublicComponents;
}

gulp.task('clean:js', function () {
    return del(['assets/js/*.min.js','assets/js/**/*.min.js']);
})

gulp.task('clean:components', function () {
    return del(['components/**/*.min.js']);
})

gulp.task('default', ['sass:inject','sass', 'js:components', 'js:globals'], function() {

    $.watch(['assets/js/*.js', '!assets/js/*.min.js'], function (v) {
        logFileChange(v);
        gulp.run('js:globals');
    });
    
    $.watch(['components/**/*.js', '!components/**/*.min.js'], function (v) {
        logFileChange(v);
        gulp.run('js:components');
    });

    $.watch(['blocks/**/*.scss', 'components/**/*.scss', 'assets/scss/**/*.scss', '!assets/scss/styles.scss'], function (v) {
        logFileChange(v);
        gulp.run('sass:inject');
    });

    $.watch(['blocks/**/*.scss', 'components/**/*.scss', 'assets/scss/**/*.scss'], function (v) {
        logFileChange(v);
        gulp.run('sass');
    });
    
});