<?php

namespace App;


class ajaxModel
{
    public $status;
    public $msg;

    public function tojson(){
        return json_encode($this,JSON_UNESCAPED_UNICODE);
    }
}
