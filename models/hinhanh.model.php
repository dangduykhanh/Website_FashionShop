<?php
require_once(DIR_BASE . 'models/DTOs/hinhanh.php');
class hinhanhModel
{
    private PDO $db;

    public function __construct($db)
    {
        $this->db=$db;
    }

    public function getImagesNotThumbnail($MaSP)
    {
        $stmt = 'Select HA.Url
        From tbl_hinhanh HA
        Where HA.MaSP = ?';

        $prepare = $this->db->prepare($stmt);
        $prepare->execute([$MaSP]);

        $result = $prepare->fetchAll();

        return $result;
    }

    public function getThumbnail($MaSP)
    {
        $stmt = 'Select HA.Url
        From tbl_hinhanh HA
        Where HA.MaSP = ? and HA.CoPhaiAnhBia = 1';

        $prepare = $this->db->prepare($stmt);
        $prepare->execute([$MaSP]);

        $result = $prepare->fetch();

        return $result['Url'];
    }
}