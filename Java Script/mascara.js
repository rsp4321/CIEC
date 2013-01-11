function Mask(formato,object){
 campo = eval(object);
     separador1 = '(';
     separador2 = ')';
     separador3 = '-';
     separador4=" ";
     separador5='.';
     separador6='/';
	 
	 if(formato=='limita'){
		 if(campo.value.length > 255){
			 alert('limite de 255 caracteres excedido');
			 campo.value=campo.value.substring(0,255);			 
			 }
			 return true;
		 }//fim do if

   if(formato=='preco'){   
    //campo.value = campo.value.substring(2,4);
}

 /*telefone*/
   if(formato=="tel"){
     conjunto1 = 0;
     conjunto2 = 3;
     conjunto3 = 4;
     conjunto4 = 9;
     if (campo.value.length == conjunto1){
       campo.value = campo.value + separador1;
    }
    if (campo.value.length == conjunto2){
      campo.value = campo.value + separador2;
    }
    if (campo.value.length == conjunto3){
      campo.value = campo.value + separador4;
    }
    if (campo.value.length == conjunto4){
      campo.value = campo.value + separador3;
    }
   }

   /*CEP*/
   if(formato=="cep"){
	alert('teste');
     conjunto1 = 5;
     if(campo.value.length == conjunto1){
      campo.value = campo.value + separador3;
    }
   }

   
   if(formato=="cnpj"){
 
     if (campo.value.length == 2){
      campo.value = campo.value + separador5;
     }
     if (campo.value.length == 6){
      campo.value = campo.value + separador5;
     }
     if (campo.value.length == 10){
      campo.value = campo.value + separador6;
     }
     if (campo.value.length == 15){
      campo.value = campo.value + separador3;
     }
     
   }
   
   
   if(formato=="cpf"){
     if (campo.value.length == 3){
      campo.value = campo.value + separador5;
     }
     if (campo.value.length == 7){
      campo.value = campo.value + separador5;
     }
     if (campo.value.length == 11){
      campo.value = campo.value + separador3;
     }
   }
}


