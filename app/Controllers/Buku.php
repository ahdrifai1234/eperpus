<?php
namespace App\Controllers;
use App\Models\BukuModel;

class Buku extends BaseController {
    protected $buku;

    public function __construct() {
        $this->buku = new BukuModel();
    }

    public function index() {
        $data['buku'] = $this->buku->findAll();
        return view('eperpus/index', $data);
    }

    public function create() {
        helper(['form']);
        return view('eperpus/create');
    }

    public function store() {
        helper(['form']);
        $rules = [
            'isbn'   => 'required',
            'judul'  => 'required',
            'tahun'  => 'required|numeric|exact_length[4]',
            'stok'   => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->buku->save($this->request->getPost());
        return redirect()->to('/eperpus')->with('success', 'Buku berhasil ditambahkan!');
    }
}