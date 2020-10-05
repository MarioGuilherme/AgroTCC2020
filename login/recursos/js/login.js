status = "0"

function selecao() {

    var imagem = document.getElementById("imagem");
    var seletor = document.getElementById('my-select').value

    if (seletor == "professor(a)") {
        imagem.setAttribute('src', 'login/recursos/img/professores.svg')
        status = "0"


    } else {
        imagem.setAttribute('src', 'login/recursos/img/alunos.svg')
        status = "1"
    }
}

function acessar() {
    var nome = document.getElementById("nome").value
    var senha = document.getElementById("senha").value

    if (nome == "Rosana" && senha == "@adm123" && status == "0") {
        alert("Conectando ...")
        window.open("src/professor/visao/index.html", "_self")
    } else if (nome == "Rosana" && senha == "@adm123" && status == "1") {
        alert("Erro ao conferir as credencias")
    } else if (nome != "" && senha != "" && status == "1") {
        alert("Conectando ...")
        window.open("src/aluno/visao/index.html", "_self")
    } else if (nome != "" && senha != "" && status == "0") {
        alert("Erro ao conferir as credencias")
    } else [
        alert("Erro ao conferir as credencias")
    ]
}