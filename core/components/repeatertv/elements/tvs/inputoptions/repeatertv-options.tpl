<div id="tv-input-properties-form{$tv|default}"></div>
{literal}
<script type="text/javascript">
    // <![CDATA[
    var params = {
        {/literal}{foreach from=$params key=k item=v name='p'}
        '{$k}': '{$v|escape:"javascript"}'{if NOT $smarty.foreach.p.last},{/if}
        {/foreach}{literal}
    };
    var oc = {
        'change': {
            fn: function () {
                Ext.getCmp('modx-panel-tv').markDirty();
            }, scope: this
        }
    };

    MODx.load({
        xtype: 'panel',
        layout: 'form',
        autoHeight: true,
        cls: 'form-with-labels',
        labelAlign: 'top',
        border: false,
        items: [{
            xtype: 'textarea',
            fieldLabel: _('repeatertv.inopt_field_config'),
            name: 'inopt_field_config',
            id: 'inopt_field_config{/literal}{$tv}{literal}',
            value: params['field_config'] || {/literal}{$default_config|@json_encode}{literal},
            anchor: '100%',
            height: 250,
            listeners: oc
        }, {
            xtype: MODx.expandHelp ? 'label' : 'hidden',
            forId: 'inopt_field_config{/literal}{$tv}{literal}',
            html: _('repeatertv.inopt_field_config_desc'),
            cls: 'desc-under'
        }],
        renderTo: 'tv-input-properties-form{/literal}{$tv|default}{literal}'
    });
    // ]]>
</script>
{/literal}
