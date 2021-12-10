<?php
//task (pikab)
$s = '';
$b = '1112031584';
$a = str_split($b);

for($i = 1; $i < count($a); $i++){
	//echo $a[$i];
	if( $a[$i] % 2 == $a[$i -1] % 2 ){
		$s.= max($a[$i], $a[$i -1] );
	}
}

echo $s;
//output is 112358
  
?>






