{{-- <div class="modal fade" id="edit_role" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="add_roleLabel">
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
                            <input id="name" type="text" name="name" class="form-control mb-3 mb-lg-0">
                        </div>
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-sm btn-primary  mb-5" id="editBtn">
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

<!--begin::Modal - Add role-->
<div class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Ajouter un rôle</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-lg-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_role_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_role_header"
                        data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px"
                        style="max-height: 623px;">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Role name</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="Enter a role name"
                                name="role_name">
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

                                                <span class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover"
                                                    data-bs-html="true"
                                                    data-bs-content="Allows a full access to the system"
                                                    data-kt-initialized="1">
                                                    <i class="ki-duotone ki-information fs-7"><span
                                                            class="path1"></span><span class="path2"></span><span
                                                            class="path3"></span></i>
                                                </span>
                                            </td>
                                            <td>
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-9">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="kt_roles_select_all">
                                                    <span class="form-check-label" for="kt_roles_select_all">
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

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="user_management_read">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="user_management_write">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="user_management_create">
                                                        <span class="form-check-label" "="">
                                        Create
                                    </span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Options-->
                    </tr>
                    <!--end::Table row-->
                                                            <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class=" text-gray-800">Content Management
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="content_management_read">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="content_management_write">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="content_management_create">
                                                        <span class="form-check-label" "="">
                                        Create
                                    </span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Options-->
                    </tr>
                    <!--end::Table row-->
                                                            <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class=" text-gray-800">Financial Management
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="financial_management_read">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="financial_management_write">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="financial_management_create">
                                                        <span class="form-check-label" "="">
                                        Create
                                    </span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Options-->
                    </tr>
                    <!--end::Table row-->
                                                            <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class=" text-gray-800">Reporting
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="reporting_read">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="reporting_write">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="reporting_create">
                                                        <span class="form-check-label" "="">
                                        Create
                                    </span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Options-->
                    </tr>
                    <!--end::Table row-->
                                                            <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class=" text-gray-800">Payroll
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="payroll_read">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="payroll_write">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="payroll_create">
                                                        <span class="form-check-label" "="">
                                        Create
                                    </span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Options-->
                    </tr>
                    <!--end::Table row-->
                                                            <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class=" text-gray-800">Disputes Management
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="disputes_management_read">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="disputes_management_write">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="disputes_management_create">
                                                        <span class="form-check-label" "="">
                                        Create
                                    </span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Options-->
                    </tr>
                    <!--end::Table row-->
                                                            <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class=" text-gray-800">API Controls
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="api_controls_read">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="api_controls_write">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="api_controls_create">
                                                        <span class="form-check-label" "="">
                                        Create
                                    </span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Options-->
                    </tr>
                    <!--end::Table row-->
                                                            <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class=" text-gray-800">Database Management
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="database_management_read">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="database_management_write">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="database_management_create">
                                                        <span class="form-check-label" "="">
                                        Create
                                    </span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Options-->
                    </tr>
                    <!--end::Table row-->
                                                            <!--begin::Table row-->
                    <tr>
                        <!--begin::Label-->
                        <td class=" text-gray-800">Repository Management
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="repository_management_read">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="repository_management_write">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="repository_management_create">
                                                        <span class="form-check-label" "="">
                                        Create
                                    </span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Options-->
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
<div class=" text-center pt-15">
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
<!--end::Modal - Add role-->