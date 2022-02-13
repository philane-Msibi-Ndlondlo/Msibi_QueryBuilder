<?php

class User extends SQLBuilder {

    private $tablename = 'users';

    public function __construct() {
        parent::__construct($this->tablename);
    }
}
