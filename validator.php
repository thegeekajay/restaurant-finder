<?php

class Validator
{
    public function name($data)
    {
        if (!preg_match("/^[a-zA-Z]*$/",$data)) {
            $response['error'] = "only letters, no whitespace and special characters";
        }else{
            $response['success'] = true;
        }
        return $response;
    }

    public function email($data)
    {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            $response['error'] = "Invalid email format";
        }else{
            $response['success'] = true;
        }
        return $response;
    }

    public function phone($data)
    {

    }

    public function password($data)
    {

    }


}