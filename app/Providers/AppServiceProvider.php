<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Helper untuk generate URL gambar yang kompatibel dengan local storage dan S3
        // Otomatis strip prefix 'storage/' yang ada pada data lama di DB
        if (!function_exists('storage_image_url')) {
            require_once app_path('helpers.php');
        }
    }
}
