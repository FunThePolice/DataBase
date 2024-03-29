<?php

use App\Models\User;
use App\Builder;
require __DIR__.'/../vendor/autoload.php';

$builder = new Builder();
//$builder->createUser('Jack','John','Jameson');

$user = new User();
//$user->formSingleInput('Jack','Johna','Jameson');
//$user->save();
$result = $user->getById(5);
var_dump($result);