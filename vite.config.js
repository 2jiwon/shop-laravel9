import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';

const env = loadEnv('', process.cwd(), '');

export default defineConfig({
    server: {
        host: env.SERVER_IP,
        port: env.VITE_PORT,
        strictPort: true,
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
