<?php
class kichthuoc
{
	private $MaKT;
	private $TenKT;

    public function setMaKT($MaKT)
    {
        $this->MaKT = $MaKT;
    }
    public function getMaKT()
    {
        return $this->MaKT;
    }

    public function setTenKT($TenKT)
    {
        $this->TenKT = $TenKT;
    }
    public function getTenKT()
    {
        return $this->TenKT;
    }

	function __construct($MaKT,$TenKT)
    {
		$this->MaKT = $MaKT;
		$this->TenKT = $TenKT;
	}
}
?>