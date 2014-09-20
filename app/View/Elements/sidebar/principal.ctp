<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->        
    <ul class="page-sidebar-menu">
        <li>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler hidden-phone"></div>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
        <li>
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <!--               <form class="sidebar-search" action="extra_search.html" method="POST">
                              <div class="form-container">
                                 <div class="input-box">
                                    <a href="javascript:;" class="remove"></a>
                                    <input type="text" placeholder="Searchcrt..."/>
                                    <input type="button" class="submit" value=" "/>
                                 </div>
                              </div>
                           </form>-->
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
        <li class="start ">
            <a href="<?php echo $this->Html->url(array('controller' => 'Movimientos', 'action' => 'controlpanel')); ?>">
                <?php echo $this->Html->image('iconos/panel.png') ?>
                <span class="title">PANEL DE CONTROL</span>
            </a>
        </li>
        <li class="">
            <a href="javascript:;">
                <?php echo $this->Html->image('iconos/compra.png') ?>
                <span class="title">Compras</span>
                <span class="selected"></span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'gastos', 'action' => 'index')); ?>">
                      <?php echo $this->Html->image('iconos/listado.png') ?>
                      <span class="title">Listado</span>
                    </a>
                </li>
                <li >
                    <a data-toggle="modal" href="<?php echo $this->Html->url(array('controller' => 'gastos', 'action' => 'nuevo')); ?>">
                        <?php echo $this->Html->image('iconos/nuevo.png') ?>
                        <span class="badge badge-roundless badge-success">*</span>Nuevo
                    </a>
                </li>                
            </ul>
        </li>

        <li class="">
            <a href="javascript:;">
                <?php echo $this->Html->image('iconos/productos.png') ?>
                <span class="title">Productos</span>
                <span class="selected"></span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="<?php echo $this->Html->url(array('controller' => 'Productos', 'action' => 'index')); ?>">
                     <?php echo $this->Html->image('iconos/listado.png') ?>
                      <span class="title">Listado</span>
                    </a>
                </li>
                <li >
                    <a data-toggle="modal" href="#modaluno" onclick="$('#contenidomodaluno').load('<?php echo $this->Html->url(array('controller' => 'Productos', 'action' => 'nuevoproducto')); ?>');">
                        <?php echo $this->Html->image('iconos/nuevo.png') ?>
                        <span class="badge badge-roundless badge-success">*</span>Nuevo Producto
                    </a>
                </li>                
            </ul>
        </li>

        <li class="">
            <a href="javascript:;">
                <?php echo $this->Html->image('iconos/movimientos.png') ?> 
                <span class="title">Movimientos</span>
                <span class="selected"></span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Movimientos', 'action' => 'index')); ?>">
                     <?php echo $this->Html->image('iconos/listado.png') ?>
                      <span class="title">Listado</span>
                    </a>
                </li>                              
            </ul>
        </li>

        <li class="">
            <a href="javascript:;">
                <?php echo $this->Html->image('iconos/almacen.png') ?>
                <span class="title">Almacenes</span>
                <span class="selected"></span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="<?php echo $this->Html->url(array('controller' => 'Almacenes', 'action' => 'index')); ?>">
                     <?php echo $this->Html->image('iconos/listado.png') ?>
                      <span class="title">Listado</span>
                    </a>
                </li>
                <li >
                    <a data-toggle="modal" href="#modaluno" onclick="$('#contenidomodaluno').load('<?php echo $this->Html->url(array('controller' => 'Almacenes', 'action' => 'nuevoalmacen')); ?>');">
                        <?php echo $this->Html->image('iconos/nuevo.png') ?>
                        <span class="badge badge-roundless badge-success">*</span> Nuevo Almacen
                    </a>
                </li>                
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <?php echo $this->Html->image('iconos/clientes.png') ?>
                <span class="title">Clientes</span>
                <span class="selected"></span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="<?php echo $this->Html->url(array('controller' => 'Clientes', 'action' => 'index')); ?>">
                     <?php echo $this->Html->image('iconos/listado.png') ?>
                      <span class="title">Listado</span>
                    </a>
                </li>
                <li>
                    <a data-toggle="modal" href="#modaluno" onclick="$('#contenidomodaluno').load('<?php echo $this->Html->url(array('controller' => 'Clientes', 'action' => 'nuevocliente')); ?>');">
                        <?php echo $this->Html->image('iconos/nuevo.png') ?>
                        <span class="badge badge-roundless badge-success">*</span>Nuevo Cliente
                    </a>
                </li>                
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <?php echo $this->Html->image('iconos/pedido.png') ?>
                <span class="title">Pedidos</span>
                <span class="selected"></span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Movimientos', 'action' => 'listapedidos')); ?>">
                     <?php echo $this->Html->image('iconos/listado.png') ?>
                      <span class="title">Listado de Pedidos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Movimientos', 'action' => 'pedido')); ?>">
                        <?php echo $this->Html->image('iconos/nuevo.png') ?>
                        <span class="badge badge-roundless badge-success">*</span>Nuevo Pedido
                    </a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Movimientos', 'action' => 'listaventas')); ?>">
                     <?php echo $this->Html->image('iconos/listado.png') ?>
                      <span class="title">Listado de Ventas</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Movimientos', 'action' => 'venta')); ?>" >
                    <?php echo $this->Html->image('iconos/nuevo.png') ?>
                        <span class="badge badge-roundless badge-success">*</span>Nueva Venta
                    </a>
                </li>                
            </ul>
        </li>
        <li class="">
            <a href="<?php echo $this->Html->url(array('controller' => 'Pagos', 'action' => 'index')); ?>">
                <?php echo $this->Html->image('iconos/dolar.png') ?>
                <span class="title">Gastos</span>
            </a>
        </li>
        <li class="">
            <a href="javascript:;">
                <?php echo $this->Html->image('iconos/user.png') ?>
                <span class="title">Usuarios</span>
                <span class="selected"></span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'index')); ?>">
                     <?php echo $this->Html->image('iconos/listado.png') ?>
                      <span class="title">Listado de Usuarios</span>
                    </a>
                </li>
                <li >
                    <a data-toggle="modal" href="#modaluno" onclick="$('#contenidomodaluno').load('<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'nuevousuario')); ?>');">
                        <?php echo $this->Html->image('iconos/nuevo.png') ?>
                        <span class="badge badge-roundless badge-success">*</span>Nuevo Usuario
                    </a>
                </li>                
            </ul>
        </li>
        
        <li class="">
            <a href="<?php echo $this->Html->url(array('controller' => 'Reportes', 'action' => 'index')); ?>">
                <?php echo $this->Html->image('iconos/reporte22.png') ?>
                <span class="title">Reportes</span>
            </a>
        </li>

        <!--
        <li class="">
            <a href="javascript:;">
                <i class="icon-bookmark-empty"></i> 
                <span class="title">UI Features</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="ui_general.html">
                        General</a>
                </li>
                <li >
                    <a href="ui_buttons.html">
                        Buttons</a>
                </li>
                <li >
                    <a href="ui_typography.html">
                        Typography</a>
                </li>
                <li >
                    <a href="ui_modals.html">
                        Modals</a>
                </li>
                <li>
                    <a href="ui_extended_modals.html">
                        Extended Modals</a>
                </li>
                <li >
                    <a href="ui_tabs_accordions_navs.html">
                        Tabs, Accordions & Navs</a>
                </li>
                <li >
                    <a href="ui_tiles.html">
                        Tiles</a>
                </li>
                <li >
                    <a href="ui_toastr.html">
                        <span class="badge badge-roundless badge-warning">new</span>Toastr Notifications</a>
                </li>
                <li >
                    <a href="ui_tree.html">
                        Tree View</a>
                </li>
                <li >
                    <a href="ui_nestable.html">
                        Nestable List</a>
                </li>
                <li >
                    <a href="ui_ion_sliders.html">
                        <span class="badge badge-roundless badge-important">new</span>Ion Range Sliders</a>
                </li>
                <li >
                    <a href="ui_noui_sliders.html">
                        <span class="badge badge-roundless badge-success">new</span>NoUI Range Sliders</a>
                </li>
                <li >
                    <a href="ui_jqueryui_sliders.html">
                        jQuery UI Sliders</a>
                </li>
                <li >
                    <a href="ui_knob.html">
                        Knob Circle Dials</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="icon-table"></i> 
                <span class="title">Form Stuff</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="form_controls.html">
                        Form Controls</a>
                </li>
                <li >
                    <a href="form_layouts.html">
                        Form Layouts</a>
                </li>
                <li >
                    <a href="form_component.html">
                        Form Components</a>
                </li>
                <li >
                    <a href="form_editable.html">
                        <span class="badge badge-roundless badge-warning">new</span>Form X-editable</a>
                </li>
                <li >
                    <a href="form_wizard.html">
                        Form Wizard</a>
                </li>
                <li >
                    <a href="form_validation.html">
                        Form Validation</a>
                </li>
                <li >
                    <a href="form_image_crop.html">
                        <span class="badge badge-roundless badge-important">new</span>Image Cropping</a>
                </li>
                <li >
                    <a href="form_fileupload.html">
                        Multiple File Upload</a>
                </li>
                <li >
                    <a href="form_dropzone.html">
                        Dropzone File Upload</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="icon-sitemap"></i> 
                <span class="title">Pages</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="page_portfolio.html">
                        <i class="icon-briefcase"></i>
                        <span class="badge badge-warning badge-roundless">new</span>Portfolio</a>
                </li>
                <li >
                    <a href="page_timeline.html">
                        <i class="icon-time"></i>
                        <span class="badge badge-info">4</span>Timeline</a>
                </li>
                <li >
                    <a href="page_coming_soon.html">
                        <i class="icon-cogs"></i>
                        Coming Soon</a>
                </li>
                <li >
                    <a href="page_blog.html">
                        <i class="icon-comments"></i>
                        Blog</a>
                </li>
                <li >
                    <a href="page_blog_item.html">
                        <i class="icon-font"></i>
                        Blog Post</a>
                </li>
                <li >
                    <a href="page_news.html">
                        <i class="icon-coffee"></i>
                        <span class="badge badge-success">9</span>News</a>
                </li>
                <li >
                    <a href="page_news_item.html">
                        <i class="icon-bell"></i>
                        News View</a>
                </li>
                <li >
                    <a href="page_about.html">
                        <i class="icon-group"></i>
                        About Us</a>
                </li>
                <li >
                    <a href="page_contact.html">
                        <i class="icon-envelope-alt"></i>
                        Contact Us</a>
                </li>
                <li >
                    <a href="page_calendar.html">
                        <i class="icon-calendar"></i>
                        <span class="badge badge-important">14</span>Calendar</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="icon-gift"></i> 
                <span class="title">Extra</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="extra_profile.html">
                        User Profile</a>
                </li>
                <li >
                    <a href="extra_lock.html">
                        Lock Screen</a>
                </li>
                <li >
                    <a href="extra_faq.html">
                        FAQ</a>
                </li>
                <li >
                    <a href="inbox.html">
                        <span class="badge badge-important">4</span>Inbox</a>
                </li>
                <li >
                    <a href="extra_search.html">
                        Search Results</a>
                </li>
                <li >
                    <a href="extra_invoice.html">
                        Invoice</a>
                </li>
                <li >
                    <a href="extra_pricing_table.html">
                        Pricing Tables</a>
                </li>
                <li >
                    <a href="extra_404_option1.html">
                        404 Page Option 1</a>
                </li>
                <li >
                    <a href="extra_404_option2.html">
                        404 Page Option 2</a>
                </li>
                <li >
                    <a href="extra_404_option3.html">
                        404 Page Option 3</a>
                </li>
                <li >
                    <a href="extra_500_option1.html">
                        500 Page Option 1</a>
                </li>
                <li >
                    <a href="extra_500_option2.html">
                        500 Page Option 2</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="active" href="javascript:;">
                <i class="icon-leaf"></i> 
                <span class="title">3 Level Menu</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="javascript:;">
                        Item 1
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="#">Sample Link 1</a></li>
                        <li><a href="#">Sample Link 2</a></li>
                        <li><a href="#">Sample Link 3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        Item 1
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="#">Sample Link 1</a></li>
                        <li><a href="#">Sample Link 1</a></li>
                        <li><a href="#">Sample Link 1</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        Item 3
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <i class="icon-folder-open"></i> 
                <span class="title">4 Level Menu</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="javascript:;">
                        <i class="icon-cogs"></i> 
                        Item 1
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript:;">
                                <i class="icon-user"></i>
                                Sample Link 1
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="#"><i class="icon-remove"></i> Sample Link 1</a></li>
                                <li><a href="#"><i class="icon-pencil"></i> Sample Link 1</a></li>
                                <li><a href="#"><i class="icon-edit"></i> Sample Link 1</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-user"></i>  Sample Link 1</a></li>
                        <li><a href="#"><i class="icon-external-link"></i>  Sample Link 2</a></li>
                        <li><a href="#"><i class="icon-bell"></i>  Sample Link 3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="icon-globe"></i> 
                        Item 2
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="#"><i class="icon-user"></i>  Sample Link 1</a></li>
                        <li><a href="#"><i class="icon-external-link"></i>  Sample Link 1</a></li>
                        <li><a href="#"><i class="icon-bell"></i>  Sample Link 1</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-folder-open"></i>
                        Item 3
                    </a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="icon-user"></i> 
                <span class="title">Login Options</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="login.html">
                        Login Form 1</a>
                </li>
                <li >
                    <a href="login_soft.html">
                        Login Form 2</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="icon-th"></i> 
                <span class="title">Data Tables</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="table_basic.html">
                        Basic Tables</a>
                </li>
                <li >
                    <a href="table_responsive.html">
                        Responsive Tables</a>
                </li>
                <li >
                    <a href="table_managed.html">
                        Managed Tables</a>
                </li>
                <li >
                    <a href="table_editable.html">
                        Editable Tables</a>
                </li>
                <li >
                    <a href="table_advanced.html">
                        Advanced Tables</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="icon-file-text"></i> 
                <span class="title">Portlets</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="portlet_general.html">
                        General Portlets</a>
                </li>
                <li >
                    <a href="portlet_draggable.html">
                        Draggable Portlets</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="icon-map-marker"></i> 
                <span class="title">Maps</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="maps_google.html">
                        Google Maps</a>
                </li>
                <li >
                    <a href="maps_vector.html">
                        Vector Maps</a>
                </li>
            </ul>
        </li>
        <li class="last ">
            <a href="charts.html">
                <i class="icon-bar-chart"></i> 
                <span class="title">Visual Charts</span>
            </a>
        </li>-->
    </ul>
    <!-- END SIDEBAR MENU -->
</div>