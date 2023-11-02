<?php
include "dbconnect.php";

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

if (isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["phone"])) {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    
    if (isNameValid($nom) && isEmailValid($email) && isPhoneValid($phone)) {
        // Handle file upload
        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");
            $fileExtension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            if (in_array($fileExtension, $allowedExtensions)) {
                $name = "../assets/photos/" . uniqid() . '.' . $fileExtension;
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $name)) {
                    $sql = sprintf('INSERT INTO personnel (photo, nom, email, phone) VALUES("%s", "%s", "%s", "%s")', $name, $nom, $email, $phone);
                    mysqli_query($connexion, $sql);
                    header('Location:../index.php');
                    echo "Enregistrement effectué avec succès";
                } else {
                    echo 'Erreur lors de l\'enregistrement de la photo.';
                }
            } else {
                echo 'Extension de fichier non autorisée.';
            }
        } else {
            echo 'Erreur lors du téléchargement de la photo.';
        }
    } else {
        echo "Vérifiez votre nom, email ou numéro de téléphone";
    }
}
?>