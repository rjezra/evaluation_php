<?php
$connexion = mysqli_connect("localhost", "root", "", "dtc");

if (!$connexion) {
    die("Impossible de se connecter à la base de données");
}

// Récupérer l'ID de l'URL
$id = $_GET["id"];

$sql = "SELECT * FROM personnel WHERE id = '$id'";
$result = mysqli_query($connexion, $sql);
$ligne = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation php</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <h1>Modifier l'utilisateur :</h1>

    <form method="post" action="../controleur/majpersonel.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="mb-3">
            <label for="exampleInputNom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="exampleInputText" name="nom" value="<?php echo $ligne['nom']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $ligne['email']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputPhone" class="form-label">Télephone</label>
            <input type="text" class="form-control" id="examplePhone" name="phone" value="<?php echo $ligne['phone']; ?>">
        </div>
        <button type="submit" name="modifier"class="btn btn-lg btn-primary">Modifier</button>
    </form>
</body>

</html>