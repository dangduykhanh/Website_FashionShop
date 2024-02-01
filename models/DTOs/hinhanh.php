<?php
class hinhanh
{
	private $MaHA;
	private $MaSP;
	private $Url;
	private $CoPhaiAnhBia;

    public function setMaHA($MaHA)
    {
        $this->MaHA = $MaHA;
    }
    public function getMaHA()
    {
        return $this->MaHA;
    }

    public function setMaSP($MaSP)
    {
        $this->MaSP = $MaSP;
    }
    public function getMaSP()
    {
        return $this->MaSP;
    }

    public function setUrl($Url)
    {
        $this->Url = $Url;
    }
    public function getUrl()
    {
        return $this->Url;
    }

    public function setCoPhaiAnhBia($CoPhaiAnhBia)
    {
        $this->CoPhaiAnhBia = $CoPhaiAnhBia;
    }
    public function getCoPhaiAnhBia()
    {
        return $this->CoPhaiAnhBia;
    }

	function __construct($MaHA,$MaSP,$Url,$CoPhaiAnhBia){
		$this->MaHA = $MaHA;
		$this->MaSP = $MaSP;
		$this->Url = $Url;
		$this->CoPhaiAnhBia = $CoPhaiAnhBia;
	}
}
?>