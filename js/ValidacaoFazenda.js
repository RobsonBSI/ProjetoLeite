function validarProdutor() {
    var nome =forProdutor.produtor.value;


    var termo = document.querySelectorAll(".ac1");
    var cont9=0;
    termo.forEach(function(el){
        if(el.checked){
            cont9++
        }
    });


    var declaracao = document.querySelectorAll(".ac2");
    var cont8=0;
    declaracao.forEach(function(el){
        if(el.checked){
            cont8++
        }
    });
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

    if (cont9<=0){
        alert(" Não aceito o termo de uso");

        return false;
    }
    if (cont8<=0){
        alert(" Não aceito a declaração de privacidade");

        return false;
    }
}