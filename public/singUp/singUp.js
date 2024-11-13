function verificarSenhas(event){
    const inputSenha1 = document.getElementById('senha1');
    const inputSenha2 = document.getElementById('senha2');

    const alertSenha = document.getElementById('alertSenha');

    
    const senha1 = inputSenha1.value;
    const senha2 = inputSenha2.value;

    if(senha1 != senha2){

        alertSenha.classList.remove('hidden');
        event.preventDefault(); // Impede o envio do formulário


    }else{
        alertSenha.classList.add('hidden');
    }

}

