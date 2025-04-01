@extends('main.index')

@section('title', 'Listes des roles')

@section('toolbar')
    <div class="toolbar d-flex align-items-stretch">
        <!--begin::Toolbar container-->
        <div
            class=" container-xxl  py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">


            <!--begin::Page title-->
            <div class="page-title d-flex justify-content-center flex-column me-5">
                <!--begin::Title-->
                <h1 class="d-flex flex-column text-gray-900 fw-bold fs-3 mb-0">
                    Listes des rôle</h1>
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
                    <li class="breadcrumb-item text-gray-900"> Listes des permissions
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
    {{-- @dump($roles, $permissions) --}}
    <div class="content d-flex flex-column flex-column-fluid " id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class=" container-xxl ">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span
                                        class="path1"></span><span class="path2"></span></i>
                                <input type="text" data-kt-user-table-filter="search" id="search"
                                    class="form-control form-control-solid w-250px ps-13 filter"
                                    placeholder="Rechercher un rôle">
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->

                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_export_users">
                                    <i class="ki-duotone ki-exit-up fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> Exporter
                                </button>
                                <!--end::Export-->
                                <!--begin::Add user-->
                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#add_role">
                                    <i class="ki-duotone ki-plus fs-2"></i> Ajouter un rôle
                                </button> --}}
                                <!--end::Add user-->


                            </div>
                            <!--end::Toolbar-->

                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-user-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span> Selected
                                </div>

                                <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">
                                    Delete Selected
                                </button>
                            </div>
                            <!--end::Group actions-->

                            <!--begin::Modal - Adjust Balance-->
                            <div class="modal fade" id="kt_modal_export_users" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-500px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bold">Exporter les roles</h2>
                                            <!--end::Modal title-->

                                            <!--begin::Close-->
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>

                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->

                                        <!--begin::Modal body-->
                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <!--begin::Form-->
                                            <form id="export_role" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                                action="{{ route('roles.export') }}">
                                                @csrf
                                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold form-label mb-2">Selectioner le
                                                        format</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <select name="format" data-control="select2"
                                                        data-placeholder="Selectioner le format" data-hide-search="true"
                                                        class="form-select form-select-solid fw-bold select2-hidden-accessible"
                                                        data-select2-id="select2-data-19-muu6" tabindex="-1"
                                                        aria-hidden="true" data-kt-initialized="1">
                                                        <option data-select2-id="select2-data-21-egy0"></option>
                                                        <option value="excel">Excel</option>
                                                        <option value="pdf">PDF</option>
                                                        <option value="cvs">CVS</option>
                                                        <option value="zip">ZIP</option>
                                                    </select>
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>


                                                <!--begin::Actions-->
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-light me-3"
                                                        data-bs-dismiss="modal">
                                                        Annuler
                                                    </button>

                                                    <button type="submit" class="btn btn-primary"
                                                        data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">
                                                            Exporter
                                                        </span>
                                                        <span class="indicator-progress">
                                                            Please wait... <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header" id="kt_modal_add_user_header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bold">Add User</h2>
                                            <!--end::Modal title-->

                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                data-kt-users-modal-action="close">
                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                        class="path2"></span></i>
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->

                                        <!--begin::Modal body-->
                                        <div class="modal-body px-5 my-7">
                                            <!--begin::Form-->
                                            <form id="kt_modal_add_user_form"
                                                class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                                <!--begin::Scroll-->
                                                <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                                                    id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                    data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                                    data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                    data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                    data-kt-scroll-offset="300px" style="max-height: 430px;">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
                                                        <!--end::Label-->


                                                        <!--begin::Image placeholder-->
                                                        <style>
                                                            .image-input-placeholder {
                                                                background-image: url('/metronic8/demo8/assets/media/svg/files/blank-image.svg');
                                                            }

                                                            [data-bs-theme="dark"] .image-input-placeholder {
                                                                background-image: url('/metronic8/demo8/assets/media/svg/files/blank-image-dark.svg');
                                                            }
                                                        </style>
                                                        <!--end::Image placeholder-->
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-outline image-input-placeholder"
                                                            data-kt-image-input="true">
                                                            <!--begin::Preview existing avatar-->
                                                            <div class="image-input-wrapper w-125px h-125px"
                                                                style="background-image: url(/metronic8/demo8/assets/media/avatars/300-6.jpg);">
                                                            </div>
                                                            <!--end::Preview existing avatar-->

                                                            <!--begin::Label-->
                                                            <label
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                                aria-label="Change avatar"
                                                                data-bs-original-title="Change avatar"
                                                                data-kt-initialized="1">
                                                                <i class="ki-duotone ki-pencil fs-7"><span
                                                                        class="path1"></span><span class="path2"></span></i>
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                                                <input type="hidden" name="avatar_remove">
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Label-->

                                                            <!--begin::Cancel-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                                aria-label="Cancel avatar"
                                                                data-bs-original-title="Cancel avatar"
                                                                data-kt-initialized="1">
                                                                <i class="ki-duotone ki-cross fs-2"><span
                                                                        class="path1"></span><span class="path2"></span></i>
                                                            </span>
                                                            <!--end::Cancel-->

                                                            <!--begin::Remove-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                                aria-label="Remove avatar"
                                                                data-bs-original-title="Remove avatar"
                                                                data-kt-initialized="1">
                                                                <i class="ki-duotone ki-cross fs-2"><span
                                                                        class="path1"></span><span class="path2"></span></i>
                                                            </span>
                                                            <!--end::Remove-->
                                                        </div>
                                                        <!--end::Image input-->

                                                        <!--begin::Hint-->
                                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" name="user_name"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="Full name" value="Emma Smith">
                                                        <!--end::Input-->
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="email" name="user_email"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="example@domain.com" value="smith@kpmg.com">
                                                        <!--end::Input-->
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-5">Role</label>
                                                        <!--end::Label-->

                                                        <!--begin::Roles-->
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <!--begin::Radio-->
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input me-3" name="user_role"
                                                                    type="radio" value="0"
                                                                    id="kt_modal_update_role_option_0" checked="checked">
                                                                <!--end::Input-->

                                                                <!--begin::Label-->
                                                                <label class="form-check-label"
                                                                    for="kt_modal_update_role_option_0">
                                                                    <div class="fw-bold text-gray-800">Administrator</div>
                                                                    <div class="text-gray-600">Best for business owners and
                                                                        company administrators</div>
                                                                </label>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Radio-->
                                                        </div>
                                                        <!--end::Input row-->

                                                        <div class="separator separator-dashed my-5"></div>
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <!--begin::Radio-->
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input me-3" name="user_role"
                                                                    type="radio" value="1"
                                                                    id="kt_modal_update_role_option_1">
                                                                <!--end::Input-->

                                                                <!--begin::Label-->
                                                                <label class="form-check-label"
                                                                    for="kt_modal_update_role_option_1">
                                                                    <div class="fw-bold text-gray-800">Developer</div>
                                                                    <div class="text-gray-600">Best for developers or
                                                                        people primarily using the API</div>
                                                                </label>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Radio-->
                                                        </div>
                                                        <!--end::Input row-->

                                                        <div class="separator separator-dashed my-5"></div>
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <!--begin::Radio-->
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input me-3" name="user_role"
                                                                    type="radio" value="2"
                                                                    id="kt_modal_update_role_option_2">
                                                                <!--end::Input-->

                                                                <!--begin::Label-->
                                                                <label class="form-check-label"
                                                                    for="kt_modal_update_role_option_2">
                                                                    <div class="fw-bold text-gray-800">Analyst</div>
                                                                    <div class="text-gray-600">Best for people who need
                                                                        full access to analytics data, but don't need to
                                                                        update business settings</div>
                                                                </label>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Radio-->
                                                        </div>
                                                        <!--end::Input row-->

                                                        <div class="separator separator-dashed my-5"></div>
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <!--begin::Radio-->
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input me-3" name="user_role"
                                                                    type="radio" value="3"
                                                                    id="kt_modal_update_role_option_3">
                                                                <!--end::Input-->

                                                                <!--begin::Label-->
                                                                <label class="form-check-label"
                                                                    for="kt_modal_update_role_option_3">
                                                                    <div class="fw-bold text-gray-800">Support</div>
                                                                    <div class="text-gray-600">Best for employees who
                                                                        regularly refund payments and respond to disputes
                                                                    </div>
                                                                </label>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Radio-->
                                                        </div>
                                                        <!--end::Input row-->

                                                        <div class="separator separator-dashed my-5"></div>
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <!--begin::Radio-->
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input me-3" name="user_role"
                                                                    type="radio" value="4"
                                                                    id="kt_modal_update_role_option_4">
                                                                <!--end::Input-->

                                                                <!--begin::Label-->
                                                                <label class="form-check-label"
                                                                    for="kt_modal_update_role_option_4">
                                                                    <div class="fw-bold text-gray-800">Trial</div>
                                                                    <div class="text-gray-600">Best for people who need to
                                                                        preview content data, but don't need to make any
                                                                        updates</div>
                                                                </label>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Radio-->
                                                        </div>
                                                        <!--end::Input row-->

                                                        <!--end::Roles-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Scroll-->

                                                <!--begin::Actions-->
                                                <div class="text-center pt-10">
                                                    <button type="reset" class="btn btn-light me-3"
                                                        data-kt-users-modal-action="cancel">
                                                        Discard
                                                    </button>

                                                    <button type="submit" class="btn btn-primary"
                                                        data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">
                                                            Submit
                                                        </span>
                                                        <span class="indicator-progress">
                                                            Please wait... <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - Add task-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <div id="kt_table_users_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                            <div id="datapart" class="table-responsive">
                                @include('roles.datapart')
                            </div>

                        </div>
                        <!--end::Table-->

                        <!--begin::Add new card-->
                        <div class="ol-md-4">
                            <!--begin::Card-->
                            <div class="card h-md-100">
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-center">
                                    <!--begin::Button-->
                                    <button type="button" class="btn btn-clear d-flex flex-column flex-center"
                                        data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                        <!--begin::Illustration-->
                                        <img src="assets/media/illustrations/sketchy-1/4.png" alt=""
                                            class="mw-100 mh-150px mb-7">
                                        <!--end::Illustration-->

                                        <!--begin::Label-->
                                        <div class="fw-bold fs-3 text-gray-600 text-hover-primary">Ajouter un role</div>
                                        <!--end::Label-->
                                    </button>
                                    <!--begin::Button-->
                                </div>
                                <!--begin::Card body-->
                            </div>
                            <!--begin::Card-->
                        </div>
                        <!--begin::Add new card-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
@include('roles.create')
@include('roles.edit')
@include('roles.permission')

@section('scripts')
@include('roles.js')
@endsection