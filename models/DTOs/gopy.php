<?php
class gopy
{
	private $MaGY;
	private $MaKH;
	private $HovaTen;
	private $Email;
	private $TenGY;
	private $NoiDungGY;
	private $TrangThaiGY;

    public function setMaGY($MaGY)
    {
        $this->MaGY = $MaGY;
    }
    public function getMaGY()
    {
        return $this->MaGY;
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

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }
    public function getEmail()
    {
        return $this->Email;
    }

    public function setTenGY($TenGY)
    {
        $this->TenGY = $TenGY;
    }
    public function getTenGY()
    {
        return $this->TenGY;
    }

    public function setNoiDungGY($NoiDungGY)
    {
        $this->NoiDungGY = $NoiDungGY;
    }
    public function getNoiDungGY()
    {
        return $this->NoiDungGY;
    }

    public function setTrangThaiGY($TrangThaiGY)
    {
        $this->TrangThaiGY = $TrangThaiGY;
    }
    public function getTrangThaiGY()
    {
        return $this->TrangThaiGY;
    }

	function __construct($MaGY,$MaKH,$HovaTen,$Email,$TenGY,$NoiDungGY,$TrangThaiGY)
    {
		$this->MaGY = $MaGY;
		$this->MaKH = $MaKH;
		$this->HovaTen = $HovaTen;
		$this->Email = $Email;
		$this->TenGY = $TenGY;
		$this->NoiDungGY = $NoiDungGY;
		$this->TrangThaiGY = $TrangThaiGY;
	}
}
?>