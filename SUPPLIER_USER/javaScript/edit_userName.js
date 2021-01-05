
function editUname(){

  var uname = document.getElementById('uname').value.trim();
  
  var uname_flag = "";



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




    if( uname_flag != "" ){

      
        return false;


	}else{

           alert("Form submitted");

	}


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