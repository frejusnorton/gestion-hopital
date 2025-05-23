<script>
    $('.filter').on('keyup', function (e) {
        var search = $('#search').val();
        var url = "{{ route('profession.index') }}";

        $("div#datapart").html('<div class="col-xs-12 text-center" style="padding-top: 3em;">' +
            '<i class="fa fa-spin fa-spinner" style="color: lightgrey; font-size: 4em;"></i>' +
            ' </div>'
        );

        if (window.ajaxControl) {
            window.ajaxControl.abort();
        }

        window.ajaxControl = $.ajax({
            url: url,
            data: {
                'search': search,
            },
            type: 'GET',
            success: function (data) {
                $("div#datapart").html(data);
                $('[data-bs-toggle="modal"]').tooltip();
            }
        });
    });

    // AJOUT D'UNE PROFESSION
    $(document).ready(function () {
        $("#kt_modal_add_permission_form").submit(function (event) {
        
            event.preventDefault();

            let form = $(this);
            let formData = form.serialize();
            let loginBtn = $("#loginBtn");
            let spinner = $("#loading-spinner");

            loginBtn.prop("disabled", true);
            spinner.removeClass("d-none");

            $(".text-danger").text("");
            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: formData,
                success: function (response) {
                    $('#kt_modal_add_permission').modal('hide');
                    Swal.fire({
                        icon: "success",
                        title: "Succès",
                        text: response.message,
                        confirmButtonColor: "#28a745",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.status === 500) {
                        Swal.fire({
                            icon: "error",
                            title: "Erreur serveur",
                            text: "Une erreur interne est survenue. Veuillez réessayer dans un instant.",
                            confirmButtonColor: "#d33"
                        });
                    }
                    let errors = xhr.responseJSON?.errors;
                    if (errors && errors.name) {
                        Swal.fire({
                            icon: "error",
                            title: "Erreur ",
                            text: errors.name[0],
                            confirmButtonColor: "#d33"
                        });
                    }
                },
                complete: function () {
                    loginBtn.prop("disabled", false);
                    spinner.addClass("d-none");
                }
            });
        });
    });

    // MODIFIER UNE PROFFESION
    $(document).on("click", "#edit_profession", function () {
        const name = $(this).data('name');
        $('#name').val(name);
        $('#kt_modal_update_profession_form').attr('action', $(this).data('url'));

        
    });

    $(document).ready(function () {
        $("#kt_modal_update_profession_form").submit(function (event) {
            event.preventDefault();

            let form = $(this);
            let formData = form.serialize();
            let editBtn = $("#editBtn");
            let spinner = $("#loading-spinner");

            editBtn.prop("disabled", true);
            spinner.removeClass("d-none");

            $(".text-danger").text("");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: formData,
                success: function (response) {
                    $('#kt_modal_update_profession').modal('hide');
                    Swal.fire({
                        icon: "success",
                        title: "Succès",
                        text: response.message,
                        confirmButtonColor: "#28a745",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.status === 500) {
                        Swal.fire({
                            icon: "error",
                            title: "Erreur serveur",
                            text: "Une erreur interne est survenue. Veuillez réessayer dans un instant.",
                            confirmButtonColor: "#d33"
                        });
                    }

                    let errors = xhr.responseJSON?.errors;
                    if (errors) {
                        Object.keys(errors).forEach((key) => {
                            errors[key].forEach((errorMessage) => {
                                Swal.fire({
                                    icon: "error",
                                    title: "Erreur",
                                    text: errorMessage,
                                    confirmButtonColor: "#d33"
                                });
                            });
                        });
                    }
                },
                complete: function () {
                    editBtn.prop("disabled", false);
                    spinner.addClass("d-none");
                }
            });
        });
    });



    // SUPPRIMER PROFESSION
    $(document).on('click', '#delete_profession', function () {
        const url = $(this).data('url');

        Swal.fire({
            title: "Voulez-vous vraiment supprimer cette profession ?",
            html: "<span style='color: red;'>Cette action est irréversible et vous risquez de perdre vos données.</span>",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Continuer",
            cancelButtonText: "Annuler"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        Swal.fire(
                            'Succès !',
                            response.message,
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function () {
                        Swal.fire(
                            'Erreur',
                            'Une erreur s\'est produite. Veuillez réessayer.',
                            'error'
                        );
                    }
                });
            }
        });
    });

    //PERMISSION
    $(document).ready(function () {
        let role_id = null;
        $(document).on("click", "#permission_role", function () {
            role_id = $(this).data("id");
            $("#role_id").val(role_id);
            let name = $(this).data("name");
            $(".modaltitle").text(`Listes des permission pour le rôle ${name}`);
        });

        $("#permission_form").submit(function (event) {
            console.log(role_id)
            event.preventDefault();

            let form = $(this);
            let formData = form.serialize() + "&role=" + role_id;
            let loginBtn = $("#loginBtn");
            let spinner = $("#loading-spinner");

            loginBtn.prop("disabled", true);
            spinner.removeClass("d-none");

            $(".text-danger").text("");
            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: formData,
                success: function (response) {
                    Swal.fire({
                        icon: "success",
                        title: "Succès",
                        text: response.message,
                        confirmButtonColor: "#28a745",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.status === 500) {
                        Swal.fire({
                            icon: "error",
                            title: "Erreur serveur",
                            text: "Une erreur interne est survenue. Veuillez réessayer dans un instant.",
                            confirmButtonColor: "#d33"
                        });
                        return;
                    }
                    let errors = xhr.responseJSON?.errors;
                    if (errors) {
                        let messages = Object.values(errors).flat().join(
                            "\n");

                        Swal.fire({
                            icon: "error",
                            title: "Erreurs ",
                            text: messages,
                            confirmButtonColor: "#d33"
                        });
                    }
                },
                complete: function () {
                    loginBtn.prop("disabled", false);
                    spinner.addClass("d-none");
                }
            });
        });
    });
</script>