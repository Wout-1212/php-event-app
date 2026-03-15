import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['theme/main.scss', 'theme/main.js'],
      publicDirectory: 'public',
    }),
  ]
});
