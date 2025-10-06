import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { visualizer } from 'rollup-plugin-visualizer';

export default defineConfig({
  base: '',
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
    visualizer({
      open: true,
      template: 'treemap',
      filename: 'bundle-report.html',
    }),
    tailwindcss(),
  ],
});
