<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/site.css">
    <link rel="stylesheet" href="./fontawesome6/fontawesome-free-6.5.1-web/css/all.min.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="row"  id="front">
        <div class="col-xs-12 col-md-4 col-lg-3">
            <header id="menu">
                <div class="pofile">
                    <img src="./img/profile.jpg" id="profile-img" alt="">
                    <h1 id="profile-name">Paulo Macario</h1>
                    <div class="social mt-3 text-center">
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#"><i class="fa-brands fa-github"></i></a>
                        <a href="#"><i class="fa-regular fa-envelope"></i></a>
                    </div>
                </div>
                <nav>
                    <ul>
                        <li>
                            <a href="" class="link-menu link-menu d-flex">
                                <div class="icon-menu">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div>
                                    Sobre
                                </div>
                            </a>
                            </li>
                        <li>
                            <a href=""  class="link-menu link-menu d-flex">
                                  <div class="icon-menu">
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>
                                <div>
                                    Esperiências
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href=""  class="link-menu d-flex">
                                <div class="icon-menu">
                                    <i class="fa-solid fa-computer"></i>
                                </div>
                                <div>
                                    Habilidades
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href=""  class="link-menu link-menu d-flex">
                                  <div class="icon-menu">
                                    <i class="fa-regular fa-envelope"></i>
                                </div>
                                <div>
                                    Contato
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="link-menu link-menu d-flex">
                                <div class="icon-menu">
                                    <i class="fa-regular fa-window-restore"></i>
                                </div>
                                <div>
                                    Aplicações
                                </div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>
            <footer id="footer">
                <p class="text-center">© Copyright PauloMacari</p>
                <p class="text-center">Designed by PauloMacario</p>
            </footer>
        </div>
        <div class="col-xs-12 col-md-8 col-lg-9">
            <section >
                <div class="message d-flex align-items-center justify-content-center">
                    <h1 class="text-center">Site em construção... </h1>
                </div>
            </section>
        </div>
    </div>
    {{-- <main>
        main
    </main> --}}


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="./fontawesome6/fontawesome-free-6.5.1-web/js/all.min.js"></script>
  </body>
</html>