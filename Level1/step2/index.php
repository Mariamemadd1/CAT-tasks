<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=$_POST["Name"];
    $email=$_POST["Email"];
    $password=$_POST["Password"];
    $phone_number=$_POST["Phone"];
    
    $valid_email=preg_match('/^\w+@\w+\.\w{2,3}$/',$email);
    $valid_phonenumber=preg_match_all('/^\d+$/',$phone_number)&&(strlen($phone_number) == 11);
    $valid_password=preg_match('/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}/', $password);
    if($valid_email && $valid_phonenumber && $valid_password){
        $input=array("name"=>$name , "email"=>$email,"phone_number"=>$phone_number,"password"=>$password);
        $datauser=json_decode(file_get_contents( 'data.json'),true);
        $datauser[]=$input;
        file_put_contents('data.json',json_encode($datauser),JSON_PRETTY_PRINT);
    }
}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data Validator</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');

    body {
        font-family: Bitter;
        background-color:white ;
        color: #2C3930;
    }
    .container{
background-color: #DCD7C9;
width: 600px;
height: 600px;
margin: auto;
text-align: center;

justify-content: center;
align-items: center;
border-radius: 6px;
padding: 30px;
}
input{
    background-color:#c4bab2 ;
    width:200px;
    display: block;
    border: none;
    border-radius: 3px;
    margin: auto;
    margin-bottom: 20px;
    padding: 20px;
}
button{
    width: 100px;
   background-color: #2C3930;
   color: #DCD7C9;
    padding: 20px;
    border: none;
    border-radius: 5px;
    margin: 40px;
}
h1{
    margin-top: 120px;
}

  </style>
</head>

<body>
    <div class="container">
        <h1>Fill form</h1>
        <form method="post">
            <input type="text" name="Name" required placeholder="Name">
            <input type="text" name="Email" required placeholder="Email">
            <input type="text" name="Phone" required placeholder="Phone">
            <input type="text" name="Password" required placeholder="Password">

            <button type="submit"> Submit </button>
        </form>
    </div>
</body>

</html>
