const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
            'resources/views/css/home.css',
            'resources/views/css/main.css',
            'resources/views/css/select-answer.css',
            'resources/views/css/select-topic.css',
            'resources/views/css/topic-create.css',
            'resources/views/css/topics.css'
        ], 
        'public/css/style.css').version();
