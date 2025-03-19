<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
      {{--   <meta 
            name="viewport" 
            content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}
        <meta 
            name="viewport" 
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <link 
            rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
            crossorigin="anonymous">
        <link 
            rel="stylesheet" 
            href="./css/site.css">
        <link 
            rel="stylesheet" 
            href="./fontawesome6/fontawesome-free-6.5.1-web/css/all.min.css">       

        <link 
            rel="preconnect" 
            href="https://fonts.googleapis.com">

        <link 
            rel="preconnect" 
            href="https://fonts.gstatic.com" 
            crossorigin>
        <link 
            href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@400..800&family=Dosis:wght@200..800&display=swap" 
            rel="stylesheet">
        <title>Paulo Macario</title>
    </head>
    <body>
       
            <header>
                <p id="btn-bar" data-toggle="false">
                    <i class="fa-solid fa-bars fa-lg"></i>
                </p>
            </header>
          
            <section id="menu-nav" style="display:none;">
                <div id="avatar">
                    <img src="{{ asset('/img/avatar_1.png') }}" alt="">
                </div>
                <div id="box-menu-nav" class="box-menu-nav">
                    <ul>
                        <a href="#" class="ancor-link-menu-nav">
                            <li class="menu-nav-item d-flex justify-content-center">
                                <i class="fa-solid fa-house fa-lg mr-4"></i>
                                <span class="text-menu-nav-item">Início</span>
                            </li>
                        </a>
                        <a href="#" class="ancor-link-menu-nav">
                            <li class="menu-nav-item d-flex justify-content-center">
                                <i class="fa-solid fa-business-time fa-lg mr-4"></i>
                                <span class="text-menu-nav-item">Portfólio</span>
                            </li>
                        </a>
                        <a href="#" class="ancor-link-menu-nav">
                            <li class="menu-nav-item d-flex justify-content-center">
                                <i class="fa-solid fa-code fa-lg mr-4"></i>
                                <span class="text-menu-nav-item">Tecnologias</span>
                            </li>
                        </a>
                        <a href="{{ route('login') }}" class="ancor-link-menu-nav">
                            <li class="menu-nav-item d-flex justify-content-center">
                                <i class="fa-solid fa-desktop fa-lg mr-4"></i>
                                <span class="text-menu-nav-item">Sistemas</span>
                            </li>
                        </a>            
                    </ul>
                </div>
            </section>

            <section id="menu" class="menu">
                <div id="avatar">
                    <img src="{{ asset('/img/avatar_1.png') }}" alt="">
                </div>
                <div id="box-menu" class="box-menu">
                    <ul id="ul">
                        <a href="#article-main" class="ancor-link-menu">
                            <li class="menu-item">
                                <i class="fa-solid fa-house fa-lg"></i>
                                <span class="esconder text-menu-item">Início</span>
                            </li>
                        </a>
                        <a href="#article-portfolio" class="ancor-link-menu">
                            <li class="menu-item">
                                <i class="fa-solid fa-business-time fa-lg"></i>
                                <span class="esconder text-menu-item">Portfólio</span>
                            </li>
                        </a>
                        <a href="#article-tech" class="ancor-link-menu">
                            <li class="menu-item">
                                <i class="fa-solid fa-code fa-lg"></i>
                                <span class="esconder text-menu-item">Tecnologias</span>
                            </li>
                        </a>
                        <a href="{{ route('login') }}" class="ancor-link-menu">
                            <li class="menu-item">
                                <i class="fa-solid fa-desktop fa-lg"></i>
                                <span class="esconder text-menu-item">Sistemas</span>
                            </li>
                        </a>            
                    </ul>
                </div>
            </section>

            <main>
                <article id="article-main">
                    <h1>Em construção!!!</h1>
                </article>
                <article id="article-portfolio">
                    <h1>Em construção!!!</h1>
                </article>
                <article id="article-tech">
                    <h1>Em construção!!!</h1>
                </article>
            </main>

            <footer>

            </footer>



        <script 
            src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
            crossorigin="anonymous">
        </script>
        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" 
            crossorigin="anonymous">
        </script>
        <script 
            src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
            crossorigin="anonymous">
        </script>
        <script 
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" 
            crossorigin="anonymous">
        </script>
        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" 
            integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" 
            crossorigin="anonymous">
        </script>
        <script 
            src="./fontawesome6/fontawesome-free-6.5.1-web/js/all.min.js">
        </script>

        <script>

            var items = $('.text-menu-item')
           
            $('#menu').hover(function() {
                console.log('hover')
                items.each(function() {
                    $(this).addClass('mostrar').removeClass('esconder')
                    
                })

                $('.text-menu-item').each(function () {
                    $(this).css('display', 'inline')
                })

                $('#box-menu').css('width', '230px')

            }, function() {
                items.each(function() {
                    $(this).addClass('esconder').removeClass('mostrar')
                    
                })

                $('.text-menu-item').each(function () {
                    $(this).css('display', 'none')
                })

                $('#box-menu').css('width', '80px')
            })

            var menu = $('#menu-nav')

            window.onresize = function(){
                if(window.innerWidth > 576) {                  
                    menu.css('display', 'none')
                }
            };

            $('#btn-bar').click(function() {
               
                var toggle = $('#btn-bar').attr('data-toggle')
    
                if (toggle == 'false') {
                    menu.css('display', 'block')
                    $('#btn-bar').attr('data-toggle', true)
                } else {
                    menu.css('display', 'none')
                    $('#btn-bar').attr('data-toggle', false)
                }
            })


            

        </script>
    </body>
</html>