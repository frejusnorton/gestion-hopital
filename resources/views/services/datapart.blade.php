<table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_table_users" style="width: 100%;">
    <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1">
                <span class="dt-column-title text-primary " role="button">Nom</span>
                <span class="dt-column-order"></span>
            </th>

            <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="2">
                <span class="dt-column-title text-primary" role="button">Statut</span>
                <span class="dt-column-order"></span>
            </th>
            <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="2">
                <span class="dt-column-title text-primary" role="button">Date de création</span>
                <span class="dt-column-order"></span>
            </th>
            <th class="min-w-125px dt-orderable-asc dt-orderable-desc text-end" data-dt-column="3">
                <span class="dt-column-title text-primary" role="button">Action</span>
                <span class="dt-column-order"></span>
            </th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold">
        @forelse ($services as $service)
            <tr>
                <td class="align-middle">
                    <strong>{{ $service->nom }}</strong>
                </td>
                <td class="align-middle">
                    <span class="badge {{ $service->statut == 1 ? 'bg-success' : 'bg-danger' }}">
                        {{ $service->statut == 1 ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="align-middle">
                    {{ $service->created_at }}
                </td>
                <td class="text-end">
                    <div class="dropdown">
                        <a class="btn btn-light btn-active-light-primary btn-sm dropdown-toggle" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Actions
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Modifier -->
                            <li class="mb-2">
                                <a id="edit-role" href="javascript:void(0);" class="menu-link px-3 text-warning"
                                    data-bs-toggle="modal" data-bs-target="#edit_service"
                                    data-name="{{ $service->nom }}"
                                    data-url="{{ route('service.edit', ['service' => $service->id]) }}">
                                    <i class="bi bi-pencil  text-warning"></i> Modifier
                                </a>
                            </li>
                            <!-- Désactiver -->
                            <li class="mb-2">
                                <a id="supprimer_role" href="javascript:void(0);" class="menu-link px-3 text-danger"
                                    data-url="{{ route('service.delete', ['service' => $service->id]) }}">
                                    <i class="bi bi-trash text-danger"></i> Supprimer
                                </a>
                            </li>

                        </ul>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">Aucun service disponible</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Pagination -->
<div class="mt-3">
    {{ $services->links('pagination.custom') }}
</div>
