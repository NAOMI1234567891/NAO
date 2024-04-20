<?php
// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date_naissance = $_POST['date_naissance'];
$lieu_naissance = $_POST['lieu_naissance'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$nationalite = $_POST['nationalite'];
$secteur_activite = $_POST['secteur_activite'];
$statut = $_POST['statut'];
$mot_de_passe = $_POST['mot_de_passe'];
$confirmation_mot_de_passe = $_POST['confirmation_mot_de_passe'];
$nom_domaine = $_POST['nom_domaine'];
$pays_residence = $_POST['pays_residence'];
$piratage = $_POST['piratage'];
$centres_interets = implode(", ", $_POST['centres_interets']);

// Connexion à la base de données
$connexion = mysqli_connect("localhost", "Naominguewou", "Lucresse12", "naodos_security");

// Vérifier la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}

// Requête SQL préparée pour insérer les données du formulaire en utilisant des paramètres
$sql = "INSERT INTO inscription (nom, prenom, date_naissance, lieu_naissance, telephone, email, adresse, nationalite, secteur_activite, statut, mot_de_passe, confirmation_mot_de_passe, nom_domaine, pays_residence, piratage, centres_interets) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($connexion, $sql);

// Vérifier si la requête préparée a réussi
if ($stmt) {
    // Lier les paramètres à la requête
    mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $nom, $prenom, $date_naissance, $lieu_naissance, $telephone, $email, $adresse, $nationalite, $secteur_activite, $statut, $mot_de_passe, $confirmation_mot_de_passe, $nom_domaine, $pays_residence, $piratage, $centres_interets);

    // Exécuter la requête préparée
    if (mysqli_stmt_execute($stmt)) {
        echo "Enregistrement réussi";
    } else {
        echo "Erreur lors de l'enregistrement des données: " . mysqli_stmt_error($stmt);
    }

    // Fermer la requête préparée
    mysqli_stmt_close($stmt);
} else {
    echo "Erreur lors de la préparation de la requête: " . mysqli_error($connexion);
}

// Fermer la connexion à la base de données
mysqli_close($connexion);
?>

