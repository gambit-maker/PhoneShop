<?php


// cart Controller
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) {
            return null;
        }
        $this->db = $db;
    }

    // insert into cart table

    public function insertIntoCart($params = null, $table = "giohang")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode(',', array_keys($params));

                $values = implode(',', array_values($params));

                // query insert string 
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }


    public function addToCart($userID, $itemID)
    {
        if (isset($userID) && isset($itemID)) {
            $params = array(
                "MaTaiKhoan" => $userID,
                "MaSanPham" => $itemID
            );

            // insert data to cart

            $result = $this->insertIntoCart($params);
            if ($result) {
                // header("Location:".$_SERVER['PHP_SELF']);
            }
        }
    }

    public function giamMotSanPham($userID, $itemID)
    {
        if ($this->db->con != null) {
            $query_string = "DELETE FROM giohang 
                                    WHERE MaTaiKhoan = {$userID} AND MaSanPham = {$itemID}
                                    ORDER BY MaGioHang DESC limit 1";
        }
        $this->db->con->query($query_string);
    }

    public function sumOfProduct($accountID, $table = "giohang")
    {
        $sum = 0;
        $query_string = "SELECT * FROM {$table} WHERE MaTaiKhoan = {$accountID}";
        $result = $this->db->con->query($query_string);

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $sum += 1;
        }
        return $sum;
    }

    // fetch Data in Product using getData Method
    // lấy thông tin giỏ hàng của user với id
    public function getDataFromAccountId($accountID = null, $table = "giohang")
    {
        $resultArray = array();
        if ($accountID != null) {
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE MaTaiKhoan = {$accountID}");
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }


    public function getDataFromAccountIdDistinct($accountID = null, $table = "giohang")
    {
        $resultArray = array();
        if ($accountID != null) {
            $result = $this->db->con->query("SELECT DISTINCT MaTaiKhoan,MaSanPham FROM {$table} WHERE MaTaiKhoan = {$accountID}");
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }

    // delete cart
    public function deleteItemInCart($itemId = null)
    {
        if ($itemId != null) {
            $this->db->con->query("DELETE FROM giohang WHERE MaSanPham = {$itemId}");
        }
    }

    public function sumItemInCart($arr){
        if (isset($arr)) {
            $sum = 0;
            foreach ($arr as $item) {
                $sum += $item[0];
            }
            return sprintf($sum);
        }
    }             

    public function getData($table = "dienthoai"){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }         

    public function getTongTienTrongGio($accountID)
    {        
        $sum = 0;
        foreach ($this->getDataFromAccountId($accountID) as $item) {
            foreach ($this->getData() as $item2) {
                if ($item['MaSanPham'] == $item2['MaDienThoai']) {
                    $sum += $item2['GiaTien'];
                }
            }        
        }
        return $sum;
    }

    // get item_id of shopping cart
    // lay ma san pham
    public function getCartId($cartArr = null,$key = "MaSanPham")
    {
        if ($cartArr != null) {
            $cart_id = array_map(function($value) use ($key){
                return $value[$key];
            },$cartArr);
            return $cart_id;
        }        
        
    }
}
