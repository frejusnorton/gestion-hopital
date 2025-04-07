<script>
    $(document).on('click', '#deconnexion', function () {
        const url = $(this).data('url');

        Swal.fire({
            title: "Voulez-vous vraiment vous déconnecter?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            allowOutsideClick: false, 
            allowEscapeKey: false,     
            allowEnterKey: false ,    
            confirmButtonText: "Continuer",
            cancelButtonText: "Annuler"
        }).then((result) => {
            // if (result.isConfirmed) {
            //     $.ajax({
            //         url: url,
            //         type: 'POST',
            //         data: {
            //             _token: $('meta[name="csrf-token"]').attr('content'),
            //         },
            //         success: function (response) {
            //             Swal.fire(
            //                 'Succès !',
            //                 response.message,
            //                 'success'
            //             ).then(() => {
            //                 location.reload();
            //             });
            //         },
            //         error: function () {
            //             Swal.fire(
            //                 'Erreur',
            //                 'Une erreur s\'est produite. Veuillez réessayer.',
            //                 'error'
            //             );
            //         }
            //     });
            // }
        });
    });
</script>