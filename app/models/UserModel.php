<?php

// app/models/UserModel.php

class UserModel
{
    private $pdo;

    public function __construct()
    {
        require_once __DIR__ . '/../core/Database.php';

        $this->pdo = Database::getInstance()->getConnection();
    }

    // ================= GET ALL =================
    public function getAll()
    {
        $stmt = $this->pdo->query("
            SELECT *
            FROM users
            ORDER BY role ASC, nama ASC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ================= FIND BY ID =================
    public function find($id)
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM users
            WHERE id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ================= FIND BY USERNAME =================
    public function findByUsername($username)
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM users
            WHERE username = ?
        ");

        $stmt->execute([$username]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ================= INSERT =================
    public function insert($data)
    {
        try {

            // VALIDASI USERNAME
            if ($this->findByUsername($data['username'])) {

                return false;
            }

            // FIELD
            $fields = [
                'username',
                'password',
                'nama',
                'role',
                'created_at'
            ];

            // VALUE
            $values = [
                $data['username'],
                $data['password'],
                $data['nama'],
                $data['role'],
                date('Y-m-d H:i:s')
            ];

            // OPTIONAL SISWA ID
            if (!empty($data['siswa_id'])) {

                $fields[] = 'siswa_id';
                $values[] = $data['siswa_id'];
            }

            // QUERY
            $sql = "
                INSERT INTO users
                (" . implode(', ', $fields) . ")
                VALUES
                (" . rtrim(str_repeat('?, ', count($fields)), ', ') . ")
            ";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($values);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {

            die('Gagal insert user: ' . $e->getMessage());
        }
    }

    // ================= RESET PASSWORD =================
    public function resetPassword($id, $passwordBaru)
    {
        $stmt = $this->pdo->prepare("
            UPDATE users
            SET password = ?
            WHERE id = ?
        ");

        return $stmt->execute([
            $passwordBaru,
            $id
        ]);
    }

    // ================= UPDATE =================
    public function update($id, $data)
    {
        $sql = "
            UPDATE users
            SET
                nama = :nama,
                role = :role
        ";

        $params = [
            ':nama' => $data['nama'],
            ':role' => $data['role'],
            ':id'   => $id
        ];

        // OPTIONAL PASSWORD
        if (!empty($data['password'])) {

            $sql .= ", password = :password";

            $params[':password'] = $data['password'];
        }

        // OPTIONAL SISWA ID
        if (isset($data['siswa_id'])) {

            $sql .= ", siswa_id = :siswa_id";

            $params[':siswa_id'] = $data['siswa_id'];
        }

        $sql .= " WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($params);
    }

    // ================= UPDATE BY USERNAME =================
    public function updateByUsername($username, $data)
    {
        $sql = "
            UPDATE users
            SET nama = :nama
        ";

        $params = [
            ':nama'     => $data['nama'],
            ':username' => $username
        ];

        // OPTIONAL PASSWORD
        if (!empty($data['password'])) {

            $sql .= ", password = :password";

            $params[':password'] = $data['password'];
        }

        $sql .= " WHERE username = :username";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($params);
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM users
            WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }

    // ================= DELETE BY USERNAME =================
    public function deleteByUsername($username)
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM users
            WHERE username = ?
        ");

        return $stmt->execute([$username]);
    }
}
