<?php
class chitietdonhang
{
	private $MaDH;
	private $MaSP;
	private $TenSP;
    private $KichThuoc;
	private $SoLuong;
	private $DonGia;
	private $ThanhTien;

    public function setMaDH($MaDH)
    {
        $this->MaDH = $MaDH;
    }
    public function getMaDH()
    {
        return $this->MaDH;
    }

    public function setMaSP($MaSP)
    {
        $this->MaSP = $MaSP;
    }
    public function getMaSP()
    {
        return $this->MaSP;
    }

    public function setKichThuoc($KichThuoc)
    {
        $this->KichThuoc = $KichThuoc;
    }
    public function getKichThuoc()
    {
        return $this->KichThuoc;
    }

    public function setTenSP($TenSP)
    {
        $this->TenSP = $TenSP;
    }
    public function getTenSP()
    {
        return $this->TenSP;
    }

    public function setSoLuong($SoLuong)
    {
        $this->SoLuong = $SoLuong;
    }
    public function getSoLuong()
    {
        return $this->SoLuong;
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

	function __construct($MaDH,$MaSP,$TenSP, $KichThuoc, $SoLuong,$DonGia,$ThanhTien){
		$this->MaDH = $MaDH;
		$this->MaSP = $MaSP;
		$this->TenSP = $TenSP;
        $this->TenSP = $TenSP;
		$this->KichThuoc = $KichThuoc;
		$this->DonGia = $DonGia;
		$this->ThanhTien = $ThanhTien;
	}
}
?>