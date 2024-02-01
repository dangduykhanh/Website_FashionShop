<?php
class feedbackitemModel
{
    protected PDO $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function detelefeedback($magy)
    {
        try {
            $stmt=' UPDATE tbl_gopy
                    SET TrangThaiGY = 0
                    Where MaGY = ?';

            $prepare = $this->db->prepare($stmt);
            return $prepare->execute([$magy]);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}