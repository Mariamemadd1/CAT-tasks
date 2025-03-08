<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
    $op = $_POST["op"];


function calculate($n1,$n2,$op):mixed{
    $result=0;
    switch ($op){
        case '+':
            $result=$n1+$n2;
            break;
        case '-':
            $result=$n1-$n2;
            break;
        case '*':
            $result=$n1*$n2;
            break;
        case '/':
            if($n2==0){
                echo "cannot divide by zero\n";
                exit;   
            }
            $result=$n1/$n2;
            break;
        default:
            echo "not valid operation";
    }
    return $result;}
}
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator</title>
    <style>
    .d1 {
        background-color: #D0C3BD;
        border-radius: 3px;
        margin: auto;
        margin-top: 100px;
        padding: 50px;
        height: 250px;
        width: 450px;
        align-items: center;
        text-align: center;
    }

    body {
        background-color: beige;

    }

    h1 {
        color: rgb(75, 62, 67);
    }

    form input {
        background-color: beige;
        border-radius: 10px;
        width: 90px;
        border: none;
        padding: 8px;
        margin: 4px;
    }

    form select {
        border-radius: 5px;
        padding: 5px;
        appearance: none;
        border: none;
        background-color: beige;
    }

    button {
        padding: 10px;
        border: none;
        border-radius: 3px;
        background-color: rgb(129, 111, 117);
        color: aliceblue;
        margin: 30px;
    }

    h3 {
        color: rgb(75, 62, 67);
    }
    </style>
</head>

<body>
    <div class="d1">
        <h1>Simple calculator</h1>
        <form method="post">

            <input type="number" name="n1" required placeholder="number 1">
            <select name="op" id="operator">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>

            <input type="number" name="n2" placeholder="number 2" required>
            <br>
            <button type="submit"> calculate </button>

        </form>
        <h3> result :
            <?echo calculate($n1,$n2,$op)?>
        </h3>
    </div>
</body>

</html>
