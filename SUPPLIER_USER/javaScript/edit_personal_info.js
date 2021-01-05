
function editValidation(){



	var fname = document.getElementById('fname').value.trim();

  var phone = document.getElementById('phone').value.trim();

	var gender = document.edit_profile.gender.value.trim();


	var day = document.getElementById('day').value.trim();
	var month = document.getElementById('month').value.trim();
	var year = document.getElementById('year').value.trim();
	


	
	


   var fname_flag = "";
  
   var phone_flag = "";
   var gender_flag = "";

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

	

   

// user name validatation***********************



//password Validation*************************




//confirm password validation*************************




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

  

  


	if(fname_flag != "" || phone_flag != "" || gender_flag != "" || dob_flag != "" ){

      
        return false;


	}else{

           sendToEditProfile();
           return true;

	}





}

function sendToEditProfile(){


  var fname = document.getElementById('fname').value.trim();

  var phone = document.getElementById('phone').value.trim();

  var gender = document.edit_profile.gender.value.trim();


  var day = document.getElementById('day').value.trim();
  var month = document.getElementById('month').value.trim();
  var year = document.getElementById('year').value.trim();


  var httpr = new XMLHttpRequest();
  httpr.open('POST', '../php/edit_profile_check.php', true);

  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  httpr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      
      document.getElementById('update_response').innerHTML = this.responseText;
    }
  }


  httpr.send("fname="+fname+"&"+"phone="+phone+"&"+"gender="+gender+"&"+"day="+day+"&"+"month="+month+"&"+"year="+year);

  return true;
  
  



}
