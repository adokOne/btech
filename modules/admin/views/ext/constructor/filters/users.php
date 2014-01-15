<?php if(false):?><script><?php endif; ?>
    filterPanel = Ext.create('Ext.form.Panel', {
        bodyPadding: 5,
        border:true,
        width: 350,
        url: '/admin/<?php echo $class?>/save',
        height: 100,
        split: true,
        collapsible: true,
        title: '<?php echo $admin_lang["filters"]?>',
        minHeight: 200,
        layout: 'anchor',
        region: 'south',
        defaults: {
            anchor: '100%'
        },
        items[
        ]
    });
<?php if(false):?></script><?php endif; ?>