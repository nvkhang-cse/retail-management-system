function employeeTable(index2, site_url) {
	"use strict";

	if (index2 == 3) {
		var table;
		var branch_data;
		var branch_code;
		var employee_data;
		var permission_data;

		branch_data = getBranchData(site_url);

		branch_data.forEach((row) => {
			$("#branch_code").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		branch_code = $("#branch_code").val();

		employee_data = getEmployeeData(site_url, branch_code);

		permission_data = getPermissionData(site_url);

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
					data: null,
					defaultContent: `<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button><div class="dropdown-menu"><a class="dropdown-item" href="#">Chỉnh sửa</a><a class="dropdown-item" href="#">Xoá</a></div></div>`,
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
					className: "btn btn-sm",
				},
				{
					extend: "csv",
					className: "btn btn-sm",
				},
				{
					extend: "excel",
					className: "btn btn-sm",
				},
				{
					extend: "pdf",
					className: "btn btn-sm",
				},
				{
					extend: "print",
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

		$("#branch_code").on("change", function () {
			branch_code = $("#branch_code").val();

			employee_data = getEmployeeData(site_url, branch_code);

			table.clear().rows.add(employee_data).draw();
		});
	} else if (index2 == 4) {
		var branch_data;
		var permission_data;

		branch_data = getBranchData(site_url);

		permission_data = getPermissionData(site_url);

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

function getEmployeeData(site_url, branch_code) {
	"use strict";
	var employee_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/employee/loademployeedata",
		dataType: "json",
		data: { branch_code: $("#branch_code").val() },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			employee_data = response.data;
		},
	});

	return employee_data;
}

function getPermissionData(site_url) {
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
