@extends('layouts.plantilla')
@section('title', 'Inicio')
@section('index')

    <!-- contenido -->
    <div class="row d-flex justify-content-center mb-3">
        <div class="col-12 w-25">
            <img src="img/logo.jpg" class="img-fluid w-100" alt="Sample image">
        </div>
        <div class="col-12 row text-center">
            <h3 class="col-6">{{ Auth::user()->name }}</h3>
            <form class="col-6" action="{{ route( 'logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary float-right">
                    <i class="fas fa-sign-out-alt"></i>Logout
                </button>
            </form>
        </div>

        <div class="col-12 mb-2">
            <div class="card card-default">
                @if (Auth::user()->type == 2)
                    <div class="card-header bg-navy">
                        <h3 class="card-title">
                            <div class="row">
                                <div class="col-sm-12" id="tour_users_add">
                                    <button class="btn btn-primary" title="Agregar Usuario" onclick="ModalCreateTraining()">
                                        <i class="fas fa-plus"></i>
                                        Agregar Capacitacion
                                    </button>
                                </div>
                            </div>
                        </h3>
                    </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 table-responsive">
                            <h4 class="text-center">Capacitaciones</h4>
                            <button id="buttonReload" hidden="hidden"></button>
                            <table class="table table-sm text-sm-center w-100 table-striped" id="TableTraining">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Capacitacion</th>
                                        <th>Capacidad</th>
                                        <th>Hora de inicio</th>
                                        <th>Hora de salida</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-6 table-responsive">
                            <h4 class="text-center">Asignaciones</h4>
                            <button id="buttonReloadAsignmet" hidden="hidden"></button>
                            <table class="table table-sm text-sm-center w-100 table-striped" id="TableAsignment">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Capacitacion</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal created -->
    <div class="modal fade" id="addTrainingMdl" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formCreateTraining">
                    @csrf
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title nameModal" id="staticBackdropLabel">Agregar Capacitaciones</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-light">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="form-modal-body">
                        <div class="row">
                            <input type="hidden" id="add-option">
                            <div class="input-group col-12 col-sm-6 mb-3">
                                <input type="text" class="form-control" placeholder="Nombre" name="name"
                                    id="name" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group col-12 col-sm-6 mb-3">
                                <input type="text" class="form-control" placeholder="Capacidad" name="capacity"
                                    id="capacity" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-users">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group col-12 col-sm-6 mb-3">
                                <input type="time" class="form-control" placeholder="hora ingreso" name="dateIn"
                                    id="dateIn" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-clock">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group col-12 col-sm-6 mb-3">
                                <input type="time" class="form-control" placeholder="hora salida" name="dateOut"
                                    id="dateOut" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-clock">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group col-12 col-sm-6 mb-3">
                                <input type="date" class="form-control" placeholder="Fecha" name="date" id="date"
                                    required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-calendar-week">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-danger float-left" data-dismiss="modal">
                                            <i class="fas fa-times"></i>
                                            Cerrar
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-success float-right" onclick="create()">
                                            <i class="fas fa-save"></i> Guardar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="js/logicHome.js"></script>

@endsection
