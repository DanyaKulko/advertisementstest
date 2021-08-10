<?php require 'db.php'; ?>

<?php require 'blocks/head.php'; ?>

<div class="main_container">
	<div class="creation_form">
		<div class="form_title">
			Create new advertisement
		</div>
		<form id="create_post" enctype="multipart/form-data">
			<input type="text" name="title" placeholder="Title">
			<textarea name="description" placeholder="Description"></textarea>
			<input type="file" name="images[]" multiple accept=".jpg, .jpeg, .png">
			<input type="submit" name="submit" value="Create">
		</form>
	</div>
</div>
	

<?php require 'blocks/footer.php'; ?>
