<?php
// -----
// Part of the Encrypted Master Password plugin, provided by lat9@vinosdefrutastropicales.com
//
// Copyright (C) 2016, Vinos de Frutas Tropicales
//
// @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
//              
$autoLoadConfig[200][] = array ('autoType' => 'class',
                                'loadFile' => 'observers/class.emp_admin_customers_observer.php',
                                'classPath' => DIR_WS_CLASSES);
$autoLoadConfig[200][] = array ('autoType' => 'classInstantiate',
                                'className' => 'emp_admin_customers_observer',
                                'objectName' => 'empObserver');