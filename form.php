<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <title>Formulaire</title>
</head>
<body class="container">
    <main>
        <h1>Upload an image</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
  
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . uniqid() . '_' . basename($_FILES['avatar']['name']);
            $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $authorizedExtensions = ['jpg', 'jpeg', 'png', 'wepb'];
            $maxFileSize = 1000000;
            $errors = array();

    
            if (!in_array($extension, $authorizedExtensions)) {
                $errors[] = "L'image doit être au format Jpg, Webp, Jpeg ou Png !";
            }

    
            if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
                $errors[] = "Votre fichier doit faire moins de 1 Mo !";
            }

  
       
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<p>$error</p>";
                }
            }
        }

        
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="avatar">Upload an image :</label>
            <input type="file" name="avatar" id="avatar" required>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </main>
</body>
</html>
