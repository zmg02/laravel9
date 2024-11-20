import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
      watch: {
        usePolling: false,         // 禁用轮询监视模式
        interval: 100,             // 增加轮询的时间间隔（毫秒）
        ignored: [                 // 忽略监视的文件或文件夹
          '**/node_modules/**',    // 忽略 node_modules
          '**/vendor/**',          // 忽略 PHP 的 vendor 目录
          '**/dist/**',            // 忽略编译后的文件夹
          '**/*.log',              // 忽略日志文件
          '**/storage/**',         // 忽略 Laravel 的存储目录
        ],
      },
    },
});




