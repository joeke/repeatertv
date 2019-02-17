<div class="repeatertv-item" id="repeatertv-item-{$key}" data-item-template>
    <div class="repeatertv-item-inner">
        {foreach from=$item item=subItemValue key=subItemKey}
            {if !empty({$fieldNames["$subItemKey"]})}
            <div class="form-group">
                <label for="repeatertv-{$tv->id}-{$key}-{$subItemKey}">{$fieldNames["$subItemKey"]}</label>
                <input id="repeatertv-{$tv->id}-{$key}-{$subItemKey}" class="item-value" type="text" name="repeatertv-{$tv->id}[{$key}][{$subItemKey}]" data-key="{$subItemKey}" value="{$subItemValue}"/>
            </div>
            {/if}
        {/foreach}
    </div>
</div>