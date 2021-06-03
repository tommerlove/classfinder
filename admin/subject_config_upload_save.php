<?php
include("../connect.php");

    if ( $_FILES['filesubject']['error'] ) { 
        die("upload error "); 
    } 
  
 //======Connect DB======================//   

 //======End Connect DB======================//   

 //======Get data from Excel======================//        
    $dom = DOMDocument::load( $_FILES['filesubject']['tmp_name'] ); 
    $rows = $dom->getElementsByTagName( 'Row' ); 
    $row = 0; 
     
    foreach ($rows as $temp) { 
        $col = 0; 
        if($row==0) { 
            $row++; continue; 
        } 
        $cells = $temp->getElementsByTagName('Cell'); 
		
        foreach( $cells as $cell )  { 
             if($col==0) $data1 = $cell->nodeValue; 
             if($col==1) $data2 = $cell->nodeValue; 
             if($col==2) $data3 = $cell->nodeValue;
             if($col==3) $data4 = $cell->nodeValue; 
             $col++; 
        } 
 //======End Get data from Excel======================//        

//==================Insert To DB ====================================//
	$sql = " INSERT INTO course (";			
	$sql .= " code, ";
	$sql .=	" course, ";
	$sql .=	" section, ";	
	$sql .= " class ";
	$sql .= " ) VALUES ( ";		
	$sql .= " '$data1', ";		
	$sql .= " '$data2', ";
	$sql .= " '$data3', ";		
	$sql .= " '$data4' ";	
	$sql .= " ) ";		
	mysqli_query($conn,$sql);
//==================End Insert To DB ====================================//
 $row++;  
  } 
?>
	
</section>