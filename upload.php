<?php
ini_set('display_errors', 1);
if(isset($_FILES["upload"]["error"])){
    if($_FILES["upload"]["error"] > 0){
        echo "Error: " . $_FILES["upload"]["error"] . "<br>";
    } else{
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["upload"]["name"];
        $filetype = $_FILES["upload"]["type"];
        $filesize = $_FILES["upload"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("eventpics/" . $_FILES["upload"]["name"])){
                echo $_FILES["upload"]["name"] . " is already exists.";
            } else{
                move_uploaded_file($_FILES["upload"]["tmp_name"], "eventpics/" . $_FILES["upload"]["name"]);
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file - please try again."; 
        }
    }
} else{
    echo "Error: Invalid parameters - please contact your server administrator.";
}
?>