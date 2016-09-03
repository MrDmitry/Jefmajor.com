var width = window.innerWidth;
var height = window.innerHeight;
var canvas = document.getElementById("stars");
var ctx = canvas.getContext("2d");
canvas.width = width;
canvas.height = height;
var shootingstarcount = 2;
var StarSpeedModifier = .15;

(function () {
	var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame || function (callback) {
    	window.setTimeout(callback, 1000 / 60);
    };
	window.requestAnimationFrame = requestAnimationFrame;
})();


bgCtx = ctx;
bgCtx.fillStyle = '#000';
bgCtx.fillRect(0, 0, width, height);

function Star(options) {
  this.size = Math.random() * 2;
	this.speed = Math.random() * StarSpeedModifier;
	this.x = options.x;
	this.y = options.y;
}

Star.prototype.reset = function () {
  	this.size = Math.random() * 2;
  	this.speed = Math.random() * StarSpeedModifier;
  	this.x = width;
  	this.y = Math.random() * height;
}

Star.prototype.update = function () {
  	this.x -= this.speed;
  	if (this.x < 0) {
      	this.reset();
  	} else {
      	bgCtx.fillRect(this.x, this.y, this.size, this.size);
  	}
}

function ShootingStar() {
  	this.reset();
}

ShootingStar.prototype.reset = function () {
  	this.x = Math.random() * width;
  	this.y = 0;
  	this.len = (Math.random() * 80) + 10;
  	this.speed = (Math.random() * 10) + 6;
  	this.size = (Math.random() * 1) + 0.1;
  	this.waitTime = new Date().getTime() + (Math.random() * 3000) + 500;
  	this.active = false;
}

ShootingStar.prototype.update = function () {
	if (this.active) {
      	this.x -= this.speed;
      	this.y += this.speed;
      	if (this.x < 0 || this.y >= height) {
          	this.reset();
      	} else {
          	bgCtx.lineWidth = this.size;
          	bgCtx.beginPath();
          	bgCtx.moveTo(this.x, this.y);
          	bgCtx.lineTo(this.x + this.len, this.y - this.len);
          	bgCtx.stroke();
      	}
  	} else {
      	if (this.waitTime < new Date().getTime()) {
          	this.active = true;
      	}
  	}
}

var entities = [];
//make stars
for (var i = 0; i < height; i++) {
  	entities.push(new Star({
      	x: Math.random() * width,
      	y: Math.random() * height
  	}));
}

//make falling fun "stars"
for (var i = 0; i < shootingstarcount; i++) {
	entities.push(new ShootingStar());
	entities.push(new ShootingStar());
};


//animate background
function animate() {

	  bgCtx.fillStyle = '#110E19';
  	bgCtx.fillRect(0, 0, width, height);
  	bgCtx.fillStyle = '#ffffff';
  	bgCtx.strokeStyle = '#ffffff';

  	var entLen = entities.length;

  	while (entLen--) {
    	entities[entLen].update();
  	}
  	requestAnimationFrame(animate);
}
