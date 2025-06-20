// Elementos DOM
const txtInfos = document.getElementById('infos');
const txtPadrao = document.getElementById('txtPadrao');
const txtIdade = document.getElementById('txtIdade');
const txtTemperatura = document.getElementById('txtTemperatura');

// funções
function ocultarTextos() {
    txtPadrao.classList.remove('active');
    txtIdade.classList.remove('active');
    txtTemperatura.classList.remove('active');
}

function aparecerTexto(metodo) {
    ocultarTextos();

    switch (metodo) {
        case 'idade': 
            txtIdade.classList.add('active');
            txtInfos.style.backgroundColor = 'var(--btnIdadeColor)';
            break;
        case 'temperatura':
            txtTemperatura.classList.add('active');
            txtInfos.style.backgroundColor = 'var(--btnTemperaturaColor)';
            break;
    }
}

function someTexto(metodo) {
    ocultarTextos();
    txtPadrao.classList.add('active');
    txtInfos.style.backgroundColor = 'var(--corPrimaria)';
}