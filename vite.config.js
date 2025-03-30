import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // input: ['resources/css/app.css', 'resources/js/app.js'],
            input: [
               'resources/scss/app.scss',  // Ensure SCSS is explicitly built
                'resources/js/app.js'
            ],
            refresh: true,
         
        }),
    ],
});
