let path = require('path')
let mix = require('laravel-mix')
require('laravel-mix-tailwind')
require('laravel-mix-purgecss')

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

mix.config.vue.esModule = true

mix
  .js('resources/assets/js/app.js', 'public/js')
  .less('resources/assets/less/app.less', 'public/css')
  .tailwind()
  .purgeCss({
    whitelistPatterns: [/tooltip/],
  })

if (mix.inProduction()) {
  mix.version();

  mix.extract([
    'vue',
    'vform',
    'axios',
    'vuex',
    'popper.js',
    'vue-meta',
    'js-cookie',
    'vue-router',
    'vuex-router-sync'
  ])
}

mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.json', '.vue'],
    alias: {
      '~': path.join(__dirname, './resources/assets/js')
    }
  },
  
  output: {
    chunkFilename: 'js/[name].[chunkhash].js',
    publicPath: mix.config.hmr ? '//localhost:8080' : '/'
  }
})
