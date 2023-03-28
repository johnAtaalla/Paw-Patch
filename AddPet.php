<?php


session_start();

function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "oakland";
    $db = "pawpatch";
    ($conn = new mysqli($dbhost, $dbuser, $dbpass, $db)) or
        die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}

$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success.',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
    3 => 'The uploaded file was only partially uploaded.',
    4 => 'No file was uploaded.',
    6 => 'Missing a temporary folder.',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help.'
);
function reArrayFiles(&$attachFile) 
  {
        $file_ary = array();
        $file_count = count($attachFile['name']);
        $file_keys = array_keys($attachFile);
        for ($i=0; $i<$file_count; $i++) 
       {
            foreach ($file_keys as $key) 
            {
                $file_ary[$i][$key] = $attachFile[$key][$i];
            }
        }
        return $file_ary;
    }


// Handle form submission
if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $Species = $_POST['Species'];
    $Breed = $_POST['Breed'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Health_Problems = $_POST['Health_Problems'];
    $General = $_POST['General'];
    $email = $_SESSION['email'];
    if(isset($_FILES['userfile'])){
        $file_array = reArrayFiles($_FILES['userfile']);
        //print_r($file_array);die;
        if ($file_array[0]['error'] == 4){
            //print_r($file_array);die;
            $name = 'null';
            $img_dir = 'petPhotos/placeholder.jpg';
            //print_r($img_dir);die;
        }
        else {
        for($i=0;$i<count($file_array);$i++){
            if ($file_array[$i]['error'])
            {
                ?> <div class="alert alert-danger">
                <?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
                ?> </div> <?php
            }
            else {
                $extensions = array('jpg', 'png', 'gif', 'jpeg');
                $file_ext = explode('.',$file_array[$i]['name']);

                //print_r($file_ext);die;
                $name = $file_ext[0];

                $file_ext = end($file_ext);

                if(!in_array($file_ext, $extensions))
                {
                    ?> <div class="alert alert-danger">
                    <?php echo "{$file_array[$i]['name']} - Invalid file extension!";
                    ?> </div> <?php
                }
                else{
                    $img_dir = 'petPhotos/'.$file_array[$i]['name'];
                    move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);
                    ?> <div class="alert alert-success">
                    <?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
                    ?> </div> <?php

                }

            }
        }
    }
}



    $conn = OpenCon();

    // Construct the SQL statement with placeholders
    $sql = "INSERT INTO pet (Name, Species, Breed, Age, Gender, Health_Problems, General, email, img_name, img_dir) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("sssissssss", $Name, $Species, $Breed, $Age, $Gender, $Health_Problems, $General, $email, $name , $img_dir);

    // Execute the statement
    if ($stmt->execute() === true) {
        // Output the values for debugging purposes
        header('Location: Pets.php');
    } else {
        header('Location: Pets.php');
    }

    // Close the statement
    $stmt->close();

    CloseCon($conn);
}

?>