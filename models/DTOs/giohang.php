<?php
class giohang
{
	private $MaGH;
	private $MaKH;
	private $HovaTen;
	private $SoDienThoai;
	private $DiaChi;
	private $TongTien;

    public function setMaGH($MaGH)
    {
        $this->MaGH = $MaGH;
    }
    public function getMaGH()
    {
        return $this->MaGH;
    }

    public function setMaKH($MaKH)
    {
        $this->MaKH = $MaKH;
    }
    public function getMaKH()
    {
        return $this->MaKH;
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

    public function setDiaChi($DiaChi)
    {
        $this->DiaChi = $DiaChi;
    }
    public function getDiaChi()
    {
        return $this->DiaChi;
    }

    public function setTongTien($TongTien)
    {
        $this->TongTien = $TongTien;
    }
    public function getTongTien()
    {
        return $this->TongTien;
    }

	function __construct($MaGH,$MaKH,$HovaTen,$SoDienThoai,$DiaChi,$TongTien)
    {
		$this->MaGH = $MaGH;
		$this->MaKH = $MaKH;
		$this->HovaTen = $HovaTen;
		$this->SoDienThoai = $SoDienThoai;
		$this->DiaChi = $DiaChi;
		$this->TongTien = $TongTien;
	}
}
?>