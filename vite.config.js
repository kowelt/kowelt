import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/admin/dashboard.css',
                'resources/css/admin/datatables.css',
                'resources/js/admin/chartist-js.js',
                'resources/js/admin/toggle-dropdown.js',
                'resources/js/admin/datatables.js',
                'resources/js/custom-javascript.js',
                // 'resources/js/custom_functions.js',
                // 'resources/js/education.js',
                // 'resources/js/work.js',
                // 'resources/js/skill.js',
                // 'resources/js/language.js',
                // 'resources/js/hobby.js',
                'resources/css/custom_css.css',
            ],
            refresh: true,
        }),
    ],
});
