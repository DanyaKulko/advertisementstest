function send_ajax(page, data, callback, data_types="application/x-www-form-urlencoded") {

	$.ajax({
		type: "POST",
		url: '/ajax_handlers/' + page,
		data: data,
		dataType: 'json',
		processData: data_types,
		contentType: data_types,
		success: function(data) {

			if(data.success)
				callback(data);
			else 
				alert(data.message);

		}
	})
}


$('document').ready(function() {

	if($(".posts").length) {

		let query = window.location.search,
		    url_search = new URLSearchParams(query),
		    page = url_search.get('page');

		if(!page)
			page = 1;

		var data = {
			'order_by': 'title_asc',
			'page': parseInt(page)
		}
		send_ajax('get_posts.php', data, insert_posts);
	}
})


const insert_posts = data => {

	var ex_html = '';
	var ex_pagination = '';

	for(let i = 0; i < data.posts.length; i++) {
		ex_html += '<div class="post_container"><div class="img"><img style="background-image: url(/public/images/photo' +(i + 1)+'.jpg)" alt=""></div><div class="additional_info"><span class="title">' + data.posts[i].title + '</span><div class="description">' + data.posts[i].description + '</div><a href="post.php?id=' + data.posts[i].id + '" class="read_more">Read more</a></div></div>';
	}

	$('.posts').html(ex_html);


	if(data.pages > 1) {

		for(let i = 1; i < data.pages + 1; i++) {

			if(data.current_page == i)
				ex_pagination += '<span class="active"><a href="index.php?page=' + i + '">' + i + '</a></span>';
			else 
				ex_pagination += '<span class="select_page"><a href="index.php?page=' + i + '">' + i + '</a></span>';

		}

		$('.pagination').html(ex_pagination);
	}
}


	
$('#filter').on('change', function() {

	var data = {
		'order_by': this.value
	}

	send_ajax('get_posts.php', data, insert_posts);
})


function create_post_success(data) {
	alert('Post was successfully created!');
	$('#create_post')[0].reset();
}


$('#create_post').on('submit', function(e) {

	e.preventDefault();

	var formData = new FormData(this);

	if ($('[name="images[]"]')[0].files.length > 3 || $('[name="images[]"]')[0].files.length < 1) {
		alert('Images length must be between 1 and 3');
		return;
	}

	if ($('[name="title"]').val().length < 8 || $('[name="title"]').val().length > 255) {
		alert('Title length must be between 8 and 255');
		return;
	}

	if ($('[name="description"]').val().length > 1023 || $('[name="description"]').val().length < 8) {
		alert('Description length must be between 8 and 1023');
		return;
	}

	send_ajax('create_post.php', formData, create_post_success, false);
})

