<?php
//Example of recursive function 

$i = 0; //just iterator to count

// Пример конечной рекурсии
function fac($n){
    global $i;
    if($n == 0){
        return 1;
    }
    $i++;
    return $n*fac($n-1); //5 * fac(4)
}

//Call the fucntion
$v = fac(5);  //fac(4) returns 24,  fac(5) returns 120
echo "rec funct returns => " . $v;
echo "<p> Iterated " . $i . "</p>";


//Explain how fac(5) returns 120
// Recursive function goes deep down, calling funct each one by one, untill it encouter fac(0) as ($n == 0), then returns value back from bottom to up 
//return 5 * fac(4)  //return 120 (24*5)
//return 4 * fac(3)  //return 24  (4*6)
//return 3 * fac(2)  //return 6
//return 2 * fac(1)  //return 2
//return 1 * fac(0)  //return 1  as ($n == 0)

?>
