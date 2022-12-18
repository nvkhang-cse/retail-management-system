function cashBookTable(index2, site_url) {
	"use strict";

	if (index2 == 1) {
		var table;
		var brand_data;
		var cashbook_data;
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

		brand_data.forEach((row) => {
			$("#brand_code").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/cashbook/loadcashbookdata",
			dataType: "json",
			data: { brand_code: $("#brand_code").val() },
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				cashbook_data = response;
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

		table = $("#cashbook_list_table").DataTable({
			data: cashbook_data.data,
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
				{
					data: "customer_code",
					render: function (data, type, row, meta) {
						let result = customer_data.data.find(
							(item) => item.customer_code == row.customer_code
						);
						if (result == undefined) {
							return "Khách lẻ";
						} else {
							return `${result.name}`;
						}
					},
				},
				{
					data: "type",
					render: function (data, type, row, meta) {
						if (row.type == 1) {
							return "Phiếu thu";
						} else if (row.type == 2) {
							return "Phiếu chi";
						}
					},
				},
				{ data: "created_by" },
				{ data: "value" },
				{ data: "created_at" },
				{
					data: null,
					defaultContent: `<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button><div class="dropdown-menu"><a class="dropdown-item" href="#">Chi tiết</a></div></div>`,
					className: "dt-body-center",
					searchable: false,
					orderable: false,
				},
			],
			order: [[1, "asc"]],
			responsive: true,
			autoWidth: false,
			language: {
				lengthMenu: "Hiển thị _MENU_ phiếu",
				info: "Hiển thị _START_ - _END_ trên tổng _TOTAL_ phiếu",
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

		table.buttons().container().appendTo("#cashbook_wrapper .col-md-6:eq(0)");

		$("#brand_code").on("change", function () {
			$.ajax({
				type: "POST",
				url: site_url + "api/dashboard/cashbook/loadcashbookdata",
				dataType: "json",
				data: { brand_code: $("#brand_code").val() },
				encode: true,
				async: false,
				headers: { Authorization: localStorage.getItem("auth_token") },
				success: function (response) {
					cashbook_data = response;
				},
			});

			table.clear().rows.add(cashbook_data.data).draw();
		});
	} else if (index2 == 2) {
		var brand_data;

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

		brand_data.forEach((row) => {
			$("#receipt_brand").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		$("form#receipt_data").submit(function (e) {
			e.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: site_url + "api/dashboard/cashbook/storenewreceiptincome",
				type: "POST",
				data: formData,
				headers: { Authorization: localStorage.getItem("auth_token") },
				contentType: false,
				processData: false,
				success: function (data) {
					window.location.href = site_url + "dashboard/cashbook";
				},
			});
		});
	} else if (index2 == 3) {
		var brand_data;

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

		brand_data.forEach((row) => {
			$("#receipt_brand").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		$("form#receipt_data").submit(function (e) {
			e.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: site_url + "api/dashboard/cashbook/storenewreceiptoutcome",
				type: "POST",
				data: formData,
				headers: { Authorization: localStorage.getItem("auth_token") },
				contentType: false,
				processData: false,
				success: function (data) {
					window.location.href = site_url + "dashboard/cashbook";
				},
			});
		});
	}
}
