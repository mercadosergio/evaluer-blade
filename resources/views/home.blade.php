<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | Evaluer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    @vite(['resources/css/home.css', 'resources/css/app.css'])
    @livewireStyles
</head>

<body>
    <header class="Header">
        <nav class="Header-nav">
            <div class="Header-container_logo">
                <img src="{{ asset('img/aunar-logo-2.png') }}" class="logo-aunar">
                <a class="" href="home">
                    <img src="{{ asset('img/evaluer-logo-1.png') }}" class="logo-evaluer">
                </a>
            </div>

            <ul class="Header-ul">
                <li class="Header-li"><a class="Header-a" href="">Inicio</a></li>
                <li class="Header-li"><a class="Header-a" href="">Consulta</a></li>
                <li class="Header-li"><a class="Header-a" href="">Información</a></li>
            </ul>
        </nav>
    </header>
    <main class="Main">
        <section class="Home bg-cover bg-no-repeat bg-center flex flex-col laptop:flex-row min-h-screen">
            <div class="hidden laptop:block text-white my-auto mx-3 ml-10">
                <h1 class="text-4xl desktop:text-5xl mb-3 font-bold">Bienvenido!</h1>
                <p class="text-left font-semibold tablet:text-xl laptop:text-2xl desktop:text-3xl text-white">
                    Éste es el campus
                    virtual de seguimiento
                    e investigación. Interactua con entregas de proyectos de grado, evaluaciones, comentarios y notas.
                </p>
            </div>

            <div class="my-auto relative w-full laptop:w-5/6">
                <div
                    class="w-11/12 m-auto tablet:w-1/2 laptop:absolute laptop:right-12 laptop:w-80 p-6 laptop:top-1/2 laptop:-translate-y-1/2 desktop:w-96 desktop:p-7 bg-[#f7f3f3bd]">
                    <form autocomplete="off" class="flex flex-col items-center" action="{{ route('login') }}"
                        method="POST">
                        @csrf
                        <h3 class="text-xl mb-5 font-bold text-center">Ingresa a tu cuenta</h3>

                        <label class="w-full text-start text-base font-bold mt-4 mb-1">Usuario/Email</label>
                        <div class="w-full flex relative">
                            <input
                                class="bg-white border border-gray-400 pl-10 text-black placeholder-gray-600 text-base rounded-md focus:ring-0 block w-full p-2.5 placeholder-opacity-100 placeholder:duration-1000 focus:placeholder-opacity-0 focus:placeholder:translate-x-full"
                                type="text" require placeholder="Ingrese su usuario" name="username">
                            <i
                                class="bi bi-person-fill text-2xl text-gray-500 absolute left-2 top-1/2 -translate-y-1/2"></i>
                        </div>
                        @error('username')
                            <span class="w-full text-start text-base text-red-600 font-medium">{{ $message }}
                            </span>
                        @enderror

                        <label class="w-full text-start text-base font-bold mt-4 mb-1">Contraseña</label>
                        <div class="w-full flex relative">
                            <input
                                class="bg-white border border-gray-400 pl-10 text-black placeholder-gray-600 text-base rounded-md focus:ring-0 block w-full p-2.5 placeholder-opacity-100 placeholder:duration-1000 focus:placeholder-opacity-0 focus:placeholder:translate-x-full"
                                type="password" require placeholder="Ingrese su contraseña" name="password">
                            <i
                                class="bi bi-key-fill text-2xl text-gray-500 absolute left-2 top-1/2 -translate-y-1/2"></i>
                        </div>
                        @error('password')
                            <span class="w-full text-start text-base text-red-600 font-medium">{{ $message }}
                            </span>
                        @enderror
                        <button
                            class="w-full text-white font-semibold bg-primary-100 hover:bg-primary-200 rounded mb-4 py-2 px-4 mt-4"
                            type="submit" name="login">Iniciar sesión</button>

                        <p class="text-justify text-base">Una vez registrado, su usuario y
                            contraseña será su
                            documento de identidad.</p>
                    </form>
                </div>
            </div>
        </section>

        <section class="w-full">
            <div class="bg-secondary flex items-center justify-center p-5 desktop:p-7">
                <h3 class="text-xl desktop:text-3xl text-primary-100">CAMPUS EDUCATIVO AUNAR</h3>
            </div>

            <div class="flex flex-col tablet:flex-row h-full w-full object-cover">
                <div class="bg-gray-200 w-full p-7 tablet:p-10 laptop:w-1/2 laptop:p-14">
                    <p class="text-base desktop:text-xl m-auto text-justify text-black">La Corporación
                        Universitaria Autónoma de Nariño Extensión Cartagena fomenta el
                        desarrollo
                        académico y administrativo de los programas, es una Institución de Educación Superior
                        comprometida con la Cultura, la Investigación, el Emprendimiento y el Bilingüismo, que forman
                        profesionales íntegros y Líderes en el Desarrollo Social. A través de nuestras herramientas
                        fortalecemos y promovemos una experiencia que posibilite la excelencia académica de toda la
                        comunidad, para contribuir al desarrollo integral y sostenible; en el campus Aunar Cartagena te
                        encontrarás con diversas actividades organizadas por el equipo estudiante que mejoran el
                        bienestar educativo.
                    </p>
                </div>
                <div class="Campus-img bg-black w-full tablet:w-1/2 bg-cover bg-no-repeat bg-center">

                </div>
            </div>
        </section>
    </main>

    @include('components.shared.footer')
    @livewireScripts
</body>

</html>
