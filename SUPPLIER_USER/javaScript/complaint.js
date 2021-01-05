

function complaintCheck(){

  var comp_name = document.getElementById('complain_name').value.trim();
  var complaint = document.getElementById('complain').value;

  var cname_flag = "";
  var cmp_flag = "";

//--Title empty check

  if (comp_name == ""){

		document.getElementById('comp_name_err').innerHTML = "*Give A Complaint Title*";

		cname_flag = "error";

	}

	if (cname_flag == ""){

     document.getElementById('comp_name_err').innerHTML = "";

    }

//--Field empty check

if (complaint == ""){

    document.getElementById('comp_err').innerHTML = "*Field Empty*";

    cmp_flag = "error";

     
  }

  if (cmp_flag == ""){

    document.getElementById('comp_err').innerHTML = "";
  }




    if(cname_flag != "" || cmp_flag != "" ){

      
        return false;


	}else{

           alert("Complaint Submitted");

           return true;

	}



}
