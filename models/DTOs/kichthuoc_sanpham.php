<?php
class KTSP
{
	private $MaKT;
	private $MaSP;
	private $SoLuong;

    public function setMaKT($MaKT)
    {
        $this->MaKT = $MaKT;
    }
    public function getMaKT()
    {
        return $this->MaKT;
    }

    public function setMaSP($MaSP)
    {
        $this->MaSP = $MaSP;
    }
    public function getMaSP()
    {
        return $this->MaSP;
    }

    public function setSoLuong($SoLuong)
    {
        $this->SoLuong = $SoLuong;
    }
    public function getSoLuong()
    {
        return $this->SoLuong;
    }

	function __construct($MaKT,$MaSP,$SoLuong)
    {
		$this->MaKT = $MaKT;
		$this->MaSP = $MaSP;
		$this->SoLuong = $SoLuong;
	}
}
?>