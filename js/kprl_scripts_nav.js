function Checker(){
if (jQuery('#kprlnav_enab').is(':checked')){
jQuery('#kprlnav_enab').attr( 'checked', true );
document.getElementById('kprlnav_enable').value = "checked";
}else {
jQuery('#kprlnav_enab').attr( 'checked', false );
document.getElementById('kprlnav_enable').value = "unchecked";
}
}