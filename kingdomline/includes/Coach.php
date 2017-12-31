<?php


class Coach {

    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $phone;
    public $validated;

    public static function ValidatedList() {
        // prepare sql
        $sql = 'SELECT phone
                FROM coaches
                WHERE validated = 1';
        // run query
        $result = DBhandler::query_db_handler($sql);
        if (sizeof($result > 0))
            return $result;
    }

    public static function ListAll() {
        // prepare sql
        $sql = 'SELECT id, first_name, last_name, email, password, phone, validated
                FROM coaches
                ORDER BY validated, last_name';
        // run query
        $result = DBhandler::query_db_handler($sql);
        if (sizeof($result > 0))
            return $result;
    }

    public function Coach ($id = null) {
        if (!is_null($id)) {
            // clean input
            $this->id = DBhandler::clean_input($id);

            // prepare sql
            $sql = sprintf("SELECT first_name, last_name, email, password, phone, validated
                            FROM coaches
                            WHERE id = %u", $this->id);

            // run sql
            $result = DBhandler::query_db_handler($sql);
            if (sizeof($result) > 0) {
                $this->first_name = $result[0]['first_name'];
                $this->last_name = $result[0]['last_name'];
                $this->email = $result[0]['email'];
                $this->password = $result[0]['password'];
                $this->phone = $result[0]['phone'];
                $this->validated = $result[0]['validated'];
            }
        }
    }

    public function Create ($first_name, $last_name, $email, $phone, $password) {
        // clean user input
        $this->first_name = DBhandler::clean_input($first_name);
        $this->last_name = DBhandler::clean_input($last_name);
        $this->email = DBhandler::clean_input($email);
        $this->phone = DBhandler::clean_input($phone);
        $this->password = DBhandler::clean_input($password);

        // prepare sql
        $sql = sprintf("INSERT INTO coaches (`first_name`, `last_name`, `email`, `password`, `phone`)
                        VALUES ('%s', '%s', '%s', '%s', '%s')", $this->first_name, $this->last_name, $this->email, $this->password, $this->phone);

        // run sql
        $result = DBhandler::insert_db_handler($sql);
        if (is_int($result)) {
            $this->id = $result;
        }
        else
            return false;
    }

    public function Invalidate () {
        // prepare sql
        $sql = sprintf("UPDATE coaches
                    SET validated = 0
                    WHERE id = %u", $this->id);

        // run sql
        $result = DBhandler::update_db_handler($sql);
    }

    public function Validate () {
        // prepare sql
        $sql = sprintf("UPDATE coaches
                    SET validated = 1
                    WHERE id = %u", $this->id);

        // run sql
        $result = DBhandler::update_db_handler($sql);
    }
} 