<?php
class chitietgiohangsession
{
	private $MaGH;
	private $MaSP;
	private $TenSP;
    private $Url;
	private $KichThuoc;
	private $SoLuong;
    private $SoLuongLon;
	private $DonGia;
	private $ThanhTien;

    public function setMaGH($DonGia)
    {
        $this->DonGia = $DonGia;
    }
    public function getMaGH()
    {
        return $this->MaGH;
    }

    public function setMaSP($MaSP)
    {
        $this->MaSP = $MaSP;
    }
    public function getMaSP()
    {
        return $this->MaSP;
    }

    public function setTenSP($TenSP)
    {
        $this->TenSP = $TenSP;
    }
    public function getTenSP()
    {
        return $this->TenSP;
    }

    public function setUrl($Url)
    {
        $this->Url = $Url;
    }
    public function getUrl()
    {
        return $this->Url;
    }

    public function setKichThuoc($KichThuoc)
    {
        $this->KichThuoc = $KichThuoc;
    }
    public function getKichThuoc()
    {
        return $this->KichThuoc;
    }

    public function setSoLuong($SoLuong)
    {
        $this->SoLuong = $SoLuong;
    }
    public function getSoLuong()
    {
        return $this->SoLuong;
    }

    public function setSoLuongLon($SoLuongLon)
    {
        $this->SoLuongLon = $SoLuongLon;
    }
    public function getSoLuongLon()
    {
        return $this->SoLuongLon;
    }

    public function setDonGia($DonGia)
    {
        $this->DonGia = $DonGia;
    }
    public function getDonGia()
    {
        return $this->DonGia;
    }

    public function setThanhTien($ThanhTien)
    {
        $this->ThanhTien = $ThanhTien;
    }
    public function getThanhTien()
    {
        return $this->ThanhTien;
    }

	function __construct($MaGH,$MaSP,$TenSP,$Url,$KichThuoc,$SoLuong, $SoLuongLon, $DonGia,$ThanhTien){
		$this->MaGH = $MaGH;
		$this->MaSP = $MaSP;
		$this->TenSP = $TenSP;
        $this->Url = $Url;
		$this->KichThuoc = $KichThuoc;
		$this->SoLuong = $SoLuong;
        $this->SoLuongLon = $SoLuongLon;
		$this->DonGia = $DonGia;
		$this->ThanhTien = $ThanhTien;
	}
}
?>