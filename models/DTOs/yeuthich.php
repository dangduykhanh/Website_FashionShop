<?php
class yeuthich
{
    private $MaYT;
    private $MaKH;

    public function setMaYT($MaYT)
    {
        $this->MaYT = $MaYT;
    }
    public function getMaYT()
    {
        return $this->MaYT;
    }
    
    public function setMaKH($MaKH)
    {
        $this->MaKH = $MaKH;
    }
    public function getMaKH()
    {
        return $this->MaKH;
    }

    public function __construct($MaYT,$MaKH)
    {
        $this->MaYT = $MaYT;
        $this->MaKH = $MaKH;
    }
}
?>