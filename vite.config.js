import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',    // Main CSS entry point
                'resources/js/app.js',      // Main JS entry point
            ],
            refresh: true,
        }),
    ],
});