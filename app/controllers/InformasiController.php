<?php

class InformasiController extends Controller
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

        $model = $this->model('InformasiModel');

        $data['informasi'] = $model->getAll();

        $this->view('informasi/index', $data);
    }

    // ==========================
    // TAMBAH
    // ==========================
    public function tambah()
    {
        $this->checkAdmin();

        $kategoriModel = $this->model('KategoriModel');

        $data['kategori'] = $kategoriModel->getAll();

        $this->view('informasi/tambah', $data);
    }

    // ==========================
    // SIMPAN
    // ==========================
    public function simpan()
    {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $judul = trim($_POST['judul']);
            $kategori_id = $_POST['kategori_id'];
            $isi = trim($_POST['isi']);

            // VALIDASI
            if (empty($judul) || empty($kategori_id) || empty($isi)) {

                setFlash('danger', 'Semua field wajib diisi');

                redirect('informasi/tambah');
            }

            // SLUG
            $slug = strtolower(str_replace(' ', '-', $judul));

            // UPLOAD GAMBAR
            $gambar = null;

            if (!empty($_FILES['gambar']['name'])) {

                $namaFile = time() . '_' . $_FILES['gambar']['name'];

                $tmp = $_FILES['gambar']['tmp_name'];

                move_uploaded_file(
                    $tmp,
                    'public/uploads/' . $namaFile
                );

                $gambar = $namaFile;
            }

            $model = $this->model('InformasiModel');

            $model->insert([
                'kategori_id' => $kategori_id,
                'judul' => $judul,
                'slug' => $slug,
                'isi' => $isi,
                'gambar' => $gambar
            ]);

            setFlash('success', 'Informasi berhasil ditambahkan');

            redirect('informasi');
        }
    }

    // ==========================
    // EDIT
    // ==========================
    public function edit($id)
    {
        $this->checkAdmin();

        $model = $this->model('InformasiModel');

        $kategoriModel = $this->model('KategoriModel');

        $data['informasi'] = $model->find($id);

        $data['kategori'] = $kategoriModel->getAll();

        $this->view('informasi/edit', $data);
    }

    // ==========================
    // UPDATE
    // ==========================
    public function update($id)
    {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $judul = trim($_POST['judul']);

            $kategori_id = $_POST['kategori_id'];

            $isi = trim($_POST['isi']);

            if (empty($judul) || empty($kategori_id) || empty($isi)) {

                setFlash('danger', 'Semua field wajib diisi');

                redirect('informasi/edit/' . $id);
            }

            $slug = strtolower(str_replace(' ', '-', $judul));

            $model = $this->model('InformasiModel');

            $lama = $model->find($id);

            // DEFAULT GAMBAR LAMA
            $gambar = $lama['gambar'];

            // UPLOAD BARU
            if (!empty($_FILES['gambar']['name'])) {

                $namaFile = time() . '_' . $_FILES['gambar']['name'];

                $tmp = $_FILES['gambar']['tmp_name'];

                move_uploaded_file(
                    $tmp,
                    'public/uploads/' . $namaFile
                );

                $gambar = $namaFile;
            }

            $model->update($id, [
                'kategori_id' => $kategori_id,
                'judul' => $judul,
                'slug' => $slug,
                'isi' => $isi,
                'gambar' => $gambar
            ]);

            setFlash('success', 'Informasi berhasil diupdate');

            redirect('informasi');
        }
    }

    // ==========================
    // HAPUS
    // ==========================
    public function hapus($id)
    {
        $this->checkAdmin();

        $model = $this->model('InformasiModel');

        $data = $model->find($id);

        // HAPUS GAMBAR
        if (!empty($data['gambar'])) {

            $path = 'public/uploads/' . $data['gambar'];

            if (file_exists($path)) {

                unlink($path);
            }
        }

        $model->delete($id);

        setFlash('success', 'Informasi berhasil dihapus');

        redirect('informasi');
    }
}