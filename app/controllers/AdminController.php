<?php
class AdminController extends Controller
{
    // ================= HELPER =================
    private function checkAdmin()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: index.php?url=auth/login');
            exit;
        }
    }

    // ================= DASHBOARD =================
    public function dashboard()
    {
        $this->checkAdmin();
        $this->view('admin/dashboard');
    }

    public function index()
    {
        header("Location: index.php?url=admin/dashboard");
        exit;
    }

    // ================= USER =================
    public function admin()
    {
        $this->checkAdmin();

        $model = $this->model('UserModel');
        $data['users'] = $model->getAll();

        $this->view('admin/users/index', $data);
    }

    public function tambah_user()
    {
        $this->checkAdmin();
        $this->view('admin/users/tambah_user');
    }

    public function simpan_user()
    {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = trim($_POST['username'] ?? '');
            $nama     = trim($_POST['nama'] ?? '');
            $role     = $_POST['role'] ?? '';

            if (empty($username) || empty($nama) || empty($role)) {
                $_SESSION['error'] = "Semua field wajib diisi.";
                header('Location: index.php?url=admin/tambah_user');
                exit;
            }

            $model = $this->model('UserModel');

            if ($model->findByUsername($username)) {
                $_SESSION['error'] = "Username sudah digunakan.";
                header('Location: index.php?url=admin/tambah_user');
                exit;
            }

            $model->insert([
                'username' => $username,
                'nama'     => $nama,
                'role'     => $role,
                'password' => password_hash('123456', PASSWORD_BCRYPT)
            ]);

            $_SESSION['success'] = "User berhasil ditambahkan.";
            header('Location: index.php?url=admin/admin');
            exit;
        }
    }

    public function reset_password($id)
    {
        $this->checkAdmin();

        $model = $this->model('UserModel');
        $model->resetPassword($id, password_hash('123456', PASSWORD_BCRYPT));

        $_SESSION['success'] = "Password berhasil direset.";
        header('Location: index.php?url=admin/admin');
        exit;
    }

    public function hapus_user($id)
    {
        $this->checkAdmin();

        $model = $this->model('UserModel');
        $model->delete($id);

        $_SESSION['success'] = "User berhasil dihapus.";
        header('Location: index.php?url=admin/admin');
        exit;
    }


}