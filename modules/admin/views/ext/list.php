<script type="text/javascript">

<?php include "$dir/main/base.php";?>

module_<?php echo $class ?> = new Ext.panel.Panel({
    layout: 'border',
    defaults: {
        split: true
    },
    items:[
    <?php if ($use_tree):?>
        categoriesTree,
    <?php endif ?> 
    <?php if ($use_filter):?>
        filterPanel,
    <?php endif ?> 
        itemsGrid
    <?php if ($use_form):?>
        ,editPanel
    <?php endif?>
    ]
});

 

var main_panel = Ext.getCmp('content');
main_panel.items.each(function(item){main_panel.remove(item);}, main_panel.items);

main_panel.add({
    title: '<?php echo $admin_lang["upr"] ?>',
    layout:'fit',
    iconCls:'ico_moderation',
    items:[module_<?php echo $class ?>]
});

main_panel.setActive(0);

</script>
