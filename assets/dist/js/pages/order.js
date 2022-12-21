function order(index2, site_url) {
	"use strict";

	if (index2 == 1) {
		var table;
		var brand_data;
		var order_data;
		var customer_data;

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/brand/loadbranddata",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				brand_data = response.data;
			},
		});

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

		brand_data.forEach((row) => {
			$("#brand_code").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/order/loadorderdata",
			dataType: "json",
			data: { brand_code: $("#brand_code").val() },
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				order_data = response;
			},
		});

		table = $("#order_list_table").DataTable({
			data: order_data.data,
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
				{ data: "order_code" },
				{ data: "created_at" },
				{
					data: "customer",
					render: function (data, type, row, meta) {
						let result = customer_data.data.find(
							(item) => item.customer_code == row.customer
						);
						if (result == undefined) {
							return "Khách lẻ";
						} else {
							return `${result.name}`;
						}
					},
				},
				{
					data: "status",
					render: function (data, type, row, meta) {
						if (row.status == "1") {
							return "Đã thanh toán";
						} else if (row.status == "2") {
							return "Trả hàng";
						}
					},
				},
				{ data: "final_payment" },
				{ data: "staff" },
				{
					data: null,
					defaultContent: `<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button><div class="dropdown-menu"><a class="dropdown-item" href="#">Chi tiết</a><a class="dropdown-item" href="#">Trả hàng</a></div></div>`,
					className: "dt-body-center",
					searchable: false,
					orderable: false,
				},
			],
			order: [[1, "asc"]],
			responsive: true,
			autoWidth: false,
			language: {
				lengthMenu: "Hiển thị _MENU_ đơn hàng",
				info: "Hiển thị _START_ - _END_ trên tổng _TOTAL_ đơn hàng",
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
					columns: [1, 2, 3, 4, 5, 6],
					text: "Hiển thị",
				},
			],
		});

		table.buttons().container().appendTo("#order_wrapper .col-md-6:eq(0)");

		$("#brand_code").on("change", function () {
			$.ajax({
				type: "POST",
				url: site_url + "api/dashboard/order/loadorderdata",
				dataType: "json",
				data: { brand_code: $("#brand_code").val() },
				encode: true,
				async: false,
				headers: { Authorization: localStorage.getItem("auth_token") },
				success: function (response) {
					order_data = response;
				},
			});

			table.clear().rows.add(order_data.data).draw();
		});
	}
}
