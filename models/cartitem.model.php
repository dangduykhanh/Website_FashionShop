<?php
require_once('../models/DTOs/chitietgiohang.php');
class CartItemModel
{
    protected PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function deteleProductCart($MaSP)
    {
        try {
            $stmt = 'DELETE FROM tbl_chitietgiohang WHERE MaSP = ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaSP]);
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}