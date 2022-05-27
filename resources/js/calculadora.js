$().ready(function () {
    function savePreferences() {
        const preferences = {
            amount: $("#amount").val(),
            period: $("#period").val(),
            taxcdb: $("#cdb").val(),
            taxlci: $("#lci").val(),
            _token: $("input[name='_token']").val()
        };
        $.ajax({
            type: 'POST',
            url: window.location.protocol + "//" + window.location.host + '/preferences',
            data: preferences,
            error: function (_jqXHR, _textStatus, errorThrown) {
                console.log('Error saving preferences:' + errorThrown);
            },
            async: true
        });
    }

    function getIndexPoupanca() {
        return parseFloat($("#poupanca").val()) / 100 + 1;
    }

    function getIndexCDB() {
        const taxa = parseFloat($("#cdb").val()) / 100;
        const di = parseFloat($("#di").val());
        return Math.pow(((taxa * di) / 100 + 1), (1 / 12));
    }

    function getIndexTDSELIC() {
        const selic = parseFloat($("#selic").val());
        return Math.pow((selic / 100 + 1), (1 / 12));
    }

    function getIndexLCI() {
        const taxa = parseFloat($("#lci").val()) / 100;
        const di = parseFloat($("#di").val());
        return Math.pow(((taxa * di) / 100 + 1), (1 / 12));
    }

    function getIndexDI() {
        return $("#di").val();
    }

    function getIndexSELIC() {
        return $("#selic").val();
    }

    function getIndexIR() {
        const periodo = $("#period").val();
        if (periodo <= 6) {
            return 22.5;
        } else if (periodo <= 12) {
            return 20;
        } else if (periodo <= 24) {
            return 17.5;
        } else {
            return 15;
        }
    }

    function getB3TaxOverInvestment(amount) {
        const amountNoTax = 10_000;
        if (amount <= amountNoTax) {
            return 0;
        }
        const period = $("#period").val();
        const index = Math.ceil(period / 6) * (0.003 / 2);
        return (amount - amountNoTax) * index;
    }

    function jurosCompostos(valor, taxa, periodo) {
        return valor * (Math.pow(taxa, periodo)) - valor;
    }

    function showResults(save) {
        const investimento = $("#amount").val();
        const periodo = $("#period").val();

        const result_poupanca = jurosCompostos(investimento, getIndexPoupanca(), periodo);

        const result_cdb = jurosCompostos(investimento, getIndexCDB(), periodo);
        const index_ir = getIndexIR();
        const ir_cdb = result_cdb * (index_ir / 100);

        const result_lci = jurosCompostos(investimento, getIndexLCI(), periodo);

        const result_tdselic = jurosCompostos(investimento, getIndexTDSELIC(), periodo);
        const ir_tdselic = result_tdselic * (index_ir / 100);
        const b3_tdselic = getB3TaxOverInvestment(investimento);
        const liquido_tdselic = (result_tdselic - ir_tdselic - b3_tdselic);

        changeBar('bar-poupanca', result_poupanca.toFixed(2));
        changeBar('bar-cdb', (result_cdb - ir_cdb).toFixed(2));
        changeBar('bar-lci', result_lci.toFixed(2));
        changeBar('bar-tdselic', liquido_tdselic.toFixed(2));

        $("#result-poupanca").find('span.liquido').html(result_poupanca.toFixed(2));

        const resultCDBElement = $("#result-cdb");
        resultCDBElement.find('span.total').html(result_cdb.toFixed(2));
        resultCDBElement.find('span.ir').html(ir_cdb.toFixed(2) + "  <span class='badge'>" + index_ir + "%</span>");
        resultCDBElement.find('span.liquido').html((result_cdb - ir_cdb).toFixed(2));

        $("#result-lci").find('span.liquido').html(result_lci.toFixed(2));

        const resultTDSelicElement = $("#result-tdselic");
        resultTDSelicElement.find('span.total').html(result_tdselic.toFixed(2));
        resultTDSelicElement.find('span.ir').html(ir_tdselic.toFixed(2) + "  <span class='badge'>" + index_ir + "%</span>");
        resultTDSelicElement.find('span.bvmf').html(b3_tdselic.toFixed(2));
        resultTDSelicElement.find('span.liquido').html(liquido_tdselic.toFixed(2));

        if (save) {
            savePreferences();
        }
    }

    function changeBar(bar, value) {
        const $bar = $('#' + bar);
        const percent = (value / $("#amount").val() * 100).toFixed(1);
        $bar.width(percent * 300 / $("#period").val());
        $bar.html(percent + '%');
    }

    showResults(false);

    $(".form-control").on('blur change', function () {
        showResults(true);
    })
});
