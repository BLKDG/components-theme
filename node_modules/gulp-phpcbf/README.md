# gulp-phpcbf [![NPM version](https://badge.fury.io/js/gulp-phpcbf.png)](https://www.npmjs.org/package/gulp-phpcbf)

> Gulp plugin for running [PHP Code Beautifier](https://github.com/squizlabs/PHP_CodeSniffer).

> WARNING - This will modify your source files, ensure things are backed up!

## Install

* Install the plugin with the following command:

```shell
npm install gulp-phpcbf --save-dev
```

* [Install PHP Code Beautifier](https://github.com/squizlabs/PHP_CodeSniffer#installation)


## Usage

```js
var gulp = require('gulp');
var phpcbf = require('gulp-phpcbf');
var gutil = require('gutil');

gulp.task('phpcbf', function () {
  return gulp.src(['src/**/*.php', '!src/vendor/**/*.*'])
  .pipe(phpcbf({
    bin: 'phpcbf',
    standard: 'PSR2',
    warningSeverity: 0
  }))
  .on('error', gutil.log)
  .pipe(gulp.dest('src'));
});
```

Inspired by [gulp-phpcs](https://github.com/JustBlackBird/gulp-phpcs).
