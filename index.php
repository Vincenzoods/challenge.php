<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les objet en php</title>
</head>
<body>

<!-- Prérequis pour accomplir le challenge:

    1) Écrivez une classe "Personne" qui a des propriétés "nom" et "âge" et qui a une méthode "sePrésenter" qui renvoie une chaîne de caractères de la forme "Bonjour, je m'appelle [nom] et j'ai [âge] ans."

    2) Écrivez une classe "CompteBancaire" qui a une propriété "solde" et qui a des méthodes "deposer" et "retirer" qui permettent de déposer ou retirer de l'argent du compte. Assurez-vous que l'on ne puisse pas retirer plus d'argent que le solde du compte.


    --- Le challenge ---

    Creer une interface visuelle sous forme de formulaire qui permet de créer une personne et un compte bancaire. Le formulaire doit permettre de saisir le nom, l'âge et le solde du compte bancaire.
    Une fois le formulaire soumis, il faut afficher les informations de la personne et du compte bancaire.
    Le formulaire doit permettre de déposer ou retirer de l'argent du compte bancaire.
    Le formulaire doit permettre de créer une nouvelle personne et un nouveau compte bancaire.
    L'instance de la classe "CompteBancaire" doit être stockée dans la propriété "compteBancaire" de l'instance de la classe "Personne".
    L'instance de la classe "Personne" doit être stockée dans la session.

    --- Bonus ---

    1) Ajouter une méthode "virement" à la classe "CompteBancaire" qui permet de transférer de l'argent d'un compte à un autre.
    2) Ajouter une méthode "getSolde" à la classe "CompteBancaire" qui permet de récupérer le solde du compte.
    3) Ajouter une méthode "getNom" à la classe "Personne" qui permet de récupérer le nom de la personne.
    4) Ajouter une méthode "getAge" à la classe "Personne" qui permet de récupérer l'âge de la personne.
    5) Ajouter une méthode "getCompteBancaire" à la classe "Personne" qui permet de récupérer l'instance de la classe "CompteBancaire".
    6) Ajouter une méthode "setCompteBancaire" à la classe "Personne" qui permet de définir l'instance de la classe "CompteBancaire".
    7) Ajouter une méthode "setNom" à la classe "Personne" qui permet de définir le nom de la personne.
    8) Ajouter une méthode "setAge" à la classe "Personne" qui permet de définir l'âge de la personne.
    9) Ajouter une méthode "setSolde" à la classe "CompteBancaire" qui permet de définir le solde du compte.

    --- Super bonus --- // Si vous avez fini les bonus, vous pouvez essayer de faire les super bonus.

    10) Créer une classe "Banque" qui contient une propriété "personnes" qui est un tableau d'instances de la classe "Personne".
    11) Créer une méthode "ajouterPersonne" à la classe "Banque" qui permet d'ajouter une instance de la classe "Personne" dans la propriété "personnes".
    12) Créer une méthode "getPersonne" à la classe "Banque" qui permet de récupérer une instance de la classe "Personne" à partir de son nom.
    13) Créer une méthode "getPersonnes" à la classe "Banque" qui permet de récupérer la propriété "personnes".
    14) Créer une méthode "getPersonnesCount" à la classe "Banque" qui permet de récupérer le nombre de personnes dans la propriété "personnes".
    15) Créer une méthode "getPersonneBySolde" à la classe "Banque" qui permet de récupérer une instance de la classe "Personne" à partir de son solde du compte.
    16) Créer une méthode "getPersonneByAge" à la classe "Banque" qui permet de récupérer une instance de la classe "Personne" à partir de son âge.
    17) Créer une méthode "getPersonneByAgeAndSolde" à la classe "Banque" qui permet de récupérer une instance de la classe "Personne" à partir de son âge et de son solde du compte.
    18) Créer une méthode "getPersonneByAgeOrSolde" à la classe "Banque" qui permet de récupérer une instance de la classe "Personne" à partir de son âge ou de son solde du compte.

-->
</body>
</html>
