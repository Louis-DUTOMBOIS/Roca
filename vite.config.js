import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/normalize.css', 'resources/css/app.css', 'resources/js/app.js',

                'resources/css/test-vite.css', 'resources/css/welcome.css', 'resources/css/equipe.css','resources/css/register.css', 'resources/css/login.css', 'resources/js/test-vite.js',
            
            
                'https://code.jquery.com/jquery-3.6.4.min.js', c],

            refresh: true,
        }),
    ],
});
