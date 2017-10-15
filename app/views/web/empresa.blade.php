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
        <h2 class="text-center">Empresa</h2><br>

        <div class="row">
            <div class="col-xs-3">

              <label class="control-label">Carrera:
              </label>
              <select class="form-control" v-model="filtro.careerName">
                <option v-for="carrera in carreras" v-bind:value="carrera.name">
                  @{{ carrera.name }}
                </option>
              </select>

              <label class="control-label">Region:
              </label>
              <select class="form-control" v-model="filtro.regionName">
                <option v-for="region in regiones" v-bind:value="region.name">
                  @{{ region.name }}
                </option>
              </select>

              <label for="genero">Genero</label>
              <select class="form-control" v-model="filtro.genderName">
                  <option value='' selected="selected">Seleccione</option>
                  <option value='MASCULINO'>Masculino</option>
                  <option value='FEMENINO'>Femenino</option>
              </select>

              <label for="genero">Año referencia</label><br>
                <select class="form-control" v-model="filtro.referenceYear">
                  <option v-for="reference in references">
                    @{{ reference }}
                  </option>
              </select>

              <button type="button" id="btn_sueldos" class="btn btn-info">Consultar</button>

            </div>

            <div class="col-xs-6 col-sm-6 table-responsive" id="div_chart">
                
                <table id="t_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>EMPRESA</th>
                        <th>CANTIDAD</th>
                        <th>PORCENTAJE</th>
                      </tr>
                    </thead>
                    <tbody id="tb_componentes">
                        <tr v-for="sueldo in sueldos">
                          <td>@{{sueldo.EMPRESA}}</td>
                          <td>@{{sueldo.CANTIDAD}}</td>
                          <td>@{{sueldo.PORCENTAJE}}</td>
                        </tr>
                    </tbody>
                </table>
                    
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

    {{HTML::script(mix('/frontend/empresa.js'))}}
  </body>

</html>
