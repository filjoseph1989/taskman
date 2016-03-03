<?php
/**
 * @author Fil Joseph Elman
 * @contact filjoseph22@gmail.com
 * @date 02-20-2016
 * @date 03-02-2016
 * @version 1.0.0
 *
 * This file contains functions to this framework perform faster.
 */

 /**
  * This function will determine the relationship of each row
  * This function is EXPEREMENTAL
  *
  * @param string $task, Name of the task.
  * @return $task, A modified task.
  */
if (! function_exists('row_relation')) {
  function row_relation($new_class, $old_class, $old_pos) {
    $new_class = replace_space($new_class);
    $new_pos   = strpos($new_class, '*');
    if ($new_pos > $old_pos) {
      $relation = "child-".$old_class;
      return $relation;
    }
  }
}

 /**
  * Generate class use for toggle effect of the table row
  * @param string $task, Name of the task.
  * @return $task, A modified task.
  */
if (! function_exists('task_toggle_class')) {
  function task_toggle_class($task) {
    $task = replace_space($task);
    $pos  = strpos($task, '*');
    $task = str_replace('&', '', $task);
    $task = str_replace('*', '', $task);
    $task = str_replace(' ', '-', $task);
    $task = strtolower($task);
    $task_array = array(
      'class' => $task,
      'pos'   => $pos
    );
    return $task_array;
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
