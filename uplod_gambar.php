<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload file</title>
    <meta name="description" content="Belajar PHP">
    <meta name="keywords" content="upload, file, PHP">
    <meta name="author" content="Chandra Dina Sefrilian">
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
    <p><label>Pilih gambar yang akan di upload: </label><br>
    <input type="file" name="gambar" value="pilih gambar1"></p>
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php
if(isset($_POST["submit"])) {
    $target_dir = "gambar/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if($check !== false) {
        echo "File berupa citra/gambar - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["gambar"]["size"] > 500000) { // 500 KB
        echo "Sorry, file anda terlalu besar.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, file anda gagal upload.";
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "File " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " berhasil upload.";
        } else {
            echo "Sorry, ada error saat upload.";
        }
    }
}
?>
</body>
</html>
