<?php



class functions extends Connection {
    public function loginCheck($email,$pass){
        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email,$pass]);
        $row = $stmt->rowCount();
        $result = $stmt->fetch();
        
        if($row > 0){
               $_SESSION['user_id']=$result['id'];
               header('location:./home.php');
            }else{
               $message[] = 'Incorrect username or password!';
            }
    
    }


    public function adminLogin($name,$pass){
        $sql = "SELECT * FROM admins WHERE name = ? AND password = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name,$pass]);
        $row = $stmt->rowCount();
        $result = $stmt->fetch();
        
        if($row > 0){
               $_SESSION['admin_id']=$result['id'];
               header('location:dashboard.php');
            }else{
               $message[] = 'Incorrect username or password!';
            }
    
    }

    public function registerAdmin($name,$pass,$cpass){
      $sql = "SELECT * FROM admins WHERE name = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name]);
      $row = $stmt->rowCount();
      
      if($row > 0){
         $message[] = 'Username already exist!';
      }else{
         if($pass != $cpass){
            $message[] = 'Confirm password not matched!';
         }
      }
    }


    public function Contact($name,$email,$number,$msg){

   $select_message = $this->connect()->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'already sent message!';

    }
   }
    

   
}
?>
