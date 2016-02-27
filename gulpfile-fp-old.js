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

// File paths to various assets are defined here.
var PATHS = {
  sass: [
    'assets/vendor/foundation-sites/scss',
    'assets/vendor/motion-ui/src',
    'assets/vendor/fontawesome/scss',
    'components/**/*.js'
  ],
  javascript: [
    'assets/vendor/what-input/what-input.js',
    'assets/vendor/foundation-sites/js/foundation.core.js',
    'assets/vendor/foundation-sites/js/foundation.util.*.js',
    'assets/vendor/foundation-sites/js/foundation.abide.js',
    'assets/vendor/foundation-sites/js/foundation.accordion.js',
    'assets/vendor/foundation-sites/js/foundation.accordionMenu.js',
    'assets/vendor/foundation-sites/js/foundation.drilldown.js',
    'assets/vendor/foundation-sites/js/foundation.dropdown.js',
    'assets/vendor/foundation-sites/js/foundation.dropdownMenu.js',
    'assets/vendor/foundation-sites/js/foundation.equalizer.js',
    'assets/vendor/foundation-sites/js/foundation.interchange.js',
    'assets/vendor/foundation-sites/js/foundation.magellan.js',
    'assets/vendor/foundation-sites/js/foundation.offcanvas.js',
    'assets/vendor/foundation-sites/js/foundation.orbit.js',
    'assets/vendor/foundation-sites/js/foundation.responsiveMenu.js',
    'assets/vendor/foundation-sites/js/foundation.responsiveToggle.js',
    'assets/vendor/foundation-sites/js/foundation.reveal.js',
    'assets/vendor/foundation-sites/js/foundation.slider.js',
    'assets/vendor/foundation-sites/js/foundation.sticky.js',
    'assets/vendor/foundation-sites/js/foundation.tabs.js',
    'assets/vendor/foundation-sites/js/foundation.toggler.js',
    'assets/vendor/foundation-sites/js/foundation.tooltip.js',

    'assets/vendor/motion-ui/motion-ui.js',

    'components/**/*.js',
  ],
  phpcs: [
    '**/*.php',
    '!wpcs',
    '!wpcs/**',
  ],
  pkg: [
    '**/*',
    '!**/node_modules/**',
    '!**/vendor/**',
    '!**/scss/**',
    '!**/bower.json',
    '!**/gulpfile.js',
    '!**/package.json',
    // '!**/composer.json',
    // '!**/composer.lock',
    '!**/codesniffer.ruleset.xml',
    '!**/packaged/*',
  ]
};

// Browsersync task
gulp.task('browser-sync', ['build'], function() {

  var files = [
            '**/*.php',
            'assets/img/**/*.{png,jpg,gif}',
          ];

  browserSync.init(files, {
    // Proxy address
    proxy: URL,

    // Port #
    // port: PORT
  });
});

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

// Copy task
gulp.task('copy', function() {
  // Foundation
  var foundationscss = gulp.src('bower_components/foundation-sites/**/*.scss')
    .pipe($.flatten())
    .pipe(gulp.dest('assets/vendor/foundation-sites/scss'));

  var foundationjs = gulp.src('bower_components/foundation-sites/**/*.js')
    .pipe($.flatten())
    .pipe(gulp.dest('assets/vendor/foundation-sites/js'));

  // Motion UI
  var motionUi = gulp.src('bower_components/motion-ui/**/*.*')
    .pipe($.flatten())
    .pipe(gulp.dest('assets/vendor/motion-ui'));

  // What Input
  var whatInput = gulp.src('bower_components/what-input/**/*.*')
      .pipe($.flatten())
      .pipe(gulp.dest('assets/vendor/what-input'));

  // Font Awesome
  var fontAwesomeFont = gulp.src('bower_components/fontawesome/fonts/**/*.*')
      .pipe(gulp.dest('assets/fonts'));

  var fontAwesomescss = gulp.src('bower_components/fontawesome/scss/**/*.*')
    .pipe(gulp.dest('assets/vendor/fontawesome/scss'));    

  return merge(foundationscss, foundationjs, motionUi, whatInput, fontAwesomeFont, fontAwesomescss);
});

// Package task
gulp.task('package', ['build'], function() {
  var fs = require('fs');
  var time = dateFormat(new Date(), "yyyy-mm-dd_HH-MM");
  var pkg = JSON.parse(fs.readFileSync('./package.json'));
  var title = pkg.name + '_' + time + '.zip';

  return gulp.src(PATHS.pkg)
    .pipe($.zip(title))
    .pipe(gulp.dest('packaged'));
});

// Build task
// Runs copy then runs sass & javascript in parallel
gulp.task('build', ['clean'], function(done) {
  sequence('copy',
          ['sass', 'javascript', 'lint'],
          done);
});

// PHP Code Sniffer task
gulp.task('phpcs', function() {
  return gulp.src(PATHS.phpcs)
    .pipe($.phpcs({
      bin: 'wpcs/vendor/bin/phpcs',
      standard: './codesniffer.ruleset.xml',
      showSniffCode: true,
    }))
    .pipe($.phpcs.reporter('log'));
});

// PHP Code Beautifier task
gulp.task('phpcbf', function () {
  return gulp.src(PATHS.phpcs)
  .pipe($.phpcbf({
    bin: 'wpcs/vendor/bin/phpcbf',
    standard: './codesniffer.ruleset.xml',
    warningSeverity: 0
  }))
  .on('error', $.util.log)
  .pipe(gulp.dest('.'));
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
gulp.task('default', ['build', 'browser-sync'], function() {
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
