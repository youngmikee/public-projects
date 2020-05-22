<?php
/* Smarty version 3.1.33, created on 2019-08-21 12:45:04
  from '/var/www/html/admin/themes/default/template/controllers/modules/readmore-header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5d20b03c98a6_00437372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '802d235a49b20eca0b961bb7ff6e6068bebc58b4' => 
    array (
      0 => '/var/www/html/admin/themes/default/template/controllers/modules/readmore-header.tpl',
      1 => 1549984772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5d20b03c98a6_00437372 (Smarty_Internal_Template $_smarty_tpl) {
?><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 class="modal-title">
	<div class="module_name">
		<a href="#" class="icon icon-chevron-left" onclick="openModulesList()"></a>
			<?php echo $_smarty_tpl->tpl_vars['displayName']->value;?>

			<small class="text-muted"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'v'),$_smarty_tpl ) );
echo $_smarty_tpl->tpl_vars['version']->value;?>
 - <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'by'),$_smarty_tpl ) );?>
 <?php echo $_smarty_tpl->tpl_vars['author']->value;?>
</small>
	</div>
</h3>
<?php }
}
