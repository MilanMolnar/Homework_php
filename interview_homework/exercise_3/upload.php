<?php

$uploadDir = 'uploads/';
$uploadFile = $uploadDir . basename($_FILES['userfile']['name']);
$file = $_FILES['userfile']['tmp_name'];

echo "<p>";
if (exif_imagetype($file) == IMAGETYPE_JPEG || exif_imagetype($file) == IMAGETYPE_PNG){
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Upload failed";
    }
}else{
    echo "The file uploaded, is not JPEG nor PNG";
}

echo "</p>";
echo '<pre>';
echo 'file info: ';
print_r($_FILES);
print "</pre>";

?>
