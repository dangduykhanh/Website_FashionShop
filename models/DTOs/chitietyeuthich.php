<?php
class chitietyeuthich
{
	private $MaYT;
	private $MaSP;
	private $TenSP;
    private $Url;
	private $KichThuoc;
	private $DonGia;
    
    public function setMaYT($MaYT)
    {
        $this->MaYT = $MaYT;
    }
    public function getMaYT()
    {
        return $this->MaYT;
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

    public function setDonGia($DonGia)
    {
        $this->DonGia = $DonGia;
    }
    public function getDonGia()
    {
        return $this->DonGia;
    }
    
	function __construct($MaYT,$MaSP,$TenSP,$Url,$KichThuoc,$DonGia){
		$this->MaYT = $MaYT;
		$this->MaSP = $MaSP;
		$this->TenSP = $TenSP;
        $this->Url = $Url;
		$this->KichThuoc = $KichThuoc;
		$this->DonGia = $DonGia;
	}
}
?>