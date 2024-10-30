﻿<?php 
echo '<script src="/wp-content/plugins/keypress-list/js/kprl_scripts_load.js" type="text/javascript"></script>';
		if($_POST['kprl_hidden'] == 'Y') {
			//Form data sent
			$kprltab_lib = $_POST['kprltab_lib'];
			update_option('kprltab_lib', $kprltab_lib);
					
			$kprltab_cod = $_POST['kprltab_cod'];
			update_option('kprltab_cod', $kprltab_cod);
			
			$kprltab_act = $_POST['kprltab_act'];
			update_option('kprltab_act', $kprltab_act);
			
			$kprltab_lib_arch = $_POST['kprltab_lib_arch'];
			update_option('kprltab_lib_arch', $kprltab_lib_arch);
					
			$kprltab_cod_arch = $_POST['kprltab_cod_arch'];
			update_option('kprltab_cod_arch', $kprltab_cod_arch);
			
			$kprltab_act_arch = $_POST['kprltab_act_arch'];
			update_option('kprltab_act_arch', $kprltab_act_arch);

			$commande_sh = $_POST['commande_sh'];
			update_option('commande_sh', $commande_sh);

			$kprl_master_def2 = $_POST['kprl_master_def2'];
			update_option('kprl_master_def2', $kprl_master_def2);

			?>
			<div class="updated"><p><strong><?php _e('Options saved.', 'kprl_trdom'); ?></strong></p></div>
			<?php
		} else {
			//Normal page display
			$kprltab_lib = get_option('kprltab_lib');
			$kprltab_cod = get_option('kprltab_cod');
			$kprltab_act = get_option('kprltab_act');
			$kprltab_lib_arch = get_option('kprltab_lib_arch');
			$kprltab_cod_arch = get_option('kprltab_cod_arch');
			$kprltab_act_arch = get_option('kprltab_act_arch');
			$commande_sh = get_option('commande_sh');
			if (!get_option('kprl_master_def2')){
			$kprl_master_def2 = checked;
			} else {
			$kprl_master_def2 = get_option('kprl_master_def2');
			}
		}
	?>
			
	

<div class="wrap" onClick="EraseValue()">  

<?php    echo "<h2>" . __( 'Keypress-list', 'kprl_trdom' ) . "</h2>"; ?>
      
<script>
var kprltab_lib = new Array,
	kprltab_cod = new Array,
	kprltab_act = new Array,
	kprltab_lib_arch = new Array,
	kprltab_cod_arch = new Array,
	kprltab_act_arch = new Array;
	
kprltab_act_prepass = "<? print $kprltab_act; ?>";
kprltab_cod_prepass = "<? print $kprltab_cod; ?>";
kprltab_lib_prepass = "<? print $kprltab_lib; ?>";
kprltab_act_prepass_arch = "<? print $kprltab_act_arch; ?>";
kprltab_cod_prepass_arch = "<? print $kprltab_cod_arch; ?>";
kprltab_lib_prepass_arch = "<? print $kprltab_lib_arch; ?>";

kprltab_lib = kprltab_lib_prepass.split(":#:");
kprltab_cod = kprltab_cod_prepass.split(":#:");
kprltab_act = kprltab_act_prepass.split(":#:");
kprltab_lib_arch = kprltab_lib_prepass_arch.split(":#:");
kprltab_cod_arch = kprltab_cod_prepass_arch.split(":#:");
kprltab_act_arch = kprltab_act_prepass_arch.split(":#:");
</script>	  
<style>
.highlited_rows {
background-color : #CBDEFF;
}

.masterkey_tab {
padding: 0px;
margin: 0px;
}
</style>
<form name="kprl_prgform">
<p><?php _e("To activate the shortcut listener, in Front-Office, user must tip \"Shift\" and \"S\" keys simultaneously, then tip recorded shortcuts.", "kprl_trdom" ); ?></p>
<INPUT id="masterkey_btn" type="button" Value="<?php _e("Change the Master key", "kprl_trdom" ); ?>" onClick="DisplayKey()">
<div id="masterkey" style="display:none;">
<table class="masterkey_tab">
	<tbody class="masterkey_tab">
		<tr class="masterkey_tab">
			<td class="masterkey_tab">
				<p class="masterkey_tab"><?php _e("Specify your master key :", "kprl_trdom" ); ?> </p>
			</td>
			<td class="masterkey_tab">				
				<input style="margin-left:10px;" class="masterkey_tab" type="text" id="command_sh" name="command_sh" placeholder="shift s" style="width:80px" title="<?php _e("Keys are case insensitive, specify use of shift key before any letter key for capitalize it; separate keys with space, and use the word space to use it.", "kprl_trdom" ); ?>" value="<?php echo $commande_sh; ?>">
			</td>
		</tr>
		<tr class="masterkey_tab">
			<td class="masterkey_tab">
				<p class="masterkey_tab"><?php _e("or use default key", "kprl_trdom" ); ?> </p>
			</td>
			<td class="masterkey_tab">
				<input class="masterkey_tab" style="margin-left:10px;" type="checkbox" name="kprl_master_def" id="kprl_master_def" OnClick="Checker2()" <?php echo $kprl_master_def2; ?>/>
			</td>
		</tr>
	</tbody>
</table>


</div>	
<table style="width: 100%; margin-bottom: 10px;">
	<tbody>
		<tr>
			<td style="width: 75px;">
				<p><?php _e("Label :", "kprl_trdom" ); ?></p></td><td><input type="text" id="kprl_libelle" name="kprl_libelle" placeholder="Konami Code" style="width:10%">	
			</td>
		</tr>
		<tr>
			<td style="width: 75px;">
				<p><?php _e("Code :", "kprl_trdom" ); ?></p></td><td><input type="text" id="kprl_code" name="kprl_code" title="<?php _e("You can use letters, capitalized letters or numbers. Spaces are not allowed and special characters use isn't warranty.", "kprl_trdom" ); ?>" placeholder="testv1" style="width:50%">
			</td>
		</tr>
		<tr>
			<td style="width: 75px; vertical-align: top;">
	<!--p><?php //_e("Action : " ); ?><textarea id="kprl_action" name="kprl_action" placeholder="window.location.href = document.URL + '?wptheme=Jud_Alex-v2';" style="width:90%"/></textarea></p-->  	
	<p style="margin-top: 0.6em;"><?php _e("Action :", "kprl_trdom" ); ?></p></td><td><input id="kprl_action" name="kprl_action" placeholder="alert('<?php _e("You have already install this plugin", "kprl_trdom" ); ?>');" style="width:90%"><p style="margin: 1px 0px 0px 1px;"><?php _e("For multiline javascripts or functions, use a Javascript compressor", "kprl_trdom" ); ?></p>			
			</td>
		</tr>
	</tbody>
</table>
	
	<INPUT type="button" Value="<?php _e("Add", "kprl_trdom" ); ?>" onClick="Ajouter(this.form)">
		<INPUT type="button" id="modif_btn"  Value="<?php _e("Modify", "kprl_trdom" ); ?>" onClick="Modifie(this.form)">

<table id="tableau" cellspacing="0" class="widefat fixed"> 
    <thead>
<tr>
<th class="manage-column column-cb check-column" id="cb_kprl" scope="col"><input type="checkbox" onclick="SelecAll()"></th>
 <th class="manage-column" scope="col"><?php _e("Label", "kprl_trdom" ); ?></th>
 <th class="manage-column" scope="col"><?php _e("Code", "kprl_trdom" ); ?></th>
 <th class="manage-column" scope="col"><?php _e("Action", "kprl_trdom" ); ?></th>
<th class="manage-column column-cb check-column" id="cb_mod_kprl" scope="col"></th>
</tr> 
    </thead>
    <tbody class="list:post" id="kprllist">
         </tbody>
</table>
	<INPUT type="button" value="<?php _e("Archive", "kprl_trdom" ); ?>" onClick="Archiver()">
<br></br>
<table id="tableau2" cellspacing="0" class="widefat fixed"> 
    <thead>
<tr>
<th class="manage-column column-cb check-column" id="cb_kprl_arch" scope="col"><input type="checkbox" onclick="SelecAll_Arch()"></th>
 <th class="manage-column" scope="col"><?php _e("Label", "kprl_trdom" ); ?></th>
 <th class="manage-column" scope="col"><?php _e("Code", "kprl_trdom" ); ?></th>
 <th class="manage-column" scope="col"><?php _e("Action", "kprl_trdom" ); ?></th>
<th class="manage-column column-cb check-column" id="cb_mod_kprl_arch" scope="col"></th>
</tr> 
    </thead>
    <tbody class="list:post" id="kprllist_arch">
         </tbody>
</table>
	<INPUT type="button" value="<?php _e("Delete", "kprl_trdom" ); ?>" onClick="Supprimer()">
	<INPUT type="button" id="activ_btn" Value="<?php _e("Activate", "kprl_trdom" ); ?>" OnClick="Activer()">
</form>
<form name="kprl_form" method="post" onSubmit="return Autofill()" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

		<input type="hidden" id="commande_sh" name="commande_sh">
        <input type="hidden" name="kprl_hidden" value="Y"> 
		<input type="hidden" id="kprltab_lib" name="kprltab_lib">  
	    <input type="hidden" id="kprltab_cod" name="kprltab_cod">  	
		<input type="hidden" id="kprltab_act" name="kprltab_act">  
		<input type="hidden" id="kprltab_lib_arch" name="kprltab_lib_arch">  
	    <input type="hidden" id="kprltab_cod_arch" name="kprltab_cod_arch">  	
		<input type="hidden" id="kprltab_act_arch" name="kprltab_act_arch">  
		<input type="hidden" name="kprl_master_def2" id="kprl_master_def2" value="<?php echo $kprl_master_def2; ?>"> 
	   <p class="submit">  
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'kprl_trdom' ) ?>" />  
        </p>  
			
</form>
<script>
Autoload();
</script>
</div>  
