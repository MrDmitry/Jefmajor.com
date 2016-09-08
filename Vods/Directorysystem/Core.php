<script>
function goBack() {
    window.history.back()
}
</script>
<?php
require "Config.php";


//////////////////////Functions Below Here/////////////////////

/**
 * [printfiles description]
 * Prints the files in a form
 * @param  string $input
 * @return Void
 */
function printfiles($input = ""){
	formatfiles(getdircontent($input,0));
}

/**
 * [printfilesJSON description]
 * Prints the files in pure JSON
 * @param  string $input
 * @return Void
 */
function printfilesJSON($input = ""){
	echo json_encode(filter(getdircontent($input,0)),JSON_PRETTY_PRINT);
}

/**
 * [filter description] 
 * Formats the JSON
 * @param  $array
 * @return returns array
 */
function filter($array){
	global $banned, $weed; //get config vars
	$narray[] = "JSON DUMP";

	if (count($array) > 2) {
		$count = 0;

		foreach($array as $i){
			if(!in_array($i,$weed)){//remove weeds, like .. and . (movement dirs)
				if(!in_array(".".end(explode(".",$i)),$banned)){ // split file at .   Check if last . content is in array
					$type = (is_dir($i)) ? "directory" : "file" ;//checks if dir or not.
					(strstr($i,"+")) ? $i = safenamefileifwrong($i) : false; //Rename file before listing if it contains evil + signs.
					array_push($narray, $i);	
					$count++; // only add if the file is actually a dir or file.
				}
			}
		}
	}
	return $narray;
}




/**
 * [formatfiles description] 
 * Formats the dir and neatly echos it out
 * @param  $array
 * @return Echos out the file array
 */
function formatfiles($array){
	global $banned, $weed, $playable; //get config vars
	if (count($array) > 2) {
		$count = 0;
		foreach($array as $i){
			if(!in_array($i,$weed)){//remove weeds, like .. and . (movement dirs)
				if(!in_array(".".end(explode(".",$i)),$banned)){ // split file at .   Check if last . content is in array
					$type = (is_dir($i)) ? "directory" : "file" ;//checks if dir or not.

					(strstr($i,"+")) ? $i = safenamefileifwrong($i) : false; //Rename file before listing if it contains evil + signs.	

					echo  '<div class="list">'.geticon($i).'<a href="'.islinkable($i).'">'.$i; //prints the thing out
					echo "</a></div>";
					$count++; // only add if the file is actually a dir or file.
				}
			}
		}
/*		echo "There's ".$count." files/folders in this directory.";*/
		echo "<br><br>".$count." files/folders in this directory.";
	}else{
		echo'<div class="list" >Empty Folder. Put some files here :) </div>';
	}
}


/**
 * [getdircontent description]
 * Reutns dir array from $path, sort(1 or 0 - desc/asc)
 * @param  string  $path
 * @param  integer $sort
 * @return array
 */
function getdircontent($path="",$sort = 0){
	//Sets path to defined path, else it will return rootpath.
	global $rootpath;
	//$path = ($path != "") ? strip($path) : $rootpath; //original, new one is sorta better, redirects on error.

	if($path != "" && is_dir($path)){
		$path = strip($path);  
	}elseif(!is_dir($path) && $path != ""){
		echo '<meta http-equiv="refresh" content="0;url=/" />';
	}else {
		$path = $rootpath;
	}
	error_reporting(0);
	$res =  scandir($path,$sort);
	error_reporting(1);
	return $res;
}

/**
 * [selectstylesheet description]
 * Selects stylesheet from input, and returns it as a string.
 * @param  string $style
 * @return string
 */
function selectstylesheet($style = "Default"){
	global $StyleSheets;
	$first = '<LINK href="Directorysystem/Styles/';
	$secound = '.css" rel="stylesheet" type="text/css">';
	in_array($style, $StyleSheets) ? $ret = $first.$style.$secound : $ret = $first."Default".$secound;
	return $ret;
}

/**
 * [printarray description]
 * Prints formatted array
 * @param  $arr
 * @return void
 */
function printarray($arr){
	print "<pre>";
	print_r($arr);
	print "</pre>";
}

/**
 * [safenamefileifwrong description]
 * Renames inputted filenames if they contain + or #
 * TODO: use config.php and add a letter blacklist.
 * @param  string $file
 * @return string
 */
function safenamefileifwrong($file){	
	$newname = str_replace("+", "_", $file);
	$newname = str_replace("#", "_", $file);
	$newname = str_replace("'", "", $file);
	return (rename($file, $newname)) ? $newname : $file;
}


/**
 * [islinkable description]
 * Check if file is dir or file, and tag it approperatly.
 * @param  string $checkme
 * @return string
 */
function islinkable($checkme){ 
	if (isset($_GET["dir"]) && $_GET["dir"] != null && $_GET["dir"] != "" ) { //check if the get is set, and if it is, check if it's not retarded.
		$returnmeh = (is_dir_smart($checkme)) ? '?dir='.$_GET["dir"]."/".urlencode($checkme) : $_GET["dir"]."/".$checkme;
	}else{
		$returnmeh = (is_dir_smart($checkme)) ? '?dir='.urlencode($checkme) : $checkme;
	}
	return $returnmeh;
}

/**
 * [is_dir_smart description]
 * Checks input string url with curr get string, and sees if it's actually set
 * and that it's not retarded in any way.
 * @param  string  $checkme
 * @return boolean
 */
function is_dir_smart($checkme){
	if (isset($_GET["dir"]) && $_GET["dir"] != null && $_GET["dir"] != "" ) { //check if the get is set, and if it is, check if it's not retarded.
		$returnmeh = (!is_file($_GET["dir"]."/".$checkme)) ? true : false;
	}else{
		$returnmeh = !is_file($checkme);
	}
	return $returnmeh;
}

/**
 * [geticon description]
 * checks a .string with global config's image list
 * @param  String $checkme
 * @return String
 */
function geticon($checkme){
	global $fileimages; //init global array from config.
	$ending = end(explode(".",$checkme));
	if (in_array($ending,$fileimages)) { //split the string, return last stuffs after. and compare with array, then make choice. else make it print unknown type.
		$returnmeh = '<img src="Directorysystem/Images/Filetypes/'.$ending.'.gif" alt="Filetype" width="16" height="16">';
	}elseif (is_dir_smart($checkme)) {
/*		$returnmeh = '<img src="directorysystem/Images/Filetypes/folder.gif" alt="Folder" width="16" height="16">';*/
		$returnmeh = '<img src="Directorysystem/Images/Filetypes/folder.gif" alt="Folder" title="Folder" width="16" height="16">';
	}else{
		$returnmeh = '<img src="Directorysystem/Images/Filetypes/unknown.gif" alt="Filetype" width="16" height="16">';
	}
	return $returnmeh;
}


/**
 * [ispair description]
 * return a mod of 2 from input
 * @param  int $checkme
 * @return int
 */
function ispair($checkme){
	return $checkme % 2;
}

/**
 * [endsWith description]
 * Check if haystack contains needle
 * if $sub is inside $str
 * @param  String $str
 * @param  String $sub
 * @return Boolean
 */
function endsWith( $str, $sub ) { //pasta code
	return ( substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub );
}

/**
 * [strip description]
 * Takes url, strips from config.php blacklist
 * @param  String $input
 * @return String
 */
function strip($input){
	global $pathreplace; //Gotta init it in here due to function shait.
	return str_replace($pathreplace,"",$input);
}

?>