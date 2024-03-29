<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="icon" href="./img/favicon.png" type="image/x-icon">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js">
	</script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		@import url('./css/profile.css');
	</style>
	<!-- section name "BG" -->
	<div class="stars"></div>
	<div class="twinkling"></div>
</head>
<body>
	<!-- partial:index.partial.html -->

	<div class="card">
		<div class="banner">
			<img src="<?php echo $_SESSION['PICTURE']; ?>" alt="profile">
		</div>
		<br><br><br><br>
		<h2 class="name"><?php echo $_SESSION['NAME']; ?></h2>
		<div class="title">Space Protector</div>
		<div class="line"></div><br>
		<div class="actions">
			<div class="follow-info">
				<h2><a><span>1</span><small>Ranking</small></a></h2>
				<h2><a><span>1000</span><small>Kill</small></a></h2>
			</div>
			<div class="follow-btn">
				<button onclick="window.location.href='lasershot.html'">Back To Home</button>
			</div><br>
			<div class="follow-btn">
				<button onclick="window.location.href='logout.php'">Logout</button>
			</div>
		</div>
		<div class="desc">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Timestamps</th>
						<th scope="col">AliveTime</th>
						<th scope="col">Score</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>08/19/2019 @ 11:01am (UTC)</td>
						<td>10:20</td>
						<td>130</td>
					</tr>
					<!-- <tr>
						<th scope="row">2</th>
						<td>08/19/2019 @ 11:02am (UTC)</td>
						<td>2:30</td>
						<td>210</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>08/19/2019 @ 11:03am (UTC)</td>
						<td>0:30</td>
						<td>25</td>
					</tr> -->
				</tbody>
			</table>
		</div>
	</div>
	<!-- partial -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js'></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>