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
                $to = "../../uploads/$newname";
                
                if(!in_array($extension,$allowed)){
                    $_SESSION['errormsg'] = "Please upload either of png, jpg,jpeg";
                    return 0;
                }else{
                    //insert query
                    move_uploaded_file($temp,$to);
                    $sql = "INSERT INTO products(products_name,products_price,products_description,products_image,products_categoryid) VALUES(?,?,?,?,?)";
                    $stmt = $this->dbconn->prepare($sql);
                    $stmt->execute([$name,$price,$description,$newname, $cat_id]);
                    $result = $this->dbconn->lastInsertId();
                    return $result;
                }
            
        }

        public function fetch_products(){
            $sql = "SELECT * FROM products JOIN category ON products.products_categoryid = category.cat_id";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $result;
        }

        public function update_product($name, $description, $price, $cat_id ,$file,$product_id){
         if($file['name'] != ''){
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
            $to = "../../uploads/$newname";
            
            if(!in_array($extension,$allowed)){
                $_SESSION['errormsg'] = "Please upload either of png, jpg,jpeg";
                return 0;
            }else{
                //insert query
                move_uploaded_file($temp,$to);
                $sql = "UPDATE products SET products_name= ?,products_price= ?,products_description= ?,products_image = ?,products_categoryid= ? WHERE products_id=?";
                $stmt = $this->dbconn->prepare($sql);
                $result=$stmt->execute([$name,$price,$description,$newname, $cat_id, $product_id]);
                return $result;
            }
         }else{
            $sql = "UPDATE products SET products_name=?,products_price=?,products_description=?,products_categoryid=? WHERE products_id=?";
                $stmt = $this->dbconn->prepare($sql);
                $result=$stmt->execute([$name,$price,$description,$cat_id, $product_id]);
                return $result;
         }   
            
        
    }

    public function delete_product($id){
        $sql = "DELETE FROM products WHERE products_id =?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$id]);
        return 1;
    }

     public function fetch_product_by_id($products_id){
            $sql = "SELECT * FROM products JOIN category ON products.products_categoryid = category.cat_id WHERE products_id = ? ";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$products_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 
            return $result;
        }

    
}

// $pro= new Product;
// $res = $pro->update_product('jacket', 'fdghhjk', 120, 1 ,'',1);
// echo $res;
?>