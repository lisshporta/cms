import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import postcssImport from 'postcss-import';
import tailwindcss from 'tailwindcss';

export default defineConfig({
  plugins: [
    laravel([
      'resources/css/app.css',
      'resources/js/app.js',
  ]),
    vue(),
  ],
  build: {
    outDir: 'public',
    manifest: true,
    rollupOptions: {
      input: 'resources/js/app.js',
    },
  },
  css: {
    postcss: {
      plugins: [
        postcssImport(),
        tailwindcss(),
      ],
    },
  },
  server: {
    proxy: {
      // add your proxy configuration here, if necessary
    },
  },
  optimizeDeps: {
    // add your dependencies that need to be pre-bundled here
  },
});
