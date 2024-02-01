<?php
require_once('models/DTOs/donhang.php');
require_once('models/DTOs/chitietdonhang.php');

class PurchaseOrderModel
{
    protected PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getPurchaseOrder($MaKH)
    {
        try {
            $stmt = 'SELECT *
                     FROM tbl_donhang
                     WHERE MaKH = ? and TrangThaiDH = 1';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaKH]);

            $PurchaseOrder = array();

            while ($result = $prepare->fetch(PDO::FETCH_ASSOC)) {
                $ngaysql = DateTime::createFromFormat('Y-m-d',$result['NgayDatHang']);
                $ngaycd = $ngaysql->format('d/m/Y');
                $po = new donhang($result['MaDH'], $result['MaKH'],$result['Email'], $result['HovaTen'], $result['SoDienThoai'],
                $result['DiaChi'], $result['PhuongThucThanhToan'], $result['TongTien'], $result['TinhTrangDH'], $result['TrangThaiDH'], $ngaycd);
                array_push($PurchaseOrder, $po);
            }
            return $PurchaseOrder;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getProductinPucharseOrderDetail($MaDH)
    {
        try {
            $stmt = 'SELECT MaDH, MaSP, TenSP, KichThuoc,SoLuong, DonGia, ThanhTien
                     FROM tbl_chitietdonhang
                     WHERE MaDH = ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaDH]);

            $opdetail = array();

            while ($result = $prepare->fetch(PDO::FETCH_ASSOC)) {
                $opd = new chitietdonhang($result['MaDH'], $result['MaSP'], $result['TenSP'], $result['KichThuoc'], $result['SoLuong'], $result['DonGia'], $result['ThanhTien']);
                array_push($opdetail, $opd);
            }
    
            return $opdetail;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getIDOrder($MaKH)
    {
        try {
            $stmt = 'SELECT MaDH FROM tbl_donhang WHERE MaKH = ? and TrangThaiDH = 1';


            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaKH]);

            return $prepare->fetchColumn();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}