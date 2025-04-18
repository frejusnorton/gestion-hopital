<div class="modal fade" id="kt_modal_add_permission" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="add_roleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-500px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold" id="modaltitle">Ajouter une permission</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_permission_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{ route('permission.create') }}" method="post">
                    @csrf
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nom</span>

                            <span class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true"
                                data-bs-content="Permission names is required to be unique." data-kt-initialized="1">
                                <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></i> </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-solid" placeholder="Entrer le nom"
                            name="name">
                        <!--end::Input-->
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>

                    <!--begin::Actions-->
                    <div class="pt-15">

                        <button type="submit" class="btn btn-primary btn-sm" >
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
        </div>
    </div>
</div>