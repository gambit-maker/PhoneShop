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
    public function getDataFromAccountId($accountID = null,$table = "giohang")
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
}
