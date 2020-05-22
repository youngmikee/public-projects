<?php
/* Smarty version 3.1.33, created on 2019-08-21 12:45:10
  from '/var/www/html/themes/classic/templates/errors/restricted-country.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5d20b6ee78e3_22815845',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d32c0290e6cf857d0b58a4b3275948431f7b7f5' => 
    array (
      0 => '/var/www/html/themes/classic/templates/errors/restricted-country.tpl',
      1 => 1549984772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5d20b6ee78e3_22815845 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11626037815d5d20b6edcd89_41611318', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layouts/layout-error.tpl');
}
/* {block 'page_title'} */
class Block_9896091875d5d20b6edff43_20675959 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');
}
}
/* {/block 'page_title'} */
/* {block 'page_header'} */
class Block_215128585d5d20b6edf487_70641400 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <h1><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9896091875d5d20b6edff43_20675959', 'page_title', $this->tplIndex);
?>
</h1>
        <?php
}
}
/* {/block 'page_header'} */
/* {block 'page_header_container'} */
class Block_11681676815d5d20b6edda34_11429916 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <header class="page-header">
        <div class="logo"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="logo"></div>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_215128585d5d20b6edf487_70641400', 'page_header', $this->tplIndex);
?>

      </header>
    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content'} */
class Block_18479183785d5d20b6ee3679_50489178 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'403 Forbidden','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</h2>
          <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You cannot access this store from your country. We apologize for the inconvenience.','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</p>
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_11648259015d5d20b6ee2b81_10846741 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content page-restricted">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18479183785d5d20b6ee3679_50489178', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer_container'} */
class Block_5635427835d5d20b6ee66b6_99480445 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_11626037815d5d20b6edcd89_41611318 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11626037815d5d20b6edcd89_41611318',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_11681676815d5d20b6edda34_11429916',
  ),
  'page_header' => 
  array (
    0 => 'Block_215128585d5d20b6edf487_70641400',
  ),
  'page_title' => 
  array (
    0 => 'Block_9896091875d5d20b6edff43_20675959',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_11648259015d5d20b6ee2b81_10846741',
  ),
  'page_content' => 
  array (
    0 => 'Block_18479183785d5d20b6ee3679_50489178',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_5635427835d5d20b6ee66b6_99480445',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11681676815d5d20b6edda34_11429916', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11648259015d5d20b6ee2b81_10846741', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5635427835d5d20b6ee66b6_99480445', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
