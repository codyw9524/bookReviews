<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Login and Registration with CodeIgniter">
	<title>Books Home</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style>
		body{
			background: #D9E9FF;
		}
		.page-header{
			margin-top: 10px;
		}
		.page-header h3{
			display: inline-block;
		}
		.page-header .header_link{
			margin-top: 30px;
			margin-right: 10px;
			margin-left: 10px;
			float: right;
		}
		#reviews_div h4{
			margin-left: 2.5%;
			margin-top: 2.5%;
		}
		#all_books_with_reviews_div{
			border: 1px solid silver;
			max-height: 500px;
			overflow: scroll;
			padding: 5px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="page-header">
			<h3>Welcome <?= $this->session->userdata('name') ?></h3>
			<a class="header_link" href="/Sessions/destroy">Log Out</a>
			<a class="header_link" href="/Books/add">Add Book and Review</a>
			<a class="header_link" href="/Users/index/<?= $this->session->userdata('user_id') ?>">Profile</a>
		</div><!-- end of page-header -->
		<div class="row">
			<div class="col-md-7" id="reviews_div">
				<h3>Recent Book Reviews</h3>
				<hr>
				<?php
					if(isset($reviews))
					{
						foreach ($reviews as $review)
						{
							$phpdate = strtotime($review['created_at']);
							$newdate = date("F jS, Y", $phpdate);
							echo "<h4 class='book_title'><a href='/Books/show_book/" . $review['books.id'] . "'>" . $review['title'] . "</a></h4>\n";
							echo "<h5>Rating: " . $review['stars'] . "</h5>\n";
							echo "<p><a href='/Users/index/" . $review['users.id'] . "'>" . $review['alias'] . "</a> says: " . $review['content'] . "</p>\n";
							echo "<p>Posted on " . $newdate . "</p>\n";
						}
					}
				?>
			</div>
			<div class="col-md-4">
				<h4>Other Books with Reviews</h4>
				<div id="all_books_with_reviews_div">
					<?php
						if(isset($all_reviews))
						{
							foreach ($all_reviews as $review) 
							{
								echo "<h4><a href='/Books/show_book/" . $review['books.id'] . "'>" . $review['title'] . "</a></h4>\n";
							}
						}
					?>
				</div>
			</div>
		</div>
	</div><!-- end of container -->
</body>
</html>