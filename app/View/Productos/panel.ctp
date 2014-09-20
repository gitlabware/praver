<div class="page-content">      
    <!-- BEGIN PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                Panel <small>de Administracion</small>
            </h3>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Inicio</a> 
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="#">Controlpanel</a></li>
                <li class="pull-right">
                    <div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
                        <i class="icon-calendar"></i>
                        <span></span>
                        <i class="icon-angle-down"></i>
                    </div>
                </li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="icon-bar-chart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        1349
                    </div>
                    <div class="desc">                           
                        Pedidos
                    </div>
                </div>
                <a class="more" href="#">
                    Ver mas <i class="m-icon-swapright m-icon-white"></i>
                </a>                 
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="icon-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">549</div>
                    <div class="desc">Ventas</div>
                </div>
                <a class="more" href="#">
                    Ver mas <i class="m-icon-swapright m-icon-white"></i>
                </a>                 
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="icon-globe"></i>
                </div>
                <div class="details">
                    <div class="number">+89%</div>
                    <div class="desc">Solicitados</div>
                </div>
                <a class="more" href="#">
                    Ver mas <i class="m-icon-swapright m-icon-white"></i>
                </a>                 
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat yellow">
                <div class="visual">
                    <i class="icon-bar-chart"></i>
                </div>
                <div class="details">
                    <div class="number">12,5M$</div>
                    <div class="desc">Vendidos</div>
                </div>
                <a class="more" href="#">
                    Ver mas <i class="m-icon-swapright m-icon-white"></i>
                </a>                 
            </div>
        </div>
    </div>
    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <!-- BEGIN PORTLET-->
            <div class="portlet solid bordered light-grey">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-bar-chart"></i>Ventas por mes</div>
                    <div class="tools">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn default btn-sm active">
                                <input type="radio" name="options" class="toggle" id="option1">2013
                            </label>
<!--                            <label class="btn default btn-sm">
                                <input type="radio" name="options" class="toggle" id="option2">Feedbacks
                            </label>-->
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="site_statistics_loading">
                        <img src="assets/img/loading.gif" alt="loading"/>
                    </div>
                    <div id="site_statistics_content" class="display-none">
                        <div id="site_statistics" class="chart"></div>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
        <div class="col-md-6 col-sm-6">
            <!-- BEGIN PORTLET-->
            <div class="portlet solid light-grey bordered">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-bullhorn"></i>Pedidos</div>
                    <div class="tools">
                        <div class="btn-group pull-right" data-toggle="buttons">
                            <a href="" class="btn blue btn-sm active">2013</a>
                            <!--<a href="" class="btn blue btn-sm">Orders</a>-->
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="site_activities_loading">
                        <img src="assets/img/loading.gif" alt="loading"/>
                    </div>
                    <div id="site_activities_content" class="display-none">
                        <div id="site_activities" style="height: 100px;"></div>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
            <!-- BEGIN PORTLET-->
            <div class="portlet solid bordered light-grey">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-signal"></i>Pedidos</div>
                    <div class="tools">
                        <div class="btn-group pull-right" data-toggle="buttons">
                            <a href="" class="btn red btn-sm active">2013</a>
                            <!--<a href="" class="btn red btn-sm">Web</a>-->
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="load_statistics_loading">
                        <img src="assets/img/loading.gif" alt="loading" />
                    </div>
                    <div id="load_statistics_content" class="display-none">
                        <div id="load_statistics" style="height: 108px;"></div>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row ">
        <div class="col-md-6 col-sm-6">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-bell"></i>Productos</div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn btn-sm default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                Filter By
                                <i class="icon-angle-down"></i>
                            </a>
                            <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                <label><input type="checkbox" /> Finance</label>
                                <label><input type="checkbox" checked="" /> Membership</label>
                                <label><input type="checkbox" /> Customer Support</label>
                                <label><input type="checkbox" checked="" /> HR</label>
                                <label><input type="checkbox" /> System</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                        <ul class="feeds">
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">                        
                                                <i class="icon-check"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                You have 4 pending tasks.
                                                <span class="label label-sm label-warning ">
                                                    Take action 
                                                    <i class="icon-share-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        Just now
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">                        
                                                    <i class="icon-bar-chart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                    Finance Report for year 2013 has been released.   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                            20 mins
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-danger">                      
                                                <i class="icon-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                You have 5 pending membership that requires a quick review.                       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        24 mins
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">                        
                                                <i class="icon-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                New order received with <span class="label label-sm label-success">Reference Number: DR23923</span>             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        30 mins
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">                      
                                                <i class="icon-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                You have 5 pending membership that requires a quick review.                       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        24 mins
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-default">                        
                                                <i class="icon-bell-alt"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                Web server hardware needs to be upgraded. 
                                                <span class="label label-sm label-default ">Overdue</span>             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        2 hours
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-default">                        
                                                    <i class="icon-briefcase"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                    IPO Report for year 2013 has been released.   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                            20 mins
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">                        
                                                <i class="icon-check"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                You have 4 pending tasks.
                                                <span class="label label-sm label-warning ">
                                                    Take action 
                                                    <i class="icon-share-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        Just now
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-danger">                        
                                                    <i class="icon-bar-chart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                    Finance Report for year 2013 has been released.   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                            20 mins
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-default">                      
                                                <i class="icon-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                You have 5 pending membership that requires a quick review.                       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        24 mins
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">                        
                                                <i class="icon-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                New order received with <span class="label label-sm label-success">Reference Number: DR23923</span>             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        30 mins
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">                      
                                                <i class="icon-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                You have 5 pending membership that requires a quick review.                       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        24 mins
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-warning">                        
                                                <i class="icon-bell-alt"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                Web server hardware needs to be upgraded. 
                                                <span class="label label-sm label-default ">Overdue</span>             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        2 hours
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">                        
                                                    <i class="icon-briefcase"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                    IPO Report for year 2013 has been released.   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                            20 mins
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="scroller-footer">
                        <div class="pull-right">
                            <a href="#">See All Records <i class="m-icon-swapright m-icon-gray"></i></a> &nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="portlet box green tasks-widget">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-check"></i>Tasks</div>
                    <div class="tools">
                        <a href="#portlet-config" data-toggle="modal" class="config"></a>
                        <a href="" class="reload"></a>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn default btn-xs" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                More
                                <i class="icon-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#"><i class="i"></i> All Project</a></li>
                                <li class="divider"></li>
                                <li><a href="#">AirAsia</a></li>
                                <li><a href="#">Cruise</a></li>
                                <li><a href="#">HSBC</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Pending <span class="badge badge-important">4</span></a></li>
                                <li><a href="#">Completed <span class="badge badge-success">12</span></a></li>
                                <li><a href="#">Overdue <span class="badge badge-warning">9</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="task-content">
                        <div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="1">
                            <!-- START TASK LIST -->
                            <ul class="task-list">
                                <li>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="liChild" value=""  />                                       
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp">Present 2013 Year IPO Statistics at Board Meeting</span>
                                        <span class="label label-sm label-success">Company</span>
                                        <span class="task-bell"><i class="icon-bell"></i></span>
                                    </div>
                                    <div class="task-config">
                                        <div class="task-config-btn btn-group">
                                            <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <i class="icon-cog"></i><i class="icon-angle-down"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#"><i class="icon-ok"></i> Complete</a></li>
                                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                                <li><a href="#"><i class="icon-trash"></i> Cancel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="liChild" value=""/>                                       
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp">Hold An Interview for Marketing Manager Position</span>
                                        <span class="label label-sm label-danger">Marketing</span>
                                    </div>
                                    <div class="task-config">
                                        <div class="task-config-btn btn-group">
                                            <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <i class="icon-cog"></i><i class="icon-angle-down"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#"><i class="icon-ok"></i> Complete</a></li>
                                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                                <li><a href="#"><i class="icon-trash"></i> Cancel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="liChild" value=""/>                                       
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp">AirAsia Intranet System Project Internal Meeting</span>
                                        <span class="label label-sm label-success">AirAsia</span>
                                        <span class="task-bell"><i class="icon-bell"></i></span>
                                    </div>
                                    <div class="task-config">
                                        <div class="task-config-btn btn-group">
                                            <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <i class="icon-cog"></i><i class="icon-angle-down"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#"><i class="icon-ok"></i> Complete</a></li>
                                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                                <li><a href="#"><i class="icon-trash"></i> Cancel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="liChild" value=""  />                                       
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp">Technical Management Meeting</span>
                                        <span class="label label-sm label-warning">Company</span>
                                    </div>
                                    <div class="task-config">
                                        <div class="task-config-btn btn-group">
                                            <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="icon-cog"></i><i class="icon-angle-down"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#"><i class="icon-ok"></i> Complete</a></li>
                                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                                <li><a href="#"><i class="icon-trash"></i> Cancel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="liChild" value=""  />                                       
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp">Kick-off Company CRM Mobile App Development</span>
                                        <span class="label label-sm label-info">Internal Products</span>
                                    </div>
                                    <div class="task-config">
                                        <div class="task-config-btn btn-group">
                                            <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="icon-cog"></i><i class="icon-angle-down"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#"><i class="icon-ok"></i> Complete</a></li>
                                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                                <li><a href="#"><i class="icon-trash"></i> Cancel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="liChild" value=""  />                                       
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp">
                                            Prepare Commercial Offer For SmartVision Website Rewamp 
                                        </span>
                                        <span class="label label-sm label-danger">SmartVision</span>
                                    </div>
                                    <div class="task-config">
                                        <div class="task-config-btn btn-group">
                                            <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="icon-cog"></i><i class="icon-angle-down"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#"><i class="icon-ok"></i> Complete</a></li>
                                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                                <li><a href="#"><i class="icon-trash"></i> Cancel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="liChild" value=""  />                                       
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp">Sign-Off The Comercial Agreement With AutoSmart</span>
                                        <span class="label label-sm label-default">AutoSmart</span>
                                        <span class="task-bell"><i class="icon-bell"></i></span>
                                    </div>
                                    <div class="task-config">
                                        <div class="task-config-btn btn-group">
                                            <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="icon-cog"></i><i class="icon-angle-down"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#"><i class="icon-ok"></i> Complete</a></li>
                                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                                <li><a href="#"><i class="icon-trash"></i> Cancel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="liChild" value=""  />                                       
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp">Company Staff Meeting</span>
                                        <span class="label label-sm label-success">Cruise</span>
                                        <span class="task-bell"><i class="icon-bell"></i></span>
                                    </div>
                                    <div class="task-config">
                                        <div class="task-config-btn btn-group">
                                            <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="icon-cog"></i><i class="icon-angle-down"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#"><i class="icon-ok"></i> Complete</a></li>
                                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                                <li><a href="#"><i class="icon-trash"></i> Cancel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="last-line">
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="liChild" value=""  />                                       
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp">KeenThemes Investment Discussion</span>
                                        <span class="label label-sm label-warning">KeenThemes</span>
                                    </div>
                                    <div class="task-config">
                                        <div class="task-config-btn btn-group">
                                            <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="icon-cog"></i><i class="icon-angle-down"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#"><i class="icon-ok"></i> Complete</a></li>
                                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                                <li><a href="#"><i class="icon-trash"></i> Cancel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <!-- END START TASK LIST -->
                        </div>
                    </div>
                    <div class="task-footer">
                        <span class="pull-right">
                            <a href="#">See All Tasks <i class="m-icon-swapright m-icon-gray"></i></a> &nbsp;
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>    
</div>
<script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>   
   <script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot; ?>assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot; ?>assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>     
   <script src="<?php echo $this->webroot; ?>assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
   <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
   <script src="<?php echo $this->webroot; ?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot; ?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot; ?>assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>  
   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   <script src="<?php echo $this->webroot; ?>assets/scripts/app.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot; ?>assets/scripts/index.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot; ?>assets/scripts/tasks.js" type="text/javascript"></script>        
   <!-- END PAGE LEVEL SCRIPTS -->  
<script>
      jQuery(document).ready(function() {             
         Index.init();
         Index.initJQVMAP(); // init index page's custom scripts
         Index.initCalendar(); // init index page's custom scripts
         Index.initCharts(); // init index page's custom scripts
         Index.initChat();
         Index.initMiniCharts();
         Index.initDashboardDaterange();
         Index.initIntro();
         Tasks.initDashboardWidget();
      });
   </script>
