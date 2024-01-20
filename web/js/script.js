function validarCamposCadastroContato(dados){

    let stop = false;
    if (!dados.nome) {
        $('#nome').removeClass('is-valid').addClass('is-invalid');
        stop = true;
    } else {
        $('#nome').removeClass('is-invalid').addClass('is-valid');
    }

    if (!dados.email || !/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(dados.email)) {
        $('#email').removeClass('is-valid').addClass('is-invalid');
        stop = true;
    } else {
        $('#email').removeClass('is-invalid').addClass('is-valid');
    }

    if (!dados.telefone || !/^([0-9]{2}) ?([0-9]{5})-?([0-9]{4})$/.test(dados.telefone)) {
        $('#telefone').removeClass('is-valid').addClass('is-invalid');
        stop = true;
    } else {
        $('#telefone').removeClass('is-invalid').addClass('is-valid');
    }

    if (!dados.rua) {
        $('#rua').removeClass('is-valid').addClass('is-invalid');
        stop = true;
    } else {
        $('#rua').removeClass('is-invalid').addClass('is-valid');
    }

    if (!dados.numero) {
        $('#numero').removeClass('is-valid').addClass('is-invalid');
        stop = true;
    } else {
        $('#numero').removeClass('is-invalid').addClass('is-valid');
    }

    if (!dados.bairro) {
        $('#bairro').removeClass('is-valid').addClass('is-invalid');
        stop = true;
    } else {
        $('#bairro').removeClass('is-invalid').addClass('is-valid');
    }

    if (!dados.cidade) {
        $('#cidade').removeClass('is-valid').addClass('is-invalid');
        stop = true;
    } else {
        $('#cidade').removeClass('is-invalid').addClass('is-valid');
    }

    if (!dados.estado) {
        $('#estado').removeClass('is-valid').addClass('is-invalid');
        stop = true;
    } else {
        $('#estado').removeClass('is-invalid').addClass('is-valid');
    }

    if (!dados.cep || !/^[0-9]{5}-[0-9]{3}$/.test(dados.cep)) {
        $('#cep').removeClass('is-valid').addClass('is-invalid');
        stop = true;
    } else {
        $('#cep').removeClass('is-invalid').addClass('is-valid');
    }

    return stop;
}

function cadastrarContato(){
    let nome = $('#nome').val();
    let email = $('#email').val();
    let telefone = $('#telefone').val();
    let rua = $('#rua').val();
    let numero = $('#numero').val();
    let bairro = $('#bairro').val();
    let cidade = $('#cidade').val();
    let estado = $('#estado').val();
    let cep = $('#cep').val();
  
    let dados = {
        nome: nome,
        email: email,
        telefone: telefone,
        rua: rua,
        numero: numero,
        bairro: bairro,
        cidade: cidade,
        estado: estado,
        cep: cep
    }

    if(validarCamposCadastroContato(dados)){
        return;
    }

    $.ajax({
        type: "POST",
        url: "crud/create/createContato.php",
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        data: JSON.stringify(dados)
    }).done((response) =>{
        alert(response)
    }).fail((response) =>{
        alert(response)
    });
}


function importarExcel(){
    let file = $('#file').prop('files')[0];

    if(!file || file.type != 'application/vnd.ms-excel'){
        $('#file').removeClass('is-valid').addClass('is-invalid');
        return;
    }else{   
        $('#file').removeClass('is-invalid').addClass('is-valid');
    }

    $.ajax({
        type: "POST",
        url: "crud/create/importExcel.php",
        data: file,
        processData: false,
        xhrFields: {
            responseType: 'blob' 
        },
        success: (response) => {            
            try{
                let url = URL.createObjectURL(response);
                        
                let a = document.createElement("a");
                a.href = url;
                a.download = "InsercoesComErros.xls";
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);

                window.URL.revokeObjectURL(url);

                alert('Alguns contatos não foram importados! Verifique o excel gerado!')
            }catch(e){
                alert('Todos os contatos foram importados com sucesso!');
            }
        }
    });
}