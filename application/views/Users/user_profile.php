

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Login and Registration with CodeIgniter">
	<title>User Profile</title>
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
		ul li{
			font-size: 1.3em;
		}
		ul{
			list-style: none;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="page-header">
			<h3>User Profile</h3>
			<a class="header_link" href="/Sessions/destroy">Log Out</a>
			<a class="header_link" href="/Books/add">Add Book and Review</a>
			<a class="header_link" href="/Books">Home</a>
		</div><!-- end of page-header -->
		<div class="row">
			<div class="col-md-4">
				<table class="table">
					<tr>
						<td>Alias:</td>
						<td><?= $user['alias'] ?></td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><?= $user['name'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?= $user['email'] ?></td>
					</tr>
					<tr>
						<td>Total Reviews:</td>
						<td><?php
								if(isset($reviews))
								{
									$count = 0;
									foreach ($reviews as $review) 
									{
										$count++;
									}
									echo $count;
								}
							?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h4>Posted Reviews on the Following Books</h4>
				<?php
					if(isset($books))
					{
						echo "<ul>\n";
						foreach ($books as $book) 
						{
							echo "<li><a href='/Books/show_book/" . $book['books.id'] . "'>" . $book['title'] . "</a></li>\n";
						}
						echo "</ul>\n";
					}
				?>
			</div>
		</div>
	</div><!-- end of container -->
</body>
</html>