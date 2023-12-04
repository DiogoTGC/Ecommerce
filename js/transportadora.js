function maskcnpj() {
  var cnpj = document.getElementById("cnpj");
  cnpj.value = cnpj.value.replace(/^(\d{2})(\d)/, "$1.$2");
  cnpj.value = cnpj.value.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
  cnpj.value = cnpj.value.replace(/\.(\d{3})(\d)/, ".$1/$2");
  cnpj.value = cnpj.value.replace(/(\d{4})(\d)/, "$1-$2");

  return cnpj.value;
}

function maskcep() {
  var cep = document.getElementById("cep");
  if (!cep) return "";
  cep.value = cep.value.replace(/\D/g, "");
  cep.value = cep.value.replace(/^(\d{5})(\d)/, "$1-$2");
  return cep.value;
}

// Função para validar o cnpj
function validacnpj() {
  // Criação das variáveis, com as tabelas de calculo, a variavel corpo do cnpj e as variaveis de soma
  var cnpj = document.getElementById("cnpj").value;
  tabelad1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2]
  tabelad2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2]
  var cnpjnum = cnpj.replaceAll(".", "").replaceAll("-", "").replaceAll("/", "")
  corpo = cnpjnum.substring(0, cnpjnum.length - 2)
  let soma1 = 0
  let soma2 = 0;

  // Calclo do Digito 1
  for (i = 0; i < corpo.length; i++) {
    soma1 += corpo.substring(i, i + 1) * tabelad1[i];
  }
  let d1 = 0;
  soma1 % 11 < 2 ? (d1 = 0) : (d1 = 11 - (soma1 % 11))
  corpo = corpo + d1;

  // Calculo do Digito 2
  for (i = 0; i < corpo.length; i++) {
    soma2 += corpo.substring(i, i + 1) * tabelad2[i];
  }
  let d2 = 0;
  soma2 % 11 < 2 ? (d2 = 0) : (d2 = 11 - (soma2 % 11));

  // valida caso o cnpj não esteja em branco
  if (cnpj.length > 0) {

    // Verifica se o cnpj é menor que 18 digitos
    if (cnpj.length < 18) {
      document.getElementById("cnpj").setCustomValidity("O CNPJ Digitado é invalido");
      document.getElementById("cnpj").classList.add("invalid");
      return;
    }
    // Verifica se os digitos são invalidos
    if (!(cnpj.substring(16, 17) == d1 && cnpj.substring(17, 18) == d2)) {
      document.getElementById("cnpj").setCustomValidity("O CNPJ Digitado é invalido");
      document.getElementById("cnpj").classList.add("invalid");

    } else {
      // Deixa o Input valido, sem mensagens de erro e remove a classe invalid do CSS
      document.getElementById("cnpj").setCustomValidity("");
      document.getElementById("cnpj").classList.remove("invalid");
    }
  }
}

// Função para buscar o CEP
async function APIcep() {
  var cep = document.getElementById("cep")

  try {
    let response = await fetch(`https://viacep.com.br/ws/${cep.value}/json/`);
    let data = await response.json();

    if (data.erro) {
      cep.setCustomValidity("CEP Invalido");
      cep.classList.add("invalid");
      cep.focus();
      limpar();
      return;
    }

    limpar()
    cep.setCustomValidity("");
    cep.classList.remove("invalid");
    cepdata(data);


  } catch (error) {
    limpar()
    cep.setCustomValidity("CEP Invalido");
    cep.classList.add("invalid");
    cep.focus();
  }
}

function limpar() {
  let endereco = document.getElementById("endereco");
  let bairro = document.getElementById("bairro");
  let cidade = document.getElementById("cidade");
  let estado = document.getElementById("estado");

  endereco.setAttribute("readonly", "");
  endereco.classList.remove("validate")
  endereco.value = "";

  bairro.setAttribute("readonly", "");
  bairro.classList.remove("validate")
  bairro.value = "";

  cidade.setAttribute("readonly", "");
  cidade.classList.remove("validate")
  cidade.value = "";

  estado.setAttribute("readonly", "");
  estado.classList.remove("validate")
  estado.value = "";
}

// Função para preencher os campos com o retorno da API
function cepdata(data) {

  document.getElementById("endereco").value = data.logradouro;
  document.getElementById("bairro").value = data.bairro;
  document.getElementById("cidade").value = data.localidade;
  document.getElementById("estado").value = data.uf;

  readonly();
}

// função para readonly
function readonly() {

  let endereco = document.getElementById("endereco");
  let bairro = document.getElementById("bairro");
  let cidade = document.getElementById("cidade");
  let estado = document.getElementById("estado");

  if (endereco.value != "") {
    endereco.focus()
    endereco.setAttribute("readonly", "")
  } else {
    endereco.classList.add("validate")
    endereco.removeAttribute("readonly", "");
  }

  if (bairro.value != "") {
    bairro.focus()
    endereco.setAttribute('readonly', "")
  } else {
    bairro.classList.add("validate")
    bairro.removeAttribute("readonly", "");
  }

  if (cidade.value != "") {
    cidade.focus()
    cidade.setAttribute("readonly", "")
  } else {
    cidade.classList.add("validate")
    cidade.removeAttribute("readonly", "");
  }

  if (estado.value != "") {
    estado.focus()
    estado.setAttribute("readonly", "")
  } else {
    estado.classList.add("validate")
    estado.removeAttribute("readonly", "");
  }
}