<?php
if (!function_exists('isCheckedOrNot')) {
    /**
     * If the value is equal to 1, return the string 'checked', otherwise return an empty string.
     *
     * @param value The value of the checkbox.
     *
     * @return The function isCheckedOrNot is being returned.
     */
    function isCheckedOrNot($value)
    {
        return $value === 1 ? 'checked="checked"' : '';
    }
}