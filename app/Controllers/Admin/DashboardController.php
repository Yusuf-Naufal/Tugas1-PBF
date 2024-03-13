<?php

namespace App\Controllers\Admin;

//Memanggil Controller
use App\Controllers\BaseController; 

class DashboardController extends BaseController
{
    public function index(): string //index () -> method
    {
        //Untuk Mengubah Titlenya 
        $data = [
            'title' => 'Dashboard'
        ];
        return view('admin/dashboard/index',$data);
    }
}
