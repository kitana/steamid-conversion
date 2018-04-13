<?php
/* 
 * File: steamid-conversion.php
 * Name: Tricia C
 * Desc: Utilizing arrays to subtract very long integers on a 
 *       32bit system.  
 * Usage: User can convert steamID64 to steamID32.
 * Pre: 17 digit steamid64
 * Post: varying range integer starting from 4 digits and greater.
 * TODO: clean up in general, more comment, turn while into function, change to function the formatted steamID32, also rename some variables.
*/

  //Base steamID string to subtract from.
  $valveid = '76561197960265728';
  
  //Convert string into an array of digits.
  $valveid = str_split($valveid);
  
  //Repeat for your steamID.
  $steamid = '765611971234567890';
  $sid = str_split($steamid);
  
  //Prep counter, count 
  $counter = count($valveid) - 1;
  
	//$randomcount = $counter -1;
    $remainder = '';
		  
  while ($randomcount >= 0) {
	  
      $pid = $sid[$randomcount];
	  $vid = $valveid[$randomcount];	  
      $randomcount--;	
      	
        if($remainder == ''){ //begin
          if($pid < $vid){
            $remainder = 1;
            $nextdigit = 10 + $pid - $vid;        
          }else{
            $remainder = '';
            $nextdigit = $pid - $vid;        
          }
        }else{
          $pid -= 1;
          if($pid < $vid){
            $remainder = 1;
            $nextdigit = 10 + $pid - $vid;        
          }else{
            $remainder = '';  //needs to be not nothing
            $nextdigit = $pid - $vid;        
          }//end if   
        }//end if

    $finalized .= $nextdigit;
  }//end while
  
  /* TEST PRINT backwards
  	print $finalized;
  */
  
  	//In the wrong order, reverse the string
    $elfinale = strrev($finalized);
    
    //Remove preceeding zeros
	$elfinale = ltrim($elfinale, '0');
	
	/* TEST PRINT lookin good 
		print '<p>';
    	print $elfinale;
  		print '<p>';
    */
    
 if( ($elfinale % 2) == 1 ){
	  $valvenum = ($elfinale -1) / 2;
	  print 'STEAM_0:1:'.$valvenum.'<p>';

	}else{
	  $valvenum = $elfinale / 2;
	   print 'STEAM_0:0:'.$valvenum.'<p>';

	}

?>
