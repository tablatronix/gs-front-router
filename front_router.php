<?php

namespace FrontRouterPlugin;

call_user_func(function() {

// thisfile
  $thisfile = basename(__FILE__, '.php');

// language
  i18n_merge($thisfile) || i18n_merge($thisfile, 'en_US');

// requires
  require_once(GSPLUGINPATH . $thisfile . '/php/functions.php');
  require_once(GSPLUGINPATH . $thisfile . '/php/constants.php');
  require_once(GSPLUGINPATH . $thisfile . '/php/router.class.php');
  require_once(GSPLUGINPATH . $thisfile . '/php/api.php');

// register plugin
  call_user_func_array('register_plugin', array(
    'id'      => ID,
    'name'    => i18n_r('PLUGIN_NAME'),
    'version' => '0.3',
    'author'  => 'Lawrence Okoth-Odida',
    'url'     => 'https://github.com/lokothodida',
    'desc'    => i18n_r('PLUGIN_DESC'),
    'tab'     => 'plugins',
    'admin'   => 'FrontRouterPlugin\admin'
  ));

// activate actions/filters
  // front-end
  // route execution
  add_action('index-post-dataindex',  'FrontRouterPlugin\executeRoutes');

  // back-end
  // sidebar link
  add_action('plugins-sidebar', 'createSideMenu' , array(ID, i18n_r('MANAGE_ROUTES')));

});