<?php
$corePath = $modx->getOption('repeatertv.core_path', null, $modx->getOption('core_path') . 'components/repeatertv/');
switch ($modx->event->name) {
    case 'OnTVInputRenderList':
        $modx->event->output($corePath . 'elements/tvs/input/');
        break;
    case 'OnTVInputPropertiesList':
        $modx->event->output($corePath . 'elements/tvs/inputoptions/');
        break;
    case 'OnManagerPageBeforeRender':
        $assetsUrl = $modx->getOption(
            'repeatertv.assets_url',
            null,
            $modx->getOption('assets_url') . 'components/repeatertv/'
        );
        $modx->controller->addLexiconTopic('repeatertv:default');
        $modx->controller->addCss($assetsUrl . 'css/repeatertv.css');
        $modx->controller->addJavascript($assetsUrl . 'js/dist/repeatertv.min.js');
        break;
}