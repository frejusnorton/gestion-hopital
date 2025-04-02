<!--begin::Modal - Add role-->
<div class="modal fade" id="kt_modal_edit_role" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="add_roleLabel" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-600px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Modifier un rôle</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-lg-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_edit_role_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_role_header"
                        data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px"
                        style="max-height: 623px;">
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Nom</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="name" class="form-control form-control-solid" placeholder="Enter le nom"
                                name="name">
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <!--end::Input group-->

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
                                            @foreach (['read', 'update', 'create', 'delete'] as $action)
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
                    </div>
                    <!--end::Scroll-->

                    <!--begin::Actions-->
                    <div class=" text-center pt-15">

                        <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                            <span class="indicator-label">
                                Enregistrer
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
<!--end::Modal - Add role-->