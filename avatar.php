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
  
  public function createAvatar(array $avatarArr = [], $avatarSize = null){
    $avatarMainHeaders = get_headers('http://media1.clubpenguin.com/avatar/paper/' . $avatarSize . '/' . $avatarArr[0] . '.png');
    
    if($avatarMainHeaders[0] == 'HTTP/1.0 200 OK'){
      $avatarMain = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $avatarSize . '/' . $avatarArr[0] . '.png');
      
      foreach($avatarArr as $avatarItem){
        $avatarItemHeaders = get_headers('http://media1.clubpenguin.com/avatar/paper/' . $avatarSize . '/' . $avatarItem . '.png');
        
        if($avatarItemHeaders[0] == 'HTTP/1.0 200 OK'){
          if($avatarItem !== $avatarArr[0]){
            $avatarMainItem = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $avatarSize . '/' . $avatarItem . '.png');
            
            imagecopy($avatarMain, $avatarMainItem, 0, 0, 0, 0, $avatarSize, $avatarSize);
          }
        }
      }
      
      imagesavealpha($avatarMain, true);
      imagepng($avatarMain);
      imagedestroy($avatarMain);
    }
  }
}

// Get the information
$avatarArr = explode('|', $_GET['avatarInfo']);
$avatarSize = $_GET['avatarSize'];

// Define the penguinAvatar class & Create the avatar image
$penguinAvatar = new penguinAvatar();
$penguinAvatar::createAvatar($avatarArr, $avatarSize);

?>
