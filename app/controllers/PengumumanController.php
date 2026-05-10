<?php

class PengumumanController extends Controller
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

        $model = $this->model('PengumumanModel');

        $data['title'] = 'Pengumuman';
        $data['pengumuman'] = $model->getAll();

        $this->view('admin/pengumuman/index', $data);
    }

    // ================= TAMBAH =================
    public function tambah()
    {
        $this->checkAdmin();

        $data['title'] = 'Tambah Pengumuman';

        $this->view('admin/pengumuman/tambah', $data);
    }

    // ================= SIMPAN =================
    public function simpan()
    {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            redirect('admin/pengumuman');
            exit;
        }

        $judul   = trim($_POST['judul'] ?? '');
        $penulis = trim($_POST['penulis'] ?? '');
        $isi     = trim($_POST['isi'] ?? '');

        // VALIDASI
        if (empty($judul) || empty($penulis) || empty($isi)) {

            setFlash('danger', 'Semua field wajib diisi');

            redirect('admin/pengumuman/tambah');
            exit;
        }

        // SLUG
        $slug = strtolower(
            preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)
        );

        // ================= UPLOAD GAMBAR =================
        $gambar = null;

        if (!empty($_FILES['gambar']['name'])) {

            $tmp  = $_FILES['gambar']['tmp_name'];

            $size = $_FILES['gambar']['size'];

            $check = getimagesize($tmp);

            if ($check === false) {

                setFlash('danger', 'File gambar tidak valid');

                redirect('admin/pengumuman/tambah');
                exit;
            }

            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            $ext = strtolower(
                pathinfo(
                    $_FILES['gambar']['name'],
                    PATHINFO_EXTENSION
                )
            );

            if (!in_array($ext, $allowed)) {

                setFlash('danger', 'Format gambar tidak didukung');

                redirect('admin/pengumuman/tambah');
                exit;
            }

            if ($size > 2 * 1024 * 1024) {

                setFlash('danger', 'Ukuran gambar maksimal 2MB');

                redirect('admin/pengumuman/tambah');
                exit;
            }

            $namaFile = uniqid('img_') . '.' . $ext;

            move_uploaded_file(
                $tmp,
                'public/uploads/pengumuman/' . $namaFile
            );

            $gambar = $namaFile;
        }

        // ================= UPLOAD PDF =================
        $file_pdf = null;

        if (!empty($_FILES['file_pdf']['name'])) {

            $tmpPdf  = $_FILES['file_pdf']['tmp_name'];

            $sizePdf = $_FILES['file_pdf']['size'];

            $extPdf = strtolower(
                pathinfo(
                    $_FILES['file_pdf']['name'],
                    PATHINFO_EXTENSION
                )
            );

            if ($extPdf !== 'pdf') {

                setFlash('danger', 'File harus PDF');

                redirect('admin/pengumuman/tambah');
                exit;
            }

            if ($sizePdf > 5 * 1024 * 1024) {

                setFlash('danger', 'Ukuran PDF maksimal 5MB');

                redirect('admin/pengumuman/tambah');
                exit;
            }

            $namaPdf = uniqid('pdf_') . '.pdf';

            move_uploaded_file(
                $tmpPdf,
                'public/uploads/pengumuman/' . $namaPdf
            );

            $file_pdf = $namaPdf;
        }

        // SIMPAN
        $model = $this->model('PengumumanModel');

        $model->insert([
            'judul'    => $judul,
            'penulis'  => $penulis,
            'slug'     => $slug,
            'isi'      => $isi,
            'gambar'   => $gambar,
            'file_pdf' => $file_pdf
        ]);

        setFlash('success', 'Pengumuman berhasil ditambahkan');

        redirect('admin/pengumuman');
        exit;
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $this->checkAdmin();

        $model = $this->model('PengumumanModel');

        $data['title'] = 'Edit Pengumuman';
        $data['pengumuman'] = $model->find($id);

        if (!$data['pengumuman']) {

            setFlash('danger', 'Pengumuman tidak ditemukan');

            redirect('admin/pengumuman');
            exit;
        }

        $this->view('admin/pengumuman/edit', $data);
    }

    // ================= UPDATE =================
    public function update($id)
    {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            redirect('admin/pengumuman');
            exit;
        }

        $judul   = trim($_POST['judul'] ?? '');
        $penulis = trim($_POST['penulis'] ?? '');
        $isi     = trim($_POST['isi'] ?? '');

        $slug = strtolower(
            preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)
        );

        $model = $this->model('PengumumanModel');

        $lama = $model->find($id);

        if (!$lama) {

            setFlash('danger', 'Pengumuman tidak ditemukan');

            redirect('admin/pengumuman');
            exit;
        }

        // DEFAULT
        $gambar   = $lama['gambar'];
        $file_pdf = $lama['file_pdf'];

        // ================= UPDATE GAMBAR =================
        if (!empty($_FILES['gambar']['name'])) {

            $ext = strtolower(
                pathinfo(
                    $_FILES['gambar']['name'],
                    PATHINFO_EXTENSION
                )
            );

            $namaFile = uniqid('img_') . '.' . $ext;

            move_uploaded_file(
                $_FILES['gambar']['tmp_name'],
                'public/uploads/pengumuman/' . $namaFile
            );

            if (!empty($lama['gambar'])) {

                $oldPath = 'public/uploads/pengumuman/' . $lama['gambar'];

                if (file_exists($oldPath)) {

                    unlink($oldPath);
                }
            }

            $gambar = $namaFile;
        }

        // ================= UPDATE PDF =================
        if (!empty($_FILES['file_pdf']['name'])) {

            $namaPdf = uniqid('pdf_') . '.pdf';

            move_uploaded_file(
                $_FILES['file_pdf']['tmp_name'],
                'public/uploads/pengumuman/' . $namaPdf
            );

            if (!empty($lama['file_pdf'])) {

                $oldPdf = 'public/uploads/pengumuman/' . $lama['file_pdf'];

                if (file_exists($oldPdf)) {

                    unlink($oldPdf);
                }
            }

            $file_pdf = $namaPdf;
        }

        // UPDATE
        $model->update($id, [
            'judul'    => $judul,
            'penulis'  => $penulis,
            'slug'     => $slug,
            'isi'      => $isi,
            'gambar'   => $gambar,
            'file_pdf' => $file_pdf
        ]);

        setFlash('success', 'Pengumuman berhasil diupdate');

        redirect('admin/pengumuman');
        exit;
    }

    // ================= HAPUS =================
    public function hapus($id)
    {
        $this->checkAdmin();

        $model = $this->model('PengumumanModel');

        $data = $model->find($id);

        if ($data) {

            if (!empty($data['gambar'])) {

                $path = 'public/uploads/pengumuman/' . $data['gambar'];

                if (file_exists($path)) {

                    unlink($path);
                }
            }

            if (!empty($data['file_pdf'])) {

                $pathPdf = 'public/uploads/pengumuman/' . $data['file_pdf'];

                if (file_exists($pathPdf)) {

                    unlink($pathPdf);
                }
            }

            $model->delete($id);
        }

        setFlash('success', 'Pengumuman berhasil dihapus');

        redirect('admin/pengumuman');
        exit;
    }
}
