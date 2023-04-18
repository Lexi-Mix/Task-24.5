<?php

use LDAP\Result;
class Model
{
    public $data;
    public function __construct(){
        $json = file_get_contents('application/db/db.json');
        $this->data = json_decode($json,true);
    }
}
?>