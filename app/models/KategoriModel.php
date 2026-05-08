<?php

class KategoriModel
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
            SELECT * FROM kategori
            ORDER BY id DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ==========================
    // INSERT
    // ==========================
    public function insert($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO kategori
            (nama_kategori, slug)
            VALUES (?, ?)
        ");

        return $stmt->execute([
            $data['nama_kategori'],
            $data['slug']
        ]);
    }

    // ==========================
    // FIND BY ID
    // ==========================
    public function find($id)
    {
        $stmt = $this->pdo->prepare("
            SELECT * FROM kategori
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
            UPDATE kategori
            SET nama_kategori = ?,
                slug = ?
            WHERE id = ?
        ");

        return $stmt->execute([
            $data['nama_kategori'],
            $data['slug'],
            $id
        ]);
    }

    // ==========================
    // DELETE
    // ==========================
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM kategori
            WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }
}