<?php
// use to fetch product data
class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) {
            return null;
        }
        $this->db = $db;
    }

    // fetch Data in Product using getData Method
    public function getData($table = "dienthoai")
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getDataTopSale($table = "dienthoai", $soLuong = '10')
    {
        $query_string = "SELECT * FROM {$table} WHERE DaBan >= '$soLuong'";
        $result = $this->db->con->query($query_string);

        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getBrandName()
    {
        $result = $this->db->con->query("SELECT DISTINCT * FROM dienthoai JOIN hang ON dienthoai.MaHang=hang.MaHang");

        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getBrandNameV2($maHang)
    {
        $result = $this->db->con->query("SELECT DISTINCT * FROM hang JOIN dienthoai 
            ON hang.MaHang = dienthoai.MaHang 
            WHERE hang.MaHang = $maHang");

        $item = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $item['TenHang'];
    }


    // get product using item id

    public function getProduct($item_id = null, $table = 'dienthoai')
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE MaDienThoai={$item_id}");
        }

        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    // get product price
    public function layGiaTien($maDienThoai)
    {
        if ($this->db->con != null) {
            $query_string = "SELECT * FROM dienthoai WHERE MaDienThoai = $maDienThoai";
        }
        $result = $this->db->con->query($query_string);
        $item = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $item['GiaTien'];
    }

    // lay anh dai dien
    public function layDienThoai($maDienThoai, $noiDung = 'img') // noi dung = lấy cái gì trong điện thoại
    {
        if ($this->db->con != null) {
            $query_string = "SELECT * FROM dienthoai WHERE MaDienThoai = $maDienThoai";
        }
        $result = $this->db->con->query($query_string);
        $item = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $item[$noiDung];
    }

    // tim kiem san pham
    public function timKiem($chuoi)
    {
        if ($this->db->con != null) {
            $query_string = "SELECT * FROM dienthoai JOIN hang 
                ON dienthoai.MaHang = hang.MaHang
                WHERE dienthoai.TenDienThoai LIKE '%$chuoi%' OR hang.MaHang LIKE '%$chuoi%'";
        }
        $result = $this->db->con->query($query_string);
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    // tim kiem hang
    public function timKiemHang($chuoi)
    {
        if ($this->db->con != null) {
            $query_string = "SELECT * FROM hang                 
                WHERE hang.TenHang LIKE '%$chuoi%'";
        }
        $result = $this->db->con->query($query_string);
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }


    // thêm sản phẩm 
    public function themDienThoai($tenDienThoai, $maHang, $img, $giaTien, $moTa, $soLuong)
    {
        if ($this->db->con != null) {
            $query_string = "INSERT INTO `dienthoai`(`TenDienThoai`, `MaHang`, `img`, `GiaTien`, `MoTa`, `SoLuong`)
                 VALUES ('$tenDienThoai','$maHang','$img','$giaTien','$moTa','$soLuong')";
        }
        $this->db->con->query($query_string);
    }

    // thêm hãng
    public function themHang($tenHang)
    {
        if ($this->db->con != null) {
            $query_string = "INSERT INTO `hang`(`TenHang`) VALUES ('$tenHang')";
        }
        $this->db->con->query($query_string);
    }

    //xoa san pham
    public function xoaSanPham($maSanPham)
    {
        if ($this->db->con != null) {
            $query_string = "DELETE FROM dienthoai WHERE MaDienThoai = $maSanPham";
        }
        $this->db->con->query($query_string);
    }

    //xoa hang
    public function xoaHang($maHang)
    {
        if ($this->db->con != null) {
            $query_string = "DELETE FROM hang WHERE MaHang = $maHang";
        }
        $this->db->con->query($query_string);
    }

    // chỉ lấy 1 sp
    public function getProductOnly($item_id = null, $table = 'dienthoai')
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE MaDienThoai={$item_id}");
        }


        $item = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $item;
    }

    // chỉ lấy 1 hang
    public function getBrandOnly($item_id = null, $table = 'hang')
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE MaHang={$item_id}");
        }


        $item = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $item;
    }

    public function updateDienThoai($maDienThoai, $tenDienThoai, $maHang, $img, $giaTien, $moTa, $soLuong)
    {
        if (isset($maDienThoai)) {
            $query_string = "UPDATE `dienthoai`
                 SET `TenDienThoai`= '$tenDienThoai',
                 `MaHang`= '$maHang',
                 `img`='$img',
                 `GiaTien`='$giaTien',
                 `MoTa`='$moTa',
                 `SoLuong`='$soLuong'
                  WHERE MaDienThoai = $maDienThoai";
            $this->db->con->query($query_string);
        }
    }

    public function updateHang($maHang, $tenHang)
    {
        if (isset($tenHang)) {
            $query_string = "UPDATE `hang` SET `TenHang`='$tenHang' WHERE MaHang = $maHang";
            $this->db->con->query($query_string);
        }
    }

    public function capNhapSoLuong($maDienThoai, $soLuong)
    {
        $query_string = "UPDATE dienthoai 
            SET SoLuong = SoLuong - '$soLuong',
            DaBan = DaBan + '$soLuong' 
            WHERE MaDienThoai = $maDienThoai";
        $this->db->con->query($query_string);
    }

    public function timSanPhamVoiGiaTien($from, $to)
    {
        $query_string = "SELECT * from dienthoai WHERE GiaTien BETWEEN $from and $to";
        $result = $this->db->con->query($query_string);
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
}
