<?php
    //default values
    $username = "admin";
    $password = password_hash("Password123", PASSWORD_DEFAULT);

    //formData na nanggaling sa ajax request, decode ito para magamit sa php
    $formData = json_decode($_POST['formData']);

    $response = array();

    if ($formData->username === $username && password_verify($formData->password, $password)) {
        $response['message'] = "Successfully Logged In";
        $response['status'] = 200;

        //json and bbigay kay js through json_encode
        echo json_encode($response);
    } else {
        $response['message'] = "Invalid Username or Password";
        $response['status'] = 401;

        echo json_encode($response);
    }
?>