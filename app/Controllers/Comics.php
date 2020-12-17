<?php

namespace App\Controllers;

use App\Models\ComicsModel;

class Comics extends BaseController
{
    protected $comicsModel; //property
    public function __construct() //untuk bisa multi metodh seperti detail, tambah, dll.
    {
        $this->comicsModel = new ComicsModel(); //OBJECT ORIENTID
    }

    public function index()
    {
        // $comics = $this->comicsModel->findAll();

        $data = [
            'title' => 'Daftar Komik',
            'comics' => $this->comicsModel->getComics()
        ];

        // koneksi ke database
        // $db = \Config\Database::connect();
        // $comics = $db->query("SELECT * FROM comics");

        // foreach ($comics->getResultArray() as $row) {
        //     d($row);
        // }

        // $comicsModel = new \App\Models\ComicsModel();

        return view('comics/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'comic' => $this->comicsModel->getComics($slug)
        ];
        return view('comics/detail', $data);
    }

    //--------------------------------------------------------------------

}
