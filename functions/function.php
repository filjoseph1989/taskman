<?php
/**
 * @author Fil Joseph Elman
 * @contact filjoseph22@gmail.com
 * @date 02-20-2016
 * @date 02-21-2016
 * @version 1.0.0
 *
 * This file contains functions to this framework perform faster.
 */

 /**
 * Generate id use for toggle effect of the table row
 * @param string $task, Name of the task.
 * @return $task, A modified task.
 */
if (! function_exists('task_toggle_id')) {
  function task_toggle_id($task) {
    $task = replace_space($task);
    if (isset($task_id[0])) {
      return $task_id[0];
    }
  }
}

 /**
 * Make sub task an indentation base from the parent task.
 * @param string $task, Name of the task.
 * @return $task, A modified task.
 */
if (! function_exists('task_indent')) {
  function task_indent($task) {
    $task = replace_space($task);
    $task = str_replace('&', "&emsp;", $task);
    $task = str_replace('*', "<i class=\"fa fa-angle-right\"></i>&nbsp;", $task);
    return $task;
  }
}

 /**
 * Replace space with & and *
 */
if (! function_exists('replace_space')) {
  function replace_space($task) {
    $i = 0;
    while ($task[$i] == ' ') {
      $task[$i] = "&";
      $i++;
    }
    $i -= 1;
    if ( $i != -1) {
      $task[$i] = "*";
    }
    return $task;
  }
}

/**
* Checker function
* @param string $string
* @return
*/
if (! function_exists('checker')) {
  function checker ($string) {
    if (isset($string)) {
      return $string;
    }
  }
}
?>
