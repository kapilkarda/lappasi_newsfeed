function FormValidation()
	{
	var home_page=document.forms['myform'].home_page.value;
	var other_page=document.forms['myform'].other_page.value;
	var head_line=document.forms['myform'].head_line.value;
	var details_news=document.forms['myform'].details_news.value;
	var reference=document.forms['myform'].reference.value;	
	var image = document.forms['myform'].file_select_machin.value;
	var picture_name = document.forms['myform'].picture_name.value;
	
	
	if(home_page==0 && other_page==0)
		{
		alert('Please Choose Home or Other page');
		document.forms['myform'].home_page.style.background = 'Yellow';
		document.forms['myform'].other_page.style.background = 'Yellow';
		document.forms['myform'].other_page.focus();
		return false;
		}		
		
	if(head_line=='')
		{
		alert('Please enter head line');
		document.forms['myform'].head_line.style.background = 'Yellow';
		document.forms['myform'].head_line.focus();
		return false;
		}	
		
	if(image!='' && picture_name=='')
		{
		alert('Please enter picture name');
		document.forms['myform'].picture_name.style.background = 'Yellow';
		document.forms['myform'].picture_name.focus();
		return false;
		}	
		
	}

	
function change_color( v_id, origColor ) {
	$("#tr_"+v_id).css('cursor','pointer');
	var x=document.getElementById("tr_"+v_id);
	var newColor = 'lime';
	if ( x.style ) {
	x.style.backgroundColor = ( newColor == x.style.backgroundColor )? origColor : newColor;
	}
}

// flowing function is used to select all checkbox start ------------------------
function Select(pbaction)
	{
		if(pbaction=='true')
		{
			var inputs = document.querySelectorAll("input[type='checkbox']");
			for(var i = 0; i < inputs.length; i++) {
			inputs[i].checked = true;
			}
			document.getElementById('buttons').innerHTML="<input type=\"checkbox\" checked=\"checked\" onclick=\"Select('false');\" />";
		}
		
		if(pbaction=='false')
		{
			var inputs = document.querySelectorAll("input[type='checkbox']");
			for(var i = 0; i < inputs.length; i++) {
			inputs[i].checked = false;
			}
			document.getElementById('buttons').innerHTML="<input type=\"checkbox\" onclick=\"Select('true');\" />";
		}
		
	}


/*
you put flowing checkbox to click ------------
<span id="buttons"><input type="checkbox" onclick="Select('true');" /></span>
*/
// Above function is used to select all checkbox end ------------------------
function change_type(act)
{
	if(act=='x_rectangle')
	{
	$("#thime").html("<label><span>Height(Y): </span><input class='form-control' class onkeyup=\"cng_val(this.value,'x_rectangle','x_y')\" type=\"number\" name=\"thime_y\" value=\"135\" /></label><label><label>Width(X): </label><input class='form-control' onkeyup=\"cng_val(this.value,'x_rectangle','x_x')\" type=\"number\" name=\"thime_x\" value=\"200\" /></label>");
	$("#img").html("<label><span>Height(Y): </span><input class='form-control' onkeyup=\"cng_val(this.value,'x_rectangle','x_y')\" type=\"number\" name=\"img_y\" value=\"400\" /></label><label><label>Width(X): </label><input class='form-control' onkeyup=\"cng_val(this.value,'x_rectangle','x_x')\" type=\"number\" name=\"img_x\" value=\"600\" /></label>");
	 $("#x_rectangle").attr('checked', true);
         
	 $(".x_rectangle").css("background-color","#991D57");
	 $(".y_rectangle").css("background-color","#CCC");
	 $(".score").css("background-color","#CCC");
	
	}
	else if(act=='y_rectangle')
	{
	$("#thime").html("<label><span>Height(Y): </span><input class='form-control' onkeyup=\"cng_val(this.value,'y_rectangle','y_y')\" type=\"number\" name=\"thime_y\" value=\"270\" /></label><label><span>Width(X): </span><input class='form-control' onkeyup=\"cng_val(this.value,'y_rectangle','y_x')\" type=\"number\" name=\"thime_x\" value=\"200\" /></label>");
	$("#img").html("<label><span>Height(Y): </span><input class='form-control' onkeyup=\"cng_val(this.value,'y_rectangle','y_y')\" type=\"number\" name=\"img_y\" value=\"600\" /></label><label><label>Width(X): </label><input class='form-control' onkeyup=\"cng_val(this.value,'y_rectangle','y_x')\" type=\"number\" name=\"img_x\" value=\"400\" /></label>");
	 $("#y_rectangle").attr('checked', true);
	 $(".x_rectangle").css("background-color","#CCC");
	 $(".y_rectangle").css("background-color","#991D57");
	 $(".score").css("background-color","#CCC");
	 
	}
	else if(act=='score')
	{
	$("#thime").html("<label><span>Height(Y): </span><input class='form-control' onkeyup=\"cng_val(this.value,'score','s_y')\" type=\"number\" name=\"thime_y\" value=\"200\" /></label><label><label>Width(X): </label><input class='form-control' onkeyup=\"cng_val(this.value,'score','s_x')\" type=\"number\" name=\"thime_x\" value=\"200\" /></label>");
	$("#img").html("<label><span>Height(Y): </span><input class='form-control' onkeyup=\"cng_val(this.value,'score','s_y')\" type=\"number\" name=\"img_y\" value=\"400\" /></label><label><label>Width(X): </label><input class='form-control' onkeyup=\"cng_val(this.value,'score','s_x')\" type=\"number\" name=\"img_x\" value=\"400\" /></label>");
	 $("#score").attr('checked', true);
	 $(".x_rectangle").css("background-color","#CCC");
	 $(".y_rectangle").css("background-color","#CCC");
	 $(".score").css("background-color","#991D57");
	}

	
}


function cng_val(val,sty,id)
	{
	var x=$("."+sty+" " +"."+id).text(val);	
	}
	
	
function delete_cnf(url)
	{
	if(confirm("Delete this?")==1){document.location.href=url,1;}else{return false;}
	}
	
	
function sendValue(s)
	{
	window.opener.document.getElementById('lib_file_selected').value = s;
	window.close();
	}


	
	
	

function startTime() {
var b=Array('০০','০১','০২','০৩','০৪','০৫','০৬','০৭','০৮','০৯','১০','১১','১২','১৩','১৪','১৫','১৬','১৭','১৮','১৯','২০','২১','২২','২৩','২৪','২৫','২৬','২৭','২৮','২৯','৩০','৩১','৩২','৩৩','৩৪','৩৫','৩৬','৩৭','৩৮','৩৯','৪০','৪১','৪২','৪৩','৪৪','৪৫','৪৬','৪৭','৪৮','৪৯','৫০','৫১','৫২','৫৩','৫৪','৫৫','৫৬','৫৭','৫৮','৫৯');
	
    var today=new Date();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
	//var ampmban = (h >= 12) ? " অপরাহ্ন" : " পূর্বাহ্ন";
	var ampmeng = (h >= 12) ? " PM" : " AM";
	
	h = ( h > 12 ) ? h - 12 : h;
	//document.getElementById('txt_bgn').innerHTML = b[h]+":"+b[m]+":"+b[s]+ampmban;
	document.getElementById('txt').innerHTML = h+":"+m+":"+s+ampmeng;
    var t = setTimeout(function(){startTime()},500);
}



function checkTime(i) {
    if (i<10) {i = i};  // add zero in front of numbers < 10
    return i;
}


function FormValidationUser()
{
	var other_page=document.forms['myform'].other_page.value;
	var head_line=document.forms['myform'].head_line.value;
	var details_news=document.forms['myform'].details_news.value;
	var image = document.forms['myform'].file_select_machin.value;
	var picture_name = document.forms['myform'].picture_name.value;
	
	if(other_page==0)
		{
		alert('Please Choose Page page');
		document.forms['myform'].other_page.style.background = 'Yellow';
		return false;
		}
				
	if(head_line=='')
		{
		alert('Please enter head line');
		document.forms['myform'].head_line.style.background = 'Yellow';
		return false;
		}
			
	if(image!='' && picture_name=='')
		{
		alert('Please enter picture name');
		document.forms['myform'].picture_name.style.background = 'Yellow';
		return false;
		}	
	
}


//for ad provide
var pages = {
    '1': 'Home Page',
    '2':'Category Page',
    '3':'News Details Page'
};

var page_positions = {    
    // for home page
    '11': 'Home Page Ads Position One (01)',
    '12': 'Home Page Ads Position Two (02)',
    '13': 'Home Page Ads Position Three (03)',
    '14': 'Home Page Ads Position Four (04)',
    '15': 'Home Page Ads Position Five (05)',
    '16': 'Home Page Ads Position Six (06)',
    '17': 'Home Page Ads Position Seven (07)',
    '18': 'Home Page Ads Position Eight (08)',
    
    // for Category page
    '21': 'Category Page Ads Position One (01)',
    '22': 'Category Page Ads Position Two (02)',
    '23': 'Category Page Ads Position Three (03)',
    '24': 'Category Page Ads Position Four (04)',
    
    // for News details page
    '31': 'News Details Page Ads Position One (01)',
    '32': 'News Details Page Ads Position Tow (02)',
    '33': 'News Details Page Ads Position Three (03)',
    '34': 'News Details Page Ads Position Four (04)',
    '35': 'News Details Page Ads Position Five (05)',
    '36': 'News Details Page Ads Position Six (06)',    
    '37': 'News Details Page Ads Position Seven (07)',
    '38': 'News Details Page Ads Position Eight (08)'      
};

function view_ad_pages(selected){
    for(var key in pages){
            if(selected===key){
    document.write('<option value='+key+' selected>'+pages[key]+'</option>');                
            }
            else{
    document.write('<option value='+key+'>'+pages[key]+'</option>');
            }
    }
}


function loadPagePositions(page_id,selected){
    document.getElementById('position').innerHTML='<option value="">Select</option>';
    for(var key in page_positions){
        if(key.substring(0,1)===page_id){
            if(selected===key){
    document.getElementById('position').innerHTML+=('<option value='+key+' selected>'+page_positions[key]+'</option>');                     
            }
            else{
    document.getElementById('position').innerHTML+=('<option value='+key+'>'+page_positions[key]+'</option>');                     
            }
       
        }
    }
}

function view_ad_position_name(ad_position){
    document.write(page_positions[ad_position]);
}

function delete_confirm(){
    return confirm("Are you want to Delete?");
}