<?php
include ("../components/connect.php");
if(isset($_COOKIE['tutor_id'])){
    $user_id = $_COOKIE['tutor_id'];
}else{
    $tutor_id = '';
    
}

if(isset($_POST['submit'])){
    $id = create_unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $profession = $_POST['profession'];
    $profession = filter_var($profession, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $c_pass = sha1($_POST['c_pass']);
    $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $ext = pathinfo($image,PATHINFO_EXTENSION );
    $rename = create_unique_id().'.'.$ext;

    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_folder = '../uploaded_files/'.$rename;

    $select_user_email = $conn->prepare("SELECT * FROM `users` WHERE email=?");
    $select_user_email->execute([$email]);

    if($select_user_email->rowCount() > 0){
        $message[] = 'email already taken';
    }else{
        if($pass != $c_pass){
            $message[] = 'password not matched';
        }else{
            if($image_size > 2000000){
                $massage[] = 'image size is too large !' ;
            }else{
                $insert_tutor = $conn->prepare("INSERT INTO `users` (id , name, profession , email , password , image) VALUES (?,?,?,?,?,?)");
                $insert_tutor->execute([$id , $name , $profession , $email , $c_pass , $rename]);
                move_uploaded_file($image_tmp_name,$image_folder);

                $verify_tutor = $conn->prepare("SELECT * FROM `users` WHERE email= ? AND password= ? LIMIT 1");
                $verify_tutor->execute([$email , $c_pass]);
                $row = $verify_tutor->fetch(PDO::FETCH_ASSOC);

                if($insert_tutor){
                    if($verify_tutor->rowCount() > 0){
                    setcookie('tutor_id' , $row['id'], time() + 60*60*24*30, '/');
                    header('location:dashboard.php');
                    }else{
                        $message[] = 'something went wrong!' ; 
                    }
                }
            }

            
        }
        
    }
    //$message[]= 'its working!';
}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.com/libraries/font-awesome">
    <!-- custom css file link-->
    <link rel="stylesheet" href="../css/admin_style.css">
   
    
    
    

</head>
<body style="padding-left: 0;">
<!-- register section starts-->
    <section class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>register now</h3>
            <div class="flex">
                <div>
                <p>your name <span>*</span></p>
                <input type="text" name="name" maxlength="50" required placeholder="enter your name" class="box">
                <p>your profession <span>*</span></p>
                <select name="profession" class="box">
                    <option value="" disabled selected>-- select your profession</option>
                    <option value="developer">developer</option>
                    <option value="student">student</option>
                    <option value="doctor">doctor</option>
                    <option value="teacher">teacher</option>
                    <option value="photographer">photographer</option>
                    <option value="journalist">journalist</option>
                </select>
                <p>your email <span>*</span></p>
                <input type="email" name="email" maxlength="50" required placeholder="enter your email" class="box">
                </div>
            </div>
                <div class="col">
                    <p>your password <span>*</span></p>
                    <input type="password" name="pass" maxlength="20" required placeholder="enter your password" class="box">
                    <p>confirm password <span>*</span></p>
                    <input type="password" name="c_pass" maxlength="20" required placeholder="confirm your password" class="box">
                    <p>select picture <span>*</span></p>
                    <input type="file" name="image" class="box" required accept="image/*">
                </div>
            
            <input type="submit" value="register now" name="submit" class="btn">
            <p class="link">already have an account ? <a href="login.php">login now</a></p>
            
        </form>
    </section>

        
    
    <!-- register section ends-->
    
    

    
<?php
    include ("../components/footer.php");
    
    ?>
</body>
</html>
    
</body>
</html>