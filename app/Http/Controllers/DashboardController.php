<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $revenues = [
            'January' => 1000,
            'February' => 2000,
            // เพิ่มข้อมูลเงินรายเดือนในรูปแบบ ['Month' => 'Revenue']
        ];
    
        return view('credits.index', compact('revenues'));
    }
    
}
