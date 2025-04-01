{{-- <div class="modal fade" id="add_role" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="add_roleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-500px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold" id="modaltitle">Ajouter un rôle</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <form id="ajout_role" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{route('roles.create')}}" method="POST">
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Nom </label>
                            <input type="text" name="name" class="form-control mb-3 mb-lg-0" id="nom">
                        </div>
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-lg btn-primary  mb-5" id="loginBtn">
                            <span class="indicator-label">Soumettre</span>
                            <span class="spinner-border spinner-border-sm align-middle ms-2 d-none"
                                id="loading-spinner"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade" id="kt_modal_add_role" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="add_roleLabel" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Ajouter un rôle </h2>
                <!--end::Modal title-->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 my-7">
                <!--begin::Form-->
                <!--begin::Form-->
                <form id="kt_modal_add_role_form" class="form" method="post">
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Nom du rôle</span>
                            </label>
                            <input class="form-control form-control-solid" placeholder="Entrez le nom du rôle"
                                name="name">
                        </div>
                        <!--end::Input group-->

                        <!--begin::Permissions-->
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <thead>
                                    <tr>
                                        <th>Permissions</th>
                                        <th>Lire</th>
                                        <th>Modifier</th>
                                        <th>Créer</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td class="text-gray-800 text-uppercase">
                                                {{ $permission->name }}
                                            </td>

                                            <!-- Actions -->
                                            @foreach (['read', 'write', 'create', 'delete'] as $action)
                                                <td>
                                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="permissions[{{ strtolower($permission->name) }}][{{ $action }}]">
                                                        <span class="form-check-label"></span>
                                                    </label>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end::Permissions-->
                    </div>

                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Enregistrer</span>
                            <span class="indicator-progress">
                                Veuillez patienter... <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->

                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>