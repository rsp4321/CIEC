function validaFCadastroAluno() {
	form = document.FCadastroAluno;
	if (form.nome.value == "") {
		alert('� obrigat�rio o preenchimento do campo Nome');
		form.nome.focus();
		return false;
	}

	if (!validaCpf()) {
		alert('Digite um n�mero de CPF v�lido');
		form.cpf.focus();
		return false;
	}

	if (form.login.value == "") {
		alert('Digite seu login');
		form.login.focus();
		return false;
	}

	if (form.senha.value != form.senhaconf.value || form.senha.value == "") {
		alert('As senhas digitadas n�o conferem');
		form.senha.focus();
		return false;
	}

	if (!form.estadoCivil[0].checked && !form.estadoCivil[1].checked) {
		alert('Estado Civil em Branco');
		form.estadoCivil[0].focus();
		return false;
	}

	if (form.diaBirth.value == "0") {
		alert('Preencha Dia de Nascimento');
		form.diaBirth.focus();
		return false;
	}

	if (form.mesBirth.value == "0") {
		alert('Preencha Mes de Nascimento');
		form.mesBirth.focus();
		return false;
	}

	if (form.anoBirth.value == "0") {
		alert('Preencha Ano de Nascimento');
		form.anoBirth.focus();
		return false;
	}

	if (form.rua.value == "") {
		alert('Rua em Branco');
		form.rua.focus();
		return false;
	}

	if (form.numero.value == "") {
		alert('Numero em Branco');
		form.numero.focus();
		return false;
	}

	if (form.bairro.value == "") {
		alert('Bairro em Branco');
		form.bairro.focus();
		return false;
	}

	if (form.cidade.value == "") {
		alert('Cidade em Branco');
		form.cidade.focus();
		return false;
	}

	if (form.estado.value == "0") {
		alert('Estado em Branco');
		form.estado.focus();
		return false;
	}

	if (form.cep.value == "") {
		alert('CEP em Branco');
		form.cep.focus();
		return false;
	}

	return true;
}

function validaFPreCadastro() {
	form2 = document.FPreCadastro;
	if (form2.nome.value == "") {
		alert('Digite um nome:');
		form2.nome.focus();
		return false;
	}

	if (!validaCpf()) {
		alert('Digite um n�mero de CPF v�lido:');
		form2.cpf.focus();
		return false;
	}

	if (form2.matricula.value == "") {
		alert('Digite um n�mero de matr�cula');
		form2.matricula.focus();
		return false;
	}

	if (form2.curso.value == "0") {
		alert('Selecione o Curso');
		form2.curso.focus();
		return false;
	}
	return true;
}

function validaCpf() {
	var CPF = $('cpf').value;
	if (CPF.length != 14 || CPF == "00000000000" || CPF == "11111111111"
			|| CPF == "22222222222" || CPF == "33333333333"
			|| CPF == "44444444444" || CPF == "55555555555"
			|| CPF == "66666666666" || CPF == "77777777777"
			|| CPF == "88888888888" || CPF == "99999999999") {
		// alert('Digite um n�mero de CPF v�lido');
		return false;
	}
	CPF = CPF.replace(".", "");
	CPF = CPF.replace(".", "");
	CPF = CPF.replace("-", "");
	soma = 0;
	for ( var i = 0; i < 9; i++)
		soma += parseInt(CPF.charAt(i)) * (10 - i);
	resto = 11 - (soma % 11);
	if (resto == 10 || resto == 11)
		resto = 0;
	if (resto != parseInt(CPF.charAt(9))) {
		// alert('Digite um n�mero de CPF v�lido');
		// $('cpf').String();
		return false;
	}
	soma = 0;
	for ( var i = 0; i < 10; i++)
		soma += parseInt(CPF.charAt(i)) * (11 - i);
	resto = 11 - (soma % 11);
	if (resto == 10 || resto == 11)
		resto = 0;
	if (resto != parseInt(CPF.charAt(10))) {
		// alert('Digite um n�mero de CPF v�lido');
		// $('cpf').focus();
		return false;
	}
	return true;
}// fim da fun��o vlidacpf

function validaFCadastroCurriculum() {
	form = document.FCadastroCurriculum;

	if (form.nome.value == "") {
		alert('� obrigat�rio o Preenchimento do Campo Nome');
		form.nome.focus();
		return false;
	}

	if (!form.sexo[0].checked && !form.sexo[1].checked) {
		alert('Sexo em Branco');
		form.sexo[0].focus();
		return false;
	}

	if (form.data_nasc.value == "") {
		alert('Preencha a Data de Nascimento');
		form.sexo.focus();
		return false;
	}

	if (!form.estadocivil[0].checked && !form.estadocivil[1].checked
			&& !form.estadocivil[2].checked && !form.estadocivil[3].checked) {
		alert('Estado Civil em Branco');
		form.estadocivil[0].focus();
		return false;
	}

	if (form.email.value == "") {
		alert('Preencha o Email');
		form.email.focus();
		return false;
	}

	if (form.dddtel.value == "") {
		alert('Preencha o DDD');
		form.dddtel.focus();
		return false;
	}

	if (form.fone.value == "") {
		alert('Preencha o Telefone');
		form.fone.focus();
		return false;
	}

	if (form.dddcel.value == "") {
		alert('Prencha o DDD');
		form.dddcel.focus();
		return false;
	}

	if (form.cel.value == "") {
		alert('Preencha o Celular');
		form.cel.focus();
		return false;
	}

	return true;
}

function validaEstado() {
	if (form.estado.value == 0) {
		alert('Selecione um Estado.');
		form.estado.focus();
		return false;
	}
	return true;
}

function validaDataNascimento() {
	if (form.data_nasc.value == "") {
		alert('Preencha o campo Data de Nascimento.');
		form.data_nasc.focus();
		return false;
	}

	return true;
}

function validaSexo() {
	if (form.sexo.checked == false) {
		alert('Campo sexo n�o selecionado.');
		form.sexo.focus();
		return false;
	}
	return true;
}

function validaEstadoCivil() {
	if (form.estadocivil.checked == false) {
		alert('Campo Estado Civil n�o selecionado.');
		form.estadocivil.focus();
		return false;
	}
	return true;
}

function validaFCadastroEmpresa() {
	form = document.FCadastroEmpresa;
	if (form.razaoSocial.value == "") {
		alert('Raz�o Social em Branco');
		form.razaoSocial.focus();
		return false;
	}

	if (form.nomeFantasia.value == "") {
		alert('Nome Fantasia em Branco');
		form.nomeFantasia.focus();
		return false;
	}

	if (form.cnpj.value == "") {
		alert('CNPJ em Branco');
		form.cnpj.focus();
		return false;
	}

	if (form.inscricaoEstadual.value == "") {
		alert('Inscri��o Estadual em Branco');
		form.inscricaoEstadual.focus();
		return false;
	}

	if (form.enderecoEletronico.value == "") {
		alert('Endere�o Eletronico em Branco');
		form.enderecoEletronico.focus();
		return false;
	}

	if (form.telefone.value == "") {
		alert('Telefone em Branco');
		form.telefone.focus();
		return false;
	}

	if (form.fax.value == "") {
		alert('Fax em Branco');
		form.fax.focus();
		return false;
	}

	if (form.representanteLegal.value == "") {
		alert('Representante Legal em Branco');
		form.representanteLegal.focus();
		return false;
	}

	if (form.login.value == "") {
		alert('Login em Branco');
		form.login.focus();
		return false;
	}

	if (form.senha.value == "") {
		alert('Senha em Branco');
		form.senha.focus();
		return false;
	}

	if (form.senha1.value == "") {
		alert('Confirme a Senha');
		form.senha1.focus();
		return false;
	}

	return true;
}

// header('location: nomepagina.php');
