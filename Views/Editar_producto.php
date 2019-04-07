<form action="" method="post">
  <h3>Registro de persona</h3>
  <div class="row m-1 pt-1">
      <div class="row m-1 pt-2">
        <div class="col-12 col-sm-12 col-md-4 col-lg-6 col-xl-4">
          <div class="md-form ">
            <input type="number" id="id" name="id" class="form-control " disabled value="<?=$datos['producto']['Clave']?>" required step="1">
            <label for="id">Clave</label>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-6 col-xl-4">
          <div class="md-form ">
            <input type="text" id="txtNombreProducto" name="txtNombreProducto" disabled value="<?=$datos['producto']['Nombre']?>" class="form-control has-content nombres " required>
            <label for="txtNombreProducto">Nombre</label>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
          <div class="input-effect mt-4">
            <select class="effect-17 form-control labelfija " id="cboTipoProducto" name="cboTipoProducto" required>
              <option disabled >Selecione una opción</option>
              <?php foreach ($datos['tipos'] as $key => $value) { ?>

                <option value="<?=$value['Id']?>" <?=($datos['producto']['Tipo']==$value['Id']) ? 'selected' : ''; ?>  ><?=$value['Nombre']?> </option>
              <?php }?>
            </select>
            <label class="labelselect">Tipo de Producto</label>
            <span class="focus-border"></span>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-6 col-xl-4">
          <div class="col-4 d-flex align-items-center">
            <label><input type="checkbox" name="chkMaterialPeligroso" id="chkMaterialPeligroso" <?=($datos['producto']['Material_Peligroso']==1) ? 'checked' : ''; ?> class="option-input checkbox" value="1"> </label>
            <label>Material Peligroso</label>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-6 col-xl-4">
          <div class="md-form ">
            <textarea rows="4" cols="50" id="txtaObservaciones" name="txtaObservaciones" class="form-control " ><?=$datos['producto']['Observaciones']?></textarea>
            <label for="txtaObservaciones">Observaciones</label>
            <span class="focus-border"></span>
          </div>
        </div>
      </div>
    </div>
      <div class=" mt-3 pt-2 row d-flex justify-content-center" style="padding-left: 3%;">
        <div class="row justify-content-center">
          <input type="hidden" name="id_au" id="id_au" value="<?=$datos['producto']['Id']?>">
          <button class="btn btn-primary" id="btnEditar" name="btnEditar" value="2">
            <i class="fas fa-pencil-alt fa-lg fa-pull-right"></i> Modificar
          </button>
        </div>
      </div>
</form>

<a href="/">
  <button class="btn btn-danger" id="" data-toggle="tooltip" title="Regresar"><i class="fas fa-plus"></i> Cancelar </button>
</a>
