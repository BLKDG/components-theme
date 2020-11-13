let mix = require('laravel-mix');
let glob = require('glob');
//const { then } = require('laravel-mix');

let sassFiles = [];
let options = [];

getJSFiles()
	.then(function(jsFiles){
		mix.babel(jsFiles, 'public/scripts.js')
			.sourceMaps(false, 'source-map');
	});
	
// mix.sass('assets/scss/styles.scss', 'public/')
// 	.sourceMaps(true, 'source-map')


async function getJSFiles(){
	let jsFiles = [];

	await glob.sync("assets/js/*.js").map(file => {
		jsFiles.push(file);
	});
	await glob.sync("components/**/*.js").map(file => {
		jsFiles.push(file);
	})
	await glob.sync("blocks/**/*.js").map(file => {
		jsFiles.push(file);
	});
	return jsFiles;
}

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