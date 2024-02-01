<?php
class customeritemModel
{
    protected PDO $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function detelecustomer($makh)
    {
        try {
            $stmt=' UPDATE tbl_khachhang
                    SET TrangThaiKH = 0
                    Where MaKH = ?';

            $prepare = $this->db->prepare($stmt);
            return $prepare->execute([$makh]);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}