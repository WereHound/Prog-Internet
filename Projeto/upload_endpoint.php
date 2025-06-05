<?php
if (isset($_FILES['image']))
{
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir))
    {
        mkdir($uploadDir,0755,true);
    }

    $targetFile = $uploadDir.basename($_FILES['image']['name']);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFile))
    {
        echo "Upload successful";
    }
    else 
    {
        echo "Upload failed.";
    }

}
else {
    echo "No file recieved.";
}