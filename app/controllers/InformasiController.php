<?php

class InformasiController extends Controller
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

        $model = $this->model('InformasiModel');

        $data['title'] = 'Informasi';
        $data['informasi'] = $model->getAll();

        $this->view('admin/informasi/index', $data);
    }

    // ================= TAMBAH =================
    public function tambah()
    {
        $this->checkAdmin();

        $kategoriModel = $this->model('KategoriModel');

        $data['title'] = 'Tambah Informasi';
        $data['kategori'] = $kategoriModel->getAll();

        $this->view('admin/informasi/tambah', $data);
    }

    // ================= SIMPAN =================
    public function simpan()
    {
        $this->checkAdmin();

        // VALIDASI METHOD
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            redirect('admin/informasi');
            exit;
        }

        $judul       = trim($_POST['judul'] ?? '');
        $penulis = trim($_POST['penulis'] ?? '');
        $kategori_id = trim($_POST['kategori_id'] ?? '');
        $isi         = trim($_POST['isi'] ?? '');


        // VALIDASI INPUT
        if (empty($judul) || empty($kategori_id) || empty($isi)) {

            setFlash('danger', 'Semua field wajib diisi');

            redirect('admin/informasi/tambah');
            exit;
        }

        // GENERATE SLUG
        $slug = strtolower(
            preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)
        );

        // UPLOAD GAMBAR
        $gambar = null;

        if (!empty($_FILES['gambar']['name'])) {

            $tmp  = $_FILES['gambar']['tmp_name'];
            $size = $_FILES['gambar']['size'];

            // VALIDASI FILE IMAGE
            $check = getimagesize($tmp);

            if ($check === false) {

                setFlash('danger', 'File harus berupa gambar');

                redirect('admin/informasi/tambah');
                exit;
            }

            // VALIDASI EXTENSION
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            $ext = strtolower(
                pathinfo(
                    $_FILES['gambar']['name'],
                    PATHINFO_EXTENSION
                )
            );

            if (!in_array($ext, $allowed)) {

                setFlash('danger', 'Format gambar tidak didukung');

                redirect('admin/informasi/tambah');
                exit;
            }

            // VALIDASI SIZE (2MB)
            if ($size > 2 * 1024 * 1024) {

                setFlash('danger', 'Ukuran gambar maksimal 2MB');

                redirect('admin/informasi/tambah');
                exit;
            }

            // NAMA FILE AMAN
            $namaFile = uniqid('img_') . '.' . $ext;

            // UPLOAD
            move_uploaded_file(
                $tmp,
                'public/uploads/' . $namaFile
            );

            $gambar = $namaFile;
        }
        $model = $this->model('InformasiModel');

        // SIMPAN DATA
        $model->insert([
            'kategori_id' => $kategori_id,
            'judul'       => $judul,
            'penulis'       => $penulis,
            'slug'        => $slug,
            'isi'         => $isi,
            'gambar'      => $gambar

        ]);

        setFlash('success', 'Informasi berhasil ditambahkan');

        redirect('admin/informasi');
        exit;
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $this->checkAdmin();

        $model = $this->model('InformasiModel');

        $kategoriModel = $this->model('KategoriModel');

        $data['title'] = 'Edit Informasi';
        $data['informasi'] = $model->find($id);
        $data['kategori'] = $kategoriModel->getAll();

        // VALIDASI DATA
        if (!$data['informasi']) {

            setFlash('danger', 'Informasi tidak ditemukan');

            redirect('admin/informasi');
            exit;
        }

        $this->view('admin/informasi/edit', $data);
    }

    // ================= UPDATE =================
    public function update($id)
    {
        $this->checkAdmin();

        // VALIDASI METHOD
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            redirect('admin/informasi');
            exit;
        }

        $judul       = trim($_POST['judul'] ?? '');
        $penulis = trim($_POST['penulis'] ?? '');
        $kategori_id = trim($_POST['kategori_id'] ?? '');
        $isi         = trim($_POST['isi'] ?? '');


        // VALIDASI INPUT
        if (empty($judul) || empty($kategori_id) || empty($isi)) {

            setFlash('danger', 'Semua field wajib diisi');

            redirect('admin/informasi/edit/' . $id);
            exit;
        }

        // GENERATE SLUG
        $slug = strtolower(str_replace(' ', '-', $judul));

        $model = $this->model('InformasiModel');

        $lama = $model->find($id);

        // VALIDASI DATA
        if (!$lama) {

            setFlash('danger', 'Informasi tidak ditemukan');

            redirect('admin/informasi');
            exit;
        }

        // DEFAULT GAMBAR LAMA
        $gambar = $lama['gambar'];

        // ================= UPLOAD GAMBAR BARU =================
        if (!empty($_FILES['gambar']['name'])) {

            $namaFile = time() . '_' . $_FILES['gambar']['name'];

            $tmp = $_FILES['gambar']['tmp_name'];

            // PATH GAMBAR LAMA
            $oldPath = 'public/uploads/' . $lama['gambar'];

            // HAPUS GAMBAR LAMA
            if (!empty($lama['gambar']) && file_exists($oldPath)) {

                unlink($oldPath);
            }

            // UPLOAD GAMBAR BARU
            move_uploaded_file(
                $tmp,
                'public/uploads/' . $namaFile
            );

            $gambar = $namaFile;
        }

        // UPDATE DATA
        $model->update($id, [
            'kategori_id' => $kategori_id,
            'judul'       => $judul,
            'penulis' => $penulis,
            'slug'        => $slug,
            'isi'         => $isi,
            'gambar'      => $gambar

        ]);

        setFlash('success', 'Informasi berhasil diupdate');

        redirect('admin/informasi');
        exit;
    }

    // ================= HAPUS =================
    public function hapus($id)
    {
        $this->checkAdmin();

        $model = $this->model('InformasiModel');

        $data = $model->find($id);

        // VALIDASI DATA
        if (!$data) {

            setFlash('danger', 'Informasi tidak ditemukan');

            redirect('admin/informasi');
            exit;
        }

        // HAPUS GAMBAR
        if (!empty($data['gambar'])) {

            $path = 'public/uploads/' . $data['gambar'];

            if (file_exists($path)) {

                unlink($path);
            }
        }

        // HAPUS DATA
        $model->delete($id);

        setFlash('success', 'Informasi berhasil dihapus');

        redirect('admin/informasi');
        exit;
    }
}
