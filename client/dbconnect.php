<?php

    include_once('./config/database_connect.php');

    class db{

        function __construct()
        {   
            $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME,port);
            $this->dbcon = $conn;
            if(mysqli_connect_errno()){
                echo "Fail to connect with MySQL ".mysqli_connect_error();
            }
            // else{echo "Connected to MySQL";} //checking if it's connected.

        }

        public function check_user_avalible($uname){
        
            $checkuser = mysqli_query($this->dbcon, "SELECT USER_NAME FROM user WHERE USER_NAME = '$uname'");
            return $checkuser;
            
        }

        public function registration($email,$fname,$uname,$passwd){   
            
            $q = mysqli_query($this->dbcon,"INSERT INTO user(USER_NAME,USER_FNAME,USER_PASS,USER_EMAIL) VALUE('$uname','$fname','$passwd','$email')");
            return $q;
    
        }

        public function login($uname,$passwd){
            
            $q = mysqli_query($this->dbcon,"SELECT USER_ID, USER_NAME, USER_FNAME, USER_EMAIL FROM user WHERE USER_NAME = '$uname' AND USER_PASS = '$passwd'");
            return $q;
        }
        
        public function getMenu($category){
            $q = mysqli_query($this->dbcon,"SELECT * FROM menu");
            $num = mysqli_num_rows($q);
            if($num>0){
                while($data=mysqli_fetch_assoc($q)){
                    if($data['category']==$category){
                        
                        echo '  <div class="row_container">
                                    <a href="/customDrink?id='.$data["ID"].'&name='.$data["Name"].'&img_dir='.$data["img_dir"].'&price='.$data["Price"].'&description='.$data["Description"].'">
                                        <div class="row">
                                            <img src="image/'.$data["img_dir"].'" alt="">
                                            <h2> 
                                                '.$data["Name"].'<br>
                                                <span>'.$data["Description"].'</span>
                                            </h2>
                                            <h1>฿'.$data["Price"].'</h1>
                                        </div>
                                    </a>
                                </div> ';
                    }
                }
            }
            return;
        }

        public function createOrder($customerID,$amount){
            $q = mysqli_query($this->dbcon,"INSERT INTO drinkOrder (customerID,amount) VALUES('$customerID','$amount')");
            $orderID = mysqli_insert_id($this->dbcon);
            return $orderID;
        }

        public function createDrinkList($orderID,$menuID,$drinkOption,$size,$sugar,$qty,$comment,$price){
            $q = mysqli_query($this->dbcon,"INSERT INTO drinkList(orderID, menuID, drinkOption, size, sugar, qty, comment, price) VALUES ('$orderID','$menuID','$drinkOption','$size','$sugar','$qty','$comment','$price')");
            if(!$q){
                
                printf("Errormessage: %s\n", $this->dbcon->error);
                 
            }
            return $q;
        }

        public function getOrdersHistory($customerID){
            $q = mysqli_query($this->dbcon, "SELECT orderID,amount,DATE_FORMAT(date,'%Y-%b-%d %H:%i') AS fdate FROM drinkOrder WHERE customerID=$customerID ORDER BY orderID DESC LIMIT 10");
            $num = mysqli_num_rows($q);
            if($num>0){
                while($data=mysqli_fetch_assoc($q)){
                    echo '  <div class="order_card">
                                <span class="vertical-line"></span>
                                <h2 style="width: 70%;">Order id : '.$data['orderID'].'<br><br>Date : '.$data['fdate'].'</h2>
                                <h1 style="width: 30%; text-align:end; padding-right:15px">฿ '.$data['amount'].'</h1>
                            </div>';
                }
            }
            return;
        }


       
    }
    

?>