@extends('main.index')
@section('title', 'Erreur 404')
@section('toolbar')
    <div class="toolbar d-flex align-items-stretch">
        <!--begin::Toolbar container-->
        <div
            class=" container-xxl  py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">


            <!--begin::Page title-->
            <div class="page-title d-flex justify-content-center flex-column me-5">
                <!--begin::Title-->
                <h1 class="d-flex flex-column text-gray-900 fw-bold fs-3 mb-0">
                   Erreur 404</h1>
                <!--end::Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('home') }}" class="text-muted text-hover-primary">
                            Acceuil </a>
                    </li>
                    <!--end::Item-->


                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        Polyclinique </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-900">  Erreur 404
                    </li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Toolbar container-->
    </div>
@endsection

@section('content')
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-center flex-column-fluid p-10">
        <img src="assets/media/illustrations/sketchy-1/18.png" alt="404 error image" class="mw-100 mb-10 h-lg-450px" />
        <h1 class="fw-bold mb-10" style="color: #A3A3C7">Oups ! Page non trouvée</h1>
        <p class="fs-5 mb-10" style="color: #A3A3C7">
            La page que vous recherchez semble introuvable. Veuillez vérifier l'URL ou retournez à la page d'accueil.
        </p>
        <a href="javascript:history.back()" class="btn btn-primary">Retour</a>
    </div>
</div>
@endsection
