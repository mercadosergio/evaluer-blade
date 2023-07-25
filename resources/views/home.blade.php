<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | Evaluer</title>

    @vite(['resources/css/home.css'])
</head>

<body>
    <header class="Header">
        <nav class="Header-nav">
            <div class="Header-container_logo">
                <img src="{{ asset('img/aunar-logo-2.png') }}" class="logo-aunar">
                <a class="navbar-brand" href="home">
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
        <section class="Home">
            <div class="Welcome">
                <h1 class="Welcome-h1">Bienvenido!</h1>
                <p class="Welcome-p" style="text-align: justify; font-size: 28px; color: white;">Éste es el campus
                    virtual de seguimiento
                    e investigación. Interactua con entregas de proyectos de grado, evaluaciones, comentarios y notas.
                </p>
            </div>

            <div class="Login">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <h3 class="Login-h3" style="text-align: center;">Ingresa a tu cuenta</h3>
                    <label class="Login-label">Usuario/Email</label>

                    <div class="form-input">
                        <input class="Login-input" type="text" require placeholder="Ingrese su usuario"
                            name="username">
                        <i class="Login-i fa-user"></i>
                    </div>

                    <label class="Login-label">Contraseña</label>
                    <div class="form-input">
                        <input class="Login-input" type="password" require placeholder="Ingrese su contraseña"
                            name="password">
                        <i class="Login-i fa-unlock-keyhole"></i>
                    </div>
                    <button class="Login-button" type="submit" name="login">Iniciar sesión</button>

                    <p class="Login-p">Una vez registrado, su usuario y
                        contraseña será su
                        documento de identidad.</p>

                </form>
            </div>
        </section>

        <section class="Campus">
            <div class="Campus-title">
                <h3 class="Campus-h3">CAMPUS EDUCATIVO AUNAR</h3>
            </div>

            <div class="Campus-content">
                <article class="Campus-article">
                    <p class="Campus-p">La Corporación Universitaria Autónoma de Nariño Extensión Cartagena fomenta el
                        desarrollo
                        académico y administrativo de los programas, es una Institución de Educación Superior
                        comprometida con la Cultura, la Investigación, el Emprendimiento y el Bilingüismo, que forman
                        profesionales íntegros y Líderes en el Desarrollo Social. A través de nuestras herramientas
                        fortalecemos y promovemos una experiencia que posibilite la excelencia académica de toda la
                        comunidad, para contribuir al desarrollo integral y sostenible; en el campus Aunar Cartagena te
                        encontrarás con diversas actividades organizadas por el equipo estudiante que mejoran el
                        bienestar educativo.
                    </p>
                </article>
                <article class="Campus-img">

                </article>
            </div>
        </section>
    </main>

    <!-- FOOTER -->

    <footer class="Footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="Footer-info">
                        <section class="Footer-about">
                            <h3 class="Footer-h3" for="">Sobre nosotros</h3>
                            <p class="Footer-p">Evaluer es una plataforma que permite establecer los pasos
                                específicos para el buen manejo y administración de los recursos digitales que se hacen
                                con la entrega de estos, para la Gestión de Proyectos de Grado en la Corporacion
                                Universitaria Autonoma de Nariño, esto con el fin de promover una interacción entre el
                                estudiante y el docente.</p>
                        </section>

                        <section class="Footer-team">
                            <h3 class="Footer-h3 team-title">Equipo de desarrollo</h3>
                            <div class="Footer-div">
                                <label>Sergio Mercado</label>
                                <img class="Footer-img" width="100" src="{{ asset('img/foto-sergio.jpg') }}"
                                    alt="">
                            </div>
                            <div class="Footer-div">
                                <label>Dager Lopez</label>
                                <img class="Footer-img" width="100" src="{{ asset('img/foto-dager.png') }}"
                                    alt="">
                            </div>
                        </section>
                    </div>
                    <p class="copyright-text">Copyright &copy; 2023 - {{ date('Y') }} Evaluer. All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
