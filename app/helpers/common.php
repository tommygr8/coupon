<?php 
if ( ! function_exists('couponCriteria') ) {
    function couponCriteria($value1, $operator, $value2) {
        switch ($operator) {
            case '<':
                return $value1 < $value2;
                break;
            case '<=':
                return $value1 <= $value2;
                break;
            case '>':
                return $value1 > $value2;
                break;
            case '>=':
                return $value1 >= $value2;
                break;
            case '==':
                return $value1 == $value2;
                break;
            case '!=':
                return $value1 != $value2;
                break;
            default:
                return false;
        }
        return false;
    }

   

}
