const formulario = document.querySelector("#cadMsgCont");

formulario.onsubmit = evento => {
    // Receber o valor do campo
    var nome = document.querySelector("#nome").value;
    // Verificar se o campo esta vazio
    if (nome === "") {
        evento.preventDefault();
        document.getElementById("msgAlerta").innerHTML = "<p style='color: #f00;'>Erro: Necessário preencher o campo nome JS!</p>";
        return;
    }

    // Receber o valor do campo
    var email = document.querySelector("#cep").value;
    // Verificar se o campo esta vazio
    if (email === "") {
        evento.preventDefault();
        document.getElementById("msgAlerta").innerHTML = "<p style='color: #f00;'>Erro: Necessário preencher o campo e-mail JS!</p>";
        return;
    }

    // Receber o valor do campo
    var assunto = document.querySelector("#assunto").value;
    // Verificar se o campo esta vazio
    if (assunto === "") {
        evento.preventDefault();
        document.getElementById("msgAlerta").innerHTML = "<p style='color: #f00;'>Erro: Necessário preencher o campo assunto JS!</p>";
        return;
    }

    // Receber o valor do campo
    /*var conteudo = document.querySelector("#conteudo").value;
    // Verificar se o campo esta vazio
    if (conteudo === "") {
        evento.preventDefault();
        document.getElementById("msgAlerta").innerHTML = "<p style='color: #f00;'>Erro: Necessário preencher o campo conteúdo JS!</p>";
        return;
    }*/
}