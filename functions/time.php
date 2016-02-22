<?php
/**
 * @author Fil Joseph Elman
 * @contact filjoseph22@gmail.com
 * @date 02-21-2016
 * @date 02-21-2016
 * @version 1.0.0
 *
 * This file contains functions to manipulate the time
 */

/**
* Convert date into leteral date in English
* @param string $string, The given date
* @return $string, A converted date.
*/
if (! function_exists('convert_date')) {
  function convert_date ($string) {
    $default = $string;
    $string  = explode('/', $string);
    if (check_clock_time($string[0]) == true) {
      return $string[0];
    } else {
      $month = get_english_month($string[0]);
      if (isset($month)) {
        $day  = $string[1];
        $year = explode(' ', $string[2]);
        return "$month $day, {$year[0]}";
      } else {
        return $default;
      }
    }
  }
}

/**
* Return the English equivalent of month
* @param string $string, The month number
* @return $string, An English Name for month
*/
if (! function_exists('get_english_month')) {
  function get_english_month ($string) {
    if (check_space($string) == false and check_clock_time($string) == false) {
      switch ($string) {
        case 1:
        return "Jan";
        break;
        case 2:
        return "Feb";
        break;
        case 3:
        return "Mar";
        break;
        case 4:
        return "Apr";
        break;
        case 5:
        return "May";
        break;
        case 6:
        return "Jun";
        break;
        case 7:
        return "Jul";
        break;
        case 8:
        return "Aug";
        break;
        case 9:
        return "Sep";
        break;
        case 10:
        return "Oct";
        break;
        case 11:
        return "Nov";
        break;
        case 12:
        return "Dec";
        break;
      }
    }
  }
}

/**
* Get the clock time
* @param string $value
* @return $value, The clock time value
*/
if (! function_exists('get_clock_time')) {
  function get_clock_time ($value) {
    if (check_space($value) == false and check_clock_time($value) == false) {

    }
  }
}

/**
* Look for the presence of space in the given value
* @param string $value
* @return boolean
*/
if (! function_exists('check_space')) {
  function check_space ($value) {
    if (strpos($value, ' ') !== false) {
      return true;
    } else {
      return false;
    }
  }
}

/**
* Look for the presence of colon(:) in the given value
* @param string $value
* @return boolean
*/
if (! function_exists('check_clock_time')) {
  function check_clock_time ($value) {
    if (strpos($value, ':') !== false) {
      return true;
    } else {
      return false;
    }
  }
}
?>
