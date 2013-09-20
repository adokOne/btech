<script type="text/javascript">

<?php include "$dir/main/base.php";?>

module_<?php echo $class ?> = {
        init: function() {
            return new Ext.panel.Panel({
                border:false,
                layout:'border',
                items:[
                    <?php if ($use_tree):?>
                        categoriesTree,
                    <?php endif ?> 
                        itemsGrid
                    <?php if ($use_form):?>
                        ,editPanel
                    <?php endif?>
                ]
            });

        }
    };

 

var mainTabPanel = Ext.getCmp('content');
mainTabPanel.items.each(function(item){mainTabPanel.remove(item);}, mainTabPanel.items);

mainTabPanel.add({
    title: '<?php echo $admin_lang["upr"] ?>',
    layout:'fit',
    iconCls:'ico_moderation',
    items:[module_<?php echo $class ?>.init()]
});

mainTabPanel.setActive(0);

</script>
