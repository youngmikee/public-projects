<?php
/* Smarty version 3.1.33, created on 2019-08-21 12:45:05
  from '/var/www/html/admin/themes/default/template/controllers/request_sql/list_action_export.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5d20b158bda8_57995533',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6de9898374b494be211efec69764f5bb3812d1d' => 
    array (
      0 => '/var/www/html/admin/themes/default/template/controllers/request_sql/list_action_export.tpl',
      1 => 1549984772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5d20b158bda8_57995533 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['href']->value,'html','UTF-8' ));?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" class="btn btn-default">
	<i class="icon-cloud-upload"></i> <?php echo $_smarty_tpl->tpl_vars['action']->value;?>

</a><?php }
}
