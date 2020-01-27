<?php

function login($username, $password){
    //debug

    $message = sprintf('You are trying to login with username %s and password %s', $username, $password);

    return $message;
}
