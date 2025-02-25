<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../">
    <title>Connexion</title>
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/logo-pharmacie.jpg" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <span class="mb-12">
                    <img alt="Logo" src="assets/media/logos/logo-pharmacie.jpg" class="h-80px" />
                </span>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" id="loginForm" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Se connecter</h1>
                        </div>

                        <!-- Nom d'utilisateur -->
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Nom d'utilisateur</label>
                            <input class="form-control form-control-lg form-control-solid" type="text"
                                name="name" id="name" />
                            <div class="text-danger mt-1 error-name"></div>
                        </div>

                        <!-- Mot de passe -->
                        <div class="fv-row mb-10" x-data="{ showPassword: false }">
                            <div class="d-flex flex-stack mb-2">
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Mot de passe</label>
                                <a href="#" class="link-primary fs-6 fw-bolder">Mot de passe oublié ?</a>
                            </div>
                            <div class="relative">
                                <input :type="showPassword ? 'text' : 'password'"
                                    class="form-control form-control-lg form-control-solid pr-12" name="password"
                                    id="password" autocomplete="off" />
                                <span type="button" class="absolute inset-y-0 left-0 pr-3µ text-gray-600"
                                    @click="showPassword = !showPassword"
                                    style="top: 50%; transform: translateY(-50%); z-index: 10;">
                                    <i class="bi" :class="showPassword ? 'bi-eye-slash' : 'bi-eye'"></i>
                                </span>
                            </div>
                            <div class="text-danger mt-1 error-password"></div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5" id="loginBtn">
                                <span class="indicator-label">Se connecter</span>
                                <span class="spinner-border spinner-border-sm align-middle ms-2 d-none"
                                    id="loading-spinner"></span>
                            </button>
                        </div>
                    </form>


                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @include('auth.js')
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/js/custom/authentication/sign-in/general.js"></script>
</body>
<!--end::Body-->

</html>
