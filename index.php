<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation php</title>
    <link rel="stylesheet" href="./assets/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
    <?php
    include "./controleur/dbconnect.php";
    if (isset($_POST["supprime"])) {
        $id = mysqli_real_escape_string($connexion, $_POST['id']);
        $sql2 = "DELETE FROM personnel WHERE id = '$id'";
        mysqli_query($connexion, $sql2);
    }
    if (isset($_POST["modifier"])) {
        $id = $_POST["id"]; // Assurez-vous que $id est correctement défini
        header('Location: ./page/update.php?id=' . $id);
        exit();
    }
        $sql = "SELECT * FROM personnel";
        $result = mysqli_query($connexion, $sql);
    
    ?>
    <div class="container">
        <h1>User Management</h1>
        <a class="btn btn-primary" href="./page/inscription.php" role="button">Add New</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($ligne = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <th scope="row"><img src="<?php echo $ligne["photo"]; ?>" alt="" class="profil"></th>
                        <td><?php echo $ligne["nom"]; ?></td>
                        <td><?php echo $ligne["email"]; ?></td>
                        <td><?php echo $ligne["phone"]; ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="nom" value="<?php echo $ligne['nom']; ?>">
                                <input type="hidden" name="id" value="<?php echo $ligne['id']; ?>">
                                <button type="submit" name="supprime" class="btn btn-light"><img src="./assets/img/image3.png" alt=""></button>
                                <button type="submit" name="modifier" class="btn btn-light"><img src="./assets/img/image2.png" alt=""></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>