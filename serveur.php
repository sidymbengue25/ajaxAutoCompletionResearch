<?php
$towns=unserialize(file_get_contents('towns.txt'));/*
var_dump($towns);*/
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
  $resultToShow=implode('|', $resultList);/*
  var_dump($resultToShow);*/
  echo $resultToShow;
}else{
 /* echo 'Aucun résultat trouvé';*/
}
?>
