import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import Pusher from 'pusher-js';

export default defineConfig({
    
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    
    define: {
        'process.env': process.env,
    },

    optimizeDeps: {
        include: ['pusher-js'],
    },
});