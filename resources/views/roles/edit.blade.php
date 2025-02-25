<div class="modal fade" id="edit_role" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="add_roleLabel" >
    <div class="modal-dialog modal-dialog-centered mw-500px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold modaltitle " id="modaltitle">Modifier le rôle</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <form id="edit_role_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST">
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2 ">Nom </label>
                            <input id = "name" type="text" name="name" class="form-control mb-3 mb-lg-0" >
                        </div>
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-sm btn-primary  mb-5" id="loginBtn">
                            <span class="indicator-label">Soumettre</span>
                            <span class="spinner-border spinner-border-sm align-middle ms-2 d-none"
                                id="loading-spinner"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
