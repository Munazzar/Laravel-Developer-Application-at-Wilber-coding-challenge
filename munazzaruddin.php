<?php
// importing the given json data in php file format 
include('json.php');
// we have a array of emails to capture all the emails while we traverse through the json object 
$emails=[];
// first we decode the given json, there seemed to be an error in the given json data an extra ',' at the end of the last record so i updated it 
$people=json_decode($people,true);
// looping through the array as key and value pair since i will be adding an extra record in one pass  
foreach($people['data'] as $key=>$value){
    // getting the email address of each record and push it into the emails array 
    array_push($emails,$value['email']);
    // combining the first_name and last_name with space and add it to the new name record 

    $people['data'][$key]['name']= $value['first_name']." ".$value['last_name'];
}
// we then sort the array using a user defined function
usort($people['data'], function($rc1, $rc2) { 
    return $rc1->age > $rc2->age ? -1 : 1; 
});  

// converting the array back to the json object 
$people=json_encode($people);
// printing to check if everthing looks great 
print_r($people);
?>