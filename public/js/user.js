$(document).ready(function(){

    $.ajax({
        url: "{{ route('admin.get.users') }}", // Ruta que devuelve la lista de usuarios
        type: "GET",
        dataType: "json",
        success: function (response) {
            var users = response.users;
            var userTable = $('#user_table tbody');
            userTable.empty(); // Limpiar la tabla antes de agregar usuarios

            // Iterar sobre los usuarios y agregarlos a la tabla
            $.each(users, function (index, user) {
                var row = '<tr>' +
                    '<td>' + user.name + '</td>' +
                    '<td>' + user.email + '</td>' +
                    '<td>' + user.email_verified_at + '</td>' +
                    '<td>' +
                    '<div class="dropdown">' +
                    // ... (código de acciones) ... 
                    '</div>' +
                    '</td>' +
                    '</tr>';
                userTable.append(row);
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });

    $('#createUserForm').on('submit', function(e){
        e.preventDefault(); // Evita el comportamiento predeterminado del formulario

        var formData = new FormData(this); // Obtiene los datos del formulario
        var url = $(this).data('url'); // Obtiene la URL del atributo data-url
        
        // Limpiar mensajes de error existentes
        $('.text-danger').remove();
        $('.is-invalid').removeClass('is-invalid');

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                $('#createUserForm').modal('hide');
                console.log("Operación completada con éxito"); 
                $('#ModalCreate').modal('hide');
              $('#successAlert').fadeIn();

            },
            error: function(error){
                if (error.status === 422) {
                    var errors = error.responseJSON.errors;

                    $.each(errors, function(key, value){
                        var element = $('#' + key);
                        element.addClass('is-invalid'); 
                        element.parent().append('<span class="text-danger"><strong>' + value + '</strong></span>'); 
                    });
                } else {
                    console.log("Error en la solicitud:", error);
                }
            }
        });
    });

 
});
