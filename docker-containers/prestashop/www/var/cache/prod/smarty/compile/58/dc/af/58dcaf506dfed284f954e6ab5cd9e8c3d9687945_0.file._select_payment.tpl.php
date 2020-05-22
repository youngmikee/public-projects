<?php
/* Smarty version 3.1.33, created on 2019-08-21 12:45:03
  from '/var/www/html/admin/themes/default/template/controllers/orders/_select_payment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5d20af6af674_45946060',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58dcaf506dfed284f954e6ab5cd9e8c3d9687945' => 
    array (
      0 => '/var/www/html/admin/themes/default/template/controllers/orders/_select_payment.tpl',
      1 => 1549984772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5d20af6af674_45946060 (Smarty_Internal_Template $_smarty_tpl) {
?><select name="payment_module_name" id="payment_module_name">
  <?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payment_modules']->value, 'module');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['module']->value) {
?>
      <option value="<?php echo $_smarty_tpl->tpl_vars['module']->value->name;?>
" <?php if (isset($_POST['payment_module_name']) && $_smarty_tpl->tpl_vars['module']->value->name == $_POST['payment_module_name']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['module']->value->displayName;?>
</option>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <?php } else { ?>
      <option value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Back office order','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Back office order','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</option>
  <?php }?>
</select>
<?php }
}
