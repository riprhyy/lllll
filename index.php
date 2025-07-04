<!DOCTYPE html>
<html>

<head>
	<title>TSUKI</title>
	<link rel="apple-touch-icon" sizes="180x180" href="/res/img/icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="/res/img/icons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/res/img/icons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/res/manifest.json">
	<link rel="mask-icon" href="/res/img/icons/safari-pinned-tab.svg" color="#000000">
	<link rel="shortcut icon" href="/res/img/icons/favicon.ico">
	<meta name="msapplication-config" content="/res/browserconfig.xml">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#000000">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/res/css/reset.css">
	<link rel="stylesheet" href="/res/css/common.css">
	<link rel="stylesheet" href="/res/css/scanlines.css">
	<script src="/res/js/jquery.js"></script>
	<script src="/res/js/howler.js"></script>
	<script src="/res/js/cookies.js"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function(event) {
			var noise = new Howl({
				src: "/res/audio/ambience/7.ogg",
				loop: true,
				volume: "0.8"
			});

			var bgm = new Howl({
				src: "/res/audio/bgm/superbgm.ogg",
				volume: 0.5,
				loop: true
			});

			var intro = new Howl({
				src: "/res/audio/sfx/welcome.ogg",
				volume: 0.7,
				loop: false
			});

			if (getCookie("seenintro") !== "yes3") {
				window.addEventListener("load", function(event) {
					intro.play();
					intro.on('play', function() {
						PlayText();
						$("#intro").addClass("ready");
						setTimeout(function() {
							window.scrollTo(0, 0);
						}, 1700);
						setTimeout(function() {
							noise.play();
						}, 1700);
						setTimeout(function() {
							$("#intro").addClass("destroyed");
						}, 1700);
						setTimeout(function() {
							bgm.play();
						}, 2230);
						setTimeout(function() {
							setCookie("seenintro", "yes3", 356);
						}, 1700);
					});

					$("#intro h6").click(function() {
						$("#intro").hide();
						setCookie("seenintro", "yes3", 356);
					});
				});
			} else {
				$("#intro").hide();
				window.addEventListener("load", function(event) {
					noise.play();
					bgm.play();
				});
			}

			$("#replay").click(function() {
				setCookie("seenintro", "no", 356);
				location.reload();
			});

			$("#lain").click(function() {
				$("#flyer").css("height", "200vh");
				$("#wallpaper #lain").css("top", "calc(70vh - 456px + 200vh)");
				$("#wallpaper #lain").css("transition", "top 5s");

				$("#wallpaper h1").css("top", "calc(70vh - 380px + 200vh)");
				$("#wallpaper h1").css("transition", "top 5s");

				$("#header").hide(2000);
				$("#flyer").css("opacity", "0");
				$("html").css("overflow", "hidden");
				bgm.fade(0.2, 0, 8000);
				noise.fade(0.5, 0, 8000);
				setTimeout(function() {
					window.location = "nothing.php";
				}, 10000);
			});

			GetRegistrants();
			UpdateClock();

			setInterval(function() {
				GetRegistrants();
			}, 60000);

			setInterval(function() {
				UpdateClock();
			}, 1000);
		});

		var new_time = 0;
		var rec = false;

		function GetRegistrants() {
			var now = new Date().getTime();
			var slot_cost = 1728;

			var registrants = 4969;
			var original_time = 1498921200;
			var slots_left = 31000 - registrants;
			new_time = original_time + slot_cost * slots_left;
			rec = true;

			var ex_time_used = now - (original_time * 1000);
			var ex_slots_used = Math.ceil(ex_time_used / 1000 / slot_cost);
			var slotsss_left = 31000 - registrants - ex_slots_used;

			$("#slotsremaining").text(slotsss_left);
		}

		function UpdateClock() {
			var now = new Date().getTime();
			var countDownDate = new Date(new_time * 1000).getTime();

			// Find the distance between now an the count down date
			var distance = countDownDate - now;

			// Time calculations for days, hours, minutes and seconds
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

			if (minutes < 10) {
				minutes = "0" + minutes;
			}

			if (seconds < 10) {
				seconds = "0" + seconds;
			}

			// Display the result in the element with id="demo"
			if (distance >= 0 && rec) {
				$("#countdown").text(days + "d " + hours + ":" + minutes + ":" + seconds);
			} else {
				$("#countdown").text("Waiting...");
			}

		}

		function PlayText() {
			setTimeout(function() {
				$("#intro h1").html("GAT_")
			}, 100);
			setTimeout(function() {
				$("#intro h1").html("GATES\\")
			}, 180);
			setTimeout(function() {
				$("#intro h1").html("GATES OP|")
			}, 270);
			setTimeout(function() {
				$("#intro h1").html("GATES OPEN/")
			}, 350);
			setTimeout(function() {
				$("#intro h1").html("GATES OPEN-")
			}, 450);
			setTimeout(function() {
				$("#intro h1").html("GATES OPEN\\")
			}, 510);
			setTimeout(function() {
				$("#intro h1").html("GATES OPEN|")
			}, 620);
			setTimeout(function() {
				$("#intro h1").html("GATES OPEN/")
			}, 690);
			setTimeout(function() {
				$("#intro h1").html("GATES OPEN-")
			}, 740);
			setTimeout(function() {
				$("#intro h1").html("GATES O\\")
			}, 800);
			setTimeout(function() {
				$("#intro h1").html("GAT|")
			}, 880);
			setTimeout(function() {
				$("#intro h1").html("/")
			}, 940);
			setTimeout(function() {
				$("#intro h1").html("-")
			}, 1040);
			setTimeout(function() {
				$("#intro h1").html("\\")
			}, 1120);
			setTimeout(function() {
				$("#intro h1").html("Unli|")
			}, 1240);
			setTimeout(function() {
				$("#intro h1").html("Unlink t/")
			}, 1290);
			setTimeout(function() {
				$("#intro h1").html("Unlink the wor-")
			}, 1340);
			setTimeout(function() {
				$("#intro h1").html("Unlink the world.<br>Un\\")
			}, 1440);
			setTimeout(function() {
				$("#intro h1").html("Unlink the world.<br>Unlock th|")
			}, 1480);
			setTimeout(function() {
				$("#intro h1").html("Unlink the world.<br>Unlock the rest./")
			}, 1520);
			setTimeout(function() {
				$("#intro h1").html("Unlink the world.<br>Unlock the rest.")
			}, 1580);
		}

		var konami = "38,38,40,40,37,39,37,39,66,65";
		var kkeys = [];

		$(document).keydown(function(e) {
			kkeys.push(e.keyCode);

			if (kkeys.toString().indexOf(konami) >= 0) {
				$(document).unbind('keydown', arguments.callee);

				window.location.href = "/?sct8";
			}
		});
	</script>
	<style>
		@font-face {
			font-family: CNT;
			src: url(/res/font/countdown.ttf);
		}

		#countdown {
			font-family: CNT;
			font-size: 3em;
			margin: 0;
			text-shadow: 0px 0px 16px #FF0;
		}

		#count h3 {
			font-size: 16px;
			margin: 0;
			color: #888;
		}

		#slots h4 {
			font-size: 24px;
			margin: 0;
			margin-top: 0.5em;
		}

		#slots h3 {
			font-size: 16px;
			margin: 0;
			color: #888;
			margin-bottom: 1em;
		}

		#belief h4 {
			font-size: 24px;
			margin: 0;
			margin-top: 0.5em;
		}

		#belief h3 {
			font-size: 16px;
			margin: 0;
			color: #888;
			margin-bottom: 1em;
		}

		#flyer {
			width: 100%;
			height: 0px;
			background-color: #000;
			background-image: url(/res/img/bg/home.png);
			background-attachment: fixed;
			background-position: center;
			transition: height 5s, opacity 5s;
		}


		#wallpaper {
			width: 100%;
			height: 70vh;
			background-color: #000;
			background-image: url(/res/img/bg/home.png);
			background-attachment: fixed;
			background-position: center;
		}

		#wallpaper #lain {
			position: absolute;
			top: calc(70vh - 456px);
			left: 10vw;
			transition: top 0s;
		}

		#wallpaper h1 {
			position: absolute;
			left: calc(10vw + 450px);
			top: calc(70vh - 380px);
			font-family: Heading;
			font-size: 3vw;
			text-shadow: 3px 6px #000, 0px -1px #000, 0px 1px #000, -1px 0px #000, 1px 0px #000, -1px -1px #000, 1px 1px #000, -1px 1px #000, 1px -1px #000;
			transition: top 0s;
		}

		#register-button {
			color: #FFFF00;
		}

		#register-button:hover {
			color: #FF0000;
			text-shadow: 0px 0px 10px #FF0000;
		}


		#intro {
			position: fixed;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			z-index: 1000000;
			background-color: #000;
		}

		#intro.ready {
			animation: 1.7s introHeat cubic-bezier(.82, .28, .93, .3) forwards;
		}

		#intro h1 {
			position: fixed;
			left: calc(10vw + 450px);
			top: calc(70vh - 380px);
			font-family: Heading;
			font-size: 3vw;
			text-shadow: 3px 6px #000, 0px -1px #000, 0px 1px #000, -1px 0px #000, 1px 0px #000, -1px -1px #000, 1px 1px #000, -1px 1px #000, 1px -1px #000;
		}

		#intro.ready h1 {
			animation: 1.7s typeHeat cubic-bezier(.82, .28, .93, .3) forwards;
		}

		#intro h6 {
			position: relative;
			top: 90vh;
			cursor: pointer;
			margin: 0;
			color: #FFF;
			opacity: 0.2;
		}

		#intro.destroyed {
			transition: 2s;
			opacity: 0;
			pointer-events: none;
		}

		@keyframes introHeat {
			0% {
				background-color: #000;
			}

			100% {
				background-color: #888;
			}
		}

		@keyframes typeHeat {
			0% {
				text-shadow: 0px 0px 0px #FFF;
				color: #FFF;
			}

			100% {
				text-shadow: 0px 0px 100px #FFF, 0px 0px 20px #FFF, 0px 0px 10px #FFF;
				color: #AAA;
			}
		}

		#back {
			background-color: rgba(0, 0, 0, 1);
			border: 1px solid #FFF;
			box-shadow: 0px 6px #7859CC, 0px 0px 16px #7859CC;
			width: 10em;
			font-family: Heading;
			font-size: 2em;
			cursor: pointer;
			position: absolute;
			left: calc(19vw + 450px);
			top: calc(90vh - 380px);
			transition: 0.5s;
			text-align: left;
		}

		#back:hover {
			box-shadow: 0px 2px #7859CC, 0px 0px 64px #7859CC;
			top: calc(90vh - 375px);
		}
	</style>
</head>

<body>
	<div id="contentloader">
		<img id="loadtsuki" src="/res/img/loader/loadtsuki.png" />
		<img id="loadspin" src="/res/img/loader/loadspin.png" />
	</div>
	<style>
		#contentloader {
			position: fixed;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background-color: #000;
			z-index: 10000;
			transition: 0.2s;
		}

		#loadtsuki {
			position: absolute;
			left: calc(50% - 48px);
			top: calc(50% - 48px);
		}

		#loadspin {
			position: absolute;
			left: calc(50% - 46px);
			top: calc(50% - 47px);
			animation: LoaderSpin 2s infinite linear;
		}

		@keyframes LoaderSpin {
			0% {
				transform: rotate(0deg);
			}

			100% {
				transform: rotate(360deg);
			}
		}

		.destroyedloader {
			opacity: 0;
			pointer-events: none;
			transition: 0.5s !important;
		}

		.destroyedloader #loadtsuki {
			top: calc(50% - 100px);
			transition: 0.5s ease-in !important;
		}

		.destroyedloader #loadspin {
			top: calc(50% - 100px);
			transition: 0.5s ease-in !important;
		}
	</style>
	<script>
		window.addEventListener("load", function(event) {
			document.getElementById("contentloader").className = "destroyedloader";
			document.getElementById("loadspin").src = "/res/img/loader/loadfinish.png";
		});

		window.onbeforeunload = function() {
			document.getElementById("contentloader").classList.remove("destroyedloader");
			document.getElementById("loadspin").src = "/res/img/loader/loadspin.png";
		}
	</script>
	<div id="header">
		<div id="headerbar">
			<a href="/status.php"><img id="headerstatus" src="/res/img/headerbar/status-ok.png"></a> <img id="headerfade_left" src="/res/img/headerbar/fade-left.png">
			<marquee truespeed scrolldelay="30" scrollamount="3" id="headernews">
				<img class="newssep" src="/res/img/headerbar/sep.png">
				<p>Welcome to the TSUKI project's homepage</p>
				<img class="newssep" src="/res/img/headerbar/sep.png">
				<p style="color: lime">Registrations open</p>
				<img class="newssep" src="/res/img/headerbar/sep.png">
				<p style="color: lime">Gates open</p>
				<img class="newssep" src="/res/img/headerbar/sep.png">
				<p>4969 users registered</p>
				<img class="newssep" src="/res/img/headerbar/sep.png">
				<p>Latest news: &quot;Object assignment&quot;</p>
				<img class="newssep" src="/res/img/headerbar/sep.png">
				<p>Life is linked.</p>
				<img class="newssep" src="/res/img/headerbar/sep.png">
			</marquee>
		</div>
		<a href="/"><img id="knob" src="/res/img/headerbar/knobs/tsuki_knob.png" /></a>
		<a href="https://systemspace.link/"><img id="knob4" src="/res/img/headerbar/knobs/officialknob.png" /></a>
		<a href="/login.php"><img id="knob5" src="/res/img/headerbar/knobs/loginknob.png" /></a>
		<a href="/preferences.php"><img id="knob2" src="/res/img/headerbar/knobs/prefsknob.png" /></a>
	</div>
	<style>
		#header {
			position: relative;
			z-index: 1;
		}

		#headerbar {
			position: fixed;
			width: 100%;
			left: 0;
			top: 0;
			height: 20px;
			background-color: #000;
			box-shadow: 0px 1px #FFF, 0px 2px #000;
		}

		#headerstatus {
			position: fixed;
			left: 0;
			top: 0;
			z-index: 1;
		}

		#headerfade_left {
			position: fixed;
			left: 150px;
			top: 0px;
			z-index: 1;
		}

		#headernews {
			width: 100%;
			font-family: Heading;
			font-size: 16px;
			letter-spacing: -4px;
		}

		#headernews p {
			display: inline;
			position: relative;
			top: -2px;
		}

		#knob {
			position: fixed;
			left: 0;
			top: 20px;
		}

		#knob2 {
			position: fixed;
			right: 0;
			top: 20px;
		}

		#knob3 {
			position: fixed;
			right: 100px;
			top: 20px;
		}

		#knob4 {
			position: fixed;
			left: 200px;
			top: 20px;
		}

		#knob5 {
			position: fixed;
			left: 350px;
			top: 20px;
		}

		#knob6 {
			position: fixed;
			left: 460px;
			top: 20px;
		}

		#knob7 {
			position: fixed;
			left: 492px;
			top: 20px;
		}
	</style>

	<div id="intro">
		<h1></h1>
		<center>
			<h6>skip</h6>
		</center>
	</div>
	<div id="flyer"></div>
	<div id="wallpaper">
		<img id="lain" src="/res/img/others/lain.png" />
		<h1>Unlink the world.<br>Unlock the rest.</h1>
	</div>
	<div class="seperator"></div>
	<div class="padded">
		<h1>Welcome to the TSUKI project</h1>
		<p>This webpage has been made to facilitate the broadcasting of all TSUKI messages and to allow interaction between all registrants. A simple summary of the TSUKI project can be read below.</p>
	</div>
	<div class="seperate"></div>
	<div class="padded">
		<center>
			<div id="stats">
				<a id="regs" href="/listing.php">
					<h1><span style="color: yellow">4969</span> registrants</h1>
				</a>
				<a id="count" href="/calculator.php">
					<a href="zen.php">
						<h2 id="countdown" style="color: yellow">Connecting...</h2>
					</a>
					<h3>until unlink if no new registrants arrive</h3>
				</a>
				<a id="slots" href="/calculator.php">
					<h4><span id="slotsremaining" style="color: yellow">0</span> slots remaining</h4>
				</a>
				<a id="belief" class=overno>
					<h4 style="color:#FFF;"><span id="believers" style="color: yellow;">82.97</span>% believes</h4>
					<h3>of 1286 people who finished the survey</h3>
				</a>
			</div>
		</center>
	</div>
	<div class="seperate"></div>
	<div class="padded">
		<center>
			<a href="news.php">
				<h2 class="post-title">Object assignment</h2>
				<h3 class="post-date">17.06.17 from RISEN</h3>
			</a>
		</center>
	</div>
	<div class="seperate"></div>
	<div class="padded">
		<h1>This System is about to be purged</h1>
		<p>Systemspace, the construct to which all Systems (including your current System "<span style="color: yellow">Life</span>") belong has run out of Aurora due to extreme use by the System "<span style="color: yellow">Life</span>".
			<br>This System will be removed during the upgrade to Systemspace 2.0. We request that you <span style="color: red">leave this System</span>. This can be done by signing up <span style="color: red">before the time of unlink</span>. <span style="color: orange">This does NOT require you to kill yourself; you simply need to die (from any cause) after the deadline. We in charge of this process would like for you to live long and happy lives before this!</span>
		</p>
		<h1>A quick summary</h1>
		<p>You are currently in one of many Systems. Your System is called "<span style="color: yellow">Life</span>", but there are many more in existence.
			<br>This construct (called Systemspace) runs on a type of energy called <span style="color: cyan">Aurora</span>. There is only a limited amount of Aurora available to Systemspace. Because of this, we must manage how the Systems use Aurora, and ensure it is used correctly. If the Aurora is used incorrectly, then we reset the System.
		</p>
		<p>Unfortunately, the Life System seems unable to improve, regardless of the number of resets it undergoes. Due to the openness of Systemspace, we are forced to edit Systemspace in order to correct our path. As a result of this process, Life will <span style="color: red">be unlinked and purged</span>.</p>
		<p>Immediately following this, activity within Life will continue as normal; however, new bodies will no longer have souls, and the souls of bodies that die without having registered will soulshatter (as their soul is, subsequently, an Impossible Soul Structure). Souls that have registered will be moved, after death, to the "<span style="color: yellow">LFE</span>" System. After 150 years of severance, Life will be completely purged.</p>
	</div>
	<div class="seperate"></div>
	<div id="index">
	</div>
	<center>This site is intended as an archive of the version of systemspace.link that was up during 2017. Please visit <a class="link" href="/copyright.php">Copyright</a> for more information. - <a id="replay">replay intro</span></center>
</body>

</html>
