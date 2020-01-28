<?php  
include("funciones/session.php"); 
$query="SELECT rol FROM usuarios WHERE username='$username'";
$resultado = $conexion->query($query);
$row=$resultado->fetch_assoc();
$sesion=$row['rol']; 
if ($sesion !='Administrador' && $sesion !='Empleado') {
    header("location: index.php");
}
?>
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="inicio.php">
            <img alt="Logo" src="img/logo2.png" width="70" />
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
    </div>
</div>
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        <!-- begin:: Aside -->
        <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

            <!-- begin:: Aside -->
            <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                <div class="kt-aside__brand-logo">
                    <a href="index.html">
                        <img alt="Logo" src="img/logo2.png" width="150" />
                    </a>
                </div>
                <div class="kt-aside__brand-tools">
                    <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
                </div>
            </div>

            <!-- end:: Aside -->

            <!-- begin:: Aside Menu -->
            <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
                    <ul class="kt-menu__nav ">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="sucursales.php" class="kt-menu__link " title="Sucursales"><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Sucursales</span></a></li><br><br>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="empleados.php" class="kt-menu__link" title="Empleados"><i class="kt-menu__link-icon flaticon-users"></i><span class="kt-menu__link-text">Empleados</span></a></li><br><br>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="usuarios.php" class="kt-menu__link" title="Usuarios"><i class="kt-menu__link-icon flaticon-network"></i><span class="kt-menu__link-text">Usuarios</span></a></li><br><br>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="clientes.php" class="kt-menu__link" title="Clientes"><i class="kt-menu__link-icon flaticon-customer"></i><span class="kt-menu__link-text">Clientes</span></a></li><br><br>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="servicios.php" class="kt-menu__link" title="Servicios"><i class="kt-menu__link-icon flaticon-medical"></i><span class="kt-menu__link-text">Servicios</span></a></li><br><br>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="promociones.php" class="kt-menu__link" title="Promociones"><i class="kt-menu__link-icon flaticon2-tag"></i><span class="kt-menu__link-text">Promociones</span></a></li>
                    </ul>
                </div>
            </div>

            <!-- end:: Aside Menu -->
        </div>

        <!-- end:: Aside -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            <!-- begin:: Header -->
            <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

                <!-- begin: Header Menu -->
                <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                        <ul class="kt-menu__nav ">
                            <li class="kt-menu__item " aria-haspopup="true"><a href="transacciones.php" class="kt-menu__link "><span class="kt-menu__link-text">Transacciones</span></a></li>
                            <li class="kt-menu__item " aria-haspopup="true"><a href="actividades.php" class="kt-menu__link "><span class="kt-menu__link-text">Actividades</span></a></li>
                            <li class="kt-menu__item " aria-haspopup="true"><a href="inicio.php" class="kt-menu__link "><span class="kt-menu__link-text">Disponibilidad</span></a></li>
                        </ul>
                    </div>
                </div>

                <!-- end: Header Menu -->

                <!-- begin:: Header Topbar -->
                <div class="kt-header__topbar">

                    <!--begin: Quick Actions -->
                    <div class="kt-header__topbar-item dropdown">
                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
                            <span class="kt-header__topbar-icon">
                                <i class="flaticon2-gear"></i>
                            </span>
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                            <form>
                                <div class="kt-grid-nav kt-grid-nav--skin-light">
                                    <div class="kt-grid-nav__row">
                                        <a href="sms.php" class="kt-grid-nav__item" data-toggle="modal" data-target="#sms">
                                            <span class="kt-grid-nav__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M18.1444251,10.8396467 L12,14.1481833 L5.85557487,10.8396467 C5.4908718,10.6432681 5.03602525,10.7797221 4.83964668,11.1444251 C4.6432681,11.5091282 4.77972206,11.9639747 5.14442513,12.1603533 L11.6444251,15.6603533 C11.8664074,15.7798822 12.1335926,15.7798822 12.3555749,15.6603533 L18.8555749,12.1603533 C19.2202779,11.9639747 19.3567319,11.5091282 19.1603533,11.1444251 C18.9639747,10.7797221 18.5091282,10.6432681 18.1444251,10.8396467 Z" fill="#000000"/>
                                                        <path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(11.959697, 3.661508) rotate(-90.000000) translate(-11.959697, -3.661508) "/>
                                                    </g>
                                                </svg> </span>
                                                <span class="kt-grid-nav__title">Plantillas sms</span>
                                            </a>
                                            <a href="#" class="kt-grid-nav__item" data-toggle="modal" data-target="#tipo_actividad">

                                                <span class="kt-grid-nav__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) "/>
                                                            <path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) "/>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span class="kt-grid-nav__title">Tipos de actividad</span>
                                            </a>

                                        </div>
                                        <div class="kt-grid-nav__row">
                                            <a href="#" class="kt-grid-nav__item" data-toggle="modal" data-target="#agrupar_servicios">
                                                <span class="kt-grid-nav__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />
                                                            <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg> </span>
                                                    <span class="kt-grid-nav__title">Agrupar servicios</span>
                                                </a>
                                                <a href="#" class="kt-grid-nav__item" data-toggle="modal" data-target="#perdido">
                                                    <span class="kt-grid-nav__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                                                                <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000" transform="translate(12.000000, 15.499947) scale(1, -1) translate(-12.000000, -15.499947) "/>
                                                            </g>
                                                        </svg> </span>
                                                        <span class="kt-grid-nav__title">Razón de perdido</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!--end: Grid Nav -->
                                        </form>
                                    </div>
                                </div>

                                <!--end: Quick Actions -->

                                <!--begin: User Bar -->
                                <div class="kt-header__topbar-item kt-header__topbar-item--user">
                                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                                        <div class="kt-header__topbar-user">
                                            <span class="kt-header__topbar-welcome kt-hidden-mobile">Hola,</span>
                                            <span class="kt-header__topbar-username kt-hidden-mobile">
                                                <?php
                                                $conexion->query("SET NAMES 'utf8'");
                                                $query="SELECT * FROM usuarios AS us INNER JOIN empleados AS em ON us.id_empleado=em.id_empleado WHERE username='$username'";
                                                $resultado=$conexion->query($query);
                                                $row=$resultado->fetch_assoc();
                                                echo $row['nombre'];  
                                                ?>  
                                            </span>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                                        <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(assets/media/misc/bg-1.jpg)">
                                            <div class="kt-user-card__avatar">
                                                <img class="kt-hidden" alt="Pic" src="assets/media/users/300_25.jpg" />
                                                <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">
                                                    <?php 
                                                    switch ($row['rol']) {
                                                        case 'Administrador':
                                                        echo "AD";
                                                        break;
                                                        case 'Encargado':
                                                        echo "EN";
                                                        break;
                                                        default:
                                                        echo "EM";
                                                        break;
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="kt-user-card__name">
                                                <?php echo $username; ?>
                                                <div class="kt-user-card__badge">
                                                    <span class="btn btn-success btn-sm btn-bold btn-font-md" data-toggle="modal" data-target="#info">
                                                        <?php echo $row['rol']; ?>  
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="kt-notification">
                                            <a href="#" data-toggle="modal" data-target="#info" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon2-calendar-3 kt-font-success"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title kt-font-bold">
                                                        Mi Perfil
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        Obten información acerca de tus permisos de usuario
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="kt-notification__custom kt-space-between">
                                                <a href="funciones/cerrar.php" class="btn btn-label btn-label-brand btn-sm btn-bold">Cerrar Sesión</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end: User Bar -->
                            </div>

                            <!-- end:: Header Topbar -->
                        </div>

                        <!-- end:: Header -->
                        <div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Información de la cuenta</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php  
                                        switch ($row['rol']) {
                                            case 'Administrador':
                                            echo "
                                            <ul>
                                            <li>Vista de todos los módulos del sistema</li>
                                            <li>Editar todos los campos disponibles del sistema</li>
                                            <li>Vista de todos los módulos del sistema</li>
                                            </ul>";
                                            break;
                                            case 'Encargado':
                                            echo "test";
                                            break;
                                            default:
                                            echo "
                                            <ul>
                                            <li>Vista de todos los módulos Actividad, Disponibilidad, Transacciones, Clientes, Hoja técnica del cliente.</li>
                                            <li>Agregar Transacciones, Actividades propias del cliente, Clientes.</li>
                                            </ul>";
                                            break;
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="agrupar_servicios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content" style="background-color: transparent;border:none;">
                                    <div class="kt-portlet kt-portlet--tabs">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-toolbar">
                                                <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_15" role="tab">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"/>
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"/>
                                                                </g>
                                                            </svg> Agrupar Servicios
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_25" role="tab">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M4,7 L20,7 L20,19.5 C20,20.3284271 19.3284271,21 18.5,21 L5.5,21 C4.67157288,21 4,20.3284271 4,19.5 L4,7 Z M10,10 C9.44771525,10 9,10.4477153 9,11 C9,11.5522847 9.44771525,12 10,12 L14,12 C14.5522847,12 15,11.5522847 15,11 C15,10.4477153 14.5522847,10 14,10 L10,10 Z" fill="#000000"/>
                                                                    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="4" rx="1"/>
                                                                </g>
                                                            </svg> Grupos de Servicios
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body" style="border-bottom: 0px;">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="kt_user_edit_tab_15" role="tabpanel">
                                                    <div class="kt-form kt-form--label-right">
                                                        <div class="kt-form__body">
                                                            <div class="kt-section kt-section--first">
                                                                <div class="kt-section__body">
                                                                    <div class="row">
                                                                        <label class="col-xl-3"></label>
                                                                        <div class="col-lg-9 col-xl-6">
                                                                            <h3 class="kt-section__title kt-section__title-sm">Agregar servio a un grupo</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-xl-3 col-lg-3 col-form-label">Selecciona el grupo</label>
                                                                        <div class="col-lg-9 col-xl-6">
                                                                            <select class="form-control kt-selectpicker" name="id_grupo_servicio" onchange="formadd();">
                                                                                <option value="" style="display: none;">Seleccinar</option>
                                                                                <option value="new">Nuevo grupo</option>
                                                                                <option value="exis">Grupo existente</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <form action="funciones/addrelacion.php" method="POST">
                                                                        <div id="form1" style="display: none;">
                                                                            <div class="form-group row">
                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Nombre del nuevo grupo</label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <input type="text" class="form-control" name="newnamegrupo">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Seleccionar uno o más servicios a relacionar</label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <select class="form-control kt-select2" id="kt_select2_3" name="servicios[]" multiple="multiple" style="width: 200px:">
                                                                                        <?php 
                                                                                        $query = "SELECT * FROM servicios WHERE estatus='Activo' ORDER BY nombre_servicio ASC";
                                                                                        $resultado=$conexion->query($query);
                                                                                        while ($row=$resultado->fetch_assoc()) {
                                                                                            ?>
                                                                                            <option value="<?php echo $row['id_servicio']; ?>"><?php echo $row['nombre_servicio']; ?></option><?php 
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div> 
                                                                        </div>
                                                                        <div id="form2" style="display: none;">
                                                                            <div class="form-group row">
                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Seleciona el grupo</label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <select class="form-control kt-selectpicker" name="id_grupo_servicio">
                                                                                        <option value="" style="display: none;">Seleccinar</option>
                                                                                        <?php 
                                                                                        $query = "SELECT * FROM grupo_servicio ORDER BY nombre_grupo_servicio ASC";
                                                                                        $resultado=$conexion->query($query);
                                                                                        while ($row=$resultado->fetch_assoc()) {
                                                                                            ?>
                                                                                            <option value="<?php echo $row['id_grupo_servicio']; ?>"><?php echo $row['nombre_grupo_servicio']; ?></option><?php 
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-xl-3 col-lg-3 col-form-label">Seleccionar uno o más servicios a relacionar</label>
                                                                                <div class="col-lg-9 col-xl-6">
                                                                                    <select class="form-control kt-select2" id="kt_select2_4" name="servicios[]" multiple="multiple" style="width: 200px:">
                                                                                        <?php 
                                                                                        $query = "SELECT * FROM servicios WHERE estatus='Activo' ORDER BY nombre_servicio ASC";
                                                                                        $resultado=$conexion->query($query);
                                                                                        while ($row=$resultado->fetch_assoc()) {
                                                                                            ?>
                                                                                            <option value="<?php echo $row['id_servicio']; ?>"><?php echo $row['nombre_servicio']; ?></option><?php 
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>  
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-label-brand btn-bold">Guardar</button> 
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                        </div>  
                                                    </form>
                                                </div>
                                                <div class="tab-pane" id="kt_user_edit_tab_25" role="tabpanel">
                                                    <div class="kt-form kt-form--label-right">
                                                        <div class="kt-form__body">
                                                            <div class="kt-section kt-section--first">
                                                                <div class="kt-section__body">
                                                                    <?php 
                                                                    include("funciones/conexion.php");
                                                                    $conexion->query("SET NAMES 'utf8'");
                                                                    $query = "SELECT GROUP_CONCAT(ser.nombre_servicio), gru.nombre_grupo_servicio FROM relacion_servicio_grupo AS rela INNER JOIN servicios AS ser ON rela.id_servicio=ser.id_servicio INNER JOIN grupo_servicio AS gru ON rela.id_grupo_servicio=gru.id_grupo_servicio GROUP BY gru.id_grupo_servicio";
                                                                    $resultado=$conexion->query($query);
                                                                    while ($row=$resultado->fetch_assoc()) {
                                                                        $nombre_servicio=$row['GROUP_CONCAT(ser.nombre_servicio)'];
                                                                        $nombre_grupo_servicio=$row['nombre_grupo_servicio'];
                                                                        ?>
                                                                        <div class="kt-section kt-section--first">
                                                                            <div class="kt-timeline-v3">
                                                                                <div class='kt-timeline-v3__item kt-timeline-v3__item--success'>
                                                                                    <span class='kt-timeline-v3__item-time' style='font-size: 11px;'></span>
                                                                                    <div class='kt-timeline-v3__item-desc'>
                                                                                        <span class='kt-timeline-v3__item-text'>
                                                                                            <?php echo $nombre_servicio; ?>
                                                                                        </span><br>
                                                                                        <span class='kt-timeline-v3__item-user-name'>
                                                                                            <?php echo $nombre_grupo_servicio; ?>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="sms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content" style="background-color: transparent;border:none;">
                                    <div class="kt-portlet kt-portlet--tabs">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-toolbar">
                                                <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1" role="tab">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                    <path d="M12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.98630124,11 4.48466491,11.0516454 4,11.1500272 L4,7 C4,5.8954305 4.8954305,5 6,5 L20,5 C21.1045695,5 22,5.8954305 22,7 L22,16 C22,17.1045695 21.1045695,18 20,18 L12.9835977,18 Z M19.1444251,6.83964668 L13,10.1481833 L6.85557487,6.83964668 C6.4908718,6.6432681 6.03602525,6.77972206 5.83964668,7.14442513 C5.6432681,7.5091282 5.77972206,7.96397475 6.14442513,8.16035332 L12.6444251,11.6603533 C12.8664074,11.7798822 13.1335926,11.7798822 13.3555749,11.6603533 L19.8555749,8.16035332 C20.2202779,7.96397475 20.3567319,7.5091282 20.1603533,7.14442513 C19.9639747,6.77972206 19.5091282,6.6432681 19.1444251,6.83964668 Z" fill="#000000"/>
                                                                </g>
                                                            </svg> Listado de Mensajes
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3" role="tab">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                                                </g>
                                                            </svg> Agregar Mensajes
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body" style="padding-bottom:0px;">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
                                                    <div class="kt-form kt-form--label-right">
                                                        <div class="kt-form__body">
                                                            <div class="kt-section kt-section--first">
                                                                <div class="kt-section__body">
                                                                    <?php 
                                                                    include("funciones/conexion.php");
                                                                    $conexion->query("SET NAMES 'utf8'");
                                                                    $query = "SELECT * FROM sms_tipo";
                                                                    $resultado=$conexion->query($query);
                                                                    while ($row=$resultado->fetch_assoc()) {
                                                                        ?>
                                                                        <div class="kt-section kt-section--first">
                                                                            <div class="kt-timeline-v3">
                                                                                <div class="kt-timeline-v3__item kt-timeline-v3__item--success">
                                                                                    <span class="kt-timeline-v3__item-time" style="font-size: 12px;"><?php echo $row['nombre']; ?></span>
                                                                                    <div class="kt-timeline-v3__item-desc">
                                                                                        <span class="kt-timeline-v3__item-text">
                                                                                            <?php echo $row['body']; ?>
                                                                                        </span><br>
                                                                                        <span class="kt-timeline-v3__item-user-name">
                                                                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__item-link">
                                                                                                <?php echo $row['etiqueta_sms']; ?>
                                                                                            </a>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="kt_user_edit_tab_3" role="tabpanel">
                                                    <div class="kt-form kt-form--label-right">
                                                        <div class="kt-form__body">
                                                            <div class="kt-section kt-section--first">
                                                                <div class="kt-section__body">
                                                                    <form action="funciones/addsms.php" method="POST">
                                                                        <div class="row">
                                                                            <label class="col-xl-3"></label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <h3 class="kt-section__title kt-section__title-sm">Agrega un tipo de mensaje</h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Nombre del Mensaje</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <input type="text" class="form-control" name="nombre" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Programación de envío</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <select class="form-control kt-selectpicker" name="programacion" required>
                                                                                    <option value="" style="display: none;">Seleccionar</option>
                                                                                    <option value="1 día antes">1 día antes</option>
                                                                                    <option value="2 días antes">2 días antes</option>
                                                                                    <option value="3 días antes">3 días antes</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group form-group-last row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Cuerpo del mensaje</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <div class="form-group form-group-last">
                                                                                    <textarea class="form-control" id="exampleTextarea" rows="3" name="mensaje" required></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-label-brand btn-bold">Guardar</button>
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="promociones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content" style="background-color: transparent;border:none;">
                                    <div class="kt-portlet kt-portlet--tabs">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-toolbar">
                                                <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_12" role="tab">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z" fill="#000000" opacity="0.3"/>
                                                                    <path d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z" fill="#000000"/>
                                                                    <path d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z" fill="#000000"/>
                                                                </g>
                                                            </svg> Listado de Promociones
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_22" role="tab">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                                                </g>
                                                            </svg> Agregar Promociones
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="kt_user_edit_tab_12" role="tabpanel">
                                                    <div class="kt-form kt-form--label-right">
                                                        <div class="kt-form__body">
                                                            <div class="kt-section kt-section--first">
                                                                <div class="kt-section__body">
                                                                    <?php 
                                                                    include("funciones/conexion.php");
                                                                    $conexion->query("SET NAMES 'utf8'");
                                                                    $query = "SELECT * FROM promociones";
                                                                    $resultado=$conexion->query($query);
                                                                    while ($row=$resultado->fetch_assoc()) {
                                                                        $datospromociones=$row['id_promocion']."||".$row['nombre']."||".$row['estatus']."||".$row['fecha_vigencia']."||".$row['porcentaje'];
                                                                        ?>
                                                                        <div class="kt-section kt-section--first">
                                                                            <div class="kt-timeline-v3">
                                                                                <?php 
                                                                                $fecha_vigencia=$row['fecha_vigencia'];
                                                                                $nombre=$row['nombre'];
                                                                                $Porcentaje=$row['porcentaje'];
                                                                                $mostrar='"';
                                                                                if ($row['estatus']=='Activo') {
                                                                                    echo "
                                                                                    <div class='kt-timeline-v3__item kt-timeline-v3__item--success'>
                                                                                    <span class='kt-timeline-v3__item-time' style='font-size: 11px;'>$fecha_vigencia</span>
                                                                                    <div class='kt-timeline-v3__item-desc'>
                                                                                    <span class='kt-timeline-v3__item-text'>
                                                                                    $nombre <a href='#' onclick='editarpromociones($mostrar$datospromociones$mostrar)' data-toggle='modal' data-target='#editpromocion' data-dismiss='modal'><i class='la la-edit'></i></a>
                                                                                    </span><br>
                                                                                    <span class='kt-timeline-v3__item-user-name'>
                                                                                    $Porcentaje %
                                                                                    </span>
                                                                                    </div>
                                                                                    </div>";
                                                                                }else{
                                                                                    echo "
                                                                                    <div class='kt-timeline-v3__item kt-timeline-v3__item--danger'>
                                                                                    <span class='kt-timeline-v3__item-time' style='font-size: 11px;'>$fecha_vigencia</span>
                                                                                    <div class='kt-timeline-v3__item-desc'>
                                                                                    <span class='kt-timeline-v3__item-text'>
                                                                                    $nombre <a href='#' onclick='editarpromociones($mostrar$datospromociones$mostrar)' data-toggle='modal' data-target='#editpromocion' data-dismiss='modal'><i class='la la-edit'></i></a>
                                                                                    </span><br>
                                                                                    <span class='kt-timeline-v3__item-user-name'>
                                                                                    $Porcentaje %
                                                                                    </span>
                                                                                    </div>
                                                                                    </div>";
                                                                                } ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="kt_user_edit_tab_22" role="tabpanel">
                                                    <div class="kt-form kt-form--label-right">
                                                        <div class="kt-form__body">
                                                            <div class="kt-section kt-section--first">
                                                                <div class="kt-section__body">
                                                                    <form action="funciones/addpromocion.php" method="POST">
                                                                        <div class="row">
                                                                            <label class="col-xl-3"></label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <h3 class="kt-section__title kt-section__title-sm">Agrega una nueva promoción</h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Nombre de la promoción</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <input type="text" class="form-control" name="nombre" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Activar</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                                                                    <label>
                                                                                        <input type="checkbox" name="estatus" value="Activo">
                                                                                        <span></span>
                                                                                    </label>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Fecha de vigencia</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <input type="date" class="form-control" name="fecha_vigencia" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Porcentaje Aplicar</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend"><span class="input-group-text">%</span></div>
                                                                                    <input type="number" class="form-control" name="Porcentaje" placeholder="Solo Enteros" aria-describedby="basic-addon1" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="kt-form__actions">
                                                                <div class="row">
                                                                    <div class="col-xl-3"></div>
                                                                    <div class="col-lg-9 col-xl-6">
                                                                        <button type="submit" class="btn btn-label-brand btn-bold">Guardar</button>
                                                                    </form> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="tipo_actividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content" style="background-color: transparent;border:none;">
                                    <div class="kt-portlet kt-portlet--tabs">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-toolbar">
                                                <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_16" role="tab">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                                                    <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000"/>
                                                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                                                </g>
                                                            </svg> Listado de Tipos de Actividad
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_26" role="tab">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                                                </g>
                                                            </svg> Agregar Tipo de Actividad
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body" style="padding-bottom: 0px;">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="kt_user_edit_tab_16" role="tabpanel">
                                                    <div class="kt-form kt-form--label-right">
                                                        <div class="kt-form__body">
                                                            <div class="kt-section kt-section--first">
                                                                <div class="kt-section__body">
                                                                    <?php 
                                                                    include("funciones/conexion.php");
                                                                    $conexion->query("SET NAMES 'utf8'");
                                                                    $query = "SELECT * FROM tipo_actividad";
                                                                    $resultado=$conexion->query($query);
                                                                    while ($row=$resultado->fetch_assoc()) {
                                                                        $datostipo_actividad=$row['id_tipo_actividad']."||".$row['nombre_tipo_actividad']."||".$row['estatus']."||".$row['sincronizar_tipo_actividad'];
                                                                        $sincronizar_tipo_actividad=$row['sincronizar_tipo_actividad'];
                                                                        $nombre=$row['nombre_tipo_actividad'];
                                                                        $estatus=$row['estatus'];
                                                                        if ($sincronizar_tipo_actividad=='Activo') {
                                                                            $mostrarsincronizar='Si';
                                                                        }else{
                                                                            $mostrarsincronizar='No';
                                                                        }
                                                                        ?>
                                                                        <div class="kt-section kt-section--first">
                                                                            <div class="kt-timeline-v3">
                                                                                <?php
                                                                                $mostrar='"';
                                                                                if ($estatus=='Activo') {
                                                                                    echo "
                                                                                    <div class='kt-timeline-v3__item kt-timeline-v3__item--success'>
                                                                                    <span class='kt-timeline-v3__item-time' style='font-size: 11px;'>$estatus</span>
                                                                                    <div class='kt-timeline-v3__item-desc'>
                                                                                    <span class='kt-timeline-v3__item-text'>
                                                                                    $nombre <a href='#' onclick='editartipoactividad($mostrar$datostipo_actividad$mostrar)' data-toggle='modal' data-target='#edittopo' data-dismiss='modal'><i class='la la-pencil-square-o'></i></a>
                                                                                    </span><br>
                                                                                    <span class='kt-timeline-v3__item-user-name'>
                                                                                    Sincronizar: $mostrarsincronizar
                                                                                    </span>
                                                                                    </div>
                                                                                    </div>";
                                                                                }else{
                                                                                    echo "
                                                                                    <div class='kt-timeline-v3__item kt-timeline-v3__item--danger'>
                                                                                    <span class='kt-timeline-v3__item-time' style='font-size: 11px;'>$estatus</span>
                                                                                    <div class='kt-timeline-v3__item-desc'>
                                                                                    <span class='kt-timeline-v3__item-text'>
                                                                                    $nombre <a href='#' onclick='editartipoactividad($mostrar$datostipo_actividad$mostrar)' data-toggle='modal' data-target='#edittopo' data-dismiss='modal'><i class='la la-pencil-square-o'></i></a>
                                                                                    </span><br>
                                                                                    <span class='kt-timeline-v3__item-user-name'>
                                                                                    Sincronizar: $mostrarsincronizar
                                                                                    </span>
                                                                                    </div>
                                                                                    </div>";
                                                                                } ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="kt_user_edit_tab_26" role="tabpanel">
                                                    <div class="kt-form kt-form--label-right">
                                                        <div class="kt-form__body">
                                                            <div class="kt-section kt-section--first">
                                                                <div class="kt-section__body">
                                                                    <form action="funciones/addtipo_actividad.php" method="POST">
                                                                        <div class="row">
                                                                            <label class="col-xl-3"></label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <h3 class="kt-section__title kt-section__title-sm">Agrega un Tipo de Actividad</h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Nombre del tipo de actividad</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <input type="text" class="form-control" name="nombre" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Activar</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                                                                    <label>
                                                                                        <input type="checkbox" name="estatus" value="Activo">
                                                                                        <span></span>
                                                                                    </label>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">¿Sincronizar actividad?</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                                                                    <label>
                                                                                        <input type="checkbox" name="sincronizar" value="Activo">
                                                                                        <span></span>
                                                                                    </label>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-label-brand btn-bold">Guardar</button>
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="perdido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content" style="background-color: transparent;border:none;">
                                    <div class="kt-portlet kt-portlet--tabs">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-toolbar">
                                                <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_13" role="tab">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z" fill="#000000" opacity="0.3"/>
                                                                    <path d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z" fill="#000000"/>
                                                                    <path d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z" fill="#000000"/>
                                                                </g>
                                                            </svg> Listado de Razones de perdido
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_23" role="tab">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                                                </g>
                                                            </svg> Alta de Razones de perdido
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body" style="padding-bottom:0px;">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="kt_user_edit_tab_13" role="tabpanel">
                                                    <div class="kt-form kt-form--label-right">
                                                        <div class="kt-form__body">
                                                            <div class="kt-section kt-section--first">
                                                                <div class="kt-section__body">
                                                                    <?php 
                                                                    include("funciones/conexion.php");
                                                                    $conexion->query("SET NAMES 'utf8'");
                                                                    $query = "SELECT * FROM razon_perdido WHERE estatus='Activo'";
                                                                    $resultado=$conexion->query($query);
                                                                    while ($row=$resultado->fetch_assoc()) {
                                                                        $datosrazonperdido=$row['id_razon_perdido']."||".$row['label_razon_perdido']."||".$row['estatus'];
                                                                        ?>
                                                                        <div class="kt-section kt-section--first">
                                                                            <div class="kt-timeline-v3">
                                                                                <?php
                                                                                $nombre=$row['label_razon_perdido'];
                                                                                $mostrar='"';
                                                                                if ($row['estatus']=='Activo') {
                                                                                    echo "
                                                                                    <div class='kt-timeline-v3__item kt-timeline-v3__item--success'>
                                                                                    <span class='kt-timeline-v3__item-time' style='font-size: 11px;'></span>
                                                                                    <div class='kt-timeline-v3__item-desc'>
                                                                                    <span class='kt-timeline-v3__item-text'>
                                                                                    $nombre <a href='#' onclick='editarrazonperdido($mostrar$datosrazonperdido$mostrar)' data-toggle='modal' data-target='#editrazonperdido' data-dismiss='modal'><i class='la la-edit'></i></a>
                                                                                    </span><br>
                                                                                    <span class='kt-timeline-v3__item-user-name'>

                                                                                    </span>
                                                                                    </div>
                                                                                    </div>";
                                                                                }else{
                                                                                    echo "
                                                                                    <div class='kt-timeline-v3__item kt-timeline-v3__item--danger'>
                                                                                    <span class='kt-timeline-v3__item-time' style='font-size: 11px;'></span>
                                                                                    <div class='kt-timeline-v3__item-desc'>
                                                                                    <span class='kt-timeline-v3__item-text'>
                                                                                    $nombre <a href='#' onclick='editarrazonperdido($mostrar$datosrazonperdido$mostrar)' data-toggle='modal' data-target='#editrazonperdido' data-dismiss='modal'><i class='la la-edit'></i></a>
                                                                                    </span><br>
                                                                                    <span class='kt-timeline-v3__item-user-name'>

                                                                                    </span>
                                                                                    </div>
                                                                                    </div>";
                                                                                } ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="kt_user_edit_tab_23" role="tabpanel">
                                                    <div class="kt-form kt-form--label-right">
                                                        <div class="kt-form__body">
                                                            <div class="kt-section kt-section--first">
                                                                <div class="kt-section__body">
                                                                    <form action="funciones/addperdido.php" method="POST">
                                                                        <div class="row">
                                                                            <label class="col-xl-3"></label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <h3 class="kt-section__title kt-section__title-sm">Agrega una nueva Razón de perdido</h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Nombre de la razón de perdido</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <input type="text" class="form-control" name="nombre" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-label-brand btn-bold">Guardar</button>
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- editar configuraciones -->
                        <div class="modal fade" id="edittopo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content" style="background-color: transparent;border:none;">
                                    <div class="kt-portlet kt-portlet--tabs">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-toolbar">
                                                <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_18" role="tab">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                                                    <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000"/>
                                                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                                                </g>
                                                            </svg> Edita tu tipo de actividad
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="kt_user_edit_tab_18" role="tabpanel">
                                                    <div class="kt-form kt-form--label-right">
                                                        <div class="kt-form__body">
                                                            <div class="kt-section kt-section--first">
                                                                <div class="kt-section__body">
                                                                    <form action="funciones/updatetipoactividad.php" method="POST">
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-2 col-form-label">Nombre de tipo de actividad</label>
                                                                            <div class="col-10">
                                                                                <input type="text" name="nombre" class="form-control" id="upnombretipoactividad">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">Activar</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                                                                    <label>
                                                                                        <input type="checkbox" name="estatus" id="upestatustipoactividad" value="Activo">
                                                                                        <span></span>
                                                                                    </label>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-xl-3 col-lg-3 col-form-label">¿Sincronizar Actividad?</label>
                                                                            <div class="col-lg-9 col-xl-6">
                                                                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                                                                    <label>
                                                                                        <input type="checkbox" name="sincronizar" id="upsincronizartipoactividad" value="Activo">
                                                                                        <span></span>
                                                                                    </label>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="id_tipo_actividad" id="upidtipoactividad" style="display: none;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-label-brand btn-bold">Guardar</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editrazonperdido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content" style="background-color: transparent;border:none;">
                                    <div class="kt-portlet kt-portlet--tabs">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-toolbar">
                                                <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_18" role="tab">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                                                                    <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000" transform="translate(12.000000, 15.499947) scale(1, -1) translate(-12.000000, -15.499947) "/>
                                                                </g>
                                                            </svg> Editar Razón de Perdido
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="kt_user_edit_tab_18" role="tabpanel">
                                                    <div class="kt-form kt-form--label-right">
                                                        <div class="kt-form__body">
                                                            <div class="kt-section kt-section--first">
                                                                <div class="kt-section__body">
                                                                    <form action="funciones/updaterazonperdido.php" method="POST">
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-2 col-form-label">Nombre de la Razón de Perdido</label>
                                                                            <div class="col-10">
                                                                                <input type="text" name="nombre" class="form-control" id="uprazonperdido">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-2 col-form-label">Eliminar</label>
                                                                            <div class="col-10">
                                                                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                                                                    <label>
                                                                                        <input type="checkbox" name="estatus" id="upestatusrazonperdido" value="Activo">
                                                                                        <span></span>
                                                                                    </label>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" name="id_razon_perdido" id="upidrazonperdido" style="display: none;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-label-brand btn-bold">Guardar</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--begin::Page Scripts(used by this page) -->
                        <script src="assets/js/pages/crud/forms/widgets/select2.js" type="text/javascript"></script>
                        <script>
                            function editartipoactividad(datos){
                                d=datos.split('||');
                                $('#upnombretipoactividad').val(d[1]);
                                $('#upestatus').val(d[2]);
                                $('#upidtipoactividad').val(d[0]);
                                if (d[2]=='Activo') {
                                    $("#upestatustipoactividad").prop("checked", true);
                                }else{
                                    $("#upestatustipoactividad").prop("checked", false);
                                }
                                if (d[3]=='Activo') {
                                    $("#upsincronizartipoactividad").prop("checked", true);
                                }else{
                                    $("#upsincronizartipoactividad").prop("checked", false);
                                }
                            }
                        </script>
                        <script>
                            function editarrazonperdido(datos){
                                d=datos.split('||');
                                $('#upidrazonperdido').val(d[0]);
                                $('#uprazonperdido').val(d[1]);
                                if (d[2]=='Activo') {
                                    $("#upestatusrazonperdido").prop("checked", false);
                                }else{
                                    $("#upestatusrazonperdido").prop("checked", true);
                                    alert("test");
                                }
                            }
                        </script>
                        <script>
                            function formadd(){
                                if(event.target.value=="new"){
                                    $("#form1").show()
                                    $("#form2").hide()
                                }else{
                                    $("#form2").show()
                                    $("#form1").hide()
                                }
                            }
                        </script>

