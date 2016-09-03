
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>One F Jef's passive Webhubpagething.</title>
	<link rel="stylesheet" href="css.css">
	<script type="text/javascript" src="/princess.js"></script>
	<script type="text/javascript">
	var princess = new Princess(
		{
			'onActive': 'hello',
			'onInactive': [ 'signing_out', null, null ],
			'masterVolume': 0.4,
			'idle': 10000,
			'suggestions': [
				"backup_vods",
				"dank_wall",
				"donate",
				"help",
				"patreon",
				"reading_list",
				"twitch"
			],
		}
	);
	</script>
</head>
<body onload="animate()">
	<canvas id="stars"></canvas>
	<div class="boxholder">

		<img class="jefsearch" src="jefPics/Face.png" alt="I like your face" onclick="princess.toggle()">
		<div id="Intro">
			Hi. I'm an internet. Welcome to me. Enjoy stuff and things.<br>
		</div>

		<div class="box" onmouseenter="princess.play( 'schedule' )" >
			<div class="title">Schedule</div>
			<div class="infos">
			<img src="schedule.png" alt="Time stuffs" id="schedule">
			</div>
		</div>
		<div class="box">
			<div class="title">Check your Social</div>
			<div class="infos">
				<a href="https://www.youtube.com/user/jefmajor" onmouseenter="princess.play( 'youtube' )"><img src="https://jefmajor.com/icon/4.png" alt="icon32" class="sqaresofinfo">Youtube</a>
				<a href="https://www.twitch.tv/jefmajor" onmouseenter="princess.play( 'twitch' )"><img src="https://jefmajor.com/icon/2.png" alt="icon4" class="sqaresofinfo">Twitch</a>
				<a href="https://twitter.com/jefmajor" onmouseenter="princess.play( 'twitter' )"><img src="https://jefmajor.com/icon/3.png" alt="icon3" class="sqaresofinfo">Twitter</a>
				<a href="https://www.patreon.com/jefmajor" onmouseenter="princess.play( 'patreon' )"><img src="https://jefmajor.com/icon/1.png" alt="alsoicon1" class="sqaresofinfo">Patreon</a>
			</div>
		</div>
		<div class="box"  onmouseenter="princess.play( 'donate' )">
			<div class="title">Donate by clicking the face</div>
			<div class="infos">
				<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=L34SSFMHQRHSQ" data-bindattr-1227="1227" class="link" target="_blank">
    					<img class="toobigdonationpicture" alt="donate" src="jefPics/Donate1.png" data-bindattr-1228="1228" onmouseover="this.src='jefPics/melady.png'"
onmouseout="this.src='jefPics/Donate1.png'">
  				</a>
			</div>
		</div>
		<div class="box">
			<div class="title">Memes and stuff</div>
			<div class="infos">
				<a href="https://jefmajor.com/wall/" onmouseenter="princess.play( 'dank_wall' )"><img src="https://jefmajor.com/icon/5.png" alt="alsoiconmeme" class="sqaresofinfo">Dank Wall</a>
				<a href="https://jefmajor.com/ReadingList/" onmouseenter="princess.play( 'reading_list' )"><img src="jefPics/Face.png" alt="alsoiconmeme" class="sqaresofinfo">Reading List</a>
				<a href="https://jefmajor.com/production/" onmouseenter="princess.play( 'under_production' )"><img src="jefPics/kappa.png" alt="alsoiconmeme" class="sqaresofinfo">Under production</a>
				<a href="https://jefmajor.com/Vods/"  onmouseenter="princess.play( 'backup_vods' )"><img src="https://jefmajor.com/icon/6.png" alt="alsoiconmeme" class="sqaresofinfo">Backup Vods</a>

				<a href="https://jefmajor.com/Quotes/"><img src="https://jefmajor.com/icon/badge.png" alt="quoteiconmeme" class="sqaresofinfo">Quotes</a>
			</div>
		</div>

		
	<div id="corner">
           <a href="mailto:mikael@rubixy.com?subject=MEOW!">Contact</a> 
           <a href="https://github.com/mikaelssen/Jefmajor.com">GitHub</a>
    </div>
	</div>

	<!--
		Meymeys
	-->


	<script src="Background.js"></script>
	<script type="text/javascript">
		var hello = new Audio( "/audio/hello.mp3" );
		var intro = new Audio( "/audio/intro.mp3" );
		var welcome = new Audio( "/audio/welcome.mp3" );

		hello.addEventListener( 'ended', function()
		{
			princess.play( 'intro' );
		}, false );

		intro.addEventListener( 'ended', function()
		{
			princess.play( 'welcome' );
		}, false );

		welcome.addEventListener( 'ended', function()
		{
			princess.play( 'help' );
		}, false );

		princess.set( "backup_vods", new Audio( "/audio/backup_vods.mp3" ) );
		princess.set( "dank_wall", new Audio( "/audio/dank_wall.mp3" ) );
		princess.set( "donate", new Audio( "/audio/donate.mp3" ) );
		princess.set( "hello", hello );
		princess.set( "help", new Audio( "/audio/help.mp3" ) );
		princess.set( "intro", intro );
		princess.set( "patreon", new Audio( "/audio/patreon.mp3" ) );
		princess.set( "reading_list", new Audio( "/audio/reading_list.mp3" ) );
		princess.set( "schedule", new Audio( "/audio/schedule.mp3" ) );
		princess.set( "signing_out", new Audio( "/audio/signing_out.mp3" ) );
		princess.set( "twitch", new Audio( "/audio/twitch.mp3" ) );
		princess.set( "twitter", new Audio( "/audio/twitter.mp3" ) );
		princess.set( "under_production", new Audio( "/audio/under_production.mp3" ) );
		princess.set( "welcome", welcome );
		princess.set( "youtube", new Audio( "/audio/youtube.mp3" ) );
	</script>
</body>
</html>
