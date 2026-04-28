<?php

use App\Http\Controllers\PartnershipController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PartnershipController::class, 'index']);
Route::post('/partnership', [PartnershipController::class, 'store'])->name('partnership.store');

Route::get('/sitemap.xml', function () {
    $content = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://huruhararunning.com/</loc>
        <lastmod>2026-04-28</lastmod>
        <changefreq>monthly</changefreq>
        <priority>1.0</priority>
    </url>
</urlset>';
    return response($content, 200)->header('Content-Type', 'application/xml');
});
