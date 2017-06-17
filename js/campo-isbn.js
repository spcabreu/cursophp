
$("select[name=tipoProduto]").on("change", function() {
    var tipo = $(this).val();
    if( tipo == "Ebook" ) {
        $(".isbn").show();
        $(".waterMark").show();
        $(".taxaImpressao").hide();
    } else if (tipo == "LivroFisico"){
        $(".isbn").show();
        $(".taxaImpressao").show();
        $(".waterMark").hide();
    } else {
        $(".isbn").hide();
        $(".waterMark").hide();
        $(".taxaImpressao").hide();
    }
}).change();