import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import postcssImport from 'postcss-import';
import tailwindcss from 'tailwindcss';

export default defineConfig({
  plugins: [
    laravel({
        input: [
            'resources/css/app.css',
            'resources/js/app.js'
        ],
        refresh: [
            'resources/routes/**',
            'app/**',
            'routes/**',
            'resources/views/**',
        ],
    })
  ],
  css: {
    postcss: {
      plugins: [
        postcssImport(),
        tailwindcss(),
      ],
    },
  },
});
