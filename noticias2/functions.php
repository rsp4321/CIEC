<?php
// funções úteis
function formata_data($data){
 //recebe o parâmetro e armazena em um array separado por -
 $data = explode('/', $data);
 //array com nome dos meses
 
  $data = $data[0]."/".$data[1]." ".$data[2];
 //retorna a string da ordem correta, formatada
 return $data;
}
?>