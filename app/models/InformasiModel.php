<?php

class InformasiModel
{
    private $pdo;

    public function __construct()
    {
        require_once __DIR__ . '/../core/Database.php';

        $this->pdo = Database::getInstance()->getConnection();
    }

    // ==========================
    // GET ALL
    // ==========================
    public function getAll()
    {
        $stmt = $this->pdo->query("
            SELECT informasi.*, kategori.nama_kategori
            FROM informasi

            JOIN kategori
            ON informasi.kategori_id = kategori.id

            ORDER BY informasi.id DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // ==========================
    // INFORMASI TERBARU
    // ==========================
    public function latest($limit = 6)
    {
        $stmt = $this->pdo->prepare("
            SELECT informasi.*, kategori.nama_kategori

            FROM informasi

            JOIN kategori
            ON informasi.kategori_id = kategori.id

            ORDER BY informasi.id DESC

            LIMIT $limit
        ");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ==========================
    // INSERT
    // ==========================
    public function insert($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO informasi
            (kategori_id, judul, penulis, slug, isi, gambar)

            VALUES (?, ?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['kategori_id'],
            $data['judul'],
            $data['penulis'],
            $data['slug'],
            $data['isi'],
            $data['gambar']
        ]);
    }

    // ==========================
    // FIND
    // ==========================
    public function find($id)
    {
        $stmt = $this->pdo->prepare("
            SELECT * FROM informasi
            WHERE id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ==========================
    // UPDATE
    // ==========================
    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE informasi

            SET kategori_id = ?,
                judul = ?,
                penulis = ?,
                slug = ?,
                isi = ?,
                gambar = ?

            WHERE id = ?
        ");

        return $stmt->execute([
            $data['kategori_id'],
            $data['judul'],
            $data['penulis'],
            $data['slug'],
            $data['isi'],
            $data['gambar'],
            $id
        ]);
    }

    // ==========================
    // DELETE
    // ==========================
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM informasi
            WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }


    // ==========================
    // FIND BY SLUG
    // ==========================
    public function findBySlug($slug)
    {
        $stmt = $this->pdo->prepare("
            SELECT informasi.*, kategori.nama_kategori

            FROM informasi

            JOIN kategori
            ON informasi.kategori_id = kategori.id

            WHERE informasi.slug = ?
        ");

        $stmt->execute([$slug]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
