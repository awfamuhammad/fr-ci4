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
        echo view('layout/header', $data);
        echo view('Pages/home');
        echo view('layout/footer');
    }

    public function about() //ketika metodhnya dipanggil akan mengembalikan sebuah Folder "view"
    {
        $data = [
            'title' => 'Selamat Datang diAbout',
            'set' => ['satu', 'dua', 'tiga']
        ];
        echo view('layout/header', $data);
        echo view('Pages/about');
        echo view('layout/footer');
    }
    //--------------------------------------------------------------------

}
