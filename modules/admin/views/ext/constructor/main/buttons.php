<?php if(false):?><script><?php endif; ?>
		{
            text: '<?php echo $admin_lang["add_row"]?>',
            iconCls: 'add',
            handler : function() {
                rowEditing.cancelEdit();
                var obj   = {};
                var value;
                var field
                for(i in <?php echo ucfirst($class)?>.getFields()){ 
                    field = <?php echo ucfirst($class)?>.getFields()[i]
                    switch (field.type.type) {
                        case "int":    value = 0;  break;
                        case "date":   value = new Date();  break;
                        case "string": value = "<?php echo $admin_lang['enter_data']?>";  break;
                        default: value = "";
                            
                    }
                    obj[field.name] = value ;
                }
                var r = Ext.create('<?php echo ucfirst($class)?>',obj);
                store.insert(0, r);
                rowEditing.startEdit(0, 0);
            }
        }, {
            itemId: 'remove-<?php echo ucfirst($class)?>',
            text: '<?php echo $admin_lang["delet_row"]?>',
            iconCls: 'remove',
            handler: function() {
                var sm = itemsGrid.getSelectionModel();
                rowEditing.cancelEdit();
                store.remove(sm.getSelection());
                store.destroy()
                if (store.getCount() > 0) {
                    sm.select(0);
                }
            },
            disabled: true
        }

<?php if(false):?></script><?php endif; ?>