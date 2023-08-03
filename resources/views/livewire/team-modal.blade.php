<div>
    <button wire:click="toggleModal"
        class="bg-primary-100 hover:bg-primary-200 text-white border-none font-semibold py-2 px-4 rounded">
        Inscribir grupo
    </button>
    <x-dialog-modal wire:model="showModal" :id="'my-modal'" :maxWidth="'sm'">
        <form action="" method="POST" autocomplete="off" class="flex flex-col">
            @csrf
            <x-slot name="title">
                <h3 class="font-semibold text-xl">Inscribir mi grupo</h3>
            </x-slot>
            <x-slot name="content">
                <input type="hidden" name="course_id" value="{{ $course->id }}" id="courseId">
                <input type="hidden" name="program_id" value="{{ $course->program->id }}">
                <input type="hidden" name="semester" value="{{ $course->semester }}">

                <div class="">
                    <div id="fieldsContainer" class="flex flex-col">
                        <div id="fields" class="fields-group flex items-center space-x-6 my-2 relative">
                            <div class="w-full">
                                <label class="text-base font-medium mb-1">{{ __('Documento de identidad:') }}</label>
                                <input placeholder="Documento de identidad" type="text"
                                    class="dniInput w-full rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                                    name="data[][dni]" list="dniDataList">
                            </div>
                            <ul
                                class="searchResults hidden absolute left-0 -bottom-full bg-white shadow !ml-0 ring-1 ring-gray-300">
                            </ul>

                            <div class="w-full">
                                <label class="text-base font-medium mb-1">{{ __('Nombre del estudiante:') }}</label>
                                <input readonly placeholder="Nombre completo" type="text"
                                    class="fullname w-full rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                                    name="">
                            </div>
                            <input type="hidden" name="data[][id]" class="studentId">
                        </div>
                    </div>
                    <button type="button" id="addFields"
                        class="bg-primary-100 hover:bg-primary-200 text-white border-none font-semibold py-2 px-4 rounded my-2">
                        + Agregar</button>
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="w-full flex items-center justify-center space-x-4">
                    <button type="submit"
                        class="bg-primary-100 hover:bg-primary-200 text-white border-none font-semibold py-2 px-4 rounded">
                        Enviar
                    </button>
                    <button wire:click="toggleModal"
                        class="bg-white hover:bg-gray-200 text-gray-900 border-none font-semibold py-2 px-4 rounded">
                        Cerrar
                    </button>
                </div>
            </x-slot>
        </form>
    </x-dialog-modal>
</div>
