
<?php if(false):?><script><?php endif; ?>
<?php include "$dir/main/base_functions.php";?>
<?php if($use_filter) include "$dir/filters/$class.php";?>
<?php if($use_form)   include "$dir/forms/$class.php";?>
<?php if($use_logo)   include "$dir/main/logo.php";?>
<?php if($use_map)    include "$dir/main/maps.php";?>

Ext.require([
    'Ext.grid.*',
    'Ext.data.*',
    'Ext.util.*',
    'Ext.state.*',
    'Ext.form.*'
]);

Ext.onReady(function(){

    Ext.define('<?php echo ucfirst($class)?>', {
        extend: 'Ext.data.Model',
        fields: [<?php echo $record?>]
    });

    var store = Ext.create('Ext.data.Store', {
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
    });

    var paggingBar = Ext.create('Ext.PagingToolbar', {
            store: this.store,
            displayInfo: true,
            displayMsg: '<?php echo $admin_lang["view_items"]?>',
            emptyMsg: "<?php echo $admin_lang['nothing_to_show']?>",
    });

    itemsGrid = Ext.create('Ext.grid.Panel', {
        store: store,
        region:'center',
        selType: 'checkboxmodel',
        columns: [<?php include $dir."/grids/".$class.EXT; ?>],
        tbar: [<?php include !$buttons ? $dir."/main/buttons".EXT : $buttons ?>],
        bbar:[paggingBar],
        plugins: [rowEditing],
        listeners: {
            'selectionchange': function(view, records) {
                itemsGrid.down('#remove-<?php echo ucfirst($class)?>').setDisabled(!records.length);
            }
        }
    });

    editPanel = Ext.create('Ext.form.Panel', {
        bodyPadding: 5,
        border:true,
        width: 350,
        fileUpload: true,
        collapsible: true,
        disabled:true,
        collapsed:true,
        title:'<?php echo $admin_lang["info"]?>',
        url: '/admin/<?php echo $class?>/item_save',

        region: 'east',

        items: [
            {
                xtype:'hidden',
                name:'id'
            },
        <?php if($use_logo):?>
            logo_panel,
        <?php endif;?>
        <?php include "$dir/forms/$class.php"; ?>
        ],
        buttons: [{
            text: '<?php echo $admin_lang["save"]?>',
            formBind: true,
            disabled: true,
            handler: function() {
                var form = this.up('form').getForm();
                if (form.isValid()) {
                    form.submit({
                        success: function(form, action) {
                           Ext.Msg.alert('Success', action.result.msg);
                        },
                        failure: function(form, action) {
                            Ext.Msg.alert('Failed', action.result.msg);
                        }
                    });
                }
            }
        }],
    });

    itemsGrid.on('edit', function( e)         {
        store.update();
        store.reload();
    });

    itemsGrid.on('selectionchange', function(grid,item,opts){
        editPanel.enable()
        var data = item[0].data;
        for(i in data){
            var val   = data[i]
            var field = editPanel.form.findField(i)
            if(field != null)
                field.setValue(val)
        } 
        
    });



});


<?php if(false):?></script><?php endif; ?>
