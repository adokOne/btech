<?php if(false):?><script><?php endif; ?>
        {
            hidden: true,
            dataIndex: 'id'
        },
        {
            header: '<?php echo $lang["username"]?>',
            dataIndex: 'username',
            flex: 1,
            width: 160,
            editor: {
                allowBlank: false
            }
        }, {
            header: '<?php echo $lang["email"]?>',
            dataIndex: 'email',
            width: 160,
            editor: {
                allowBlank: false,
            }
        }, {
            xtype: 'datecolumn',
            header: '<?php echo $lang["last_login"]?>',
            dataIndex: 'last_login',
            width: 160,
            format: 'd.m.Y',
        }, {
            xtype: 'numbercolumn',
            header: '<?php echo $lang["logins"]?>',
            dataIndex: 'logins',
            format: '0',
            width: 160,
        }, {
            xtype: 'checkcolumn',
            header: '<?php echo $lang["active"]?>',
            dataIndex: 'active',
            width: 60,
            editor: {
                xtype: 'checkbox',
                cls: 'x-grid-checkheader-editor'
            }
        }
<?php if(false):?></script><?php endif; ?>