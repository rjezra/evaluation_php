<?php
include "./dbconnect.php";

function isNameValid(string $name): bool
{
    $pattern = "/^[a-zA-ZÀ-ÿ.-]+[\s\t]*[a-zA-ZÀ-ÿ.-]*$/";
    return preg_match($pattern, $name) === 1;
}

function isEmailValid(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function isPhoneValid(string $phone): bool
{
    $regex = "/^\+\d{3}\s\d{2}\s\d{3}\s\d{2}$/";
    return preg_match($regex, $phone) === 1;
}

if (isset($_POST["modifier"])) {
    $id = $_POST["id"];
    $nom = mysqli_real_escape_string($connexion, $_POST['nom']);
    $email = mysqli_real_escape_string($connexion, $_POST['email']);
    $phone = mysqli_real_escape_string($connexion, $_POST['phone']);

    // Mettre à jour les données dans la base de données

    if (isNameValid($nom) && isEmailValid($email) && isPhoneValid($phone)) {
        $sqll = "UPDATE personnel SET nom='$nom', email='$email', phone = '$phone' WHERE id='$id'";
        if (mysqli_query($connexion, $sqll)) {
            header('Location: ../index.php');
            echo "Enregistrement mis à jour avec succès";
        } else {
            echo "Erreur lors de la mise à jour de l'enregistrement.";
        }
    } else {
        echo "Vérifiez votre nom, email ou numéro de téléphone";
    }
}
