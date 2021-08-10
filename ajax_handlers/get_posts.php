<?php

require '../db.php';

$order_by = (isset($_POST['order_by'])) ?  mysqli_real_escape_string($con, $_POST['order_by']) : 'title_asc';
$order_by = explode('_', $order_by);

$order_by_field = $order_by[0];
$order_by_type  = $order_by[1];

$limit = 6;

$page = (isset($_POST['page'])) ? (int)$_POST['page'] : 1;
$offset = ($page - 1) * $limit;

if($order_by_type == 'asc') 
	$query = "SELECT id, title, description, photos, time FROM advertisements ORDER BY $order_by_field ASC LIMIT $offset, $limit";
else 
	$query = "SELECT id, title, description, photos, time FROM advertisements ORDER BY $order_by_field DESC LIMIT $offset, $limit";

$q = mysqli_query($con, $query);


if(mysqli_num_rows($q) == 0)
	return_answer(array('success' => false, 'message' => 'No posts'));


$records = mysqli_query($con, "SELECT id FROM advertisements");
$totalRecords = mysqli_num_rows($records);
$totalPages = ceil($totalRecords / $limit);


while($ex = mysqli_fetch_assoc($q)) {

	if(strlen($ex['title']) > 30)
		$ex['title'] = substr($ex['title'], 0, 30) . '...';

	if(strlen($ex['description']) > 50)
		$ex['description'] = substr($ex['description'], 0, 50) . '...';

	$response[] = $ex;
}


return_answer(array('success' => true, 'posts' => $response, 'pages' => $totalPages, 'current_page' => $page));



?>
