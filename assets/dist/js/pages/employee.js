function employeeTable(index2) {
	"use strict";

	if (index2 == 3) {
		var table;
		var branch_data;
		var branch_code;
		var employee_data;
		var permission_data;

		branch_data = getBranchData();
		branch_data.forEach((row) => {
			$("#branch_code, #employee_branch").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		branch_code = $("#branch_code").val();
		employee_data = getEmployeeData(branch_code);
		permission_data = getPermissionData();

		permission_data.forEach((row) => {
			$("#employee_permission, #employee-filter-permission").append(
				'<option value="' + row.id + '">' + row.role_name + "</option>"
			);
		});

		$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
			var option = $("#employee-filter-permission option:selected").text();
			var permission = data[8];
			if ($("#employee-filter-permission").val() == 0 || permission == option) {
				return true;
			}
			return false;
		});

		$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
			var option = $("#employee-filter-status option:selected").text();
			var status = data[3];
			if ($("#employee-filter-status").val() == "" || status == option) {
				return true;
			}
			return false;
		});

		table = $("#employee_list_table").DataTable({
			data: employee_data,
			columnDefs: [
				{
					orderable: false,
					searchable: false,
					checkboxes: {
						selectRow: true,
					},
					targets: 0,
				},
				{
					visible: false,
					targets: [4, 5, 6],
				},
				{
					orderable: false,
					targets: [3, 8],
				},
			],
			columns: [
				{ data: null },
				{ data: "email" },
				{ data: "fullname" },
				{
					data: "state",
					render: function (data, type, row, meta) {
						if (row.state == 1) {
							return "Đang làm";
						} else {
							return "Đang nghỉ";
						}
					},
				},
				{ data: "address" },
				{ data: "district" },
				{ data: "city" },
				{ data: "phone" },
				{
					data: "permission",
					render: function (data, type, row, meta) {
						let result = permission_data.find(
							(item) => item.id == row.permission
						);
						if (result == undefined) {
							return "Chưa phân quyền";
						} else {
							return `${result.role_name}`;
						}
					},
				},
				{
					data: "id",
					render: function (data, type, row, meta) {
						var item = `<div class="btn-group">
								<button
									type="button"
									class="btn btn-default dropdown-toggle dropdown-icon"
									data-toggle="dropdown"
								></button>
								<div class="dropdown-menu">
									<a
										class="btn dropdown-item edit-employee-info" data-value="${row.id}"
									>Chỉnh sửa
									</a>
									<a
										class="btn dropdown-item delete-employee" data-value="${row.id}"
									>Xóa
									</a>
								</div>
							</div>`;
						return item;
					},
					className: "dt-body-center",
					searchable: false,
					orderable: false,
				},
			],
			order: [[1, "asc"]],
			responsive: true,
			autoWidth: false,
			language: {
				lengthMenu: "Hiển thị _MENU_ nhân viên",
				info: "Hiển thị _START_ - _END_ trên tổng _TOTAL_ nhân viên",
				paginate: {
					first: '<i class="fa fa-angle-double-left" ></i> Đầu tiên',
					previous: '<i class="fa fa-angle-double-left" ></i> Trước',
					next: 'Sau <i class="fa fa-angle-double-right" ></i>',
					last: 'Cuối cùng <i class="fa fa-angle-double-right" ></i>',
				},
				search: "Tìm kiếm",
				infoEmpty: "",
				infoFiltered: "",
				zeroRecords: "Không tìm thấy kết quả",
				emptyTable: "Không có dữ liệu",
			},
			lengthMenu: [
				[5, 10, -1],
				["5", "10", "Tất cả"],
			],
			buttons: [
				{
					extend: "copy",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6, 7, 8],
					},
					className: "btn btn-sm",
				},
				{
					extend: "csv",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6, 7, 8],
					},
					className: "btn btn-sm",
				},
				{
					extend: "excel",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6, 7, 8],
					},
					className: "btn btn-sm",
				},
				{
					extend: "pdf",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6, 7, 8],
					},
					className: "btn btn-sm",
				},
				{
					extend: "print",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6, 7, 8],
					},
					className: "btn btn-sm",
				},
				{
					extend: "colvis",
					columns: [1, 2, 3, 4, 5, 6, 7, 8],
					text: "Hiển thị",
				},
			],
		});
		table.buttons().container().appendTo("#employee_wrapper .col-md-6:eq(0)");

		$("#employee-filter-permission").on("change", function () {
			table.draw();
		});

		$("#employee-filter-status").on("change", function () {
			table.draw();
		});

		$("#branch_code").on("change", function () {
			branch_code = $("#branch_code").val();
			employee_data = getEmployeeData(branch_code);
			table.clear().rows.add(employee_data).draw();
		});
		$(".paginate_button, #branch_code, #employee_list_table").on(
			"click",
			function () {
				$(".edit-employee-info").on("click", function () {
					var employee_id = $(this).data("value");
					var employee_info = getEmployeeInfoByCode(employee_id);
					$("#employee_code").val(employee_id);
					$("#employee_name").val(employee_info[0]["fullname"]);
					$("#employee_phone").val(employee_info[0]["phone"]);
					$("#employee_birthday").val(employee_info[0]["birthday"]);
					$("#employee_email").val(employee_info[0]["email"]);
					$("#employee_password").val(employee_info[0]["pwd"]);
					$("#employee_confirm").val(employee_info[0]["pwd"]);
					$("#employee_address").val(employee_info[0]["address"]);
					$("#employee_district").val(employee_info[0]["district"]);
					$("#employee_city").val(employee_info[0]["city"]);
					$("#employee_branch").val(employee_info[0]["branch_code"]);
					$("#employee_permission").val(employee_info[0]["permission"]);
					$("#employee_status").val(employee_info[0]["state"]);
					$("#employee_created_at").val(employee_info[0]["created_at"]);
					$("#employee_updated_at").val(employee_info[0]["updated_at"]);
					$("#editEmployeeInfo").modal("toggle");
				});

				$("#editEmployeeForm").submit(function (e) {
					e.preventDefault();
					var formData = new FormData(this);
					$.ajax({
						url: site_url + "api/dashboard/employee/updateemployeeinfobycode",
						type: "POST",
						data: formData,
						headers: { Authorization: localStorage.getItem("auth_token") },
						contentType: false,
						processData: false,
						success: function (response) {
							window.location.href = site_url + "dashboard/employee";
						},
					});
				});

				$(".delete-employee").on("click", function () {
					var employee_code = $(this).data("value");

					$.ajax({
						url: site_url + "api/dashboard/employee/deleteemployeebycode",
						type: "POST",
						dataType: "json",
						data: { employee_code: employee_code },
						encode: true,
						headers: { Authorization: localStorage.getItem("auth_token") },
						success: function (response) {
							window.location.href = site_url + "dashboard/employee";
						},
					});
				});
			}
		);
	} else if (index2 == 4) {
		var branch_data;
		var permission_data;

		branch_data = getBranchData();

		permission_data = getPermissionData();

		branch_data.forEach((row) => {
			$("#employee_branch").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		permission_data.forEach((row) => {
			$("#employee_permission").append(
				'<option value="' + row.id + '">' + row.role_name + "</option>"
			);
		});

		$("form#employee_data").submit(function (e) {
			e.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: site_url + "api/dashboard/employee/storenewemployee",
				type: "POST",
				data: formData,
				headers: { Authorization: localStorage.getItem("auth_token") },
				contentType: false,
				processData: false,
				success: function (data) {
					window.location.href = site_url + "dashboard/employee";
				},
			});
		});
	}
}

function getEmployeeData(branch_code) {
	"use strict";
	var employee_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/employee/loademployeedata",
		dataType: "json",
		data: { branch_code: branch_code },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			employee_data = response.data;
		},
	});

	return employee_data;
}

function getPermissionData() {
	"use strict";
	var permission_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/permission/loadpermissiondata",
		dataType: "json",
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			permission_data = response.data;
		},
	});

	return permission_data;
}

function getNameOfEmployee(employee_id) {
	var employee_name;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/employee/getemployeename",
		dataType: "json",
		data: { employee_id: employee_id },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			employee_name = response.data;
		},
	});

	return employee_name;
}

function getEmployeeInfoByCode(employee_id) {
	var employee_info;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/employee/getemployeeinfo",
		dataType: "json",
		data: { employee_id: employee_id },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			employee_info = response.data;
		},
	});

	return employee_info;
}
