<div class="col-12" id="msj">
</div>

<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div id="msj" class="col-12">
        </div>
        <section class="container mt-3 sombra ">
            <form action="" method="post" id="datos_usuario">
                <input type="hidden" class="fecha_nac" id="fecha_nac" name="fecha_nac"/>
                <h3>Datos de Persona</h3>
                <div class="row m-1 pt-1">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 validar">
                        <div class="md-form ">
                            <input type="text" id="rfc" name="rfc" class="form-control has-content" required
                                   max-length='13' minlength="13">
                            <label for="curp">RFC</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 validar">
                        <div class="md-form ">
                            <input type="text" id="curp" name="curp" class="form-control has-content" required
                                   max-length='18'>
                            <label for="curp">CURP</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-6 col-xl-4 validar">
                        <div class="md-form ">
                            <input type="text" id="fnacimiento" name="fnacimiento" class="form-control has-content"
                                   disabled>
                            <label for="fnacimiento">Fecha de nacimiento</label>
                        </div>
                    </div>
                </div>
                <div class="row m-1 pt-1">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 validar">
                        <div class="input-effect mt-4">
                            <select class="effect-17 form-control labelfija " id="sexo" name="sexo" required>
                                <option disabled selected>Selecione una opción</option>
                                <option value="1">Femenino</option>
                                <option value="2">Masculino</option>
                            </select>
                            <label class="labelselect">Sexo</label>
                            <span class="focus-border"></span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 validar">
                        <div class="input-effect mt-4">
                            <select class="effect-17 form-control labelfija " id="civil" name="civil" required>
                                <option disabled selected>Selecione una opción</option>
                                <option value="1">Soltero / Soltera</option>
                                <option value="2">Casado / Casada</option>
                                <option value="3">Viudo / Viuda</option>
                                <option value="4">Divorciado / Divorciada</option>
                                <option value="5">Concubino / Concubina</option>
                                <option value="6">Comprometido / Comprometida</option>
                            </select>
                            <label class="labelselect">Estado civil</label>
                            <span class="focus-border"></span>
                        </div>
                    </div>
                </div>
                <div class="row m-1 pt-2">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 validar">
                        <div class="md-form ">
                            <input type="text" id="nombres" name="nombre" class="form-control ecurp has-content nombre "
                                   required minlength="1" maxlength="20">
                            <label for="nombres">Primer Nombre</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 validar">
                        <div class="md-form ">
                            <input type="text" id="nombre2" name="nombre2"
                                   class="form-control ecurp has-content nombre2 " maxlength="20">
                            <label for="nombres2">Segundo Nombre</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 validar">
                        <div class="md-form ">
                            <input type="text" id="ape_pat" name="ape_pat"
                                   class="form-control ecurp has-content ape_pat nombre" required minlength="1"
                                   maxlength="20">
                            <label for="ape_pat">Primer Apellido</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 validar">
                        <div class="md-form ">
                            <input type="text" id="ape_mat" name="ape_mat"
                                   class="form-control ecurp has-content ape_mat " maxlength="20">
                            <label for="ape_mat">Segundo Apellido</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 validar">
                        <div class="md-form ">
                            <input type="email" id="correo" name="correo"
                                   class="form-control ecurp has-content ape_mat " maxlength="100" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                            <label for="ape_mat">Correo electronico</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 validar">
                        <div class="md-form ">
                            <input type="number" id="tel" name="tel"
                                   class="form-control ecurp has-content tel " pattern="[0-9]{10}" minlength="10" maxlength="10 ">
                            <label for="ape_mat">Teléfono Fijo</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 validar">
                        <div class="md-form ">
                            <input type="number" id="cel" name="cel"
                                   class="form-control ecurp has-content cel " pattern="[0-9]{10}" minlength="10" maxlength="10" required>
                            <label for="ape_mat">Teléfono Celular</label>
                        </div>
                    </div>
                </div>
                <div class=" mt-3 pt-2 row d-flex justify-content-center" style="padding-left: 3%;">
                    <div class="row justify-content-center">
                        <button class="btn btn-primary" id="guardar">
                            <i class="fas fa-pencil-alt fa-lg fa-pull-right"></i> Guardar
                        </button>
                    </div>
                </div>
            </form>
            <form action="http://<?= $_SERVER['HTTP_HOST'] ?>" method="post" id="datos_usuario">
                <div class=" mt-3 pt-2 row d-flex justify-content-center" style="padding-left: 3%;">
                    <div class="row justify-content-center">
                        <button class="btn btn-danger" id="cancelar">
                            <i class="fas fa-times fa-lg fa-pull-right"></i> Cancelar
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
