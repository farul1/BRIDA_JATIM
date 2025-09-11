import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
            publicDirectory: 'public', // pastikan file statis ada di public
        }),
    ],
    build: {
        outDir: 'public/build', // output directory untuk Vercel
        emptyOutDir: true,
        rollupOptions: {
            input: {
                app: path.resolve(__dirname, 'resources/js/app.js'),
                styles: path.resolve(__dirname, 'resources/sass/app.scss')
            }
        }
    },
    server: {
        host: true, // supaya bisa diakses di LAN jika perlu
        port: 5173
    }
});
