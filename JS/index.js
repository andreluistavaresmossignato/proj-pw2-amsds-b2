// variaveis

// Elementos DOM
const txtInfos = document.getElementById('infos')
const txtPadrao = document.getElementById('txtPadrao')
const txtIdade = document.getElementById('txtIdade')
const txtTemperatura = document.getElementById('txtTemperatura')

// funções
function aparecerTexto(metodo) {
    txtPadrao.style.display = 'none'
    txtInfos.style.border = '1px solid black'

    switch (metodo) {
        case 'idade': 
        txtIdade.style.display = 'block'
        txtInfos.style.backgroundColor = 'var(--btnIdadeColor)'
        break

        case 'temperatura':
        txtTemperatura.style.display = 'block'
        txtInfos.style.backgroundColor = 'var(--btnTemperaturaColor)'
        break
    }
}

function someTexto(metodo) {
    txtPadrao.style.display = 'block'
    txtInfos.style.border = 'none'
    txtInfos.style.backgroundColor = 'white'
    
    switch (metodo) {
        case 'idade': 
        txtIdade.style.display = 'none'
        break

        case 'temperatura':
        txtTemperatura.style.display = 'none'
        break
    }
}