function Princess( options )
{
	this.library = {};
	this.active = false;

	this.onActive = options.onActive;
	this.onInactive = options.onInactive;
	this.idleTimeout = typeof options.idle != 'undefined' ? options.idle : 10000;
	this.suggestions = options.suggestions;
}

function getRandomValue( arr )
{
	return arr[ Math.floor( Math.random() * arr.length ) ];
}

Princess.prototype.heartbeat = function()
{
	this.killTimer();

	var hook = this;

	this.idleTimer = setTimeout( function()
	{
		hook.play( getRandomValue( hook.suggestions ) );
	}, this.idleTimeout);
}

Princess.prototype.killTimer = function()
{
	if( this.idleTimer )
	{
		clearTimeout( this.idleTimer );
	}
}

Princess.prototype.toggle = function()
{
	if( this.active )
	{
		if( typeof this.onInactive == 'object' )
		{
			this.play( getRandomValue( this.onInactive ) );
		}
		else if( typeof this.onInactive == 'string' )
		{
			this.play( this.onInactive );
		}
	}

	this.active = !this.active;

	if( this.active )
	{
		if( typeof this.onActive == 'object' )
		{
			this.play( getRandomValue( this.onActive ) );
		}
		else if( typeof this.onActive == 'string' )
		{
			this.play( this.onActive );
		}
	}
	else
	{
		this.stopAll();
		this.killTimer();
	}
}

Princess.prototype.play = function( key )
{
	if( this.active && typeof this.library[key] != 'undefined' )
	{
		var track = this.library[key];

		if( track.paused )
		{
			this.stopAll();

			track.play();
		}
	}
}

Princess.prototype.stop = function( key )
{
	if( typeof this.library[key] != 'undefined' )
	{
		var track = this.library[key];

		track.pause();
		track.currentTime = 0;
	}
}

Princess.prototype.stopAll = function()
{
	for( var i in this.library )
	{
		if( !this.library[i].paused &&
			( this.active ||
				( !this.active &&
					( typeof this.onInactive == 'string' && i != this.onInactive ) ||
					( typeof this.onInactive == 'object' && !this.onInactive.some( function( item ){ return item == i; } ) ) ) )
			)
		{
			this.stop( i );
		}
	}
}

Princess.prototype.set = function( key, value )
{
	this.library[key] = value;

	var hook = this;

	value.addEventListener( 'timeupdate', function()
	{
		hook.heartbeat();
	}, false);
}

Princess.prototype.get = function( key )
{
	return this.library[key];
}
