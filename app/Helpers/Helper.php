<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/* Get current logged in user */
function userLogged(): ?\Illuminate\Contracts\Auth\Authenticatable
{
    return auth()->user();
}


/*--------------------------
 * STRING MANIPULATION
 * -------------------------
 */
// Create a excerpt of a text
function excerpt($text, $limit) {
    return Str::limit($text, $limit, ' (...)');
}


/*--------------------------
 * CALCULATIONS
 * -------------------------
 */
/* Multiply two numbers */
function multiplyTwoNumbers ($num1, $num2): float|int
{
    return $num1 * $num2;
}
//calculate percentage of total value and other value
function calculatePercentage($total,$per): float|int
{
    $amount = $per/100 * $total;
    return $amount;
}

// Percentage Calculations
function percentage($number,$total = 100)
{
    if($total > 0) {
        return round(($number / $total) * 100, 2);
    }
    return null;
}

//  Convert file size to human-readable
function humanFilesize($size, $decimals = 2){
    $units = array('B','KB','MB','GB','TB','PB','EB','ZB','YB');
    $step = 1024;
    $i = 0;
    while(($size/$step) > 0.9) {
        $size = $size / $step;
        $i++;
    }
    return round($size, $decimals).' '.$units[$i];
}




/*--------------------------
 * NUMBERS
 * -------------------------
 */
// Format currency to readable
function formatCurrency($number): string
{
    return number_format($number,2,'.',',');
}

// Create a function for converting the amount in words
function amountInWords(float $amount) {
    $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
    // Check if there is any number after decimal
    $amt_hundred = null;
    $count_length = strlen($num);
    $x = 0;
    $string = array();
    $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $x < $count_length ) {
        $get_divider = ($x == 2) ? 10 : 100;
        $amount = floor($num % $get_divider);
        $num = floor($num / $get_divider);
        $x += $get_divider == 10 ? 1 : 2;
        if ($amount) {
            $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
            $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
            $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.'
       '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. '
       '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
        }
        else $string[] = null;
    }
    $implode_to_Rupees = implode('', array_reverse($string));
    $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . "
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
    return ($implode_to_Rupees ? $implode_to_Rupees . '' : '') . $get_paise;
}

function countLengthOfNumber($number) {
    $length = 0;
    while ($number > 0) {
//        $number //= 10;
        $length += 1;
    }
    return $length;
}



/*--------------------------
 * MANIPULATE DATE AND TIME
 * -------------------------
 */
// Convert Mysql datetime to another format 10 September 2023 14:05:25
function mysqlFormatToDateTime ($date): ?string
{
    if(!is_null($date)) {
        return \Carbon\Carbon::parse($date)->format('d M Y H:i:s');
    }
    return null;
}

// Format date to Day, Month and Year
function dayMonthAndYearDate($date): string
{
    return Carbon::parse($date)->format('d M, Y');
}

// Format date to Month and Year
function monthAndYearDate($date): string
{
    return Carbon::parse($date)->format('M Y');
}

//Change date and time to human-readable
function humanDateTime($date): ?string
{
    if(!is_null($date)) {
        return date('d M, y : H:i:s ',strtotime($date));
    }
    return null;
}
function humanDateFilterable($date): ?string
{
    if(!is_null($date)) {
        return date('Y - m - d',strtotime($date));
    }
    return null;
}

// convert mysql datetime to gijgo package date 01/12/2023
function mysqlToGijgoDate($date)
{
    if(!is_null($date)) {
        return Carbon::parse($date)->format('m/d/Y');
    }
    return  null;
}

//convert date to mysql format for database insert
function dateToMysqlFormat($date): ?string
{
    if(!is_null($date)) {
        return \Carbon\Carbon::parse($date)->format('Y-m-d H:i:s');
    }
    return null;
}


/*--------------------------
 * DATE CALCULATION
 * -------------------------
 */
//  calculate number of days between two dates
function numberOfDays($date1,$date2): float
{
    $date1 = strtotime($date1);
    $date2 = strtotime($date2);
    $difference = $date2 - $date1;
    return round($difference/(60*60*24));
}

// Calculate the age of a record
function calculateAge ($date): DateInterval|bool|null
{
    if ($date != null){
        $dob = new DateTime($date);
        $today = new DateTime(date('Y-m-d'));
        return $today->diff($dob);
    }
    else {
        return null;
    }
}

//Get difference between two dates in human-readable
function dateDifference($start_date,$end_date): void
{
    $fromDate = new DateTime($start_date);
    $curDate = new DateTime($end_date);
    $months = $curDate->diff($fromDate);
    if($months->format('%y') > 0) {
        echo $months->format('%y years %m months');
    }
    else {
        echo $months->format('%m months');
    }
}

/* Convert time to human-readable and calculate */
function age($timestamp){
    //date_default_timezone_set("Asia/Kolkata");
    $time_ago        = strtotime($timestamp);
    $current_time    = time();
    $time_difference = $current_time - $time_ago;
    $seconds         = $time_difference;

    $minutes = round($seconds / 60); // value 60 is seconds
    $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
    $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
    $weeks   = round($seconds / 604800); // 7*24*60*60;
    $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
    $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

    if ($seconds <= 60){
        return "Just Now";
    } else if ($minutes <= 60){

        if ($minutes == 1){
            return "1 min ago";
        } else {
            return "$minutes mins ago";
        }

    } else if ($hours <= 24){

        if ($hours == 1){
            return "1 hr ago";

        } else {
            return "$hours hrs ago";
        }

    } else if ($days <= 7){

        if ($days == 1){
            return "yesterday";

        } else {
            return "$days days ago";
        }

    } else if ($weeks <= 4.3){

        if ($weeks == 1){
            return "a week ago";
        } else {
            return "$weeks weeks ago";
        }

    } else if ($months <= 12){

        if ($months == 1){
            return "a month ago";

        } else {
            return "$months months ago";
        }

    } else {

        if ($years == 1){
            return "one yr ago";

        } else {
            return "$years yrs ago";
        }
    }
}
