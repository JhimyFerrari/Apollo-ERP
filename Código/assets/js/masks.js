 $(document).ready(function() {
    $('.cpf').mask('000.000.000-00',{ reverse: true }) ;
    $('.cnpj').mask('00.000.000/0000-00',{ reverse: true });
    $('.ie').mask('000.000.000.000');
    $('.telefone').mask('(00) 00000-0000');
    $('.cep').mask('00000.000');
    $('.nrlocal').mask('0000',{ reverse: true });
    $('.rg').mask('00.000.000-0',{ reverse: true });
    $('.real').mask('000.000.000,00',{ reverse: true });
    $('.porcento').mask('00.000.000-0',{ reverse: true });
});