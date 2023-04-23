
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Interview</title>
</head>

<body>
    <div class="addImageDiv">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>
    <div class="gallery">
        <?php
        $target_dir = 'uploads/';

        if (isset($_POST['submit']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
            $target_file = $target_dir . basename($_FILES['image']['name']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (!is_dir($target_dir)) {
                mkdir($target_dir);
            }

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $images = glob($target_dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                foreach ($images as $image) {
                    echo '<img class="images" src="' . $image . '" alt="Uploaded image">';
                }            } else {
                echo 'Sorry, there was an error uploading your file.';
            }
        } else {
            $images = glob($target_dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
            foreach ($images as $image) {
                echo '<img class="images" src="' . $image . '" alt="Uploaded image">';
            }
        }
        ?>
    </div>
</body>

</html>
