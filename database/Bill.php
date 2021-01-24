<?php

class Bill
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) {
            return null;
        }
        $this->db = $db;
    }

    public function getData($table = "donhang"){
        $result = $this->db->con->query("SELECT * FROM {$table} ORDER BY TrangThai ASC, NgayDat DESC");

        $resultArray = array();
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }         

    public function themDonHang($maKhachHang, $tongTien)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeNow = date('Y-m-d');
        if ($this->db->con != null) {
            $query_string = "INSERT INTO `donhang`(`MaKhachHang`, `NgayDat`, `TongTien`, `TrangThai`)
                VALUES ('$maKhachHang','$timeNow','$tongTien',0)";
        }
        $this->db->con->query($query_string);
        $maDonHang1 = mysqli_insert_id($this->db->con);

        $this->themChiTietDonHang($maDonHang1, $maKhachHang);
    }

    public function xoaGioHangKhiThemVaoDon($maKhachHang)
    {
        if ($this->db->con != null) {
            $query_string = "DELETE FROM giohang WHERE MaTaiKhoan=$maKhachHang";
        }
        $this->db->con->query($query_string);
    }

    public function themChiTietDonHang($maDonHang, $maKhachHang) //item trong gio Lấy DISTINCT
    {
        $cart = new Cart($this->db);
        $product = new Product($this->db);
        $itemTrongGioCuaKhachHang = $cart->getDataFromAccountIdDistinct($maKhachHang); //lay giu lieu khach hang trong gio hang
        if ($cart->getCartId($cart->getDataFromAccountId($maKhachHang)) != null) {
            $count = array_count_values($cart->getCartId($cart->getDataFromAccountId($maKhachHang)));
            foreach ($itemTrongGioCuaKhachHang as $item) {
                $maSanPham = $item['MaSanPham'];
                $soLuong = $count[$item['MaSanPham']];
                $donGia = $product->layGiaTien($item['MaSanPham']);

                $query_string = "INSERT INTO `chitietdonhang`(`MaDonHang`, `MaDienThoai`, `SoLuong`, `DonGia`)
                    VALUES ('$maDonHang','$maSanPham','$soLuong','$donGia')";
                $this->db->con->query($query_string);
            }
        }
    }

    public function hienThiChiTietDonHang($maKhachHang,$trangThai = "0")
    {
        if ($this->db->con != null) {
            $query_string = "SELECT * FROM chitietdonhang JOIN donhang
                ON chitietdonhang.MaDonHang = donhang.MaDonHang 
                WHERE donhang.TrangThai = '$trangThai' AND donhang.MaKhachHang= $maKhachHang";
        }
        $result = $this->db->con->query($query_string);
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function hienThiDonHangV2($maKhachHang,$trangThai="0")
    {
        if ($this->db->con != null) {
            $query_string = "SELECT * FROM donhang 
                WHERE TrangThai = '$trangThai' AND MaKhachHang= $maKhachHang";
        }
        $result = $this->db->con->query($query_string);
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }




    public function huyDonHang($maKhachHang)
    {
        if ($this->db->con != null) {
            $query_string = "DELETE FROM donhang WHERE MaKhachHang = $maKhachHang AND TrangThai = 0 ";
        }
        $this->db->con->query($query_string);
    }


    public function duyetDonHang($maDonHang, $trangThai = '1')
    {
        if ($this->db->con != null) {
            $query_string = "UPDATE donhang
             SET TrangThai= '$trangThai'
              WHERE MaDonHang = $maDonHang";
        }
        $this->db->con->query($query_string);
    }

    public function xoaDonHang($maDonHang)
    {
        if ($this->db->con != null) {
            $query_string = "DELETE FROM donhang where MaDonHang = $maDonHang";
            $this->db->con->query($query_string);
        }
    }

    public function timHoaDonDuyet($trangThai = "1")
    {
        if ($this->db->con != null) {
            $query_string = "SELECT * FROM donhang where TrangThai = $trangThai ";
            $result = $this->db->con->query($query_string);
            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    public function hienThiChiTietDonHangDungMaDonHang($maDonHang)
    {
        if ($this->db->con != null) {
            $query_string = "SELECT * FROM chitietdonhang where MaDonHang = $maDonHang ";
            $result = $this->db->con->query($query_string);
            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    public function layDuLieuDonHang($maDonHang,$duLieu = "TongTien")
    {

        $result = $this->db->con->query("SELECT DISTINCT * FROM donhang            
            WHERE MaDonHang = $maDonHang");

        $item = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $item[$duLieu];
    }

    public function thongKeTheoKhoangThoiGian($from, $to)
    {
        $query_string = "SELECT * FROM donhang WHERE NgayDat BETWEEN '$from' AND '$to' AND TrangThai = 3";
        $result = $this->db->con->query($query_string);
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function thongKeTheoNamThang($yearMonthData)
    {
        $query_string = "SELECT * from donhang WHERE date_format(NgayDat,'%Y-%m') = '$yearMonthData' AND TrangThai = 3";
        $result = $this->db->con->query($query_string);
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
}
