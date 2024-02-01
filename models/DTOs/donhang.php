<?php
class donhang
{
	private $MaDH;
	private $MaKH;
    private $Email;
	private $HovaTen;
	private $SoDienThoai;
	private $DiaChi;
	private $PhuongThucThanhToan;
	private $TongTien;
	private $TinhTrangDH;
	private $TrangThaiDH;
    private $NgayDatHang;

    public function setMaDH($MaDH)
    {
        $this->MaDH = $MaDH;
    }
    public function getMaDH()
    {
        return $this->MaDH;
    }

	public function setMaKH($MaKH)
    {
        $this->MaKH = $MaKH;
    }
    public function getMaKH()
    {
        return $this->MaKH;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }
    public function getEmail()
    {
        return $this->Email;
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

	public function setPhuongThucThanhToan($PhuongThucThanhToan)
    {
        $this->PhuongThucThanhToan = $PhuongThucThanhToan;
    }
    public function getPhuongThucThanhToan()
    {
        return $this->PhuongThucThanhToan;
    }

	public function setTongTien($TongTien)
    {
        $this->TongTien = $TongTien;
    }
    public function getTongTien()
    {
        return $this->TongTien;
    }

	public function setTinhTrangDH($TinhTrangDH)
    {
        $this->TinhTrangDH = $TinhTrangDH;
    }
    public function getTinhTrangDH()
    {
        return $this->TinhTrangDH;
    }

	public function setTrangThaiDH($TrangThaiDH)
    {
        $this->TrangThaiDH = $TrangThaiDH;
    }
    public function getTrangThaiDH()
    {
        return $this->TrangThaiDH;
    }

    public function setNgayDatHang($NgayDatHang)
    {
        $this->NgayDatHang = $NgayDatHang;
    }
    public function getNgayDatHang()
    {
        return $this->NgayDatHang;
    }

	function __construct($MaDH,$MaKH, $Email, $HovaTen,$SoDienThoai,$DiaChi,$PhuongThucThanhToan,$TongTien,$TinhTrangDH,$TrangThaiDH, $NgayDatHang){
		$this->MaDH = $MaDH;
		$this->MaKH = $MaKH;
        $this->Email = $Email;
		$this->HovaTen = $HovaTen;
		$this->SoDienThoai = $SoDienThoai;
		$this->DiaChi = $DiaChi;
		$this->PhuongThucThanhToan = $PhuongThucThanhToan;
		$this->TongTien = $TongTien;
		$this->TinhTrangDH = $TinhTrangDH;
		$this->TrangThaiDH = $TrangThaiDH;
        $this->NgayDatHang = $NgayDatHang;
	}
}
?>