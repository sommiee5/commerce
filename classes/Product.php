<?php
require_once "Db.php";
class Product extends Db {
    private $dbconn;
    public function __construct(){
     $this->dbconn = $this->connect();
    } 

    public function add_product($name, $description, $price, $cat_id ,$file){
            
                $temp = $file['tmp_name'];
                $type = $file['type'];
                $size = $file['size'];
                $allowed = ['png','jpg','jpeg'];
                $filename = $file['name'];
                
    
                $max_size_allowed = 2 * 1024 * 1024;
    
             if($size > $max_size_allowed){
                    $_SESSION['errormsg']= "Your file size is too large. The maximum is 2mb";
                    exit;
             }
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $newname = "comm".uniqid().".".$extension;
                $to = "../uploads/$newname";
                
                if(!in_array($extension,$allowed)){
                    $_SESSION['errormsg'] = "Please upload either of png, jpg,jpeg";
                    return 0;
                }else{
                    //insert query
                    move_uploaded_file($temp,$to);
                    $sql = "INSERT INTO products(products_name,products_price,products_description,products_image,products_categoryid) VALUES(?,?,?,?,?)";
                    $stmt = $this->dbcon->prepare($sql);
                    $stmt->execute([$name,$price,$description,$newname, $cat_id]);
                    $result = $this->dbcon->lastInsertId();
                    return $result;
                }
            
        }

        public function fetch_products(){
            $sql = "SELECT * FROM products LIMIT 4";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $result;
        }

        public function fetch_all_products() {
            $sql = "SELECT * FROM products";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result; 
        }

        // public function fetch_remaining_products() {
        //     $sql = "SELECT * FROM products WHERE products_id >=9 AND products_id NOT BETWEEN 14 AND 22"; // Fetch starting from ID 9
        //     $stmt = $this->dbconn->prepare($sql);
        //     $stmt->execute();
        //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
        // }
        
    
        public function fetch_product_by_id($products_id){
            $sql = "SELECT * FROM products JOIN category ON products.products_categoryid = category.cat_id WHERE products_id = ? ";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$products_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 
            return $result;
        }

        public function fetch_products_by_cat_id($id){// you're fetching products cat_id from category like men's fashion
            $sql = "SELECT * FROM products WHERE products_categoryid = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $result;
        }

        public function fetch_product_by_rel_cat($id){// fetching related products
            $sql = "SELECT * FROM products  WHERE products_categoryid = ? LIMIT 4";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $result;
        }

        // public function fetch_products_limit(){
        //     $sql = "SELECT * FROM products  LIMIT 8 OFFSET 4";
        //     $stmt = $this->dbconn->prepare($sql);
        //     $stmt->execute();
        //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        //     return $result;
        // }

        public function search_products($search) {
            $sql = "SELECT * FROM products WHERE products_name LIKE ? OR products_description LIKE ?";
            $stmt = $this->dbconn->prepare($sql);
            $searched = "%$search%";
            $stmt->execute([$searched, $searched]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $result;

        }

        // public function update_product_image($product_id, $new_image_name) {
        //     $sql = "UPDATE products SET products_image = ? WHERE products_id = ?";
        //     $stmt = $this->dbconn->prepare($sql);
        //     $stmt->execute([$new_image_name, $product_id]);
        // }
       
       
}
?>