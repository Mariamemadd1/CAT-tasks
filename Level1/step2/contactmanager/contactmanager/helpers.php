<?php 
function valid($email,$phone){
    return (preg_match('/^\w+@\w+\.\w{2,3}$/',$email))&&
    ((preg_match('/^\d+$/',$phone))&&(strlen($phone)==11));
}

?>