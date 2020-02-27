<?php
function createUser($fname, $username, $password, $email){
    $pdo = Database::getInstance()->getConnection();

    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result = $create_user_set->execute(
        array(
            ':fname'=>$fname,
            ':username'=>$username,
            ':password'=>$password,
            ':email'=>$email,
        )
    );
    
    if($create_user_result){
        redirect_to('index.php');
    }else{
        return 'The user did not go through';
    }
}