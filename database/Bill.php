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

    public function themDonHang($maKhachHang,$tongTien)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeNow = date('Y-m-d');
        if ($this->db->con != null) {            
            $query_string = "INSERT INTO `donhang`(`MaKhachHang`, `NgayDat`, `TongTien`, `TrangThai`)
                VALUES ('$maKhachHang','$timeNow','$tongTien',0)";                    
        }
        $this->db->con->query($query_string);
        $maDonHang1 = mysqli_insert_id($this->db->con);

        $this->themChiTietDonHang($maDonHang1,$maKhachHang);


    }

    public function xoaGioHangKhiThemVaoDon($maKhachHang)
    {
        if ($this->db->con != null) {            
            $query_string = "DELETE FROM giohang WHERE MaTaiKhoan=$maKhachHang";
        }
        $this->db->con->query($query_string);
    }

    public function themChiTietDonHang($maDonHang,$maKhachHang) //item trong gio Lấy DISTINCT
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

    public function hienThiChiTietDonHang($maKhachHang)
    {
        if ($this->db->con != null) {            
            $query_string = "SELECT * FROM chitietdonhang JOIN donhang
                ON chitietdonhang.MaDonHang = donhang.MaDonHang 
                WHERE donhang.TrangThai = 0 AND donhang.MaKhachHang= $maKhachHang";
        }
        $result = $this->db->con->query($query_string);
        $resultArray = array();
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
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
  
}
