<div class="row d-flex justify-content-center">
  <a href="/persona/nuevapersona">
    <button class="btn btn-success" id="" data-toggle="tooltip" title="Registrar Persona"><i class="fas fa-plus"></i> Registrar Persona </button>
  </a>

  <a href="/persona/inactivos">
    <button class="btn btn-danger" id="" data-toggle="tooltip" title="Personas Inactivos"><i class="fas fa-arrow-down"></i> Personas inactivos </button>
  </a>

<?php if($datos!=0):?>
  <div class="col-12 col-sm-12 d-flex justify-content-center mt-3 pt-2 sombra">
      <table class=" table-hover table-condensed table-striped" id="tabladatos" align="left">
        <thead>
          <?php foreach ($datos[0] as $key => $value): ?>
            <td align="center"><?=$key;?></td>
          <?php endforeach; ?>
        </thead>
        <?php foreach ($datos as $key => $value): ?>
          <tr>
            <?php foreach ($value as $key_int => $value_int): ?>
                <td align="center"><?=$value_int;?></td>
            <?php endforeach; ?>
            <td>
              <form action="/persona/modificarpersona" method="post">
                <input type="hidden" name="id" id="id" value="<?=$value['Id_Persona']?>">
                <input type="hidden" name="action" id="action" value="1">
                <button  class="submit btn btn-primary" id="editar" data-toggle="tooltip" title="Editar">
                  <span><i class="fa fa-pencil-alt fa-lg "aria-hidden="true"></i></span>
                </button>
              </form>
            </td>
            <td>
              <form action="" method="post">
                <input type="hidden" name="id" id="id" value="<?=$value['Id_Persona']?>">
                <button  class="submit btn btn-danger" id="btnEliminar" name="btnEliminar" value="1" data-toggle="tooltip" title="Eliminar">
                  <span><i class="fa fa-times fa-lg "aria-hidden="true"></i></span>
                </button>
              </form>
            </td>
            <td>
              <form action="" method="post">
                <input type="hidden" name="id" id="id" value="<?=$value['Id_Persona']?>">
                <button  class="submit btn btn-warning" id="btnInactivar" name="btnInactivar" value="1" data-toggle="tooltip" title="Inactivar">
                  <span><i class="fa fa-trash-alt fa-lg "aria-hidden="true"></i></span>
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
  </div>
<?php endif ?>
</div>
