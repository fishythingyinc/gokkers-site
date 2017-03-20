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
}