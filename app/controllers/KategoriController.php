<?php

class KategoriController extends Controller
{
    private function checkAdmin()
    {
        checkRole('admin');
    }

    // ==========================
    // INDEX
    // ==========================
    public function index()
    {
        $this->checkAdmin();

        $model = $this->model('KategoriModel');

        $data['kategori'] = $model->getAll();

        $this->view('kategori/index', $data);
    }

    // ==========================
    // TAMBAH
    // ==========================
    public function tambah()
    {
        $this->checkAdmin();

        $this->view('kategori/tambah');
    }

    // ==========================
    // SIMPAN
    // ==========================
    public function simpan()
    {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nama = trim($_POST['nama_kategori']);

            if (empty($nama)) {

                setFlash('danger', 'Nama kategori wajib diisi');

                redirect('kategori/tambah');
            }

            $slug = strtolower(str_replace(' ', '-', $nama));

            $model = $this->model('KategoriModel');

            $model->insert([
                'nama_kategori' => $nama,
                'slug' => $slug
            ]);

            setFlash('success', 'Kategori berhasil ditambahkan');

            redirect('kategori');
        }
    }

    // ==========================
    // EDIT
    // ==========================
    public function edit($id)
    {
        $this->checkAdmin();

        $model = $this->model('KategoriModel');

        $data['kategori'] = $model->find($id);

        $this->view('kategori/edit', $data);
    }

    // ==========================
    // UPDATE
    // ==========================
    public function update($id)
    {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nama = trim($_POST['nama_kategori']);

            if (empty($nama)) {

                setFlash('danger', 'Nama kategori wajib diisi');

                redirect('kategori/edit/' . $id);
            }

            $slug = strtolower(str_replace(' ', '-', $nama));

            $model = $this->model('KategoriModel');

            $model->update($id, [
                'nama_kategori' => $nama,
                'slug' => $slug
            ]);

            setFlash('success', 'Kategori berhasil diupdate');

            redirect('kategori');
        }
    }

    // ==========================
    // HAPUS
    // ==========================
    public function hapus($id)
    {
        $this->checkAdmin();

        $model = $this->model('KategoriModel');

        $model->delete($id);

        setFlash('success', 'Kategori berhasil dihapus');

        redirect('kategori');
    }
}