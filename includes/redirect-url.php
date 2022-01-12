<?php

function redirectURL($path){

header('Location: https://' . $_SERVER['SERVER_NAME'] . $path);

}	

?>