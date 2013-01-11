 function validaFCadastroEmpresa()
 {
    form = document.FCadastroEmpresa;
	if(form.razaoSocial.value == ""){
        alert('Razão Social em Branco');
        form.razaoSocial.focus();
        return false;}

    if (form.nomeFantasia.value==""){
        alert('Nome Fantasia em Branco');
        form.nomeFantasia.focus();
        return false;}
	        
    if (form.cnpj.value==""){
        alert('CNPJ em Branco');
        form.cnpj.focus();
        return false;}  
    
	if (form.inscricaoEstadual.value==""){
        alert('Inscrição Estadual em Branco');
        form.inscricaoEstadual.focus();
        return false;}    
		
	if (form.enderecoEletronico.value==""){
        alert('Endereço Eletronico em Branco');
        form.enderecoEletronico.focus();
        return false;}  
        
    if (form.telefone.value==""){
        alert('Telefone em Branco');
        form.telefone.focus();
        return false;}
		
	if (form.fax.value==""){
        alert('Fax em Branco');
        form.fax.focus();
        return false;}	    
        
    if (form.representanteLegal.value==""){
        alert('Representante Legal em Branco');
        form.representanteLegal.focus();
        return false;}   
        
    if (form.login.value==""){
        alert('Login em Branco');
        form.login.focus();
        return false;}
		
	if (form.senha.value==""){
        alert('Senha em Branco');
        form.senha.focus();
        return false;}  
        
    if (form.senha1.value==""){
        alert('Confirme a Senha');
        form.senha1.focus();
        return false;}   
		   
    return  true;
 }


 function validaFCadastroAluno()
 {
    form = document.FCadastroAluno;
	if(form.nome.value == ""){
        alert('Nome em Branco');
        form.nome.focus();
        return false;}

    if (form.cpf.value==""){
        alert('CPF em Branco');
        form.cpf.focus();
        return false;}
	
    if (form.rg.value==""){
        alert('RG em Branco');
        form.rg.focus();
        return false;}
        
    if (form.login.value==""){
        alert('Login em Branco');
        form.login.focus();
        return false;}  
		
	if (form.senha.value==""){
        alert('Senha em Branco');
        form.senha.focus();
        return false;}  
        
    if (!form.sexo[0].checked && !form.sexo[1].checked){
        alert('Sexo em Branco');
        form.sexo[0].focus();
        return false;}
		
	if (!form.estadoCivil[0].checked && !form.estadoCivil[1].checked){
        alert('Estado Civil em Branco');
        form.estadoCivil[0].focus();
        return false;}	    
        
    if (form.diaBirth.value=="0"){
        alert('Preencha Dia de Nascimento');
        form.diaBirth.focus();
        return false;}   
        
    if (form.mesBirth.value=="0"){
        alert('Preencha Mes de Nascimento');
        form.mesBirth.focus();
        return false;}
		
	if (form.anoBirth.value=="0"){
        alert('Preencha Ano de Nascimento');
        form.anoBirth.focus();
        return false;}
		
	if (form.rua.value==""){
        alert('Rua em Branco');
        form.rua.focus();
        return false;}		    
   
   if (form.numero.value==""){
        alert('Numero em Branco');
        form.numero.focus();
        return false;}	
        
   if (form.bairro.value==""){
        alert('Bairro em Branco');
        form.bairro.focus();
        return false;}	   
		
	if (form.cidade.value==""){
        alert('Cidade em Branco');
        form.cidade.focus();
        return false;}
		
	if (form.estado.value=="0"){
       alert('Estado em Branco');
        form.estado.focus();
        return false;}		
		
	if (form.cep.value==""){
        alert('CEP em Branco');
        form.cep.focus();
        return false;}			  
   
    return  true;
 }
 
 function validaFPreCadastro()
 {
    form2 = document.FPreCadastro;
	if(form2.nome.value == ""){
        alert('Nome em Branco');
        form2.nome.focus();
        return false;}

    if (form2.cpf.value==""){
        alert('CPF em Branco');
        form2.cpf.focus();
        return false;}
	
    if (form2.matricula.value==""){
        alert('Matricula em Branco');
        form2.matricula.focus();
        return false;}
        
    if (form2.curso.value=="0"){
        alert('Selecione o Curso');
        form2.curso.focus();
        return false;}   
   
    return  true;
 }