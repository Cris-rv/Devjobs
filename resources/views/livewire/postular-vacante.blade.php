<div>
    @auth
    <div class="bg-gray-300 dark:bg-gray-500 p-5 mt-10 flex justify-center flex-col items-center">
        
        <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

        @if (session()->has('mensaje'))
            <p class="border border-green-600 bg-green-200 text-green-700 font-bold p-2 my-5">
                {{ session('mensaje') }}
            </p>

        @else
        <form wire:submit.prevent='postularme' class="w-96 mt-5 flex flex-col items-center justify-center">
            <div class="mb-4 ">
                <x-input-label for="cv" class="text-gray-800 dark:text-white lowercase text-center" :value="__('Curriculum u Hoja vida (PDF)')" />
                <x-text-input id="cv"  type="file" wire:model="cv" accept=".pdf" class="block mt-6 w-64 md:w-full" />
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message">
            @enderror

            <div>
                <x-primary-button class="my-3">
                    Postularme
                </x-primary-button>
            </div>

        </form>
        @endauth
        @endif
    </div>
</div>
