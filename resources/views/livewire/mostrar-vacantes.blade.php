<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
        <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between items-end">
            <div class="space-y-5">
                <a
                href="{{ route('vacantes.show', $vacante->id) }}"
                class="text-xl font-bold">
                    {{$vacante->titulo}}
                </a>
                <p>{{ $vacante->empresa }}</p>
                <p class="text-sm text-gray-500">Ultimo dia: {{$vacante->ultimo_dia->format('d/m/y')}}</p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch md:items-center gap-3  mt-5 md:mt-0">
                <a href="{{ route('candidatos.index', $vacante) }}"
                class="bg-slate-800 dark:bg-blue-500 py-2 px-4 rounded-lg text-white text-xs font-bold text-center my-3"
                >
                    {{$vacante->candidatos->count()}}
                    Candidatos
                </a>

                <a href="{{ route('vacantes.edit', $vacante->id) }}"
                class="bg-blue-500 dark:bg-green-700 py-2 px-4 rounded-lg text-white text-xs font-bold text-center my-3"
                >
                    Editar
                </a>

                <button
                    wire:click="$emit('mostrarAlerta', {{ $vacante->id }})"
                    class="bg-red-700 py-2 px-4 rounded-lg text-white text-xs font-bold text-center my-3"
                >
                    Eliminar
                </button>
            </div>
        </div>
        @empty
        <p class="text-center text-gray-600 text-sm md:text-xl p-5">
            No hay vacantes que mostrar
        </p>
    @endforelse
    </div>

    <div class="mt-10 mx-5 md:mx-0">
        {{ $vacantes->links() }}
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
                Livewire.on('mostrarAlerta', $vacanteId => {
                    Swal.fire({
                    title: "¿Eliminar Vacante?",
                    text: "Una vacante eliminada no se puede recuperar!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, ¡Elimina la Vacante!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                if (result.isConfirmed) {
                    //Eliminar la vacante
                    Livewire.emit('eliminarVacante', $vacanteId)

                    Swal.fire({
                    title: "Se elimino la vacante!",
                    text: "Eliminado correctamente.",
                    icon: "success"
                    });
                }
                });
            })
        </script>
    @endpush
</div>
