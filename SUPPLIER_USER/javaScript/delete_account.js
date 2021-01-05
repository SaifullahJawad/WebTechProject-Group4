

function deleteAccount(){

  var email = document.getElementById('email').value.trim();
  var password = document.getElementById('password').value.trim();

  var email_flag = "";
  var pass_flag = "";

//--email empty check

  if (email == ""){

	     

		document.getElementById('email_err').innerHTML = "**Give your email address ";

		email_flag = "error";

		
	}


  //if(document.getElementById('email_err').innerHTML.trim().length != 0) {

     //email_flag = "error";
   
   //}

	if (email_flag == ""){

     document.getElementById('email_err').innerHTML = "";

    }

//--password empty check

if (password == ""){

    document.getElementById('pass_err').innerHTML = "**Give your password";

    pass_flag = "error";

     
  }

  if (pass_flag == ""){

    document.getElementById('pass_err').innerHTML = "";
  }




    if( email_flag != "" || pass_flag != "" ){

      
        return false;


	}else{

           alert("Are You Sure You Want To Delete Your Account??");

           return true;

	}



}
