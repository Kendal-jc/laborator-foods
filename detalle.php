<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
    <!--fonts oswald-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Oswald:wght@300;400;700&display=swap"
        rel="stylesheet">

    <!---Bootsrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!--Iconos-->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--fronts.css-->
    <link rel="stylesheet" href="./css/front.css">
    <link rel="stylesheet" href="./css/components.css">
    <link rel="stylesheet" href="./css/frontsprincipa.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <section class="principal decoration2">
        <header class="header">
            <div class="header-limit">
                <a href="./foodscode.html"> <img class="logo-header" src="./imgs/Logo (1).png" alt="logo"> </a>
                <div class="search-limit">
                    <div class="group">
                        <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                            <g>
                                <path
                                    d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                                </path>
                            </g>
                        </svg>
                        <input placeholder="¿Qué vas a comer?" type="search" class="input">
                    </div>
                </div>
            </div>
        </header>
        <a href="./foodscode.html"> <img class="back-icon" src="./imgs/atras.png" alt="atras"> </a>

        <nav class="details-limit">
            <div class="row mt-5">
                <div class="col-md d-flex justify-content-start align-items-center me-4">
                    <div class="">
                        <div>
                            <div class="d-flex justify-content-center"><img class="w-75" src="./imgs/O_m.jpg"
                                    alt="img-receta">
                            </div>
                            <div class="d-flex mt-4 justify-content-center">
                                <div>
                                    <div class="d-flex justify-content-center">
                                        <h1 class="title-ingredients">Gallo pinto</h1>
                                    </div>

                                    <div class="mt-3 mb-4">
                                        <ul class="text-aligns-rt">
                                            <li class="times">10min de cocción</li>
                                            <li class="times">20min de preparación</li>
                                            <li class="times mt-3">30min tiempo total</li>
                                        </ul>
                                    </div>

                                    <div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <h3 class="mx-3 etiqueta food-time">Desayuno</h3>
                                            <h3 class="mx-3 etiqueta level">Fácil</h3>
                                            <h3 class="mx-3 etiqueta likes">20 likes</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md d-flex justify-content-end me-4">
                    <div>
                        <div class="text-it">
                            <h1 class="title-ingredients">Ingredientes</h1>
                            <p class="ingredients mt-3">
                                3 cucharadas de aceite de canola <br>
                                1/4 cebolla picada<br>
                                1/2 pimiento verde (o rojo) en cuadraditos<br>
                                3 tazas de frijoles rojos o negros, cocidos<br>
                                3 tazas de arroz blanco, cocido<br>
                                Sal<br>
                                2 cucharadas de culantro picado</p>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section class="container-fluid ">
        <h2 class="title-ingredients d-flex justify-content-center" style="margin-top: 19rem;">Preparación</h2>
        <div class="row d-flex justify-content-center ">
            <p class="ingredients text-d pad">1-Calienta el aceite en una sartén grande y fríe la cebolla y el pimiento
                hasta que estén suaves.
                <br>
                2-Agrega los frijoles, bien escurridos, y fríe de tres a cinco minutos. Agrega un poco del caldo
                de cocción, si ves que están quedando muy secos.<br>
                3-Incorpora el arroz y sigue friendo unos tres minutos más agregando un poco más de caldo de
                frijoles para que el gallo pinto no quede muy seco y finalmente adorna con culantro picado.
            </p>
        </div>

    </section>





    <div class="container margin-tp">
        <div class="mb-1">
            <div class="food-type-limit mt-1 header-limit">
                <h2 class="mt-3 ms-3 float-right title-lg margin-t">Top 10 en recetas</h2>
            </div>
        </div>
        <div class="row gap-3 d-flex justify-content-center" style="padding-top: 5rem;">

            <div class="col mt-4 d-flex justify-content-center">
                <div class="card cardss" style="width: 18rem;">
                    <img src="./imgs/iimg-1.jpg" class="card-img-top mt-3 p-2" alt="receta">
                    <div class="card-body">
                        <a class="card-title pointer text-decoration-none text-center d-block category"
                            href="./detalle.html">
                            Sancocho</a>
                        <p class="card-text text-center mt-3">
                            <img src="./imgs/like.png" alt="like" style="width:2em;">
                        </p>

                        <!-- <p class="card-text text-center mt-3">corazón</p> -->
                        <div class="row">
                            <div class="col-7 author-fd">60 min</div>
                            <div class="col-5 ps-5 authorleft">Fácil</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col mt-4 d-flex justify-content-center">
                <div class="card cardss" style="width: 18rem;">
                    <img src="./imgs/iimg-2.jpg" class="card-img-top mt-3 p-2" alt="receta">
                    <div class="card-body">
                        <a class="card-title pointer text-decoration-none text-center d-block category"
                            href="./detalle.html">
                            ENSALADA DE ATÚN</a>
                        <p class="card-text text-center mt-3">
                            <img src="./imgs/like.png" alt="like" style="width:2em;">
                        </p>
                        <div class="row">
                            <div class="col-7 author-fd">60 min</div>
                            <div class="col-5 ps-5 authorleft">Fácil</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col mt-4 d-flex justify-content-center">
                <div class="card cardss" style="width: 18rem;">
                    <img src="./imgs/iimg-3.jpg" class="card-img-top mt-3 p-2" alt="receta">
                    <div class="card-body">
                        <a class="card-title pointer text-decoration-none text-center d-block category"
                            href="./detalle.html">
                            BLT IN A BOWL</a>
                        <p class="card-text text-center mt-3">
                            <img src="./imgs/like.png" alt="like" style="width:2em;">
                        </p>
                        <div class="row">
                            <div class="col-7 author-fd">60 min</div>
                            <div class="col-5 ps-5 authorleft">Fácil</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col mt-4 d-flex justify-content-center">
                <div class="card cardss" style="width: 18rem;">
                    <img src="./imgs/iimg-4.jpg" class="card-img-top mt-3 p-2" alt="receta">
                    <div class="card-body">
                        <a class="card-title pointer text-decoration-none text-center d-block category"
                            href="./detalle.html">
                            DESAYUNO INGLÉS</a>
                        <p class="card-text text-center mt-3">
                            <img src="./imgs/like.png" alt="like" style="width:2em;">
                        </p>
                        <div class="row">
                            <div class="col-7 author-fd">60 min</div>
                            <div class="col-5 ps-5 authorleft">Fácil</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </section>

    <!-- contact us -->
    <footer class="container-fluid mt-5 text-grn p-0 m-0">
        <div class="container-footerr">

            <p class="badge badge-blue text-start">CONTACT US</p>
            <a class="nav-item nav-link title-lg text-white" href="ermaill:hello@foods.com">Hello@Foods.com
                <span><img src="./imgs/arrow.svg" alt="arrow"></span></a>
            <div class="d-flex justify-content-center mt-xl-5">

                <span class="fa-stack fa-lg icons-color">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x"></i>
                </span>

                <span class="fa-stack fa-lg icons-color">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-youtube-play fa-stack-1x"></i>
                </span>

                <span class="fa-stack fa-lg icons-color">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-facebook-f fa-stack-1x"></i>
                </span>
            </div>
        </div>
    </footer>

</body>

</html>