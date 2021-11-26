const input_senha = document.querySelector("#senha-input");
const desativado = document.querySelector("#ativado");
const ativado = document.querySelector("#escondido");
const lista = [ativado, desativado];
let acao = false;

lista.forEach((x) => {
    x.addEventListener("click", () => {
    
        if (input_senha.type === "password") {
            input_senha.type = "text";
            desativado.style.display = "initial";
            ativado.style.display = "none";
            
        }else{
            input_senha.type = "password";
            ativado.style.display = "initial";
            desativado.style.display = "none";
            
        }
    })
})