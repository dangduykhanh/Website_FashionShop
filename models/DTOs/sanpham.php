<?php
class sanpham
{
    private $MaSP;
    private $MaDM;
	private $TenSP;
	private $DonGiaNhap;
	private $DonGiaBan;
	private $MoTa;
    private $GioiTinh;
    private $TrangThaiTonKho;
	private $TrangThaiSP;

    public function setMaSP($MaSP)
    {
        $this->MaSP = $MaSP;
    }
    public function getMaSP()
    {
        return $this->MaSP;
    }

    public function setMaDM($MaDM)
    {
        $this->MaDM = $MaDM;
    }
    public function getMaDM()
    {
        return $this->MaDM;
    }

    public function setTenSP($TenSP)
    {
        $this->TenSP = $TenSP;
    }
    public function getTenSP()
    {
        return $this->TenSP;
    }

    public function setDonGiaNhap($DonGiaNhap)
    {
        $this->DonGiaNhap = $DonGiaNhap;
    }
    public function getDonGiaNhap()
    {
        return $this->DonGiaNhap;
    }

    public function setDonGiaBan($DonGiaBan)
    {
        $this->DonGiaBan = $DonGiaBan;
    }
    public function getDonGiaBan()
    {
        return $this->DonGiaBan;
    }

    public function setMoTa($MoTa)
    {
        $this->MoTa = $MoTa;
    }
    public function getMoTa()
    {
        return $this->MoTa;
    }

    public function setGioiTinh($GioiTinh)
    {
        $this->GioiTinh = $GioiTinh;
    }
    public function getGioiTinh()
    {
        return $this->GioiTinh;
    }

    public function setTrangThaiSP($TrangThaiSP)
    {
        $this->TrangThaiSP = $TrangThaiSP;
    }
    public function getTrangThaiSP()
    {
        return $this->TrangThaiSP;
    }

    public function setTrangThaiTonKho($TrangThaiTonKho)
    {
        $this->TrangThaiTonKho = $TrangThaiTonKho;
    }
    public function getTrangThaiTonKho()
    {
        return $this->TrangThaiTonKho;
    }

	function __construct($MaSP,$MaDM,$TenSP,$DonGiaNhap,$DonGiaBan,$MoTa,$GioiTinh, $TrangThaiTonKho, $TrangThaiSP)
    {
		$this->MaSP = $MaSP;
		$this->MaDM = $MaDM;
		$this->TenSP = $TenSP;
		$this->DonGiaNhap = $DonGiaNhap;
		$this->DonGiaBan = $DonGiaBan;
		$this->MoTa = $MoTa;
        $this->GioiTinh = $GioiTinh;
        $this->TrangThaiTonKho = $TrangThaiTonKho;
		$this->TrangThaiSP = $TrangThaiSP;
	}
}
?>