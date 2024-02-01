<?php
require_once(DIR_BASE . 'models/DTOs/sanpham.php');
class sanphamModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function get($MaSP): sanpham
    {
        $stmt='Select *
        From tbl_sanpham SP
        Where SP.MaSP = ? and SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1';

        $prepared = $this->db->prepare($stmt);
        $prepared->execute([$MaSP]);

        $result = $prepared->fetch();

        return new sanpham($result['MaSP'], $result['MaDM'], $result['TenSP'], $result['DonGiaNhap'],
         $result['DonGiaBan'], $result['MoTa'],$result['GioiTinh'],$result['TrangThaiTonKho'], $result['TrangThaiSP']);
    }

    public function getProducts($MaDM , $GioiTinh)
    {
        $stmt='Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
        From tbl_danhmuc DM, tbl_sanpham SP, tbl_hinhanh HA 
        Where DM.MaDM = ? and SP.MaSP = HA.MaSP and SP.MaDM = DM.MaDM 
        and HA.CoPhaiAnhBia = 1 and SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 and SP.GioiTinh = ?
        LiMIT 4';

        $prepared = $this->db->prepare($stmt);
        $prepared->execute([$MaDM, $GioiTinh]);
        
        $result = $prepared->fetchAll();
        return $result;
    }

    public function get4Products($MaDM, $MaSP)
    {
        $stmt='Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
        From tbl_danhmuc DM, tbl_sanpham SP, tbl_hinhanh HA 
        Where DM.MaDM = ? and SP.MaSP = HA.MaSP and SP.MaDM = DM.MaDM 
        and HA.CoPhaiAnhBia = 1 and SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 and SP.MaSP != ?
        LiMIT 4';

        $prepared = $this->db->prepare($stmt);
        $prepared->execute([$MaDM, $MaSP]);
        
        $result = $prepared->fetchAll();
        return $result;
    }
}