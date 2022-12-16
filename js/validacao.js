function valida() {
    var nome1 = forComercio.nome.value;
    var cep = forComercio.cep.value;
    var rua = forComercio.logradouro.value;
    var num = forComercio.numero.value;
    var lat = forComercio.latitude.value;
    var log= forComercio.longitude.value;
    var cidade= forComercio.cidade.value;
    var estado = document.getElementById("estado");
    var opcaoEstado = estado .options[estado .selectedIndex].value;

    var select = document.getElementById("tipo1");
    var opcaoValor = select.options[select.selectedIndex].value;

    var hi = forComercio.horarioInicio.value;
    if (opcaoValor == "") {
        alert("selecione um tipo vazio");

        return false;
    }



    if (nome1 == "") {
        alert("Campo nome vazio");
        forComercio.nome.focus();
        return false;
    }



    if (cep == "") {
        alert("Campo cep vazio");
        forComercio.cep.focus();
        return false;
    }
    if (rua == "") {
        alert("Campo Logradouro vazio");
        forComercio.logradouro.focus();
        return false;
    }
    if (num == "") {
        alert("Campo numero vazio");
        forComercio.numero.focus();
        return false;
    }

    if (lat == "") {
        alert("Campo Latitude vazio");
        forComercio.latitude.focus();
        return false;
    }
    if (log == "") {
        alert("Campo Longitude vazio");
        forComercio.longitude.focus();
        return false;
    }
    if (cidade == "") {
        alert("Campo cep vazio");
        forComercio.cidade.focus();
        return false;
    }
    if (opcaoEstado== "") {
        alert("Seleciona um estado");
        forComercio.estado.focus();
        return false;
    }

}
function validarProdutor() {
    var nome =forProdutor.produtor.value;
    var site =forProdutor.websiter.value;

    var tel =forProdutor.telefone.value;

    var cep = forProdutor.cep.value;
    var rua =forProdutor.logradouro.value;
    var num = forProdutor.numero.value;
    var lat = forProdutor.latitude.value;
    var log= forProdutor.longitude.value;
    var cidade= forProdutor.cidade.value;

    var alternativas1 = document.querySelectorAll("input[name=vendaFazenda]:checked");
    var alternativas = document.querySelectorAll("input[name=turismo]:checked");
    var alternativas2 = document.querySelectorAll("input[name=vendaS]:checked");


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


    if (alternativas1.length < 1) {
        alert("Selecione uma das opção de venda na Fazenda");
        forProdutor.vendaFazenda.focus();
        return false;
    }
    if (alternativas.length < 1) {
        alert("Selecione uma das opção de Turismo na fazenda");
        forProdutor.turismo.focus();
        return false;
    }
    if (alternativas2.length < 1) {
        alert("Selecione uma das opção de venda pelo site");
        forProdutor.vendaS.focus();
        return false;
    }
}