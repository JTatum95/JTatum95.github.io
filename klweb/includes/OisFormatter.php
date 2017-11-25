<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sicabrera
 * Date: 10/4/13
 * Time: 3:54 PM
 * To change this template use File | Settings | File Templates.
 */

class OisFormatter {

    /**
     * @param $datetime MySQL format ie: 2013-10-15 12:15:00
     * @returns user friendly date ie: 10/15/2013
     */
    public static function DateTimeToDate($datetime) {
        $temp = strtotime($datetime);
        // substr($datetime, 0, 10);
        return date("m/d/Y", $temp);
    }

    public static function DateToDateTime($date) {
        return $date . ' 00:00:00';
    }

    public static function MySQLDate($str) {
        return date("Y-m-d", strtotime($str));
    }

    public static function MySQLDateTime($str) {
        return date("Y-m-d H:i:s", strtotime($str));
    }

    public static function PhoneNumber($phone) {
        $special_chars = array('-', ' ', '(', ')');
        $phone = str_replace($special_chars, '', $phone);

        return substr($phone, 0, 3)."-".substr($phone, 3, 3)."-".substr($phone,6);
    }

    public static function StringNormalize($string) {
        return mb_convert_case($string, MB_CASE_TITLE, mb_detect_encoding($string));
    }

    public static function Currency($string) {
        return '$' . number_format($string, 2);
    }

    public static function RemainingDays($datetime) {
        $compare = new DateTime($datetime);
        $now = new DateTime();
        $interval = $now->diff($compare);
        if ($interval->days > 0)
            return $interval->format('%R%a days');
        else
            return 'ELAPSED';
    }

    public static function Status($int) {
        if ($int == 1) {
            return '<img src="images/checkbox-unchecked.png" />';
        }
        elseif ($int == 2) {
            return '<img src="images/checkmark.png" />';
        }
    }

    public static function TimestampToDateTime($ts) {
        $dt = new DateTime($ts, new DateTimeZone('UTC'));
        $tz = new DateTimeZone('America/New_York');
        $dt->setTimezone($tz);
        return $dt->format('m/d h:i a');
    }

    public static function NumberToWords($number) {

        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            1000000             => 'million',
            1000000000          => 'billion',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . OisFormatter::NumberToWords(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . OisFormatter::NumberToWords($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = OisFormatter::NumberToWords($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= OisFormatter::NumberToWords($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }
}