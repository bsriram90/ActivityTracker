<?php
/**
 * Created by IntelliJ IDEA.
 * User: Sriram
 * Date: 23-10-2016
 * Time: 02:09 PM
 */

echo "Welcome ";

echo "</br>";

if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'Mysqli extension not installed.';
} else {
    echo 'Mysqli extension installed.';
}

echo "</br>";

?>