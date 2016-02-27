/*jslint node: true */
"use strict";

var $           = require('gulp-load-plugins')();
var argv        = require('yargs').argv;
var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var merge       = require('merge-stream');
var sequence    = require('run-sequence');
var colors      = require('colors');
var dateFormat  = require('dateformat');
var del         = require('del');

// Enter URL of your local server here
// Example: 'http://components.dev'
var URL = '';

// Check for --production flag
var isProduction = !!(argv.production);

// Browsers to target when prefixing CSS.
var COMPATIBILITY = ['last 2 versions', 'ie >= 9'];


// Compile Sass into CSS
// In production, the CSS is compressed
gulp.task('sass', function() {
  // Minify CSS if run wtih --production flag
  var minifycss = $.if(isProduction, $.minifyCss());

  return gulp.src(['assets/scss/styles.scss', 'components/**/*.scss'])
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      includePaths: PATHS.sass
    }))
    .on('error', $.notify.onError({
        message: "<%= error.message %>",
        title: "Sass Error"
    }))
    .pipe($.autoprefixer({
      browsers: COMPATIBILITY
    }))
    .pipe(minifycss)
    .pipe($.if(!isProduction, $.sourcemaps.write('.')))
    .pipe(gulp.dest('assets/css'))
    .pipe(browserSync.stream({match: '**/*.css'}));
});

// Lint all JS files in custom directory
gulp.task('lint', function() {
  return gulp.src('components/**/*.js')
    .pipe($.jshint())
    .pipe($.notify(function (file) {
      if (file.jshint.success) {
        return false;
      }

      var errors = file.jshint.results.map(function (data) {
        if (data.error) {
          return "(" + data.error.line + ':' + data.error.character + ') ' + data.error.reason;
        }
      }).join("\n");
      return file.relative + " (" + file.jshint.results.length + " errors)\n" + errors;
    }));
});

// Combine JavaScript into one file
// In production, the file is minified
gulp.task('javascript', function() {
  var uglify = $.uglify()
    .on('error', $.notify.onError({
      message: "<%= error.message %>",
      title: "Uglify JS Error"
    }));

  return gulp.src(PATHS.javascript)
    .pipe($.sourcemaps.init())
    .pipe($.concat('js/scripts.js'))
    .pipe($.if(isProduction, uglify))
    .pipe($.if(!isProduction, $.sourcemaps.write()))
    .pipe(gulp.dest('assets'))
    .pipe(browserSync.stream());
});

// Build task
// Runs copy then runs sass & javascript in parallel
gulp.task('build', ['clean'], function(done) {
  sequence(['sass', 'javascript', 'lint'], done);
});


// Clean task
gulp.task('clean', function(done) {
  sequence(['clean:javascript', 'clean:css'],
            done);
});

// Clean JS
gulp.task('clean:javascript', function() {
  return del([
      'assets/scripts.js'
    ]);
});

// Clean CSS
gulp.task('clean:css', function() {
  return del([
      'assets/styles.css',
      'assets/styles.css.map'
    ]);
});

// Default gulp task
// Run build task and watch for file changes
gulp.task('default', ['build'], function() {
  // Log file changes to console
  function logFileChange(event) {
    var fileName = require('path').relative(__dirname, event.path);
    console.log('[' + 'WATCH'.green + '] ' + fileName.magenta + ' was ' + event.type + ', running tasks...');
  }

  // Sass Watch
  gulp.watch(['components/**/*.scss'], ['clean:css', 'sass'])
    .on('change', function(event) {
      logFileChange(event);
    });

  // JS Watch
  gulp.watch(['components/**/*.js'], ['clean:javascript', 'javascript', 'lint'])
    .on('change', function(event) {
      logFileChange(event);
    });
});