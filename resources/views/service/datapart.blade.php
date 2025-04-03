<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 dataTable" id="kt_services_table"
    style="width: 100%;">
    <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="0" rowspan="1" colspan="1"
                aria-label="Name: Activate to sort" tabindex="0"><span class="dt-column-title"
                    role="button">Nom</span><span class="dt-column-order"></span></th>
            <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="2" rowspan="1" colspan="1"
                aria-label="Created Date: Activate to sort" tabindex="0"><span class="dt-column-title"
                    role="button">Date de création</span><span class="dt-column-order"></span></th>
            <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="2" rowspan="1" colspan="1"
                aria-label="Created Date: Activate to sort" tabindex="0"><span class="dt-column-title"
                    role="button">Dernière mise à jour</span><span class="dt-column-order"></span></th>
            <th class="text-end min-w-100px dt-orderable-none" data-dt-column="3" rowspan="1" colspan="1"
                aria-label="Actions"><span class="dt-column-title">Actions</span><span class="dt-column-order"></span>
            </th>
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
        @if ($services->isEmpty())
            <tr>
                <td colspan="5" class="text-center text-muted">
                    Aucun service disponible.
                </td>
            </tr>
        @endif
        @foreach ($services as $service)
            <tr>
                <td>{{ $service->name }}</td>

                <td data-order="{{ $service->created_at }}">
                    {{ \Carbon\Carbon::parse($service->created_at)->locale('fr')->isoFormat('D MMM YYYY, HH:mm') }}
                </td>
                <td data-order="{{ $service->updated_at }}">
                    {{ \Carbon\Carbon::parse($service->updated_at)->locale('fr')->isoFormat('D MMM YYYY, HH:mm') }}
                </td>
                <td class="text-center">
                    <button id="edit_service" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                        data-bs-toggle="modal" data-bs-target="#kt_modal_update_service"
                        data-name="{{ $service->name}}"
                        data-url="{{ route('service.edit', ['service' => $service->id]) }}">
                        <i class="bi bi-pencil fs-3 text-warning"></i>
                    </button>

                    <button id="delete_service" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                        data-url="{{ route('service.delete', ['service' => $service->id]) }}">
                        <i class="bi bi-trash fs-3 text-danger"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="mt-3">
    {{ $services->links('pagination.custom') }}
</div>

<div id="" class="row">