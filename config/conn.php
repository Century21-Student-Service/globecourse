<?php
require_once dirname(__FILE__) . "/../vendor/autoload.php";
use Medoo\Medoo;
$db = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'globecou01',
    'server' => '127.0.0.1',
    'username' => 'globecou01',
    'password' => '6WtGKPl4lv8mFbPV',
]);

try {
    $conn = new PDO("mysql:host=127.0.0.1;dbname=globecou01", 'globecou01', '6WtGKPl4lv8mFbPV');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
