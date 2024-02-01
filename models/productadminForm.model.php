<?php
require_once('models/DTOs/danhmuc.php');
require_once('models/DTOs/sanpham.php');
require_once('models/DTOs/hinhanh.php');
require_once('models/DTOs/kichthuoc_sanpham.php');
require_once('models/DTOs/kichthuoc.php');

class productadminFormModel
{
    protected PDO $db;
    public function __construct($db)
    {
        $this->db=$db;
    }

    public function getcategory()
    {
        try {
            $stmt = 'SELECT *
                     FROM tbl_danhmuc';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute();
    
            $dsdanhmuc = array();
            while($result = $prepare->fetch(PDO::FETCH_ASSOC))
            {
                $dm = new danhmuc($result['MaDM'], $result['TenDM']);
                array_push($dsdanhmuc, $dm);
            }
            return $dsdanhmuc;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getProduct()
    {
        try {
            $stmt='Select *
            From tbl_sanpham
            Where TrangThaiSP = 1 and TrangThaiTonKho = 1';

            $prepared = $this->db->prepare($stmt);
            $prepared->execute();

            $dssanpham = array();

            while($result = $prepared->fetch())
            {
                $sp = new sanpham($result['MaSP'], $result['MaDM'], $result['TenSP'], $result['DonGiaNhap'],
                $result['DonGiaBan'], $result['MoTa'],$result['GioiTinh'],$result['TrangThaiTonKho'], $result['TrangThaiSP']);
                array_push($dssanpham,$sp);
            }
            return $dssanpham;
        } 
        catch (PDOException $e) 
        {
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