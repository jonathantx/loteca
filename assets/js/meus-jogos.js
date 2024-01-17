$(() => {
    // gerarNumeros()
    getJogos()
})

var numeros = []
var jogos = []
var countAcertos = 0

const getJogos = async () => {

    const url = `/backend/get-game.php`

    const response = await $.get(url)

    if(!response.status)
        return alert(response.message)

    renderJogos(response.data)

}

const renderJogos = (data) => { 

    let html = ''

    const container = $('.container-jogos')

    container.empty()

    data.forEach((e, key) => {

        $('.resultado').html('Resultado: ' + e.data)
 
        let numerosHtml = ''

        let countAcertos = ''

        countAcertos = e.numeros.reduce((count, num) => {
            return count + (num.premiado === true && num.selected == true ? 1 : 0);
        }, 0)

        $('.acertos').html(countAcertos + ' acertos');

        e.numeros.forEach((n, k) => {

            if(n.numero <= 9)
                '0' + n.numero 

            numerosHtml += `<p class="m-0 number ${n.selected ? 'bg-warning' : ''}" ${n.premiado ? 'style="background-color: #38c138 !important; border: 1px solid #38c138 !important;"' : ''} data-id="${n.numero}">${n.numero}</p>`
    
        })

        html += `
        <div class="jogos-container">
            <h4 class="m-0">Concurso: ${e.concurso}</h4>
            <h4 class="m-0">${countAcertos} Acertos</h4>
            <div class="numeros-container">
                ${numerosHtml}
            </div>
        </div>
        `

    })



    container.html(html)

}


