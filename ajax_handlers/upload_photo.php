<?php 


$countfiles = count($_FILES['fileinput']['name']);
$file_names = array();

for($i = 0; $i < $countfiles; $i++) {

	if (isset($_FILES['fileinput']['name'][$i])) {
		$photo_name = time() . "_" . uniqid() . "." . end(explode('.', $_FILES['fileinput']['name'][$i]));
		$error_flag = $_FILES['fileinput']['errors'][$i];
		if ($error_flag == 0) {
			$upfile = "../images/contact_us/".$photo_name;
			if ($_FILES['fileinput']['tmp_name'][$i]) {
				move_uploaded_file($_FILES['fileinput']['tmp_name'][$i], $upfile);
				array_push($file_names, $photo_name);
			}
		 	else echo "Ошибка";
		}
	}
}

echo json_encode($file_names);


 ?>