// VALIDAÇÃO DDE FORMULARIO (BOOTSTRAP)
(function() {
    
  input = document.querySelectorAll(".form-control")
  'use strict';
  window.addEventListener('load', function() {
      // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
      var forms = document.getElementsByClassName('needs-validation');
      // Faz um loop neles e evita o envio
      var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
          for(i=0; i<input.length;i++){
            input[i].classList.add('input-erro');
          }
        }
          form.classList.add('was-validated');
      }, false);
      });
  }, false);
})();


//BOTÃO PARA MOSTRAR SENHA    
function showPassword() {//Botao de olho para mostrar e esconder a senha (pagina entrar)
    var senha = document.querySelector(".password");
    var imgShow = document.querySelector("#img-mostrar");
    if (senha.type === "password") {
      senha.type = "text";
      imgShow.src = "img/eye-off.svg"
    } else {
      senha.type = "password";
      imgShow.src = "img/eye.svg"
    }
}
function showPasswordCadSenha() {//Botao de olho para mostrar e esconder a senha (pagina cadastrar)
    var senha = document.getElementById("txtSenhaCadastrar");
    var imgShow = document.querySelector("#img-mostrar-senha-cad");
    if (senha.type === "password") {
      senha.type = "text";
      imgShow.src = "img/eye-off.svg"
    } else {
      senha.type = "password";
      imgShow.src = "img/eye.svg"
    }
}
function showPasswordCadConfirmarSenha() {//Botao de olho para mostrar e esconder a senha (pagina cadastrar)
  var senha = document.getElementById("txtConfirmarSenhaCadastrar");
  var imgShow = document.querySelector("#img-confirmar-senha-cad");
  if (senha.type === "password") {
    senha.type = "text";
    imgShow.src = "img/eye-off.svg"
  } else {
    senha.type = "password";
    imgShow.src = "img/eye.svg"
  }
}

function confirmarEmail(){//funcao que confirma se o usuario digitou o mesmo email no campo de confirmação
  txtEmail = document.querySelector("#txtEmailCadastrar").value;//valor do campo email
  txtConfirmarEmail = document.querySelector("#txtConfirmarEmailCadastrar").value;//valor do campo de confirmação
  erro = document.querySelector("#erro-email")//mensagem de erro
  if(txtEmail != txtConfirmarEmail) {
    erro.innerHTML = 'Os emails não conferem';//mostra os meses
    document.querySelector(".btn-proximo-cadastrar").disabled = true;
    } else {
    erro.innerHTML = '';
    document.querySelector(".btn-proximo-cadastrar").disabled = false;
    
  }
}

function confirmarSenha(){//funcao que confirma se o usuario digitou a mesma senha no campo de confirmação
  txtSenha = document.querySelector("#txtSenhaCadastrar").value;//valor do campo email
  txtConfirmarSenha = document.querySelector("#txtConfirmarSenhaCadastrar").value;//valor do campo de confirmação
  erro = document.querySelector("#erro-senha")//mensagem de erro
  if(txtSenha != txtConfirmarSenha) {
    document.getElementById("erro-senha").innerHTML = 'As senhas não conferem';//mostra os meses
    document.querySelector(".btn-proximo-cadastrar").disabled = true;
    } else {
    erro.innerHTML = '';
    document.querySelector(".btn-proximo-cadastrar").disabled = false;
    
  }
} 