<?php
require_once 'config.php';

// ===== TRAITEMENT DE L'UPLOAD =====
// Types autorisés et taille max définis dans config.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Vérification : fichier présent ?
    if (!isset($_FILES["fileToUpload"]) || $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_NO_FILE) {
        header("Location: index.php?error=Veuillez sélectionner un fichier");
        exit();
    }

    $file = $_FILES["fileToUpload"];
    $target_file = UPLOAD_DIR . basename($file["name"]);
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérification : taille du fichier
    if ($file["size"] > UPLOAD_MAX_SIZE) {
        header("Location: index.php?error=Fichier trop volumineux (max 5Mo)");
        exit();
    }

    // Vérification : type de fichier autorisé
    if (!in_array($file_type, UPLOAD_TYPES_AUTORISES)) {
        header("Location: index.php?error=Seuls les fichiers PDF et images (JPG, JPEG, PNG, GIF) sont autorisés");
        exit();
    }

    // Création du dossier uploads si inexistant
    if (!file_exists(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0755, true);
    }

    // Upload du fichier
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        header("Location: index.php?success=1");
        exit();
    } else {
        header("Location: index.php?error=Erreur lors de l'upload du fichier");
        exit();
    }

} else {
    header("Location: index.php");
    exit();
}
?>
