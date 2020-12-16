<?php

namespace App\Controllers;

class Pages extends BaseController
{

    public function index() //'index' merupakan link url
    {
        $data = [
            'title' => 'Selamat Datang di Website Kamil',
            'set' => ['satu', 'dua', 'tiga']
        ];

        return view('Pages/home', $data);
    }

    public function about() //ketika metodhnya dipanggil akan mengembalikan sebuah Folder "view"
    {
        $data = [
            'title' => 'Selamat Datang diAbout',
            'set' => ['satu', 'dua', 'tiga']
        ];

        return view('Pages/about', $data);
    }

    public function contact() //ketika metodhnya dipanggil akan mengembalikan sebuah Folder "view"
    {
        $data = [
            'title' => 'Selamat Datang diContact',
            'alamat' => [
                'tipe' => 'Rumah',
                'alamat' => 'Jl. Abc',
                'kota' => 'Jakarta'
            ],
            [
                'tipe' => 'Kantor',
                'alamat' => 'Jl. CDe',
                'kota' => 'Bandung'
            ]
        ];

        return view('Pages/contact', $data);
    }
    //--------------------------------------------------------------------

}
