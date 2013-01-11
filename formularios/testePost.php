<?php

            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $data_nasc = $_POST["data_nasc"];
            $estado_civil = $_POST["estado_civil"];
            $telefone = $_POST["telefone"];
            $celular = $_POST["celular"];
            $email = $_POST["email"];
            $rua = $_POST["rua"];
            $num = $_POST["num"];
            $bairro = $_POST["bairro"];
            $cidade = $_POST["cidade"];
            $estado = $_POST["estado"];
            $cep = $_POST["cep"];
            $numFormacao = $_POST["numFormacao"];
            
            for($i=0; $i<$numFormacao; $i++){
                $curso[$i] = $_POST["curso$i"];
                $instituicao[$i] = $_POST["instituicao$i"];
                $campus[$i] = $_POST["campus$i"];
                $duracao[$i] = $_POST["duracao$i"];
                $ano_formacao[$i] = $_POST["ano_formacao$i"];
            }
            
            for($i=0; $i<$numExp; $i++){
                $empresa[$i] = $_POST['empresa$i'];
                $email[$i] = $_POST['email$i'];
                $telefone[$i] = $_POST['telefone$i'];
                $data_inicial[$i] = $_POST['data_inicial$i'];
                $data_fina[$i] = $_POST['data_final$i']; 
                $cargo[$i] = $_POST['cargo$i'];
                $atividades[$i] = $_POST['atividades$i'];
            }
            
            $numInfo = $_POST["numInfo"];
            
            echo "IdEgresso: $id <br>$data_nasc<br>$estado_civil<br>$telefone<br>$celular<br>$email<br>$rua<br>$num<br>$bairro<br>$cidade<br>$estado<br>$cep<br>";
            for($i=0; $i<$numFormacao; $i++){
                echo "$curso[$i]<br>$instituicao[$i]<br>
                $campus[$i]<br>
                $duracao[$i]<br>
                $ano_formacao[$i]<br>";
            }
            for($i=0; $i<$numExp; $i++){
                echo "$empresa[$i]<br>
                $email[$i]<br>
                $telefone[$i]<br>
                $data_inicial[$i]<br>
                $data_final[$i]<br> 
                $cargo[$i]<br>
                $atividades[$i]<br>";
            }
            echo  "numInfo: $numInfo<br>";
            $info = $_POST["info"];
            echo $info;         
              
            
?>