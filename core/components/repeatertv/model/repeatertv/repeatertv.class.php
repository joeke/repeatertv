<?php
class RepeaterTv
{
    public $modx;
    public $namespace = 'repeatertv';
    public $config = array();

    public function __construct(modX &$modx, array $config = array())
    {
        $this->modx = &$modx;

        $corePath = $modx->getOption(
            'repeatertv.core_path',
            null,
            $modx->getOption('core_path') . 'components/repeatertv/'
        );
        $assetsUrl  = $this->modx->getOption(
            'repeatertv.assets_url',
            $config,
            $this->modx->getOption('assets_url') . 'components/repeatertv/'
        );
        $assetsPath = $this->modx->getOption(
            'repeatertv.assets_path',
            $config,
            $this->modx->getOption('assets_path') . 'components/repeatertv/'
        );

        $this->config = array_merge([
             'namespace' => $this->namespace,
             'core_path' => $corePath,
             'model_path' => $corePath . 'model/',
             'chunks_path' => $corePath . 'elements/chunks/',
             'snippets_path' => $corePath . 'elements/snippets/',
             'templates_path' => $corePath . 'templates/',
             'assets_path' => $assetsPath,
             'assets_url' => $assetsUrl,
             'js_url' => $assetsUrl . 'mgr/js/',
             'css_url' => $assetsUrl . 'mgr/css/',
             'connector_url' => $assetsUrl . 'connector.php'
         ], $config);

        $this->modx->addPackage('repeatertv', $this->config['model_path']);
        $this->modx->lexicon->load('repeatertv:default');
    }
}