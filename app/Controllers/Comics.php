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
            'comics' => $this->comicsModel->getComics($slug)
        ];

        // data not found
        if (empty($data['comics'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $slug . ' tidak ditemulan');
        }
        return view('comics/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Komik',
        ];

        return view('comics/create', $data);
    }

    public function save()
    {
        // dd($this->request->getVar('judul'));
        // inset to database
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->comicsModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('Pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/comics');
    }
    //--------------------------------------------------------------------

}
