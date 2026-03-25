import { wayfinder } from '@laravel/vite-plugin-wayfinder';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { defineConfig, type Plugin } from 'vite';

function apiDocsPlugin(): Plugin {
    return {
        name: 'api-docs-url',
        configureServer(server) {
            const _print = server.printUrls.bind(server);
            server.printUrls = () => {
                _print();
                const appUrl = process.env.APP_URL ?? 'http://localhost:8000';
                console.log(`  \x1b[32m➜\x1b[0m  \x1b[1mAPI Docs:\x1b[0m  \x1b[36m${appUrl}/docs/api\x1b[0m`);
            };
        },
    };
}

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.ts'],
            ssr: 'resources/js/ssr.ts',
            refresh: true,
        }),
        apiDocsPlugin(),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        wayfinder({
            formVariants: true,
        }),
    ],
});
