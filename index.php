<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= DEV_TITRE ?></title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: <?= COULEUR_PRINCIPALE ?>;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        /* ===== CONTAINER PRINCIPAL ===== */
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 40px;
            width: 500px;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        h2 { margin-bottom: 20px; }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
            text-align: center;
        }

        label { display: block; margin-bottom: 10px; }

        /* ===== BOUTON SUBMIT ===== */
        input[type="submit"] {
            background-color: <?= COULEUR_PRINCIPALE ?>;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover { background-color: darkred; }

        /* ===== MESSAGES ===== */
        .error { color: red; margin-bottom: 15px; }
        .success { color: green; margin-bottom: 15px; }

        /* ===== NOM DU DEV ===== */
        .nom {
            position: fixed;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 14px;
            color: <?= COULEUR_PRINCIPALE ?>;
        }
    </style>
</head>
<body>

    <!-- HEADER - voir header.php -->
    <?php include 'header.php'; ?>

    <!-- FORMULAIRE PRINCIPAL -->
    <div class="container">
        <h2>Formulaire d'upload</h2>

        <!-- Messages d'erreur / succès -->
        <?php if (isset($_GET['error'])): ?>
            <p class="error">Erreur: <?= htmlspecialchars($_GET['error']) ?></p>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <p class="success">Fichier uploadé avec succès!</p>
        <?php endif; ?>

        <!-- FORMULAIRE - action vers upload.php -->
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fileToUpload">
                    Sélectionnez un fichier (PDF ou image uniquement):
                </label>
                <input type="file" name="fileToUpload" id="fileToUpload"
                       accept=".pdf,.jpg,.jpeg,.png,.gif" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Envoyer le fichier" name="submit">
            </div>
        </form>
    </div>

    <!-- NOM DU DÉVELOPPEUR - modifiable dans config.php -->
    <p class="nom"><?= DEV_NOM ?></p>

</body>
</html>
