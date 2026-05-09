<?php

class AdminController extends Controller
{
    // ================= AUTH =================
    private function checkAdmin()
    {
        if (session_status() === PHP_SESSION_NONE) {

            session_start();
        }

        if (
            !isset($_SESSION['user']) ||
            $_SESSION['user']['role'] !== 'admin'
        ) {

            redirect('auth/login');
            exit;
        }
    }

    // ================= DEFAULT =================
    public function index()
    {
        $this->checkAdmin();

        redirect('admin/dashboard');
        exit;
    }

    // ================= DASHBOARD =================
    public function dashboard()
    {
        $this->checkAdmin();

        $data['title'] = 'Dashboard';

        $this->view('admin/dashboard', $data);
    }

    // ================= INFORMASI =================
    public function informasi()
    {
        $this->checkAdmin();

        $model = $this->model('InformasiModel');

        $data['title'] = 'Informasi';
        $data['informasi'] = $model->getAll();

        $this->view('admin/informasi/index', $data);
    }

    // ================= USERS =================
    public function users()
    {
        $this->checkAdmin();

        $model = $this->model('UserModel');

        $data['title'] = 'Manajemen User';
        $data['users'] = $model->getAll();

        $this->view('admin/users/index', $data);
    }

    // ================= TAMBAH USER =================
    public function tambah_user()
    {
        $this->checkAdmin();

        $data['title'] = 'Tambah User';

        $this->view('admin/users/tambah_user', $data);
    }

    // ================= SIMPAN USER =================
    public function simpan_user()
    {
        $this->checkAdmin();

        // VALIDASI METHOD
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            redirect('admin/users');
            exit;
        }

        $username = trim($_POST['username'] ?? '');
        $nama     = trim($_POST['nama'] ?? '');
        $role     = trim($_POST['role'] ?? '');

        // VALIDASI INPUT
        if (empty($username) || empty($nama) || empty($role)) {

            setFlash('danger', 'Semua field wajib diisi');

            redirect('admin/tambah_user');
            exit;
        }

        $model = $this->model('UserModel');

        // CEK USERNAME
        if ($model->findByUsername($username)) {

            setFlash('danger', 'Username sudah digunakan');

            redirect('admin/tambah_user');
            exit;
        }

        // SIMPAN USER
        $model->insert([
            'username' => $username,
            'nama'     => $nama,
            'role'     => $role,
            'password' => password_hash('123456', PASSWORD_BCRYPT)
        ]);

        setFlash('success', 'User berhasil ditambahkan');

        redirect('admin/users');
        exit;
    }

    // ================= RESET PASSWORD =================
    public function reset_password($id)
    {
        $this->checkAdmin();

        $model = $this->model('UserModel');

        // VALIDASI DATA
        $user = $model->find($id);

        if (!$user) {

            setFlash('danger', 'User tidak ditemukan');

            redirect('admin/users');
            exit;
        }

        // RESET PASSWORD
        $model->resetPassword(
            $id,
            password_hash('123456', PASSWORD_BCRYPT)
        );

        setFlash('success', 'Password berhasil direset');

        redirect('admin/users');
        exit;
    }

    // ================= HAPUS USER =================
    public function hapus_user($id)
    {
        $this->checkAdmin();

        $model = $this->model('UserModel');

        // VALIDASI DATA
        $user = $model->find($id);

        if (!$user) {

            setFlash('danger', 'User tidak ditemukan');

            redirect('admin/users');
            exit;
        }

        // HAPUS USER
        $model->delete($id);

        setFlash('success', 'User berhasil dihapus');

        redirect('admin/users');
        exit;
    }
}
