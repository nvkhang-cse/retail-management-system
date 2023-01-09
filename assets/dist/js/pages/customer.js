function customerTable(index2) {
	"use strict";

	if (index2 == 1) {
		var table;
		var customer_data;
		var customer_group_data;

		customer_data = getCustomerData();

		customer_group_data = getCustomerGroupData();

		table = $("#customer_list_table").DataTable({
			data: customer_data,
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
				{ data: null },
				{ data: "name" },
				{ data: "phone" },
				{
					data: "group_code",
					render: function (data, type, row, meta) {
						let result = customer_group_data.find(
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
					data: "customer_code",
					render: function (data, type, row, meta) {
						var item = `<div class="btn-group">
								<button
									type="button"
									class="btn btn-default dropdown-toggle dropdown-icon"
									data-toggle="dropdown"
								></button>
								<div class="dropdown-menu">
									<a
										class="btn dropdown-item edit-customer-info" data-value="${row.customer_code}"
									>Chỉnh sửa
									</a>
									<a
										class="btn dropdown-item delete-customer" data-value="${row.customer_code}"
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
					exportOptions: {
						columns: [1, 2, 3, 4],
					},
					className: "btn btn-sm",
				},
				{
					extend: "csv",
					exportOptions: {
						columns: [1, 2, 3, 4],
					},
					className: "btn btn-sm",
				},
				{
					extend: "excel",
					exportOptions: {
						columns: [1, 2, 3, 4],
					},
					className: "btn btn-sm",
				},
				{
					extend: "pdf",
					exportOptions: {
						columns: [1, 2, 3, 4],
					},
					className: "btn btn-sm",
				},
				{
					extend: "print",
					exportOptions: {
						columns: [1, 2, 3, 4],
					},
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

		customer_group_data.forEach((row) => {
			$("#customer_group").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});
		$(".paginate_button, #customer_list_table").on("click", function () {
			$(".edit-customer-info").on("click", function () {
				var customer_code = $(this).data("value");
				var customer_info;
				$.ajax({
					type: "POST",
					data: { code: customer_code },
					url: site_url + "api/dashboard/customer/getcustomerinfo",
					dataType: "json",
					encode: true,
					async: false,
					headers: { Authorization: localStorage.getItem("auth_token") },
					success: function (response) {
						customer_info = response.data;
					},
				});
				$("#customer_code").val(customer_code);
				$("#customer_name").val(customer_info[0]["name"]);
				$("#customer_group").val(customer_info[0]["group_code"]);
				$("#customer_email").val(customer_info[0]["email"]);
				$("#customer_phone").val(customer_info[0]["phone"]);
				$("#customer_address").val(customer_info[0]["address"]);
				$("#customer_district").val(customer_info[0]["district"]);
				$("#customer_city").val(customer_info[0]["city"]);
				$("#customer_created_at").val(customer_info[0]["created_date"]);
				$("#customer_updated_at").val(customer_info[0]["updated_date"]);
				$("#editCustomerInfo").modal("toggle");
			});

			$("#editCustomerForm").submit(function (e) {
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url: site_url + "api/dashboard/customer/updatecustomer",
					type: "POST",
					data: formData,
					headers: { Authorization: localStorage.getItem("auth_token") },
					contentType: false,
					processData: false,
					encode: true,
					success: function (response) {
						window.location.href = site_url + "dashboard/customer";
					},
				});
			});

			$(".delete-customer").on("click", function () {
				var customer_code = $(this).data("value");

				$.ajax({
					url: site_url + "api/dashboard/customer/deletecustomerbycode",
					type: "POST",
					dataType: "json",
					data: { customer_code: customer_code },
					encode: true,
					headers: { Authorization: localStorage.getItem("auth_token") },
					success: function (response) {
						window.location.href = site_url + "dashboard/customer";
					},
				});
			});
		});
	} else if (index2 == 2) {
		var customer_group_data;

		customer_group_data = getCustomerGroupData();

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
		var total_info;

		customer_group_data = getCustomerGroupData();
		total_info = getTotalCustomer();

		table = $("#customer_group_list_table").DataTable({
			data: customer_group_data,
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
				{ data: null },
				{ data: "name" },
				{ data: "description" },
				{ data: "discount" },
				{
					data: "code",
					render: function (data, type, row, meta) {
						let result = total_info.find((item) => item.code == row.code);
						if (result == undefined) {
							return 0;
						} else {
							return `${result.total}`;
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
										class="btn dropdown-item edit-customer-group-info" data-value="${row.code}"
									>Chỉnh sửa
									</a>
									<a
										class="btn dropdown-item delete-customer-group" data-value="${row.code}"
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

		$(".paginate_button, #customer_group_list_table").on("click", function () {
			$(".edit-customer-group-info").on("click", function () {
				var customer_group_code = $(this).data("value");
				var customer_group_info;
				$.ajax({
					type: "POST",
					data: { code: customer_group_code },
					url: site_url + "api/dashboard/customergroup/getcustomergroupinfo",
					dataType: "json",
					encode: true,
					async: false,
					headers: { Authorization: localStorage.getItem("auth_token") },
					success: function (response) {
						customer_group_info = response.data;
					},
				});
				$("#customer_group_code").val(customer_group_code);
				$("#customer_group_name").val(customer_group_info[0]["name"]);
				$("#customer_group_description").val(
					customer_group_info[0]["description"]
				);
				$("#customer_group_discount").val(customer_group_info[0]["discount"]);
				$("#customer_spend_from").val(customer_group_info[0]["spend_from"]);
				$("#customer_spend_to").val(customer_group_info[0]["spend_to"]);
				$("#customer_group_created_at").val(
					customer_group_info[0]["created_date"]
				);
				$("#customer_group_updated_at").val(
					customer_group_info[0]["updated_date"]
				);
				$("#editCustomerGroupInfo").modal("toggle");
			});

			$("#editCustomerGroupForm").submit(function (e) {
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url: site_url + "api/dashboard/customergroup/updatecustomergroup",
					type: "POST",
					data: formData,
					headers: { Authorization: localStorage.getItem("auth_token") },
					contentType: false,
					processData: false,
					success: function (response) {
						window.location.href = site_url + "dashboard/customergroup";
					},
				});
			});

			$(".delete-customer-group").on("click", function () {
				var customer_group_code = $(this).data("value");

				$.ajax({
					url:
						site_url + "api/dashboard/customergroup/deletecustomergroupbycode",
					type: "POST",
					dataType: "json",
					data: { customer_group_code: customer_group_code },
					encode: true,
					headers: { Authorization: localStorage.getItem("auth_token") },
					success: function (response) {
						window.location.href = site_url + "dashboard/customergroup";
					},
				});
			});
		});
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

function getCustomerData() {
	"use strict";

	var customer_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/customer/loadcustomerdata",
		dataType: "json",
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			customer_data = response.data;
		},
	});

	return customer_data;
}

function getCustomerGroupData() {
	"use strict";

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

	return customer_group_data;
}

function getCustomerInfoByCode(customer_code) {
	var customer_info;

	$.ajax({
		type: "POST",
		data: { code: customer_code },
		url: site_url + "api/dashboard/customer/getcustomerinfo",
		dataType: "json",
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			customer_info = response.data;
		},
	});

	return customer_info;
}

function getTotalCustomer() {
	var total_info;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/customer/gettotalcustomerofgroup",
		dataType: "json",
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			total_info = response.data;
		},
	});

	return total_info;
}
