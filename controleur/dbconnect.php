<?php
$connexion = mysqli_connect("localhost", "root", "", "dtc");
if (!$connexion) {
    die("Impossible de se connecter");
}