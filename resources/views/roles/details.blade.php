@extends('main.index')
@section('title', 'Détails rôle')
@section('toolbar')
    <div class="toolbar d-flex align-items-stretch">
        <!--begin::Toolbar container-->
        <div
            class=" container-xxl  py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">


            <!--begin::Page title-->
            <div class="page-title d-flex justify-content-center flex-column me-5">
                <!--begin::Title-->
                <h1 class="d-flex flex-column text-gray-900 fw-bold fs-3 mb-0">
                    Détails rôle</h1>
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
                    <li class="breadcrumb-item text-gray-900"> Détails rôle
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
    <div class="content d-flex flex-column flex-column-fluid " id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class=" container-xxl ">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">

                        <!--begin::Card-->
                        <div class="card card-flush">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="mb-0">{{$role->name}}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Permissions-->
                                <div class="d-flex flex-column text-gray-600">
                                    @forelse ($role->permissions as $permission)
                               
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span> {{ $permission->name }}
                                    </div>
                                    <ul class="ms-3">
                                        @if ($permission->pivot->can_read)
                                            <li>Lire</li>
                                        @endif
                                        @if ($permission->pivot->can_update)
                                            <li>Écrire</li>
                                        @endif
                                        @if ($permission->pivot->can_create)
                                            <li>Mettre à jour</li>
                                        @endif
                                        @if ($permission->pivot->can_delete)
                                            <li>Supprimer</li>
                                        @endif
                                    </ul>
                                @empty
                                    <div class="text-muted">Aucune permission assignée</div>
                                @endforelse
                                </div>
                                <!--end::Permissions-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->

                        <!--begin::Modal-->

                        <!--begin::Modal - Update role-->
                        <div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-750px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bold">Update Role</h2>
                                        <!--end::Modal title-->

                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            data-kt-roles-modal-action="close">
                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->

                                    <!--begin::Modal body-->
                                    <div class="modal-body scroll-y mx-5 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_modal_update_role_form"
                                            class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                            <!--begin::Scroll-->
                                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                id="kt_modal_update_role_scroll" data-kt-scroll="true"
                                                data-kt-scroll-activate="{default: false, lg: true}"
                                                data-kt-scroll-max-height="auto"
                                                data-kt-scroll-dependencies="#kt_modal_update_role_header"
                                                data-kt-scroll-wrappers="#kt_modal_update_role_scroll"
                                                data-kt-scroll-offset="300px" style="max-height: 623px;">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="fs-5 fw-bold form-label mb-2">
                                                        <span class="required">Role name</span>
                                                    </label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid"
                                                        placeholder="Enter a role name" name="role_name" value="Developer">
                                                    <!--end::Input-->
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Permissions-->
                                                <div class="fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                                                    <!--end::Label-->

                                                    <!--begin::Table wrapper-->
                                                    <div class="table-responsive">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                            <!--begin::Table body-->
                                                            <tbody class="text-gray-600 fw-semibold">
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <td class="text-gray-800">
                                                                        Administrator Access


                                                                        <span class="ms-1" data-bs-toggle="tooltip"
                                                                            aria-label="Allows a full access to the system"
                                                                            data-bs-original-title="Allows a full access to the system"
                                                                            data-kt-initialized="1">
                                                                            <i
                                                                                class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                                                    class="path1"></span><span
                                                                                    class="path2"></span><span
                                                                                    class="path3"></span></i></span>
                                                                    </td>
                                                                    <td>
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                value="" id="kt_roles_select_all">
                                                                            <span class="form-check-label"
                                                                                for="kt_roles_select_all">
                                                                                Select all
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->
                                                                    </td>
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">User Management</td>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="user_management_read">
                                                                                <span class="form-check-label">
                                                                                    Read
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="user_management_write">
                                                                                <span class="form-check-label">
                                                                                    Write
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="user_management_create">
                                                                                <span class="form-check-label">
                                                                                    Create
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Content Management</td>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="content_management_read">
                                                                                <span class="form-check-label">
                                                                                    Read
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="content_management_write">
                                                                                <span class="form-check-label">
                                                                                    Write
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="content_management_create">
                                                                                <span class="form-check-label">
                                                                                    Create
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Financial Management</td>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="financial_management_read">
                                                                                <span class="form-check-label">
                                                                                    Read
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="financial_management_write">
                                                                                <span class="form-check-label">
                                                                                    Write
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="financial_management_create">
                                                                                <span class="form-check-label">
                                                                                    Create
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Reporting</td>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="reporting_read">
                                                                                <span class="form-check-label">
                                                                                    Read
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="reporting_write">
                                                                                <span class="form-check-label">
                                                                                    Write
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="reporting_create">
                                                                                <span class="form-check-label">
                                                                                    Create
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Payroll</td>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="payroll_read">
                                                                                <span class="form-check-label">
                                                                                    Read
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="payroll_write">
                                                                                <span class="form-check-label">
                                                                                    Write
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="payroll_create">
                                                                                <span class="form-check-label">
                                                                                    Create
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Disputes Management</td>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="disputes_management_read">
                                                                                <span class="form-check-label">
                                                                                    Read
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="disputes_management_write">
                                                                                <span class="form-check-label">
                                                                                    Write
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="disputes_management_create">
                                                                                <span class="form-check-label">
                                                                                    Create
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">API Controls</td>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="api_controls_read">
                                                                                <span class="form-check-label">
                                                                                    Read
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="api_controls_write">
                                                                                <span class="form-check-label">
                                                                                    Write
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="api_controls_create">
                                                                                <span class="form-check-label">
                                                                                    Create
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Database Management</td>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="database_management_read">
                                                                                <span class="form-check-label">
                                                                                    Read
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="database_management_write">
                                                                                <span class="form-check-label">
                                                                                    Write
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="database_management_create">
                                                                                <span class="form-check-label">
                                                                                    Create
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Repository Management</td>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="repository_management_read">
                                                                                <span class="form-check-label">
                                                                                    Read
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="repository_management_write">
                                                                                <span class="form-check-label">
                                                                                    Write
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->

                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="repository_management_create">
                                                                                <span class="form-check-label">
                                                                                    Create
                                                                                </span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                            </tbody>
                                                            <!--end::Table body-->
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                    <!--end::Table wrapper-->
                                                </div>
                                                <!--end::Permissions-->
                                            </div>
                                            <!--end::Scroll-->

                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-roles-modal-action="cancel">
                                                    Discard
                                                </button>

                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-roles-modal-action="submit">
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
                        <!--end::Modal - Update role--><!--end::Modal-->
                    </div>
                    <!--end::Sidebar-->

                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-10">
                        <!--begin::Card-->
                        <div class="card card-flush mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header pt-5">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="d-flex align-items-center"> Utilisateurs assignés<span
                                            class="text-gray-600 fs-6 ms-1">
                                            ({{ $rolesWithUserCount[$role->id]->users_count ?? 0 }}) </span></h2>
                                </div>
                              
                                <div class="card-toolbar">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1"
                                        data-kt-view-roles-table-toolbar="base">
                                        <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span
                                                class="path1"></span><span class="path2"></span></i> <input type="text"
                                            data-kt-roles-table-filter="search"
                                            class="form-control form-control-solid w-250px ps-15"
                                            placeholder="Rechercher un utilisateur">
                                    </div>
                                    <!--end::Search-->

                                    <!--begin::Group actions-->
                                    <div class="d-flex justify-content-end align-items-center d-none"
                                        data-kt-view-roles-table-toolbar="selected">
                                        <div class="fw-bold me-5">
                                            <span class="me-2" data-kt-view-roles-table-select="selected_count"></span>
                                            Selected
                                        </div>

                                        <button type="button" class="btn btn-danger"
                                            data-kt-view-roles-table-select="delete_selected">
                                            Delete Selected
                                        </button>
                                    </div>
                                    <!--end::Group actions-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                          
                            <div class="card-body pt-0">
                                <!--begin::Table-->
                                <div id="kt_roles_view_table_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                                    <div id="" class="table-responsive">
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 dataTable"
                                            id="kt_roles_view_table" style="width: 100%;">
                                            <thead>
                                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="min-w-150px">Profil</th>
                                                    <th class="min-w-150px">Identidiant</th>
                                                    <th class="min-w-125px">Nom</th>
                                                    <th class="text-end min-w-100px">Prénom</th>
                                                    <th class="text-end min-w-100px">E-mail</th>
                                                    <th class="text-end min-w-100px">Sexe</th>
                                                    <th class="text-end min-w-100px">Poste</th>
                                                    <th class="text-end min-w-100px">Spécialité</th>
                                                    <créa class="text-end min-w-100px">Date de création</créa>
                                                    <th class="text-end min-w-100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600">
                                                @forelse ($role->users as $user)
                                                    <tr>
                                                        <td class="d-flex align-items-center">
                                                            <!--begin:: Avatar -->
                                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                                <a href="#">
                                                                    <div class="symbol-label">
                                                                        <img src="{{ asset('path/to/default-avatar.jpg') }}"
                                                                            alt="{{ $user->name }}" class="w-100">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex flex-column">
                                                                <span class="text-gray-800 text-hover-primary mb-1">
                                                                    {{ $user->nom }}
                                                                </span>
                                                            </div>
                                                            <!--end::User details-->
                                                        </td>
                                                        <td>
                                                            <div class="d-flex flex-column">
                                                                <span class="text-gray-800 text-hover-primary mb-1">
                                                                    {{ $user->email }}
                                                                </span>
                                                            </div>
                                                            <!--end::User details-->
                                                        </td>
                                                        <td>
                                                            <div class="d-flex flex-column">
                                                                <span class="text-gray-800 text-hover-primary mb-1">
                                                                    {{ $user->email }}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <div class="d-flex flex-column">
                                                                <span class="text-gray-800 text-hover-primary mb-1">
                                                                    {{ $user->email }}
                                                                </span>
                                                            </div>
                                                        </td> <td>

                                                            <div class="d-flex flex-column">
                                                                <span class="text-gray-800 text-hover-primary mb-1">
                                                                    {{ $user->email }}
                                                                </span>
                                                            </div>
                                                        </td><td>

                                                            <div class="d-flex flex-column">
                                                                <span class="text-gray-800 text-hover-primary mb-1">
                                                                    {{ $user->email }}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>{{ $user->created_at->format('d M Y, h:i a') }}</td>

                                                        <td class="text-end">
                                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                                                data-kt-menu-trigger="click"
                                                                data-kt-menu-placement="bottom-end">
                                                                Actions
                                                                <i class="ki-duotone ki-down fs-5 m-0"></i>
                                                            </a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                                data-kt-menu="true">
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3">
                                                                        View
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3"
                                                                        data-kt-roles-table-filter="delete_row">
                                                                        Delete
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!--end::Menu-->
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="text-center">Aucun utilisateur</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--end::Table-->
                            </div>

                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection


@section('scripts')
    @include('roles.js')
@endsection