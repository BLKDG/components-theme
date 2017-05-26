"use strict";

// Workflow:
// 1. build components in the "components" folder
// 2. write your SASS in the component's folder. 
//   - it is compiled then concatenated with "assets/scss/base.scss"
//   - includes perform as usual: SCSS files starting with "_" are ignored (test this)
// 3. write your JS in the component's folder
//   - don't use component.js as a filename
//   - all JS in the component's folder is concatenated in the order "node-glob" uses

// Future Features:
// - JS linting
// - production minification everywhere
// - image compression

var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var watch = require('gulp-watch');
var livereload = require('gulp-livereload');
var sourceUrls = require('gulp-source-url');
var changed = require('gulp-changed');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');

var argv = require('yargs').argv;
var colors = require('colors');
var del = require('del');
var fs = require('fs'); 
var merge = require('merge-stream');
var path = require('path');
var inject = require('gulp-inject');
var sort = require('gulp-sort');

var isProduction = !!(argv.production); // --production flag
var componentsPath = 'components/';

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

/**
 * NOTE: UNUSED - scripts.js is not being used in the project atm
 */
gulp.task('js:theme', ['clean:js'], function() {
    return gulp.src(['assets/js/custom/**/*.js']) 
        .pipe($.sourcemaps.init())
            .pipe($.concat('scripts.js'))
        .pipe($.sourcemaps.write('.')) 
        .pipe(sourceUrls('.')) 
        .pipe(gulp.dest('assets/js'));    
});

gulp.task('inject:scss', () => {
    return gulp.src('assets/scss/styles.scss')
        .pipe(inject(
            gulp.src('components/**/*.scss', {read: false})
                .pipe(sort()),
            {
                transform: (filepath) => {
                    let newPath = filepath
                        .replace(`/components/`, '../../components/')
                        .replace(/_(.*).scss/, (match, p1, offset, string) => p1)
                        .replace('.scss', '');
                    return `@import '${newPath}';`;
                }
            }))
        .pipe(gulp.dest(`assets/scss`));
});

gulp.task('sass', sass);
function sass() {
    return gulp.src(['assets/scss/styles.scss']) 
        .pipe($.sourcemaps.init())
        .pipe($.sass())
        .on('error', $.notify.onError({ message: "<%= error.message %>", title: "Sass Error" }))
        .pipe($.concat('styles.css'))
        .pipe($.autoprefixer({ browsers: ['last 2 versions', 'ie >= 9'] }))
        .pipe($.if(isProduction, $.minifyCss())) 
        .pipe( $.sourcemaps.write('.')) 
        .pipe(gulp.dest('assets/css'))
        .pipe(livereload());
}

gulp.task('js:components', ['clean:components'], jsComponents);
function jsComponents() {
    var compilePublicComponents = getFolders(componentsPath).map(function(folder) {
        return gulp.src([path.join(componentsPath, folder, '/**/*.js')]) // can use any configuration of js directory structure within component
            .pipe($.sourcemaps.init())
            .pipe(sourceUrls('.')) 
            .pipe($.concat(folder + '.min.js'))
            .pipe(gulp.dest(componentsPath + folder))
            .pipe($.uglify())
            .pipe($.sourcemaps.write('.'))
            .pipe(gulp.dest(componentsPath + folder));
    });


    return compilePublicComponents;
}

gulp.task('clean:js', function () {
    return del(['assets/js/scripts.js']);
})

gulp.task('clean:components', function () {
    return del(['components/**/*.min.js']);
})

gulp.task('default', ['inject:scss','sass', 'js:components'], function() {
    livereload.listen();

    watch(['components/**/*.js', '!components/**/*.min.js'], function (v) {
        logFileChange(v);
        gulp.run('js:components');
    });

    watch(['components/**/*.scss', 'assets/scss/**/*.scss'], function (v) {
        logFileChange(v);
        gulp.run('inject:scss');
    });

    watch(['components/**/*.scss', 'assets/scss/**/*.scss'], function (v) {
        logFileChange(v);
        gulp.run('sass');
    });
    
    watch(['*.php', '**/*.php'], function (event) {
        var fileName = require('path').relative(__dirname, event.path);
        livereload.reload(fileName);
    });

});