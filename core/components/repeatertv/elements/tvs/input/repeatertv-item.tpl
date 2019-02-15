<div class="repeatertv-item" id="repeatertv-item-{$key}" data-item-template>
    <div class="repeatertv-item-inner">
        {foreach from=$item item=subItemValue key=subItemKey}
            {if !empty({$fieldNames["$subItemKey"]})}
            <div class="form-group">
                <label for="field-{$key}-{$subItemKey}">{$fieldNames["$subItemKey"]}</label>
                <input id="field-{$key}-{$subItemKey}" class="item-value" type="text" name="field[{$key}][{$subItemKey}]" data-key="{$subItemKey}" value="{$subItemValue}"/>
            </div>
            {/if}
        {/foreach}
    </div>
</div>