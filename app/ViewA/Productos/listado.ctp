<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Productos 
        </h3>
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-edit"></i>Listado de Productos</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <button id="sample_editable_1_new" class="btn green">
                            Nuevo Producto <i class="icon-plus"></i>
                        </button>
                    </div>
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                        </ul>
                    </div>
                </div>
                <?php echo $this->Form->create('Producto', array('id' => 'formu')); ?>

                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>U x Caja</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($productos)): ?>
                            <?php foreach ($productos as $p): ?>
                                <tr>
                                    <td><?php echo $p['Producto']['nombre'] ?></td>
                                    <td><?php echo $p['Producto']['descripcion'] ?></td>
                                    <td><?php echo $p['Producto']['uporcaja'] ?></td>
                                    <td><a class="edit" href="<?php echo $p['Producto']['id'] ?>">Editar</a></td>
                                    <td><a class="delete" href="<?php echo $p['Producto']['id'] ?>">Eliminar</a></td>
                                </tr>
                            <?php endforeach; ?> 
                        <?php endif; ?>  
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>               

<script>
    jQuery(document).ready(function() {
        TableEditable.init();
    });
</script>
<script>
    var TableEditable = function() {
        var sw = true;
        return {
            //main function to initiate the module
            init: function() {
                function restoreRow(oTable, nRow) {
                    var aData = oTable.fnGetData(nRow);
                    var jqTds = $('>td', nRow);

                    for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                        oTable.fnUpdate(aData[i], nRow, i, false);
                    }

                    oTable.fnDraw();
                }

                function editRow(oTable, nRow, producto) {
                    //alert(producto);
                    if (producto == null)
                    {
                        producto = 'nada';
                    }
                    var aData = oTable.fnGetData(nRow);
                    var jqTds = $('>td', nRow);
                    jqTds[0].innerHTML = ' <input name="data[Producto][nombre]" placeholder="Nombre del producto" type="text" class="form-control" value="' + aData[0] + '">';
                    jqTds[1].innerHTML = '<input name="data[Producto][descripcion]" placeholder="Descripcion del producto" type="text" class="form-control" value="' + aData[1] + '">';
                    jqTds[2].innerHTML = '<input name="data[Producto][cantidad]" placeholder="Cantidad del producto" type="text" class="form-control input-small" value="' + aData[2] + '">';
                    //jqTds[3].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[3] + '">';
                    jqTds[3].innerHTML = '<a class="edit" href="">Guardar</a>';
                    jqTds[4].innerHTML = '<a class="cancel" href="">Cancelar</a> <input name="data[Producto][idd]" type="hidden" class="form-control" value="' + producto + '"> ';
                }

                function saveRow(oTable, nRow, idProducto) {
                    var jqInputs = $('input', nRow);
                    oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                    oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                    oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                    // oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                    oTable.fnUpdate('<a class="edit" href="' + idProducto + '">Editar</a>', nRow, 3, false);
                    oTable.fnUpdate('<a class="delete" href="' + idProducto + '">Eliminar</a>', nRow, 4, false);
                    oTable.fnDraw();
                }

                function cancelEditRow(oTable, nRow) {
                    var jqInputs = $('input', nRow);
                    oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                    oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                    oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                    //oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                    oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 3, false);
                    oTable.fnDraw();
                }

                var oTable = $('#sample_editable_1').dataTable({
                    "aLengthMenu": [
                        [5, 15, 20, -1],
                        [5, 15, 20, "All"] // change per page values here
                    ],
                    // set the initial value
                    "iDisplayLength": 4,
                    "sPaginationType": "bootstrap",
                    "oLanguage": {
                        "sLengthMenu": "_MENU_ records",
                        "oPaginate": {
                            "sPrevious": "Prev",
                            "sNext": "Next"
                        }
                    },
                    "aoColumnDefs": [{
                            'bSortable': false,
                            'aTargets': [0]
                        }
                    ]
                });

                jQuery('#sample_editable_1_wrapper .dataTables_filter input').addClass("form-control input-medium"); // modify table search input
                jQuery('#sample_editable_1_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
                jQuery('#sample_editable_1_wrapper .dataTables_length select').select2({
                    showSearchInput: false //hide search box with special css class
                }); // initialize select2 dropdown

                var nEditing = null;

                $('#sample_editable_1_new').click(function(e) {
                    if (sw)
                    {
                        e.preventDefault();
                        var aiNew = oTable.fnAddData(['', '', '',
                            '<a class="edit" href="">Editar</a>', '<a class="cancel" data-mode="new" href="">Cancelar</a>'
                        ]);
                        var nRow = oTable.fnGetNodes(aiNew[0]);
                        editRow(oTable, nRow);
                        nEditing = nRow;
                        sw = false;
                    }

                });

                $('#sample_editable_1 a.delete').live('click', function(e) {
                    e.preventDefault();
                    var idProducto = $(this).attr("href");

                    if (confirm("Desea eliminar realmente?") == false) {
                        return;
                    }
                    var src = $('#formu').serialize();
                    //alert(src);
                    $.ajax({
                        type: "POST",
                        url: '<?php echo $this->Html->url(array('action' => 'elimina')); ?>' + '/' + idProducto,
                        data: src,
                        //cache: false,
                        success: function(dato)
                        {

                            //alert($.parseJSON(dato).primero+" "+$.parseJSON(dato).segundo);
                        }
                    });

                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                    // alert("Deleted! Do not forget to do some ajax to sync with backend :)");
                });

                $('#sample_editable_1 a.cancel').live('click', function(e) {
                    e.preventDefault();
                    sw = true;
                    if ($(this).attr("data-mode") == "new") {
                        var nRow = $(this).parents('tr')[0];
                        oTable.fnDeleteRow(nRow);
                    } else {
                        restoreRow(oTable, nEditing);
                        nEditing = null;
                    }
                });

                $('#sample_editable_1 a.edit').live('click', function(e) {
                    e.preventDefault();
                    var idProducto = $(this).attr("href");
                    /* Get the row as a parent of the link that was clicked on */
                    var nRow = $(this).parents('tr')[0];

                    if (nEditing !== null && nEditing != nRow) {
                        /* Currently editing - but not this row - restore the old before continuing to edit mode */
                        restoreRow(oTable, nEditing);

                        editRow(oTable, nRow);
                        nEditing = nRow;
                    } else if (nEditing == nRow && this.innerHTML == "Guardar") {
                        /* Editing this row and want to save it */


                        var src = $('#formu').serialize();
                        //alert(src);
                        $.ajax({
                            type: "POST",
                            url: '<?php echo $this->Html->url(array('action' => 'guarda')); ?>',
                            data: src,
                            //cache: false,
                            success: function(dato)
                            {
                                idProducto = $.parseJSON(dato).productoid;
                                //alert($.parseJSON(dato).primero+" "+$.parseJSON(dato).segundo);
                                //alert(idProducto);
                                saveRow(oTable, nEditing, idProducto);
                                nEditing = null;
                                sw = true;
                            }
                        });

                    } else {
                        /* No edit in progress - let's start one */
                        editRow(oTable, nRow, idProducto);
                        nEditing = nRow;
                    }
                });
            }

        };

    }();
</script>