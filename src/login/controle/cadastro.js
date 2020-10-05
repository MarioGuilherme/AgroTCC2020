function selecao() {

    var imagem = document.getElementById("imagem");
    var rm = document.getElementById('rm');
    var ra = document.getElementById('ra');
    var seletor = document.getElementById('my-select').value

    if (seletor == "vazio") {
        imagem.setAttribute('src', 'desconhecido.png')
        rm.style.display = "none"
        ra.style.display = "none"
    } else if (seletor == "professor(a)") {
        imagem.setAttribute('src', 'masters.svg')
        rm.style.display = "none"
        ra.style.display = "block"
    } else {
        imagem.setAttribute('src', 'visitante.svg')
        rm.style.display = "block"
        ra.style.display = "none"
    }
}

function cadastro() {

    Swal.fire({
        icon: 'success',
        html: '<h1 style="color:white;">Cadastrado com êxito</h1>',
        background: 'rgb(39, 39, 61)',
    })
}