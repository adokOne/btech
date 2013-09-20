<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo Kohana::config("core.site_name")?> Admin</title>
    <script type="text/javascript" src="/ext/ext-all.js"></script>
    <script type="text/javascript" src="/ext/packages/ext-theme-neptune/build/ext-theme-neptune.js"></script>
    <link rel="stylesheet" type="text/css" href="/ext/resources/css/layout-browser.css" media="all">
    <link rel="stylesheet" type="text/css" href="/ext/resources/css/ext-all-neptune-debug.css" media="all">
    <link rel="stylesheet" type="text/css" href="/ext/resources/ext-theme-neptune/ext-theme-neptune-all.css" media="all">
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon">
 <script>
Ext.Loader.setConfig({enabled: true});

Ext.Loader.setPath('Ext.ux', '/ext/ux');

Ext.require([
    'Ext.tip.QuickTipManager',
    'Ext.container.Viewport',
    'Ext.layout.*',
    'Ext.form.Panel',
    'Ext.form.Label',
    'Ext.grid.*',
    'Ext.data.*',
    'Ext.tree.*',
    'Ext.selection.*',
    'Ext.tab.Panel',
    'Ext.panel.Panel',

    'Ext.ux.layout.Center'  ,

]);
logout = function(){
    window.location.href = "/users/logout"
}

Ext.onReady(function(){
 
    Ext.tip.QuickTipManager.init();

    var detailEl;

    var right_html = '<h1> <?php echo Kohana::config("core.site_name")?> Admin <span style="float: right;font-size: 16px"><?php echo $admin_lang["login_user"] . ": <b>$user->username</b>"; ?>&nbsp<a onclick="logout()" style="text-decoration: none;" title="<?php echo $admin_lang["exit"] ?>" href="#">&nbsp;<img style="padding-top: 15px;" class="x-tool-img x-tool-close" /></a></span></h1>'
    

     contentPanel = new Ext.panel.Panel({
        id:'content',
        border: false,
        region: 'center', 
        layout: 'fit',
        autoScroll: true,
        loader: {
            //autoLoad:true,
            scripts:true,
            url :'/admin/settings'
        }
    });     

    var accordion = new Ext.panel.Panel({
        title: '<?php echo $admin_lang["modules"] ?>',
        layout:'accordion',
        region:'north',
        split: false,
        height: '100%',
        minSize: 150,
        items: [
            <?php foreach( ext::render_modules($modules)  as $id=>$module):?>
                Ext.create('Ext.tree.Panel', {
                        id: 'tree-panel_<?php echo $id?>',
                        title: '<?php echo $module["text"]?>',
                        split: false,
                        height: '100%',
                        minSize: 150,
                        rootVisible: false,
                        autoScroll: true,
                        lines: false,
                        listeners: {
                            itemclick: function(view,record) { 
                                contentPanel.loader.url =  "/admin/"+record.data.id;
                                contentPanel.loader.load();
                            }
                        },
                        store: Ext.create('Ext.data.TreeStore', {
                            root: {
                                children: [
                                  <?php if(isset($module["children"]))foreach($module["children"] as $ch): ?>
                                {
                                    leaf:true,
                                    id:'<?php echo $ch["id"]?>',
                                    iconCls:'<?php echo $ch["cls"]?>',
                                    text:'<?php echo $ch["text"]?>'
                                },
                                <?php endforeach;?>
                                ]
                            }
                        })
                    }),
            <?php endforeach;?>
        ]

    });

    Ext.create('Ext.Viewport', {
        layout: 'border',
        title: '<?php echo Kohana::config("core.site_name")?> Admin',
        items: [{
            xtype: 'box',
            id: 'header',
            region: 'north',
            html: right_html,

        },{
            layout: 'border',
            id: 'layout-browser',
            region:'west',
            border: false,
            split:true,
            margins: '2 0 5 5',
            width: 290,
            minSize: 100,
            collapsible:false,
            maxSize: 500,
            items: [accordion]
        }, 
            contentPanel
        ],
        renderTo: Ext.getBody()
    });
});



   </script>
</head>
<body></body>
</html>
