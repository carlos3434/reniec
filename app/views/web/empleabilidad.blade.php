<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Elige tu futuro Hackton Reniec 2017</title>

    <!-- Bootstrap core CSS -->
    <link href="web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="web/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="web/css/freelancer.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Elige tu futuro</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">

      <div class="container">
        <h2 class="text-center">...</h2>
        <h2 class="text-center">...</h2>
        <h2 class="text-center">Salario y Empleabilidad</h2><br>
        

        <div class="row">
          <div class="col-sm-3">
            <label class="control-label">Elige una carrera:
            </label>
            <select class="form-control" v-model="career" name="slct_carrera" id="slct_carrera">
              <option v-for="carrera in carreras" v-bind:value="carrera.id">
                @{{ carrera.name }}
              </option>
            </select>
          </div>

          <div class="col-sm-3">
            <label class="control-label">Region:
            </label>
            <select class="form-control" v-model="region" name="slct_carrera" id="slct_carrera">
              <option v-for="region in regiones" v-bind:value="region.id">
                @{{ region.name }}
              </option>
            </select>
          </div>

          <div class="col-xs-3 col-sm-3">
            <label class="control-label">Año Referencia:</label>
            <br>
            <label class="radio-inline">
              <input type="radio" id="2017" value="2017" v-model="anio">2017
            </label>
            <label class="radio-inline">
              <input type="radio" id="2012" value="2012" v-model="anio">2012
            </label>
          </div>

          <div class="col-xs-3 col-sm-3">
            <label for="genero">Genero</label>
            <select class="form-control" v-model="genero" name="slct_genero" id="slct_genero">
                <option value='' selected="selected">Seleccione</option>
                <option value='M'>Masculino</option>
                <option value='F'>Femenino</option>
            </select>
          </div>

        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <button type="button" id="btn_sueldos" class="btn btn-primary">Ver Estadisticas</button>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <canvas id="myChart" width="400" height="400"></canvas>
          </div>
        </div>

        <div class="row" style="display:none">
          <div class="col-xs-8 col-sm-8">
            <canvas id="doughnut" ></canvas>
          </div>
        </div>

      </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
      <div class="footer-above">
        <div class="container">
          <div class="row">
            <div class="footer-col col-md-4">
              <h3>Location</h3>
              <p>3481 Melrose Place
                <br>Beverly Hills, CA 90210</p>
            </div>
            <div class="footer-col col-md-4">
              <h3>Around the Web</h3>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-google-plus"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-linkedin"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-dribbble"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="footer-col col-md-4">
              <h3>About Freelancer</h3>
              <p>Freelance is a free to use, open source Bootstrap theme created by
                <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-below">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              Copyright &copy; Your Website 2017
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top d-lg-none">
      <a class="btn btn-primary js-scroll-trigger" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="web/vendor/jquery/jquery.min.js"></script>
    <script src="web/vendor/popper/popper.min.js"></script>
    <script src="web/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="web/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="web/js/jqBootstrapValidation.js"></script>
    <script src="web/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="web/js/freelancer.min.js"></script>
    <script src="/js/plugin/vue/vue-2.3.3.js"></script>
    <script src="/js/plugin/vue/axios.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

    {{HTML::script(mix('/frontend/charts.js'))}}
  </body>

</html>
