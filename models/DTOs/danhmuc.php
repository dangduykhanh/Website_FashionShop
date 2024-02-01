<?php
class danhmuc
{
	private $MaDM;
	private $TenDM;

    public function setMaDM($MaDM)
    {
        $this->MaDM = $MaDM;
    }
    public function getMaDM()
    {
        return $this->MaDM;
    }

    public function setTenDM($TenDM)
    {
        $this->TenDM = $TenDM;
    }
    public function getTenDM()
    {
        return $this->TenDM;
    }

	function __construct($MaDM,$TenDM){
		$this->MaDM = $MaDM;
		$this->TenDM = $TenDM;
	}
}
?>