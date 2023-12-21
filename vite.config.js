import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/normalize.css', 'resources/css/app.css', 'resources/js/app.js',
<<<<<<< HEAD
                'resources/css/test-vite.css', 'resources/css/equipe.css', 'resources/js/test-vite.js', 'resources/css/welcome.css',],
=======

                'resources/css/test-vite.css', 'resources/css/welcome.css', 'resources/css/equipe.css','resources/css/register.css', 'resources/css/login.css','resources/css/creeHistoire.css','resources/css/detailhistoire.css', 'resources/js/test-vite.js'],

>>>>>>> 63e78d4d3f85232365f7c8443d5b98e976a26258
            refresh: true,
        }),
    ],
});
