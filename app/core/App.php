<?php
class App
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        if (isset($url[0]) && file_exists('app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }

        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseURL()
    {
        if (isset($_GET['url'])) {

            $url = trim($_GET['url'], '/');

            // ==========================
            // LOGIN
            // ==========================
            if ($url == 'login') {

                return ['auth', 'index'];
            }

            // ==========================
            // LOGOUT
            // ==========================
            if ($url == 'logout') {

                return ['auth', 'logout'];
            }

            // ==========================
            // ADMIN INFORMASI
            // ==========================

            // INDEX
            if ($url == 'admin/informasi') {

                return ['admin', 'informasi'];
            }

            // TAMBAH
            if ($url == 'admin/informasi/tambah') {

                return ['informasi', 'tambah'];
            }

            // SIMPAN
            if ($url == 'admin/informasi/simpan') {

                return ['informasi', 'simpan'];
            }

            // EDIT
            if (preg_match('#^admin/informasi/edit/([0-9]+)$#', $url, $matches)) {

                return ['informasi', 'edit', $matches[1]];
            }

            // UPDATE
            if (preg_match('#^admin/informasi/update/([0-9]+)$#', $url, $matches)) {

                return ['informasi', 'update', $matches[1]];
            }

            // HAPUS
            if (preg_match('#^admin/informasi/hapus/([0-9]+)$#', $url, $matches)) {

                return ['informasi', 'hapus', $matches[1]];
            }



            // ==========================
            // ADMIN PENGUMUMAN
            // ==========================

            // INDEX
            if ($url == 'admin/pengumuman') {

                return ['pengumuman', 'index'];
            }

            // TAMBAH
            if ($url == 'admin/pengumuman/tambah') {

                return ['pengumuman', 'tambah'];
            }

            // SIMPAN
            if ($url == 'admin/pengumuman/simpan') {

                return ['pengumuman', 'simpan'];
            }

            // EDIT
            if (preg_match('#^admin/pengumuman/edit/([0-9]+)$#', $url, $matches)) {

                return ['pengumuman', 'edit', $matches[1]];
            }

            // UPDATE
            if (preg_match('#^admin/pengumuman/update/([0-9]+)$#', $url, $matches)) {

                return ['pengumuman', 'update', $matches[1]];
            }

            // HAPUS
            if (preg_match('#^admin/pengumuman/hapus/([0-9]+)$#', $url, $matches)) {

                return ['pengumuman', 'hapus', $matches[1]];
            }

            // ==========================
            // INFORMASI FRONTEND
            // ==========================
            if ($url == 'informasi') {

                return ['home', 'informasi'];
            }

            // DETAIL INFORMASI FRONTEND
            if (preg_match('#^informasi/(.+)$#', $url, $matches)) {

                return ['home', 'detail', $matches[1]];
            }


            // ==========================
            // PENGUMUMAN FRONTEND
            // ==========================

            // INDEX
            if ($url == 'pengumuman') {

                return ['home', 'pengumuman'];
            }

            // DETAIL
            if (preg_match('#^pengumuman/(.+)$#', $url, $matches)) {

                return ['home', 'detailPengumuman', $matches[1]];
            }


            return explode('/', filter_var($url, FILTER_SANITIZE_URL));
        }

        return [];
    }
}
