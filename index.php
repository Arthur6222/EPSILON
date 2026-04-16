<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de fichiers - MVP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <h1>Upload de fichiers</h1>

    <?php
    
    if (isset($_GET['error'])) {
        echo '<p class="error">Erreur: ' . htmlspecialchars($_GET['error']) . '</p>';
    }
    if (isset($_GET['success'])) {
        echo '<p class="success">Fichier uploadé avec succès!</p>';
    }
    ?>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="fileToUpload">Sélectionnez un fichier à uploader:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Envoyer le fichier" name="submit">
        </div>
    </form>
</body>
</html>
