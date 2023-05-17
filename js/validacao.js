function valida() {
    var opcaoTipo = tipo1.options[tipo1 .selectedIndex].value;
    var cep = forComercio.cep.value;
    var rua = forComercio.logradouro.value;
    var num = forComercio.numero.value;
    var lat = forComercio.latitude.value;
    var log= forComercio.longitude.value;
    var cidade= forComercio.cidade.value;
    var estado = document.getElementById("estado");
    var opcaoEstado = estado .options[estado .selectedIndex].value;

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

    if (opcaoTipo== "") {
        alert("Seleciona um tipo");
        return false;
    }
    if(opcaoTipo==8){
        var nome= forComercio.nome.value;
        var site= forComercio.site.value;
        var regiao = forComercio.regiao.value;

        if (nome == "") {
            alert("Campo nome vazio");
            forComercio.nome.focus();
            return false;
        }
        if (site == "") {
            alert("Campo site vazio");
            forComercio.site.focus();
            return false;
        }
        if (regiao == "") {
            alert("Campo Regiao vazio");
            forComercio.regiao.focus();
            return false;
        }
    }
    if(opcaoTipo==9){
        var nome= forComercio.nome.value;
        var site= forComercio.site.value;
        if (nome == "") {
            alert("Campo nome vazio");
            forComercio.nome.focus();
            return false;
        }
        if (site == "") {
            alert("Campo site vazio");
            forComercio.site.focus();
            return false;
        }

    }
    if(opcaoTipo==17){
        var nome= forComercio.nome.value;

        if (nome == "") {
            alert("Campo nome vazio");
            forComercio.nome.focus();
            return false;
        }


    }
    if(opcaoTipo==7){
        var nome= forComercio.nome.value;
        var hi= forComercio.horarioInicio.value;
        var ht= forComercio.horarioTermino.value;
        var listaSemana = document.querySelectorAll(".tes2");
        var cont2=0;
        listaSemana.forEach(function(el){
            if(el.checked){
                cont2++
            }
        });
        if (nome == "") {
            alert("Campo nome vazio");
            forComercio.nome.focus();
            return false;
        }
        if (cont2<=0){
            alert("Selecione pelo menos um dia da semna");

            return false;
        }
        if (hi == "") {
            alert("Campo horario de inicio vazio");
            forComercio.horarioInicio.focus();
            return false;
        }
        if (ht == "") {
            alert("Campo horario de termino vazio");
            forComercio.horarioTermino.focus();
            return false;
        }
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
    if (cont<=0){
        alert("Selecione uma das opção da lista de produtor");

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