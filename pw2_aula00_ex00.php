<?php function debug ($param){
	echo '<pre>';
	print_r ($param);
	echo'</pre>';
	echo '<hr>';
}
?>

<?php
	$nota['Rogerio'] = 10;
	$nota['Monica'] = 8;
	debug($nota);
?>
