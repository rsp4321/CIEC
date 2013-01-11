//valida cadastro interno
function validaCadastroInterno(){
	
	if($('nome').value == ""){
		alert('É obrigatório o preenchimento do campo nome!!!');
		$('nome').focus();
		return false;
		}//fim do if nome

	if(!validaCpf()){
		alert('Digite um número de CPF válido!!!');
		$('cpf').focus();
		return false;
	}
		
	if($('rg').value ==""){
		alert("É obrigatório o preenchimento do campo RG");
		$('rg').focus();
		return false;
		}//fim do rg
		
	if($('matricula').value ==""){
		alert("É obrigatório o preenchimento do campo matrícula");
		$('matricula').focus();
		return false;
		}//fim do if matricula	
		return true;
	}//fim do validaCadastro
//valida CPF
function validaCpf(){
	var CPF = $('cpf').value;
	if (CPF.length != 14 || CPF == "00000000000" || CPF == "11111111111" ||
		CPF == "22222222222" ||	CPF == "33333333333" || CPF == "44444444444" ||
		CPF == "55555555555" || CPF == "66666666666" || CPF == "77777777777" ||
		CPF == "88888888888" || CPF == "99999999999"){
		//alert('Digite um número de CPF válido');
		return false;
	}
		CPF =CPF.replace(".","");
		CPF =CPF.replace(".","");
		CPF =CPF.replace("-","");
	soma = 0;
	for (i=0; i < 9; i ++)
		soma += parseInt(CPF.charAt(i)) * (10 - i);
	resto = 11 - (soma % 11);
	if (resto == 10 || resto == 11)
		resto = 0;
	if (resto != parseInt(CPF.charAt(9))){
		//alert('Digite um número de CPF válido');
		//$('cpf').String();
		return false;
	}
	soma = 0;
	for (i = 0; i < 10; i ++)
		soma += parseInt(CPF.charAt(i)) * (11 - i);
	resto = 11 - (soma % 11);
	if (resto == 10 || resto == 11)
		resto = 0;
	if (resto != parseInt(CPF.charAt(10))){
		//alert('Digite um número de CPF válido');
		//$('cpf').focus();
		return false;
	}
	return true;
	}//fim da função vlidacpf
//valida setor
function validaCadastroSetor(){
		if($('setor').value == ""){
				alert('Informe a descrição do setor');
				$('setor').focus();
				return false;
			}//fim do if
			
		if($('quantidade').value == 0){
			alert('Informe a quantidade de quartos este setor possui');
			return false;
			}//fim do if	
	}	