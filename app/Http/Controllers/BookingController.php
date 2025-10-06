<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookingController extends Controller
{
    public function show($id)
    {
        // 📂 โหลดข้อมูลจากไฟล์ JSON
        $json = File::get(resource_path('data/tours.json'));
        $tours = json_decode($json, true);

        // 🔍 หาทัวร์ที่มี id ตรงกับที่ผู้ใช้กดมา
        $tour = collect($tours)->firstWhere('id', (int) $id);

        // ❌ ถ้าไม่พบ id ให้ขึ้น 404
        if (!$tour) {
            abort(404, 'ไม่พบแพ็กเกจทัวร์นี้');
        }

        // ✅ ส่งข้อมูลแพ็กเกจไปหน้า booking
        return view('pages.booking', compact('tour'));
    }
}
