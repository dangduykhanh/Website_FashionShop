<?php
require_once(DIR_BASE . 'models/DTOs/kichthuoc_sanpham.php');
class kichthuocModel
{
    protected PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getSizeQuantity($MaSP)
    {
        $stmt = 'Select KT.MaKT, KT.TenKT, KTSP.SoLuong
        From tbl_kicthuoc_sanpham KTSP, tbl_kichthuoc KT
        Where KTSP.MaSP= ? and KTSP.MaKT = KT.MaKT and KTSP.SoLuong >0';

        $prepare = $this->db->prepare($stmt);
        $prepare->execute([$MaSP]);

        $result = $prepare->fetchAll();
        return $result;
    }
}