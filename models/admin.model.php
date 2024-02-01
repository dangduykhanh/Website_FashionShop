<?php
require_once('models/DTOs/donhang.php');
class adminModel
{
    protected PDO $db;
    public function __construct($db)
    {
        $this->db=$db;
    }

    public function getrevenue($month)
    {
        try {
            $stmt = 'SELECT *
                     FROM tbl_donhang
                     WHERE Month(NgayDatHang) = ? ';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$month]);
    
            $dsdonhang = array();
            while($result = $prepare->fetch(PDO::FETCH_ASSOC))
            {
                $ngaysql = DateTime::createFromFormat('Y-m-d', $result['NgayDatHang']);
                $ngaycd = $ngaysql->format('d/m/Y');
                $dh = new donhang($result['MaDH'], $result['MaKH'], $result['Email'], $result['HovaTen'],
                $result['SoDienThoai'], $result['DiaChi'], $result['PhuongThucThanhToan'], $result['TongTien'], $result['TinhTrangDH'], $result['TrangThaiDH'],$ngaycd);
                array_push($dsdonhang, $dh);
            }
            return $dsdonhang;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getOrderStatus($tinhtrangdh)
    {
        try {
            $stmt = 'SELECT count(*)
                     FROM tbl_donhang
                     WHERE TinhTrangDH = ? and TrangThaiDH = 1';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$tinhtrangdh]);
    
            return $result = $prepare->fetchColumn();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getproductmanage($trangthaiTK)
    {
        try {
            $stmt = 'SELECT count(*)
                     FROM tbl_sanpham
                     WHERE TrangThaiSP = 1 and TrangThaiTonKho = ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$trangthaiTK]);
    
            $result = $prepare->fetchColumn();
    
            return $result;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getcustomermanage()
    {
        try {
            $stmt = 'SELECT count(*)
                     FROM tbl_khachhang
                     WHERE TrangThaiKH = 1';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute();
    
            $result = $prepare->fetchColumn();
    
            return $result;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getfeedbackmanage()
    {
        try {
            $stmt = 'SELECT count(*)
                     FROM tbl_gopy
                     WHERE TrangThaiGY = 1';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute();
    
            $result = $prepare->fetchColumn();
    
            return $result;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}