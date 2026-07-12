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
        // return view('buku_index');
        // return 'okay';
        return view('buku/index', $data);
        // var_dump($data); die;
    }

    public function create() {
        return view('buku/create');
    }

    public function store() {
        if (!$this->validate([
            'isbn'   => 'required|regex_match[/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/]|is_unique[buku.isbn]',
            'judul'  => 'required',
            'penulis'=> 'required',
            'tahun'  => 'required|numeric|exact_length[4]',
            'stok'   => 'required|numeric'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $save = $this->buku->save($this->request->getPost());
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->buku->errors());
        }
        return redirect()->to('/buku')->with('pesan', 'Data berhasil disimpan!');
    }

    public function edit($id) {
        $data['buku'] = $this->buku->find($id);
        return view('buku/edit', $data);
    }

    public function update($id) {
        if (!$this->validate([
            'isbn'   => 'required|regex_match[/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/]',
            'judul'  => 'required',
            'penulis'=> 'required',
            'tahun'  => 'required|numeric|exact_length[4]',
            'stok'   => 'required|numeric'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $upt = $this->buku->update($id, $this->request->getPost());
        if (!$upt) {
            return redirect()->to('/buku')->with('pesan', 'Data gagal diupdate!');
        }
        return redirect()->to('/buku')->with('pesan', 'Data berhasil diupdate!');
    }

    public function delete($id) {
        $del = $this->buku->delete($id);
        if (!$del) {
            return redirect()->to('/buku')->with('pesan', 'Data gagal dihapus!');
        }
        return redirect()->to('/buku')->with('pesan', 'Data berhasil dihapus!');
    }
}