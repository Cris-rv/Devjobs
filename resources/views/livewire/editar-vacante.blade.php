<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante' novalidate>
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input 
        id="titulo" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="titulo" 
        :value="old('titulo')" required  
        placeholder="Titulo Vacante"
        />
        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
        <!--<x-input-error :messages="$errors->get('titulo')" class="mt-2" /> -->
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salaraio Mensual')" />
        <select 
        id="salario"
        wire:model="salario" 
        class="block text-sm dark:text-black dark:bg-gray-300 font-bold mb-2 w-full"
        >
        <option value=""> -- Seleccione -- </option>
        @foreach ($salarios as $salario)
        <option value="{{ $salario->id }}"> {{ $salario->salario }} </option>
        @endforeach
        </select>
        @error('salario')
        <livewire:mostrar-alerta :message="$message" />
        @enderror
       <!--<x-input-error :messages="$errors->get('salario')" class="mt-2" /> -->
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select 
        id="categoria"
        wire:model="categoria" 
        class="block text-sm dark:text-black dark:bg-gray-300 font-bold mb-2 w-full"
        >
        <option value=""> -- Seleccione -- </option>
        @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}"> {{ $categoria->categoria }} </option>
        @endforeach
        </select>
        @error('categoria')
        <livewire:mostrar-alerta :message="$message" />
         @enderror
        <!-- <x-input-error :messages="$errors->get('categoria')" class="mt-2" />-->
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input 
        id="empresa" 
        class="block mt-1 w-full dark:text-white" 
        type="text" 
        wire:model="empresa" 
        :value="old('empresa')" required  
        placeholder="Empresa: ej. Netflix, Disney+, Uber, Etc."
        />
        @error('empresa')
        <livewire:mostrar-alerta :message="$message" />
        @enderror
        <!-- <x-input-error :messages="$errors->get('empresa')" class="mt-2" />-->
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('ULtimo dia para postularse')" />
        <x-text-input 
        id="ultimo_dia" 
        class="block mt-1 w-full " 
        type="date" 
        wire:model="ultimo_dia" 
        :value="old('ultimo_dia')"
        />
        @error('ultimo_dia')
        <livewire:mostrar-alerta :message="$message" />
        @enderror
        <!-- <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />-->
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripcion Del Puesto')" />
       <textarea 
        wire:model="descripcion"
        placeholder="Descripcion general del puesto, experiencia"
        class="block text-sm text-black dark:bg-gray-300 font-bold mb-2 w-full rounded-xl h-48"
       >
       </textarea>
       @error('descripcion')
       <livewire:mostrar-alerta :message="$message" />
       @enderror
       <!-- <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />--> 
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input 
        id="imagen" 
        class="block mt-1 w-full" 
        type="file" 
        wire:model="imagen_nueva"
        accept="image/*"
        />

        <div class="my-5 w-80">
            <x-input-label :value="__('Imagen')" />

            <img src="{{ asset('storage/vacantes/' . $imagen) }}" alt="{{'imagen vacante' . $titulo}}">
        </div>

       <div class="my-5 w-80">
            @if ($imagen_nueva)
                Imagen Nueva:
                <img src="{{ $imagen_nueva->temporaryUrl() }}">
            @endif
        </div> 
        
        @error('imagen_nueva')
        <livewire:mostrar-alerta :message="$message" />
        @enderror
        <!-- <x-input-error :messages="$errors->get('titulo')" class="mt-2" />-->
    </div>

    <x-primary-button>
        Guardar Cambios
    </x-primary-button>
</form>
