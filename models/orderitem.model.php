<?php
require_once('../models/DTOs/chitietgiohang.php');

class orderitemModel
{
    protected PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertOrderDetail($MaDH, $MaSP, $TenSP, $KichThuoc, $SoLuong, $DonGia)
    {
        try {
            $stmt = 'INSERT INTO tbl_chitietdonhang(MaDH, MaSP, TenSP, KichThuoc, SoLuong, DonGia, ThanhTien) 
            VALUES (?, ?, ?, ?, ?, ?, ?)';
    
            $TTien = intval($DonGia) * intval($SoLuong);
            $TTien = $TTien ?? '';
            $prepare = $this->db->prepare($stmt);
            $result = $prepare->execute([$MaDH, $MaSP, $TenSP, $KichThuoc, $SoLuong, $DonGia, $TTien]);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getIDSize($Sizename)
    {
        try {
            $stmt = 'SELECT MaKT
                     FROM tbl_kichthuoc
                     WHERE TenKT = ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$Sizename]);
    
            $result = $prepare->fetchColumn();
    
            if (empty($result)) {
                return false;
            }
    
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertOrder($MaKH, $HovaTen, $Email, $SoDienThoai, $DiaChi, $PhuongThucThanhToan, $TongTien)
    {
        try {
            $stmt = 'INSERT INTO tbl_donhang(MaDH, MaKH, Email, HovaTen, SoDienThoai, DiaChi, PhuongThucThanhToan, TongTien, TinhTrangDH, TrangThaiDH, NgayDatHang) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)';

            $prepare = $this->db->prepare($stmt);
            $result = $prepare->execute(['', $MaKH, $Email, $HovaTen, $SoDienThoai, $DiaChi, $PhuongThucThanhToan, intval($TongTien),'Đang xử lý',1, date('Y-m-d')]);

            if(!$result)
            {
                return false;
            }

            return true;

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
                $result['KichThuoc'], $result['SoLuong'], $result['SoLuongToiDa'], $result['DonGia'],$result['ThanhTien']);
                array_push($cart, $ca);
            }
    
            return $cart;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getIDOrder($MaKH)
    {
        try {
            $stmt = 'SELECT MaDH FROM tbl_donhang WHERE MaKH = ? and TrangThaiDH = 1
                    Order By CAST(SUBSTRING(MaDH, 3) AS SIGNED) DESC Limit 1';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaKH]);

            return $prepare->fetchColumn();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function deleteProductinCartDetail()
    {
        try {
            $stmt = 'DELETE FROM tbl_chitietgiohang';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function minusQuantityProduct($MaKT, $MaSP, $SoLuong)
    {
        try {
            $stmt = 'UPDATE tbl_kicthuoc_sanpham 
            SET SoLuong = ? 
            WHERE MaSP = ? and MaKT = ?';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$SoLuong, $MaSP, $MaKT]);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}