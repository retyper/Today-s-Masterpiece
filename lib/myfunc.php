<?php
  function location_as_filename($filename){/*data의 파일 이름을 받으면 pics에 있는 이미지 위치를 return*/
    $filename.= '.jpg';
    $artist = scandir("pics");
    $j = 0;
    while ($j<count($artist)) {
      if ($artist[$j] != '.' && $artist[$j] != '..') {
         $piclist = scandir("./pics/$artist[$j]");
         $k = 0;
         while ($k<count($piclist)) {
           if ($filename == $piclist[$k]){
             $dir = "./pics/".$artist[$j]."/".$piclist[$k];
             return $dir;
           }
           $k = $k + 1;
         }
      }
      $j = $j + 1;
    }
  }

  function addjpg($datalist){//데이터 목록을 변수로 받고 .jpg를 각각 붙여 리턴
    $i = 0;
    while ($i<count($datalist)){
      $datalist[$i].=".jpg";
      $i = $i + 1;
    }
    return $datalist;
  }

  function erasejpg($nojpg){
    $nojpg = str_replace('.jpg','',$nojpg);
    return $nojpg;
  }

  function allpicturelist($emptylist){//빈배열을 받아 모든 그림목록을 리스트로 리턴. '.'하고 '..' 다 제거함.
    $artist = scandir("pics");
    $j = 0;
    while ($j<count($artist)) {
      if ($artist[$j] != '.' && $artist[$j] != '..') {
         $piclist = scandir("./pics/$artist[$j]");
         $emptylist = array_merge($emptylist, $piclist);
      }
      $j = $j + 1;
    }
    $emptylist = array_diff($emptylist, array('.', '..'));
    $emptylist = array_values($emptylist);
    return $emptylist;
  }
?>
