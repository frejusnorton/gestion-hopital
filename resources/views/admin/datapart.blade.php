<table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_table_users" style="width: 100%;">
    <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-125px">Profil</th>
            <th class="min-w-125px">Matricule</th>
            <th class="min-w-125px">Identifiant</th>
            <th class="min-w-125px">Nom</th>
            <th class="min-w-125px">Prénom</th>
            <th class="min-w-125px">E-mail</th>
            <th class="min-w-125px">Sexe</th>
            <th class="min-w-125px">Date de création</th>
            <th class="text-end min-w-100px">Actions</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold">
        @forelse ($administrateurs as $admin)
            <tr>
                <td class="d-flex align-items-center">
                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                        <a href="#">
                            <div class="symbol-label">
                                <img src="{{ $admin->avatar ?? '/default-avatar.jpg' }}" alt="{{ $admin->nom }}"
                                    class="w-100">
                            </div>
                        </a>
                    </div>
                </td>
                <td class="d-flex align-items-center">
                    <!--begin:: Avatar -->
                    <!--end::Avatar-->
                    <!--begin::User details-->
                    <div class="d-flex flex-column">
                        {{ $admin->matricule }}
                    </div>
                    <!--begin::User details-->
                </td>
                <td class="d-flex align-items-center">
                    <!--begin:: Avatar -->
                    <!--end::Avatar-->
                    <!--begin::User details-->
                    <div class="d-flex flex-column">
                        {{ $admin->matricule }}

                    </div>
                    <!--begin::User details-->
                </td>

                <td>
                    {{ $admin->matricule }}
                </td>
                <td data-order="2025-03-31T22:53:14+01:00">
                    {{ $admin->matricule }}
                </td>

                <td data-order="2025-09-22T11:05:00+01:00">
                    22 Sep 2025, 11:05 am </td>
                <td class="text-end">
                    <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="/metronic8/demo8/apps/user-management/users/view.html" class="menu-link px-3">
                                Edit
                            </a>
                        </div>
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">
                                Delete
                            </a>
                        </div>
                    </div>
                    <!--end::Menu-->
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center text-muted">Aucun administrateur disponible</td>
            </tr>
        @endforelse

    </tbody>
</table>

<div class="mt-3">
    {{ $administrateurs->links('pagination.custom') }}
</div>