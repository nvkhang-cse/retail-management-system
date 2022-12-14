function customerTable(index2, site_url) {
	"use strict";

	if (index2 == 1) {
		var table;
		var customer_data;
		var customer_group_data;

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/customer/loadcustomerdata",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				customer_data = response;
			},
		});

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/customergroup/loadcustomergroupdata",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				customer_group_data = response;
			},
		});

		table = $("#customer_list_table").DataTable({
			data: customer_data.data,
			columnDefs: [
				{
					orderable: false,
					searchable: false,
					checkboxes: {
						selectRow: true,
					},
					targets: 0,
				},
			],
			columns: [
				{ data: "customer_code" },
				{ data: "name" },
				{ data: "phone" },
				{
					data: "group_code",
					render: function (data, type, row, meta) {
						let result = customer_group_data.data.find(
							(item) => item.code == row.group_code
						);
						if (result == undefined) {
							return "Chưa phân nhóm";
						} else {
							return `${result.name}`;
						}
					},
				},
				{ data: "spend" },
				{
					data: null,
					defaultContent: `<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button><div class="dropdown-menu"><a class="dropdown-item" href="#">Chi tiết</a><a class="dropdown-item" href="#">Sửa</a><a class="dropdown-item" href="#">Xoá</a></div></div>`,
					className: "dt-body-center",
					searchable: false,
					orderable: false,
				},
			],
			order: [[1, "asc"]],
			responsive: true,
			autoWidth: false,
			language: {
				lengthMenu: "Hiển thị _MENU_ khách hàng",
				info: "Hiển thị _START_ - _END_ trên tổng _TOTAL_ khách hàng",
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
					columns: [1, 2, 3, 4],
					text: "Hiển thị",
				},
			],
		});

		table.buttons().container().appendTo("#customer_wrapper .col-md-6:eq(0)");
	} else if (index2 == 2) {
		var customer_group_data;

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/customergroup/loadcustomergroupdata",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				customer_group_data = response.data;
			},
		});

		customer_group_data.forEach((row) => {
			$("#customer_group").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		$("form#customer_data").submit(function (e) {
			e.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: site_url + "api/dashboard/customer/storenewcustomer",
				type: "POST",
				data: formData,
				headers: { Authorization: localStorage.getItem("auth_token") },
				contentType: false,
				processData: false,
				success: function (data) {
					window.location.href = site_url + "dashboard/customer";
				},
			});
		});
	} else if (index2 == 3) {
		var table;
		var customer_group_data;

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/customergroup/loadcustomergroupdata",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				customer_group_data = response;
			},
		});

		table = $("#customer_group_list_table").DataTable({
			data: customer_group_data.data,
			columnDefs: [
				{
					orderable: false,
					searchable: false,
					checkboxes: {
						selectRow: true,
					},
					targets: 0,
				},
			],
			columns: [
				{ data: "code" },
				{ data: "name" },
				{ data: "description" },
				{ data: "discount" },
				{
					data: null,
					defaultContent: "2",
				},
				{
					data: null,
					defaultContent: `<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button><div class="dropdown-menu"><a class="dropdown-item" href="#">Chi tiết</a><a class="dropdown-item" href="#">Sửa</a><a class="dropdown-item" href="#">Xoá</a></div></div>`,
					className: "dt-body-center",
					searchable: false,
					orderable: false,
				},
			],
			order: [[1, "asc"]],
			responsive: true,
			autoWidth: false,
			language: {
				lengthMenu: "Hiển thị _MENU_ nhóm khách hàng",
				info: "Hiển thị _START_ - _END_ trên tổng _TOTAL_ nhóm khách hàng",
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
					columns: [1, 2, 3, 4],
					text: "Hiển thị",
				},
			],
		});

		table
			.buttons()
			.container()
			.appendTo("#customer_group_wrapper .col-md-6:eq(0)");
	} else if (index2 == 4) {
		$("form#customer_group_data").submit(function (e) {
			e.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: site_url + "api/dashboard/customergroup/storenewcustomergroup",
				type: "POST",
				data: formData,
				headers: { Authorization: localStorage.getItem("auth_token") },
				contentType: false,
				processData: false,
				success: function (data) {
					window.location.href = site_url + "dashboard/customergroup";
				},
			});
		});
	}
}
