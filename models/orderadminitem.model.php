<?php
class orderadminitemModel
{
    protected PDO $db;
    public function __construct($db)
    {
        $this->db=$db;
    }

    public function deteleorder($madh)
    {
        try {
            $stmt=' UPDATE tbl_donhang
                    SET TrangThaiDH = 0
                    Where MaDH = ?';

            $prepare = $this->db->prepare($stmt);
            return $prepare->execute([$madh]);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updatetinhtrangdh($madh, $tinhtrangdh)
    {
        try {
            $stmt=' UPDATE tbl_donhang
                    SET TinhTrangDH = ?
                    Where MaDH = ? and TrangThaiDH = 1';

            $prepare = $this->db->prepare($stmt);
            return $prepare->execute([$tinhtrangdh,$madh]);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}