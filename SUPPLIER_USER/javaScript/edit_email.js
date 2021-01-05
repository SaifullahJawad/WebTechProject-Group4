
function editEmail(){

  var email = document.getElementById('email').value.trim();
  var email_flag = "";



  if (email == ""){

	     

		document.getElementById('email_err').innerHTML = "Give your email address ";

		email_flag = "error";

		
	}

	

	if (email != ""){

        var notallowed = email.indexOf(".@");
        var notallowed1 = email.indexOf("..");
		    var atposition = email.indexOf("@");
		    var firstDot  = email.indexOf(".");
        var lastDot = email.lastIndexOf(".");
        var lengthOfEmail = email.length;

     if (notallowed >= 0 || notallowed1 >= 0){

         

		document.getElementById('email_err').innerHTML = "(.@) and (..) is not allowed ";

    email_flag = "error";

		

     }else if ( atposition < 1 || firstDot < 1 ){

         

		document.getElementById('email_err').innerHTML = "(.) and (@) is not allowed in first Position";

    email_flag = "error";

		

     }else if (!(atposition+2 < lastDot)){

           

		document.getElementById('email_err').innerHTML = "put atleast two character after(@)";

    email_flag = "error";

		

     }else if (!(lengthOfEmail-1 >= lastDot+2)){

       

		document.getElementById('email_err').innerHTML = "put atleast two character after last dot";

    email_flag = "error";

		

     }


	}

  if(document.getElementById('email_err').innerHTML.trim().length != 0) {

     email_flag = "error";
   
   }

	if (email_flag == ""){

     document.getElementById('email_err').innerHTML = "";

    }



    if( email_flag != "" ){

      
        return false;


	}else{

           alert("Form submitted");

	}







}


function emailCheck(){

  var email = document.getElementById('email').value.trim();

  var httpr = new XMLHttpRequest();
  httpr.open('POST', '../php/ajax_user_table.php', true);

  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  httpr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){


      document.getElementById('email_err').innerHTML = this.responseText;

    
    }
  }

  httpr.send("email_check="+email);
  

}