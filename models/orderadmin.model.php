<?php
require_once('models/DTOs/donhang.php');
require_once('models/DTOs/chitietdonhang.php');
class orderadminModel
{
    protected PDO $db;
    public function __construct($db)
    {
        $this->db=$db;
    }

    public function getorder()
    {
         try {
            $stmt='Select *
                    From tbl_donhang
                    Where TrangThaiDH = 1';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute();
    
            $dsdonhang = array();

            while($result = $prepare->fetch())
            {
                $ngaysql = DateTime::createFromFormat('Y-m-d',$result['NgayDatHang']);
                $ngaycd = $ngaysql->format('d/m/Y');
                $dh = new donhang($result['MaDH'], $result['MaKH'], $result['Email'], $result['HovaTen'], $result['SoDienThoai'], $result['DiaChi'], $result['PhuongThucThanhToan'], $result['TongTien'], $result['TinhTrangDH'], $result['TrangThaiDH'], $ngaycd);
                array_push($dsdonhang, $dh);
            }
            return $dsdonhang;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getdetailorder($madh)
    {
         try {
            $stmt='Select *
                    From tbl_chitietdonhang
                    Where MaDH = ?';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$madh]);
    
            $dsctdonhang = array();

            while($result = $prepare->fetch())
            {
                $dh = new chitietdonhang($result['MaDH'], $result['MaSP'], $result['TenSP'], $result['KichThuoc'], $result['SoLuong'], $result['DonGia'], $result['ThanhTien']);
                array_push($dsctdonhang, $dh);
            }
            return $dsctdonhang;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}