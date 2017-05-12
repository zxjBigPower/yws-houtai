<?php

namespace App;


class ajaxModel
{
    public $status;
    public $message;

    public function tojson(){
        return json_encode($this,JSON_UNESCAPED_UNICODE);
    }
}
