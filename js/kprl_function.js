function getElementsByClass(searchClass, domNode, tagName) { 
	if (domNode == null) domNode = document;
	if (tagName == null) tagName = '*';
	var el = new Array();
	var tags = domNode.getElementsByTagName(tagName);
	var tcl = " "+searchClass+" ";
	for(i=0,j=0; i<tags.length; i++) { 
		var test = " " + tags[i].className + " ";
		if (test.indexOf(tcl) != -1) 
			el[j++] = tags[i];
	} 
	return el;
} 

function NavigateLeft(menu, clas){
var LiText = document.getElementById(menu).getElementsByTagName('li'),
    AText = document.getElementById(menu).getElementsByTagName('a'),
    LiSelc = getElementsByClass(clas), 
    ctn_2=0;

for (j=LiText.length-1; 0 <= j; j--){
	if (jQuery(LiSelc).html() == jQuery(LiText[j]).html()){
        ctn_2 = j-1;
        if(ctn_2 <  0){
            ctn_2 = LiText.length-1;
        }
        while (AText[ctn_2].href == ''){
            ctn_2 = ctn_2-1;
            if (document.URL == AText[ctn_2].href){
            ctn_2 = ctn_2 -1;
            }
            if(ctn_2 <  0){
                ctn_2 = LiText.length-1;
            }
        }
	}
}
window.location = AText[ctn_2].href;
}

function NavigateRight(menu, clas){
var LiText = document.getElementById(menu).getElementsByTagName('li'),
    AText = document.getElementById(menu).getElementsByTagName('a'),
    LiSelc = getElementsByClass(clas), 
    ctn=0;

for (i=0; i < LiText.length; i++){
	if (jQuery(LiSelc).html() == jQuery(LiText[i]).html()){
        ctn = i+1;
        if(ctn ==  LiText.length){
            ctn = 0;
        }
        while (AText[ctn].href == ''){
            ctn = ctn+1;
            if (document.URL == AText[ctn].href){
            ctn = ctn + 1;
            }
            if(ctn ==  LiText.length){
                ctn = 0;
            }
        }
	}
}
window.location = AText[ctn].href;
}



