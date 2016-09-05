var FRAMES_PER_SECOND = 30;

var KEYCODE = {
	SPACE: 32,
	ARROW_LEFT: 37,
    ARROW_UP: 38,
	ARROW_RIGHT: 39,
    ARROW_DOWN: 40,
	NUMPAD_0: 96,
	NUMPAD_1: 97,
	NUMPAD_2: 98,
	NUMPAD_3: 99,
	NUMPAD_4: 100,
	NUMPAD_5: 101,
	NUMPAD_6: 102,
	NUMPAD_7: 103,
	NUMPAD_8: 104,
	NUMPAD_9: 105
}

var stage = null;
var queue = null;
var inputManager = new InputManager();

var airhorn = null;

var manifest = [
	{
		src: "Images/airhorn.png",
		id: "airhorn"
	}
];

function main(canvasID){
	initialize(canvasID);
	loadAssets();
}

function initialize(canvasID){
	var canvas = document.getElementById(canvasID);
	
	stage = new createjs.Stage(canvas);
	
	stage.canvas.width = 1910;
	stage.canvas.height = 1070;
	
	stage.enableMouseOver();
	
	inputManager.register(KEYCODE.NUMPAD_1);
	inputManager.register(KEYCODE.NUMPAD_2);
	inputManager.register(KEYCODE.NUMPAD_3);
	inputManager.register(KEYCODE.NUMPAD_4);
	inputManager.register(KEYCODE.NUMPAD_5);
	inputManager.register(KEYCODE.NUMPAD_6);
	inputManager.register(KEYCODE.NUMPAD_7);
	inputManager.register(KEYCODE.NUMPAD_8);
	inputManager.register(KEYCODE.NUMPAD_9);
}

function loadAssets(){
	queue = new createjs.LoadQueue(true, "Assets/");
	
	queue.on(
		"complete",
		loadComplete,
		this
	);
	queue.loadManifest(manifest);
}

function loadComplete(){
	airhorn = new createjs.Bitmap(queue.getResult("airhorn"));
	airhorn.x = stage.canvas.width / 2;
	airhorn.y = stage.canvas.height / 2;
	airhorn.regX = airhorn.getBounds().width / 2;
	airhorn.regY = airhorn.getBounds().height / 2;
	airhorn.visible = true;
	
	stage.addChild(airhorn);
	
	createjs.Ticker.addEventListener("tick", update);
	createjs.Ticker.setFPS(FRAMES_PER_SECOND);
}

function update(){
	if(airhorn){
		
		if(inputManager.isKeyDown(KEYCODE.NUMPAD_8) || inputManager.isKeyDown(KEYCODE.NUMPAD_7) || inputManager.isKeyDown(KEYCODE.NUMPAD_9)){
			airhorn.y -= 5;
		}
		
		if(inputManager.isKeyDown(KEYCODE.NUMPAD_2) || inputManager.isKeyDown(KEYCODE.NUMPAD_1) || inputManager.isKeyDown(KEYCODE.NUMPAD_3)){
			airhorn.y += 5;
		}
		
		if(inputManager.isKeyDown(KEYCODE.NUMPAD_4) || inputManager.isKeyDown(KEYCODE.NUMPAD_7) || inputManager.isKeyDown(KEYCODE.NUMPAD_1)){
			airhorn.x -= 5;
		}
		
		if(inputManager.isKeyDown(KEYCODE.NUMPAD_6) || inputManager.isKeyDown(KEYCODE.NUMPAD_9) || inputManager.isKeyDown(KEYCODE.NUMPAD_3)){
			airhorn.x += 5;
		}
	}
	
	stage.update();
}
