<?php require 'db.php'; ?>

<?php require 'blocks/head.php'; ?>

<div class="main_container">
	<div class="filter_block">
		<select id="filter">
			<option value="title_asc">By title(ASC)</option>
			<option value="title_desc">By title(DESC)</option>
			<option value="time_asc">By date(ASC)</option>
			<option value="time_desc">By date(DESC)</option>
		</select>
	</div>

	<div class="posts"></div>

	<div class="pagination"></div>
</div>
	

<?php require 'blocks/footer.php'; ?>
