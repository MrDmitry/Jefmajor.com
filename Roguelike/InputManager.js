function InputManager(){
    this.keys = [];
    //this.mousePressed = false;
    
    document.addEventListener("keydown", this.keyDown.bind(this), false);
    document.addEventListener("keyup", this.keyUp.bind(this), false);
}

InputManager.prototype.register = function(key){
    var keyType = typeof key;
    
    if(keyType === "string"){
        this.keys["key_" + key.charCodeAt(0).toString()] = false;
    }else if(keyType === "number"){
        this.keys["key_" + key.toString()] = false;
    }else{
        console.error("\"" + key + "\" IS NOT A VALID KEY.");
    }
}

InputManager.prototype.isKeyDown = function(key){
    result = false;
    
    if(typeof key === "string"){
        result = this.keys["key_" + key.charCodeAt(0).toString()];
    }else if(typeof key === "number"){
        result = this.keys["key_" + key.toString()];
    }else{
        console.error("\"" + key + "\" IS NOT A REGISTERED KEY.");
    }
    
    return result;
}

//InputManager.prototype.isMousePressed = function(){
//    return this.mousePressed;
//}
//
//InputManager.prototype.getMousePosition = function(){
//	var result = new Vector2();
//	
//	result.copy(this.position_mouse);
//	
//    return result;
//}

InputManager.prototype.keyDown = function(event){
    event = event || window.event;
    
    var characterCode = "key_" + (event.keyCode || event.which).toString();
    
    if(characterCode in this.keys){
        this.keys[characterCode] = true;
    }
}

InputManager.prototype.keyUp = function(event){
    event = event || window.event;
    
    var characterCode = "key_" + (event.keyCode || event.which).toString();
    
    if(characterCode in this.keys){
        this.keys[characterCode] = false;
    }
}
