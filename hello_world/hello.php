<?php

/*
Dans le terminal:

$prenom= 'Ezra';

if ($prenom == null) {
    echo "Hello world";
} else {
    echo "Hello $prenom";
}
*/

if(isset($_GET['prenom']) &!empty($_GET['prenom'])) {
    $prenom = $_GET['prenom'];
    echo "Hello $prenom!";
} else {
    echo "Hello world!";
}
?>
