<div class="flex min-h-screen flex-col items-center justify-center bg-blue-100">

    <div class="flex flex-col w-1/3 bg-white p-4 rounded-md items-center">
        <h1 class="uppercase">Procure seu cep</h1>

        <input wire:model="inputCep"
               name="cep"
               id="searchCep"
               placeholder="00000-000"
               type="text"
               class="w-full border-2 border-gray-50 rounded-md p-2 my-8"
        />

        <button wire:click="execute" wire:loading.attr="disabled"
                id="btnSearch"
                class="flex flex-col lg:flex-row items-center bg-blue-200 hover:bg-blue-100 p-4 border-gray-50 rounded-md uppercase"
        >
            <div class="flex flex-row" id="btnContent">
                <span class="mr-2">Procurar</span>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>

            @include('components.spinner', ['action' => 'execute'])
        </button>
    </div>

    @isset($data['cep'])
        <div class="transition-all flex-col w-1/3 bg-white p-4 rounded-md items-start mt-8" id="result">
            <div class="flex flex-row items-center">
                <h3 class="font-bold mr-2">Endereço:</h3>
                <p>{{ $data['logradouro'] ?? '' }}</p>
            </div>
            <div class="flex flex-row items-center">
                <h3 class="font-bold mr-2">Bairro:</h3>
                <p>{{ $data['bairro'] ?? '' }}</p>
            </div>
            <div class="flex flex-row items-center">
                <h3 class="font-bold mr-2">Cidade:</h3>
                <p>{{ $data['localidade'] ?? '' }}</p>
            </div>
            <div class="flex flex-row items-center">
                <h3 class="font-bold mr-2">Estado:</h3>
                <p>{{ $data['uf'] ?? '' }}</p>
            </div>
            <div class="flex flex-row items-center">
                <h3 class="font-bold mr-2">Cep:</h3>
                <p>{{ $data['cep'] ?? '' }}</p>
            </div>
        </div>
    @endisset

    @include('livewire.validations.global-validation')
</div>
