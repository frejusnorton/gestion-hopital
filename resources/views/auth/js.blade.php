<script>
    $(document).ready(function () {
        // Ajout du token CSRF aux requêtes AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#loginForm").submit(function (event) {
            event.preventDefault();

            let form = $(this);
            let formData = form.serialize();
            let loginBtn = $("#loginBtn");
            let spinner = $("#loading-spinner");

            loginBtn.prop("disabled", true);
            spinner.removeClass("d-none");

            $(".text-danger").text("");

            $.ajax({
                Swal.fire({
                    icon: "success",
                    title: "Succès",
                    text: response.message,
                    confirmButtonColor: "#28a745",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('home') }}";
                    }
                });
                error: function (xhr) {
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
                    loginBtn.prop("disabled", false);
                    spinner.addClass("d-none");
                }
            });
        });
    });
</script>