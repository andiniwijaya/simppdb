<?php

function generateToken() {
    return bin2hex(random_bytes(32));
}


function hashPassword($password){
    return password_hash($password, PASSWORD_DEFAULT);
}

function verifyPassword($password, $hash){
    return password_verify($password, $hash);
}

