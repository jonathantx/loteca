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

    // numeros.forEach((num, key) => {

    //     response.data.forEach((e, key) => {

    //         e.numero == num.num ? num.selected = true : ''
    
    //     })
    // })

    // renderNumeros()

    // verificaResultado()
}

const renderJogos = (data) => { 

    gerarNumeros()

    let html = ''

    const container = $('.container-jogos')

    container.empty()

    

    data.forEach((e, key) => {

      
        let numerosHtml = ''

        numeros.forEach((n, k) => {


            e.numerais.filter((elm, i) => elm == n.num ? n.selected = true : '')

            if(n.num === 0)
                n.num = '00'

            // let isSelected = 

            // let isPremiado = 

            numerosHtml += `<p class="m-0 number ${n.selected ? 'bg-warning' : ''}" ${n.premiado ? 'style="background-color: #38c138 !important; border: 1px solid #38c138 !important;"' : ''} data-id="${n.num}">${n.num}</p>`

                html = `
                    <div class="jogos-container">
                        <h4>Jogo:</h4>
                        <div class="numeros-container">
                            ${numerosHtml}
                        </div>
                    </div>
                    `


            


            let numerosHtml = ''

            // e.numerais.forEach((n) => {
            //     numerais += `<p>${n}</p>`
            // })

            if(e.num === 0)
                e.num = '00'
    
            let isSelected = e.selected ? 'bg-warning' : ''
    
            let isPremiado = e.premiado ? 'style="background-color: #38c138 !important; border: 1px solid #38c138 !important;"' : ''
    
            numerosHtml += `<p class="m-0 number ${isSelected}" ${isPremiado} data-id="${n.num}">${n.num}</p>`
    
        })





    })



    container.html(html)

}

const gerarNumeros = () => {

    for (let i = 0; i <= 99; i++) {

        if(i <= 9)
            i = '0' + i 

        // i = parseInt(i, 2)

        numeros.push({
            num: i,
            selected: false,
            premiado: false,
        })
    }

    // renderNumeros()

}

// const renderNumeros = () => {

  

// }




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

// $(document).on('click', '.bg-success', function() {

//     const elm = $(this)

//     const id = elm.data('id')

//     numeros.forEach((e, key) => {

//         e.num == id ? e.selected = false : ''

//     })

//     renderNumeros()

// })

// $('.btn-gerar-resultado').click(renderJogos)


