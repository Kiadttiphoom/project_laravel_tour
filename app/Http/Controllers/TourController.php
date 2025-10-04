<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TourController extends Controller
{
    public function show($id)
    {
        // 🔹 อ่านไฟล์ JSON
        $json = File::get(resource_path('data/tours.json'));
        $tours = json_decode($json, true);

        // 🔹 หาทัวร์ตาม id (ไม่ใช่ index)
        $tour = collect($tours)->firstWhere('id', (int)$id);

        if (!$tour) {
            abort(404, 'ไม่พบแพ็กเกจทัวร์นี้');
        }

        // 🔹 ตรวจสอบและโหลดภาพทั้งหมดในโฟลเดอร์ public/images/{id}
        $images = [];
        $folderPath = public_path("images/{$tour['id']}");

        if (File::isDirectory($folderPath)) {
            // ดึงไฟล์ภาพทุกไฟล์ (ไม่จำกัดชื่อ)
            $files = File::glob($folderPath . "/*.{jpg,jpeg,png,webp}", GLOB_BRACE);

            foreach ($files as $file) {
                // ✅ แปลง path เป็น URL แบบถูกต้อง (รองรับทุก OS)
                $relativePath = str_replace(public_path() . DIRECTORY_SEPARATOR, '', $file);
                $relativePath = str_replace('\\', '/', $relativePath); // เผื่อใช้บน Windows
                $images[] = asset($relativePath);
            }
        }

        // 🔹 ถ้าไม่มีรูปเลย ให้ใช้ default.jpg
        if (empty($images)) {
            $images[] = asset('images/default.jpg');
        }

        // ✅ ผูก images กลับเข้า tour
        $tour['images'] = $images;

        // 🔹 ส่งข้อมูลไปหน้า view
        return view('pages.tour-detail', compact('tour'));
    }
}
