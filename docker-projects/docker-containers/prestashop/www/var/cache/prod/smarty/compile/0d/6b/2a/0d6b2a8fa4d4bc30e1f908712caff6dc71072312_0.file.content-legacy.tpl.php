<?php
/* Smarty version 3.1.33, created on 2019-08-21 12:44:59
  from '/var/www/html/admin/themes/default/template/content-legacy.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5d20abeb90d1_05652309',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d6b2a8fa4d4bc30e1f908712caff6dc71072312' => 
    array (
      0 => '/var/www/html/admin/themes/default/template/content-legacy.tpl',
      1 => 1549984772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5d20abeb90d1_05652309 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
