<?php
include_once('../../controller/crud-transferenca.php');
$crud = new CrudTransferenca();
$model = new Transferenca();
$crud->update($model);
?>