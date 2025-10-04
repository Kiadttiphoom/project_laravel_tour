<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        $json = File::get(resource_path('data/tours.json'));
        $tours = json_decode($json, true);

        foreach ($tours as &$tour) {
            $id = $tour['id'];

            // โฟลเดอร์ภาพ
            $folderPath = public_path("images/{$id}");
            $image = null;

            if (File::isDirectory($folderPath)) {
                // หาไฟล์ภาพแรกในโฟลเดอร์ (เช่น 1_1.jpg)
                $files = File::glob($folderPath . "/*.jpg");

                if (!empty($files)) {
                    // ดึงชื่อไฟล์ออกจาก path
                    $fileName = basename($files[0]);

                    // ใช้ asset() ให้แน่ใจว่าเป็น URL เต็ม
                    $image = asset("images/{$id}/{$fileName}");
                }
            }

            // ถ้าไม่มีภาพเลย
            if (!$image) {
                $image = asset('images/default.jpg');
            }

            $tour['image'] = $image;
        }

        return view('pages.home', compact('tours'));
    }
}
