<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Login and Registration with CodeIgniter">
	<title>Add Book and Review </title>
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
		.indent{
			margin-right: 5%;
		}
		#add_review_btn{
			float: right;
		}
		textarea{
			max-width: 100%;
			max-height: 114px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="page-header">
			<h3><?= $this->session->userdata('name') ?></h3>
			<a class="header_link" href="">Log Out</a>
			<a class="header_link" href="/Books/index">Home</a>
		</div><!-- end of page-header -->
		<div class="row">
			<div class="col-md-6">
				<h4>Add a New Book and a Review</h4>
				<form class="form-horizontal" action="/Books/add_book" method="post">
				<input type="hidden" name="add_book_and_review" value="TRUE">
					<div class="form-group">
						<label for='title' class="col-sm-3 control-label">Book Title</label>
						<div class="col-sm-9">
							<input type="text" id="title" name="title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Author</label>
						<div class="col-sm-10">
						</div>
					</div>
					<div class="form-group indent">
						<label for='author_from_list' class="col-sm-3 col-offset-sm-2 control-label">Choose From a List</label>
						<div class="col-sm-9">
						<select class="form-control"  id = "author_from_list" name="author_from_list">
							<option selected="selected"></option>
							<?php
								if(isset($authors))
								{
									foreach ($authors as $author) 
									{
										echo "<option>" . $author['author'] . "</option>\n";
									}
								}
							?>
						</select>
						</div>
					</div>
					<div class="form-group indent">
						<label for='add_new_author' class="col-sm-3 col-offset-sm-2 control-label">Or Add a New Author</label>
						<div class="col-sm-9">
							<input type="text" id="add_new_author" name="new_author" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for='review' class="col-sm-3 control-label">Review</label>
						<div class="col-sm-9">
							<textarea id="review" name="review" class="form-control" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for='rating' class="col-sm-3 control-label">Rating</label>
						<div class="col-sm-9">
							<input type="number" id="rating" name="rating" min="0" max="5">&nbsp;Stars
						</div>
					<button type="submit" class="btn btn-default" id="add_review_btn">Add Book and Review</button>
					<div style="clear: both;"></div>
					</div>
				</form>
			</div>
		</div>
	</div><!-- end of container -->
</body>
</html>