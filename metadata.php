<?php
/**
 * @TODO LICENCE HERE
 */

/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = array(
    'id'          => 'fkcustom6',
    'title'       => array(
        'de' => 'OXID6 fk custom Modul',
        'en' => 'OXID6 fk custom module',
    ),
    'description' => array(
        'de' => '<h2>OXID6 Modul für angepasste Funktionen</h2>',
        'en' => '<h2>OXID6 module for customised functions</h2>',
    ),
    //'thumbnail'   => 'out/pictures/linslin-org-logo.png',
    'version'     => '0.0.1',
    'author'      => 'floko',
    'url'         => '',
    'email'       => 'florian.kogel@stedman.eu',
    'extend'      => array(        
        \OxidEsales\Eshop\Application\Model\User::class => \floko\fkcustom6\Model\User::class,
    ),
    'controllers'       => array(
        //'linslinexamplemodulemain' => \floko\fkcustom6\Controller\Admin\MainController::class,
    ),
    'files'       => array(),
    'templates'   => array(
        //'main.tpl' => 'floko/fkcustom6/views/admin/main.tpl'
    ),
    'blocks'      => array(),
    'settings'    => array(),
    'events'      => array(),
);
