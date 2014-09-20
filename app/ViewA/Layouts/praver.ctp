<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0
Version: 1.5.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Praver</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <meta name="MobileOptimized" content="320">
   <!-- BEGIN GLOBAL MANDATORY STYLES -->          
   <link href="<?php echo $this->webroot;?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo $this->webroot;?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo $this->webroot;?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>   
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BEGIN THEME STYLES --> 
   <link href="<?php echo $this->webroot;?>assets/css/print.css" rel="stylesheet" type="text/css" media="print"/>
   <link href="<?php echo $this->webroot;?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo $this->webroot;?>assets/css/style.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo $this->webroot;?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo $this->webroot;?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo $this->webroot;?>assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
   <link href="<?php echo $this->webroot;?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
   
   
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/gritter/css/jquery.gritter.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/clockface/css/clockface.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/bootstrap-datepicker/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/bootstrap-colorpicker/css/colorpicker.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/jquery-multi-select/css/multi-select.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css"/>
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/jquery-tags-input/jquery.tagsinput.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
   
   
   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>assets/plugins/select2/select2_metro.css" />
   <link rel="stylesheet" href="<?php echo $this->webroot;?>assets/plugins/data-tables/DT_bootstrap.css" />
   
   <!--<link rel="stylesheet" type="text/css" media="print" href="<?php //echo $this->webroot; ?>css/print.css">-->
   <!-- END THEME STYLES -->
   <link rel="shortcut icon" href="favicon.ico" />
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
   <!-- BEGIN CORE PLUGINS -->   
   <!--[if lt IE 9]>
   <script src="<?php echo $this->webroot;?>assets/plugins/respond.min.js"></script>
   <script src="<?php echo $this->webroot;?>assets/plugins/excanvas.min.js"></script> 
   <![endif]-->   
   <script src="<?php echo $this->webroot;?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot;?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
   <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
   <script src="<?php echo $this->webroot;?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>      
   <script src="<?php echo $this->webroot;?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot;?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
   <script src="<?php echo $this->webroot;?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot;?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
   <script src="<?php echo $this->webroot;?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
   <script src="<?php echo $this->webroot;?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
   <script type="text/javascript" src="<?php echo $this->webroot;?>assets/plugins/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="<?php echo $this->webroot;?>assets/plugins/data-tables/DT_bootstrap.js"></script>
   <script src="<?php echo $this->webroot;?>assets/scripts/table-advanced.js"></script>  
   <script src="<?php echo $this->webroot;?>assets/scripts/table-managed.js"></script> 
    
   <script type="text/javascript" src="<?php echo $this->webroot;?>assets/plugins/select2/select2.min.js"></script> 
   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   <!--<script src="<?php //echo $this->webroot;?>assets/scripts/table-editable.js"></script>  -->
   
   
   
   <!-- END CORE PLUGINS -->
   <script src="<?php echo $this->webroot;?>assets/scripts/app.js"></script>  
   <script src="<?php echo $this->webroot;?>assets/scripts/form-components.js"></script>      
   <script>
      jQuery(document).ready(function() {    
         App.init();
      });
   </script>
    
   <!-- END JAVASCRIPTS -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed">
   <!-- BEGIN HEADER -->   
   <div class="header navbar navbar-inverse navbar-fixed-top">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="header-inner">
         <!-- BEGIN LOGO -->  
         <a class="navbar-brand" href="index.html">
         <img src="<?php echo $this->webroot;?>assets/img/logo.png" alt="logo" class="img-responsive" />
         </a>
         <!-- END LOGO -->
         <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
         <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
         <img src="<?php echo $this->webroot;?>assets/img/menu-toggler.png" alt="" />
         </a> 
         <!-- END RESPONSIVE MENU TOGGLER -->
         <!-- BEGIN TOP NAVIGATION MENU -->
         <ul class="nav navbar-nav pull-right">
            <!-- BEGIN NOTIFICATION DROPDOWN -->
            <!--
            <li class="dropdown" id="header_notification_bar">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                  data-close-others="true">
               <i class="icon-warning-sign"></i>
               <span class="badge">6</span>
               </a>
               <ul class="dropdown-menu extended notification">
                  <li>
                     <p>You have 14 new notifications</p>
                  </li>
                  <li>
                     <ul class="dropdown-menu-list scroller" style="height: 250px;">
                        <li>  
                           <a href="#">
                           <span class="label label-icon label-success"><i class="icon-plus"></i></span>
                           New user registered. 
                           <span class="time">Just now</span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="label label-icon label-danger"><i class="icon-bolt"></i></span>
                           Server #12 overloaded. 
                           <span class="time">15 mins</span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="label label-icon label-warning"><i class="icon-bell"></i></span>
                           Server #2 not responding.
                           <span class="time">22 mins</span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="label label-icon label-info"><i class="icon-bullhorn"></i></span>
                           Application error.
                           <span class="time">40 mins</span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="label label-icon label-danger"><i class="icon-bolt"></i></span>
                           Database overloaded 68%. 
                           <span class="time">2 hrs</span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="label label-icon label-danger"><i class="icon-bolt"></i></span>
                           2 user IP blocked.
                           <span class="time">5 hrs</span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="label label-icon label-warning"><i class="icon-bell"></i></span>
                           Storage Server #4 not responding.
                           <span class="time">45 mins</span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="label label-icon label-info"><i class="icon-bullhorn"></i></span>
                           System Error.
                           <span class="time">55 mins</span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="label label-icon label-danger"><i class="icon-bolt"></i></span>
                           Database overloaded 68%. 
                           <span class="time">2 hrs</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="external">   
                     <a href="#">See all notifications <i class="m-icon-swapright"></i></a>
                  </li>
               </ul>
            </li>
            <!-- END NOTIFICATION DROPDOWN -->
            <!-- BEGIN INBOX DROPDOWN -->
            <!--
            <li class="dropdown" id="header_inbox_bar">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                  data-close-others="true">
               <i class="icon-envelope"></i>
               <span class="badge">5</span>
               </a>
               <ul class="dropdown-menu extended inbox">
                  <li>
                     <p>You have 12 new messages</p>
                  </li>
                  <li>
                     <ul class="dropdown-menu-list scroller" style="height: 250px;">
                        <li>  
                           <a href="inbox.html?a=view">
                           <span class="photo"><img src="<?php echo $this->webroot;?>assets/img/avatar2.jpg" alt=""/></span>
                           <span class="subject">
                           <span class="from">Lisa Wong</span>
                           <span class="time">Just Now</span>
                           </span>
                           <span class="message">
                           Vivamus sed auctor nibh congue nibh. auctor nibh
                           auctor nibh...
                           </span>  
                           </a>
                        </li>
                        <li>  
                           <a href="inbox.html?a=view">
                           <span class="photo"><img src="<?php echo $this->webroot;?>assets/img/avatar3.jpg" alt=""/></span>
                           <span class="subject">
                           <span class="from">Richard Doe</span>
                           <span class="time">16 mins</span>
                           </span>
                           <span class="message">
                           Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh
                           auctor nibh...
                           </span>  
                           </a>
                        </li>
                        <li>  
                           <a href="inbox.html?a=view">
                           <span class="photo"><img src="<?php echo $this->webroot;?>assets/img/avatar1.jpg" alt=""/></span>
                           <span class="subject">
                           <span class="from">Bob Nilson</span>
                           <span class="time">2 hrs</span>
                           </span>
                           <span class="message">
                           Vivamus sed nibh auctor nibh congue nibh. auctor nibh
                           auctor nibh...
                           </span>  
                           </a>
                        </li>
                        <li>  
                           <a href="inbox.html?a=view">
                           <span class="photo"><img src="<?php echo $this->webroot;?>/assets/img/avatar2.jpg" alt=""/></span>
                           <span class="subject">
                           <span class="from">Lisa Wong</span>
                           <span class="time">40 mins</span>
                           </span>
                           <span class="message">
                           Vivamus sed auctor 40% nibh congue nibh...
                           </span>  
                           </a>
                        </li>
                        <li>  
                           <a href="inbox.html?a=view">
                           <span class="photo"><img src="<?php echo $this->webroot;?>/assets/img/avatar3.jpg" alt=""/></span>
                           <span class="subject">
                           <span class="from">Richard Doe</span>
                           <span class="time">46 mins</span>
                           </span>
                           <span class="message">
                           Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh
                           auctor nibh...
                           </span>  
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="external">   
                     <a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a>
                  </li>
               </ul>
            </li>
            <!-- END INBOX DROPDOWN -->
            <!-- BEGIN TODO DROPDOWN -->
            <!--
            <li class="dropdown" id="header_task_bar">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
               <i class="icon-tasks"></i>
               <span class="badge">5</span>
               </a>
               <ul class="dropdown-menu extended tasks">
                  <li>
                     <p>You have 12 pending tasks</p>
                  </li>
                  <li>
                     <ul class="dropdown-menu-list scroller" style="height: 250px;">
                        <li>  
                           <a href="#">
                           <span class="task">
                           <span class="desc">New release v1.2</span>
                           <span class="percent">30%</span>
                           </span>
                           <span class="progress">
                           <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                           <span class="sr-only">40% Complete</span>
                           </span>
                           </span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="task">
                           <span class="desc">Application deployment</span>
                           <span class="percent">65%</span>
                           </span>
                           <span class="progress progress-striped">
                           <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                           <span class="sr-only">65% Complete</span>
                           </span>
                           </span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="task">
                           <span class="desc">Mobile app release</span>
                           <span class="percent">98%</span>
                           </span>
                           <span class="progress">
                           <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                           <span class="sr-only">98% Complete</span>
                           </span>
                           </span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="task">
                           <span class="desc">Database migration</span>
                           <span class="percent">10%</span>
                           </span>
                           <span class="progress progress-striped">
                           <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                           <span class="sr-only">10% Complete</span>
                           </span>
                           </span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="task">
                           <span class="desc">Web server upgrade</span>
                           <span class="percent">58%</span>
                           </span>
                           <span class="progress progress-striped">
                           <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                           <span class="sr-only">58% Complete</span>
                           </span>
                           </span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="task">
                           <span class="desc">Mobile development</span>
                           <span class="percent">85%</span>
                           </span>
                           <span class="progress progress-striped">
                           <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                           <span class="sr-only">85% Complete</span>
                           </span>
                           </span>
                           </a>
                        </li>
                        <li>  
                           <a href="#">
                           <span class="task">
                           <span class="desc">New UI release</span>
                           <span class="percent">18%</span>
                           </span>
                           <span class="progress progress-striped">
                           <span style="width: 18%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                           <span class="sr-only">18% Complete</span>
                           </span>
                           </span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="external">   
                     <a href="#">See all tasks <i class="m-icon-swapright"></i></a>
                  </li>
               </ul>
            </li>
            -->
            <!-- END TODO DROPDOWN -->
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
               <img alt="" src="<?php echo $this->webroot;?>assets/img/login.png"/>
               <span class="username"><?php echo $this->Session->read('Auth.User.nombre')?></span>
               <i class="icon-angle-down"></i>
               </a>
               <ul class="dropdown-menu">
                  <li><a data-toggle="modal" href="#modaluno" onclick="$('#contenidomodaluno').load('<?php echo $this->Html->url(array('controller' => 'Users','action' => 'ajaxedita',$this->Session->read('Auth.User.id')));?>');"><i class="icon-user"></i> Mi perfil</a>
                  </li>
                  
                  <li class="divider"></li>
                  <li><a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> Pantalla Completa</a>
                  </li>
                  
                  <li><a href="<?php echo $this->Html->url(array('controller' => 'Users','action' => 'salir'));?>"><i class="icon-key"></i> Salir</a>
                  </li>
               </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
         </ul>
         <!-- END TOP NAVIGATION MENU -->
      </div>
      <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <div class="clearfix"></div>
   <!-- BEGIN CONTAINER -->   
   <div class="page-container">
      <!-- BEGIN SIDEBAR -->
     
      <?php echo $this->element('sidebar/principal'); ?>
      
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div class="page-content">
      <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
      </div>
      
      
      <!-- END PAGE -->    
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div class="footer">
      <div class="footer-inner">
         2013 &copy; Diseno y Desarrollo LabWare.
      </div>
      <div class="footer-tools">
         <span class="go-top">
         <i class="icon-angle-up"></i>
         </span>
      </div>
   </div>
   <!-- END FOOTER -->
  <div class="modal fade" id="modaluno" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content" id="contenidomodaluno">
                              
                              
                           </div>
                           <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
    </div>
</body>
<!-- END BODY -->
</html>