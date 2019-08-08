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

<?php 
    $vetor = array (1,2,3,4);
    debug($vetor);
?>

<?php 
    $professores = array (
        "0" => array  (
            "nome" => "Rodrigo Ramos",
            "turma" => "651",
            "prontuario" => "1201506",
        ),
        "1" => array  (
            "nome" => "Henrique",
            "turma" => "638",
            "prontuario" => "0800001",
        )
        );
    debug($professores);
?>

<?php 
    $turmas = array (
        "0" => array  (
            "nome" => "Rodrigo Ramos",
            "turma" => "651",
            "prontuario" => "1201506",
            "materias" => array (
                "LP1" => 10,
                "EPO" => 10,
                "OPE" => 6,
            )
        ),
        "1" => array  (
            "nome" => "Henrique",
            "turma" => "638",
            "prontuario" => "0800001",
            "materias" => array (
                "LP1" => 2,
                "EPO" => 0,
                "OPE" => 8,
            )
        )
        );
    debug($turmas);
?>
