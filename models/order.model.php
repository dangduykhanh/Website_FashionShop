<?php
require_once('models/DTOs/khachhang.php');
require_once('models/DTOs/chitietgiohang.php');

class orderModel
{
    protected PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getInfoCustomer($MaKH):khachhang
    {
         try {
            $stmt='Select *
                    From tbl_khachhang
                    Where MaKH = ? and TrangThaiKH = 1';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaKH]);
    
            $result = $prepare->fetch();
            
            return new khachhang($result['MaKH'],$result['TaiKhoan'], $result['HovaTen'], $result['SoDienThoai'], $result['DiaChi'], $result['TrangThaiKH']);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getProductinCart($MaGH)
    {
        try {
            $stmt = 'SELECT MaGH, MaSP, TenSP, Url, KichThuoc,SoLuong, SoLuongToiDa, DonGia, ThanhTien
                     FROM tbl_chitietgiohang
                     WHERE MaGH = ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaGH]);

            $cart = array();

            while ($result = $prepare->fetch(PDO::FETCH_ASSOC)) {
                $ca = new chitietgiohang($result['MaGH'], $result['MaSP'], $result['TenSP'], $result['Url'],
                $result['KichThuoc'], $result['SoLuong'],$result['SoLuongToiDa'],$result['DonGia'],$result['ThanhTien']);
                array_push($cart, $ca);
            }
    
            return $cart;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}