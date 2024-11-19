<div id="modalmantenimiento" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="lbltitulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
            </div>
            <!-- Formulario Mantenimiento -->
            <form method="post" id="usuario_form">
                <div class="modal-body">
                    <input type="hidden" name="id_inspeccion" id="id_inspeccion"/>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Nombre Cliente: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="nombre_cliente" type="text" name="nombre_cliente" required/>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Direccion: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="direccion" type="text" name="direccion" required/>
                        </div>
                    </div>


                   
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Sistema: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" style="width:100%" name="sistema_id" id="sistema_id" data-placeholder="Seleccione">
                                <option label="Seleccione"></option>
                                <option value="1">Panel Solar</option>
                                <option value="2">Baterias de Respaldo</option>
                                <option value="2">Paneles Solares y Baterias de Respaldo</option>
                            </select>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" name="action" value="add" class="btn btn-outline-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"><i class="fa fa-check"></i> Guardar</button>
                    <button type="reset" class="btn btn-outline-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" aria-label="Close" aria-hidden="true" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>