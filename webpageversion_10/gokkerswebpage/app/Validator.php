<?php
/**
 * Created by PhpStorm.
 * User: D181761
 * Date: 20-3-2017
 * Time: 14:01
 */

namespace app;


class Validator
{

    // Input (Email)
    private $input;
    public function __construct()
    {
        ini_set('SMTP', 'smtp-fish.alwaysdata.net');
        //ini_set('SMTP', 'localhost');
        ini_set('smtp_port', '25');
    }

    public function Validate($input)
    {
        $this->input = $input;
        if (filter_var($this->input, FILTER_VALIDATE_EMAIL))
        {

            return true;
        }
        else
        {
            return false;
        }
    }

    public function Verify($activationKey)
    {
        if ($activationKey == md5("ActivationK3y"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function SendMail($username, $key, $email)
    {
        $to      = "$email";
        $subject = "Activation Email Fishy Thingy $key";
        $message = "Hello $username," . PHP_EOL . "Please activate your account with this key: $key or use " .
        '<a href="fish.alwaysdata.net/ActivateNow.php?message=' . $key . '&username='. $username .'">this link</a>';
        //$message = $key;
        $headers = 'From: fish@alwaysdata.net' . "\r\n" .
            'Reply-To: fish@alwaysdata.net' . "\r\n";
        mail($to, $subject, $message, $headers);
    }
}