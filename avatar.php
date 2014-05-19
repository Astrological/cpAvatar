<?php

/*
  
  -- Written by Astrological
  -- GitHub: https://github.com/Astrological/
  
*/

class penguinAvatar{
  private $avatarArr = array();
  private $avatarSize = null;
  private $avatarMain = null;
  
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
    
    imagealphablending($this->avatarMain, false);
    imagesavealpha($this->avatarMain, true);
    
    if(!empty($this->avatarArr[8])){
      $this->avatarMain = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[8] . '.png');
      
      $avatarMainColor = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[0] . '.png');
      
      imagecopy($this->avatarMain, $avatarMainColor, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    }
    else{
      $this->avatarMain = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[0] . '.png');
    }
    
    $avatarMainHead = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[1] . '.png');
    $avatarMainFace = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[2] . '.png');
    $avatarMainNeck = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[3] . '.png');
    $avatarMainBody = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[4] . '.png');
    $avatarMainHand = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[5] . '.png');
    $avatarMainFeet = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[6] . '.png');
    $avatarMainPin = imagecreatefrompng('http://media1.clubpenguin.com/avatar/paper/' . $this->avatarSize . '/' . $this->avatarArr[7] . '.png');
    
    imagecopy($this->avatarMain, $avatarMainHead, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    imagecopy($this->avatarMain, $avatarMainFace, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    imagecopy($this->avatarMain, $avatarMainNeck, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    imagecopy($this->avatarMain, $avatarMainBody, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    imagecopy($this->avatarMain, $avatarMainHand, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    imagecopy($this->avatarMain, $avatarMainFeet, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    imagecopy($this->avatarMain, $avatarMainPin, 0, 0, 0, 0, $this->avatarSize, $this->avatarSize);
    
    header('Content-Type: image/png');
    
    imagepng($this->avatarMain);
  }
}

// Get the information
$avatarArr = explode('|', $_GET['avatarInfo']);
$avatarSize = $_GET['avatarSize'];

// Call the penguinAvatar class
new penguinAvatar($avatarArr, $avatarSize);

?>
