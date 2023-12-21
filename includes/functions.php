<?php

// checking if the 2 password match
function passwordsMatch($password, $confPassword){
    $result = false;

    if ($password==$confPassword){
        $result = true;
    }

    return $result;
}

function validUsername($username){
    $result = false;

    //pattern that user has to do
    //this pattern does not care about the lenght of latters
    //any latter from a-z small, A-Z capital and numbers 0 to 9 are avialble
    //sql insejtion 
    if(preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }

    return $result;
}