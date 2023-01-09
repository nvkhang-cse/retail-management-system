function promotionTable(index2) {
	"use strict";

	if (index2 == 1) {
		var table;
		var branch_data;
		var branch_code;
		var promotion_data;

		branch_data = getBranchData();
		branch_data.forEach((row) => {
			$("#branch_code, #promotion_branch").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		branch_code = $("#branch_code").val();
		promotion_data = getPromotionData(branch_code);

		$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
			var option = $("#promotion-filter-bill-type option:selected").text();
			var status = data[7];
			if (option == "Chọn phương thức giảm" || option == status) {
				return true;
			}
			return false;
		});

		var newDate = new DateTime($("#promotion-filter-date"));

		$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
			var dateCheck = newDate.val();
			var startDate = new Date(data[3]);
			var endDate = new Date(data[4]);

			if (
				dateCheck === null ||
				(startDate <= dateCheck && dateCheck <= endDate)
			) {
				return true;
			}
			return false;
		});

		$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
			var bill_check = parseInt($("#promotion-filter-bill-value").val());
			var bill_from = parseInt(data[5]) || 0;
			var bill_to = parseInt(data[6]) || 0;

			if (
				isNaN(bill_check) ||
				(isNaN(bill_from) && isNaN(bill_to)) ||
				(isNaN(bill_from) && bill_check <= bill_to) ||
				(bill_from <= bill_check && isNaN(bill_to)) ||
				(bill_from <= bill_check && bill_check <= bill_to)
			) {
				return true;
			}
			return false;
		});

		table = $("#promotion_list_table").DataTable({
			data: promotion_data,
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
					orderable: false,
					targets: [2, 7, 8],
				},
			],
			columns: [
				{ data: null },
				{ data: "name" },
				{
					data: "type",
					render: function (data, type, row, meta) {
						if (row.type == "1") {
							return "Hóa đơn";
						} else if (row.type == "2") {
							return "Quà tặng sản phẩm";
						} else if (row.type == "3") {
							return "Loại sản phẩm";
						} else {
							return "Chưa phân loại";
						}
					},
				},
				{ data: "start_date" },
				{ data: "end_date" },
				{ data: "bill_from" },
				{ data: "bill_to" },
				{
					data: "bill_type",
					render: function (data, type, row, meta) {
						if (row.bill_type == "1") {
							return "Giảm trực tiếp";
						} else if (row.bill_type == "2") {
							return "Chiết khấu";
						} else {
							return "Chưa thiết lập";
						}
					},
				},
				{
					data: "bill_value",
					render: function (data, type, row, meta) {
						if (row.bill_type == "1") {
							return row.bill_value;
						} else {
							return row.bill_value + "%";
						}
					},
				},
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
										class="btn dropdown-item edit-promotion-info" data-value="${row.code}"
									>Chỉnh sửa
									</a>
									<a
										class="btn dropdown-item delete-promotion" data-value="${row.code}"
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
				lengthMenu: "Hiển thị _MENU_ khuyến mãi",
				info: "Hiển thị _START_ - _END_ trên tổng _TOTAL_ khuyến mãi",
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
		table.buttons().container().appendTo("#promotion_wrapper .col-md-6:eq(0)");

		$("#promotion-filter-bill-type").on("change", function () {
			table.draw();
		});

		$("#promotion-filter-date").on("change", function () {
			table.draw();
		});

		$("#promotion-filter-bill-value").on("change", function () {
			table.draw();
		});

		$("#branch_code").on("change", function () {
			branch_code = $("#branch_code").val();
			promotion_data = getPromotionData(branch_code);
			table.clear().rows.add(promotion_data).draw();
		});

		$(".paginate_button, #branch_code, #promotion_list_table").on(
			"click",
			function () {
				$(".edit-promotion-info").on("click", function () {
					var promotion_code = $(this).data("value");
					var promotion_info = getPromotionInfoByCode(
						branch_code,
						promotion_code
					);
					var created_name = getNameOfEmployee(promotion_info[0]["created_by"]);
					$("#promotion_code").val(promotion_code);
					$("#promotion_name").val(promotion_info[0]["name"]);
					$("#promotion_type").val(promotion_info[0]["type"]);
					$("#promotion_branch").val(promotion_info[0]["branch"]);
					$("#promotion_start_date").val(promotion_info[0]["start_date"]);
					$("#promotion_end_date").val(promotion_info[0]["end_date"]);
					$("#promotion_total_bill_from").val(promotion_info[0]["bill_from"]);
					$("#promotion_total_bill_to").val(promotion_info[0]["bill_to"]);
					$("#promotion_discount_type").val(promotion_info[0]["bill_type"]);
					$("#promotion_discount_value").val(promotion_info[0]["bill_value"]);
					$("#promotion_created_at").val(promotion_info[0]["created_at"]);
					$("#promotion_updated_at").val(promotion_info[0]["updated_at"]);
					$("#promotion_created_by").val(created_name[0]["fullname"]);
					$("#editPromotionInfo").modal("toggle");
				});

				$("#editPromotionForm").submit(function (e) {
					e.preventDefault();
					var formData = new FormData(this);
					$.ajax({
						url: site_url + "api/dashboard/promotion/updatepromotioninfobycode",
						type: "POST",
						data: formData,
						headers: { Authorization: localStorage.getItem("auth_token") },
						contentType: false,
						processData: false,
						success: function (response) {
							window.location.href = site_url + "dashboard/promotion";
						},
					});
				});

				$(".delete-promotion").on("click", function () {
					var confirm = window.confirm("Xóa khuyến mãi đã chọn?");
					if (confirm == true) {
						var promotion_code = $(this).data("value");

						$.ajax({
							url: site_url + "api/dashboard/promotion/deletepromotion",
							type: "POST",
							dataType: "json",
							data: { promotion_code: promotion_code },
							encode: true,
							headers: { Authorization: localStorage.getItem("auth_token") },
							success: function (response) {
								window.location.href = site_url + "dashboard/promotion";
							},
						});
					}
				});
			}
		);
	} else if (index2 == 2) {
		var branch_data;

		// var promotion_type = $("#promotion_type");
		// var promotion_total_bill_wrapper = $("#promotion_total_bill_wrapper");
		// var promotion_product_wrapper = $("#promotion_product_wrapper");

		// promotion_type.on("change", function () {
		// 	if (promotion_type.val() == 1) {
		// 		promotion_total_bill_wrapper.toggleClass("d-none");
		// 		if (!promotion_product_wrapper.hasClass("d-none")) {
		// 			promotion_product_wrapper.addClass("d-none");
		// 		}
		// 	} else if (promotion_type.val() == 2) {
		// 		promotion_product_wrapper.toggleClass("d-none");
		// 		if (!promotion_total_bill_wrapper.hasClass("d-none")) {
		// 			promotion_total_bill_wrapper.addClass("d-none");
		// 		}
		// 	}
		// });

		branch_data = getBranchData();
		branch_data.forEach((row) => {
			$("#promotion_branch").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		$("form#promotion_data").submit(function (e) {
			e.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: site_url + "api/dashboard/promotion/storenewpromotion",
				type: "POST",
				data: formData,
				headers: { Authorization: localStorage.getItem("auth_token") },
				contentType: false,
				processData: false,
				success: function (data) {
					window.location.href = site_url + "dashboard/promotion";
				},
			});
		});
	}
}

function getPromotionData(branch_code) {
	"use strict";
	var promotion_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/promotion/loadpromotiondata",
		dataType: "json",
		data: { branch_code: branch_code },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			promotion_data = response.data;
		},
	});

	return promotion_data;
}

function getPromotionInfoByCode(branch_code, promotion_code) {
	"use strict";
	var promotion_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/promotion/getpromotioninfobycode",
		dataType: "json",
		data: { branch_code: branch_code, promotion_code: promotion_code },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			promotion_data = response.data;
		},
	});

	return promotion_data;
}

function searchPromotion(branch_code, date_to_search) {
	"use strict";
	var promotion_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/promotion/searchpromotion",
		dataType: "json",
		data: { branch_code: branch_code, date_to_search: date_to_search },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			promotion_data = response.data;
		},
	});

	return promotion_data;
}
