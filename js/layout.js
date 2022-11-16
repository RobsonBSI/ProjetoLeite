$(document).ready(function() {
    $('#tipo').on('change',function(){
        var SelectValue=$(this).val();
        if (SelectValue=="prod") {
            $('.p1').show();
            $('.p2').hide();
        } else {
            $('.p2').show();
            $('.p1').hide();
        }
    });

    $('#tipo1').on('change',function(){
        var SelectValue=$(this).val();
        let d="";
        if (SelectValue==7) {
            $('.feira').show();
            $('.vOline').hide();
            $('.cesta').hide();
            $('.mercado').hide();
        } else if (SelectValue==9) {
            $('.vOline').show();
            $('.feira').hide();
            $('.cesta').hide();
            $('.mercado').hide();
        }else if (SelectValue==8) {
            $('.cesta').show();
            $('.vOline').show();
            $('.mercado').show();
            $('.feira').hide();
        }else if (SelectValue==17) {
            $('.mercado').show();
            $('.vOline').show();
            $('.cesta').hide();
            $('.feira').hide();

        }
    });





});