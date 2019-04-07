<div class="row d-flex justify-content-center">
  <a href="/persona/nuevapersona">
    <button class="btn btn-success" id="" data-toggle="tooltip" title="Registrar Producto"><i class="fas fa-plus"></i> Registrar Producto </button>
  </a>
  <a href="/">
    <button class="btn btn-info" id="" data-toggle="tooltip" title="Productos Activos"><i class="fas fa-arrow-up"></i> Productos activos </button>
  </a>

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
                <button  class="submit btn btn-success" id="btnActivar" name="btnActivar" value="1" data-toggle="tooltip" title="Activar">
                  <span><i class="fa fa-check fa-lg "aria-hidden="true"></i></span>
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
  </div>
</div>
