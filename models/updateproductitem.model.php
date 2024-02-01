<?php

class updateproductitemModel
{
    protected PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    function isAbsolutePath($path) {
        return (strpos($path, 'http://') === 0 || strpos($path, 'https://') === 0 || strpos($path, 'ftp://') === 0);
    }

    public function updateproduct($MaSP, $TenSP, $DonGiaNhap, $DonGiaBan, $MoTa, $GioiTinh)
    {
        try {
            $stmt = 'UPDATE tbl_sanpham 
                    SET TenSP = ?,
                        DonGiaNhap = ?,
                        DonGiaBan = ?,
                        MoTa = ?,
                        GioiTinh = ? 
                    WHERE MaSP = ? ';
    
            $prepare = $this->db->prepare($stmt);
            return $prepare->execute([$TenSP, $DonGiaNhap, $DonGiaBan, $MoTa, $GioiTinh, $MaSP]);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updatequanity($MaKT, $MaSP, $SoLuong)
    {
        try {
            $stmt = 'UPDATE tbl_kicthuoc_sanpham 
                    SET SoLuong = ? 
                    WHERE MaSP = ? and MaKT = ? ';
    
            $prepare = $this->db->prepare($stmt);
            return $prepare->execute([$SoLuong, $MaSP, $MaKT]);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getSize($MaSP)
    {
        try {
            $stmt='Select MaKT
            From tbl_kicthuoc_sanpham
            WHERE MaSP = ?';

            $prepared = $this->db->prepare($stmt);
            $prepared->execute([$MaSP]);

            $dskichthuoc = array();

            while($result = $prepared->fetch())
            {
                array_push($dskichthuoc, $result['MaKT']);
            }
            return $dskichthuoc; 
        } 
        catch (PDOException $e) 
        {
            return $e->getMessage();
        }       
    }

    public function getimage($MaSP)
    {
        try {
            $stmt='Select MaHA
            From tbl_hinhanh
            WHERE MaSP = ?';

            $prepared = $this->db->prepare($stmt);
            $prepared->execute([$MaSP]);

            $dshinhanh = array();

            while($result = $prepared->fetch())
            {
                array_push($dshinhanh, $result['MaHA']);
            }
            return $dshinhanh; 
        } 
        catch (PDOException $e) 
        {
            return $e->getMessage();
        }       
    }

    public function uploadAndSaveToDatabase($file, $MaHA, $MaSP, $anhbia) {
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

            $stmt = $this->db->prepare("UPDATE tbl_hinhanh SET Url=?  WHERE MaHA = ? and MaSP = ? and CoPhaiAnhBia = ?");
            if (!$stmt) {
                return "Lỗi trong quá trình chuẩn bị câu lệnh SQL.";
            }

            $stmt->bindParam(1, $fipa, PDO::PARAM_STR);
            $stmt->bindParam(2, $MaHA, PDO::PARAM_STR);
            $stmt->bindParam(3, $MaSP, PDO::PARAM_STR);
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

    public function checkfile($file) {
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
        return true;
    }
}
