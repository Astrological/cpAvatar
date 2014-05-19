<?php

/*
  
  -- Written by Astrological
  -- GitHub: https://github.com/Astrological/
  
*/

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
    /*
      $this->avatarArr[0] - Color
      $this->avatarArr[1] - Head
      $this->avatarArr[2] - Face
      $this->avatarArr[3] - Neck
      $this->avatarArr[4] - Body
      $this->avatarArr[5] - Hand
      $this->avatarArr[6] - Feet
      $this->avatarArr[7] - Pin
      $this->avatarArr[8] - Background
    */
    
    if(!empty($this->avatarArr[8])){
      $avatarMain = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[8] . '.png');
      
      $avatarMainColor = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[0] . '.png');
      
      imagecopy($avatarMain, $avatarMainColor, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    }
    else{
      $avatarMain = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[0] . '.png');
    }
    
    imagealphablending($avatarMain, true);
    imagesavealpha($avatarMain, true);
    
    $avatarMainHead = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[1] . '.png');
    $avatarMainFace = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[2] . '.png');
    $avatarMainNeck = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[3] . '.png');
    $avatarMainBody = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[4] . '.png');
    $avatarMainHand = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[5] . '.png');
    $avatarMainFeet = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[6] . '.png');
    $avatarMainPin = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[7] . '.png');
    
    imagecopy($avatarMain, $avatarMainHead, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    imagecopy($avatarMain, $avatarMainFace, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    imagecopy($avatarMain, $avatarMainNeck, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    imagecopy($avatarMain, $avatarMainBody, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    imagecopy($avatarMain, $avatarMainHand, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    imagecopy($avatarMain, $avatarMainFeet, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    imagecopy($avatarMain, $avatarMainPin, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    
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
