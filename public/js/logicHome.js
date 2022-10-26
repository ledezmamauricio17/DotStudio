// =================================
// Carga principal
// =================================
// funciones de carga principal de la pagina
$(document).ready(function() {
    let tablaTrainings = $("#TableTraining").DataTable({
        destroy: true,
        info: false,
        responsive: true,
        paging: false,
        scrollY: '250px',
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        ajax: {
            url: '/loadTrainings/',
            method: 'GET'
        },
        columnDefs: [{ "defaultContent": "-", "targets": "_all" }],
        columns: [{
                render: (data, type, row) => {

                    let buttons = `<button type="button" class="btn btn-xs btn-warning" title="Editar Usuario"
                                                onclick="loadAdd(${row['id']})" value="${row['id']}">
                                                <i class="fas fa-link"></i>
                                            </button>
                                            `;
                    return buttons;
                },
            },
            { data: 'name' },
            { data: 'capacity' },
            { data: 'dateIn' },
            { data: 'dateOut' },
            { data: 'date' },
        ]
    });

    $('#buttonReload').on('click', () => {
        tablaTrainings.ajax.reload();
    })

    let tablaAsignments = $("#TableAsignment").DataTable({
        destroy: true,
        scrollY: '250px',
        info: false,
        paging: false,
        responsive: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        ajax: {
            url: '/loadAsignments',
            method: 'GET'
        },
        columnDefs: [{ "defaultContent": "-", "targets": "_all" }],
        columns: [{
                render: (data, type, row) => {

                    let buttons = `
                                            <button type="button" class="btn btn-xs btn-danger" title="Editar Credenciales"
                                                onclick="deleteAsignment(${row['id']})" value="${row['id']}">
                                                <i class="fas fa-trash"></i>
                                            </button>`;
                    return buttons;
                },
            },
            { data: 'training_name' },
            { data: 'training_date' },
        ]
    });

    $('#buttonReloadAsignmet').on('click', () => {
        tablaAsignments.ajax.reload();
    })
});

const loadAdd = (id) => {
    $.get('/createAsignment/', {
        'id': id,
    }, function(res) {
        if (res.result == "done") {
            swal.fire({
                title: 'Asignacion Completa!',
                text: 'Se ha inscrito a una nueva capacitacion',
                icon: 'success',
            }).then((result) => {
                $('#addTrainingMdl').modal('hide');
                $('#buttonReloadAsignmet').trigger('click');
            })
        }
    });
}

const deleteAsignment = (id) => {
    swal.fire({
        title: "¿Está seguro de eliminar este asignacion?",
        text: "Una vez eliminado, tendrá que crearlo de nuevo!",
        icon: "warning",
        dangerMode: true,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#001f3f',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#FF0202',
        reverseButtons: true

    }).then((willDelete) => {
        if (willDelete.isConfirmed) {
            $.get("/deleteAsignment/", { 'id': id }, function(res) {
                if (res.result == "done") {
                    swal.fire({
                        text: "Aignacion eliminada con éxito!",
                        icon: "success",
                    }).then((complete) => {
                        if (complete.isConfirmed) {
                            $('#buttonReloadAsignmet').trigger('click');
                        }
                    });
                } else {
                    swal.fire("Ha ocurrido un error, por favor intente mas tarde!", {
                        icon: "error",
                    }).then((complete) => {
                        if (complete.isConfirmed) {
                            $('#buttonReloadAsignmet').trigger('click');
                        }
                    });
                }

            })
        }
    });
}

// ------Insert de usuario ---------

const validate = () => {
    let response = false;
    dateIn = $("#dateIn").val();
    dateOut = $("#dateOut").val();
    date = $("#date").val();

    hourIn = dateIn.substr(0, 2)
    hourOut = dateOut.substr(0, 2)
    fecha = new Date(date);
    day = fecha.getDay();

    if (dateIn == '' || dateOut == '' || date == '' || $("#capacity").val() == '' || $("#name").val() == '') {
        swal.fire({
            title: 'error!',
            text: 'No deben quedar campos vacios',
            icon: 'error',
        })
        response = false;
    } else if (hourIn < 10 || hourOut > 22) {
        swal.fire({
            title: 'error!',
            text: 'Debe ser un horario de 10 am hasta las 10 pm',
            icon: 'error',
        })
        response = false;
    } else if (day == 7 || day == 5) {
        swal.fire({
            title: 'error!',
            text: 'La fecha debe ser entre lunes y viernes',
            icon: 'error',
        });
        response = false;
    } else {
        response = true;
    }
    return response;
}

const create = () => {
    if (validate()) {

        $.get('/createTraining', {
            'name': $("#name").val(),
            'capacity': $("#capacity").val(),
            'dateIn': $("#dateIn").val(),
            'dateOut': $("#dateOut").val(),
            'date': $("#date").val()
        }, function(res) {
            if (res.result == "done") {
                swal.fire({
                    title: 'Creación Completa!',
                    text: 'Se ha creado una nueva capacitacion',
                    icon: 'success',
                }).then((result) => {
                    $('#addTrainingMdl').modal('hide');
                    $('#buttonReload').trigger('click');
                })
            }
        });
    }
}

const ModalCreateTraining = () => {
        $('#addTrainingMdl').modal('show');
    }
    // ------Update de usuario ---------


function deleteUser(id) {

    swal.fire({
        title: "¿Está seguro de eliminar este usuario?",
        text: "Una vez eliminado, tendrá que crearlo de nuevo!",
        icon: "warning",
        dangerMode: true,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#001f3f',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#FF0202',
        reverseButtons: true

    }).then((willDelete) => {
        if (willDelete.isConfirmed) {
            $.get("/delete/" + id, function(res) {
                if (res.response == "done") {
                    swal.fire({
                        text: "Usuario eliminado con éxito!",
                        icon: "success",
                    }).then((complete) => {
                        if (complete.isConfirmed) {
                            $('#buttonReload').trigger('click');
                        }
                    });
                } else {
                    swal.fire("Ha ocurrido un error, por favor intente mas tarde!", {
                        icon: "error",
                    }).then((complete) => {
                        if (complete.isConfirmed) {
                            $('#buttonReload').trigger('click');
                        }
                    });
                }

            })
        }
    });
}