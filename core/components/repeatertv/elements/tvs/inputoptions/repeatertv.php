<?php
$corePath = $modx->getOption(
    'repeatertv.core_path',
    null,
    $modx->getOption('core_path') . 'components/repeatertv/'
);
$defaultConfig = array(
    array('key' => 'my-field', 'caption' => 'My Field', 'type' => 'text'),
    array('key' => 'my-field-2', 'caption' => 'My Field 2', 'type' => 'image'),
);

$modx->smarty->assign('default_config', json_encode($defaultConfig, JSON_PRETTY_PRINT));

return $modx->smarty->fetch($corePath . 'elements/tvs/inputoptions/repeatertv-options.tpl');