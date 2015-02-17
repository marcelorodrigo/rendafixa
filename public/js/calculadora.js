function getIndexPoupanca() {
    return parseFloat($("#poupanca").val()) + parseFloat($("#tr").val());
}

function getIndexCDB() {
    return ($("#cdb").val() / 100) * getIndexDI() / 12;
}

function getIndexLCI() {
    return ($("#lci").val() / 100) * getIndexDI() / 12;
}

function getIndexDI() {
    return $("#di").val();
}

function getIndexIR() {
    var periodo = $("#period").val();
    if (periodo <= 3) {
        return 22.5;
    } else if (periodo <= 12) {
        return 20;
    } else if (periodo <= 24) {
        return 17.5;
    } else {
        return 15;
    }
}

function jurosCompostos(valor, taxa, periodo) {
    return valor * (Math.pow(1 + taxa / 100, periodo)) - valor;
}

function showResults(){
    var investimento = $("#amount").val();
    var periodo = $("#period").val();

    var result_poupanca = jurosCompostos(investimento, getIndexPoupanca(), periodo);

    var result_cdb = jurosCompostos(investimento, getIndexCDB(), periodo);
    var index_ir = getIndexIR();
    var ir_cdb = result_cdb * (index_ir / 100);

    var result_lci = jurosCompostos(investimento, getIndexLCI(), periodo);

    changeBar('bar-poupanca',result_poupanca.toFixed(2));
    changeBar('bar-cdb',(result_cdb - ir_cdb).toFixed(2));
    changeBar('bar-lci',result_lci.toFixed(2));

    $("#result-poupanca").find('span.liquido').html(result_poupanca.toFixed(2));

    $("#result-cdb").find('span.total').html(result_cdb.toFixed(2));
    $("#result-cdb").find('span.ir').html(ir_cdb.toFixed(2) + "  <span class='badge'>" + index_ir + "%</span>");
    $("#result-cdb").find('span.liquido').html((result_cdb - ir_cdb).toFixed(2));

    $("#result-lci").find('span.liquido').html(result_lci.toFixed(2));
}

function changeBar(bar, value){
    var $bar = $('#' + bar);
    var percent = (value / $("#amount").val() * 100).toFixed(1);
    $bar.width(percent * 300 / $("#period").val());
    $bar.html(percent + '%');
}
showResults();

$(".form-control").on('blur',function(){
    showResults();
})