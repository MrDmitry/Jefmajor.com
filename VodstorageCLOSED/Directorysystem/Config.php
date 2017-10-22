<?php

//Banned path words or signs
$pathreplace = array(".","..","'","\"");

//Weed removal
$weed = array(".","..","Directorysystem","robots.txt",".htaccess","Backups");

//video or music formats
$playable = array(".mp4",".avi",".wav",".mov",".mp2",".ogg",".mkv");

//Banned filetypes
$banned = array(".php",".jpg",".png",".html",".htm",".js",".exe",".vbs",".dll",".cmd",".bat",".db",".config",".web",".css",".torrent",".gitignore");

//Filetypes with images, else i'd use the UNKNOWN.gif thingy :3
$fileimages = array("rar","iso","gif","txt","docx","psd","ppt","mov","js","pdf","jpg","png","zip","xls","htm","html","mp4","mp3","mp2","flac","xml");

//Styles
$StyleSheets = array("Default");

//Root path to the filesiz
$rootpath = getcwd();

//Title of all the pages
$Title = "Jef's good o'l fasioned floppy storage online on the tubes library";

?>