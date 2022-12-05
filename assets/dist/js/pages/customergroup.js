function customerGroupTable(index2, site_url) {
	"use strict";

	if (index2 == 3) {
		var table;
		var customer_group_data;

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/customergroup/loadtabledata",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				customer_group_data = response;
			},
		});

		table = $("#customerGroupListTable").DataTable({
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
				{ data: "id" },
				{ data: "name" },
				{ data: "code" },
				{ data: "description" },
				{
					data: null,
					defaultContent: "0",
				},
				{ data: "created_date" },
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
					columns: [1, 2, 3, 4, 5],
					text: "Hiển thị",
				},
			],
		});

		table
			.buttons()
			.container()
			.appendTo("#customer-group-wrapper .col-md-6:eq(0)");
	} else if (index2 == 4) {
	}
}

// lgtm [js/unused-local-variable]
