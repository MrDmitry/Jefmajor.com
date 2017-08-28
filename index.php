<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="Webhub for JefMajor, a Twitch streamer, Youtuber, and certified meme expert.">
  <meta keywords="Twitch,Youtube,Jef,Jefmajor,OneFjef,SS13,Dwarf Fortress,Memes,Airhorn,silent storm">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jefmajor.com</title>
  <link rel="stylesheet" href="static/css/bootstrap.min.css">
  <link rel="stylesheet" href="static/css/main.css">
  <script type="text/javascript" src="static/js/princess.js"></script>
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

  <div class="container boxholder">

    <div class="row">
      <div class="col-xs-12">
        <img class="jefsearch" src="jefPics/Face.png" alt="I like your face" onclick="princess.toggle()">
        <div id="Intro">Hi. I'm an internet. Welcome to me. Enjoy stuff and things.<br></div>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" id="schedule">
        <div class="info-title">
          <a href="#schedule">Schedule</a>
        </div>
        <div class="info-container"></div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" id="social">
        <div class="info-title">
          <a href="#social">Check your Social</a>
        </div>
        <div class="info-container">
          <a href="http://www.youtube.com/user/jefmajor" class="external-link" onmouseenter="princess.play( 'youtube' )">
            <img src="http://jefmajor.com/icon/4.png" alt="icon32" class="sqaresofinfo">Youtube
          </a>
          <a href="http://www.twitch.tv/jefmajor" class="external-link" onmouseenter="princess.play( 'twitch' )">
            <img src="http://jefmajor.com/icon/2.png" alt="icon4" class="sqaresofinfo">Twitch
          </a>
          <a href="http://twitter.com/jefmajor" class="external-link" onmouseenter="princess.play( 'twitter' )">
            <img src="http://jefmajor.com/icon/3.png" alt="icon3" class="sqaresofinfo">Twitter
          </a>
          <a href="http://www.patreon.com/jefmajor" class="external-link" onmouseenter="princess.play( 'patreon' )">
            <img src="http://jefmajor.com/icon/1.png" alt="alsoicon1" class="sqaresofinfo">Patreon
          </a>
          <a href="http://www.reddit.com/r/onefjef" class="external-link">
            <img src="http://jefmajor.com/icon/7.png" alt="alsoicon1" class="sqaresofinfo">Unofficial Reddit
          </a>
          <a href="https://discord.gg/H97cHqF" class="external-link">
            <img src="http://jefmajor.com/icon/8.png" alt="alsoicon1" class="sqaresofinfo">Discord
          </a>

          
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" id="donate">
        <div class="info-title">
          <a href="#donate">Donate by clicking the face</a>
        </div>
        <div class="info-container">
          <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=L34SSFMHQRHSQ" data-bindattr-1227="1227" class="link" target="_blank">
            <img class="cover" alt="donate" src="jefPics/Donate1.png" data-bindattr-1228="1228" onmouseover="this.src='jefPics/melady.png'" onmouseout="this.src='jefPics/Donate1.png'">
          </a>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" id="memes">
        <div class="info-title">
          <a href="#memes">Memes and stuff</a>
        </div>
        <div class="info-container">
          <a href="http://jefmajor.com/wall/" class="internal-link" onmouseenter="princess.play( 'dank_wall' )">
            <img src="http://jefmajor.com/icon/5.png" alt="alsoiconmeme" class="sqaresofinfo">Dank Wall
          </a>
          <a href="http://jefmajor.com/ReadingList/" class="internal-link" onmouseenter="princess.play( 'reading_list' )">
            <img src="jefPics/Face.png" alt="alsoiconmeme" class="sqaresofinfo">Reading List
          </a>
          <a href="http://jefmajor.com/production/" class="internal-link" onmouseenter="princess.play( 'under_production' )">
            <img src="jefPics/kappa.png" alt="alsoiconmeme" class="sqaresofinfo">Under productio
          </a>
          <a href="duck/" class="internal-link" onmouseenter="princess.play( 'duck' )">
            <img src="duck/duck.png" alt="alsoiconmeme" class="sqaresofinfo">Duck Norris
          </a>
          <a href="http://jefmajor.com/Vodstorage/" class="internal-link" onmouseenter="princess.play( 'backup_vods' )">
            <img src="http://jefmajor.com/icon/6.png" alt="alsoiconmeme" class="sqaresofinfo">Backup Vods
          </a>
          <a href="http://jefmajor.com/Quotes/" class="internal-link">
            <img src="http://jefmajor.com/icon/badge.png" alt="quoteiconmeme" class="sqaresofinfo">Quotes
          </a>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="footer">
            <a href="mailto:mikael@rubixy.com?subject=MEOW!">Contact</a> 
            <a href="https://github.com/mikaelssen/Jefmajor.com">GitHub</a>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!--
      Meymeys
  -->

  <script src="static/js/Background.js"></script>
  <script type="text/javascript">
    var hello = new Audio( "audio/hello.mp3" );
    var intro = new Audio( "audio/intro.mp3" );
    var welcome = new Audio( "audio/welcome.mp3" );

    hello.addEventListener( 'ended', function() {
      princess.play( 'intro' );
    }, false );

    intro.addEventListener( 'ended', function() {
      princess.play( 'welcome' );
    }, false );

    welcome.addEventListener( 'ended', function() {
      princess.play( 'help' );
    }, false );

    princess.set( "backup_vods", new Audio( "audio/backup_vods.mp3" ) );
    princess.set( "dank_wall", new Audio( "audio/dank_wall.mp3" ) );
    princess.set( "donate", new Audio( "audio/donate.mp3" ) );
    princess.set( "hello", hello );
    princess.set( "help", new Audio( "audio/help.mp3" ) );
    princess.set( "intro", intro );
    princess.set( "patreon", new Audio( "audio/patreon.mp3" ) );
    princess.set( "reading_list", new Audio( "audio/reading_list.mp3" ) );
    princess.set( "schedule", new Audio( "audio/schedule.mp3" ) );
    princess.set( "signing_out", new Audio( "audio/signing_out.mp3" ) );
    princess.set( "twitch", new Audio( "audio/twitch.mp3" ) );
    princess.set( "twitter", new Audio( "audio/twitter.mp3" ) );
    princess.set( "under_production", new Audio( "audio/under_production.mp3" ) );
    princess.set( "welcome", welcome );
    princess.set( "youtube", new Audio( "audio/youtube.mp3" ) );
    princess.set( "duck", new Audio( "duck/quack.wav" ) );
  </script>
</body>
</html>
