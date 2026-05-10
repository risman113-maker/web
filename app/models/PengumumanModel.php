<?php

class PengumumanModel
{
    private $pdo;

    public function __construct()
    {
        require_once __DIR__ . '/../core/Database.php';

        $this->pdo = Database::getInstance()->getConnection();
    }

    // GET ALL
    public function getAll()
    {
        $stmt = $this->pdo->query("
            SELECT *
            FROM pengumuman
            ORDER BY id DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // LATEST
    public function latest($limit = 5)
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM pengumuman
            ORDER BY id DESC
            LIMIT $limit
        ");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // INSERT
    public function insert($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO pengumuman
            (judul, penulis, slug, isi, gambar, file_pdf)

            VALUES (?, ?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['judul'],
            $data['penulis'],
            $data['slug'],
            $data['isi'],
            $data['gambar'],
            $data['file_pdf']
        ]);
    }

    // FIND
    public function find($id)
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM pengumuman
            WHERE id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // FIND BY SLUG
    public function findBySlug($slug)
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM pengumuman
            WHERE slug = ?
        ");

        $stmt->execute([$slug]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE pengumuman

            SET judul = ?,
                penulis = ?,
                slug = ?,
                isi = ?,
                gambar = ?,
                file_pdf = ?

            WHERE id = ?
        ");

        return $stmt->execute([
            $data['judul'],
            $data['penulis'],
            $data['slug'],
            $data['isi'],
            $data['gambar'],
            $data['file_pdf'],
            $id
        ]);
    }

    // DELETE
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM pengumuman
            WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }
}
