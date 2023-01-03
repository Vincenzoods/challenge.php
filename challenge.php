<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="./depotRetirer.css">
  <link rel="stylesheet" href="./tableInfo.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php

  include './compteBancaire.php';
  include './Personne.php';
  include './navBar.php';
  require './dataBase/dataBase.php';

  // Démarre une nouvelle session ou reprend une session existante
  // activer la gestion des sessions
  // La fonction session_start() doit être appelée au début de chaque page qui utilise des variables de session.
  session_start();
  // Une session est un mécanisme qui permet de stocker des données qui sont partagées entre plusieurs pages et qui sont associées à chaque utilisateur de manière unique. 

  // vérifie si le formulaire a été soumis
  // vérifie si le tableau $_POST contient les clés 'nom', 'age' et 'solde' avec isset qui permet de vérifier si ces variables ont été définies et ont une valeur non-null.
  // $_POST est un tableau associatif utilisé pour collecter les données de formulaire envoyées via la méthode HTTP POST.
  if (isset($_POST['nom']) && isset($_POST['age']) && isset($_POST['solde'])) {

    // Création du compte bancaire
    $compteBancaire = new CompteBancaire($_POST['solde']);

    // Création de la personne en lui associant le compte bancaire
    $personne = new Personne($_POST['nom'], $_POST['age'], $compteBancaire);

    // Stockage de la personne dans la session
    // La variable de session $_SESSION est un tableau associatif global qui est disponible sur toutes les pages et permet de stocker des données qui doivent être partagées entre plusieurs pages. 
    // $_SESSION['personne'] = $personne;" 
    // permet de définir une variable de session nommée "personne" et de lui affecter comme valeur l'objet "$personne". 
    // Cela signifie que l'objet "$personne" est stocké dans la variable de session "personne" et est associé à la session en cours.
    $_SESSION['personne'] = $personne;
  }

  // On vérifie si on a une instance de la classe Personne dans la session
  elseif (isset($_SESSION['personne'])) {

    // Récupération de la personne stockée dans la session
    // "$personne = $_SESSION['personne'];" permet de récupérer la valeur de la variable de session "personne" et de l'affecter à la variable "$personne". 
    // Cela signifie que l'objet stocké dans la variable de session "personne" est récupéré et affecté à la variable "$personne".
    $personne = $_SESSION['personne'];

    // La variable $personne est égale à l'objet de la session actuelle qui est stocké sous la clé 'personne'. La variable $compteBancaire est égale à l'objet de compte bancaire qui est associé à la personne contenue dans la variable $personne.
    $compteBancaire = $personne->compteBancaire;
  } else {

    // Redirection vers le formulaire
    header('Location: formulaire.php');
  }
  //  utilise "isset" pour vérifier si la variable "deposer" a été définie
  // "is_numeric" pour vérifier si sa valeur est numérique
  if (isset($_POST['deposer']) && is_numeric($_POST['deposer'])) {

    // vérifie si la valeur à déposer est positive ou nulle
    if ($_POST['deposer'] > 0) {

      $compteBancaire->deposer($_POST['deposer']);
    } else {

      // affiche un message d'erreur si la valeur est négative
      echo "Vous ne pouvez pas déposer un montant négatif.";
    }
  }

  //  utilise "isset" pour vérifier si la variable "retirer" a été définie
  // "is_numeric" pour vérifier si sa valeur est numérique
  if (isset($_POST['retirer']) && is_numeric($_POST['retirer'])) {

    // vérifie si la valeur à retirer est positive ou nulle
    if ($_POST['retirer'] > 0) {

      // vérifie si le solde du compte est suffisant pour couvrir le montant à retirer
      if ($compteBancaire->solde >= $_POST['retirer']) {

        $compteBancaire->retirer($_POST['retirer']);
      } else {

        // affiche un message d'erreur si le solde est insuffisant
        echo "Solde insuffisant.";
      }
    } else {

      // affiche un message d'erreur si la valeur est négative
      echo "Vous ne pouvez pas retirer un montant négatif.";
    }
  }



  // Affichage des informations de la personne et du compte bancaire
  echo $personne->sePresenter();
  echo "<br>";
  echo "Solde du compte : $compteBancaire->solde €";

  ?>


  <!-- Formulaire de dépôt/retrait d'argent sur le compte bancaire -->

  <form method="post" action="challenge.php">

    <label>Déposer :</label>
    <input type="number" name="deposer">
    <br>
    <label>Retirer :</label>
    <input type="number" name="retirer">
    <br>
    <input type="submit" value="Valider">

  </form>
  <?php
  if (isset($_POST['nom'], $_POST['age'], $_POST['solde']) && !empty($_POST['nom']) && !empty($_POST['age']) && !empty($_POST['solde'])) {
    $nom = strip_tags(htmlentities($_POST['nom']));
    $age = strip_tags(htmlentities($_POST['age']));
    $solde = strip_tags(htmlentities($_POST['solde']));

    // Insérez le client dans la table clients
    $str = "INSERT INTO clients(nom, age) VALUES (:nom, :age)";
    $query = $bdd->prepare($str);
    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
    $query->bindValue(':age', $age, PDO::PARAM_INT);
    if ($query->execute()) {

      echo "enregistrés";
    } else {

      echo 'contactez votre banque';
    }

    // Insérez le solde dans la table comptebancaire
    $str = "INSERT INTO comptebancaire(solde) VALUES (:solde)";
    $query = $bdd->prepare($str);
    $query->bindValue(':solde', $solde, PDO::PARAM_INT);
    $query->execute();
  }

  // Affiche les informations de chaque personne et de leur compte bancaire
  $compteBancaire = $personne->compteBancaire;
  echo '
      <table>
        <tr>
          <th>Nom</th>
          <th>Age</th>
          <th>Solde</th>
        </tr>
        <tr>
          <td>' . $personne->nom . '</td>
          <td>' . $personne->age . '</td>
          <td>' . $compteBancaire->solde . '</td>
        </tr>
      </table>
      ';

  ?>

  <a href="formulaire.php">Retour saisie</a>

</body>

</html>