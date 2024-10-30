<?php 
echo '<script src="/wp-content/plugins/keypress-list/js/kprl_function.js" type="text/javascript"></script>';
$kprltab_lib = get_option('kprltab_lib');
$kprltab_cod = get_option('kprltab_cod');
$kprltab_act = get_option('kprltab_act');
$nbrs_combos =  substr_count($kprltab_lib, ':#:') + 1;

$menuid = get_option('menuid');
$currentclass = get_option('currentclass');
$kprlnav_enable = get_option('kprlnav_enable');

$kprl_master_def2 = get_option('kprl_master_def2');

$commande_sh = get_option('commande_sh');
?>

 <script type="text/javascript">
var kprl_nav_enable;
 kprl_nav_enable =  "<? print $kprlnav_enable; ?>";
 if (kprl_nav_enable == "checked"){
 var menu,
	clas;
 menu = "<? print $menuid; ?>";
 clas = "<? print $currentclass; ?>";
 
 keypress.combo("left", function() {NavigateLeft(menu, clas)});
 
 keypress.combo("right", function() {NavigateRight(menu, clas)});
 
 }
var commande_sh, kprl_master_def2;
commande_sh = "<? print $commande_sh; ?>";
kprl_master_def2 = "<? print $kprl_master_def2; ?>";
if (kprl_master_def2 == "checked"){
commande_sh = 'shift s';
}
if (commande_sh == ''){
kprl_comboload();
jQuery('input[type=text]')
    .bind("focus", keypress.stop_listening)
    .bind("blur", keypress.listen);
} else {
keypress.combo(commande_sh, function() {
kprl_comboload();
jQuery('input[type=text]')
    .bind("focus", keypress.stop_listening)
    .bind("blur", keypress.listen);
});
keypress.sequence_combo(commande_sh, function() {
kprl_comboload();
jQuery('input[type=text]')
    .bind("focus", keypress.stop_listening)
    .bind("blur", keypress.listen);
});
}

function kprl_comboload() {
var kprltab_lib = new Array;
var kprltab_cod = new Array;
var kprltab_act = new Array;
//alert(<? echo $kprltab_cod; ?>);
kprltab_act_prepass = "<? print $kprltab_act; ?>";
kprltab_cod_prepass = "<? print $kprltab_cod; ?>";
kprltab_lib_prepass = "<? print $kprltab_lib; ?>";
kprltab_lib = kprltab_lib_prepass.split(":#:");
kprltab_cod = kprltab_cod_prepass.split(":#:");
kprltab_act = kprltab_act_prepass.split(":#:");
if (kprltab_lib[0]=="" && kprltab_cod[0]=="" && kprltab_act[0]==""){
	kprltab_lib.splice(0, 1);
	kprltab_cod.splice(0, 1);
	kprltab_act.splice(0, 1);
}

//<?php 
//$nbrs_combos =  substr_count($kprltab_lib, ':#:') + 1;
//?>

var lenght = kprltab_lib.length;
for (var i=0; i < lenght; i++){
	var val_cod = kprltab_cod[i];
	var n=val_cod.split("");
		for (var j=0; j < n.length; j++){
			if (isNaN(n[j])) {
				if (n[j] == ' '){
					n[j] == 'space';
				}
				if (n[j] == n[j].toUpperCase()){
					n[j] = "shift " + n[j].toLowerCase();
				}
			}
		
		}
	val_cod = n.join(" ");
	kprltab_cod[i] = val_cod;
//	alert(kprltab_cod[i]);
}
my_scope = this;
var my_combos = new Array;
my_combos = [
    {
        "keys"          : kprltab_cod[0],
        "is_exclusive"  : true,
        "on_keydown"    : function() {
		eval(kprltab_act[0]);        
		},
        "on_keyup"      : function(e) {
        },
		"is_sequence"       : true,
        "this"          : my_scope
    }
];
<?php 
for ($x=1; $x<=$nbrs_combos; $x++)  {
  echo "
var combo = new Array;
combo = [
    {
        \"keys\"          : kprltab_cod[$x],
        \"is_exclusive\"  : true,
        \"on_keydown\"    : function() {
            eval(kprltab_act[$x]);
        },
        \"on_keyup\"      : function(e) {
        },
		\"is_sequence\"       : true,
        \"this\"          : my_scope
    }
];
my_combos.push(combo[0]);
  ";} 
?>
keypress.register_many(my_combos);
}
    </script>
	
	
<?php
	
	echo "<h1 class=\"hidden\">test $kprltab_act</h1>"; 
?>
	