<?php 
require '../db.php';

$title       = mysqli_real_escape_string($con, $_POST['title']);
$description = mysqli_real_escape_string($con, $_POST['description']);
$countfiles = count($_FILES['images']['name']);


if(strlen($title) > 255 || strlen($title) < 8)
    return_answer(array('success' => false, 'message' => 'Title length must be between 8 and 255'));

if(strlen($description) > 1023 || strlen($description) < 8)
    return_answer(array('success' => false, 'message' => 'Description length must be between 8 and 255'));

if($countfiles > 3 || $countfiles < 1)
    return_answer(array('success' => false, 'message' => 'Images length must be between 1 and 3'));


$file_names = array();

for($i = 0; $i < $countfiles; $i++) {

    if (isset($_FILES['images']['name'][$i])) {
        $photo_name = time() . "_" . uniqid() . "." . end(explode('.', $_FILES['images']['name'][$i]));
        $error_flag = $_FILES['images']['errors'][$i];
        if ($error_flag == 0) {
            $upfile = "../public/images/".$photo_name;
            if ($_FILES['images']['tmp_name'][$i]) {
                move_uploaded_file($_FILES['images']['tmp_name'][$i], $upfile);
                array_push($file_names, $photo_name);
            }
            else echo "Ошибка";
        }
    }
}

$photos = json_encode($file_names);
$time = time();

$q = mysqli_query($con, "INSERT INTO advertisements(id, title, description, photos, time) VALUES(NULL, '$title', '$description', '$photos', $time)");


if($q)
    return_answer(array('success' => true));

 ?>