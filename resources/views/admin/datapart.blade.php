<table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_table_users" style="width: 100%;">
    <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th>Profil</th>
            <th>Nom & Prénom</th>
            <th>Identifiant</th>
            <th>Matricule</th>
            <th>E-mail</th>
            <th>Role</th>
            <th>Profession</th>
            <th>Service</th>
            <th>Date de création</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold">
        @if($administrateurs->isEmpty())
            <tr>
                <td colspan="7" class="text-center text-muted">
                    Aucun administrateur disponible.
                </td>
            </tr>
        @endif
        @foreach($administrateurs as $admin)
            <tr>
                <td class="d-flex align-items-center">
                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                        <span>
                            <div class="symbol-label">
                                <img src="{{ $admin->profil ? asset('storage/' . $admin->profil) : asset('assets/media/avatars/blank.png') }}" alt="{{ $admin->nom }}" class="w-100">
                            </div>
                        </span>
                    </div>
                </td>
                 <td>
                    <div class="d-flex flex-column">
                        <span  class="text-gray-800 text-hover-primary mb-1">{{ $admin->nom }} {{ $admin->prenom }}</span>
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column">
                        <span class="text-gray-800 text-hover-primary mb-1">{{ $admin->identifiant }}</span>
                    </div>
                 </td>
                 <td>
                    <div class="d-flex flex-column">
                        <span class="text-gray-800 text-hover-primary mb-1">{{ $admin->matricule }}</span>
                    </div>
                 </td>
                 <td>
                    <div class="d-flex flex-column">
                        <span class="text-gray-800 text-hover-primary mb-1">{{ $admin->email }}</s>
                    </div>
                 </td>
                <td>
                   <span class="badge badge-light-primary">{{ $admin->getRoleNames()->first() ?? 'Aucun rôle' }}</span> 
                </td>

                <td>
                    <div class="d-flex flex-column">
                        <span  class="text-gray-800 text-hover-primary mb-1">{{ $admin->profession->name }}</span>
                    </div>
                 </td>
                 <td>
                    <div class="d-flex flex-column">
                        <span  class="text-gray-800 text-hover-primary mb-1">{{ $admin->service->name }}</span>
                    </div>
                 </td>


                <td>
                    <div class="">{{ $admin->created_at ?? 'Non renseigné' }}</div>
                </td>
                <td class="text-center">
                    <button id="edit_admin" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                        data-bs-toggle="modal" data-bs-target="#kt_modal_update_admin"
                        data-name="{{ $admin->name}}"
                        data-url="{{ route('admin.edit', ['admin' => $admin->id]) }}">
                        <i class="bi bi-pencil fs-3 text-warning"></i>
                    </button>

                    <button id="delete_admin" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                        data-url="{{ route('admin.delete', ['admin' => $admin->id]) }}">
                        <i class="bi bi-trash fs-3 text-danger"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>