
<footer class="Footer bg-secondary !text-primary-200">
    <div class="w-full max-w-screen-xl mx-auto p-4 py-8">
        <div class="flex items-center space-x-12 justify-between">
            <div class="flex items-center">
                <a href="{{ route('dashboards') }}" class="flex items-center mb-0 tablet:mb-4">
                    <img src="{{ asset('img/evaluer-logo-2.png') }}" class="w-96 rounded-lg" alt="Evaluer Logo" />
                </a>
            </div>
            <div>
                <span class="font-bold text-lg">Sobre nosotros</span>
                <p class="text-base font-medium">Evaluer es una plataforma que permite establecer los pasos
                    específicos para el buen manejo y administración de los recursos digitales que se hacen
                    con la entrega de estos, para la Gestión de Proyectos de Grado en la Corporacion
                    Universitaria Autonoma de Nariño, esto con el fin de promover una interacción entre el
                    estudiante y el docente.</p>
            </div>
            <div>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium tablet:mb-0">
                    <li>
                        <a href="#" class="mr-4 hover:underline tablet:mr-6 ">About</a>
                    </li>
                    <li>
                        <a href="#" class="mr-4 hover:underline tablet:mr-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="mr-4 hover:underline tablet:mr-6 ">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="my-6 border-primary-200 mx-auto laptop:my-8" />
        <span class="block text-sm text-center">Copyright &copy; 2023 - {{ date('Y') }} Evaluer. All rights
            reserved.</span>
    </div>
</footer>