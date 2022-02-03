let mix = require('laravel-mix');

// setting default dist folder
mix.setPublicPath('dist');

mix.sass('src/theme-styles.scss', 'css');
mix.js(['src/js/1_scripts.js', 'src/js/2_scripts.js'], 'js/theme-js.js');