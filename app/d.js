var search="";


function searchform(filter_value){
 search=($('#searchterm').val());

 var query_json = {"search_string":search, "filter":filter_value};
 json_call(query_json);

}

function searchall(){
  search=($('#searchterm').val());
var query_json = {"search_string":search, "filter":"all"};
    if(search != undefined && search != null)
	{ 
		if(search.length >= 2)
		{
    json_call(query_json);  
}
   
   else{
			if(search.length > 0){
				alert('Enter atleast 2 characters to search');	
			}
		}
    }
}


function json_call (values) {

$.post("app/d.php", {values} ,function(response) {

for(var i in response.Contacts){
 //str= response.Contacts[i].uid;

		}
var result="<thead><tr><th style='text-align:center'>Result</th></tr></thead><tbody>";
for (var i=0; i<response.Contacts.length; i++)
{

  var name = response.Contacts[i].displayName ;
  result=result+'<tr><td><a onclick="details( '+ "'" + response.Contacts[i].uid + "'" +')"class="callmodel"  data-toggle="modal" data-target="#myModal"  data-uid="'+response.Contacts[i].uid+'">'+name+'</a></td></tr>';	
}
  result=result+'</tbody>'
  $("#resultTab").html(result);

	}, 'json');

}


function details(uid){
	var query_json = {"id":uid};
	call_id(query_json);
}


function call_id(values){
$.post("app/details.php", {values}, function(response) {
	
 var res ='<div class="mybox"><h4>'+response.displayName+'</h4></div><div class="mybox"><a>Employee Email</a><br/>'+checkVal(response.employeeEmail)+'<br/><a>Student Email</a> <br/> '+checkVal(response.studentEmail)+'</div><div class="mybox"><a>Work Phone</a><br/>'+checkVal(response.phone)+'</div>';
 $("#full_details").html(res)
		},'json');
}


function checkVal(val)
{
if(val!=""&&val!=null)
return val;
else
return "N/A";
}