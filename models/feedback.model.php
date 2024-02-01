<?php
require_once('models/DTOs/gopy.php');
class feedbackModel
{
    protected PDO $db;
    public function __construct($db)
    {
        $this->db=$db;
    }

    public function getfeedback()
    {
         try {
            $stmt='Select *
                    From tbl_gopy
                    Where TrangThaiGY = 1';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute();
    
            $dsgopy = array();

            while($result = $prepare->fetch())
            {
                $gy = new gopy($result['MaGY'], $result['MaKH'], $result['HovaTen'], $result['Email'], $result['TenGY'], $result['NoiDungGY'], $result['TrangThaiGY']);
                array_push($dsgopy, $gy);
            }
            return $dsgopy;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}