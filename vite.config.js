import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/add_purchase.js',
                'resources/js/edit_purchase.js'
            ],
            refresh: true,
        }),
    ],
});
