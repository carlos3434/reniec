<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon.ico">

        <title>Zodkoo | Bootstrap Landing Template</title>

        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Icons CSS -->
        <link href="css/pe-icon-7-stroke.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>


    <body data-spy="scroll" data-target="#navbar-menu">

        <!-- Navbar -->
        <div class="navbar navbar-custom sticky" role="navigation" id="sticky-nav">
            <div class="container">

                <!-- Navbar-header -->
                <div class="navbar-header">

                    <!-- Responsive menu button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- LOGO -->
                    <a class="navbar-brand logo" href="index.html">
                        Zodkoo
                    </a>

                </div>
                <!-- end navbar-header -->

                <!-- menu -->
                <div class="navbar-collapse collapse" id="navbar-menu">

                    <!-- Navbar left -->
                    <ul class="nav navbar-nav nav-custom-left">
                        <li class="active">
                            <a href="index.html#home" class="nav-link">Home</a>
                        </li>
                        <li>
                            <a href="index.html#features" class="nav-link">Features</a>
                        </li>
                        <li>
                            <a href="index.html#pricing" class="nav-link">Plans</a>
                        </li>
                        <li>
                            <a href="index.html#clients" class="nav-link">Clients</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                Pages
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu arrow">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="jobs.html">Jobs</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Navbar right -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="">Login</a>
                        </li>
                        <li>
                            <a href="" class="btn btn-white-fill navbar-btn">Try for Free</a>
                        </li>
                    </ul>

                </div>
                <!--/Menu -->
            </div>
            <!-- end container -->
        </div>
        <!-- End navbar-custom -->



        <!-- Header title -->
        <section class="bg-custom header-title-box">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                      <h3 class="text-white">Get In Touch</h3>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- END Header title -->



        <!-- Contact Form -->
        <section class="section">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="title">Send us a Message</h3>
                        <p class="text-muted sub-title">The clean and well commented code allows easy customization of the theme.It's <br/> designed for describing your app, agency or business.</p>
                    </div>
                </div> <!-- end row -->

                <div class="row">

                    <!-- Contact form -->
                    <div class="col-sm-6">
                        <form role="form" name="ajax-form" id="contact-form"
                              action="https://formsubmit.io/send/17a46d93-adb2-4bd5-8694-ec9ba05bf5fd" method="post"
                              class="contact-form" data-parsley-validate novalidate>

                            <div class="form-group">
                                <input class="form-control" id="name2" name="name" placeholder="Your name" type="text" value="" parsley-trigger="change" required>
                            </div>
                            <!-- /Form-name -->

                            <div class="form-group">
                                <input class="form-control" id="email2" name="email" type="email" placeholder="Your email" value="" parsley-trigger="change" required>
                            </div>
                            <!-- /Form-email -->

                            <div class="form-group">
                                <textarea class="form-control" id="message2" name="message" rows="5" placeholder="Message" parsley-trigger="change" required></textarea>
                            </div>
                            <!-- /Form Msg -->

                            <div class="row">            
                                <div class="col-xs-12">
                                    <div id="success-form" class="text-success" style="display: none;">E-mail was successfully sent.</div>
                                    <div class="error text-center" id="err-form"></div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-custom" id="send">Submit</button>
                                    </div>
                                </div> <!-- /col -->
                            </div> <!-- /row -->

                        </form> <!-- /form -->
                    </div> <!-- end col -->

                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="contact-box">

                            <div class="contact-detail">
                                <i class="pe-7s-map-marker"></i>
                                <address>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107
                                </address>
                            </div>

                            <div class="contact-detail">
                                <i class="pe-7s-phone"></i>
                                <p>
                                    (120) 456-789-123
                                </p>
                            </div>

                            <div class="contact-detail">
                                <i class="pe-7s-mail-open-file"></i>
                                <p>
                                    <a href="">support@yourmail.com</a>
                                </p>
                            </div>

                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </section>
        <!-- End Contact Form -->



        <!-- CLIENTS -->
        <section class="section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3 class="title">Trusted by Thousands</h3>
                        <p class="text-muted sub-title">The clean and well commented code allows easy customization of the theme.It's <br/> designed for describing your app, agency or business.</p>
                    </div>
                </div>


                <div class="row text-center">
                    <div class="col-sm-12">
                        <ul class="list-inline client-list">
                            <li><a href="" title="Microsoft"><img src="images/clients/microsoft.png" alt="clients"></a></li>
                            <li><a href="" title="Google"><img src="images/clients/google.png" alt="clients"></a></li>
                            <li><a href="" title="Instagram"><img src="images/clients/instagram.png" alt="clients"></a></li>
                            <li><a href="" title="Converse"><img src="images/clients/converse.png" alt="clients"></a></li>
                        </ul>
                    </div> <!-- end Col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </section>
        <!-- END CLIENTS -->



        <!-- FOOTER -->
        <footer class="section bg-gray footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h5>Zodkoo</h5>
                        <ul class="list-unstyled">
                            <li><a href="">Home</a></li>
                            <li><a href="">Features</a></li>
                            <li><a href="">Team</a></li>
                            <li><a href="">FAQ</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h5>Social</h5>
                        <ul class="list-unstyled">
                            <li><a href="">Facebook</a></li>
                            <li><a href="">Twitter</a></li>
                            <li><a href="">Behance</a></li>
                            <li><a href="">Dribbble</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h5>Support</h5>
                        <ul class="list-unstyled">
                            <li><a href="">Help & Support</a></li>
                            <li><a href="">Privacy Policy</a></li>
                            <li><a href="">Terms & Conditions</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h5>Contact</h5>
                        <address>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890<br/>
                            E: <a href="mailto:#">email@email.com</a>
                        </address>
                    </div>

                </div> <!-- end row -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="footer-alt text-center">
                            <p class="text-muted m-b-0">2016 © Zodkoo</p>
                        </div>
                    </div>
                </div> <!-- end row -->

            </div> <!-- end container -->
        </footer>
        <!-- END FOOTER -->
        

        <!-- Back to top -->    
        <a href="#" class="back-to-top" id="back-to-top"> <i class="pe-7s-angle-up"> </i> </a>


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Jquery easing -->                                                      
        <script type="text/javascript" src="js/jquery.easing.1.3.min.js"></script>

        <!--sticky header-->
        <script type="text/javascript" src="js/jquery.sticky.js"></script>

        <!-- parsley - form validation -->
        <script type="text/javascript" src="js/parsley.min.js"></script>

        <!--common script for all pages-->
        <script src="js/jquery.app.js"></script>

    </body>
</html>