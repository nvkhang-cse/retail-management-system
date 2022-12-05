function brandTable(index2, site_url) {
	"use strict";

	if (index2 == 1) {
		var table;
		var brand_data;

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/brand/loadbranddata",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				brand_data = response;
			},
		});

		table = $("#brandListTable").DataTable({
			data: brand_data.data,
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
				{ data: "code" },
				{ data: "name" },
				{ data: "address" },
				{ data: "district" },
				{ data: "city" },
				{ data: "phone" },
				{
					data: "central",
					render: function (data, type, row, meta) {
						if (row.central == "1") {
							return "Chi nhánh trung tâm";
						} else if (row.central == "2") {
							return "Chi nhánh phụ";
						} else {
							return "Chưa thiết lập";
						}
					},
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
				lengthMenu: "Hiển thị _MENU_ chi nhánh",
				info: "Hiển thị _START_ - _END_ trên tổng _TOTAL_ chi nhánh",
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
					columns: [1, 2, 3, 4, 5, 6, 7],
					text: "Hiển thị",
				},
			],
		});

		table.buttons().container().appendTo("#brand-wrapper .col-md-6:eq(0)");
	} else if (index2 == 2) {
		url_attr = "";
	}
}

// lgtm [js/unused-local-variable]
