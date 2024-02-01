<?php
class taikhoanadmin
{
	private $MaTK;
	private $TaiKhoan;
	private $MatKhau;

    public function setMaTK($MaTK)
    {
        $this->MaTK = $MaTK;
    }
    public function getMaTK()
    {
        return $this->MaTK;
    }

    public function setTaiKhoan($TaiKhoan)
    {
        $this->TaiKhoan = $TaiKhoan;
    }
    public function getTaiKhoan()
    {
        return $this->TaiKhoan;
    }

    public function setMatKhau($MatKhau)
    {
        $this->MatKhau = $MatKhau;
    }
    public function getMatKhau()
    {
        return $this->MatKhau;
    }

	function __construct($MaTK,$TaiKhoan,$MatKhau)
    {
		$this->MaTK = $MaTK;
		$this->TaiKhoan = $TaiKhoan;
		$this->MatKhau = $MatKhau;
	}
}
?>