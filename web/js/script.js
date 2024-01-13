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
