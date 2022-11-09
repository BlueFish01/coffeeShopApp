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


       
    }
    

?>