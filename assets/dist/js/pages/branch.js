function branchTable(index2, site_url) {
	"use strict";

	if (index2 == 1) {
		var table;
		var branch_data;

		branch_data = getBranchData(site_url);

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
			],
			columns: [
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
										class="dropdown-item edit-product-info"
										href="#"
										data-value="${row.code}"
									>Chỉnh sửa
									</a>
									<a
										class="dropdown-item delete-product-temp"
										href="#"
										data-value="${row.code}"
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
						columns: [1, 2, 3, 4, 5, 6],
					},
					className: "btn btn-sm",
				},
				{
					extend: "csv",
					title: "Danh sách chi nhánh",
					filename: "branch",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6],
					},
					className: "btn btn-sm",
				},
				{
					extend: "excel",
					title: "Danh sách chi nhánh",
					filename: "branch",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6],
					},
					className: "btn btn-sm",
				},
				{
					extend: "pdf",
					title: "Danh sách chi nhánh",
					filename: "branch",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6],
					},
					className: "btn btn-sm",
				},
				{
					extend: "print",
					title: "Danh sách chi nhánh",
					filename: "branch",
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

		table.buttons().container().appendTo("#branch_wrapper .col-md-6:eq(0)");
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
					// toastr.success(data.message);
					window.location.href = site_url + "dashboard/branch";
				},
			});
		});
	}
}

function getBranchData(site_url) {
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
