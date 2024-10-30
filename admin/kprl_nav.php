<?php 
echo '<script src="/wp-content/plugins/keypress-list/js/kprl_scripts_nav.js" type="text/javascript"></script>';
		if($_POST['kprl_nav_form'] == 'Y') {
			//Form data sent
			$menuid = $_POST['menuid'];
			update_option('menuid', $menuid);
			
			$currentclass = $_POST['currentclass'];
			update_option('currentclass', $currentclass);

			$kprlnav_enable = $_POST['kprlnav_enable'];
			update_option('kprlnav_enable', $kprlnav_enable);

			?>
			<div class="updated"><p><strong><?php _e('Options saved.', 'kprl_trdom'); ?></strong></p></div>
			<?php
		} else {
			//Normal page display
			$menuid = get_option('menuid');
			$currentclass = get_option('currentclass');
			$kprlnav_enable = get_option('kprlnav_enable');
		}
	?>
	<div class="wrap">  

<?php    echo "<h2>" . __( 'Keypress-Nav', 'kprl_trdom' ) . "</h2>"; ?>

<p><?php _e("With these options, it will be possible for users to navigate through the menu items using the left and right keys.", "kprl_trdom" ); ?></p>
<form name="kprl_nav_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<table style="margin-bottom: 10px;">

	<tbody>
		<tr>
			<td style="width:400px">
				<p><?php _e("HTML id of the menu into navigate :", "kprl_trdom" ); ?></p></td><td><input type="text" id="menuid" name="menuid" placeholder="" style="width:150px" value="<?php echo $menuid; ?>">	
			</td>
		</tr>
		<tr>
			<td>
				<p><?php _e("CSS Class used to specify current page :", "kprl_trdom" ); ?></p></td><td><input type="text" id="currentclass" name="currentclass" placeholder="" style="width:150px" value="<?php echo $currentclass; ?>">
			</td>
		</tr>
		<tr>
			<td>
			<p><?php _e("Would you enable Keypress Navigation?", "kprl_trdom" ); ?></p>
			</td><td>
			<input type="checkbox" name="kprlnav_enab" id="kprlnav_enab" OnClick="Checker()" <?php echo $kprlnav_enable; ?>/>
			</td>
		</tr>
	</tbody>
</table>
        <input type="hidden" name="kprl_nav_form" value="Y"> 
		<input type="hidden" name="kprlnav_enable" id="kprlnav_enable" value="<?php echo $kprlnav_enable; ?>"> 
	   <p class="submit">  
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'kprl_trdom' ) ?>" />  
        </p>  
</form>
</div>  