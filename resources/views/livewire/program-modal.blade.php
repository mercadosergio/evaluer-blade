<div class="my-auto">
    <button wire:click="toggleModal"
        class="bg-primary-100 hover:bg-primary-200 text-white border-none font-semibold py-1 px-2 rounded">
        <i class='bi bi-pencil-fill'></i>
    </button>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">
        <x-slot name="title">
            <h3 class="font-semibold text-xl">Editar usuario</h3>
        </x-slot>
        <x-slot name="content">
            <form action="{{ route('update.user', $profile->user) }}" id="users-form" method="POST" autocomplete="off"
                class="">
                @method('PUT')
                @csrf
                <input type="hidden" value="{{ $profile->user->role->id }}" name="role_id">

                <div class="flex flex-col px-8">
                    <div class="flex items-center justify-between my-3">
                        <label class="Modal-label">Nombres:</label>
                        @error('name')
                            <span class="w-full text-start text-base text-red-600 font-medium">{{ $message }}</span>
                        @enderror
                        <input type="text"
                            class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                            id="names" name="name" value="{{ $profile->names }}">
                    </div>
                    <div class="flex items-center justify-between my-3">
                        <label class="Modal-label">Primer apellido:</label>
                        @error('first_lastname')
                            <span class="w-full text-start text-base text-red-600 font-medium">{{ $message }}</span>
                        @enderror
                        <input type="text"
                            class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                            id="lastname1" name="first_lastname" value="{{ $profile->first_lastname }}">
                    </div>
                    <div class="flex items-center justify-between my-3">
                        <label class="Modal-label">Segundo apellido:</label>
                        @error('second_lastname')
                            <span class="w-full text-start text-base text-red-600 font-medium">{{ $message }}</span>
                        @enderror
                        <input type="text"
                            class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                            id="lastname2" name="second_lastname" value="{{ $profile->second_lastname }}">
                    </div>
                    <div class="flex items-center justify-between my-3">
                        <label class="Modal-label">Documento de identidad:</label>
                        @error('dni')
                            <span class="w-full text-start text-base text-red-600 font-medium">{{ $message }}</span>
                        @enderror
                        <input type="text"
                            class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                            id="dni" name="dni" value="{{ $profile->dni }}">
                    </div>

                    <div class="flex items-center justify-between my-3">
                        <label class="Modal-label">Email:</label>
                        @error('email')
                            <span class="w-full text-start text-base text-red-600 font-medium">{{ $message }}</span>
                        @enderror
                        <input type="text"
                            class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                            id="email" name="email" value="{{ $profile->user->email }}">
                    </div>

                    <div class="flex items-center justify-between my-3">
                        <label class="Modal-label">Programa:</label>
                        @error('program')
                            <span class="w-full text-start text-base text-red-600 font-medium">{{ $message }}</span>
                        @enderror
                        <select name="program"
                            class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6">
                            <option value="1">Seleccione...</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}"
                                    {{ $program->id === $profile->program->id ? 'selected' : '' }}>
                                    {{ $program->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @if ($profile->user->role->id == 1)
                        <div class="flex items-center justify-between my-3">
                            <label class="Modal-label" id="lbl-semestre">Semestre:</label>
                            @error('semester')
                                <span
                                    class="w-full text-start text-base text-red-600 font-medium">{{ $message }}</span>
                            @enderror
                            <input type="number" max="9" min="6"
                                class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                                id="semester" name="semester" value="{{ $profile->semester }}">
                        </div>
                    @endif

                </div>
                <button type="submit"
                    class="bg-primary-100 hover:bg-primary-200 text-white border-none font-semibold py-2 px-4 rounded">
                    Enviar
                </button>
            </form>
        </x-slot>

        <x-slot name="footer">
            <div class="w-full flex items-center justify-center space-x-4">
                <button wire:click="toggleModal"
                    class="bg-white hover:bg-gray-200 text-gray-900 border-none font-semibold py-2 px-4 rounded">
                    Cerrar
                </button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
