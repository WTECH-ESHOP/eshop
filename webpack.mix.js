const mix = require('laravel-mix')

mix
  .ts('resources/js/app.ts', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [require('tailwindcss')])
  .browserSync('127.0.0.1')
