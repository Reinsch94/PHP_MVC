<?php

require("../Config/db.php");

class Model
{
    protected $bdd;

    public function __construct()
    {
        $this->bdd = Database::getbdd();
    }
}

?>