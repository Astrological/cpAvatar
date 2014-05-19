<?php

/*
  
  -- Written by Astrological
  -- GitHub: https://github.com/Astrological/
  
*/

header('Cache-Control: max-age=31556926');

class penguinAvatar{
  private $avatarArr = array();
  private $avatarSize = null;
  
  public function __construct($avatarArr, $avatarSize){
    // Set the avatar array
    $this->avatarArr = $avatarArr;
    
    // Set avatar size
    $this->avatarSize = $avatarSize;
    
    $this->createAvatar();
  }
  
  public function createAvatar(){
    $avatarMain = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[0] . '.png');
    
    imagealphablending($avatarMain, true);
    imagesavealpha($avatarMain, true);
    
    foreach($this->avatarArr as $avatarItem){
      if($avatarItem !== $this->avatarItem[0]){
        $avatarMainItem = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $avatarItem . '.png');
        
        imagecopy($avatarMain, $avatarMainItem, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
      }
    }
    
    header('Content-Type: image/png');
    
    imagepng($avatarMain);
  }
}

// Get the information
$avatarArr = explode('|', $_GET['avatarInfo']);
$avatarSize = $_GET['avatarSize'];

// Call the penguinAvatar class
new penguinAvatar($avatarArr, $avatarSize);

?>
