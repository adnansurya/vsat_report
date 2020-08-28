<?php
    include 'access/db_access.php';
    include 'partials/global.php';
    include 'secret.php';
   

    $getter = file_get_contents("php://input");

    $update = json_decode($getter, TRUE);

    $chat_id = $update["message"]["chat"]["id"];
   
    $message = $update["message"]["text"];
    $username = $update["message"]["from"]["username"];
    $user_id = $update["message"]["from"]["id"];
    $first_name = $update["message"]["from"]["first_name"];
    $last_name = $update["message"]["from"]["last_name"];
    
   

    function getComm($msg, $commString){
        
        $pos = strpos($msg, $commString);
        echo $pos;
        if($pos !== false){
            if($pos === 0){
                return true;
            }else{
                return FALSE;
            }
        }else{
            return $pos;
        }      
          
    }

    $pesan = '';
        

    $sql = "";
    $status = "";
    $nomor = 0;

    if(getComm($message, '/link')){            
        if($chat_id !== $user_id){
            
            $pesan = 'Link akun telegram hanya bisa dilakukan melalui personal chat';                   
        }else{
            $user_text = substr($message, 6);
            $user_data = explode(" ", $user_text);
            $useremail = $user_data[0];
            $userpass = $user_data[1];
           
            
            if($useremail == '' || $userpass == ''){
                $pesan = 'Data user tidak valid!'.PHP_EOL . 'Format link akun :'.PHP_EOL .'/link EMAIL PASSWORD'.PHP_EOL .'(dipisahkan dengan spasi)';
            }else{
                $check_user = mysqli_query($conn,"SELECT * FROM user WHERE email='".$useremail."' AND pass='".$userpass."'");
                if (mysqli_num_rows($check_user) == 1) {                                                                               
                    $sql = "UPDATE user SET telegram_id='".$user_id."' WHERE email='".$useremail."' AND pass='".$userpass."'";
                    if (!mysqli_query($conn,$sql)){            
                        $pesan = 'Terjadi Kesalahan penulisan database!';
        
                    }else{
                       
                        $pesan = 'Akun telegram berhasil terhubung!';
                    }
                }else{                    
                    $pesan = 'Verifikasi user gagal';
                }
            }
            
            
        }
        
        
    }
  
    sendMessage($chat_id, $pesan, $token);
  

?>