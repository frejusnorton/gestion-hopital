<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class=" container-xxl ">
        <!--begin::Row-->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
            <!--begin::Col-->
            @foreach ($roles as $role)
                        <div class="col-md-4">
                            <div class="card card-flush h-md-100">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2> {{ $role->name }}</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-1">
                                    <!--begin::Users-->
                                    <div class="fw-bold text-gray-600 mb-5">Nombres total d'utilisateur pour ce rôle
                                        {{ $rolesWithUserCount[$role->id]->users_count ?? 0 }}
                                    </div>
                                    <!--end::Users-->
                                    <!--begin::Permissions-->
                                    <div class="d-flex flex-column text-gray-600">
                                        @forelse ($role->permissions as $permission)

                                            <div class="d-flex align-items-center py-2">
                                                <span class="bullet bg-primary me-3"></span> {{ $permission->name }}
                                            </div>
                                            <ul class="ms-3">
                                                @if ($permission->pivot->can_read)
                                                    <li>Lire</li>
                                                @endif
                                                @if ($permission->pivot->can_update)
                                                    <li>Mettre à jour</li>
                                                @endif
                                                @if ($permission->pivot->can_create)
                                                    <li>Créer</li>
                                                @endif
                                                @if ($permission->pivot->can_delete)
                                                    <li>Supprimer</li>
                                                @endif
                                            </ul>
                                        @empty
                                            <div class="text-muted">Aucune permission assignée</div>
                                        @endforelse
                                    </div>
                                    <!--end::Permissions-->
                                </div>
                                <div class="d-flex flex-wrap gap-2 pt-0 justify-between">
                                    <a href="{{ route('roles.details', ['role' => $role->id]) }}"
                                        class="btn btn-light-primary btn-active-primary my-1">Voir</a>

                                    <button id="edit_role_btn" type="button"
                                        class="btn btn-light-warning btn-active-light-primary my-1" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_edit_role"
                                        data-url="{{ route('roles.edit', ['role' => $role->id]) }}" data-name="{{ $role->name }}"
                                        data-permissions="{{ json_encode($role->permissions->map(function ($permission) {
                    return [
                        'id' => $permission->id,
                        'name' => $permission->name,
                        'can_read' => $permission->pivot->can_read,
                        'can_update' => $permission->pivot->can_update,
                        'can_create' => $permission->pivot->can_create,
                        'can_delete' => $permission->pivot->can_delete,
                    ];
                })) }}">
                                        Modifier
                                    </button>

                                    <button id="delete_role_btn" type="button"
                                        class="btn btn-light-danger btn-active-light-danger my-1"
                                        data-url="{{ route('roles.delete', ['role' => $role->id]) }}">
                                        Supprimer
                                    </button>
                                </div>

                            </div>

                        </div>
                        <!--end::Col-->
            @endforeach

        </div>
        <!--end::Row-->

        <!--begin::Modals-->


    </div>
    <!--end::Container-->
</div>