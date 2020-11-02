let mix = require('laravel-mix');

mix.js(['assets/js/scripts.js'], 'public/scripts.js')
	.babel('assets/js/scripts.js', 'public/scripts-es5.js');
	
mix.sass('assets/scss/styles.scss', 'public/')
	.sourceMaps(true, 'source-map')

// mix.then(function () {
// 	console.log('gzipping files....');
// 	const { exec } = require('child_process');
// 	exec('gzip -9 -c public/scripts-es5.js > public/scripts-es5.js.gz', (err, stdout, stderr) => {
// 		if (err) {
// 			console.log('ERROR: failed to gzip scripts-es5.js')
// 		}
// 		else {
// 			console.log('COMPRESSED: public/scripts-es5.js.gz');
// 		}
// 	});
// 	exec('gzip -9 -c public/styles.css > public/styles.css.gz', (err, stdout, stderr) => {
// 		if (err) {
// 			console.log('ERROR: failed to gzip styles.css')
// 		}
// 		else {
// 			console.log('COMPRESSED: public/styles.css.gz');
// 		}
// 	});
// });