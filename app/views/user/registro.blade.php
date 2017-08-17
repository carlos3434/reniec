<!DOCTYPE html>
<html lang="en-us" id="extr-page">
    <head>
        <meta charset="utf-8">
        <title> SmartAdmin</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        
        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">

        <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
        <link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production-plugins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.min.css">

        <!-- SmartAdmin RTL Support -->
        <link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-rtl.min.css"> 

        <!-- We recommend you use "your_style.css" to override SmartAdmin
             specific styles this will also ensure you retrain your customization with each SmartAdmin update.
        <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

        <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
        <link rel="stylesheet" type="text/css" media="screen" href="/css/demo.min.css">

        <!-- #FAVICONS -->
        <link rel="shortcut icon" href="/img/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

        <!-- #GOOGLE FONT -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

        <!-- #APP SCREEN / ICONS -->
        <!-- Specifying a Webpage Icon for Web Clip 
             Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
        <link rel="apple-touch-icon" href="/img/splash/sptouch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/img/splash/touch-icon-ipad.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/img/splash/touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/img/splash/touch-icon-ipad-retina.png">
        
        <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        
        <!-- Startup image for web apps -->
        <link rel="apple-touch-startup-image" href="/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
        <link rel="apple-touch-startup-image" href="/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
        <link rel="apple-touch-startup-image" href="/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

    </head>
    
    <body id="registerUser">
    
        <header id="header">
            <!--<span id="logo"></span>-->

            <div id="logo-group">
                <span id="logo"> <img src="/img/logo.png" alt="SmartAdmin"> </span>

                <!-- END AJAX-DROPDOWN -->
            </div>

            <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">Already registered?</span> <a href="/" class="btn btn-danger">Sign In</a> </span>

        </header>

        <div id="main" role="main">

            <!-- MAIN CONTENT -->
            <div id="content" class="container">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 hidden-xs hidden-sm">
                        <h1 class="txt-color-red login-header-big">SmartAdmin</h1>
                        <div class="hero">

                            <div class="pull-left login-desc-box-l">
                                <h4 class="paragraph-header">It's Okay to be Smart. Experience the simplicity of SmartAdmin, everywhere you go!</h4>
                                <div class="login-app-icons">
                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm">Frontend Template</a>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm">Find out more</a>
                                </div>
                            </div>
                            
                            <img src="/img/demo/iphoneview.png" alt="" class="pull-right display-image" style="width:210px">
                            
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="about-heading">About SmartAdmin - Are you up to date?</h5>
                                <p>
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
                                </p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="about-heading">Not just your average template!</h5>
                                <p>
                                    Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi voluptatem accusantium!
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <div class="well no-padding">

                            <form v-on:submit.prevent='RegisterUser(this)' autocomplete="off" id="registerForm" class="smart-form client-form">
                                <header>
                                    Registration is FREE*
                                </header>

                                <fieldset>
                                    <section>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input type="text" v-model='user.username' name="username" placeholder="Username" autocomplete="off">
                                            <b class="tooltip tooltip-bottom-right">Needed to enter the website</b> </label>
                                    </section>

                                    <section>
                                        <label class="input"> <i class="icon-append fa fa-envelope"></i>
                                            <input type="email" v-model='user.email' name="email" placeholder="Email address" autocomplete="off">
                                            <b class="tooltip tooltip-bottom-right">Needed to verify your account</b> </label>
                                    </section>

                                    <section>
                                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                                            <input type="password" v-model='user.password' name="password" placeholder="Password" id="password" autocomplete="off">
                                            <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
                                    </section>

                                    <section>
                                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                                            <input type="password" v-model='user.password_confirmation' name="passwordConfirm" placeholder="Confirm password" autocomplete="off">
                                            <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
                                    </section>
                                </fieldset>

                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="input">
                                                <input type="text" name="nombres" placeholder="Nombres" v-model='user.nombres' autocomplete="off">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="input">
                                                <input type="text" name="apellidos" placeholder="Apellidos" v-model='user.apellidos' autocomplete="off">
                                            </label>
                                        </section>
                                    </div>


                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="input">
                                                <input type="text" name="dni" placeholder="dni" v-model='user.dni' maxlength="8" autocomplete="off">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="input">
                                                <input type="text" name="numero_telefono" placeholder="numero_telefono" v-model='user.numero_telefono' autocomplete="off">
                                            </label>
                                        </section>
                                    </div>


                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="input">
                                                <input type="text" name="direccion" placeholder="direccion" v-model='user.direccion' autocomplete="off">
                                            </label>
                                        </section>
                                    </div>


                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="select">
                                                <select v-model='user.genero' name="gender">
                                                    <option value="0" selected="" disabled="">Genero</option>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                    <option value="3">Prefer not to answer</option>
                                                </select> <i></i> </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" name="request" placeholder="Fecha Nacimiento" class="datepicker" v-model='user.fecha_nacimiento' data-dateformat='dd/mm/yy' autocomplete="off">
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="checkbox">
                                            <input type="checkbox" name="subscription" id="subscription">
                                            <i></i>I want to receive news and special offers</label>
                                        <label class="checkbox">
                                            <input type="checkbox" v-model='terms' name='terms' id="terms"autocomplete="off"> 

                                            <i></i>I agree with the <a href="#" data-toggle="modal" data-target="#myModal"> Terminos &amp; condiciones </a></label>
                                    </section>
                                </fieldset>
                                <footer>
                                    <div v-show="terms">
                                    
                                        <div class="col-xs-6">
                                            <div class="g-recaptcha" name='recaptcha' data-sitekey="{{Config::get('recaptcha.site')}}"></div>

                                        </div>

                                        <input class="btn btn-primary btn-lg" type="submit" value="Registrar">
                                    </div>
                                </footer>

                                <div class="message">
                                    <i class="fa fa-check"></i>
                                    <p>
                                        Thank you for your registration!
                                    </p>
                                </div>
                            </form>

                        </div>
                        <p class="note text-center">*FREE Registration ends on October 2015.</p>
                        <h5 class="text-center">- Or sign in using -</h5>
                        <ul class="list-inline text-center">
                            <li>
                                <a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                    </div>
                    <div class="modal-body custom-scroll terms-body">
                        
                        <div id="left">

                        <h1>SMARTADMIN TERMS & CONDITIONS TEMPLATE</h1>

                        <h2>Introduction</h2>

                        <h2>[Registrations and authorisations</h2>

                        <p>[[NAME] is registered with [TRADE REGISTER].  You can find the online version of the register at [URL].  [NAME'S] registration number is [NUMBER].]</p>

                        <p>[[NAME] is subject to [AUTHORISATION SCHEME], which is supervised by [SUPERVISORY AUTHORITY].]</p>

                        <p>[[NAME] is registered with [PROFESSIONAL BODY].  [NAME'S] professional title is [TITLE] and it has been granted in [JURISDICTION].  [NAME] is subject to the [RULES] which can be found at [URL].]</p>

                        <p>[[NAME] subscribes to the following code[s] of conduct: [CODE(S) OF CONDUCT].  [These codes/this code] can be consulted electronically at [URL(S)].</p>

                        <p>[[NAME'S] [TAX] number is [NUMBER].]]</p>

                        <h2>[NAME'S] details</h2>

                        <p>The full name of [NAME] is [FULL NAME].</p>

                        <p>[[NAME] is registered in [JURISDICTION] under registration number [NUMBER].]</p>

                        <p>[NAME'S] [registered] address is [ADDRESS].</p>

                        <p>You can contact [NAME] by email to [EMAIL].</p>

                        </div>

                        <br><br>

                        <p><strong>By using this  WEBSITE TERMS AND CONDITIONS template document, you agree to the 
                        <a href="#">terms and conditions</a> set out on 
                        <a href="#">SmartAdmin.com</a>.  You must retain the credit 
                         set out in the section headed "ABOUT THESE WEBSITE TERMS AND CONDITIONS".  Subject to the licensing restrictions, you should 
                         edit the document, adapting it to the requirements of your jurisdiction, your business and your 
                         website.  If you are not a lawyer, we recommend that you take professional legal advice in relation to the editing and 
                         use of the template.</strong>
                        </p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-primary" id="i-agree">
                            <i class="fa fa-check"></i> I Agree
                        </button>
                        
                        <button type="button" class="btn btn-danger pull-left" id="print">
                            <i class="fa fa-print"></i> Print
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!--================================================== -->  

        <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
        <script src="/js/plugin/pace/pace.min.js"></script>

        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script> if (!window.jQuery) { document.write('<script src="/js/libs/jquery-2.1.1.min.js"><\/script>');} </script>

        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script> if (!window.jQuery.ui) { document.write('<script src="/js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

        <!-- IMPORTANT: APP CONFIG -->
        <script src="/js/app.config.js"></script>

        <!-- JS TOUCH : include this plugin for mobile drag / drop touch events         
        <script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

        <!-- BOOTSTRAP JS -->       
        <script src="/js/bootstrap/bootstrap.min.js"></script>

        <!-- JQUERY VALIDATE -->
        <script src="/js/plugin/jquery-validate/jquery.validate.min.js"></script>
        
        <!-- JQUERY MASKED INPUT -->
        <script src="/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.24/vue.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.2/vue-resource.min.js'></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <!--[if IE 8]>
            
            <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
            
        <![endif]-->

        <!-- MAIN APP JS FILE -->
        <script src="/js/app.min.js"></script>

        <script type="text/javascript">
            runAllForms();
            
            // Model i agree button
            $("#i-agree").click(function(){
                $this=$("#terms");
                if($this.checked) {
                    $('#myModal').modal('toggle');
                } else {
                    $this.prop('checked', true);
                    $('#myModal').modal('toggle');
                }
            });
            
            // Validation
            $(function() {
                // Validation
                $("#smart-form-register").validate({

                    // Rules for form validation
                    rules : {
                        username : {
                            required : true
                        },
                        email : {
                            required : true,
                            email : true
                        },
                        password : {
                            required : true,
                            minlength : 3,
                            maxlength : 20
                        },
                        passwordConfirm : {
                            required : true,
                            minlength : 3,
                            maxlength : 20,
                            equalTo : '#password'
                        },
                        firstname : {
                            required : true
                        },
                        lastname : {
                            required : true
                        },
                        gender : {
                            required : true
                        },
                        terms : {
                            required : true
                        }
                    },

                    // Messages for form validation
                    messages : {
                        login : {
                            required : 'Please enter your login'
                        },
                        email : {
                            required : 'Please enter your email address',
                            email : 'Please enter a VALID email address'
                        },
                        password : {
                            required : 'Please enter your password'
                        },
                        passwordConfirm : {
                            required : 'Please enter your password one more time',
                            equalTo : 'Please enter the same password as above'
                        },
                        firstname : {
                            required : 'Please select your first name'
                        },
                        lastname : {
                            required : 'Please select your last name'
                        },
                        gender : {
                            required : 'Please select your gender'
                        },
                        terms : {
                            required : 'You must agree with Terms and Conditions'
                        }
                    },

                    // Ajax form submition
                    submitHandler : function(form) {
                        $(form).ajaxSubmit({
                            success : function() {
                                $("#smart-form-register").addClass('submited');
                            }
                        });
                    },

                    // Do not change code below
                    errorPlacement : function(error, element) {
                        error.insertAfter(element.parent());
                    }
                });

            });
        </script>
        <script>
    var vm = new Vue({
        http: {
            root: '/user',
            /*headers: {
                'csrftoken': document.querySelector('#token').getAttribute('value')
            }*/
        },
        el: '#registerUser',
        data: {
            mensaje_ok:false,
            mensaje_error:false,

            newUser:{
                nombres:'',
                apellidos:'',
                dni:'',
                direccion:'',
                numero_telefono:'',
                username:'',
                password:'',
                password_confirmation:'',
                fecha_nacimiento:'',
                genero:'',
                email:'',
                recaptcha:'',
            },

            errores:[],
        },
        ready: function () {
            /*$('#fecha_nacimiento').daterangepicker({
                format: 'YYYY-MM-DD',
                singleDatePicker: true,
                showDropdowns: true
            });*/
            jQuery.extend(jQuery.validator.messages, {
                required: "Este campo es requerido.",
                remote: "Por favor corrige este campo.",
                email: "Por favor, introduce una dirección de correo electrónico válida.",
                url: "Por favor introduzca una URL válido.",
                date: "Por favor introduzca una fecha valida.",
                dateISO: "Ingrese una fecha válida (ISO).",
                number: "Por favor ingrese un número valido.",
                digits: "Por favor ingrese solo dígitos.",
                creditcard: "Please enter a valid credit card number.",
                equalTo: "Por favor, introduzca un número de tarjeta de crédito válida",
                accept: "Introduzca un valor con una extensión válida.",
                maxlength: jQuery.validator.format("Por favor, introduzca no más de {0} caracteres."),
                minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!"),
                rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
                range: jQuery.validator.format("Please enter a value between {0} and {1}."),
                max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
                min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
            });
            jQuery.validator.addMethod("soloLetra", function(value, element) {
                return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
            }, "Solo letras");

            $('#registerForm').validate( {
                rules: {
                    nombres: {
                        maxlength: 80,
                        required: true,
                        soloLetra: true,
                    },
                    genero: {
                        required: true 
                    },
                    apellidos: {
                        maxlength: 50,
                        required: true,
                        soloLetra: true,
                    },
                    fecha_nacimiento: {
                        required: true
                    },
                    dni: {
                        maxlength: 8,
                        required: true,
                        digits: true
                    },
                    email: {
                        maxlength: 150,
                        required: true,
                        email: true
                    },
                    password: {
                        minlength: 6,
                        required: true
                    },
                    password_confirmation: {
                        minlength: 6,
                        required: true
                    },
                    direccion: {
                        maxlength: 150,
                        required: true
                    },
                    telefono: {
                        maxlength: 12,
                        required: true,
                        digits: true
                    },
                    celular: {
                        maxlength: 12,
                        required: true,
                        digits: true
                    },
                    recaptcha: {
                        required: true
                    },
                    terminos: {
                        required: true
                    }
                },
                highlight: function(element) {
                    $(element).closest('.control-group').removeClass('success').addClass('error');
                },
                success: function(element) {
                    //element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
                },
                errorClass: "my-error-class"
            });
        },
        methods: {
            handleKeypress: function(event) {
                if (event.keyCode == 13 && event.shiftKey) {
                } else if (event.keyCode == 13){
                    return;
                }
            },
            RegisterUser: function() {
                //var isValid = $("#registerForm").valid();
                //if(isValid){
                    //this.user.username=this.user.dni;
                    this.user.area_id=107; //vecino
                    this.user.recaptcha=grecaptcha.getResponse();
                    //var jnk=grecaptcha.getResponse();
                    this.$http.post("create",this.user,function(data) {
                        $(".load").hide();
                        
                        if(data.rst==1){
                            this.errores='';
                            this.mensaje_ok=data.msj;
                            this.user= this.newUser;
                        }
                        else if(data.rst==1){
                            this.mensaje_ok='';
                            this.errores=data.msj;
                            this.mensaje_error = data.error
                        }
                        else if(data.rst==2){
                            this.mensaje_ok='';
                            this.errores=data.msj;
                            this.mensaje_error = data.error
                        }
                        this.handle = setInterval( ( ) => {
                            this.mensaje_ok=false;
                            this.mensaje_error=false;
                        },5000);
                    });
                //}
            },
        }
    });
</script>
    </body>
</html>