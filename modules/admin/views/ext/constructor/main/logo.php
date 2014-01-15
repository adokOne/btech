<?php if(false):?><script><?php endif; ?>
	var logo_panel = {
	        id:'logopanel',
	        height: 350,
	        split: false,
	        collapsible: false,
	        layout: 'fit',
            items:[{
                name:'has_logo',
                xtype:"hidden",
                value:0
            }],
	        html:'<img heigh="320" width= "335" id="logo" src="'+Ext.BLANK_IMAGE+'" />',
            tbar:[{
                xtype: 'fileuploadfield',
                buttonOnly: true,
                name: 'logo',

                buttonText: '<?php echo $admin_lang["add_photo"]?>',
                buttonCfg   : {
                    iconCls : 'upload-icon'
                },
                handler: function () {
                    console.log("wefewfwf")
                },
                listeners: {
                    'change': function(fb, v){
                        console.log(fb)
                        editPanel.form.findField('has_logo').setValue(1);
                        editPanel.form.submit();
                    }
                }
            }]
	}

<?php if(false):?></script><?php endif; ?>