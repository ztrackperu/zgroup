<!-- Contenido Panel - Glosa y Observacion -->
<div role="tabpanel" class="tab-pane" id="settings">
    <div class="form-group">
        <label class="control-label col-xs-2">Descripcion</label>
        <div class="col-xs-2">
            <select name="descglosa" id="descglosa" class="form-control" onChange="recargar()">
                <?php foreach($this->maestro->ListarGlosa() as $a):	 ?>
                    <option value="<?php echo utf8_encode(strip_tags($a->descripcion)); ?>"> <?php echo $a->titulo; ?> </option>
                <?php  endforeach;	 ?>
            </select>
        </div>
        <div class="col-xs-10">
            <textarea name="c_desgral" cols="100" rows="10" id="c_desgral">
                <?php
                echo (strip_tags(nl2br(utf8_encode($c_desgral))));
                ?>
            </textarea>
        </div>
    </div>
</div>