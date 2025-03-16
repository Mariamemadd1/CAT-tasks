<?php 
function srch(){
    if($_SERVER['REQUEST_METHOD']=='GET'&& isset($_GET['Name'])){
        $query=$_GET['Name'];
        $contacts = json_decode(file_get_contents('contacts.json'), true) ?? [];
        $results=[];
        foreach($contacts as $contact){
            if(preg_match("/$query/i",$contact['name'])){
                $results[]=$contact;
            }
        }
        
        if(!empty($results)){
            foreach($results as $result){
            echo "<p> Name : {$result['name']} </p>"."<p> phone : {$result['phone_number']} </p>"."<p> email : {$result['email']} </p>";
        }
        }
        else{
            echo "<p> $query Not found.</p>";
        }
        }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style>
    .container {
        width: 400px;
        height: 450px;
        border: none;
        border-radius: 3px;
        background-color: rgb(179, 156, 129);
        margin: auto;
        margin-top: 80px;
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
        width: 200px;
    }

    h2 {
        margin-top: 70px;
        margin-bottom: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Search for Name</h2>
        <form method="get">
            <input type="text" name="Name" placeholder="Name">
            <button type="submit">Search</button>
        </form>
        <?php srch() ?>
    </div>

</body>

</html>