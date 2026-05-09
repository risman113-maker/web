<?php

class KategoriController extends Controller
{
    // ================= AUTH =================
    private function checkAdmin()
    {
        checkRole('admin');
    }

    // ================= INDEX =================
    public function index()
    {
        $this->checkAdmin();

        $model = $this->model('KategoriModel');

        $data['title'] = 'Kategori';
        $data['kategori'] = $model->getAll();

        $this->view('admin/kategori/index', $data);
    }

    // ================= TAMBAH =================
    public function tambah()
    {
        $this->checkAdmin();

        $data['title'] = 'Tambah Kategori';

        $this->view('admin/kategori/tambah', $data);
    }

    // ================= SIMPAN =================
    public function simpan()
    {
        $this->checkAdmin();

        // VALIDASI METHOD
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            redirect('kategori/index');
        }

        $nama = trim($_POST['nama_kategori'] ?? '');

        // VALIDASI INPUT
        if (empty($nama)) {

            setFlash('danger', 'Nama kategori wajib diisi');

            redirect('kategori/tambah');
        }

        // GENERATE SLUG
        $slug = strtolower(str_replace(' ', '-', $nama));

        $model = $this->model('KategoriModel');

        // SIMPAN DATA
        $model->insert([
            'nama_kategori' => $nama,
            'slug'          => $slug
        ]);

        setFlash('success', 'Kategori berhasil ditambahkan');

        redirect('kategori/index');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $this->checkAdmin();

        $model = $this->model('KategoriModel');

        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $model->find($id);

        // VALIDASI DATA
        if (!$data['kategori']) {

            setFlash('danger', 'Kategori tidak ditemukan');

            redirect('kategori/index');
        }

        $this->view('admin/kategori/edit', $data);
    }

    // ================= UPDATE =================
    public function update($id)
    {
        $this->checkAdmin();

        // VALIDASI METHOD
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            redirect('kategori/index');
        }

        $nama = trim($_POST['nama_kategori'] ?? '');

        // VALIDASI INPUT
        if (empty($nama)) {

            setFlash('danger', 'Nama kategori wajib diisi');

            redirect('kategori/edit/' . $id);
        }

        // GENERATE SLUG
        $slug = strtolower(str_replace(' ', '-', $nama));

        $model = $this->model('KategoriModel');

        // UPDATE DATA
        $model->update($id, [
            'nama_kategori' => $nama,
            'slug'          => $slug
        ]);

        setFlash('success', 'Kategori berhasil diupdate');

        redirect('kategori/index');
    }

    // ================= HAPUS =================
    public function hapus($id)
    {
        $this->checkAdmin();

        $model = $this->model('KategoriModel');

        // CEK DATA
        $kategori = $model->find($id);

        if (!$kategori) {

            setFlash('danger', 'Kategori tidak ditemukan');

            redirect('kategori/index');
        }

        // HAPUS DATA
        $model->delete($id);

        setFlash('success', 'Kategori berhasil dihapus');

        redirect('kategori/index');
    }
}
