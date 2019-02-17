<?php
/**
 * RepeaterTV Connector
 *
 * @package repeatertv
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('repeatertv.core_path', null, $modx->getOption('core_path') . 'components/repeatertv/');

$repeatertv = $modx->getService(
    'repeatertv',
    'RepeaterTv',
    $corePath . 'model/repeatertv/',
    array(
        'core_path' => $corePath
    )
);

$modx->request->handleRequest(
    array(
        'processors_path' => $repeatertv->config['processors_path'],
        'location' => '',
    )
);