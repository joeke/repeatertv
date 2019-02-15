var RepeaterTv = function () {
    "use strict";
    return {
        tvId: null,
        init: function () {
            var allTvs = document.querySelectorAll('.repeatertv-wrapper');
            for (var i = 0; i < allTvs.length; i++) {
                this.initSortable(allTvs[i]);
            }
        },
        initSortable: function (element) {
            Sortable.create(element, {
                animation: 250,
                ghostClass: 'repeatertv-item-placeholder',
                onUpdate: function (event) {
                    var repeaterId = event.from.id;
                    var form = document.getElementById(repeaterId + '-form');
                    RepeaterTv.updateItems(form);
                }
            });
        },
        updateItems: function (form) {
            var itemsObj = [];
            var tvId = form.dataset.tvId;
            var items = form.querySelectorAll('.repeatertv-item');
            for (var i = 0; i < items.length; i++) {
                console.log(items[i]);
                var subItems = items[i].getElementsByClassName('item-value');
                var subItemObj = {};
                for (var j = 0; j < subItems.length; j++) {
                    subItemObj[subItems[j].dataset.key] = subItems[j]['value'];
                }
                itemsObj.push(subItemObj);
            }
            this.setTVValue(tvId, itemsObj);
        },
        addItem: function (event) {
            console.log('addItem');
        },
        removeItem: function () {

        },
        /* Save wrapper items as json in hidden TV input field */
        setTVValue: function (tvId, data) {
            Ext.get('tv' + tvId).set({
                value: Ext.encode(data)
            });
        },
        /* Trigger the modx media browser */
        openMediaBrowser: function () {
            var fld = this.closest('.repeatertv-item');
            var fileBrowser = MODx.load({
                xtype: 'modx-browser',
                id: Ext.id(),
                multiple: true,
                listeners: {
                    select: this.selectFile(fld)
                },
                hideFiles: true,
                source: MODx.config['default_media_source']
            });
            fileBrowser.setSource(MODx.config['default_media_source']);
            fileBrowser.show();
        },
        selectFile: function (fld) {

        }
    };
}();

Ext.onReady(function () {
    RepeaterTv.init();

    document.querySelector('.repeatertv-btn[data-item-add]').onclick = function (event) {
        RepeaterTv.addItem(event);
    };
    document.querySelector('.repeatertv-form').addEventListener('change', function (event) {
        RepeaterTv.updateItems(event.currentTarget);
    });
}, RepeaterTv);