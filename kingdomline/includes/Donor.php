<?php

class Donor {

    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $password;
    public $cc_num;
    public $cc_month;
    public $cc_year;
    public $cc_cvv;
    public $billing_address;
    public $billing_address2;
    public $billing_city;
    public $billing_state;
    public $billing_zip;
    public $monthly_budget;

    public static function ListAll() {
        // prepare sql
        $sql = 'SELECT first_name, last_name, email, phone, SUBSTRING(cc_num, -4) AS last_four, monthly_budget
                FROM donors
                ORDER BY last_name';

        // run sql
        $result = DBhandler::query_db_handler($sql);

        if (sizeof($result) > 0) {
            return $result;
        }
        else {
            return false;
        }
    }

    public function Donor ($id = null) {

    }

    public function Create ($first_name, $last_name, $email, $phone, $password, $cc_num, $cc_month, $cc_year, $cc_cvv,
                            $billing_address, $billing_address2 = '', $billing_city, $billing_state, $billing_zip, $monthly_budget) {
        // clean user input
        $this->first_name = DBhandler::clean_input($first_name);
        $this->last_name = DBhandler::clean_input($last_name);
        $this->email = DBhandler::clean_input($email);
        $this->phone = DBhandler::clean_input($phone);
        $this->password = DBhandler::clean_input($password);
        $this->cc_num = DBhandler::clean_input($cc_num);
        $this->cc_month = DBhandler::clean_input($cc_month);
        $this->cc_year = DBhandler::clean_input($cc_year);
        $this->cc_cvv = DBhandler::clean_input($cc_cvv);
        $this->billing_address = DBhandler::clean_input($billing_address);
        $this->billing_address2 = DBhandler::clean_input($billing_address2);
        $this->billing_city = DBhandler::clean_input($billing_city);
        $this->billing_state = DBhandler::clean_input($billing_state);
        $this->billing_zip  = DBhandler::clean_input($billing_zip);
        $this->monthly_budget = DBhandler::clean_input($monthly_budget);

        // prepare sql
        $sql = sprintf("INSERT INTO donors (`first_name`, `last_name`, `email`, `phone`, `password`, `cc_num`, `cc_month`, `cc_year`, `cc_cvv`, `billing_address`, `billing_address2`, `billing_city`, `billing_state`, `billing_zip`, `monthly_budget`)
                        VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', %u)",  $this->first_name,
                                                                                                                        $this->last_name,
                                                                                                                        $this->email,
                                                                                                                        $this->phone,
                                                                                                                        $this->password,
                                                                                                                        $this->cc_num,
                                                                                                                        $this->cc_month,
                                                                                                                        $this->cc_year,
                                                                                                                        $this->cc_cvv,
                                                                                                                        $this->billing_address,
                                                                                                                        $this->billing_address2,
                                                                                                                        $this->billing_city,
                                                                                                                        $this->billing_state,
                                                                                                                        $this->billing_zip,
                                                                                                                        $this->monthly_budget);

        // run sql
        $result = DBhandler::insert_db_handler($sql);
        if (is_int($result)) {
            $this->id = $result;
        }
        else
            return false;
    }
}
