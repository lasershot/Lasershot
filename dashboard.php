<?php
    session_start();
    include('pattern.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="./img/favicon.png" type="image/x-icon">
	<script src="https://kit.fontawesome.com/0e0d28628f.js"></script>
	<style>
		@import url('./css/dashboard.css');
	</style>

	<!-- section name "BG" -->
	<div class="stars"></div>
	<div class="twinkling"></div>
	<title>Dashboard</title>
</head>
<body>
	<div class="card table table-hover">
		<br>
		<h2 class="text-center topic">Dashboard</h2>
		<div class="line"></div><br>
		<div class="stage">
			<p class="text-center" id="stage">STAGE 1</p>
		</div>

		<div class="time text-center">
			<div class="timer">
				<div id="minutes">00 : 00</div>
			</div>

			<!-- Timer Buttons -->
			<div class="timer-buttons">
				<button class="btn btn-lg" data-action="start" onclick="start('S')">
					Start
				</button>
				<button class="btn btn-lg" data-action="stop" onclick="start('P')">
					Stop
				</button>
				<button class="btn btn-lg" data-action="reset" onclick="start('R')">
					Reset
				</button>
			</div>
		</div><br>

		<div class="probar text-center">
			<div>
				<div class="some-wrapper" data-percentage="100">
					<div class="inner-wrapper">
                     <img src="<?php echo $_SESSION['PICTURE']; ?>" alt="profile">
                    </div>
                    <svg class="r-progress-bar" width="200" height="200" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                       <circle r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
                       <circle class="bar" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
                   </svg>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="score text-center">
        <div id="score">SCORE : 0</div>
    </div>
    <div class="score text-center">
        <div id="hp_player">HP : 100</div>
    </div>
    <br>
    <div class="line1"></div><br>
    <!-- <div class="actions"> -->
        <div class="text-center">
            <div class="follow-btn">
                <button onclick="window.location.href='lasershot.html'">Back To Home</button>
            </div>
            <!--   </div> -->
            <br>
        </div>
    </div>

    <!-- <script src="./script/script.js"></script> -->
        <section>
        	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </section>
    </body>
    </html>