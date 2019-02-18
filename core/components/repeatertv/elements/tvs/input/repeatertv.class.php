<?php
class RepeaterTvInputRender extends modTemplateVarInputRender {

    /**
     * Get lexicon topics for this TV.
     * @return array
     */
    public function getLexiconTopics() {
        return array('repeatertv:default');
    }

    /**
     * Process Input Render.
     *
     * @param string $value
     * @param array $params
     *
     * @return void
     */
    public function process($value, array $params = array())
    {
        $properties = array_merge(
            $params,
            is_array($this->tv->_properties) ? $this->tv->_properties : array()
        );
        $fieldNames = [];
        if ($properties['field_config'] && is_array(json_decode($properties['field_config'], true))) {
            $fieldConfig = json_decode($properties['field_config'], true);
            foreach ($fieldConfig as $field) {
                $fieldNames[$field['key']] = $field['caption'];
            }
        }

        $decodedValues = $this->modx->fromJSON($value);

        $this->setPlaceholder('values', $decodedValues);
        $this->setPlaceholder('properties', $properties);
        $this->setPlaceholder('fieldNames', $fieldNames);
        $this->setPlaceholder(
            'core_path',
            $this->modx->getOption(
                'repeatertv.core_path',
                null,
                $this->modx->getOption('core_path') . 'components/repeatertv/'
            )
        );
    }

    /**
     * Returns the template path to load.
     * @return string
     */
    public function getTemplate()
    {
        $corePath = $this->modx->getOption(
            'repeatertv.core_path',
            null,
            $this->modx->getOption('core_path') . 'components/repeatertv/'
        );
        return $corePath . 'elements/tvs/input/repeatertv-wrapper.tpl';
    }
}
return 'RepeaterTvInputRender';
