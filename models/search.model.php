<?php
require_once('DTOs/sanpham.php');

class searchModel
{
    protected PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getNameandCategoryProduct($str, $from, $So_SP_TREN_TRANG)
    {
        $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
        from tbl_sanpham SP, tbl_danhmuc DM, tbl_HinhAnh HA
        where SP.MaDM = DM.MaDM And SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1
        And SP.TenSP Like :TenSanPham
        LIMIT :From, :So_SP_TREN_TRANG';

        $str='%'.$str.'%';
        $prepare = $this->db->prepare($stmt);
        $prepare->bindParam(':TenSanPham',$str,PDO::PARAM_STR);
        $prepare->bindParam(':From',$from,PDO::PARAM_INT);
        $prepare->bindParam(':So_SP_TREN_TRANG',$So_SP_TREN_TRANG,PDO::PARAM_INT);
        $prepare->execute();

        $result = $prepare->fetchAll();

        return $result;
    }

    public function getTotalProductSearch($str)
    {
        $stmt = 'Select Count(*)
        from tbl_sanpham SP, tbl_danhmuc DM
        where SP.MaDM = DM.MaDM And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1
        And SP.TenSP Like :TenSanPham';

        $str='%'.$str.'%';
        $prepare = $this->db->prepare($stmt);
        $prepare->bindParam(':TenSanPham',$str,PDO::PARAM_STR);
        $prepare->execute();

        return $prepare->fetchColumn();
    }
}