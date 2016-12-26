<?php
// Database configuration file  
include("common_functions.php");

function tep_draw_pull_down_menu($name, $values, $default = '1', $parameters = '', $required = false) {

    $field = '<select name="' . $name . '"';

    if ($parameters!='') $field .= ' ' . $parameters;

    $field .= ' >';

	$field .='<option value=0></option>';
    for ($i=0, $j=0,$n=sizeof($values); $i<$n; $i++) {
      $field .= '<option value="' . $values[$i]['id'] . '"';
      if ($default[$j] == $values[$i]['id']) {$j++;
        $field .= ' SELECTED';
      }

      $field .= ' $str >' .$values[$i]['text'] . '</option>';
    }
    $field .= '</select>';

    //if ($required == true) $field .= TEXT_FIELD_REQUIRED;

    return $field;
  }

?>