const API = "../../api/accounts.php";

get();
function get() {
	$.ajax({
		url : API,
		type : "GET",
		data : "action=get",
		success : function(response) {
			let resp = JSON.parse(response);
			
			if (resp.status == "success") {
				var accounts = resp.data;
				var tr = "";
				accounts.forEach(function(account) {
					tr += "<tr>";
					tr += "<td>" +account.id+ "</td>";
					tr += "<td>" +account.fname+ "</td>";
					tr += "<td>" +account.lname+ "</td>";
					tr += "<td>" +account.email+ "</td>";
					tr += "<td><button class='btn btn-primary' onclick='edit(" +account.id+ ")'>Edit</button> <button class='btn btn-danger' onclick='drop(" +account.id+")'>Delete</button></td>";
					tr += "</tr>";
				});
				
				$("#tblAccountsList").html(tr);
			}
		},
		error : function (error) {
			alert(error);
		}
	});
}

function edit(id) {
	$.ajax({
		url : API,
		type : "GET",
		data : "action=getOne&id=" + id,
		success : function(response) {
			let resp = JSON.parse(response);
			
			var editModal = new bootstrap.Modal(
				document.getElementById("editModal")
			);
			
			$("#editFname").val(resp.data.fname);
			$("#editEmail").val(resp.data.email);
			$("#editId").val(resp.data.id);
			editModal.show();
		},
		error : function (error) {
			alert(error);
		}
	});
}

function update() {
	var payload = {
		fname : $("#editFname").val(),
		email : $("#editEmail").val()
	}
	
	var id = $("#editId").val();
		
	$.ajax({
		url : API,
		type : "POST",
		data : "action=update&id=" + id + "&payload=" + JSON.stringify(payload),
		success : function(response) {
			let resp = JSON.parse(response);
			alert(resp.message);
			if (resp.status == "success") {
				$("#editModal").modal("hide");
				get();
			}
		},
		error : function (error) {
			alert(error);
		}
	});		
}

function drop(id) {
	if (confirm("Are you sure you want to delete?")) {
		$.ajax({
		url : API,
		type : "POST",
		data : "action=drop&id=" + id,
		success : function(response) {
			let resp = JSON.parse(response);
			alert(resp.message);
			if (resp.status == "success") {
				get();
			}
		},
		error : function (error) {
			alert(error);
		}
	});
	}
}

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