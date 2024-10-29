<?php
    require_once "Db.php";

    class Payment extends Db
    {
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();
        }
        public function get_product_amt($productid){
            $amt = 0;
            $sql = "SELECT products_price FROM products WHERE products_id =?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$productid]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if($data){
                $amt = $data['products_price'];
            }
            return $amt;
        }

        public function insert_order($orderitems, $userid, $ref){
            // we will first insert into order table because we need to insert the order id into order details table
            $query_order = "INSERT INTO orders(customer_id,reference) VALUES(?,?)";
            $stmt = $this->dbconn->prepare($query_order);
            $stmt->execute([$userid,$ref]);
            $orderid = $this->dbconn->lastInsertId();
            // With the orderid, we will loop through the orderitems and insert them one by one into order_details table
            $totamt = 0;
            foreach($orderitems as $id=>$qty){//id is the resort id passed from session
                $resort_amt = $this->get_product_amt($id);
                $query_details = "INSERT INTO order_details(order_id, product_id,qty, amount) VALUES(?,?,?,?)";
                $stmt = $this->dbconn->prepare($query_details);
                $stmt->execute([$orderid,$id,$qty,$resort_amt]);
                $totamt = $totamt + ($resort_amt * $qty);
            }
            // update orders table with total amount
            $query_update = "UPDATE orders SET order_total_amount=? WHERE order_id=?";
            $stmt3 = $this->dbconn->prepare($query_update);
            $stmt3->execute([$totamt, $orderid]);
            return $orderid;
        }
        public function get_order($ref){
            $sql = "SELECT * FROM orders  JOIN user ON orders.customer_id = user.user_id WHERE reference=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$ref]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        public function get_orderby_ref($ref){
            $sql = "SELECT * FROM orders JOIN order_details ON orders.order_id = order_details.order_id JOIN products ON order_details.product_id = products.products_id WHERE reference=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$ref]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        public function paystack_verify($ref){
            $url = "https://api.paystack.co/transaction/verify/$ref";
            $headers = ['Content-Type: application/json','Authorization: Bearer sk_test_f4d46ea89d8625af4bb8e953351f148eef9096fc'];

            // step 1: initialize curl
            $curlobj = curl_init($url);
            // step2: set curl options using the function curl_setopt()
            curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlobj, CURLOPT_HTTPHEADER,$headers);
            curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);
            // step 3
            $apiResponse = curl_exec($curlobj);
            if($apiResponse){
                curl_close($curlobj); //step 4
                return json_decode($apiResponse); //step 5: do anything
            }else{
                $r = curl_error($curlobj);
                // echo $r;
                return false;
            }

        }

        public function paystack_initialize($email,$amount,$reference){
            // this is the method we will call to generate paystack payment for us
            $postReuest = ['email' => $email, 'amount' => $amount*100, "reference"=>$reference, "callback_url"=> "http://localhost/FinalProject/paydirect.php"]; //we will create paydirect.php
            $url = "https://api.paystack.co/transaction/initialize";

            $headers = ['Content-Type: application/json','Authorization: Bearer sk_test_f4d46ea89d8625af4bb8e953351f148eef9096fc'];

            // step 1: initialize curl
            $curlobj = curl_init($url);
            // step2: set curl options using the function curl_setopt()
            curl_setopt($curlobj, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($curlobj, CURLOPT_POSTFIELDS, json_encode($postReuest));
            // 
            curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlobj, CURLOPT_HTTPHEADER,$headers);
            // 
            curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);
            // step 3: execute the curl session using curl_exec()
            $apiResponse = curl_exec($curlobj);
            if($apiResponse){
                curl_close($curlobj); //step 4
                return json_decode($apiResponse); //step 5: do anything
            }else{
                $r = curl_error($curlobj);
                // echo $r;
                return false;
            }


        }

        public function update_database($amount_paid, $transaction_status, $message_from_paygate,$reference){
            $sql = "UPDATE orders SET debited_amount =?, order_status=?, paygate_response=? WHERE reference=?";
            $stmt= $this->dbconn->prepare($sql);
            $stmt->execute([$amount_paid, $transaction_status, $message_from_paygate,$reference]);
            unset($_SESSION['cartitems']);
            return true;
        }


    }
?>