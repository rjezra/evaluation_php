<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <?php 
  include "../controleur/formulaire.php";
  ?>
<form action="inscription.php" method="POST" enctype="multipart/form-data">
<div class="mb-3">
    <label for="exampleInputPhoto" class="form-label">Photo</label>
    <input type="file" class="form-control" name="photo">
  </div>
  <div class="mb-3">
    <label for="exampleInputNom" class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPhone" class="form-label">Votre numero de Téléphone</label>
    <input type="text" class="form-control" name="phone">
  </div>
  <button type="submit" class="btn btn-primary" name="enregistre">Enregistre</button>
</form>
</body>
</html>