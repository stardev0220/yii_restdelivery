<?php /* Smarty version Smarty-3.1.19, created on 2017-08-07 18:25:56
         compiled from "/home4/yummytak/public_html/magboxes.co.uk/pdf/invoice.note-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3030122965988a2a408ac46-47893578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e5dd36572ba67073ca0083839fbe7f3a97b9dc4' => 
    array (
      0 => '/home4/yummytak/public_html/magboxes.co.uk/pdf/invoice.note-tab.tpl',
      1 => 1497785602,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3030122965988a2a408ac46-47893578',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_invoice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5988a2a40af037_60911657',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5988a2a40af037_60911657')) {function content_5988a2a40af037_60911657($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['order_invoice']->value->note)&&$_smarty_tpl->tpl_vars['order_invoice']->value->note) {?>
	<tr>
		<td colspan="12" height="10">&nbsp;</td>
	</tr>
	
	<tr>
		<td colspan="6" class="left">
			<table id="note-tab" style="width: 100%">
				<tr>
					<td class="grey"><?php echo smartyTranslate(array('s'=>'Note','pdf'=>'true'),$_smarty_tpl);?>
</td>
				</tr>
				<tr>
					<td class="note"><?php echo nl2br($_smarty_tpl->tpl_vars['order_invoice']->value->note);?>
</td>
				</tr>
			</table>
		</td>
		<td colspan="1">&nbsp;</td>
	</tr>
<?php }?>
<?php }} ?>
