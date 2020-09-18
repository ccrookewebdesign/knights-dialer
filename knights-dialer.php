<?php
//Knight's Dialer
// 1 2 3
// 4 5 6
// 7 8 9
//   0

// Answer: if n = 2, the answer is 2 (16, 18)
// Answer: if n = 3, the answer is 5 (161, 167, 160, 181, 183)
// Answer: if n = 4, the answer is 10 ( 1616, 1618, 1672, 1676, 1604, 1606, 1816, 1818, 1834, 1839)
// Answer: if n = 5, the answer is 26 (16040, 16043, 16049, 16060, 16061, 16067,
// 16160, 16161, 16167, 16181, 16183,
// 16727, 16729, 16760, 16761, 16767,
// 18160, 18161, 18167, 18181, 18183,
// 18340, 18343, 18349, 18381, 18383)

echo(knightsDialer(1, 2));

function knightsDialer($startDigit = 1, $keyCount = 0){
  $keyPad = [
    0 => [4, 6],
    1 => [6, 8],
    2 => [7, 9],
    3 => [4, 8],
    4 => [0, 3, 9],
    5 => [],
    6 => [0, 1, 7],
    7 => [2, 6],
    8 => [1, 3],
    9 => [2, 4],
  ];

  $pathCount = 0;

  if($keyCount <= 1){
    return 1;
  }

  foreach($keyPad[$startDigit] as $digit){
    $pathCount += $this->knightsDialer($digit, $keyCount - 1);
  }

  return $pathCount;
}

function knightsDialer2($startDigit = 1, $keyCount = 0){
  $keyPad = [
    0 => [4, 6],
    1 => [6, 8],
    2 => [7, 9],
    3 => [4, 8],
    4 => [0, 3, 9],
    5 => [],
    6 => [0, 1, 7],
    7 => [2, 6],
    8 => [1, 3],
    9 => [2, 4],
  ];

  if($keyCount <= 1){
    return 1;
  }

  $priorPathCounts = [];
  $pathCounts = [];
  $hops = 1;

  while($hops < $keyCount){
    $pathCounts = [];

    foreach([0, 1, 2, 3, 4, 5, 6, 7, 8, 9] as $digit){
      foreach($keyPad[$digit] as $n){
        if(isset($pathCounts[$digit])){
          $pathCounts[$digit] += $priorPathCounts[$n] ?? 1;
        }
        else {
          $pathCounts[$digit] = $priorPathCounts[$n] ?? 1;
        }
      }
    }

    $priorPathCounts = $pathCounts;

    $hops++;
  }

}
