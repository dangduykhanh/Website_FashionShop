<?php
require_once(DIR_BASE . 'models/DTOs/chitietyeuthich.php');

class favoriteModel
{
    protected PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getProductFavorite($MaSP)
    {
        try {
            $stmt = 'SELECT MaSP, TenSP, DonGiaBan
                     FROM tbl_sanpham
                     WHERE MaSP = ? and TrangThaiTonKho = 1 and TrangThaiSP = 1 ';
    
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

    public function getMaYT($MaKH)
    {
        try {
            $stmt = 'SELECT MaYT
                     FROM tbl_yeuthich
                     WHERE MaKH = ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaKH]);
    
            $result = $prepare->fetch(PDO::FETCH_ASSOC);
    
            return $result;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertFavoriteDetail($MaKT, $MaSP, $TenSP, $Url, $KichThuoc, $DonGia)
    {
        try {
            $stmt = 'INSERT INTO tbl_chitietyeuthich(MaYT, MaSP, TenSP, Url, KichThuoc, DonGia) 
            VALUES (?, ?, ?, ?, ?, ?)';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaKT, $MaSP, $TenSP, $Url, $KichThuoc, $DonGia]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    
    public function getProductForMaYT($MaYT)
    {
        try {
            $stmt = 'SELECT MaYT, MaSP, TenSP, Url, KichThuoc, DonGia
                     FROM tbl_chitietyeuthich
                     WHERE MaYT = ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaYT]);

            $favorite = array();

            while ($result = $prepare->fetch(PDO::FETCH_ASSOC)) {
                $favo = new chitietyeuthich($result['MaYT'], $result['MaSP'], $result['TenSP'], 
                $result['Url'], $result['KichThuoc'],$result['DonGia']);
                array_push($favorite, $favo);
            }
    
            return $favorite;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateStylePr($MaSP, $MaYT,$Url, $KichThuoc)
    {
        try {
            $stmt = 'UPDATE tbl_chitietyeuthich
                    SET Url = ?,
                        KichThuoc = ?
                    WHERE MaSP = ? And MaYT = ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$Url, $KichThuoc, $MaSP, $MaYT]);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}