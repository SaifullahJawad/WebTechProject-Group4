
function regValidation(){



	var fname = document.getElementById('fname').value.trim();
	var email = document.getElementById('email').value.trim();
  var uname = document.getElementById('uname').value.trim();
  var password = document.getElementById('password').value.trim();
  var cpassword = document.getElementById('cpassword').value.trim();
  var phone = document.getElementById('phone').value.trim();

	var gender = document.regForm.gender.value.trim();

  var image = document.forms['regForm']['image'];
  var validImg = ["jpg","jpeg","png"];

	var day = document.getElementById('day').value.trim();
	var month = document.getElementById('month').value.trim();
	var year = document.getElementById('year').value.trim();
	


	
	


   var fname_flag = "";
   var email_flag = "";
   var uname_flag = "";
   var pass_flag = "";
   var cpass_flag = "";
   var phone_flag = "";
   var gender_flag = "";
   var pic_flag = "";
   var dob_flag = "";
   
   // Name Empty Check

	if (fname == ""){

		document.getElementById('fname_err').innerHTML = "insert your name ";

		fname_flag = "error";

	   
  }

	// Name must be start with a letter check

	if (fname != ""){


		if (!(fname[0].toLowerCase() >='a' && fname[0].toLowerCase() <='z')){

          

		  document.getElementById('fname_err').innerHTML = "name must be start with a letter";

      fname_flag = "error";


		}
	}

   



  // Name Can not contain Double Dot and Double Dash Check 

   if (fname != ""){

        var dup = fname.replace(/ /g, "");

        var doubleDot = dup.indexOf("..");
        var doubleDash = dup.indexOf("--");

        if (doubleDot >= 0){

        	

		 document.getElementById('fname_err').innerHTML = "name cannot contain Double Dot (..) or more";

     fname_flag = "error";

		 

        }else if (doubleDash >= 0){

          

		  document.getElementById('fname_err').innerHTML = "name cannot contain Double dash (--) or more";

      fname_flag = "error";

		  

        }


   }

   // Name can only contain A to Z or a to z and dash(-) or dot(.) check

   if(fname != ""){
     
     var alphaCount = 0;
     var j = 0;

    var rpName = fname.replace(/ |-/g,'');
    var dtName = rpName.replace(/\./g,'');

     while (j < dtName.length){

        if (!(dtName[j].toLowerCase() >='a' && dtName[j].toLowerCase() <='z')) {

   		  alphaCount++;

   	}

   	j++

   }

   if (alphaCount != 0){

   	     

		document.getElementById('fname_err').innerHTML = " name only contain A to Z or a to z ";

    fname_flag = "error";

		

   }


   }

   // Name Must be at least two words 

   if (fname != ""){

  if (fname.split(" ").length < 2){

		

		document.getElementById('fname_err').innerHTML = "name must be at least two words";

    fname_flag = "error";

		


	}

	}

  // If no error, changing the last error message with null
	
  if (fname_flag == ""){

     document.getElementById('fname_err').innerHTML = "";

         


    }

	

   // Email validation****************************************

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


    // user name validatation***********************

   if (uname == ""){

    document.getElementById('uname_err').innerHTML = "insert Uname";

    uname_flag = "error";

     
  }



    if (uname != ""){

   var rep = uname.replace(/ /g, "");

   var count = 0;
   var i=0;

   while (i < rep.length){

        if (!(rep[i].toLowerCase() >= '0'  && rep[i].toLowerCase() <= '9') && !(rep[i].toLowerCase() >= 'a'  && rep[i].toLowerCase() <= 'z')){

      count++;
    }

    i++
   }

   if (count != 0){

    document.getElementById('uname_err').innerHTML = " Only Numbers and Alphabets are allowed ";

    uname_flag = "error";


  }

}

if(document.getElementById('uname_err').innerHTML.trim().length != 0) {

     uname_flag = "error";
   
   }

if (uname_flag == ""){

     document.getElementById('uname_err').innerHTML = "";

 }


//password Validation*************************

if (password == ""){

    document.getElementById('pass_err').innerHTML = "Give your password";

    pass_flag = "error";

     
  }

  if (pass_flag == ""){

    document.getElementById('pass_err').innerHTML = "";
  }


  //confirm password validation*************************

if (cpassword == "") {

  document.getElementById('cpass_err').innerHTML = "confirm your password";
  cpass_flag = "error";

}

if (cpassword != ""){

   if (cpassword != password){

     document.getElementById('cpass_err').innerHTML = "Password did not matched";

     cpass_flag = "error";

   }


}

if (cpass_flag == ""){

    document.getElementById('cpass_err').innerHTML = "";
  }



//phone no validation************************************

if (phone == "") {

  document.getElementById('phone_err').innerHTML = "Give your phone Number";
  phone_flag = "error";

}

if (phone != ""){

   var phoneCount = 0;
   var u=0;

   while (u < phone.length){

        if (!(phone[u] >= '0'  && phone[u] <= '9')){

    phoneCount++;

    }

    u++
   }

   if (phoneCount != 0){

    document.getElementById('phone_err').innerHTML = "phone no can only contain numbers";

    phone_flag = "error";

  }


}

if (phone_flag == "") {

   document.getElementById('phone_err').innerHTML = "";

}



    // Gender validation******************************

	if (gender == "" ){

	    

		document.getElementById('gender_err').innerHTML = "select your gender";

		gender_flag = "error";

		
	}

	if ( gender_flag == ""){

    document.getElementById('gender_err').innerHTML = "";

            

	}

  //Profile Picture validation*************************

  if(image.value == ""){

    document.getElementById('picture_err').innerHTML = "Upload a photo";

    pic_flag = "error";
  }
    
  if(image.value != ""){

    var ext = image.value.substring(image.value.lastIndexOf('.')+1);

    var lext = ext.toLowerCase();

    var result = validImg.includes(lext);

    if (result == false){

        document.getElementById('picture_err').innerHTML = "Only (png,jpeg,jpg) file allowed";

        pic_flag = "error";

    }

  }

  if (pic_flag == ""){

      document.getElementById('picture_err').innerHTML = "";

  }




  // date of birth validation************************** 

  if (day == "" || month == "" || year == ""){

    document.getElementById('dob_err').innerHTML = "Date of Birth required";

    dob_flag = "error";



  }

  if (day != "" && month != "" && year != ""){

    if (!(day >= 1 && day <= 31)){

      document.getElementById('dob_err').innerHTML = "Day must within 1 to 31";

      dob_flag = "error";

    }
    
    if (!(month >= 1 && month <= 12)){

      document.getElementById('dob_err').innerHTML = "Month must within 1 to 12";

      dob_flag = "error";

    }

    if (!(year >= 1970 && year <= 2020)){

       document.getElementById('dob_err').innerHTML = "year must within 1990 to 2020";

       dob_flag = "error";
  }

  }

  if (dob_flag == ""){

     document.getElementById('dob_err').innerHTML = "";

  }

  

  


	if(fname_flag != "" || email_flag != "" || uname_flag != "" || pass_flag != "" || cpass_flag != "" || phone_flag != "" || gender_flag != "" || pic_flag != "" || dob_flag != "" ){

      
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

function userNameCheck(){

  var uname = document.getElementById('uname').value.trim();

  var httpr = new XMLHttpRequest();
  httpr.open('POST', '../php/ajax_user_table.php', true);

  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  httpr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){


      document.getElementById('uname_err').innerHTML = this.responseText;

    
    }
  }

  httpr.send("uname_check="+uname);
  

}