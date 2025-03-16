<?php
include 'helpers.php'; 
function add(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["Name"] ?? '';
        $email = $_POST["email"] ?? '';
        $phone_number = $_POST["Phone"] ?? '';
    
        if (valid($email, $phone_number)) { 
            $datauser = json_decode(file_get_contents('contacts.json'), true) ?? []; 
    
            $tmp = ["name" => $name, "email" => $email, "phone_number" => $phone_number];
            $datauser[] = $tmp;
    
            file_put_contents('contacts.json', json_encode($datauser, JSON_PRETTY_PRINT));
            echo "Your data was saved successfully ❤️.";
        } else {
            echo "Please enter valid data..";
        }
}
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Add Contact </title>
    <style>
    .container {
        width: 400px;
        height: 300px;
        border: none;
        border-radius: 3px;
        background-color: #E4C59E;
        margin: auto;
        margin-top: 100px;
        padding: 20px;
        text-align: center;
    }

    input {
        display: block;
        border: none;
        padding: 14px;
        border-radius: 3px;
        width: 200px;
        margin: 10px auto;
    }

    button {
        padding: 10px;
        border: none;
        border-radius: 3px;
        background-color: #322C2B;
        color: aliceblue;
        margin: 10px;
        width: 230px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Add a new contact</h2>
        <form method="post">
            <input type="text" name="Name" placeholder="Name">
            <input type="text" name="Phone" placeholder="Phone number">
            <input type="text" name="email" placeholder="Email">
            <button type="submit">Save</button>
        </form>
        <?php add()?>
    </div>
</body>

</html>