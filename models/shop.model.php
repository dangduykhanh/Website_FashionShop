<?php
require_once('DTOs/sanpham.php');

class shopModel
{
    protected PDO $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllProduct($MaDM,$from,$So_SP_TREN_TRANG)
    {
        if($MaDM=='')
        {
            $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
            From tbl_sanpham SP, tbl_hinhanh HA, tbl_danhmuc DM
            Where SP.MaSP = HA.MaSP And SP.MaDM = DM.MaDM And HA.CoPhaiAnhBia = 1 And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1
            LIMIT ? , ?';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$from,$So_SP_TREN_TRANG]);
        }
        else
        {
            $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
            From tbl_sanpham SP, tbl_hinhanh HA, tbl_danhmuc DM
            Where SP.MaDM = ? And SP.MaSP = HA.MaSP And SP.MaDM = DM.MaDM And HA.CoPhaiAnhBia = 1 And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1
            LIMIT ? , ?';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaDM,$from,$So_SP_TREN_TRANG]);
        }
        
        $result = $prepare->fetchAll();
        return $result;
    }

    public function getTotalProduct($MaDM)
    {
        if($MaDM=='')
        {
            $stmt = 'Select Count(*) From tbl_sanpham where TrangThaiSP=1 and TrangThaiTonKho = 1';
        
            $prepare = $this->db->prepare($stmt);
            $prepare->execute();
        }
        else
        {
            $stmt = 'Select Count(*) From tbl_sanpham Where MaDM=? and TrangThaiSP=1 and TrangThaiTonKho = 1';
        
            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaDM]);
        }
        
        return  $prepare->fetchColumn();
    }

    public function getTotalConditionProduct($MaDM, $GioiTinh,$Compare, $DonGia, $DonGiaLon)
    {
        if($MaDM != '' && $GioiTinh != '' && $DonGia !='')
        {
            if($Compare == '<=')
            {
                $stmt = 'Select Count(*)
                From tbl_sanpham SP
                Where SP.MaDM = ? And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh = ? and SP.DonGiaBan <= ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$MaDM, $GioiTinh, $DonGia]);
            }
            elseif($Compare == '>=')
            {
                $stmt = 'Select Count(*)
                From tbl_sanpham SP
                Where SP.MaDM = ? And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh = ? and SP.DonGiaBan >= ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$MaDM, $GioiTinh, $DonGia]);
            }
            else
            {
                $stmt = 'Select Count(*)
                From tbl_sanpham SP
                Where SP.MaDM = ? And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh = ? and ? <= SP.DonGiaBan and SP.DonGiaBan <= ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$MaDM, $GioiTinh, $DonGia, $DonGiaLon]);
            }
        }
        elseif($MaDM != '' && $GioiTinh != '')
        {
            $stmt = 'Select Count(*)
            From tbl_sanpham SP
            Where SP.MaDM = ? And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh = ?';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaDM, $GioiTinh]);
        }
        elseif($MaDM != '' && $DonGia !='')
        {
            if($Compare == '<=')
            {
                $stmt = 'Select Count(*)
                From tbl_sanpham SP
                Where SP.MaDM = ? And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 and SP.DonGiaBan <= ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$MaDM, $DonGia]);
            }
            elseif($Compare == '>=')
            {
                $stmt = 'Select Count(*)
                From tbl_sanpham SP
                Where SP.MaDM = ? And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.DonGiaBan >= ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$MaDM, $DonGia]);
            }
            else
            {
                $stmt = 'Select Count(*)
                From tbl_sanpham SP
                Where SP.MaDM = ? And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And ? <= SP.DonGiaBan and SP.DonGiaBan <= ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$MaDM, $DonGia, $DonGiaLon]);
            }
        }
        elseif($GioiTinh != '' && $DonGia !='')
        {
            if($Compare == '<=')
            {
                $stmt = 'Select Count(*)
                From tbl_sanpham SP
                Where SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And  SP.GioiTinh = ? and SP.DonGiaBan <= ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$GioiTinh, $DonGia]);
            }
            elseif($Compare == '>=')
            {
                $stmt = 'Select Count(*)
                From tbl_sanpham SP
                Where SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh = ? and SP.DonGiaBan >= ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$GioiTinh, $DonGia]);
            }
            else
            {
                $stmt = 'Select Count(*)
                From tbl_sanpham SP
                Where SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh = ? and ? <= SP.DonGiaBan and SP.DonGiaBan <= ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$GioiTinh, $DonGia, $DonGiaLon]);
            }
        }
        elseif ($MaDM != '') {
            $stmt = 'Select Count(*)
            From tbl_sanpham SP
            Where SP.MaDM = ? and SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaDM]);
        }
        elseif($GioiTinh != '')
        {
            $stmt = 'Select Count(*)
                From tbl_sanpham SP
                Where SP.GioiTinh = ? and SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$GioiTinh]);
        }
        elseif($DonGia !='')
        {
            if($Compare == '<=')
            {
                $stmt = 'Select Count(*)
                From tbl_sanpham SP
                Where SP.DonGiaBan <= ? and SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$DonGia]);
            }
            elseif($Compare == '>=')
            {
                $stmt = 'Select Count(*)
                From tbl_sanpham SP
                Where SP.DonGiaBan >= ? and SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$DonGia]);
            }
            else
            {
                $stmt = 'Select Count(*)
                From tbl_sanpham SP
                Where ? <= SP.DonGiaBan and SP.DonGiaBan <= ? and SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$DonGia, $DonGiaLon]);
            }
        }
        
        return  $prepare->fetchColumn();
    }

    public function getProductAllCondition($MaDM, $GioiTinh, $Compare, $DonGia, $DonGiaLon, $from, $So_SP_TREN_TRANG)
    {
        if($MaDM != '' && $GioiTinh != '' && $DonGia !='')
        {
            if($Compare=='<=')
            {
                $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
                From tbl_sanpham SP, tbl_hinhanh HA
                Where SP.MaDM = ? and SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 
                And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh=? and SP.DonGiaBan <= ?
                LIMIT ? , ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$MaDM,$GioiTinh, $DonGia, $from, $So_SP_TREN_TRANG]);
            }
            elseif($Compare=='>=')
            {
                $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
                From tbl_sanpham SP, tbl_hinhanh HA
                Where SP.MaDM = ? and SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 
                And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh=? and SP.DonGiaBan >= ?
                LIMIT ? , ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$MaDM,$GioiTinh, $DonGia, $from, $So_SP_TREN_TRANG]);
            }
            else 
            {
                $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
                From tbl_sanpham SP, tbl_hinhanh HA
                Where SP.MaDM = ? and SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 And 
                SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh= ? and ? <= SP.DonGiaBan And SP.DonGiaBan <= ?
                LIMIT ?, ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$MaDM,$GioiTinh,$DonGia, $DonGiaLon, $from, $So_SP_TREN_TRANG]);
            }
        }
        elseif($MaDM != '' && $GioiTinh != '')
        {
            $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
            From tbl_sanpham SP, tbl_hinhanh HA
            Where SP.MaDM = ? and SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 
            And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh=?
            LIMIT ? , ?';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaDM,$GioiTinh, $from, $So_SP_TREN_TRANG]);
        }
        elseif($MaDM != '' && $DonGia !='')
        {
            if($Compare=='<=')
            {
                $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
                From tbl_sanpham SP, tbl_hinhanh HA
                Where SP.MaDM = ? and SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 
                And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.DonGiaBan <= ?
                LIMIT ? , ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$MaDM, $DonGia, $from, $So_SP_TREN_TRANG]);
            }
            elseif($Compare=='>=')
            {
                $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
                From tbl_sanpham SP, tbl_hinhanh HA
                Where SP.MaDM = ? and SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 
                And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 and SP.DonGiaBan >= ?
                LIMIT ? , ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$MaDM, $DonGia, $from, $So_SP_TREN_TRANG]);
            }
            else 
            {
                $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
                From tbl_sanpham SP, tbl_hinhanh HA
                Where SP.MaDM = ? and SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 And 
                SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And ? <= SP.DonGiaBan And SP.DonGiaBan <= ?
                LIMIT ?, ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$MaDM, $DonGia, $DonGiaLon, $from, $So_SP_TREN_TRANG]);
            }
        }
        elseif($GioiTinh != '' && $DonGia !='')
        {
            if($Compare=='<=')
            {
                $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
                From tbl_sanpham SP, tbl_hinhanh HA
                Where SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 
                And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh=? and SP.DonGiaBan <= ?
                LIMIT ? , ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$GioiTinh, $DonGia, $from, $So_SP_TREN_TRANG]);
            }
            elseif($Compare=='>=')
            {
                $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
                From tbl_sanpham SP, tbl_hinhanh HA
                Where SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 
                And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh=? and SP.DonGiaBan >= ?
                LIMIT ? , ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$GioiTinh, $DonGia, $from, $So_SP_TREN_TRANG]);
            }
            else 
            {
                $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
                From tbl_sanpham SP, tbl_hinhanh HA
                Where SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 And 
                SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh= ? and ? <= SP.DonGiaBan And SP.DonGiaBan <= ?
                LIMIT ?, ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$GioiTinh,$DonGia, $DonGiaLon, $from, $So_SP_TREN_TRANG]);
            }
        }
        elseif ($MaDM != '') {
            $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
            From tbl_sanpham SP, tbl_hinhanh HA
            Where SP.MaDM = ? and SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1
            LIMIT ? , ?';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$MaDM, $from, $So_SP_TREN_TRANG]);
        }
        elseif($GioiTinh != '')
        {
            $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
            From tbl_sanpham SP, tbl_hinhanh HA
            Where SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 
            And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And SP.GioiTinh=?
            LIMIT ? , ?';

            $prepare = $this->db->prepare($stmt);
            $prepare->execute([$GioiTinh, $from, $So_SP_TREN_TRANG]);
        }
        elseif($DonGia !='')
        {
            if($Compare=='<=')
            {
                $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
                From tbl_sanpham SP, tbl_hinhanh HA
                Where SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 
                And SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 and SP.DonGiaBan <= ?
                LIMIT ? , ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$DonGia, $from, $So_SP_TREN_TRANG]);
            }
            elseif($Compare=='>=')
            {
                $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
                From tbl_sanpham SP, tbl_hinhanh HA
                Where SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 
                And SP.DonGiaBan >= ? and SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1
                LIMIT ? , ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$DonGia, $from, $So_SP_TREN_TRANG]);
            }
            else 
            {
                $stmt = 'Select SP.MaSP, SP.TenSP, SP.DonGiaBan, HA.Url
                From tbl_sanpham SP, tbl_hinhanh HA
                Where SP.MaSP = HA.MaSP And HA.CoPhaiAnhBia = 1 And 
                SP.TrangThaiSP = 1 and SP.TrangThaiTonKho = 1 And ? <= SP.DonGiaBan And SP.DonGiaBan <= ?
                LIMIT ?, ?';
    
                $prepare = $this->db->prepare($stmt);
                $prepare->execute([$DonGia, $DonGiaLon, $from, $So_SP_TREN_TRANG]);
            }
        }
        
        $result = $prepare->fetchAll();
        return $result;
    }
}