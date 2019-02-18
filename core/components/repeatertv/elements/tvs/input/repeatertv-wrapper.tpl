<div class="repeatertv-toolbar">
    <button type="button" class="repeatertv-btn" data-item-add="{$tv->id}">Add</button>
</div>
<form class="repeatertv-form" id="repeatertv-{$tv->id}-form" data-tv-id="{$tv->id}">
    <div class="repeatertv-wrapper columns-3" id="repeatertv-{$tv->id}">
        {foreach from=$values item=item key=key}
            {include file='file:'|cat:$core_path|cat:'elements/tvs/input/repeatertv-item.tpl'}
        {/foreach}
    </div>
</form>
<input type="hidden" class="repeatertv-value" id="tv{$tv->id}" name="tv{$tv->id}" value="{$tv->value|escape}">
