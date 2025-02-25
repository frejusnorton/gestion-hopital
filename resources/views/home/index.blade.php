@extends('main.index')
@section('title', 'Acceuil | Polyclinique Biosso')
@section('toolbar')
    <div
        class="container-fluid py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-5">
            <!--begin::Title-->
            <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Tableau de bord - Polyclinique Biosso</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <span class="text-muted text-hover-primary">Acceuil</span>
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Action group-->
        <div class="d-flex align-items-center overflow-auto pt-3 pt-lg-0">


        </div>
        <!--end::Action group-->
    </div>
@endsection

@section('content')
    <div id="carouselClinique" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
        <!-- Indicateurs -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselClinique" data-bs-slide-to="0" class="active"
                aria-current="true"></button>
            <button type="button" data-bs-target="#carouselClinique" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselClinique" data-bs-slide-to="2"></button>
        </div>

        <!-- Images -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/media/hopital/hopital.jpg') }}" class="d-block w-100 h-100 rounded"
                    style="object-fit: cover;" alt="Clinique 1">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('assets/media/hopital/hopital.jpg') }}" class="d-block w-100 h-100 rounded"
                    style="object-fit: cover;" alt="Clinique 2">

            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/media/hopital/hopital.jpg') }}" class="d-block w-100 h-100 rounded"
                    style="object-fit: cover;" alt="Clinique 3">

            </div>
        </div>

        <!-- Contrôles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselClinique" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselClinique" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>


@endsection
