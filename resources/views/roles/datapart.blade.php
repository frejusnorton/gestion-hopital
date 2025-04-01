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
                                            <li>Écrire</li>
                                        @endif
                                        @if ($permission->pivot->can_create)
                                            <li>Mettre à jour</li>
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
                        <div class="card-footer flex-wrap pt-0">

                            <a href="{{ route('roles.details', ['role' => $role->id]) }}"
                                class="btn btn-light btn-active-primary my-1 me-2">Voir le rôle</a>

                            <button id="deit_role_btn" type="button" class="btn btn-light btn-active-light-primary my-1"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_edit_role"
                                data-name="{{ $role->name  }}" data-permissions="{{ json_encode($role->permissions->pluck('id')->toArray()) }}">Modifier le rôle</button>
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