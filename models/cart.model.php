<?php
require_once('models/DTOs/chitietgiohang.php');
require_once('models/DTOs/sanpham.php');
require_once('models/DTOs/chitietgiohangsession.php');

class CartModel
{
    protected PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getMaGH($MaKH)
    {
        try {
            $stmt = 'SELECT MaGH
                     FROM tbl_giohang
                     WHERE MaKH = ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaKH]);
    
            $result = $prepare->fetch(PDO::FETCH_ASSOC);
    
            return $result;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getCountProductCart()
    {
        try {
            $stmt = 'SELECT Count(*)
                     FROM tbl_chitietgiohang';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute();
    
            $result = $prepare->fetchColumn();
    
            return $result;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getProductForMaGH($MaGH)
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

    public function getSizeName($MaKT)
    {
        try {
            $stmt = 'SELECT TenKT
                     FROM tbl_kichthuoc
                     WHERE MaKT = ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaKT]);
    
            $result = $prepare->fetchColumn();
    
            if (empty($result)) {
                return false;
            }
    
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertCartDetail($MaGH, $MaSP, $TenSP, $Url, $KichThuoc, $SoLuong, $SoLuongToiDa, $DonGia)
    {
        try {
            $stmt = 'INSERT INTO tbl_chitietgiohang(MaGH, MaSP, TenSP, Url, KichThuoc, SoLuong, SoLuongToiDa, DonGia, ThanhTien) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
    
            $TTien = intval($DonGia) * intval($SoLuong);
            $TTien = $TTien ?? '';
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaGH, $MaSP, $TenSP, $Url, $KichThuoc, $SoLuong, $SoLuongToiDa, $DonGia,$TTien]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getProductCart($MaSP)
    {
        try {
            $stmt = 'SELECT MaSP, TenSP, DonGiaBan
                     FROM tbl_sanpham
                     WHERE MaSP = ? and TrangThaiTonKho = 1 and TrangThaiSP = 1';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaSP]);
    
            $result = $prepare->fetch(PDO::FETCH_ASSOC);
    
            if (empty($result)) {
                return false;
            }
    
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateStylePr($MaSP, $MaGH,$Url, $KichThuoc, $SoLuong, $SoLuongToiDa, $ThanhTien)
    {
        try {
            $stmt = 'UPDATE tbl_chitietgiohang
                    SET Url = ?,
                        KichThuoc = ?,
                        SoLuong = ?,
                        SoLuongToiDa=?,
                        ThanhTien=?
                    WHERE MaSP = ? And MaGH = ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$Url, $KichThuoc, $SoLuong, $SoLuongToiDa, $ThanhTien, $MaSP, $MaGH]);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
