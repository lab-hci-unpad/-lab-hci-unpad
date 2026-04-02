<?php

if (!function_exists('storage_image_url')) {
    /**
     * Generate URL gambar dari path yang disimpan di database.
     * Kompatibel dengan path lama (prefix 'storage/') maupun path baru.
     * Lokal: menggunakan disk 'public' → /storage/path
     * Server: menggunakan disk 's3' → https://bucket.s3.amazonaws.com/path
     *
     * @param string|null $path
     * @return string|null
     */
    function storage_image_url(?string $path): ?string
    {
        if (!$path) return null;

        // Jika sudah berupa URL penuh (https://...), kembalikan langsung
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        // Strip prefix 'storage/' dari data lama di DB agar konsisten
        // Data lama: 'storage/news/featured/xxx.jpg'
        // Data baru: 'news/featured/xxx.jpg'
        $cleanPath = preg_replace('/^storage\//', '', $path);

        return \Illuminate\Support\Facades\Storage::url($cleanPath);
    }
}
