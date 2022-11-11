
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

function enviarContaCriada(){
  var alertSuccess = document.querySelector(".alerta-conta-success")
  var alertDanger = document.querySelector(".alerta-conta-danger")
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
  location.href = "index.html.php?cad=1";
}