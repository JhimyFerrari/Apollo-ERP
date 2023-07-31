

const tipoPessoa = document.getElementsByName('tipopessoa');
const divcnpj = document.getElementById('div-cnpj');
const divcpf = document.getElementById('div-cpf');
const divrs = document.getElementById('div-rs');
const divnf = document.getElementById('div-nf');
const divnm = document.getElementById('div-nm');
const divnc = document.getElementById('div-nc');

const inpcnpj = document.getElementById('cnpj');
const inpcpf = document.getElementById('cpf');
const inprs = document.getElementById('rs');
const inpnf = document.getElementById('nf');
const inpnm = document.getElementById('nm');
const inpnc = document.getElementById('nc');

tipoPessoa.forEach(function(radio) {
  radio.addEventListener('change', function() {
    if (this.value === 'pf') {
      divcpf.style.display = 'block';
      divnm.style.display = 'block';
      divnc.style.display = 'block';

      inpcpf.required= true
      inpnm.required= true
      inpnc.required= true

      divcnpj.style.display = 'none';
      divrs.style.display = 'none';
      divnf.style.display = 'none';

      inpcnpj.required= false
      inprs.required= false
      inpnf.required= false

    } else if (this.value === 'pj') {
      divcpf.style.display = 'none';
      divnm.style.display = 'none';
      divnc.style.display = 'none';

      
      inpcpf.required= false
      inpnm.required= false
      inpnc.required= false

      divcnpj.style.display = 'block';
      divrs.style.display = 'block';
      divnf.style.display = 'block';

      inpcnpj.required= true
      inprs.required= true
      inpnf.required= true

    }
  });
});