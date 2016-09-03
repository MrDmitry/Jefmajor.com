<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Memes under production</title>
        <link rel="stylesheet" href="ssc.css">
        <script type="text/javascript" src="value.js"></script>
    </head>
    <body onload="main()">
        <canvas id="magic"></canvas>
        <script type="text/javascript">
        window.addEventListener( "resize", onWindowResize );

        var updateSize = [];

        function onWindowResize()
        {
            for ( obj in updateSize )
            {
                updateSize[obj].onWindowResize( window.innerWidth, window.innerHeight );
            }
        }

        function main()
        {
            var canvasObj = new Canvas( "magic" );

            updateSize.push( canvasObj );

            var bg = new DrawableImage(
                canvasObj,
                "bg.png",
                {
                    zIndex: 0,
                    onWindowResize: function()
                    {
                        if ( this.windowWidth / this.windowHeight >= this.width / this.height )
                        {
                            this.drawWidth = this.windowWidth;
                            this.drawHeight = this.height * this.drawWidth / this.width;
                        }
                        else
                        {
                            this.drawHeight = this.windowHeight;
                            this.drawWidth = this.width * this.drawHeight / this.height;
                        }
                    }
                }
            );

            updateSize.push( bg );

            var derp = new DrawableImageGrid(
                canvasObj,
                "derp.png",
                {
                    widthModifier: 0.2,
                    heightModifier: 0.2,
                    zIndex: 5,
                    onWindowResize: function()
                    {
                        var speed = 200;

                        this.speedX = - this.windowHeight / ( speed * this.windowHeight / this.windowWidth );
                        this.speedY = - this.windowWidth / ( speed * this.windowWidth / this.windowHeight );
                    }
                }
            );

            updateSize.push( derp );

            var airhorn = new DrawableImageRow(
                canvasObj,
                "airhorn.png",
                {
                    widthModifier: 0.2,
                    zIndex: 10,
                    onWindowResize: function()
                    {
                        this.y = this.windowHeight - this.drawHeight * 0.9;
                        this.speed = - this.windowWidth / 400;
                    }
                }
            );

            updateSize.push( airhorn );

            var badgeLeft = new DrawableImageColumn(
                canvasObj,
                "badge.png",
                {
                    widthModifier: 0.04,
                    zIndex: 20,
                    onWindowResize: function()
                    {
                        this.x = 0;
                        this.speed = this.windowHeight / 500;
                    }
                }
            );

            updateSize.push( badgeLeft );

            var badgeRight = new DrawableImageColumn(
                canvasObj,
                "badge.png",
                {
                    widthModifier: 0.04,
                    zIndex: 20,
                    onWindowResize: function()
                    {
                        this.x = this.windowWidth - this.drawWidth;
                        this.speed = this.windowHeight / 500;
                    }
                }
            );

            updateSize.push( badgeRight );

            onWindowResize();
        }
        </script>
        <!--




                                                  `-.`'.-'
                                               `-.        .-'.
                                            `-.    -./\.-    .-'
                                                -.  /_|\  .-
                                            `-.   `/____\'   .-'.
                                         `-.    -./.-""-.\.-      '
                                            `-.  /< (()) >\  .-'
                                          -   .`/__`-..-'__\'   .-
                                        ,...`-./___|____|___\.-'.,.
                                           ,-'   ,` . . ',   `-,
                                        ,-'   ________________  `-,
                                           ,'/____|_____|_____\
                                          / /__|_____|_____|___\
                                         / /|_____|_____|_____|_\
                                        ' /____|_____|_____|_____\
                                      .' /__|_____|_____|_____|___\
                                     ,' /|_____|_____|_____|_____|_\
        ,,---''--...___...--'''--.. /../____|_____|_____|_____|_____\ ..--```--...___...--``---,,
                                   '../__|_____|_____|_____|_____|___\
              \    )              '.:/|_____|_____|_____|_____|_____|_\               (    /
              )\  / )           ,':./____|_____|_____|_____|_____|_____\             ( \  /(
             / / ( (           /:../__|_____|_____|_____|_____|_____|___\             ) ) \ \
            | |   \ \         /.../|_____|_____|_____|_____|_____|_____|_\           / /   | |
         .-.\ \    \ \       '..:/____|_____|_____|_____|_____|_____|_____\         / /    / /.-.
        (=  )\ `._.' |       \:./ _  _ ___  ____ ____ _    _ _ _ _ _  _ ___\        | `._.' /(  =)
         \ (_)       )       \./                                            \       (       (_) /
          \    `----'         """"""""""""""""""""""""""""""""""""""""""""""""       `----'    /
           \   ____\__                                                              __/____   /
            \ (=\     \                     ILLUMINATI WAS HERE                    /     /-) /
             \_)_\     \                                                          /     /_(_/
                  \     \                                                        /     /
                   )     )  _                                                _  (     (
                  (     (,-' `-..__                                    __..-' `-,)     )
                   \_.-''          ``-..____                  ____..-''          ``-._/
                    `-._                    ``--...____...--''                    _.-'
                        `-.._                                                _..-'
                             `-..__                                    __..-'
                                   ``-..____                  ____..-''
                                            ``--...____...--''


                                             -->
    </body>
</html>
