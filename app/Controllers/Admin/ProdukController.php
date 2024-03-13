<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class ProdukController extends BaseController
{
    // Daftar Produk
    public function index()
    {
        //Untuk Mengubah Titlenya 
        $data = [
            'title' => 'Daftar Produk'
        ];
        return View('admin/produk/index',$data);
    }

    //Daftar Kategori Produk
    public function kategori()
    {
        //Untuk Mengubah Titlenya 
        $data = [
            'title' => 'Daftar Kategori Produk',
            'daftar_kategori' => $this->KategoriModel->findAll()

        ];
        return View('admin/produk/kategori',$data);
    }

    //Tambah Kategori Produk
    public function store()
    {
        //DUMP DIE -> untuk melihat data yang diterima 
        //dd($_POST);

        // ambil slug 
        $slug = url_title($this->request->getPost('nama_kategori'), '-', true);

        //Simpan data 
        $data = [
            //esc keamanan
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];

        $this->KategoriModel->insert($data);

        return redirect()->back()->with('success', 'Data Kategori Produk Berhasil di Tambahkan!');
    }

    //Ubah Katergori Produk 
    public function update($id_kategori)
    {
        $slug = url_title($this->request->getPost('nama_kategori'), '-', true);

        //Simpan data 
        $data = [
            //esc keamanan
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];

        $this->KategoriModel->update($id_kategori,$data);

        return redirect()->back()->with('success', 'Data Kategori Produk Berhasil di Ubah!');
    }

    //Hapus Kategori Produk 
    public function destroy($id_kategori)
    {
        $this->KategoriModel->where('id_kategori', $id_kategori)->delete();
        return redirect()->back()->with('success', 'Data Kategori Produk Berhasil di Hapus!');
    }
}
