
<?php if(false):?><script><?php endif; ?>
Ext.require([
    'Ext.grid.*',
    'Ext.data.*',
    'Ext.util.*',
    'Ext.state.*',
    'Ext.form.*'
]);

Ext.onReady(function(){
	/*Создание модели*/
    Ext.define('<?php echo ucfirst($class)?>', {
        extend: 'Ext.data.Model',
        fields: [<?php echo $record?>]
    });
    /* Создание стора*/
    store = Ext.create('Ext.data.Store', {
        autoDestroy: true,
        autoLoad:true,
        model: '<?php echo ucfirst($class)?>',
        autosync: true,
	    proxy: {
	        type: 'ajax',
            actionMethods: {
                      read: 'POST'
            },
            api: {
                create: '/admin/<?php echo $class?>/list_items',
                read: '/admin/<?php echo $class?>/list_items',
                update: '/admin/<?php echo $class?>/save',
                destroy: '/admin/<?php echo $class?>/delete'
            },
	        url: '/admin/<?php echo $class?>/list_items',
	        reader:{
	            root: 'items',
	            totalProperty: 'total',
	            id: 'id'
	        }
	    },
        remoteSort : true,
        sorters: [{
            property:  'id',
            direction: 'ASC'
        }]
    });

    
	var rowEditing = Ext.create('Ext.grid.plugin.RowEditing', {
        clicksToMoveEditor: 1,
        autoCancel: false,
        //errorSummary:false,
    });

    // create the grid and specify what field you want
    // to use for the editor at each column.
    itemsGrid = Ext.create('Ext.grid.Panel', {
        store: store,
        region:'center',
        selType: 'checkboxmodel',
        frame: false,
        columns: [<?php include $dir."/grids/".$class.EXT; ?>],

        
        tbar: [<?php include !$buttons ? $dir."/main/buttons".EXT : $buttons ?>],
        plugins: [rowEditing],
        listeners: {
            'selectionchange': function(view, records) {
                itemsGrid.down('#remove-<?php echo ucfirst($class)?>').setDisabled(!records.length);
            }
        }
    });

        itemsGrid.on('edit', function( e)         {
            store.update();
            store.reload();
        });


});


<?php if(false):?></script><?php endif; ?>