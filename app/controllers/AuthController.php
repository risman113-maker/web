<?php

class AuthController extends Controller
{
    public function index()
    {
        $this->view('pages/login');
    }

    public function login()
    {
        require_once 'app/core/Database.php';

        $pdo = Database::getInstance()->getConnection();

        startSession();

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Validasi input kosong
        if (empty($username) || empty($password)) {

            setFlash('danger', 'Username dan password wajib diisi');

            redirect('auth');
        }

        // Ambil user berdasarkan username
        $stmt = $pdo->prepare("
            SELECT * FROM users 
            WHERE username = ?
        ");

        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Validasi login
        if ($user && password_verify($password, $user['password'])) {

            // Update last login
            $update = $pdo->prepare("
                UPDATE users 
                SET last_login = NOW() 
                WHERE id = ?
            ");

            $update->execute([$user['id']]);

            // Simpan session login
            $_SESSION['user'] = [
                'id'       => $user['id'],
                'username' => $user['username'],
                'nama'     => $user['nama'],
                'role'     => $user['role']
            ];

            // Redirect berdasarkan role
            switch ($user['role']) {

                case 'admin':
                    redirect('admin/dashboard');
                    break;

                default:
                    redirect('auth/logout');
                    break;
            }

        } else {

            setFlash('danger', 'Username atau password salah');

            redirect('auth');
        }
    }

    public function logout()
    {
        startSession();

        session_destroy();

        redirect('auth');
    }
}