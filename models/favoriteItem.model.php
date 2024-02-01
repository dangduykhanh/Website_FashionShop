<?php
class favoriteItemModel
{
    protected PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function deteleProductFavorite($MaSP)
    {
        try {
            $stmt = 'DELETE FROM tbl_chitietyeuthich WHERE MaSP = ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaSP]);
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}