<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
	
	<title><?php echo Kohana::config("core.site_name")?> Admin</title>
	<script type="text/javascript" src="/ext/ext-all.js"></script>
	<script type="text/javascript" src="/ext/packages/ext-theme-neptune/build/ext-theme-neptune.js"></script>
	<link type="image/x-icon" href="/favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" type="text/css" href="/ext/resources/css/ext-all-neptune-debug.css" media="all">
	<link rel="stylesheet" type="text/css" href="/ext/resources/ext-theme-neptune/ext-theme-neptune-all.css" media="all">
	<style type="text/css"> 
		#wrapper	{width: 350px;height: 50px;margin: 20% auto 0 auto;}
		html {height: 100%;}
		/*#login {background:url(/img/logo.png) no-repeat 10px 5px;width:346px;height:120px;}*/
	</style>
	<script type="text/javascript">
		Ext.require([
		    'Ext.form.*',
		]);

		Ext.onReady(function() {

		    var formPanel = Ext.widget('form', {
		        renderTo: 'content',
		        frame: true,
		        width: 350,
		        id: 'login',
		        bodyPadding: 10,
		        bodyBorder: true,
		        title: '<?php echo $admin_lang["login_text"]?>',

		        defaults: {
		            anchor: '100%'
		        },
		        fieldDefaults: {
		            labelWidth: 110,
		            labelAlign: 'left',
		            msgTarget: 'none',
		        },

		        items: [{
		            xtype: 'textfield',
		            name: 'username',
		            fieldLabel: '<?php echo $admin_lang["username"]?>',
		            allowBlank: false,
		            minLength: 5
		        },{
		            xtype: 'textfield',
		            name: 'password',
		            fieldLabel: '<?php echo $admin_lang["password"]?>',
		            inputType: 'password',
		            style: 'margin-top:15px',
		            allowBlank: false,
		            minLength: 5
		        }
				],

		        dockedItems: [{
		            cls: Ext.baseCSSPrefix + 'dd-drop-ok',
		            xtype: 'container',
		            dock: 'bottom',
		            layout: {
		                type: 'hbox',
		                align: 'middle'
		            },
		            padding: '10 10 5',

		            items: [{
		                xtype: 'button',
		                text: '<?php echo $admin_lang["submit"]?>',
		                width: 140,
		                handler: function() {
		                    var form = this.up('form').getForm();
		                    if (form.isValid()) {
			                    form.submit({
			                        clientValidation: true,
			                        url: '/admin/login',
			                        waitMsg:'<?php echo $admin_lang["waiting_text"]?>',
			                        success: function(form, action) {
			                           window.location.reload()
			                        },
			                        failure: function(form, action) {
			                        	Ext.Msg.alert('<?php echo $admin_lang["error"]?>', action.result.text);
			                          	form.reset()
			                        }
			                    });
		                    }
		                }
		            }]
		        }]
		    });

		});
	</script>
	</head>
	<body>
		<div id="wrapper">
				<div id="content"></div>	
		</div>
	</body>
</html>