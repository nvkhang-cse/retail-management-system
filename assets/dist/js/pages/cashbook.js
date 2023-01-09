function cashBookTable(index2) {
	"use strict";

	if (index2 == 1) {
		var table;
		var branch_data;
		var branch_code;
		var cashbook_data;
		var customer_data;

		branch_data = getBranchData();
		branch_data.forEach((row) => {
			$("#branch_code, #receipt_branch").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		branch_code = $("#branch_code").val();
		cashbook_data = getCashBookData(branch_code);

		customer_data = getCustomerData();

		$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
			var option = $("#receipt-filter-type option:selected").text();
			var status = data[3];
			if ($("#receipt-filter-type").val() == 0 || status == option) {
				return true;
			}
			return false;
		});

		var minDate = new DateTime($("#receipt-filter-start-date"));
		var maxDate = new DateTime($("#receipt-filter-end-date"));
		$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
			var min = minDate.val();
			var max = maxDate.val();
			var date = new Date(data[6].substring(0, 10));
			if (
				(min === null && max === null) ||
				(min === null && date <= max) ||
				(min <= date && max === null) ||
				(min <= date && date <= max)
			) {
				return true;
			}
			return false;
		});

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
					data: "code",
					render: function (data, type, row, meta) {
						var item = `<div class="btn-group">
								<button
									type="button"
									class="btn btn-default dropdown-toggle dropdown-icon"
									data-toggle="dropdown"
								></button>
								<div class="dropdown-menu">
									<a
										class="btn dropdown-item edit-cashbook-info" data-value="${row.code}"
									>Chỉnh sửa
									</a>
									<a
										class="btn dropdown-item delete-cashbook" data-value="${row.code}"
									>Xóa
									</a>
								</div>
							</div>`;
						return item;
					},
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
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6],
					},
					className: "btn btn-sm",
				},
				{
					extend: "csv",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6],
					},
					className: "btn btn-sm",
				},
				{
					extend: "excel",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6],
					},
					className: "btn btn-sm",
				},
				{
					extend: "pdf",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6],
					},
					className: "btn btn-sm",
				},
				{
					extend: "print",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6],
					},
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

		$("#receipt-filter-type").on("change", function () {
			table.draw();
		});

		$("#receipt-filter-start-date, #receipt-filter-end-date").on(
			"change",
			function () {
				table.draw();
			}
		);

		$("#branch_code").on("change", function () {
			branch_code = $("#branch_code").val();

			cashbook_data = getCashBookData(branch_code);

			table.clear().rows.add(cashbook_data).draw();
		});

		$(".paginate_button, #branch_code, #cashbook_list_table").on(
			"click",
			function () {
				$(".edit-cashbook-info").on("click", function () {
					var receipt_code = $(this).data("value");
					var receipt_info;
					$.ajax({
						type: "POST",
						data: { code: receipt_code },
						url: site_url + "api/dashboard/cashbook/getcashbookinfo",
						dataType: "json",
						encode: true,
						async: false,
						headers: { Authorization: localStorage.getItem("auth_token") },
						success: function (response) {
							receipt_info = response.data;
						},
					});
					var result = customer_data.find(
						(item) => item.customer_code == receipt_info[0]["customer_code"]
					);
					if (result == undefined) {
						$("#receipt_customer_code").val(0);
						$("#receipt_customer_code").text("Khách lẻ");
					} else {
						$("#receipt_customer_code").val(receipt_info[0]["customer_code"]);
					}
					$("#receipt_code").val(receipt_code);
					$("#receipt_type").val(receipt_info[0]["type"]);
					$("#receipt_value").val(receipt_info[0]["value"]);
					$("#receipt_branch").val(receipt_info[0]["branch"]);
					$("#receipt_created_by").val(receipt_info[0]["created_by"]);
					$("#receipt_created_at").val(receipt_info[0]["created_at"]);
					$("#editCashBookInfo").modal("toggle");
				});

				$("#editCashBookForm").submit(function (e) {
					e.preventDefault();
					var formData = new FormData(this);
					$.ajax({
						url: site_url + "api/dashboard/cashbook/updatecashbook",
						type: "POST",
						data: formData,
						headers: { Authorization: localStorage.getItem("auth_token") },
						contentType: false,
						processData: false,
						encode: true,
						success: function (response) {
							window.location.href = site_url + "dashboard/cashbook";
						},
					});
				});

				$(".delete-cashbook").on("click", function () {
					var receipt_code = $(this).data("value");

					$.ajax({
						url: site_url + "api/dashboard/cashbook/deletecashbookbycode",
						type: "POST",
						dataType: "json",
						data: { receipt_code: receipt_code },
						encode: true,
						headers: { Authorization: localStorage.getItem("auth_token") },
						success: function (response) {
							window.location.href = site_url + "dashboard/cashbook";
						},
					});
				});
			}
		);
	} else if (index2 == 2) {
		var branch_data;

		branch_data = getBranchData();

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

		branch_data = getBranchData();

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

function getCashBookData(branch_code) {
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
