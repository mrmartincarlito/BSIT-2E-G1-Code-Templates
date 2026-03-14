const API = "../../api/register.php";
function store() {
	let fname = $("#firstName").val();
	let lname = $("#lastName").val();
	let email = $("#emailAddress").val();
	let password = $("#password").val();
	let confirmPassword = $("#confirmPassword").val();
	
	if (fname == "") {
		alert("First name is required");
	}
	
	if (password != confirmPassword) {
		alert("Password do not match");
	}
	
	let payload = {
		fname : fname,
		lname : lname,
		email : email,
		password : password
	}
	
	$.ajax({
		url : API,
		type : "POST",
		data : "action=store&payload=" + JSON.stringify(payload),
		success : function(response) {
			let resp = JSON.parse(response);
			alert(resp.message);
			if (resp.status == "success") {
				window.location.href = "../../";
			}
		},
		error : function (error) {
			alert(error);
		}
	});
}