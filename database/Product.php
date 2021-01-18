<?php 
    // use to fetch product data
    class Product{
        public $db = null;

        public function __construct(DBController $db)
        {
            if (!isset($db->con)) {
                return null;
            }
            $this->db = $db;
        }

        // fetch Data in Product using getData Method
        public function getData($table = "dienthoai"){
            $result = $this->db->con->query("SELECT * FROM {$table}");

            $resultArray = array();
            while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }         

        public function getBrandName(){
            $result = $this->db->con->query("SELECT TenHang FROM dienthoai JOIN hang WHERE dienthoai.Mahang=hang.Mahang");

            $resultArray = array();
            while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                $resultArray[] = $item;                
            }
            return $resultArray;
        }


        // get product using item id

        public function getProduct($item_id = null, $table='dienthoai'){
            if (isset($item_id)) {
                $result = $this->db->con->query("SELECT * FROM {$table} WHERE MaDienThoai={$item_id}");
            }

            $resultArray = array();
            while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }

    }
?>