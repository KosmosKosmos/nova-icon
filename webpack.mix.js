let mix = require('laravel-mix')

mix.setPublicPath('dist')
    .js('resources/js/field.js', 'js')
    .sass('resources/sass/field.scss', 'css')


module.exports = {
    configureWebpack: {
        devtool: 'nosources-source-map',
    }
}
