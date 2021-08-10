<?php require 'db.php'; ?>

<?php require 'blocks/head.php'; ?>

<?php 
$id = (int)$_GET['id'];
$q = mysqli_query($con, "SELECT id, title, description, photos, time FROM advertisements WHERE id = $id");
$ex = mysqli_fetch_assoc($q);
$photos = json_decode($ex['photos']);
?>


<div class="main_container">

	<div class="post_info">
		<div class="post_images">
			<?php for($i = 0; $i < count($photos); $i++) { ?>
				<img style="background-image: url(/public/images/<?= $photos[$i] ?>)" alt="">
			<?php } ?>
		</div>

		<div class="post_date">
			Date: <?= date('d.m.Y H:i', $ex['time']) ?>
		</div>

		<div class="post_title">
			<?= $ex['title'] ?>
		</div>

		<div class="post_description">
			<?= $ex['description'] ?>
		</div>
	</div>

</div>
	
	
<?php require 'blocks/footer.php'; ?>
