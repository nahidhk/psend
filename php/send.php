<?php 
$currency = $_POST['currency'];
$price = $_POST['prce'];
$cpt = $_POST['cpt'];
$bdt = $_POST['bdt'];
$fee = $_POST['fee'];
$methoads = $_POST['methoads'];
$accno = $_POST['accno'];
$country = $_POST['country'];
$adminid = $_POST['adminid'];
$adminname = $_POST['adminname'];
$adminpin = $_POST['adminpin'];
$adminimg = $_POST['adminimg'];
$transition = $adminid . $adminpin . $cpt . date('si');
echo  $transition ;





?>