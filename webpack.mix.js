let mix = require('laravel-mix');
let glob = require('glob');
//const { then } = require('laravel-mix');

let sassFiles = [];
let options = [];

mix.setResourceRoot('/wp-content/themes/components-theme/');

mix.sass('assets/scss/styles.scss', 'public/')
	.sourceMaps(true, 'source-map')

// Components
glob.sync('components/**/*.scss').map(file => {
	mix.sass(file, 'public/components/css')
	// .sourceMaps(true, 'source-map')
});

glob.sync("components/**/*.js").map(file => {
	var fileName = file.split('\\').pop().split('/').pop();
	mix.babel(file, 'public/components/js/' + fileName)
		.sourceMaps(false, 'source-map');
})

getJSFiles()
	.then(function (jsFiles) {
		mix.babel(jsFiles, 'public/scripts.js')
			.sourceMaps(false, 'source-map');
	});

async function getJSFiles() {
	let jsFiles = [];

	await glob.sync("assets/js/*.js").map(file => {
		jsFiles.push(file);
	});

	return jsFiles;
}