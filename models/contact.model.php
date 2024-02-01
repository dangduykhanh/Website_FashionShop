<?php
require_once('DTOs/gopy.php');

class contactModel
{
    protected PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertFeedBack($MaKH, $HovaTen, $Email, $TenGY, $NoiDungGY)
    {
        $stmt = 'Insert Into tbl_gopy(MaGY, MaKH, HovaTen, Email, TenGY, NoiDungGY, TrangThaiGY) value(?,?,?,?,?,?,?)';
        $prepare= $this->db->prepare($stmt);
        $prepare->execute(['', $MaKH, $HovaTen, $Email, $TenGY, $NoiDungGY, 1]);
    }

    public function checkEmail($TaiKhoan)
    {
        $stmt = 'Select MaKH From tbl_khachhang Where TaiKhoan = ? and TrangThaiKH = 1';
        $prepare = $this->db->prepare($stmt);
        $prepare->execute([$TaiKhoan]);
        return $prepare->fetchColumn();
    }
}