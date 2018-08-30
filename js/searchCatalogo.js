/*
 * Retorna um array com todos os produtos do catalogo
 */
function makeGrid(gridProdutos) {

    var produtos = [];
    $(gridProdutos).find('.produto').each(function (i) {
        produtos[i] = $(this).find('.nome-produto').html().toString().toUpperCase();
    });

    return produtos;
}


function searchGrid(gridProdutos, arrayProdutos, element) {

    let result = arrayProdutos.filter(item => item.indexOf(element.toString().toUpperCase()) > -1);

    if (result.length > 0) {
        $('#empty-grid').css('display', 'none');
        blankGrid(gridProdutos);
        result.forEach(function (element) {
            $(gridProdutos).find('.produto').each(function () {
                var nome = $(this).find('.nome-produto').html().toString().toUpperCase();
                if (nome === element) {
                    $(this).css('display', 'block');
                }
            });
        });
    } else {
        blankGrid(gridProdutos);
        $('#empty-grid').css('display', 'block');
    }

}

function blankGrid(gridProdutos) {
    $(gridProdutos).find('.produto').each(function () {
        $(this).css('display', 'none');

    });
}

