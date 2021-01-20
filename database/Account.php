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
}
