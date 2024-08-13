<div>

    <livewire:filtrar-vacantes />
   <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 dark:text-white mb-12 px-3.5">
                Nuestas vacantes disponibles
            </h3>

            <div class="mx-5 md:mx-0 bg-gray-300 dark:bg-white shadow-xl rounded-lg p-6 divide-y divide-gray-800">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a
                            class="text-3xl font-extrabold text-gray-800" 
                            href="{{ route('vacantes.show', $vacante->id) }}">
                                {{$vacante->titulo}}
                            </a>
                            <p class="text-base text-gray-600 mb-1 mt-1">{{ $vacante->empresa }}</p>
                            <p class="text-xs font-bold text-gray-600 mb-1 mt-1">{{ $vacante->categoria->categoria }}</p>
                            <p class="text-base text-gray-600 mb-1 mt-1">{{ $vacante->salario->salario }}</p>
                            <p class="font-bold text-sm text-gray-600 mb-5 md:mb-0">
                                Ultimo dia para postularse: 
                                <span class="font-normal">{{$vacante->ultimo_dia->format('d/m/y')}}</span>
                            </p>
                        </div>

                        <div>
                            <a
                            class="bg-green-600 p-3 text-sm uppercase font-bold rounded-lg block text-center" 
                            href="{{ route('vacantes.show', $vacante->id) }}">
                                Ver vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aún.</p>
                @endforelse
            </div>
        </div>
   </div>
</div>
