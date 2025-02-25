<script>
    $(document).ready(function() {
        $("#loginForm").submit(function(event) {
            console.log('soumis');
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
                success: function(response) {
                    window.location.href = "{{ route('home') }}";
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
                        if (errors.username) {
                            $(".error-name").text(errors.email[0]);
                        }
                        if (errors.password) {
                            $(".error-password").text(errors.password[0]);
                        }
                        if (errors.identifiants) {
                            Swal.fire({
                                icon: "error",
                                title: "Erreur",
                                text: errors.identifiants[
                                0],
                                confirmButtonColor: "#d33"
                            });
                        }
                    }
                },
                complete: function() {
                    loginBtn.prop("disabled", false);
                    spinner.addClass("d-none");
                }
            });
        });
    });
</script>
