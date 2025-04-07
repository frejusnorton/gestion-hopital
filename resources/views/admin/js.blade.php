<script>
    $('.filter').on('keyup', function(e) {
        var search = $('#search').val();
        var url = "{{ route('admin.index') }}";

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
            success: function(data) {
                $("div#datapart").html(data);
                $('[data-bs-toggle="modal"]').tooltip();
            }
        });
    });

    // AJOUT D'UN ADMIN
    $(document).ready(function() {
        $("#kt_modal_add_admin_form").submit(function(event) {
            event.preventDefault();
            let form = $(this);
            let formData = new FormData(this);
            let submitBtn = form.find('button[type="submit"]');
            let indicatorLabel = submitBtn.find('.indicator-label');
            let indicatorProgress = submitBtn.find('.indicator-progress');

            // Désactiver le bouton et afficher le spinner
            submitBtn.prop("disabled", true);
            indicatorLabel.addClass("d-none");
            indicatorProgress.removeClass("d-none");

            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
    $('#kt_modal_add_admin').modal('hide');
    Swal.fire({
        icon: "success",
        title: "Succès",
        html: `
            <p>${response.message}</p>
            <p><strong>Mot de passe temporaire ! Veuillez la changer après connexion :</strong> <span style="color: #28a745;">${response.password}</span></p>
        `,
        confirmButtonColor: "#28a745",
        allowOutsideClick: false, 
        allowEscapeKey: false,     
        allowEnterKey: false      
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.reload();
        }
    });
}, 

                error: function(xhr) {
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
                complete: function() {
                    // Réactiver le bouton et cacher le spinner
                    submitBtn.prop("disabled", false);
                    indicatorLabel.removeClass("d-none");
                    indicatorProgress.addClass("d-none");
                }
            });
        });
    });


    // MODIFIER UN ADMIN
    $(document).on("click", "#edit-role", function() {
        const name = $(this).data('name');
        $('#name').val(name);
        $('#edit_role_form').attr('action', $(this).data('url'));
    });

    $(document).ready(function() {
        $("#edit_role_form").submit(function(event) {
            console.log('soumis');
            event.preventDefault();

            let form = $(this);
            let formData = form.serialize();
            let loginBtn = $("#loginBtn");
            let spinner = $("#loading-spinner");

            loginBtn.prop("disabled", true);
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
                success: function(response) {
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
                error: function(xhr) {
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
                complete: function() {
                    loginBtn.prop("disabled", false);
                    spinner.addClass("d-none");
                }
            });
        });
    });

    // SUPPRIMER UN ADMIN
    $(document).on('click', '#supprimer_role', function() {
        const url = $(this).data('url');
        Swal.fire({
            title: "Voulez-vous vraiment supprimer ce rôle ?",
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
                    success: function(response) {
                        Swal.fire(
                            'Succès !',
                            response.message,
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function() {
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
</script>
