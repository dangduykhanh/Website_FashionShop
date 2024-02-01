<?php

class productadminModel
{
    protected PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertProduct($MaDM, $TenSP, $DonGiaNhap, $DonGiaBan, $MoTa, $GioiTinh)
    {
        try {
            $stmt = 'INSERT INTO tbl_sanpham (MaSP, MaDM, TenSP, DonGiaNhap, DonGiaBan, MoTa, GioiTinh, TrangThaiTonKho, TrangThaiSP)
                     Value(?, ?, ?, ?, ?, ?, ?, ?, ?)';
    
            $prepare = $this->db->prepare($stmt);
            return $prepare->execute(['',$MaDM,$TenSP,$DonGiaNhap, $DonGiaBan, $MoTa, $GioiTinh, 1, 1]);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertSizeProdouct($MaKT, $MaSP, $SoLuong)
    {
        try {
            $stmt = 'INSERT INTO tbl_kicthuoc_sanpham (MaKT, MaSP, SoLuong)
                     Value(?, ?, ?)';
    
            $prepare = $this->db->prepare($stmt);
            return $prepare->execute([$MaKT, $MaSP, $SoLuong]);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getMaKT($MaDM)
    {
        try {
            $stmt = 'SELECT DISTINCT KTSP.MaKT 
            FROM tbl_sanpham SP, tbl_danhmuc DM, tbl_kicthuoc_sanpham KTSP 
            WHERE SP.MaDM = DM.MaDM and SP.MaSP = KTSP.MaSP and DM.MaDM = ?';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaDM]);

            $dskichthuoc = array();

            while($result = $prepare->fetch())
            {
                array_push($dskichthuoc, $result['MaKT']);
            }

            return $dskichthuoc;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function uploadAndSaveToDatabase($file, $MaSP, $anhbia) {
        // Kiểm tra lỗi khi tải lên tệp
        if ($file["error"] !== 0) {
            return false;
        }

        $upload_dir = "../static/img/productimage/"; // Thư mục lưu trữ tệp trên máy chủ
        $file_name = $file["name"];
        $file_path = $upload_dir . $file_name;
        $fipa = "./static/img/productimage/".$file_name;
        // Đảm bảo rằng tệp không tồn tại trước khi tải lên để tránh ghi đè
        if (file_exists($file_path)) {
            return false;
        }

        if (move_uploaded_file($file["tmp_name"], $file_path)) {
            // Sử dụng prepared statements để thực hiện truy vấn SQL
            $stmt = $this->db->prepare("INSERT INTO tbl_hinhanh (MaHA, MaSP, Url, CoPhaiAnhBia) VALUES (?, ?, ?, ?)");
            
            if (!$stmt) {
                return "Lỗi trong quá trình chuẩn bị câu lệnh SQL.";
            }
            
            $MaHA = ''; // Thay thế bằng giá trị thích hợp cho MaHA
            $stmt->bindParam(1, $MaHA, PDO::PARAM_STR);
            $stmt->bindParam(2, $MaSP, PDO::PARAM_INT);
            $stmt->bindParam(3, $fipa, PDO::PARAM_STR);
            $stmt->bindParam(4, $anhbia, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public function getMaSP($MaDM)
    {
        try {
            $stmt = 'SELECT MaSP 
            FROM tbl_sanpham 
            WHERE MaDM= ? 
            ORDER BY CAST(SUBSTRING(MaSP, 3) AS SIGNED) DESC
            Limit 1';
    
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaDM]);

            return $result = $prepare->fetchColumn();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteproduct($MaSP)
    {
        try {
            $stmt = 'UPDATE tbl_sanpham 
                    SET TrangThaiSP = 0 
                    WHERE MaSP = ? ';
    
            $prepare = $this->db->prepare($stmt);
            return $prepare->execute([$MaSP]);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
