<?php
include_once 'dbconfig.php';
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["anyfile"]) && $_FILES["anyfile"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png" , "txt" =>"image/txt", "image" => "image/doc" ,"image" =>"image/docx" ,"image" =>"image/pdf");
        $filename = $_FILES["anyfile"]["name"];
        $filetype = $_FILES["anyfile"]["type"];
        $filesize = $_FILES["anyfile"]["size"];
    
        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        // Validate file size - 2MB maximum
        $maxsize = 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        // Validate type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                if(move_uploaded_file($_FILES["anyfile"]["tmp_name"], "upload/" . $filename)){

                    $sql="INSERT INTO inserfiles(file,type,size) VALUES('$filename','$filetype','$filesize')";
                    
                    mysqli_query($conn,$sql);

                    echo "Your file was uploaded successfully.";
                }else{

                   echo "File is not uploaded";
                   

                }
                
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
           
        }
    } else{
        echo "Error: " . $_FILES["anyfile"]["error"];
       
    }
}
?>