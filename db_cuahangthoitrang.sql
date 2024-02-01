-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 02:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cuahangthoitrang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `MaDH` varchar(20) NOT NULL,
  `MaSP` varchar(20) NOT NULL,
  `TenSP` text NOT NULL,
  `KichThuoc` text NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`MaDH`, `MaSP`, `TenSP`, `KichThuoc`, `SoLuong`, `DonGia`, `ThanhTien`) VALUES
('DH1', 'SP1', 'Nike Dri-FIT Primary', 'S', 1, 1090000, 1090000),
('DH2', 'SP5', 'Nike Dri-FIT Victory', 'S', 1, 579000, 579000),
('DH3', 'SP7', 'Jordan Jumpman', 'S', 1, 659000, 659000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietgiohang`
--

CREATE TABLE `tbl_chitietgiohang` (
  `MaGH` varchar(20) NOT NULL,
  `MaSP` varchar(20) NOT NULL,
  `TenSP` text NOT NULL,
  `Url` text NOT NULL,
  `KichThuoc` varchar(5) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `SoLuongToiDa` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `ThanhTien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietyeuthich`
--

CREATE TABLE `tbl_chitietyeuthich` (
  `MaYT` varchar(20) NOT NULL,
  `MaSP` varchar(20) NOT NULL,
  `TenSP` text NOT NULL,
  `Url` text NOT NULL,
  `KichThuoc` varchar(5) NOT NULL,
  `DonGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `MaDM` varchar(20) NOT NULL,
  `TenDM` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`MaDM`, `TenDM`) VALUES
('DM1', 'Áo'),
('DM2', 'Quần'),
('DM3', 'Giày');

--
-- Triggers `tbl_danhmuc`
--
DELIMITER $$
CREATE TRIGGER `Insert_MaDM_Trigger` BEFORE INSERT ON `tbl_danhmuc` FOR EACH ROW BEGIN
    DECLARE id INT;

    SELECT MAX(CAST(SUBSTRING(MaDM, 3) AS UNSIGNED)) INTO id FROM tbl_danhmuc;

    IF id IS NULL THEN
        SET id = 1;
    ELSE
        SET id = id + 1;
    END IF;

    SET NEW.MaDM = CONCAT('DM', id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `MaDH` varchar(20) NOT NULL,
  `MaKH` varchar(20) DEFAULT NULL,
  `Email` text NOT NULL,
  `HovaTen` text NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `DiaChi` text NOT NULL,
  `PhuongThucThanhToan` text NOT NULL,
  `TongTien` int(11) NOT NULL,
  `TinhTrangDH` text NOT NULL,
  `TrangThaiDH` tinyint(1) NOT NULL,
  `NgayDatHang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`MaDH`, `MaKH`, `Email`, `HovaTen`, `SoDienThoai`, `DiaChi`, `PhuongThucThanhToan`, `TongTien`, `TinhTrangDH`, `TrangThaiDH`, `NgayDatHang`) VALUES
('DH1', 'KH1', 'hoangtungx69@gmail.com', 'admin', '0347587031', 'Quận 7, TP Hồ Chí Minh', 'Thanh toán khi giao hàng', 1090000, 'Đã hoàn thành', 1, '2023-10-11'),
('DH2', 'KH1', 'hoangtungx69@gmail.com', 'admin', '0347587031', 'Quận 7, TP Hồ Chí Minh', 'Thanh toán khi giao hàng', 579000, 'Đang xử lý', 1, '2023-10-13'),
('DH3', 'KH1', 'hoangtungx69@gmail.com', 'admin', '0347587031', 'Quận 7, TP Hồ Chí Minh', 'Thanh toán khi giao hàng', 659000, 'Đang xử lý', 1, '2023-11-01');

--
-- Triggers `tbl_donhang`
--
DELIMITER $$
CREATE TRIGGER `Insert_MaDH_Trigger` BEFORE INSERT ON `tbl_donhang` FOR EACH ROW BEGIN
    DECLARE id INT;

    SELECT MAX(CAST(SUBSTRING(MaDH, 3) AS UNSIGNED)) INTO id FROM tbl_donhang;

    IF id IS NULL THEN
        SET id = 1;
    ELSE
        SET id = id + 1;
    END IF;

    SET NEW.MaDH = CONCAT('DH', id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `MaGH` varchar(20) NOT NULL,
  `MaKH` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`MaGH`, `MaKH`) VALUES
('GH1', 'KH1'),
('GH2', 'KH2'),
('GH3', 'KH3');

--
-- Triggers `tbl_giohang`
--
DELIMITER $$
CREATE TRIGGER `Insert_MaGH_Trigger` BEFORE INSERT ON `tbl_giohang` FOR EACH ROW BEGIN
    DECLARE id INT;

    SELECT MAX(CAST(SUBSTRING(MaGH, 3) AS UNSIGNED)) INTO id FROM tbl_giohang;

    IF id IS NULL THEN
        SET id = 1;
    ELSE
        SET id = id + 1;
    END IF;

    SET NEW.MaGH = CONCAT('GH', id);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insert_MaKH_Trigger_GH` BEFORE INSERT ON `tbl_giohang` FOR EACH ROW BEGIN
    DECLARE id INT;

    SELECT MAX(CAST(SUBSTRING(MaKH, 3) AS UNSIGNED)) INTO id FROM tbl_giohang;

    IF id IS NULL THEN
        SET id = 1;
    ELSE
        SET id = id + 1;
    END IF;

    SET NEW.MaKH = CONCAT('KH', id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gopy`
--

CREATE TABLE `tbl_gopy` (
  `MaGY` varchar(20) NOT NULL,
  `MaKH` varchar(20) DEFAULT NULL,
  `HovaTen` text NOT NULL,
  `Email` text NOT NULL,
  `TenGY` text NOT NULL,
  `NoiDungGY` text NOT NULL,
  `TrangThaiGY` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gopy`
--

INSERT INTO `tbl_gopy` (`MaGY`, `MaKH`, `HovaTen`, `Email`, `TenGY`, `NoiDungGY`, `TrangThaiGY`) VALUES
('GY1', 'KH1', 'duykhanh', 'hoangtungx69@gmail.com', 'Góp ý sản phẩm', 'Sản phẩm áo nike chưa tốt, tôi mong được phản hồi', 1),
('GY2', 'KH1', 'duykhanh', 'hoangtungx69@gmail.com', 'Góp ý đơn hàng', 'Hàng tôi nhận được không đúng yêu cầu', 1),
('GY3', 'KH1', 'duykhanh', 'hoangtungx69@gmail.com', 'Góp ý đơn hàng', 'Tôi đã đặt hàng và chưa nhận được hàng kể từ 1 tuần đặt hàng', 1),
('GY4', 'KH2', 'Xuân Tùng', 'duykhanh1701@gmail.com', 'Góp ý sản phẩm', 'Tôi nhận được hàng nhưng sản phẩm lại không đúng', 1),
('GY5', 'KH2', 'Văn Nam', 'duykhanh1701@gmail.com', 'Góp ý sản phẩm', 'Sản phẩm áo tôi nhận không đúng size', 1),
('GY6', 'KH1', 'duykhanh', 'hoangtungx69@gmail.com', 'góp ý nhân viên', 'nhân viên phục vụ thái độ không tốt', 1);

--
-- Triggers `tbl_gopy`
--
DELIMITER $$
CREATE TRIGGER `Insert_MaGY_Trigger` BEFORE INSERT ON `tbl_gopy` FOR EACH ROW BEGIN
    DECLARE id INT;

    SELECT MAX(CAST(SUBSTRING(MaGY, 3) AS UNSIGNED)) INTO id FROM tbl_gopy;

    IF id IS NULL THEN
        SET id = 1;
    ELSE
        SET id = id + 1;
    END IF;

    SET NEW.MaGY = CONCAT('GY', id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hinhanh`
--

CREATE TABLE `tbl_hinhanh` (
  `MaHA` varchar(20) NOT NULL,
  `MaSP` varchar(20) DEFAULT NULL,
  `Url` text NOT NULL,
  `CoPhaiAnhBia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hinhanh`
--

INSERT INTO `tbl_hinhanh` (`MaHA`, `MaSP`, `Url`, `CoPhaiAnhBia`) VALUES
('HA1', 'SP1', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/a0dd7628-2cc0-4edc-940f-40bc2e0a4b59/dri-fit-primary-training-t-shirt-z9dSFb.png', 1),
('HA10', 'SP4', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/0b2d4fdf-8a4a-4ab6-b539-7ed485dacab8/polo-slim-fit-polo-s969Wc.png', 1),
('HA100', 'SP34', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9010de16-f136-48eb-bcb4-2d8acf1f5a70/nikecourt-legacy-canvas-shoes-L6X9xF.png', 1),
('HA101', 'SP34', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/3c32c3ee-e0f8-4ef8-ae0f-d407099c7fea/nikecourt-legacy-canvas-shoes-L6X9xF.png', 0),
('HA102', 'SP34', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/b4179aca-eba4-4dad-8df9-7350e7617c9e/nikecourt-legacy-canvas-shoes-L6X9xF.png', 0),
('HA103', 'SP35', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/c5bc403c-d4f5-4fbf-b1eb-600c35a45acc/legend-essential-3-next-nature-workout-shoes-sJBRlm.png', 1),
('HA104', 'SP35', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/0540b1eb-1e1e-4b81-883d-d80b293ec913/legend-essential-3-next-nature-workout-shoes-sJBRlm.png', 0),
('HA105', 'SP35', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/5de57a29-6d22-4acc-9756-3c5007daafe2/legend-essential-3-next-nature-workout-shoes-sJBRlm.png', 0),
('HA106', 'SP36', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/d76b79fd-e11d-458d-8177-fa1746921e21/revolution-7-road-running-shoes-Dfvsch.png', 1),
('HA107', 'SP36', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/26d05b2f-e8d3-47f3-89d4-5055f1f9d179/revolution-7-road-running-shoes-Dfvsch.png', 0),
('HA108', 'SP36', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/d9048d29-fd74-44ad-ad65-aad7eb4b06bd/revolution-7-road-running-shoes-Dfvsch.png', 0),
('HA109', 'SP37', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/d8642b48-a451-4ad9-b18e-c412647f3141/experience-run-11-road-running-shoes-Wvpjwg.png', 1),
('HA11', 'SP4', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/661525e7-7117-43e3-85a2-fe202c3f2350/polo-slim-fit-polo-s969Wc.png', 0),
('HA110', 'SP37', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/49692047-febc-4fee-af64-f1aac0bd4d55/experience-run-11-road-running-shoes-Wvpjwg.png', 0),
('HA111', 'SP37', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/3959f9bb-7ed5-427c-8636-f69f7bef0b69/experience-run-11-road-running-shoes-Wvpjwg.png', 0),
('HA112', 'SP38', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/4560b4ff-fc85-4fe0-91fa-d2de62b10b5c/downshifter-12-road-running-shoes-NxhwFD.png', 1),
('HA113', 'SP38', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/e61798ab-5b4a-4908-8e4a-45d82945c2b6/downshifter-12-road-running-shoes-NxhwFD.png', 0),
('HA114', 'SP38', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/92991df2-3334-4579-b99e-d10bdc48d5a6/downshifter-12-road-running-shoes-NxhwFD.png', 0),
('HA115', 'SP39', './static/img/productimage/h1.png', 1),
('HA116', 'SP39', './static/img/productimage/h2.png', 0),
('HA117', 'SP39', './static/img/productimage/h3.png', 0),
('HA12', 'SP4', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/85a2f73d-8f3a-4734-ba2e-418c37c8657a/polo-slim-fit-polo-s969Wc.png', 0),
('HA13', 'SP5', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/28c56ea3-9018-4511-9cb2-578497dc22b1/dri-fit-victory-golf-polo-4ZK4F7.png', 1),
('HA14', 'SP5', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/0d4a4919-af09-4ddc-a687-dbf4d391f26f/dri-fit-victory-golf-polo-4ZK4F7.png', 0),
('HA15', 'SP5', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b0acee1b-f85f-4ba5-979c-488c80e40ad7/dri-fit-victory-golf-polo-4ZK4F7.png', 0),
('HA16', 'SP6', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/f9329798-6621-4f2a-931d-aedef5768249/nikecourt-dri-fit-tennis-polo-xQtSz0.png', 1),
('HA17', 'SP6', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/098cf199-350a-45e6-9713-dd6e2c5d93f4/nikecourt-dri-fit-tennis-polo-xQtSz0.png', 0),
('HA18', 'SP6', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b8f732db-24c7-4d94-82d7-f519ecfc26a8/nikecourt-dri-fit-tennis-polo-xQtSz0.png', 0),
('HA19', 'SP7', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/4d6ed04f-d632-4cea-980e-5afe5162c658/jordan-jumpman-short-sleeve-t-shirt-df6fwF.png', 1),
('HA2', 'SP1', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/be1a168b-3fb1-4bdc-867d-1a1f9cc26413/dri-fit-primary-training-t-shirt-z9dSFb.png', 0),
('HA20', 'SP7', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/3015738f-44c9-44cb-98e0-ee204e4a0599/jordan-jumpman-short-sleeve-t-shirt-df6fwF.png', 0),
('HA21', 'SP7', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/88065cb8-3b87-4801-a80d-b8ce54925428/jordan-jumpman-short-sleeve-t-shirt-df6fwF.png', 0),
('HA22', 'SP8', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/3e3797ee-e283-46ed-bb2c-f939529cc1e7/dri-fit-uv-miler-short-sleeve-running-top-HZxvZl.png', 1),
('HA23', 'SP8', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/72ac27cc-da85-4c46-b5be-d936bca17f8b/dri-fit-uv-miler-short-sleeve-running-top-HZxvZl.png', 0),
('HA24', 'SP8', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/148f1b07-d6d7-43ab-bf76-c5afb41a44ea/dri-fit-uv-miler-short-sleeve-running-top-HZxvZl.png', 0),
('HA25', 'SP9', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/96f07361-ad66-43fb-82d9-527a250241fe/sportswear-over-oversized-crew-neck-fleece-sweatshirt-bZK2SV.png', 1),
('HA26', 'SP9', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/b9893de2-dfcb-434b-8e4c-b04ed8251b2b/sportswear-over-oversized-crew-neck-fleece-sweatshirt-bZK2SV.png', 0),
('HA27', 'SP9', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/6cc096fa-e074-455c-a775-794b5cc115ff/sportswear-over-oversized-crew-neck-fleece-sweatshirt-bZK2SV.png', 0),
('HA28', 'SP10', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/911c67e9-049c-439e-a0c7-a5394534c4d6/sportswear-essentials-logo-t-shirt-MF2nms.png', 1),
('HA29', 'SP10', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/c2114a4a-fb16-4688-94f0-98c352ad12de/sportswear-essentials-logo-t-shirt-MF2nms.png', 0),
('HA3', 'SP1', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/0f05165c-72be-4624-b256-1ac19c176e52/dri-fit-primary-training-t-shirt-z9dSFb.png', 0),
('HA30', 'SP10', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9aef239d-0176-43bf-afd7-cd8fe2f44bf3/sportswear-essentials-logo-t-shirt-MF2nms.png', 0),
('HA31', 'SP11', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/aa3ef14f-80c5-460a-a97f-a36afc350107/dri-fit-one-jacket-jQL2xN.png', 1),
('HA32', 'SP11', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/42dcba55-4554-436e-9b9d-9fe873c53088/dri-fit-one-jacket-jQL2xN.png', 0),
('HA33', 'SP11', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/7ce9e8af-8830-44c2-afc8-7609da55f6db/dri-fit-one-jacket-jQL2xN.png', 0),
('HA34', 'SP12', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/c8a5cf6d-1ed5-46fd-99b7-c11ad28f6c66/yoga-dri-fit-top-fR3jt6.png', 1),
('HA35', 'SP12', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/01e7ad7a-41f1-4e3e-b1cc-8346c27d9d12/yoga-dri-fit-top-fR3jt6.png', 0),
('HA36', 'SP12', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/f336afde-f1de-4e3a-bc7d-35ecb721b8de/yoga-dri-fit-top-fR3jt6.png', 0),
('HA37', 'SP13', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/d699c60a-46a3-4ed0-a18d-2fc85e014ee4/sportswear-phoenix-fleece-over-oversized-crew-neck-sweatshirt-gGzPT0.png', 1),
('HA38', 'SP13', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/cb318838-4bba-4453-adb7-9819af569180/sportswear-phoenix-fleece-over-oversized-crew-neck-sweatshirt-gGzPT0.png', 0),
('HA39', 'SP13', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/77503f3e-60b2-4990-a3a5-17b70310d012/sportswear-phoenix-fleece-over-oversized-crew-neck-sweatshirt-gGzPT0.png', 0),
('HA4', 'SP2', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b71c2f74-732f-41c8-ab30-95798727a35a/track-club-dri-fit-short-sleeve-running-top-WT7QfH.png', 1),
('HA40', 'SP14', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9463bc0d-d614-4436-a643-7fd44f2df4c6/sportswear-club-essentials-t-shirt-d4gKTP.png', 1),
('HA41', 'SP14', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/965d2ae4-ad3d-4782-97d2-bdc01240c888/sportswear-club-essentials-t-shirt-d4gKTP.png', 0),
('HA42', 'SP14', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/a5835cb6-7334-4ad5-bc78-0e5dec8cb56a/sportswear-club-essentials-t-shirt-d4gKTP.png', 0),
('HA43', 'SP15', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/ce5e8bd7-83cb-4ab7-bb1b-a4cc65b51034/jordan-essentials-loopback-fleece-shorts-dKZJPj.png', 1),
('HA44', 'SP15', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/0e7bc4a6-75eb-4f84-ab9d-5c910230353f/jordan-essentials-loopback-fleece-shorts-dKZJPj.png', 0),
('HA45', 'SP15', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/46a38814-85ab-4d6b-938b-34830457de38/jordan-essentials-loopback-fleece-shorts-dKZJPj.png', 0),
('HA46', 'SP16', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/36615820-defc-42d0-9c15-75092fb57b59/sportswear-sport-essentials-woven-lined-flow-shorts-l9pxRQ.png', 1),
('HA47', 'SP16', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/07392db8-65bf-4584-aed2-3fd89a6b9231/sportswear-sport-essentials-woven-lined-flow-shorts-l9pxRQ.png', 0),
('HA48', 'SP16', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/46029c2b-fea9-4019-ad2b-ae8bcc3a4b38/sportswear-sport-essentials-woven-lined-flow-shorts-l9pxRQ.png', 0),
('HA49', 'SP17', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/257b60df-7ed1-41c6-bd84-5dd5a0af54a8/jordan-dri-fit-sport-woven-diamond-shorts-PGn3pM.png', 1),
('HA5', 'SP2', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/97754b8b-ebcb-4c9f-83c3-833a89b46924/track-club-dri-fit-short-sleeve-running-top-WT7QfH.png', 0),
('HA50', 'SP17', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/636ccba7-2b5c-4be4-89a9-d88c49d82486/jordan-dri-fit-sport-woven-diamond-shorts-PGn3pM.png', 0),
('HA51', 'SP17', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/67e2d01d-f517-405f-a37e-9b18fdc86261/jordan-dri-fit-sport-woven-diamond-shorts-PGn3pM.png', 0),
('HA52', 'SP18', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/7f04b647-ae79-4b37-ae4e-ab5e472c54c0/rafa-dri-fit-adv-7-tennis-shorts-3C76pr.png', 1),
('HA53', 'SP18', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9b5d2cb6-8c93-4e3e-8314-69efbb8e0084/rafa-dri-fit-adv-7-tennis-shorts-3C76pr.png', 0),
('HA54', 'SP18', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/b82333a1-d981-4247-b3c8-dc1e7fb028a6/rafa-dri-fit-adv-7-tennis-shorts-3C76pr.png', 0),
('HA55', 'SP19', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/5e996e4f-e6e7-4c3e-87ca-4e0fe6b0f44e/jordan-flight-fleece-shorts-79mmdN.png', 1),
('HA56', 'SP19', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/848cab0e-0b42-4007-8467-b8b76a13ba67/jordan-flight-fleece-shorts-79mmdN.png', 0),
('HA57', 'SP19', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/b160315a-4581-4892-b819-b4bf4bf6fca3/jordan-flight-fleece-shorts-79mmdN.png', 0),
('HA58', 'SP20', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/7d79d26b-6224-4ff5-acde-27ade8a5ba25/dri-fit-golf-shorts-QNrCtG.png', 1),
('HA59', 'SP20', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/2264a97b-848e-4278-8733-3c46da5c1a0c/dri-fit-golf-shorts-QNrCtG.png', 0),
('HA6', 'SP2', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/91cd2f87-e265-4067-9602-0e7b07c6ad78/track-club-dri-fit-short-sleeve-running-top-WT7QfH.png', 0),
('HA60', 'SP20', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/61a641ae-892a-4f93-95e2-7aff389e0c9a/dri-fit-golf-shorts-QNrCtG.png', 0),
('HA61', 'SP21', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/66c9cd4e-c73b-4c83-b3e2-6ba2c7ecd76f/dri-fit-one-mid-rise-8cm-brief-lined-shorts-BRBXHc.png', 1),
('HA62', 'SP21', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/93f75523-a2f9-4545-88a7-bb986174bc13/dri-fit-one-mid-rise-8cm-brief-lined-shorts-BRBXHc.png', 0),
('HA63', 'SP21', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/377ee254-db3d-4b8c-a605-815ce16d18f2/dri-fit-one-mid-rise-8cm-brief-lined-shorts-BRBXHc.png', 0),
('HA64', 'SP22', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/4f68030f-2c3b-4c18-ba0b-6c23d7279651/dri-fit-one-swoosh-mid-rise-brief-lined-running-shorts-QWdk1z.png', 1),
('HA65', 'SP22', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/5982a21c-372b-4172-b136-8226153513af/dri-fit-one-swoosh-mid-rise-brief-lined-running-shorts-QWdk1z.png', 0),
('HA66', 'SP22', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9e24b457-d1b9-444e-b2a7-e41e1bddb355/dri-fit-one-swoosh-mid-rise-brief-lined-running-shorts-QWdk1z.png', 0),
('HA67', 'SP23', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/911b4134-0fae-4750-a464-71dce234ebec/tempo-running-shorts-JxDWvp.png', 1),
('HA68', 'SP23', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/6c51be85-9c71-4334-94ef-0c365fc4c615/tempo-running-shorts-JxDWvp.png', 0),
('HA69', 'SP23', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/59f91e36-4d31-4b2c-a79f-08b36a95f7d4/tempo-running-shorts-JxDWvp.png', 0),
('HA7', 'SP3', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/fb0321e3-1d6c-4e6e-9e59-818abfa474b2/esc-knit-pullover-hoodie-QpVKV1.png', 1),
('HA70', 'SP24', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/4c6dba52-6f68-4187-ac99-220006420794/dri-fit-basketball-shorts-g0DXCm.png', 1),
('HA71', 'SP24', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/72be4f53-0a73-49ee-913d-d38e9ba262d8/dri-fit-basketball-shorts-g0DXCm.png', 0),
('HA72', 'SP24', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/3cd73f16-1b9a-45ef-8eb1-3644ed8799e2/dri-fit-basketball-shorts-g0DXCm.png', 0),
('HA73', 'SP25', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/4c2a4c78-5b40-4d8c-b070-8c391f1db274/sportswear-high-waisted-oversized-fleece-tracksuit-bottoms-41HBb9.png', 1),
('HA74', 'SP25', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/c57abc2c-5dac-4fe4-b159-1fbc41b6fdc0/sportswear-high-waisted-oversized-fleece-tracksuit-bottoms-41HBb9.png', 0),
('HA75', 'SP25', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/0c5beebe-1eae-4f35-ac16-b38d5563014b/sportswear-high-waisted-oversized-fleece-tracksuit-bottoms-41HBb9.png', 0),
('HA76', 'SP26', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/60ff4308-dfa3-4246-a043-e48c6e0bb08e/sportswear-fleece-mid-rise-shorts-BF6hbp.png', 1),
('HA77', 'SP26', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/4fb3983e-d088-4400-8a2c-18167a759611/sportswear-fleece-mid-rise-shorts-BF6hbp.png', 0),
('HA78', 'SP26', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/bb8f95f8-a103-4c22-8d1a-839052189f50/sportswear-fleece-mid-rise-shorts-BF6hbp.png', 0),
('HA79', 'SP27', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/585e2cd2-4f2a-408c-a8ba-f89952cdf332/revolution-6-road-running-shoes-NC0P7k.png', 1),
('HA8', 'SP3', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/bade1c2c-d245-4168-8b83-4c31fa5d6bf6/esc-knit-pullover-hoodie-QpVKV1.png', 0),
('HA80', 'SP27', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/3ca6f440-6c03-4baa-8818-d08faa816897/revolution-6-road-running-shoes-NC0P7k.png', 0),
('HA81', 'SP27', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/7df57edf-bdc6-4320-a956-8ce37228cd1d/revolution-6-road-running-shoes-NC0P7k.png', 0),
('HA82', 'SP28', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/d4776188-7104-419e-a1c8-f055737b9e6e/court-vision-low-next-nature-shoes-N2fFHb.png', 1),
('HA83', 'SP28', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/25ec5fd0-a881-488f-b581-5974c4e01cf9/court-vision-low-next-nature-shoes-N2fFHb.png', 0),
('HA84', 'SP28', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/0084df47-cf15-41d5-aab6-984460364e41/court-vision-low-next-nature-shoes-N2fFHb.png', 0),
('HA85', 'SP29', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/23cf5dd1-774c-4fc3-a6d4-16a24af909e9/downshifter-12-road-running-shoes-kQLnZn.png', 1),
('HA86', 'SP29', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/e53419df-8536-4c14-8f0d-2e481b1fad2f/downshifter-12-road-running-shoes-kQLnZn.png', 0),
('HA87', 'SP29', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/e886050a-ccca-454d-b622-5ac6bc35a646/downshifter-12-road-running-shoes-kQLnZn.png', 0),
('HA88', 'SP30', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/4d080a4c-8f98-45a4-9089-f4fb41697914/defy-all-day-training-shoe-LtD2G1.png', 1),
('HA89', 'SP30', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/eb0c5724-d3ab-42a6-891b-5be3afc92d83/defy-all-day-training-shoe-LtD2G1.png', 0),
('HA9', 'SP3', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/6eaa6476-37f9-4819-b3e3-72890f3b7237/esc-knit-pullover-hoodie-QpVKV1.png', 0),
('HA90', 'SP30', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/f662f1a1-4eb7-4f74-b4dd-dfb1ecdcc5c9/defy-all-day-training-shoe-LtD2G1.png', 0),
('HA91', 'SP31', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/23884d27-0d27-4d4b-975c-7567a4139e2b/flyby-mid-3-basketball-shoes-jFHsxb.png', 1),
('HA92', 'SP31', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9e09fa95-53cb-4332-94e9-e5ecf0be6543/flyby-mid-3-basketball-shoes-jFHsxb.png', 0),
('HA93', 'SP31', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/5064872f-99f4-4f98-87cc-bbb31e175044/flyby-mid-3-basketball-shoes-jFHsxb.png', 0),
('HA94', 'SP32', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/767687a0-142e-4d66-b437-998dee9a0a4f/nikecourt-royale-2-next-nature-shoes-RRcr20.png', 1),
('HA95', 'SP32', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/767687a0-142e-4d66-b437-998dee9a0a4f/nikecourt-royale-2-next-nature-shoes-RRcr20.png', 0),
('HA96', 'SP32', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/f6b0250d-541e-4535-acef-f98a6174cc18/nikecourt-royale-2-next-nature-shoes-RRcr20.png', 0),
('HA97', 'SP33', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/d9b5767a-a724-4089-92fd-f568a06decf1/court-vision-low-next-nature-shoes-p3CnbT.png', 1),
('HA98', 'SP33', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/059b90c1-0d6f-4eb0-8c64-55906f4ad823/court-vision-low-next-nature-shoes-p3CnbT.png', 0),
('HA99', 'SP33', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/7cc93bf2-ec9f-4a6e-814c-50802633e578/court-vision-low-next-nature-shoes-p3CnbT.png', 0);

--
-- Triggers `tbl_hinhanh`
--
DELIMITER $$
CREATE TRIGGER `Insert_MaHA_Trigger` BEFORE INSERT ON `tbl_hinhanh` FOR EACH ROW BEGIN
    DECLARE id INT;

    SELECT MAX(CAST(SUBSTRING(MaHA, 3) AS UNSIGNED)) INTO id FROM tbl_hinhanh;

    IF id IS NULL THEN
        SET id = 1;
    ELSE
        SET id = id + 1;
    END IF;

    SET NEW.MaHA = CONCAT('HA', id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `MaKH` varchar(20) NOT NULL,
  `TaiKhoan` text NOT NULL,
  `MatKhau` text NOT NULL,
  `HovaTen` text NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `DiaChi` text NOT NULL,
  `TrangThaiKH` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`MaKH`, `TaiKhoan`, `MatKhau`, `HovaTen`, `SoDienThoai`, `DiaChi`, `TrangThaiKH`) VALUES
('KH1', 'hoangtungx69@gmail.com', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 'admin', '0347587031', 'Quận 7, TP Hồ Chí Minh', 1),
('KH2', 'duykhanh1701@gmail.com', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 'duykhanh', '0347587031', 'Quận 7, TP Hồ Chí Minh', 1),
('KH3', 'dangthihien2311@gmail.com', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 'admin', '0347587031', 'Quận 7, TP Hồ Chí Minh', 1);

--
-- Triggers `tbl_khachhang`
--
DELIMITER $$
CREATE TRIGGER `Insert_MaKH_Trigger` BEFORE INSERT ON `tbl_khachhang` FOR EACH ROW BEGIN
    DECLARE id INT;

    SELECT MAX(CAST(SUBSTRING(MaKH, 3) AS UNSIGNED)) INTO id FROM tbl_khachhang;

    IF id IS NULL THEN
        SET id = 1;
    ELSE
        SET id = id + 1;
    END IF;

    SET NEW.MaKH = CONCAT('KH', id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kichthuoc`
--

CREATE TABLE `tbl_kichthuoc` (
  `MaKT` varchar(20) NOT NULL,
  `TenKT` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kichthuoc`
--

INSERT INTO `tbl_kichthuoc` (`MaKT`, `TenKT`) VALUES
('KT1', 'S'),
('KT10', '42'),
('KT2', 'M'),
('KT3', 'L'),
('KT4', 'XL'),
('KT5', 'XXL'),
('KT6', '38'),
('KT7', '39'),
('KT8', '40'),
('KT9', '41');

--
-- Triggers `tbl_kichthuoc`
--
DELIMITER $$
CREATE TRIGGER `Insert_MaKT_Trigger` BEFORE INSERT ON `tbl_kichthuoc` FOR EACH ROW BEGIN
    DECLARE id INT;

    SELECT MAX(CAST(SUBSTRING(MaKT, 3) AS UNSIGNED)) INTO id FROM tbl_kichthuoc;

    IF id IS NULL THEN
        SET id = 1;
    ELSE
        SET id = id + 1;
    END IF;

    SET NEW.MaKT = CONCAT('KT', id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kicthuoc_sanpham`
--

CREATE TABLE `tbl_kicthuoc_sanpham` (
  `MaKT` varchar(20) NOT NULL,
  `MaSP` varchar(20) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kicthuoc_sanpham`
--

INSERT INTO `tbl_kicthuoc_sanpham` (`MaKT`, `MaSP`, `SoLuong`) VALUES
('KT1', 'SP1', 4),
('KT1', 'SP10', 6),
('KT1', 'SP11', 8),
('KT1', 'SP12', 7),
('KT1', 'SP13', 5),
('KT1', 'SP14', 7),
('KT1', 'SP15', 8),
('KT1', 'SP16', 9),
('KT1', 'SP17', 5),
('KT1', 'SP18', 9),
('KT1', 'SP19', 6),
('KT1', 'SP2', 5),
('KT1', 'SP20', 6),
('KT1', 'SP21', 5),
('KT1', 'SP22', 4),
('KT1', 'SP23', 6),
('KT1', 'SP24', 5),
('KT1', 'SP25', 6),
('KT1', 'SP26', 4),
('KT1', 'SP3', 4),
('KT1', 'SP39', 4),
('KT1', 'SP4', 6),
('KT1', 'SP5', 3),
('KT1', 'SP6', 6),
('KT1', 'SP7', 6),
('KT1', 'SP8', 6),
('KT1', 'SP9', 5),
('KT10', 'SP27', 4),
('KT10', 'SP28', 6),
('KT10', 'SP29', 4),
('KT10', 'SP30', 3),
('KT10', 'SP31', 4),
('KT10', 'SP32', 6),
('KT10', 'SP33', 5),
('KT10', 'SP34', 5),
('KT10', 'SP35', 5),
('KT10', 'SP36', 5),
('KT10', 'SP37', 4),
('KT10', 'SP38', 3),
('KT2', 'SP1', 4),
('KT2', 'SP10', 5),
('KT2', 'SP11', 4),
('KT2', 'SP12', 5),
('KT2', 'SP13', 5),
('KT2', 'SP14', 5),
('KT2', 'SP15', 4),
('KT2', 'SP16', 5),
('KT2', 'SP17', 4),
('KT2', 'SP18', 5),
('KT2', 'SP19', 4),
('KT2', 'SP2', 4),
('KT2', 'SP20', 4),
('KT2', 'SP21', 6),
('KT2', 'SP22', 5),
('KT2', 'SP23', 4),
('KT2', 'SP24', 6),
('KT2', 'SP25', 6),
('KT2', 'SP26', 5),
('KT2', 'SP3', 5),
('KT2', 'SP39', 5),
('KT2', 'SP4', 6),
('KT2', 'SP5', 6),
('KT2', 'SP6', 3),
('KT2', 'SP7', 6),
('KT2', 'SP8', 5),
('KT2', 'SP9', 4),
('KT3', 'SP1', 6),
('KT3', 'SP10', 6),
('KT3', 'SP11', 4),
('KT3', 'SP12', 4),
('KT3', 'SP13', 4),
('KT3', 'SP14', 4),
('KT3', 'SP15', 5),
('KT3', 'SP16', 6),
('KT3', 'SP17', 5),
('KT3', 'SP18', 4),
('KT3', 'SP19', 5),
('KT3', 'SP2', 5),
('KT3', 'SP20', 5),
('KT3', 'SP21', 5),
('KT3', 'SP22', 5),
('KT3', 'SP23', 6),
('KT3', 'SP24', 4),
('KT3', 'SP25', 6),
('KT3', 'SP26', 5),
('KT3', 'SP3', 6),
('KT3', 'SP39', 6),
('KT3', 'SP4', 5),
('KT3', 'SP5', 6),
('KT3', 'SP6', 3),
('KT3', 'SP7', 4),
('KT3', 'SP8', 4),
('KT3', 'SP9', 5),
('KT4', 'SP1', 6),
('KT4', 'SP10', 4),
('KT4', 'SP11', 5),
('KT4', 'SP12', 5),
('KT4', 'SP13', 5),
('KT4', 'SP14', 5),
('KT4', 'SP15', 6),
('KT4', 'SP16', 6),
('KT4', 'SP17', 4),
('KT4', 'SP18', 5),
('KT4', 'SP19', 6),
('KT4', 'SP2', 4),
('KT4', 'SP20', 4),
('KT4', 'SP21', 6),
('KT4', 'SP22', 5),
('KT4', 'SP23', 4),
('KT4', 'SP24', 5),
('KT4', 'SP25', 5),
('KT4', 'SP26', 4),
('KT4', 'SP3', 4),
('KT4', 'SP39', 7),
('KT4', 'SP4', 6),
('KT4', 'SP5', 4),
('KT4', 'SP6', 5),
('KT4', 'SP7', 5),
('KT4', 'SP8', 3),
('KT4', 'SP9', 4),
('KT5', 'SP1', 5),
('KT5', 'SP10', 5),
('KT5', 'SP11', 5),
('KT5', 'SP12', 5),
('KT5', 'SP13', 5),
('KT5', 'SP14', 5),
('KT5', 'SP15', 5),
('KT5', 'SP16', 5),
('KT5', 'SP17', 5),
('KT5', 'SP18', 5),
('KT5', 'SP19', 5),
('KT5', 'SP2', 5),
('KT5', 'SP20', 5),
('KT5', 'SP21', 5),
('KT5', 'SP22', 5),
('KT5', 'SP23', 5),
('KT5', 'SP24', 5),
('KT5', 'SP25', 5),
('KT5', 'SP26', 5),
('KT5', 'SP3', 5),
('KT5', 'SP39', 8),
('KT5', 'SP4', 5),
('KT5', 'SP5', 5),
('KT5', 'SP6', 5),
('KT5', 'SP7', 5),
('KT5', 'SP8', 5),
('KT5', 'SP9', 5),
('KT6', 'SP27', 5),
('KT6', 'SP28', 5),
('KT6', 'SP29', 5),
('KT6', 'SP30', 5),
('KT6', 'SP31', 6),
('KT6', 'SP32', 5),
('KT6', 'SP33', 4),
('KT6', 'SP34', 6),
('KT6', 'SP35', 6),
('KT6', 'SP36', 6),
('KT6', 'SP37', 6),
('KT6', 'SP38', 5),
('KT7', 'SP27', 6),
('KT7', 'SP28', 6),
('KT7', 'SP29', 5),
('KT7', 'SP30', 6),
('KT7', 'SP31', 4),
('KT7', 'SP32', 6),
('KT7', 'SP33', 5),
('KT7', 'SP34', 4),
('KT7', 'SP35', 5),
('KT7', 'SP36', 5),
('KT7', 'SP37', 5),
('KT7', 'SP38', 6),
('KT8', 'SP27', 5),
('KT8', 'SP28', 4),
('KT8', 'SP29', 4),
('KT8', 'SP30', 5),
('KT8', 'SP31', 5),
('KT8', 'SP32', 4),
('KT8', 'SP33', 6),
('KT8', 'SP34', 5),
('KT8', 'SP35', 3),
('KT8', 'SP36', 4),
('KT8', 'SP37', 4),
('KT8', 'SP38', 4),
('KT9', 'SP27', 4),
('KT9', 'SP28', 6),
('KT9', 'SP29', 6),
('KT9', 'SP30', 4),
('KT9', 'SP31', 6),
('KT9', 'SP32', 5),
('KT9', 'SP33', 4),
('KT9', 'SP34', 6),
('KT9', 'SP35', 4),
('KT9', 'SP36', 6),
('KT9', 'SP37', 3),
('KT9', 'SP38', 5);

--
-- Triggers `tbl_kicthuoc_sanpham`
--
DELIMITER $$
CREATE TRIGGER `update_status_inventory` AFTER UPDATE ON `tbl_kicthuoc_sanpham` FOR EACH ROW BEGIN
    DECLARE product_id varchar(20);
    
    -- Lấy mã sản phẩm từ bảng kichthuoc_sanpham
    SELECT NEW.MaSP INTO product_id;
    
    -- Tính tổng số lượng tồn kho của sản phẩm
    SET @total_inventory = (SELECT SUM(SoLuong) FROM tbl_kicthuoc_sanpham WHERE MaSP = product_id);

    -- Cập nhật tinh_trang_ton_kho của sản phẩm
    UPDATE tbl_sanpham SET TrangThaiTonKho = CASE WHEN @total_inventory = 0 THEN 0 ELSE 1 END WHERE MaSP = product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `MaSP` varchar(20) NOT NULL,
  `MaDM` varchar(20) DEFAULT NULL,
  `TenSP` text NOT NULL,
  `DonGiaNhap` int(11) NOT NULL,
  `DonGiaBan` int(11) NOT NULL,
  `MoTa` text NOT NULL,
  `GioiTinh` varchar(5) DEFAULT NULL,
  `TrangThaiTonKho` tinyint(4) NOT NULL,
  `TrangThaiSP` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`MaSP`, `MaDM`, `TenSP`, `DonGiaNhap`, `DonGiaBan`, `MoTa`, `GioiTinh`, `TrangThaiTonKho`, `TrangThaiSP`) VALUES
('SP1', 'DM1', 'Nike Dri-FIT Primary', 800000, 1090000, 'Áo Nike Dri-FIT Primary là một loại áo thể thao được thiết kế bởi thương hiệu Jordan, liên quan đến huyền thoại bóng rổ Michael Jordan. Áo này được chế tạo với công nghệ Dri-FIT của Nike, giúp kiểm soát độ ẩm và tạo sự thoải mái trong quá trình hoạt động thể thao.Với thiết kế hiện đại và thể thao, áo Nike Dri-FIT Primary thường có các chi tiết như cổ tròn hoặc cổ polo và tay ngắn. Chất liệu Dri-FIT giúp hút ẩm từ cơ thể và đẩy nó ra bề mặt áo, giúp cơ thể khô ráo hơn trong suốt thời gian vận động.', 'Nam', 1, 1),
('SP10', 'DM1', 'Nike Sportswear Essentials', 509000, 709000, 'Chúng tôi đã cập nhật áo phông Club Essentials để dễ dàng mặc vừa vặn. Thân áo rộng hơn, ngắn hơn và viền hơi cong mang lại cho chiếc áo luôn thoải mái này vẻ ngoài mới mẻ. Những lợi ích Vải cotton hàng ngày cho cảm giác mềm mại và nhẹ. Kiểu dáng áo thun vừa vặn cổ điển mang lại cảm giác thoải mái dọc theo cơ thể và hông.', 'Nu', 1, 1),
('SP11', 'DM1', 'Nike Dri-FIT One', 639000, 939000, 'Đừng để một cơn gió nhỏ cản trở bạn. Chiếc áo gió cổ điển này được làm từ vải dệt mềm mượt, siêu mềm nhưng bền, giúp bạn luôn thoải mái khi có gió thổi qua. Đảm bảo vừa vặn với dây thun co giãn ở cổ tay áo và dây thun ở viền áo. Những lợi ích Công nghệ Nike Dri-FIT di chuyển mồ hôi ra khỏi da để bay hơi nhanh hơn, giúp bạn khô ráo và thoải mái. 2 túi có khóa kéo bên hông giúp bạn đựng những vật dụng cần thiết an toàn. Vải dệt ở cổ đứng mang lại sự che phủ mềm mại.', 'Nu', 1, 1),
('SP12', 'DM1', 'Nike Yoga Dri-FIT', 669000, 869000, 'Được làm từ vải mềm mại, co giãn, thấm mồ hôi, áo này là lớp thoáng khí được thiết kế để giúp bạn luôn thoải mái khi thực hiện các chuyển động. Đường may ở vai buông xuống, lỗ thông hơi ở hai bên phóng đại và viền sau dài hơn cho phép bạn uốn cong, co giãn và di chuyển tự do giữa các tư thế. Sản phẩm này được làm từ ít nhất 75% vật liệu bền vững, sử dụng hỗn hợp cả sợi polyester tái chế và sợi bông hữu cơ. Hỗn hợp này có ít nhất 10% sợi tái chế hoặc ít nhất 10% sợi bông hữu cơ.', 'Nu', 1, 1),
('SP13', 'DM1', 'Nike Sportswear Phoenix Fleece', 739000, 1039000, 'Hãy đứng dậy và biến đổi tủ quần áo lông cừu của bạn với cảm giác ấm cúng mạnh mẽ. Với kiểu dáng rộng rãi và đường gân phóng đại, chiếc áo nỉ Phoenix Fleece này mang đến cho bạn vẻ ngoài không hề cơ bản. Những lợi ích Mềm mại bên ngoài và ấm áp bên trong, lông cừu chải kỹ là chất liệu áo nỉ ưa thích của chúng tôi cho nhiệt độ lạnh hơn. Đường gân kéo dài ở cổ tay áo và viền áo mang lại sự thoải mái và cấu trúc hơn.', 'Nu', 1, 1),
('SP14', 'DM1', 'Nike Sportswear Club Essentials', 609000, 809000, 'Chúng tôi đã cập nhật áo phông Club Essentials để mang lại cho chúng kiểu dáng vừa vặn và hiện đại, hoàn hảo cho trang phục hàng ngày. Rộng hơn một chút, thân ngắn hơn một chút và viền hơi cong mang lại cho chiếc áo luôn thoải mái này vẻ ngoài cập nhật.Những lợi ích Công nghệ Nike Dri-FIT giúp loại bỏ mồ hôi khỏi da của bạn để bay hơi nhanh hơn, giúp bạn khô ráo và thoải mái.﻿ Dây rút bên trong cho phép bạn điều chỉnh thắt lưng khi di chuyển.', 'Nu', 1, 1),
('SP15', 'DM2', 'Jordan Essentials', 869000, 1169000, 'Bạn muốn một chiếc quần short đơn giản mà trông đẹp như cảm giác của họ? Đây nhé. Chúng được làm từ lông cừu mềm, mịn ở bên ngoài và cuộn tròn ở bên trong—điều đó mang lại sự thoải mái nhẹ nhàng dù bạn mặc chúng ở đâu. Những lợi ích Lông cừu Loopback nhẹ, mềm và dễ mặc. Cạp quần co giãn có dây rút giúp bạn có được sự vừa vặn hoàn hảo. Túi bên cho phép bạn cất điện thoại và chìa khóa.', 'Nam', 1, 1),
('SP16', 'DM2', 'Nike Sportswear Sport Essentials', 629000, 829000, 'Cho dù bạn đang chạy đến quầy bán đồ ăn gần nhất hay lao vào địa điểm bơi lội yêu thích của mình thì những chiếc quần short lấy cảm hứng từ trường đại học này đều là một ý tưởng hay. Được lót để tạo sự thoải mái, loại vải dệt mịn có trọng lượng nhẹ và thích hợp cho mọi cuộc phiêu lưu. Những lợi ích Với thiết kế dài đến trên đầu gối, kiểu dáng thể thao với đường may bên hông có hình vỏ sò này hướng đến tính di động. Thắt lưng co giãn và dây rút mang đến cho bạn sự vừa vặn cá tính. Các túi có đường may bên hông giúp lưu trữ các vật dụng nhỏ một cách nhanh chóng. Túi nắp sau có vòng bungee bên trong để giữ chìa khóa hoặc thẻ.', 'Nam', 1, 1),
('SP17', 'DM2', 'Jordan Dri-FIT Sport', 779000, 979000, 'Mang tính biểu tượng hơn bao giờ hết, chiếc quần short Diamond đã trở lại. Đôi này được làm từ vải dệt co giãn bốn chiều và được cải tiến với công nghệ thấm mồ hôi. Bạn sẽ trông tươi mới—trong và ngoài sân, từ vạch ném phạt đến vạch tính tiền. Những lợi ích Công nghệ Nike Dri-FIT di chuyển mồ hôi ra khỏi da để bay hơi nhanh hơn, giúp bạn khô ráo và thoải mái. Chất liệu vải dệt co giãn tạo cảm giác nhẹ, bền và co giãn giúp bạn dễ dàng vận động. Cạp quần co giãn với dây rút có thể điều chỉnh giúp bạn điều chỉnh độ vừa vặn. Túi bên dễ dàng lưu trữ chìa khóa và điện thoại của bạn.', 'Nam', 1, 1),
('SP18', 'DM2', 'Rafa', 1239000, 1839000, 'Chúng tôi đã tạo ra những chiếc quần short thấm mồ hôi này dựa trên những hiểu biết sâu sắc từ Rafael Nadal và dữ liệu về vận động viên để xác định những vị trí bạn cần thoáng khí và co giãn hơn. Ngoài ra, chúng đủ nhẹ để bạn có thể tiếp tục thực hiện từng cú cắt và xoay. Những lợi ích Được tạo ra với sự cộng tác của Rafael Nadal, độ vừa vặn, chất liệu và các chi tiết thiết kế được chế tạo để mang lại hiệu quả thi đấu ở đẳng cấp cao nhất. Công nghệ Nike Dri-FIT ADV kết hợp vải hút ẩm với kỹ thuật và tính năng tiên tiến giúp bạn luôn khô ráo và thoải mái. Vải dệt nhẹ có độ co giãn đáng kinh ngạc để cho phép bạn thực hiện các chuyển động năng động từ bên này sang bên kia trên sân. Các lỗ thủng bên dưới cạp quần và trên miếng lót giúp tăng độ thoáng khí cho những khu vực có nhiệt độ cao này.', 'Nam', 1, 1),
('SP19', 'DM2', 'Jordan Flight Fleece', 1379000, 1579000, 'Những chiếc quần short thoải mái này rất linh hoạt, mềm mại và sẵn sàng hoạt động. Đường viền trang trí bằng đường khâu có tông màu lấy cảm hứng từ một trong những bộ dụng cụ chuyên nghiệp của MJ giúp nâng tầm vẻ sang trọng, thoải mái như nhung. Những lợi ích Mềm mại bên ngoài và sang trọng bên trong, lông cừu chải kỹ nặng của chúng tôi giúp bạn cực kỳ ấm áp với chất liệu vải dày, có kết cấu để mang lại vẻ ngoài cao cấp. Phần cứng dây rút bằng kim loại mang lại cảm giác cao cấp.', 'Nam', 1, 1),
('SP2', 'DM1', 'Nike Track Club', 900000, 1019000, 'Áo thun Nike Track Club có chất liệu vải thấm mồ hôi giúp bạn luôn mát mẻ và tự tin trong mọi khoảnh khắc. Chiếc áo thun vừa vặn cổ điển này mang lại cảm giác thoải mái, hơi ôm sát cơ thể. Trên hết, họa tiết in hoa rực rỡ được lấy cảm hứng từ nguồn điện và sự hưng phấn được tìm thấy tại một trong những giải đấu lớn của quần vợt.', 'Nam', 1, 1),
('SP20', 'DM2', 'Nike Dri-FIT', 1179000, 1479000, 'Di chuyển thoải mái trên sân với quần short Nike Dri-FIT. Chất liệu vải co giãn cho phép bạn sắp xếp các cú đánh bóng mà không bị hạn chế, đồng thời dây thắt lưng chắc chắn giúp giữ chặt áo sơ mi của bạn khi bạn cúi người và vung gậy. Những lợi ích Công nghệ Dri-FIT giúp bạn luôn khô ráo và thoải mái. Vải dệt co giãn có họa tiết tinh tế ở bên trong giúp vải không bị dính vào da của bạn. Họa tiết \"Nike Golf\" lặp lại ở cạp quần bên trong có kết cấu hơi dính giúp cố định áo sơ mi nhét trong. Rãnh chữ V ở phía sau cạp quần giúp bạn co giãn thêm.', 'Nam', 1, 1),
('SP21', 'DM2', 'Nike Dri-FIT One', 469000, 869000, 'Những chiếc quần short này phù hợp cho mọi việc bạn làm—từ đi bộ đường dài đến HIIT cho đến chạy việc vặt. Chất liệu vải dệt siêu mềm, mịn như lụa của họ được cân bằng với công nghệ thấm mồ hôi để bạn có được sự thoải mái tối đa nhưng vẫn cảm thấy khô ráo khi tập luyện. Những lợi ích Công nghệ Nike Dri-FIT giúp loại bỏ mồ hôi khỏi da để bay hơi nhanh hơn, giúp bạn luôn khô ráo và thoải mái. Túi dây thắt lưng phong bì giữ cho nhu yếu phẩm của bạn gần gũi.', 'Nu', 1, 1),
('SP22', 'DM2', 'Nike Dri-FIT One Swoosh', 569000, 969000, 'Cho dù bạn đang chạy bộ hay chạy bộ đến cửa hàng ở góc đường, những chiếc quần short rộng rãi này sẽ giúp bạn luôn cảm thấy mát mẻ và tự tin. Chất liệu vải dệt siêu mềm, mịn như lụa của chúng được cân bằng với công nghệ thấm mồ hôi để bạn có được sự thoải mái tối đa trong khi vẫn cảm thấy khô ráo. Và không cần phải kiểm tra mắt: đồ họa Swoosh đôi ở chân trái mô phỏng chuyển động để truyền cảm hứng cho bạn tiếp tục.', 'Nu', 1, 1),
('SP23', 'DM2', 'Nike Tempo', 359000, 659000, 'Quần short Nike Tempo mang đến công nghệ thấm mồ hôi và thiết kế gọn gàng để vừa vặn cổ điển. Sản phẩm này được làm từ ít nhất 75% sợi polyester tái chế. Những lợi ích Công nghệ Dri-FIT giúp bạn luôn khô ráo và thoải mái. Miếng lót bên hông bằng lưới thông gió giúp bạn luôn mát mẻ. Cạp quần co giãn có dây rút bên trong giúp điều chỉnh độ vừa vặn. Túi bên trong phía sau bên phải giúp cất giữ thuận tiện.', 'Nu', 1, 1),
('SP24', 'DM2', 'Sabrina', 979000, 1379000, 'Cho dù bạn đang tinh chỉnh kỹ năng của mình trên sân như Sabrina Ionescu hay thư giãn ngoài sân, bộ sưu tập chữ ký đa năng, trung tính về giới tính này là dành cho bạn. Chiếc quần short chéo vừa vặn này được làm bằng vải thoáng khí, thấm mồ hôi để giúp bạn luôn mát mẻ và khô ráo trong mỗi đường chuyền, xoay người và thi đấu. Những lợi ích Công nghệ Nike Dri-FIT di chuyển mồ hôi ra khỏi da để bay hơi nhanh hơn, giúp bạn khô ráo và thoải mái. Túi lưới giúp bạn đựng những vật dụng cần thiết. Cạp quần co giãn có dây rút mang lại cảm giác vừa vặn.', 'Nu', 1, 1),
('SP25', 'DM2', 'Nike Sportswear', 1339000, 1839000, 'Hãy đứng dậy và biến đổi tủ quần áo lông cừu của bạn với cảm giác ấm cúng. Những chiếc quần chạy bộ cỡ lớn này có thêm khoảng trống ở chân để mang lại cảm giác thoải mái và thư thái. Vòng eo có gân cao hơn nằm cao hơn trên hông của bạn để mang lại cảm giác ôm sát, cố định. Những lợi ích Mềm mại bên ngoài và ấm cúng bên trong, lông cừu chải kỹ là chất liệu đáy bộ đồ thể thao phù hợp của chúng tôi để có nhiệt độ mát hơn. Đường gân kéo dài trên dây thắt lưng mang lại sự thoải mái và cấu trúc hơn.', 'Nu', 1, 1),
('SP26', 'DM2', 'Nike Sportswear', 779000, 1279000, 'Đơn giản, mềm mại và thoải mái—những chiếc quần short lông cừu này sẵn sàng cho mọi hoạt động. Với các túi để đựng những vật dụng nhỏ và dây rút để vừa khít, bạn có thể sẽ không bao giờ muốn cởi những thứ này ra. Những lợi ích Mềm mại ở bên ngoài và hơi mềm mại ở bên trong, loại lông cừu bán chải có trọng lượng trung bình của chúng tôi giúp bạn giữ ấm mà vẫn thoáng mát. Túi cung cấp khả năng lưu trữ nhanh chóng cho chìa khóa, điện thoại và bàn tay lạnh. Cạp quần co giãn và dây rút mang đến cho bạn sự vừa vặn hoàn hảo.', 'Nu', 1, 1),
('SP27', 'DM3', 'Nike Revolution 6', 1459000, 1759000, 'Đây là sự khởi đầu mới giữa bạn và vỉa hè. Thắt dây buộc được tái chế 100% và thiết lập tốc độ khi bắt đầu hành trình chạy của bạn với cảm giác sang trọng của Nike Revolution 6. Chúng tôi biết rằng sự thoải mái là chìa khóa để chạy thành công, vì vậy chúng tôi đảm bảo rằng các bước đi của bạn được đệm êm ái và linh hoạt để bạn có thể chạy thoải mái. đi xe nhẹ nhàng. Đó là một sự phát triển của sản phẩm được yêu thích, với thiết kế thoáng khí được làm bằng ít nhất 20% hàm lượng tái chế tính theo trọng lượng.', 'Nam', 1, 1),
('SP28', 'DM3', 'Nike Court Vision Low Next Nature', 1409000, 1909000, 'Yêu thích vẻ ngoài cổ điển của bóng rổ thập niên 80 nhưng lại thích văn hóa nhịp độ nhanh của trò chơi ngày nay? Gặp gỡ Nike Court Vision Low. Một sản phẩm cổ điển được phối lại với ít nhất 20% vật liệu tái chế tính theo trọng lượng, lớp phủ trên và đường khâu sắc nét vẫn giữ được linh hồn của phong cách nguyên bản. Cổ áo sang trọng, cắt thấp giúp kiểu dáng đẹp và thoải mái cho thế giới của bạn. Những lợi ích Được làm từ ít nhất 20% vật liệu tái chế tính theo trọng lượng. Bất cứ khi nào bạn nhìn thấy Nike Sunburst hoặc cái tên Next Nature (NN), bạn sẽ thấy thêm một bước nữa trên hành trình hướng tới không carbon và không rác thải của chúng tôi.', 'Nam', 1, 1),
('SP29', 'DM3', 'Nike Downshifter 12', 1409000, 1909000, 'Hãy thực hiện những bước đầu tiên trên hành trình chạy bộ của bạn với Nike Downshifter 12. Được làm từ ít nhất 20% trọng lượng tái chế, giày mang lại cảm giác vừa vặn và ổn định, mang lại cảm giác nhẹ nhàng giúp bạn dễ dàng chuyển từ tập luyện sang đi chơi. Chuyến đi của bạn bắt đầu. Thắt dây và lên đường. Mát, Nhẹ, Nhanh Lưới khắp phần trên mang lại cảm giác nhẹ, thoáng khí. Lưới được đặt ở các vùng chính dựa trên phản hồi của người chạy, mang đến cho bạn khả năng làm mát ở những nơi cần thiết.', 'Nam', 1, 1),
('SP3', 'DM1', 'Nike ESC', 1349000, 1749000, 'Chúng tôi chú ý đến từng chi tiết và đã tạo ra chiếc áo nỉ này từ chất liệu vải jersey cotton dệt kim siêu mềm để mang lại sự ấm áp và thoải mái thoáng khí. Nó được thiết kế để vừa với một số không gian ở vai, ngực và cơ thể để dễ dàng di chuyển và mặc nhiều lớp.', 'Nam', 1, 1),
('SP30', 'DM3', 'Nike Defy All Day', 1309000, 1709000, 'Thực hiện các thử thách hàng ngày trong Nike Defy All Day. Lớp da phía trên và lực kéo cao su ở phía dưới tạo nên một thiết kế bền bỉ có thể chịu đựng được sự khắc nghiệt của những buổi tập luyện khắc nghiệt. Lớp đệm mềm mang lại sự thoải mái trong suốt quá trình tập luyện của bạn—hoặc một ngày hoàn thành công việc. Thiết kế bền bỉ Da cứng ở phía trên đáp ứng nhu cầu tập luyện của bạn. Tích hợp khả năng thoáng khí giúp chân bạn luôn mát mẻ.', 'Nam', 1, 1),
('SP31', 'DM3', 'Nike Fly.By Mid 3', 1609000, 1909000, 'Đệm, hỗ trợ mắt cá chân và lực kéo là rất cần thiết trên sân bóng rổ. Nike Fly.By Mid 3 cung cấp chính xác những gì cần thiết để giúp người chơi vượt trội trong tấn công và phòng thủ. Được thiết kế để mang lại cảm giác thoải mái nhất có thể, giày sneaker cổ giữa có lớp bọt sang trọng, chuyển hồi năng lượng giúp bạn luôn sảng khoái suốt bốn phần tư. Đệm sang trọng Bọt Nike cung cấp lớp đệm nhẹ, đàn hồi mà bạn có thể đeo trong và ngoài sân đấu. Họa tiết riêng biệt được đúc vào đế giữa mang lại cảm giác thoải mái tức thì và trực quan.', 'Nam', 1, 1),
('SP32', 'DM3', 'NikeCourt Royale 2 Next Nature', 1309000, 1609000, 'Một tia sáng từ quá khứ gặp thời hiện đại. NikeCourt Royale 2 Next Nature được làm từ ít nhất 20% trọng lượng tái chế. Chúng tôi cố tình thay thế loại da có độ va đập cao bằng da tổng hợp để có vẻ ngoài sắc nét, mịn màng và dễ đeo. Dấu Swoosh lớn, theo phong cách cổ điển tăng thêm sự hấp dẫn. Những lợi ích Phần trên bằng da tổng hợp mịn màng và dễ tạo kiểu. Đế xương cá tăng thêm lực kéo và độ bền. Cổ áo có đệm, cắt thấp trông bóng bẩy và tạo cảm giác thoải mái.', 'Nam', 1, 1),
('SP33', 'DM3', 'Nike Court Vision Low Next Nature', 1309000, 1809000, 'Yêu thích vẻ ngoài cổ điển của bóng rổ thập niên 80 nhưng lại thích văn hóa nhịp độ nhanh của trò chơi ngày nay? Gặp gỡ Nike Court Vision Low Next Nature. Được làm từ ít nhất 20% vật liệu tái chế tính theo trọng lượng, lớp phủ trên và đường khâu sắc nét của nó được lấy cảm hứng từ thời của những cú móc và tất ống. Cổ giày có đệm và đế ngoài bằng cao su mang lại sự thoải mái và lực kéo cho thế giới của bạn.', 'Nu', 1, 1),
('SP34', 'DM3', 'NikeCourt Legacy Canvas', 1309000, 1609000, 'Tôn vinh lịch sử bắt nguồn từ văn hóa quần vợt, NikeCourt Legacy Canvas mang đến cho bạn sự cổ điển trong thiết kế hiện đại, phù hợp với đường phố. Được làm từ vải bạt bền và có đường khâu truyền thống cũng như thiết kế Swoosh cổ điển, nó cho phép bạn kết hợp giữa thể thao và thời trang. Những lợi ích Thân giày cổ điển, lấy cảm hứng từ quần vợt có thể đeo ở mọi nơi, có vải bạt bền và logo Swoosh cổ điển. Cấu trúc nồi hấp kết hợp đế ngoài với đế giữa để tạo vẻ ngoài hợp lý trong khi cổ giày cắt thấp ôm sát mắt cá chân của bạn để mang lại cảm giác thoải mái.', 'Nu', 1, 1),
('SP35', 'DM3', 'Nike Legend Essential 3 Next Nature', 1609000, 1909000, 'Gặp gỡ huấn luyện viên có thể chịu được sự khắc nghiệt của lớp học nhóm nhịp độ nhanh và một ngày nặng nhọc trong phòng tập tạ. Được trang bị gót phẳng, vật liệu bền và đế linh hoạt, giày mang đến sự thoải mái và hỗ trợ sẵn sàng tập luyện tại bất kỳ phòng tập nào, bất kỳ lúc nào. Được làm từ Nike Grind Đế ngoài được làm bằng ít nhất 8% chất liệu Nike Grind, được làm từ phế liệu trong quá trình sản xuất giày dép.﻿', 'Nu', 1, 1),
('SP36', 'DM3', 'Nike Revolution 7', 1489000, 1789000, 'Chúng tôi đã trang bị cho Revolution 7 loại đệm mềm và hỗ trợ có thể thay đổi thế giới chạy bộ của bạn. Phong cách hơn bao giờ hết, thoải mái khi cao su đáp ứng mặt đường và được điều khiển theo hiệu suất theo tốc độ mong muốn của bạn, đó là sự phát triển của mẫu xe được người hâm mộ yêu thích mang đến cảm giác lái êm ái, mềm mại. Đi xe đầy bọt Đế giữa bằng xốp mang lại cảm giác đi lại mềm mại, êm ái. Bàn chân trước cũng có nhiều khoảng trống hơn một chút so với số 6, vì vậy ngón chân của bạn không có cảm giác chật hoặc bị chèn ép.', 'Nu', 1, 1),
('SP37', 'DM3', 'Nike Experience Run 11', 1309000, 1909000, 'Thoải mái zen, giống như mọi cuộc chạy bộ. Với Nike Experience Run 11, chúng tôi đã tạo ra một thiết kế gọn nhẹ và gọn gàng, mang lại cảm giác đẹp như vẻ ngoài của nó. Nó hỗ trợ theo mọi cách phù hợp với chuyển động rất tự nhiên, bạn sẽ thề rằng bạn đã đeo nó trong nhiều năm. Ngoài ra, chúng tôi đã tạo ra sản phẩm này với ít nhất 20% hàm lượng tái chế tính theo trọng lượng, giúp chúng tôi tiếp tục hành trình bền vững của mình.', 'Nu', 1, 1),
('SP38', 'DM3', 'Nike Downshifter 12', 1609000, 1909000, 'Hãy thực hiện những bước đầu tiên trên hành trình chạy bộ của bạn với Nike Downshifter 12. Giày có kiểu dáng vừa vặn hỗ trợ và cảm giác đạp xe ổn định, với cảm giác nhẹ nhàng giúp bạn dễ dàng chuyển từ tập luyện sang đi chơi. Sản phẩm này tiếp tục hành trình phát triển bền vững của chúng tôi với thiết kế được làm từ ít nhất 20% vật liệu tái chế tính theo trọng lượng. Chuyến đi của bạn bắt đầu. Thắt dây và lên đường. Mát, Nhẹ, Nhanh Lưới khắp phần trên mang lại cảm giác nhẹ, thoáng khí. Lưới được đặt ở những vùng quan trọng ở bàn chân trước dựa trên phản hồi của người chạy, mang lại cho bạn khả năng làm mát ở những nơi cần thiết.', 'Nu', 1, 1),
('SP39', 'DM1', 'Áo', 2, 3, 'cô bé ơi', 'Nam', 1, 1),
('SP4', 'DM1', 'The Nike Polo', 579000, 879000, 'Đây không phải là loại polo thông thường của bạn—đó là Nike Polo. Mọi chi tiết, từ loại vải sáng tạo, thấm mồ hôi cho đến những điểm nhấn màu cam giống với hộp giày nguyên bản của Nike, đều được chế tạo một cách chu đáo để đáp ứng nhu cầu hàng ngày của bạn. Kết quả là một phong cách sẵn sàng cho đường phố trông như ở nhà trên sân hoặc sân cũng như ở mọi nơi khác. Trên hết, sản phẩm này được làm từ 100% vật liệu bền vững—sử dụng hỗn hợp cả sợi polyester tái chế và sợi bông hữu cơ.', 'Nam', 1, 1),
('SP5', 'DM1', 'Nike Dri-FIT Victory', 279000, 579000, 'Sản phẩm Nike Dri-FIT Victory được làm từ 100% sợi polyester tái chế. Được chế tạo từ vải thoáng khí, thấm mồ hôi, Nike Dri-FIT Victory Polo mang đến một bước đột phá mới cho hiệu suất chơi gôn. Sản phẩm này được làm từ 100% sợi polyester tái chế.', 'Nam', 1, 1),
('SP6', 'DM1', 'NikeCourt Dri-FIT', 869000, 1069000, 'Sản phẩm NikeCourt Dri-FIT được làm từ 100% sợi polyester tái chế. Được làm từ vải dệt kim mềm mại được làm từ 100% sợi polyester tái chế, NikeCourt Dri-FIT Polo là một món đồ thể thao có kiểu dáng cổ điển, thấm mồ hôi.', 'Nam', 1, 1),
('SP7', 'DM1', 'Jordan Jumpman', 359000, 659000, 'Vươn lên và tỏa sáng trong chiếc áo phông cổ điển này của Jordan Brand. Được làm từ chất liệu cotton mềm mại, thoải mái, áo có hình Jumpman cổ điển, sạch sẽ được thêu trên ngực.', 'Nam', 1, 1),
('SP8', 'DM1', 'Nike Dri-FIT UV Miler', 519000, 819000, 'Sản phẩm Nike Dri-FIT UV Miler được làm từ 100% sợi polyester tái chế. Hãy đạt được những dặm bổ sung đó với một chiếc áo có thể chịu được hình phạt. Miler Top thấm mồ hôi của chúng tôi trở lại với thân dài hơn và vải siêu nhẹ, để bạn có được độ che phủ tốt hơn mà không bị nặng. Nó mát mẻ và thoáng khí, vừa vặn, thoải mái và không làm bạn chậm lại. Ngoài ra, khả năng chống tia cực tím giúp tăng thêm độ che phủ khỏi ánh nắng mặt trời.', 'Nam', 1, 1),
('SP9', 'DM1', 'Nike Sportswear', 839000, 1039000, 'Hãy quay trở lại thời kỳ của những bức thư đính đá và chữ in nổi trong chiếc áo len cổ điển này. Kiểu dáng cực kỳ vừa vặn và đường gân phóng đại của nó tạo nên sự vừa vặn, thoải mái và thư giãn.Những lợi ích\r\nMềm mại bên ngoài và ấm áp bên trong, lông cừu chải kỹ là chất liệu áo nỉ ưa thích của chúng tôi cho nhiệt độ lạnh hơn.\r\nĐường gân kéo dài ở cổ tay áo và viền áo mang lại sự thoải mái và cấu trúc hơn.', 'Nu', 1, 1);

--
-- Triggers `tbl_sanpham`
--
DELIMITER $$
CREATE TRIGGER `Insert_MaSP_Trigger` BEFORE INSERT ON `tbl_sanpham` FOR EACH ROW BEGIN
    DECLARE id INT;

    SELECT MAX(CAST(SUBSTRING(MaSP, 3) AS UNSIGNED)) INTO id FROM tbl_sanpham;

    IF id IS NULL THEN
        SET id = 1;
    ELSE
        SET id = id + 1;
    END IF;

    SET NEW.MaSP = CONCAT('SP', id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_taikhoanadmin`
--

CREATE TABLE `tbl_taikhoanadmin` (
  `MaTK` varchar(20) NOT NULL,
  `TaiKhoan` text NOT NULL,
  `MatKhau` text NOT NULL,
  `TrangThaiTKAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_taikhoanadmin`
--

INSERT INTO `tbl_taikhoanadmin` (`MaTK`, `TaiKhoan`, `MatKhau`, `TrangThaiTKAdmin`) VALUES
('TK1', 'admin1@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1);

--
-- Triggers `tbl_taikhoanadmin`
--
DELIMITER $$
CREATE TRIGGER `Insert_MaTK_trigger` BEFORE INSERT ON `tbl_taikhoanadmin` FOR EACH ROW BEGIN
    DECLARE id INT;

    SELECT MAX(CAST(SUBSTRING(MaTK, 3) AS UNSIGNED)) INTO id FROM tbl_taikhoanadmin;

    IF id IS NULL THEN
        SET id = 1;
    ELSE
        SET id = id + 1;
    END IF;

    SET NEW.MaTK = CONCAT('TK', id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yeuthich`
--

CREATE TABLE `tbl_yeuthich` (
  `MaYT` varchar(20) NOT NULL,
  `MaKH` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_yeuthich`
--

INSERT INTO `tbl_yeuthich` (`MaYT`, `MaKH`) VALUES
('YT1', 'KH1'),
('YT2', 'KH2'),
('YT3', 'KH3');

--
-- Triggers `tbl_yeuthich`
--
DELIMITER $$
CREATE TRIGGER `Insert_MaKH_Trigger_YT` BEFORE INSERT ON `tbl_yeuthich` FOR EACH ROW BEGIN
    DECLARE id INT;

    SELECT MAX(CAST(SUBSTRING(MaKH, 3) AS UNSIGNED)) INTO id FROM tbl_yeuthich;

    IF id IS NULL THEN
        SET id = 1;
    ELSE
        SET id = id + 1;
    END IF;

    SET NEW.MaKH = CONCAT('KH', id);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insert_MaYT_Trigger` BEFORE INSERT ON `tbl_yeuthich` FOR EACH ROW BEGIN
    DECLARE id INT;

    SELECT MAX(CAST(SUBSTRING(MaYT, 3) AS UNSIGNED)) INTO id FROM tbl_yeuthich;

    IF id IS NULL THEN
        SET id = 1;
    ELSE
        SET id = id + 1;
    END IF;

    SET NEW.MaYT = CONCAT('YT', id);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`MaDH`,`MaSP`),
  ADD KEY `FF_CTDH_SP` (`MaSP`);

--
-- Indexes for table `tbl_chitietgiohang`
--
ALTER TABLE `tbl_chitietgiohang`
  ADD PRIMARY KEY (`MaGH`,`MaSP`),
  ADD KEY `FK_CTGH_SP` (`MaSP`);

--
-- Indexes for table `tbl_chitietyeuthich`
--
ALTER TABLE `tbl_chitietyeuthich`
  ADD PRIMARY KEY (`MaYT`,`MaSP`),
  ADD KEY `FK_CTYT_SP` (`MaSP`);

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`MaDH`),
  ADD KEY `FK_DH_KH` (`MaKH`);

--
-- Indexes for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`MaGH`),
  ADD KEY `FK_GH_KH` (`MaKH`);

--
-- Indexes for table `tbl_gopy`
--
ALTER TABLE `tbl_gopy`
  ADD PRIMARY KEY (`MaGY`),
  ADD KEY `FK_GY_KH` (`MaKH`);

--
-- Indexes for table `tbl_hinhanh`
--
ALTER TABLE `tbl_hinhanh`
  ADD PRIMARY KEY (`MaHA`),
  ADD KEY `FK_HA_SP` (`MaSP`);

--
-- Indexes for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Indexes for table `tbl_kichthuoc`
--
ALTER TABLE `tbl_kichthuoc`
  ADD PRIMARY KEY (`MaKT`);

--
-- Indexes for table `tbl_kicthuoc_sanpham`
--
ALTER TABLE `tbl_kicthuoc_sanpham`
  ADD PRIMARY KEY (`MaKT`,`MaSP`),
  ADD KEY `FK_KTSP_SP` (`MaSP`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `FK_SP_DM` (`MaDM`);

--
-- Indexes for table `tbl_taikhoanadmin`
--
ALTER TABLE `tbl_taikhoanadmin`
  ADD PRIMARY KEY (`MaTK`);

--
-- Indexes for table `tbl_yeuthich`
--
ALTER TABLE `tbl_yeuthich`
  ADD PRIMARY KEY (`MaYT`),
  ADD KEY `FK_YT_KH` (`MaKH`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD CONSTRAINT `FF_CTDH_SP` FOREIGN KEY (`MaSP`) REFERENCES `tbl_sanpham` (`MaSP`),
  ADD CONSTRAINT `FK_CTDH_DH` FOREIGN KEY (`MaDH`) REFERENCES `tbl_donhang` (`MaDH`);

--
-- Constraints for table `tbl_chitietgiohang`
--
ALTER TABLE `tbl_chitietgiohang`
  ADD CONSTRAINT `FK_CTGH_GH` FOREIGN KEY (`MaGH`) REFERENCES `tbl_giohang` (`MaGH`),
  ADD CONSTRAINT `FK_CTGH_SP` FOREIGN KEY (`MaSP`) REFERENCES `tbl_sanpham` (`MaSP`);

--
-- Constraints for table `tbl_chitietyeuthich`
--
ALTER TABLE `tbl_chitietyeuthich`
  ADD CONSTRAINT `FK_CTYT_SP` FOREIGN KEY (`MaSP`) REFERENCES `tbl_sanpham` (`MaSP`),
  ADD CONSTRAINT `FK_CTYT_YT` FOREIGN KEY (`MaYT`) REFERENCES `tbl_yeuthich` (`MaYT`);

--
-- Constraints for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD CONSTRAINT `FK_DH_KH` FOREIGN KEY (`MaKH`) REFERENCES `tbl_khachhang` (`MaKH`);

--
-- Constraints for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD CONSTRAINT `FK_GH_KH` FOREIGN KEY (`MaKH`) REFERENCES `tbl_khachhang` (`MaKH`);

--
-- Constraints for table `tbl_gopy`
--
ALTER TABLE `tbl_gopy`
  ADD CONSTRAINT `FK_GY_KH` FOREIGN KEY (`MaKH`) REFERENCES `tbl_khachhang` (`MaKH`);

--
-- Constraints for table `tbl_hinhanh`
--
ALTER TABLE `tbl_hinhanh`
  ADD CONSTRAINT `FK_HA_SP` FOREIGN KEY (`MaSP`) REFERENCES `tbl_sanpham` (`MaSP`);

--
-- Constraints for table `tbl_kicthuoc_sanpham`
--
ALTER TABLE `tbl_kicthuoc_sanpham`
  ADD CONSTRAINT `FK_KTSP_KT` FOREIGN KEY (`MaKT`) REFERENCES `tbl_kichthuoc` (`MaKT`),
  ADD CONSTRAINT `FK_KTSP_SP` FOREIGN KEY (`MaSP`) REFERENCES `tbl_sanpham` (`MaSP`);

--
-- Constraints for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `FK_SP_DM` FOREIGN KEY (`MaDM`) REFERENCES `tbl_danhmuc` (`MaDM`);

--
-- Constraints for table `tbl_yeuthich`
--
ALTER TABLE `tbl_yeuthich`
  ADD CONSTRAINT `FK_YT_KH` FOREIGN KEY (`MaKH`) REFERENCES `tbl_khachhang` (`MaKH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
