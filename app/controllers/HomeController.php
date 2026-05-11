<?php

class HomeController extends Controller
{
    // ==========================
    // HOMEPAGE
    // ==========================
    public function index()
    {
        $informasiModel = $this->model('InformasiModel');

        $data['informasi'] = $informasiModel->latest(6);

        $this->view('frontend/home/index', $data);
    }


    // ==========================
    // LIST INFORMASI
    // ==========================
    public function informasi()
    {
        $informasiModel = $this->model('InformasiModel');

        $data['informasi'] = $informasiModel->getAll();

        $this->view('frontend/informasi/index', $data);
    }


    // ==========================
    // DETAIL INFORMASI
    // ==========================
    public function detail($slug)
    {
        $informasiModel = $this->model('InformasiModel');

        $data['informasi'] = $informasiModel->findBySlug($slug);

        if (!$data['informasi']) {

            die('Informasi tidak ditemukan');
        }

        $this->view('frontend/informasi/detail', $data);
    }


    // ==========================
    // PENGUMUMAN
    // ==========================
    public function pengumuman()
    {
        $model = $this->model('PengumumanModel');

        $data['title'] = 'Pengumuman';
        $data['pengumuman'] = $model->getAll();

        $this->view('frontend/pengumuman/index', $data);
    }


    // ==========================
    // DETAIL PENGUMUMAN
    // ==========================
    public function detailPengumuman($slug)
    {
        $model = $this->model('PengumumanModel');

        $data['pengumuman'] = $model->findBySlug($slug);

        if (!$data['pengumuman']) {

            die('Pengumuman tidak ditemukan');
        }

        $this->view('frontend/pengumuman/detail', $data);
    }


    // ==========================
    // HALAMAN KONTAK
    // ==========================
    public function kontak()
    {
        $this->view('frontend/kontak/index');
    }
}