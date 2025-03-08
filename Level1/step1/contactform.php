<?php  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST["Name"];
    $gmail = $_POST["gmail"];
    $msg = $_POST["msg"];
define('messages' ,'messages.txt');
function display($Name, $gmail,$msg){
    $userData = "$Name,$gmail,$msg\n";
        file_put_contents(messages, $userData, FILE_APPEND);
        echo "Your message sent successfully 🥰";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Contact me</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');

    body {
        font-family: Bitter;
    }

    .container {
        width: 500px;
        height: 600px;
        background-color: #f3bc77;
        margin: auto;
        margin-top: 30px;
        text-align: center;
        padding: 10px;
        border-radius: 40px;
    }

    h1 {
        margin-top: 70px;
        margin-bottom: 70px;
        color: #1d1716;
    }

    label,
    p {
        font-weight: bold;
        color: #1d1716;
    }

    input {
        border-radius: 3px;
        border: none;
        padding: 6px;
        margin: 5px;
        width: 160px;
    }

    #msg {
        height: 160px;
        width: 250px;
        border: none;
        padding: 20px;
        border-radius: 6px;
    }

    .leave {
        margin-top: 30px;
    }

    #sb {
        padding: 10px;
        border: none;
        width: 280px;
        margin: 20px;
        border-radius: 6px;
        background-color: #1d1716;
        ;
        color: rgb(239, 239, 227);
        cursor: pointer;
    }

    #icon {
        font-size: 16px;
    }

    h4 {
        color: #1d1716;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1> Contact me </h1>
        <form method="post">
            <label for=""> Name</label>
            <input type="text" name="Name" required>
            <label for="gmail"> Email</label>
            <input type="email" name="gmail" required>
            <br>
            <p class="leave">Leave a message </p>
            <textarea name="msg" id="msg" required></textarea>
            <br>
            <button id="sb" type="submit"> <i class='bx bx-send' id="icon"> Send message </i> </button>
        </form>
        <h4>
            <? display($Name,$gmail,$msg)?>
        </h4>
    </div>
</body>

</html>
