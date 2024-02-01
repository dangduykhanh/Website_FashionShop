<?php
class khachhang
{
	private $MaKH;
	private $TaiKhoan;
	private $HovaTen;
	private $SoDienThoai;
	private $DiaChi;
	private $TrangThaiKH;

    public function setMaKH($MaKH)
    {
        $this->MaKH = $MaKH;
    }
    public function getMaKH()
    {
        return $this->MaKH;
    }

    public function setTaiKhoan($TaiKhoan)
    {
        $this->TaiKhoan = $TaiKhoan;
    }
    public function getTaiKhoan()
    {
        return $this->TaiKhoan;
    }

    public function setHovaTen($HovaTen)
    {
        $this->HovaTen = $HovaTen;
    }
    public function getHovaTen()
    {
        return $this->HovaTen;
    }

    public function setSoDienThoai($SoDienThoai)
    {
        $this->SoDienThoai = $SoDienThoai;
    }
    public function getSoDienThoai()
    {
        return $this->SoDienThoai;
    }

    public function DiaChi($DiaChi)
    {
        $this->DiaChi = $DiaChi;
    }
    public function getDiaChi()
    {
        return $this->DiaChi;
    }

    public function TrangThaiKH($TrangThaiKH)
    {
        $this->TrangThaiKH = $TrangThaiKH;
    }
    public function getTrangThaiKH()
    {
        return $this->TrangThaiKH;
    }

	function __construct($MaKH,$TaiKhoan,$HovaTen,$SoDienThoai,$DiaChi,$TrangThaiKH)
    {
		$this->MaKH = $MaKH;
		$this->TaiKhoan = $TaiKhoan;
		$this->HovaTen = $HovaTen;
		$this->SoDienThoai = $SoDienThoai;
		$this->DiaChi = $DiaChi;
		$this->TrangThaiKH = $TrangThaiKH;
	}
}
?>