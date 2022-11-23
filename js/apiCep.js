//FUNÇÃO QUE É CHAMADA AO TIRAR FOCO DA CAIXA DE TEXTO CEP PARA COMPLETAR OS DADOS AUTOMATICAMENTE COM API
$(document).ready(function() {
    $('.txtCepApi').on('blur', function() {
        var cep = document.querySelector(".txtCepApi").value//pegar cep do usuario
        link = "https://viacep.com.br/ws/" + cep + "/json"//MOSTRA O LINK
        console.log(link)
        //funcao ajax
        $.ajax({
        url: "https://viacep.com.br/ws/" + cep + "/json",//pega valor do site que traz todos os dados em um  Json
        type: "GET",//pega pelo get
        success: function(response){//passar o valor pra variavel response
            if(response.logradouro != "undefined"){
                document.querySelector("#txtEndereco").value = response.logradouro;//completa campo endereco
                document.querySelector("#txtCidade").value = response.localidade;//completa campo cidade
                document.querySelector("#txtEstado").value = response.uf;//completa campo estado
            }
           }
           
    })
    });
  });