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

         $caminhoArquivo = "./arquivos/departamento.csv";
         $arquivo = fopen( $caminhoArquivo, "r" );
         
         if( $arquivo == false ) {
            echo ("Erro ao abrir o arquivo");
            exit();
         }

         $filesize = filesize( $caminhoArquivo );
         echo ( "Tamanho do arquivo 2: $filesize bytes" );

         $departamentos = [];
         while (($linha = fgets($arquivo)) !== FALSE) {
            $departamento = [];
            $linha=str_replace('"', '', $linha);
            $linhaExplodida = explode(';',$linha);
            //Cria um array associativo para o funcionario atual
            $departamento["numero"]=$linhaExplodida[0];
            $departamento["nome"]=$linhaExplodida[1];
            $departamento["qtdFuncionarios"]="";
            $departamento["mediaSalarial"]="";
            array_push($departamentos, $departamento);
         }  
         
         fclose( $arquivo );


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
         echo("<br>");
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
            $funcionario["idDepartamento"]=(int)$linhaExplodida[8];
            array_push($funcionarios, $funcionario);
         }
         //Fecha o arquivo csv
         fclose( $arquivo );

         for($i = 0; $i < (count($funcionarios)); $i++){
            $idDepartamentoFuncionario = (int)$funcionarios[$i]["idDepartamento"];
            
            for($j = 0; $j < (count($departamentos)); $j++){
               $numeroDepartamento = (int)$departamentos[$j]["numero"];
               
               if($idDepartamentoFuncionario==$numeroDepartamento){
                  $funcionarios[$i]["nomeDepartamento"] = $departamentos[$j]["nome"]; 
                  if($j == 0 ){
                     $departamentos[$j]["qtdFuncionarios"] = "qtd Funcionarios";
                     $departamentos[$j]["mediaSalarial"] = "media Salarial";
                     $departamentos[$j+1]["qtdFuncionarios"]=(int) 0;
                     $departamentos[$j+1]["mediaSalarial"] = (double) 0;
                  } else {
                     $departamentos[$j]["qtdFuncionarios"] = (int)$departamentos[$j]["qtdFuncionarios"] + 1;
                     $departamentos[$j]["mediaSalarial"] = (double)$departamentos[$j]["mediaSalarial"] + $funcionarios[$i]["salario"];
                  }
                  break;
               }
               unset($novoDepartamentoFuncionario);
            }
         }

         for($j = 1; $j < (count($departamentos)); $j++){
            $media = $departamentos[$j]["mediaSalarial"]/$departamentos[$j]["qtdFuncionarios"];
            $departamentos[$j]["mediaSalarial"] = round($media,2);
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

         //JSON
         $departamentos = json_encode($departamentos);
         debug($departamentos);

         $filename = "./arquivos/departamentos.json";
         $file = fopen( $filename, "w" );
         
         if( $file == false ) {
            echo ( "Erro ao abrir o arquivo" );
            exit();
         }
         fwrite( $file, $departamentos);
         fclose( $file );


      ?>
      
   </body>
</html>
