<?php
require_once('models/DTOs/khachhang.php');
class customerModel
{
    protected PDO $db;
    public function __construct($db)
    {
        $this->db=$db;
    }

    public function getaccountcustomer()
    {
         try {
            $stmt='Select *
                    From tbl_khachhang
                    Where TrangThaiKH = 1';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute();
    
            $dstk = array();

            while($result = $prepare->fetch())
            {
                $tk = new khachhang($result['MaKH'], $result['TaiKhoan'], $result['HovaTen'], $result['SoDienThoai'], $result['DiaChi'], $result['TrangThaiKH']);
                array_push($dstk, $tk);
            }
            return $dstk;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}