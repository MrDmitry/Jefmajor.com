(function () {
    var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame || function (callback) {
        window.setTimeout(callback, 1000 / 60);
    };
    window.requestAnimationFrame = requestAnimationFrame;
})();

// Canvas

function Canvas( canvasId )
{
    this.canvas = document.getElementById( canvasId );
    this.ctx = this.canvas.getContext( "2d" );

    this.entities = [];

    this.animate();
}

Canvas.prototype.animate = function()
{
    this.ctx.clearRect( 0, 0, this.canvas.width, this.canvas.height );

    for ( obj in this.entities )
    {
        this.entities[obj].draw.call();
    }

    requestAnimationFrame( this.animate.bind( this ) );
}

Canvas.prototype.AddEntity = function( entity )
{
    this.entities.push( entity );
    this.entities.sort( function( a, b ){ return a.zIndex > b.zIndex; } );
}

Canvas.prototype.onWindowResize = function( width, height )
{
    this.canvas.width = width;
    this.canvas.height = height;
}

// Entity

function Entity( drawRoutine, zIndex )
{
    this.draw = drawRoutine;

    this.windowWidth = 0;
    this.windowHeight = 0;

    this.zIndex = zIndex;
}

Entity.prototype.onWindowResize = function( width, height )
{
    this.windowWidth = width;
    this.windowHeight = height;
}

// DrawableImage extends Entity

function DrawableImage( canvasObj, url, options )
{
    Entity.call( this, this.draw.bind( this ) );

    this.x = 0;
    this.y = 0;

    this.width = 0;
    this.height = 0;

    this.drawWidth = 0;
    this.drawHeight = 0;

    this.zIndex = options.zIndex;

    if ( typeof this.zIndex == 'undefined' )
    {
        this.zIndex = 0;
    }

    this.widthModifier = options.widthModifier;
    this.heightModifier = options.heightModifier;

    this.onWindowResizeCallback = options.onWindowResize;

    this.image = new Image();
    this.image.onload = this.onload.bind( this );
    this.image.src = url;

    this.canvasObj = canvasObj;
}

DrawableImage.prototype = Object.create( Entity.prototype );

DrawableImage.prototype.onWindowResize = function( width, height )
{
    Entity.prototype.onWindowResize.call( this, width, height );

    if ( typeof this.widthModifier != 'undefined' )
    {
        this.drawWidth = this.windowWidth * this.widthModifier;
    }

    if ( typeof this.heightModifier != 'undefined' )
    {
        this.drawHeight = this.windowHeight * this.heightModifier;

        if ( typeof this.widthModifier == 'undefined' )
        {
            this.drawWidth = this.width * this.drawHeight / this.height;
        }
    }
    else if ( typeof this.widthModifier != 'undefined' )
    {
        this.drawHeight = this.height * this.drawWidth / this.width;
    }

    if ( typeof this.widthModifier == 'undefined' && typeof this.heightModifier == 'undefined' )
    {
        this.drawWidth = width;
        this.drawHeight = height;
    }

    if ( typeof this.onWindowResizeCallback != 'undefined' )
    {
        this.onWindowResizeCallback();
    }
}

DrawableImage.prototype.onload = function( event )
{
    this.width = this.image.width;
    this.height = this.image.height;

    this.canvasObj.AddEntity( this );

    this.onWindowResize( this.windowWidth, this.windowHeight );
}

DrawableImage.prototype.draw = function()
{
    this.canvasObj.ctx.drawImage(
        this.image,
        this.x,
        this.y,
        this.drawWidth,
        this.drawHeight );
}

// DrawableImageColumn

function DrawableImageColumn( canvasObj, url, options, updateX )
{
    DrawableImage.call( this, canvasObj, url, options );

    this.speed = options.speed;

    if ( typeof this.speed == 'undefined' )
    {
        this.speed = 0;
    }

    this.offset = 0;

    this.updateX = updateX;
}

DrawableImageColumn.prototype = Object.create( DrawableImage.prototype );

DrawableImageColumn.prototype.draw = function()
{
    var images = Math.ceil( this.windowHeight / this.drawHeight ) + 2;
    var offsetY = this.offset - this.drawHeight;

    for ( var i = 0; i < images; ++i )
    {
        this.canvasObj.ctx.drawImage(
            this.image,
            this.x,
            this.y + offsetY,
            this.drawWidth,
            this.drawHeight );

        offsetY += this.drawHeight;
    }

    this.offset += this.speed;
    this.offset %= this.drawHeight;
}

// DrawableImageRow

function DrawableImageRow( canvasObj, url, options )
{
    DrawableImage.call( this, canvasObj, url, options );

    this.speed = options.speed;

    if ( typeof this.speed == 'undefined' )
    {
        this.speed = 0;
    }

    this.offset = 0;
}

DrawableImageRow.prototype = Object.create( DrawableImage.prototype );

DrawableImageRow.prototype.draw = function()
{
    var images = Math.ceil( this.windowWidth / this.drawWidth ) + 2;
    var offsetX = this.offset - this.drawWidth;

    for ( var i = 0; i < images; ++i )
    {
        this.canvasObj.ctx.drawImage(
            this.image,
            this.x + offsetX,
            this.y,
            this.drawWidth,
            this.drawHeight );

        offsetX += this.drawWidth;
    }

    this.offset += this.speed;
    this.offset %= this.drawWidth;
}

// DrawableImageGrid

function DrawableImageGrid( canvasObj, url, options )
{
    DrawableImage.call( this, canvasObj, url, options );

    this.speedX = options.speedX;
    this.speedY = options.speedY;

    if ( typeof this.speedX == 'undefined' )
    {
        this.speedX = 0;
    }

    if ( typeof this.speedY == 'undefined' )
    {
        this.speedY = 0;
    }

    this.offsetX = 0;
    this.offsetY = 0;
}

DrawableImageGrid.prototype = Object.create( DrawableImage.prototype );

DrawableImageGrid.prototype.draw = function()
{
    var rows = Math.ceil( this.windowHeight / this.drawHeight ) + 2;
    var columns = Math.ceil( this.windowWidth / this.drawWidth ) + 2;

    var offsetY = this.offsetY - this.drawHeight;

    for ( var row = 0; row < rows; ++row )
    {
        var offsetX = this.offsetX - this.drawWidth;

        for ( var col = 0; col < columns; ++col )
        {
            this.canvasObj.ctx.drawImage(
                this.image,
                this.x + offsetX,
                this.y + offsetY,
                this.drawWidth,
                this.drawHeight );

            offsetX += this.drawWidth;
        }

        offsetY += this.drawHeight;
    }

    this.offsetY += this.speedY;
    this.offsetY %= this.drawHeight;

    this.offsetX += this.speedX;
    this.offsetX %= this.drawWidth;
}
