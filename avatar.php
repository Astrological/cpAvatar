<?php

/*
  
  -- Written by Astrological
  -- GitHub: https://github.com/Astrological/
  
*/

header('Content-Type: image/png');

// Cache the image
header('Cache-Control: public');

class penguinAvatar{
  // More will be added soon
  
  public function createAvatar(array $avatarArr = [], $avatarSize){
    $avatarMain = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $avatarSize . '/' . $avatarArr[0] . '.png');
    
    imagesavealpha($avatarMain, true);
    
    foreach($avatarArr as $avatarItem){
      if($avatarItem !== $avatarArr[0]){
        $avatarMainItem = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $avatarSize . '/' . $avatarItem . '.png');
        
        imagecopy($avatarMain, $avatarMainItem, 0, 0, 0, 0, $avatarSize, $avatarSize);
      }
    }
    
    imagepng($avatarMain);
    imagedestroy($avatarMain);
  }
}

// Get the information
$avatarArr = explode('|', $_GET['avatarInfo']);
$avatarSize = $_GET['avatarSize'];

// Call the penguinAvatar class & Create the avatar image
$penguinAvatar = new penguinAvatar();
$penguinAvatar::createAvatar($avatarArr, $avatarSize);

?>
