function validarProdutor() {
    var nome =forProdutor.produtor.value;
    var site =forProdutor.websiter.value;
    var tel =forProdutor.telefone.value;
    var listaProduro = document.querySelectorAll(".tes1");
    var cont=0;
    listaProduro.forEach(function(el){
        if(el.checked){
            cont++
        }
    });

    var cep = forProdutor.cep.value;
    var rua =forProdutor.logradouro.value;
    var num = forProdutor.numero.value;
    var lat = forProdutor.latitude.value;
    var log= forProdutor.longitude.value;
    var cidade= forProdutor.cidade.value;

    var vendaFazenda = document.querySelectorAll("input[name=vendaFazenda]:checked");
    var turismo = document.querySelectorAll("input[name=turismo]:checked");
    var vendaSite = document.querySelectorAll("input[name=vendaS]:checked");

    if (nome == "") {
        alert("Campo nome vazio");
        forProdutor.produtor.focus();
        return false;
    }
    if (site == "") {
        alert("Campo Site vazio");
        forProdutor.websiter.focus();
        return false;
    }
    if (tel == "") {
        alert("Campo telefone vazio");
        forProdutor.telefone.focus();
        return false;
    }
    if (cont<=0){
        alert("Selecione uma das opção da lista de produtor");

        return false;
    }
    if (cep == "") {
        alert("Campo cep vazio");
        forProdutor.cep.focus();
        return false;
    }
    if (rua == "") {
        alert("Campo Logradouro vazio");
        forProdutor.logradouro.focus();
        return false;
    }
    if (num == "") {
        alert("Campo numero vazio");
        forProdutor.numero.focus();
        return false;
    }

    if (lat == "") {
        alert("Campo Latitude vazio");
        forProdutor.latitude.focus();
        return false;
    }
    if (log == "") {
        alert("Campo Longitude vazio");
        forProdutor.longitude.focus();
        return false;
    }
    if (cidade == "") {
        alert("Campo Cidade vazio");
        forProdutor.cidade.focus();
        return false;
    }
    if (vendaFazenda.length < 1) {
        alert("Selecione uma das opção de venda pela fazenda");
        return false;
    }
    if (turismo.length < 1) {
        alert("Selecione uma das opção de Turismo na fazenda");
        return false;
    }
    if (vendaSite.length < 1) {
        alert("Selecione uma das opção de venda pelo site");
        return false;
    }
}