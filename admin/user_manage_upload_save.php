<?php
include("../connect.php");

    if ( $_FILES['file']['error'] ) { 
        die("upload error "); 
    } 
  
 //======Connect DB======================//   

 //======End Connect DB======================//   

 //======Get data from Excel======================//        
    $dom = DOMDocument::load( $_FILES['file']['tmp_name'] ); 
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
             if($col==4) $data5 = $cell->nodeValue;
             $col++; 
        } 
 //======End Get data from Excel======================//        

//==================Insert To DB ====================================//
	$sql = " INSERT INTO rt_teacher (";			
	$sql .= " regid, ";
	$sql .=	" name, ";
	$sql .=	" section, ";	
	$sql .= " class, ";
	$sql .= " room ";
	$sql .= " ) VALUES ( ";		
	$sql .= " '$data1', ";		
	$sql .= " '$data2', ";
	$sql .= " '$data3', ";		
	$sql .= " '$data4', ";
	$sql .= " '$data5' ";	
	$sql .= " ) ";		
	mysqli_query($conn,$sql);
//==================End Insert To DB ====================================//
 $row++;  
  } 
?>
	
</section>