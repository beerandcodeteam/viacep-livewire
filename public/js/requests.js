function findCep() {
    const searchCep = document.getElementById('searchCep');
    const errorBox = document.getElementById('errorBox');
    const divResult = document.getElementById('result')

    divResult.classList.remove('flex')
    divResult.classList.add('hidden')

    errorBox.classList.remove('flex')
    errorBox.classList.remove('p-4')
    errorBox.classList.add('invisible')

    toggleLoading()


    fetch(`http://viacep.com.br/ws/${searchCep.value}/json/`).then(result => {
            result.json().then(response => {
                if (!response.erro) {
                    

                    if (divResult.classList.contains('hidden')) {
                        divResult.classList.remove('hidden')
                        divResult.classList.add('flex')
                    }

                    const address = document.getElementById('address')
                    const neighborhood = document.getElementById('neighborhood')
                    const city = document.getElementById('city')
                    const state = document.getElementById('state');
                    const cep = document.getElementById('cep');

                    address.innerText = response.logradouro
                    neighborhood.innerText = response.bairro
                    city.innerText = response.localidade
                    state.innerText = response.uf
                    cep.innerText = response.cep

                    searchCep.value = "";
                } else {
                    showError('Cep inválido!')
                }

                toggleLoading()
            })
        })
        .catch(error => {
            showError('Ocorreu um erro, tente novamente mais tarde!')
            toggleLoading()
        })
}

function showError(message) {
    const errorBox = document.getElementById('errorBox');

    if (errorBox.classList.contains('invisible') ) {
        errorBox.classList.remove('invisible')
        errorBox.classList.add('flex')
        errorBox.classList.add('p-4')
        const messageSpan = document.getElementById('errorMessage')
        messageSpan.innerText = message
    }
}

function toggleLoading() {

    const btnContent = document.getElementById('btnContent')
    const loading = document.getElementById('loading')

    if (btnContent.classList.contains('flex')) {
        btnContent.classList.remove('flex')
        btnContent.classList.add('hidden')
    
        loading.classList.remove('hidden')
        loading.classList.add('flex')
    } else {
        btnContent.classList.add('flex')
        btnContent.classList.remove('hidden')

        loading.classList.remove('flex')
        loading.classList.add('hidden')
    }

}