<!--begin::Modal - Adjust Balance-->
<div class="modal fade" id="kt_modal_export_profession" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="add_roleLabel" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-550px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Exporter les professions</h2>
                <!--end::Modal title-->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_modal_export_profession_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{ route('profession.export') }}" method="post">
                    @csrf
                    <!--begin::Input group-->
                    <div class="fv-row mb-10 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-semibold form-label mb-2">Selectionner le format
                        </label>
                        <!--begin::Input-->
                        <select name="format" data-control="select2" data-placeholder="Selectionner le format"
                            data-hide-search="true"
                            class="form-select form-select-solid fw-bold select2-hidden-accessible"
                            data-select2-id="select2-data-19-fvxk" tabindex="-1" aria-hidden="true"
                            data-kt-initialized="1">
                            <option value="excel" selected>Excel</option>
                            <option value="pdf">PDF</option>
                        </select>
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" >
                            <span class="indicator-label">
                                Exporter
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
<!--end::Modal - New Card-->