<?php
// use to fetch product data
class Account
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) {
            return null;
        }
        $this->db = $db;
    }

    public function insertAccount($name, $password, $phone, $address)
    {
        $query_string = "INSERT INTO `taikhoan`(`TenDangNhap`, `MatKhau`, `Admin`, `DienThoai`, `DiaChi`)
                            VALUES ('$name','$password',0,'$phone','$address')";
        $this->db->con->query($query_string);
    }

    // tim kiem hang
    public function timKiemAcc($chuoi)
    {
        if ($this->db->con != null) {
            $query_string = "SELECT * FROM taikhoan                 
            WHERE TenDangNhap LIKE '%$chuoi%'";
        }
        $result = $this->db->con->query($query_string);
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function xoaAccount($maAccount)
    {
        if ($this->db->con != null) {
            $query_string = "DELETE FROM taikhoan WHERE MaTaiKhoan = $maAccount";
        }
        $this->db->con->query($query_string);
    }


    // lấy ra account với ID
    public function getAccountOnlly($accountID, $table = 'taikhoan')
    {
        if (isset($accountID)) {
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE MaTaiKhoan=$accountID");
        }


        $item = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $item;
    }

    public function updateAccount($accountID, $tenDangNhap, $matKhau, $admin, $dienThoai, $diaChi)
    {
        if (isset($accountID)) {
            $query_string = "UPDATE `taikhoan` 
            SET `TenDangNhap`='$tenDangNhap',
            `MatKhau`='$matKhau',
            `Admin`='$admin',
            `DienThoai`='$dienThoai',
            `DiaChi`='$diaChi'
            WHERE MaTaiKhoan = $accountID";
            
            $this->db->con->query($query_string);                                
        }
    }
}
