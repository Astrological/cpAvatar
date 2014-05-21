<?php

/*
  
  -- Written by Astrological
  -- GitHub: https://github.com/Astrological/
  
*/

header('Content-Type: image/png');

// Cache the image
header('Cache-Control: max-age=31556926');

class penguinAvatar{
  private static $avatarArr = array();
  private static $avatarSize = null;
  
  public function __construct($avatarArr, $avatarSize){
    // Set the avatar array
    self::$avatarArr = $avatarArr;
    
    // Set avatar size
    self::$avatarSize = $avatarSize;
    
    self::createAvatar();
  }
  
  private function createAvatar(){
    $avatarMain = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . self::$avatarSize . '/' . self::$avatarArr[0] . '.png');
    
    imagealphablending($avatarMain, true);
    imagesavealpha($avatarMain, true);
    
    foreach(self::$avatarArr as $avatarItem){
      if($avatarItem !== self::$avatarArr[0]){
        $avatarMainItem = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . self::$avatarSize . '/' . $avatarItem . '.png');
        
        imagecopy($avatarMain, $avatarMainItem, 0, 0, 0, 0, self::$avatarSize, self::$avatarSize);
        
        // Flush
        flush();
        ob_flush();
      }
    }
    
    imagepng($avatarMain);
  }
}

// Get the information
$avatarArr = explode('|', $_GET['avatarInfo']);
$avatarSize = $_GET['avatarSize'];

// Call the penguinAvatar class
new penguinAvatar($avatarArr, $avatarSize);

?>
