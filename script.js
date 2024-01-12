$(() => {
    gerarNumeros()
})

var numeros = []
var jogos = []
var countAcertos = 0

const gerarNumeros = () => {

    for (let i = 0; i <= 99; i++) {
        numeros.push({
            num: i,
            selected: false,
            premiado: false,
        })
    }

    renderNumeros()

}

const renderNumeros = () => {

    let html = ''

    const container = $('.numeros-container')

    container.empty()

    numeros.forEach((e, key) => {

        if(e.num === 0)
            e.num = '00'

        let isSelected = false

        if(e.selected)
            isSelected = 'bg-success'
        else 
            isSelected = ''

        let isPremiado = false

        if(e.premiado)
            isPremiado = 'bg-warning'
        else
            isPremiado = ''

        html += `<p class="m-0 number ${isSelected} ${isPremiado}" data-id="${e.num}">${e.num}</p>`

    })

    container.html(html)

}

const addNumbers = ({target}) => {

    const elm = $(target)

    const numberSelect = elm.data('id')

    const countSelecteds = numeros.reduce((count, num) => {
        return count + (num.selected === true ? 1 : 0);
    }, 0);

    if(countSelecteds == 50)
        return alert('Você já selecionou 50 números!')

    numeros.forEach((e, key) => {

        e.num == numberSelect ? e.selected = true : ''

    })

    renderNumeros()

}

const saveGame = async () => {

    const url = `/backend/save-game.php`

    const data = {
        numbers: numeros
    }

    const response = await $.post(url, data)

    if(!response.status)
        return alert(response.message)
}

const renderJogos = async () => {

    const url = `/backend/get-game.php`

    let jogo_id = 1

    const data = {
        id: jogo_id
    }

    const response = await $.get(url, data)

    if(!response.status)
        return alert(response.message)

    numeros.forEach((num, key) => {

        response.data.forEach((e, key) => {

            e.numero == num.num ? num.selected = true : ''
    
        })
    })

    verificaResultado()
}

const verificaResultado = () => {

    let resultado = [6,9,19,21,23,32,34,36,45,49,62,65,66,67,86,88,89,91,92,95]

    numeros.forEach((num, key)=> {

        resultado.forEach((e, key) => {

            if(num.num === e && num.selected === true){
                num.premiado = true
                return
            }
        })

    })

    countAcertos = numeros.reduce((count, num) => {
        return count + (num.premiado === true ? 1 : 0);
    }, 0);

    $('.acertos').html(countAcertos + ' acertos');

    renderNumeros()


}

// Eventos

$(document).on('click', '.number', addNumbers)

$(document).on('click', '.bg-success', function() {

    const elm = $(this)

    const id = elm.data('id')

    numeros.forEach((e, key) => {

        e.num == id ? e.selected = false : ''

    })

    renderNumeros()

})

$('.btn-gerar-resultado').click(renderJogos)

$('#btn-save-game').click(saveGame)


