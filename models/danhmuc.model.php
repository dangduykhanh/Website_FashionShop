<?php
require_once(DIR_BASE . 'models/DTOs/danhmuc.php');
class danhmucModel
{
    protected PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getProductsTagsName($MaSP): danhmuc
    {
        $stmt = 'Select DM.MaDM, DM.TenDM
        From tbl_sanpham SP, tbl_danhmuc DM
        Where SP.MaDM = DM.MaDM and MaSP = ? and SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 ';

        $prepared = $this->db->prepare($stmt);
        $prepared->execute([$MaSP]);

        $result = $prepared->fetch();
        return new danhmuc($result['MaDM'], $result['TenDM']);
    }
}