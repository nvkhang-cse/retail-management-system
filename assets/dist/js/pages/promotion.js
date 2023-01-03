function promotionTable(index2, site_url) {
	"use strict";

	if (index2 == 1) {
		var table;
		var branch_data;
		var promotion_data;

		branch_data = getBranchData(site_url);

		branch_data.forEach((row) => {
			$("#branch_code").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/promotion/loadpromotiondata",
			dataType: "json",
			data: { branch_code: $("#branch_code").val() },
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				promotion_data = response.data;
			},
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
			],
			columns: [
				{ data: "code" },
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
						}
					},
				},
				{ data: "start_date" },
				{ data: "end_date" },
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

		table.buttons().container().appendTo("#promotion_wrapper .col-md-6:eq(0)");

		$("#branch_code").on("change", function () {
			$.ajax({
				type: "POST",
				url: site_url + "api/dashboard/promotion/loadpromotiondata",
				dataType: "json",
				data: { branch_code: $("#branch_code").val() },
				encode: true,
				async: false,
				headers: { Authorization: localStorage.getItem("auth_token") },
				success: function (response) {
					promotion_data = response.data;
				},
			});

			table.clear().rows.add(promotion_data).draw();
		});
	} else if (index2 == 2) {
		var branch_data;
		var promotion_type = $("#promotion_type");
		var promotion_total_bill_wrapper = $("#promotion_total_bill_wrapper");
		var promotion_product_wrapper = $("#promotion_product_wrapper");

		promotion_type.on("change", function () {
			if (promotion_type.val() == 1) {
				promotion_total_bill_wrapper.toggleClass("d-none");
				if (!promotion_product_wrapper.hasClass("d-none")) {
					promotion_product_wrapper.addClass("d-none");
				}
			} else if (promotion_type.val() == 2) {
				promotion_product_wrapper.toggleClass("d-none");
				if (!promotion_total_bill_wrapper.hasClass("d-none")) {
					promotion_total_bill_wrapper.addClass("d-none");
				}
			}
		});

		branch_data = getBranchData(site_url);

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
