function select() {
    let select = document.getElementById("select").value

    if (select == "visitante") {
        document.getElementById("visitante").style.display = "block"
        document.getElementById("master").style.display = "none"
    } else if (select == "master") {
        document.getElementById("visitante").style.display = "none"
        document.getElementById("master").style.display = "block"
    }

}


function login() {
    var login_master = document.getElementById("login-master").value
    var senha_master = document.getElementById("senha-master").value
    var select = document.getElementById("select").value

    if (select == "master") {
        if (login_master == "Rosana Emiko" || login_master == "Humberto Alves" && senha_master == "@adm123") {
            window.open("login/master.html", "_self")
        } else {
            alert("Ocorreu um erro na verificação das credenciais")
        }
    }
    if (select == "visitante") {
        if (login_visitante != "" && senha_visitante == "visitor@123") {
            window.open("login/visitante.html", "_self")
        } else {
            alert("Ocorreu um erro na verificação das credenciais")
        }
    }
}