<?php

/*
  
  -- Written by Astrological
  -- GitHub: https://github.com/Astrological/
  
*/

header('Content-Type: image/png');

// Cache the image
header('Cache-Control: max-age=31556926');

class penguinAvatar{
  // More will be added soon
  
  private function createAvatar(array $avatarArr = [], $avatarSize){
    $avatarMain = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $avatarSize . '/' . $avatarArr[0] . '.png');
    
    imagesavealpha($avatarMain, true);
    
    foreach($avatarArr as $avatarItem){
      if($avatarItem !== $avatarArr[0]){
        $avatarMainItem = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $avatarSize . '/' . $avatarItem . '.png');
        
        imagecopy($avatarMain, $avatarMainItem, 0, 0, 0, 0, $avatarSize, $avatarSize);
      }
    }
    
    imagepng($avatarMain);
  }
}

// Get the information
$avatarArr = explode('|', $_GET['avatarInfo']);
$avatarSize = $_GET['avatarSize'];

// Call the penguinAvatar class & Create the avatar image
$penguinAvatar = new penguinAvatar();
$penguinAvatar->createAvatar($avatarArr, $avatarSize);

?>
