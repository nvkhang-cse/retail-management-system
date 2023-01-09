function branchTable(index2) {
	"use strict";

	if (index2 == 1) {
		var table;
		var branch_data;

		branch_data = getBranchListData();

		$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
			var option = $("#branch-filter-central option:selected").text();
			var central = data[6];
			if ($("#branch-filter-central").val() == 0 || central == option) {
				return true;
			}
			return false;
		});

		$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
			var option = $("#branch-filter-status option:selected").text();
			var status = data[7];
			if ($("#branch-filter-status").val() == "" || status == option) {
				return true;
			}
			return false;
		});

		table = $("#branch_list_table").DataTable({
			data: branch_data,
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
					targets: [6, 7],
				},
			],
			columns: [
				{ data: null },
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
						}
					},
				},
				{
					data: "status",
					render: function (data, type, row, meta) {
						if (row.status == "1") {
							return "Mở bán";
						} else {
							return "Đóng cửa";
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
										class="btn dropdown-item edit-branch-info" data-value="${row.code}"
									>Chỉnh sửa
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
				lengthMenu: "Hiển thị _MENU_ chi nhánh",
				info: "Hiển thị _START_ - _END_ trên tổng _TOTAL_ chi nhánh",
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
						columns: [1, 2, 3, 4, 5, 6, 7],
					},
					className: "btn btn-sm",
				},
				{
					extend: "csv",
					title: "Danh sách chi nhánh",
					filename: "branch",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6, 7],
					},
					className: "btn btn-sm",
				},
				{
					extend: "excel",
					title: "Danh sách chi nhánh",
					filename: "branch",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6, 7],
					},
					className: "btn btn-sm",
				},
				{
					extend: "pdf",
					title: "Danh sách chi nhánh",
					filename: "branch",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6, 7],
					},
					className: "btn btn-sm",
				},
				{
					extend: "print",
					title: "Danh sách chi nhánh",
					filename: "branch",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6, 7],
					},
					className: "btn btn-sm",
				},
				{
					extend: "colvis",
					columns: [1, 2, 3, 4, 5, 6, 7],
					text: "Hiển thị",
				},
			],
		});
		table.buttons().container().appendTo("#branch_wrapper .col-md-6:eq(0)");

		$("#branch-filter-central").on("change", function () {
			table.draw();
		});

		$("#branch-filter-status").on("change", function () {
			table.draw();
		});

		$(".paginate_button, #branch_list_table").on("click", function () {
			$(".edit-branch-info").on("click", function () {
				var branch_code = $(this).data("value");
				var branch_info = getBranchInfoByCode(branch_code);
				$("#branch_code").val(branch_code);
				$("#branch_name").val(branch_info[0]["name"]);
				$("#branch_address").val(branch_info[0]["address"]);
				$("#branch_district").val(branch_info[0]["district"]);
				$("#branch_city").val(branch_info[0]["city"]);
				$("#branch_phone").val(branch_info[0]["phone"]);
				$("#branch_central").val(branch_info[0]["central"]);
				$("#branch_status").val(branch_info[0]["status"]);
				$("#branch_created_at").val(branch_info[0]["created_at"]);
				$("#branch_updated_at").val(branch_info[0]["updated_at"]);
				$("#editBranchInfo").modal("toggle");
			});

			$("#editBranchForm").submit(function (e) {
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url: site_url + "api/dashboard/branch/updatebranchinfobycode",
					type: "POST",
					data: formData,
					headers: { Authorization: localStorage.getItem("auth_token") },
					contentType: false,
					processData: false,
					success: function (response) {
						window.location.href = site_url + "dashboard/branch";
					},
				});
			});
		});
	} else if (index2 == 2) {
		$("form#branch_data").submit(function (e) {
			e.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: site_url + "api/dashboard/branch/storenewbranch",
				type: "POST",
				data: formData,
				headers: { Authorization: localStorage.getItem("auth_token") },
				contentType: false,
				processData: false,
				success: function (data) {
					window.location.href = site_url + "dashboard/branch";
				},
			});
		});
	}
}

function getBranchData() {
	"use strict";
	var branch_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/branch/loadbranchdata",
		dataType: "json",
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			branch_data = response.data;
		},
	});

	return branch_data;
}

function getBranchListData() {
	"use strict";
	var branch_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/branch/loadbranchlistdata",
		dataType: "json",
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			branch_data = response.data;
		},
	});

	return branch_data;
}

function getBranchInfoByCode(branch_code) {
	"use strict";

	var branch_data;

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/branch/getbranchinfobycode",
		dataType: "json",
		data: { branch_code: branch_code },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			branch_data = response.data;
		},
	});

	return branch_data;
}
