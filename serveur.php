<?php
$towns=unserialize(file_get_contents('towns.txt'));
sort($towns);
$resultList=array();
$nbrElements=count($towns);
if(isset($_GET['search']) and !empty($_GET['search'])){
  $searchText=htmlentities($_GET['search']);
  for($i=0;$i<$nbrElements &&count($resultList)<10;$i++){
    if(stripos($towns[$i],$searchText)===0){
      array_push($resultList,$towns[$i]);
    }else{
      $error='Null';
    }
  }
  $resultToShow=implode('|', $resultList);
  echo $resultToShow;
}else{
}
?>
