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
}
