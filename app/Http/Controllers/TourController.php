<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TourController extends Controller
{
    public function show($id)
    {
        // อ่านไฟล์ JSON
        $json = File::get(resource_path('data/tours.json'));
        $tours = json_decode($json, true);

        // หาทัวร์ที่ตรงกับ id
        $tour = collect($tours)->firstWhere('id', (int) $id);

        if (!$tour) {
            abort(404, 'ไม่พบแพ็กเกจทัวร์นี้');
        }

        // โหลดภาพทั้งหมดใน public/images/{id}
        $images = [];
        $folderPath = public_path("images/{$tour['id']}");

        if (File::isDirectory($folderPath)) {
            $files = File::glob($folderPath . '/*.{jpg,jpeg,png,webp}', GLOB_BRACE);
            sort($files); // ✅ เรียงลำดับชื่อไฟล์ให้แน่นอน
            foreach ($files as $file) {
                $relativePath = str_replace(public_path() . DIRECTORY_SEPARATOR, '', $file);
                $relativePath = str_replace('\\', '/', $relativePath);
                $images[] = asset($relativePath);
            }
        }

        if (empty($images)) {
            $images[] = asset('images/default.jpg');
        }

        // ใส่ array ของภาพทั้งหมดลงใน $tour
        $tour['images'] = $images;

        return view('pages.tour-detail', compact('tour'));
    }
}

