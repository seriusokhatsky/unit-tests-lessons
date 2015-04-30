<?php 

require_once 'vendor/autoload.php';

use App\Libraries\Calculator;

$calc = new Calculator();

echo $calc->add(3,12);

 ?>