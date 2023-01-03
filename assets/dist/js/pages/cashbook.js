function cashBookTable(index2, site_url) {
	"use strict";

	if (index2 == 1) {
		var table;
		var branch_data;
		var branch_code;
		var cashbook_data;
		var customer_data;

		branch_data = getBranchData(site_url);
		branch_data.forEach((row) => {
			$("#branch_code").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		branch_code = $("#branch_code").val();
		cashbook_data = getCashBookData(site_url, branch_code);

		customer_data = getCustomerData(site_url);

		table = $("#cashbook_list_table").DataTable({
			data: cashbook_data,
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
						let result = customer_data.find(
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

		$("#branch_code").on("change", function () {
			branch_code = $("#branch_code").val();

			cashbook_data = getCashBookData(site_url, branch_code);

			table.clear().rows.add(cashbook_data).draw();
		});
	} else if (index2 == 2) {
		var branch_data;

		branch_data = getBranchData(site_url);

		branch_data.forEach((row) => {
			$("#receipt_branch").append(
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
		var branch_data;

		branch_data = getBranchData(site_url);

		branch_data.forEach((row) => {
			$("#receipt_branch").append(
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

function getCashBookData(site_url, branch_code) {
	"use strict";
	var cashbook_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/cashbook/loadcashbookdata",
		dataType: "json",
		data: { branch_code: branch_code },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			cashbook_data = response.data;
		},
	});

	return cashbook_data;
}
