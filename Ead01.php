<html>

   <head>
      <title>Arquivo com PHP</title>
   </head>
   
   <body>
      
      <?php
         function debug($param){
            echo "<pre>";
            print_r($param);
            echo "</pre>";
         }

         $caminhoArquivo = "./arquivos/funcionario.csv";
         //Abre como apenas leitura ("r")
         $arquivo = fopen( $caminhoArquivo, "r" );
         
         if( $arquivo == false ) {
            //Provavelmente vai cair aqui se o arquivo não existir 
            //ou se não tiver permissão para abrir o arquivo (Linux)
            echo ("Erro ao abrir o arquivo");
            exit();
         }
         
         $filesize = filesize( $caminhoArquivo );
         echo ( "Tamanho do arquivo : $filesize bytes" );
         //$conteudoArquivo = fread( $arquivo, $filesize );
         //debug($conteudoArquivo);

         /*while (($linha = fgetcsv($arquivo)) !== FALSE) {
            debug($linha);
         }*/
         /*while (($linha = fgets($arquivo)) !== FALSE) {
            $linha=str_replace('"', '', $linha);
            debug($linha);
            $linhaExplodida = explode(';',$linha);
            debug($linhaExplodida);
         }*/

         $funcionarios = [];
         while (($linha = fgets($arquivo)) !== FALSE) {
            $funcionario = [];
            $linha=str_replace('"', '', $linha);
            $linhaExplodida = explode(';',$linha);
            //Cria um array associativo para o funcionario atual
            $funcionario["id"]=$linhaExplodida[0];
            $funcionario["nome"]=$linhaExplodida[1];
            $funcionario["salario"]=$linhaExplodida[6];
            $funcionario["idDepartamento"]=$linhaExplodida[8];
            array_push($funcionarios, $funcionario);
         }
         //Fecha o arquivo csv
         fclose( $arquivo );

         $caminhoArquivo = "./arquivos/departamento.csv";
         $arquivo = fopen( $caminhoArquivo, "r" );
         
         if( $arquivo == false ) {
            echo ("Erro ao abrir o arquivo");
            exit();
         }

         $filesize = filesize( $caminhoArquivo );
         echo("<br>");
         echo ( "Tamanho do arquivo 2: $filesize bytes" );

         $departamentos = [];
         while (($linha = fgets($arquivo)) !== FALSE) {
            $departamento = [];
            $linha=str_replace('"', '', $linha);
            $linhaExplodida = explode(';',$linha);
            //Cria um array associativo para o funcionario atual
            $departamento["numero"]=$linhaExplodida[0];
            $departamento["nome"]=$linhaExplodida[1];
            array_push($departamentos, $departamento);
         }
         
         for($i = 1; $i < (count($funcionarios)); $i++){
            $idDepartamentoFuncionario = $funcionarios[$i]["idDepartamento"];
            for($j = 1; $j < (count($departamentos)); $j++){
               $numeroDepartamento = $departamentos[$j]["numero"];
               debug($idDepartamentoFuncionario);
               debug($numeroDepartamento);
               
               if($idDepartamentoFuncionario==$numeroDepartamento){
                  /*debug($idDepartamentoFuncionario);
                  debug($numeroDepartamento);
                  debug($departamentos[$j]["nome"]);*/
               }
            }
         }
         

         debug($departamentos);
         debug($funcionarios);

         //Transforma em JSON e salva no arquivo.
         $funcionarios = json_encode($funcionarios);
         debug($funcionarios);

         $filename = "./arquivos/funcionarios.json";
         $file = fopen( $filename, "w" );
         
         if( $file == false ) {
            echo ( "Erro ao abrir o arquivo" );
            exit();
         }
         fwrite( $file, $funcionarios);
         fclose( $file );


      ?>
      
   </body>
</html>
