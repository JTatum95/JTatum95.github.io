<?php

/**
 * Description of DBhandler
 * This class is used to access a database
 * @author sig
 */

require_once '../includes/configuration.php';

class DBhandler {

    public static function update_db_handler($sql) {
        // initialize DB link
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

        if (!$link)
            die('Could not connect to DB: ' . mysqli_error($link));
        else
        {
            $result = mysqli_query($link, $sql) or die("DATABASE ERROR: " . mysqli_errno($link) . " - " . mysqli_error($link) . "\n");
        }

        // close the DB connection
        mysqli_close($link);
    }

    public static function insert_db_handler($sql) {
        // initialize DB link
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

        if (!$link)
            die('Could not connect to DB: ' . mysqli_error($link));
        else
        {
            $result = mysqli_query($link, $sql) or die("DATABASE ERROR: " . mysqli_errno($link) . " - " . mysqli_error($link) . "\n");
        }

        $inserted_id = mysqli_insert_id($link);

        // close the DB connection
        mysqli_close($link);

        return $inserted_id;
    }

    public static function query_db_handler($sql) {
        // initialize DB link
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

        // initialize the return array
        $return_array;

        if (!$link)
            die('Could not connect to DB: ' . mysqli_error($link));
        else
        {
            $result = mysqli_query($link, $sql) or die("DATABASE ERROR: " . mysqli_errno($link) . " - " . mysqli_error($link) . "\n");

            while($row = mysqli_fetch_assoc($result))
                $return_array[] = $row;
        }

        // close the DB connection
        mysqli_close($link);

        // return the query result
        return $return_array;
    }

    public static function clean_input($input) {
        return addslashes($input);
    }

    public static function clean_input_array($input_array) {
        if (sizeof($input_array) > 0) {
            $cleaned_array = Array();
            foreach ($input_array as $key => $value) {
                if (is_array($value)) {
                    $cleaned_array[$key] = DBhandler::clean_input_array($value);
                }
                else {
                    $cleaned_array[$key] = DBhandler::clean_input($value);
                }
            }
            return $cleaned_array;
        }
        else {
            return false;
        }
    }

    public static function clean_output($output) {
        return stripslashes($output);
    }
}

?>
