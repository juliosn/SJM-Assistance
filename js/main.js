
  // PRA QUE SERVE TANTO CÓDIGO?
  // SE A VIDA NÃO É PROGRAMADA 
  // E AS MELHORES COISAS
  // NÃO TEM LÓGICA! 

//BOTAO PRARA MOSTRA SENHA    
function showPassword() {
    var senha = document.getElementById("txtSenhaEntrar");
    var imgShow = document.querySelector(".img-mostrar-senha-entrar");
    if (senha.type === "password") {
      senha.type = "text";
      imgShow.src = "img/eye-off.svg"
    } else {
      senha.type = "password";
      imgShow.src = "img/eye.svg"
    }
}

function showPassword2() {
    var senha = document.getElementById("senha2");
    if (senha.type === "password") {
      senha.type = "text";
      imgShow.src = "img/eye-off.svg"
    } else {
      senha.type = "password";
      imgShow.src = "img/eye.svg"
    }
}

  //VERIFICAR SE AS SENHAS SÃO IGUAIS
  $(document).ready(function() {
  $('.senha-igual').on('blur', function() {
    if($(this).val() != $(this).parent().prev().find('.senha-igual').val()) {
      var erro = document.querySelector("#Senha-Erro")
      erro.style.color = "#dc3545"
      document.getElementById("Senha-Erro").innerHTML = 'As senhas não conferem';//mostra os meses
      document.getElementById("botao").disabled = true;
      } else {
       if($(this).val() == $(this).parent().prev().find('.senha-igual').val()) {
      var erro = document.querySelector("#Senha-Erro")
      erro.style.color = "green"
      document.getElementById("Senha-Erro").innerHTML = 'As senhas estão são iguais';//mostra os meses
      document.getElementById("botao").disabled = false;
      }
    }
  });
});



//VERIFICAR SE OS EMAIS SÃO IGUAIS
$(document).ready(function() {
  $('.email-igual').on('blur', function() {
    if($(this).val() != $(this).parent().prev().find('.email-igual').val()) {
      var erro = document.querySelector("#email-Erro")
      erro.style.color = "#dc3545"
      document.getElementById("email-Erro").innerHTML = 'Os emails não conferem';//mostra os meses
      document.getElementById("botao").disabled = true;
      } else {
       if($(this).val() == $(this).parent().prev().find('.email-igual').val()) {
      var erro = document.querySelector("#email-Erro")
      erro.style.color = "green"
      document.getElementById("email-Erro").innerHTML = 'os email estão corretos';//mostra os meses
      document.getElementById("botao").disabled = false;
      }
    }
  });
});


function enviarRecuperacaoSenha(){
    var alertSuccess = document.querySelector(".alerta-senha-success")
    var alertDanger = document.querySelector(".alerta-senha-danger")
    var numero = Math.floor(Math.random() * (3 - 1) + 1);
    console.log(numero)
    if(numero ==1){
        alertSuccess.classList.add("aparecer-alert")
        alertDanger.classList.remove("aparecer-alert")
    }else{
        alertDanger.classList.add("aparecer-alert")
        alertSuccess.classList.remove("aparecer-alert")
    }
}

function finalizarCadastro(){
  document.querySelector(".btn-form3").classList.add("check-cad")
  document.querySelector(".btn-form3").innerHTML = "  "
  location.href = "cadastro2?.php";
}