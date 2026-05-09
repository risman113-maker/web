<?php

// ==========================
// SESSION
// ==========================
function startSession()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

// ==========================
// AUTH
// ==========================
function isLogin()
{
    startSession();
    return isset($_SESSION['user']);
}

function user()
{
    startSession();
    return $_SESSION['user'] ?? null;
}

function checkRole($role)
{
    startSession();

    if (!isset($_SESSION['user'])) {
        header('Location: index.php?url=auth');
        exit;
    }

    if ($_SESSION['user']['role'] !== $role) {
        header('Location: index.php?url=auth/logout');
        exit;
    }
}

// ==========================
// REDIRECT
// ==========================
function redirect($url)
{
    header("Location: index.php?url=$url");
    exit;
}

// ==========================
// FLASH MESSAGE
// ==========================
function setFlash($type, $message)
{
    startSession();

    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message
    ];
}

function flash()
{
    startSession();

    if (isset($_SESSION['flash'])) {

        $flash = $_SESSION['flash'];

        echo '
        <div class="alert alert-' . $flash['type'] . ' alert-dismissible fade show">
            ' . $flash['message'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        ';

        unset($_SESSION['flash']);
    }
}

// ==========================
// SIDEBAR ACTIVE
// ==========================
function activeMenu($url)
{
    $current = $_GET['url'] ?? '';

    return strpos($current, $url) !== false ? 'active' : '';
}

// ==========================
// PAGE TITLE
// ==========================
function pageTitle($title = '')
{
    return !empty($title)
        ? $title . ' - Aplikasi WEB'
        : 'Aplikasi WEB';
}
