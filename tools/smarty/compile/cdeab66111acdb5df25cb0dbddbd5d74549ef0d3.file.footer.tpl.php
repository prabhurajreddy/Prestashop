<?php /* Smarty version Smarty-3.1.11, created on 2015-02-15 16:40:52
         compiled from "/home/student/public_html/prestashop/themes/prestashop/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178725582254e05b94ea8b05-15150098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdeab66111acdb5df25cb0dbddbd5d74549ef0d3' => 
    array (
      0 => '/home/student/public_html/prestashop/themes/prestashop/footer.tpl',
      1 => 1372306200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178725582254e05b94ea8b05-15150098',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'HOOK_RIGHT_COLUMN' => 0,
    'HOOK_FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_54e05b94ebbd32_87850693',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e05b94ebbd32_87850693')) {function content_54e05b94ebbd32_87850693($_smarty_tpl) {?>

		<?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>
				</div>

<!-- Right -->
				<div id="right_column" class="column">
					<?php echo $_smarty_tpl->tpl_vars['HOOK_RIGHT_COLUMN']->value;?>

				</div>
			</div>

<!-- Footer -->
			<div id="footer"><?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>
</div>
		</div>
	<?php }?>
	</body>
</html>
<?php }} ?>