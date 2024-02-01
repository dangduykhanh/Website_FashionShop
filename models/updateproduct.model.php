<?php
require_once('models/DTOs/sanpham.php');
require_once('models/DTOs/danhmuc.php');
require_once('models/DTOs/kichthuoc_sanpham.php');
require_once('models/DTOs/kichthuoc.php');
require_once('models/DTOs/hinhanh.php');
class updateproductModel
{
    protected PDO $db;
    public function __construct($db)
    {
        $this->db=$db;
    }

    public function getproduct($MaSP)
    {
        try {
            $stmt = 'SELECT *
            FROM tbl_sanpham 
            WHERE MaSP= ? and TrangThaiSP = 1 and TrangThaiTonKho = 1';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaSP]);

             $result = $prepare->fetch(PDO::FETCH_ASSOC);
             return new sanpham($result['MaSP'], $result['MaDM'], $result['TenSP'], $result['DonGiaNhap'],
             $result['DonGiaBan'], $result['MoTa'],$result['GioiTinh'],$result['TrangThaiTonKho'], $result['TrangThaiSP']);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getimage($MaSP)
    {
        try {
            $stmt='Select *
            From tbl_hinhanh
            Where MaSP = ?';

            $prepared = $this->db->prepare($stmt);
            $prepared->execute([$MaSP]);

            $dshinhanh = array();

            while($result = $prepared->fetch(PDO::FETCH_ASSOC))
            {
                $ha = new hinhanh($result['MaHA'], $result['MaSP'],$result['Url'], $result['CoPhaiAnhBia']);
                array_push($dshinhanh,$ha);
            }
            return $dshinhanh; 
        } 
        catch (PDOException $e) 
        {
            return $e->getMessage();
        }      
    }

    public function getcategory($TenDM)
    {
        try {
            $stmt = 'SELECT *
            FROM tbl_danhmuc 
            WHERE TenDM= ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$TenDM]);

             $result = $prepare->fetch(PDO::FETCH_ASSOC);
             return new danhmuc($result['MaDM'], $result['TenDM']);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getquantity($MaSP)
    {
        try {
            $stmt='Select *
            From tbl_kicthuoc_sanpham
            Where MaSP = ?
            Order by Cast(Substring(MaKT,3) as Signed)';

            $prepared = $this->db->prepare($stmt);
            $prepared->execute([$MaSP]);

            $dssoluong = array();

            while($result = $prepared->fetch())
            {
                $sl = new KTSP($result['MaKT'], $result['MaSP'], $result['SoLuong']);
                array_push($dssoluong, $sl);
            }
            return $dssoluong; 
        } 
        catch (PDOException $e) 
        {
            return $e->getMessage();
        }       
    }

    public function getSize()
    {
        try {
            $stmt='Select *
            From tbl_kichthuoc
            Order by Cast(Substring(MaKT,3) as Signed)';

            $prepared = $this->db->prepare($stmt);
            $prepared->execute();

            $dskichthuoc = array();

            while($result = $prepared->fetch())
            {
                $kt = new kichthuoc($result['MaKT'], $result['TenKT']);
                array_push($dskichthuoc, $kt);
            }
            return $dskichthuoc; 
        } 
        catch (PDOException $e) 
        {
            return $e->getMessage();
        }       
    }
}