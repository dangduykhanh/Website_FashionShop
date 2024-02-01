<?php
require_once('DTOs/khachhang.php');
class userModel
{
    protected PDO $db;
    public function __construct($db)
    {
        $this->db=$db;
    }

    public function insertcustomer($TaiKhoan, $MatKhau, $HovaTen, $SoDienThoai,$DiaChi)
    {
        $stmt ='INSERT INTO tbl_khachhang(MaKH,TaiKhoan, MatKhau, HovaTen, SoDienThoai, DiaChi,TrangThaiKH) VALUES (?,?, PASSWORD(?), ?, ?, ?,?)';
        $prepared = $this->db->prepare($stmt);
        $prepared->execute(['', $TaiKhoan, $MatKhau, $HovaTen, $SoDienThoai, $DiaChi,1]);
    }

    public function insertfavorite()
    {
        $stmt ='INSERT INTO tbl_yeuthich(MaYT, MaKH) VALUES (?,?)';
        $prepared = $this->db->prepare($stmt);
        $prepared->execute(['','']);
    }

    public function insertcart()
    {
        $stmt ='INSERT INTO tbl_giohang(MaGH, MaKH) VALUES (?,?)';
        $prepared = $this->db->prepare($stmt);
        $prepared->execute(['','']);

    }

    public function login($TaiKhoan, $MatKhau)
    {
        $stmt ='Select MaKH,HovaTen,TaiKhoan 
        From tbl_khachhang
        Where TaiKhoan = :TaiKhoan And MatKhau = PASSWORD(:MatKhau) and TrangThaiKH = 1';

        $prepare = $this->db->prepare($stmt);
        $prepare->bindValue(':TaiKhoan', $TaiKhoan, PDO::PARAM_STR);
        $prepare->bindValue(':MatKhau',$MatKhau, PDO::PARAM_STR);
        $prepare->execute();

        $user = $prepare->fetch(PDO::FETCH_ASSOC);

        if($user)
        {
            return $user;
        }

        return false;
    }

    public function loginadmin($TaiKhoan, $MatKhau)
    {
        $stmt ='Select MaTK,TaiKhoan 
        From tbl_taikhoanadmin
        Where TaiKhoan = :TaiKhoan And MatKhau = MD5(:MatKhau) and TrangThaiTKAdmin = 1';

        $prepare = $this->db->prepare($stmt);
        $prepare->bindValue(':TaiKhoan', $TaiKhoan, PDO::PARAM_STR);
        $prepare->bindValue(':MatKhau',$MatKhau, PDO::PARAM_STR);
        $prepare->execute();

        $user = $prepare->fetch(PDO::FETCH_ASSOC);

        if($user)
        {
            return $user;
        }

        return false;
    }

    public function exist($email)
    {
        $stmt = 'Select MaKH From tbl_khachhang Where TaiKhoan = ? And TrangThaiKH = 1';
        $prepare = $this->db->prepare($stmt);
        $prepare->execute([$email]);

        return $prepare->fetchColumn();
    }
}