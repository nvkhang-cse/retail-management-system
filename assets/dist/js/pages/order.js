function order(index2) {
	"use strict";

	if (index2 == 1) {
		var table;
		var branch_data;
		var order_data;
		var customer_data;

		branch_data = getBranchData();
		branch_data.forEach((row) => {
			$("#branch_code").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		order_data = getOrderData($("#branch_code").val());
		customer_data = getCustomerData();

		$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
			var option = $("#order-filter-status option:selected").text();
			var status = data[4];
			if ($("#order-filter-status").val() == 0 || status == option) {
				return true;
			}
			return false;
		});

		var minDate = new DateTime($("#order-filter-start-date"));
		var maxDate = new DateTime($("#order-filter-end-date"));
		$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
			var min = minDate.val();
			var max = maxDate.val();
			var date = new Date(data[2].substring(0, 10));
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

		table = $("#order_list_table").DataTable({
			data: order_data,
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
					targets: [4],
				},
			],
			columns: [
				{ data: "id" },
				{ data: "order_code" },
				{ data: "created_at" },
				{
					data: "customer",
					render: function (data, type, row, meta) {
						let result = customer_data.find(
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
							return "Đang giao";
						} else if (row.status == "3") {
							return "Đã hủy";
						}
					},
				},
				{ data: "final_payment" },
				{
					data: "order_code",
					render: function (data, type, row, meta) {
						var item;
						if (row.status == "1") {
							item = `<div class="btn-group menu-for-view">
								<button
									type="button"
									class="btn btn-default dropdown-toggle dropdown-icon"
									data-toggle="dropdown"
								></button>
								<div class="dropdown-menu">
									<a
										class="btn dropdown-item view-order-detail" data-value="${row.order_code}"
									>Chi tiết
									</a>
								</div>
							</div>`;
						} else if (row.status == "2") {
							item = `<div class="btn-group menu-for-view">
								<button
									type="button"
									class="btn btn-default dropdown-toggle dropdown-icon"
									data-toggle="dropdown"
								></button>
								<div class="dropdown-menu">
									<a
										class="btn dropdown-item view-order-detail" data-value="${row.order_code}"
									>Chi tiết
									</a>
									<a
										class="btn dropdown-item complete-order-online" data-value="${row.order_code}"
									>Đã giao
									</a>
									<a
										class="btn dropdown-item cancel-order-online" data-value="${row.order_code}"
									>Hủy
									</a>
								</div>
							</div>`;
						} else if (row.status == "3") {
							item = `<div class="btn-group menu-for-view">
								<button
									type="button"
									class="btn btn-default dropdown-toggle dropdown-icon"
									data-toggle="dropdown"
								></button>
								<div class="dropdown-menu">
									<a
										class="btn dropdown-item view-order-detail" data-value="${row.order_code}"
									>Chi tiết
									</a>
								</div>
							</div>`;
						} else {
							item = "";
						}
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
					exportOptions: {
						columns: [1, 2, 3, 4, 5],
					},
					className: "btn btn-sm",
				},
				{
					extend: "csv",
					exportOptions: {
						columns: [1, 2, 3, 4, 5],
					},
					className: "btn btn-sm",
				},
				{
					extend: "excel",
					exportOptions: {
						columns: [1, 2, 3, 4, 5],
					},
					className: "btn btn-sm",
				},
				{
					extend: "pdf",
					exportOptions: {
						columns: [1, 2, 3, 4, 5],
					},
					className: "btn btn-sm",
				},
				{
					extend: "print",
					exportOptions: {
						columns: [1, 2, 3, 4, 5],
					},
					className: "btn btn-sm",
				},
				{
					extend: "colvis",
					columns: [1, 2, 3, 4, 5],
					text: "Hiển thị",
				},
			],
		});

		table.buttons().container().appendTo("#order_wrapper .col-md-6:eq(0)");

		$("#order-filter-status").on("change", function () {
			table.draw();
		});

		$("#order-filter-start-date, #order-filter-end-date").on(
			"change",
			function () {
				table.draw();
			}
		);

		$("#branch_code").on("change", function () {
			order_data = getOrderData($("#branch_code").val());
			table.clear().rows.add(order_data).draw();
		});

		$(".paginate_button, #branch_code, #order_list_table").on(
			"click",
			function () {
				$(".view-order-detail").on("click", function () {
					var order_code = $(this).data("value");
					var order_info = getOrderInfoByCode(order_code);
					var staff_name = getNameOfEmployee(order_info[0]["staff"]);
					var order_detail = getOrderDetailList(order_code);
					$("#order-detail-table tbody").empty();
					var order_detail_table = $("#order-detail-table tbody");
					order_detail.forEach((row) => {
						order_detail_table.append(
							`
						<tr>
							<td>${row.barcode}</td>
							<td>${row.product_name}</td>
							<td>${row.quantity}</td>
							<td>${row.product_price}</td>
							<td>${row.subtotal_price}</td>
							<td>${row.discount}%</td>
						</tr>
						`
						);
					});

					var result = customer_data.find(
						(item) => item.customer_code == order_info[0]["customer"]
					);

					if (result == undefined) {
						$("#order_customer").val("Khách lẻ");
					} else {
						$("#order_customer").val(result.name);
					}

					$("#order_code").val(order_info[0]["order_code"]);
					$("#order_total_price").val(order_info[0]["total_price"]);
					$("#order_discount").val(order_info[0]["discount"]);
					$("#order_discount_bill").val(
						order_info[0]["discount_bill"] +
							(order_info[0]["discount_bill_type"] == "1" ? "VND" : "%")
					);
					$("#order_payment").val(order_info[0]["final_payment"]);
					$("#order_customer_money").val(order_info[0]["customer_money"]);
					$("#order_customer_change").val(order_info[0]["customer_change"]);
					$("#order_staff").val(staff_name[0]["fullname"]);
					$("#order_created_at").val(order_info[0]["created_at"]);
					$("#viewOrderDetail").modal("toggle");
				});

				$(".complete-order-online").on("click", function () {
					var order_code = $(this).data("value");

					$.ajax({
						url: site_url + "api/dashboard/order/confirmorderonline",
						type: "POST",
						dataType: "json",
						data: { order_code: order_code },
						encode: true,
						headers: { Authorization: localStorage.getItem("auth_token") },
						success: function (response) {
							window.location.href = site_url + "dashboard/order";
						},
					});
				});

				$(".cancel-order-online").on("click", function () {
					var order_code = $(this).data("value");

					$.ajax({
						url: site_url + "api/dashboard/order/cancelorderonline",
						type: "POST",
						dataType: "json",
						data: { order_code: order_code },
						encode: true,
						headers: { Authorization: localStorage.getItem("auth_token") },
						success: function (response) {
							window.location.href = site_url + "dashboard/order";
						},
					});
				});
			}
		);
	}
}

function getOrderData(branch_code) {
	var order_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/order/loadorderdata",
		dataType: "json",
		data: { branch_code: $("#branch_code").val() },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			order_data = response.data;
		},
	});

	return order_data;
}

function getOrderInfoByCode(order_code) {
	"use strict";
	var order_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/order/getorderinfobycode",
		dataType: "json",
		data: { order_code: order_code },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			order_data = response.data;
		},
	});

	return order_data;
}

function getOrderDetailList(order_code) {
	"use strict";
	var order_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/order/getorderdetaillist",
		dataType: "json",
		data: { order_code: order_code },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			order_data = response.data;
		},
	});

	return order_data;
}
