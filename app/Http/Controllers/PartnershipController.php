<?php

namespace App\Http\Controllers;

use App\Mail\PartnershipEnquiryMail;
use App\Models\PartnershipEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PartnershipController extends Controller
{
    public function index()
    {
        $galleryPhotos = collect(range(1, 12))->map(fn($i) => [
            'src' => asset('images/gallery/photo-' . str_pad($i, 2, '0', STR_PAD_LEFT) . '.jpg'),
            'alt' => 'Huruhara event photo ' . $i,
        ])->toArray();

        $videos = [
            ['youtube_id' => 'dQw4w9WgXcQ', 'title' => 'Huruhara Run — Event Recap 2024'],
            ['youtube_id' => 'dQw4w9WgXcQ', 'title' => 'Behind the Miles — Community Story'],
        ];

        $products = collect(range(1, 9))->map(fn($i) => [
            'src'  => asset('images/products/product-' . str_pad($i, 2, '0', STR_PAD_LEFT) . '.jpg'),
            'name' => 'Huruhara Product ' . $i,
        ])->toArray();

        $brands = [
            ['name' => 'Brand 1', 'logo' => 'brand-01.png'],
            ['name' => 'Brand 2', 'logo' => 'brand-02.png'],
            ['name' => 'Brand 3', 'logo' => 'brand-03.png'],
            ['name' => 'Brand 4', 'logo' => 'brand-04.png'],
            ['name' => 'Brand 5', 'logo' => 'brand-05.png'],
            ['name' => 'Brand 6', 'logo' => 'brand-06.png'],
            ['name' => 'Brand 7', 'logo' => 'brand-07.png'],
            ['name' => 'Brand 8', 'logo' => 'brand-08.png'],
        ];

        return view('welcome', compact('galleryPhotos', 'videos', 'brands', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'company'      => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'nullable|string|max:30',
            'budget_range' => 'nullable|string|max:50',
            'message'      => 'required|string|max:5000',
        ]);

        PartnershipEnquiry::create($validated);

        Mail::to('huruhararunning@gmail.com')
            ->send(new PartnershipEnquiryMail($validated));

        return redirect()->to(url()->previous() . '#partnership')
            ->with('partnership_success', true);
    }
}
