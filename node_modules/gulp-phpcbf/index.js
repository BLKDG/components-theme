var gutil = require('gulp-util'),
  through = require('through2'),
  exec = require('child_process').exec;

var buildCommand = function(options) {
  var opt = options || {};
  var command = opt.bin || 'phpcbf';

  if (opt.hasOwnProperty('standard')) {
    command += ' --standard="' + opt.standard + '"';
  }

  if (opt.hasOwnProperty('severity')) {
    command += ' --severity=' + parseInt(opt.severity);
  }

  if (opt.hasOwnProperty('warningSeverity')) {
    command += ' --warning-severity=' + parseInt(opt.warningSeverity);
  }

  if (opt.hasOwnProperty('errorSeverity')) {
    command += ' --error-severity=' + parseInt(opt.errorSeverity);
  }

  if (opt.hasOwnProperty('encoding')) {
    command += ' --encoding="' + opt.encoding + '"';
  }

  return command;
};

var phpcbfPlugin = function(options) {
  return through.obj(function(file, enc, callback) {
    var stream = this;

    if (file.isNull()) {
      stream.push(file);
      callback();
      return;
    }

    if (file.isStream()) {
      stream.emit('error', new gutil.PluginError('gulp-phpcbf', 'Streams are not supported'));
      callback();
      return;
    }

    var phpcbf = exec(buildCommand(options), {
      maxBuffer: Infinity
    }, function(error, stdout, stderr) {
      if (error && error.code != 1) {
        stream.emit('error', new gutil.PluginError('gulp-phpcbf', error));
      }
      file.contents = Buffer(stdout);
      stream.push(file);
      callback();
    });

    phpcbf.stdin.write(file.contents);
    phpcbf.stdin.end();
  });
};

module.exports = phpcbfPlugin;
