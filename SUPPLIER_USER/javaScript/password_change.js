
function changePassword(){

  var password = document.getElementById('npassword').value.trim();
  var cpassword = document.getElementById('rnpassword').value.trim();
  
  var pass_flag = "";
  var cpass_flag = "";



  if (password == ""){

    document.getElementById('new_pass_err').innerHTML = "**Give your password";

    pass_flag = "error";

     
  }

  if (pass_flag == ""){

    document.getElementById('new_pass_err').innerHTML = "";
  }


  //confirm password validation*************************

if (cpassword == "") {

  document.getElementById('rnew_pass_err').innerHTML = "**confirm your password";
  cpass_flag = "error";

}

if (cpassword != ""){

   if (cpassword != password){

     document.getElementById('rnew_pass_err').innerHTML = "**Password did not matched";

     cpass_flag = "error";

   }


}

if (cpass_flag == ""){

    document.getElementById('rnew_pass_err').innerHTML = "";
  }




    if(pass_flag != "" || cpass_flag != ""){

      
        return false;


	}else{

           alert("Form submitted");

	}


}
