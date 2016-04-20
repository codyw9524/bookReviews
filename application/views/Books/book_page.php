<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Login and Registration with CodeIgniter">
	<title>Book Reviews</title>
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
		#reviews{
			margin-top: 3%;
		}
		#add_review{
			float: right;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="page-header">
			<h3><?= $this->session->userdata('name') ?></h3>
			<a class="header_link" href="/Sessions/destroy">Log Out</a>
			<a class="header_link" href="/Books/index">Home</a>
		</div><!-- end of page-header -->
		<div class="row">
			<div class="col-md-12">
				<h4><?= $books['title'] ?></h4>
				<h5>Author&nbsp;:&nbsp;<?= $books['author'] ?></h5>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7" id="reviews">
				<h4>Reviews:</h4>
				<hr>
				<?php
					foreach ($reviews as $review) 
					{
						$phpdate = strtotime($review['created_at']);
						$newdate = date("F jS, Y", $phpdate);
						echo "<h5>Rating: " . $review['stars'] . "</h5>\n";
						echo "<p><a href='/Users/index/" . $review['users.id'] . "'>" . $review['alias'] . "</a> says: " . $review['content'] . "</p>\n";
						echo "<p>Posted on " . $newdate . "</p>\n";
						if($this->session->userdata('user_id') == $review['users.id'])
						{
							echo "<form id='delte_review' action='/Reviews/destroy/" . $review['reviews.id'] . "/" . $review['books.id'] .  "' method='post'>\n";
							echo "<button type='submit' class='btn btn-danger btn-xs'>Delete Review</button\n";
							echo "</form>\n";
						}
						echo "<hr>\n";
					}
				?>
			</div>
			<div class="col-md-5">
				<form action="/Books/add_review" method="post">
				<input type="hidden" name="review_only" value="<?= $this->uri->segment(3) ?>">
					<div class="form-group">
						<label for="review">Add a Review</label>
						<textarea id="review" name="review" class="form-control" rows="5"></textarea>
					</div>
					<div class="form-group">
						<label for="review">Rating&nbsp;</label>
						<input type="number" id="rating" name="rating" min="0" max="5">&nbsp;Stars
					</div>
					<button id="add_review" type="submit" class="btn btn-default">Add a Review</button>
					<div style="clear: both;"></div>
				</form>
			</div>
		</div>
	</div><!-- end of container -->
</body>
</html>