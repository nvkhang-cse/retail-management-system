function productTable(index2, site_url) {
	"use strict";

	if (index2 == 1) {
		var table;
		var brand_data;
		var product_data;
		var category_data;

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
			url: site_url + "api/dashboard/product/loadproductdata",
			dataType: "json",
			data: { brand_code: $("#brand_code").val() },
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				product_data = response;
			},
		});

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/productcategory/loadproductcategorydata",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				category_data = response;
			},
		});

		table = $("#product_list_table").DataTable({
			data: product_data.data,
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
					visible: false,
					targets: [4, 5, 6, 7, 8],
				},
			],
			columns: [
				{ data: "product_code" },
				{
					data: "image",
					searchable: false,
					orderable: false,
					render: function (data, type, row, meta) {
						if (row.image != "") {
							var item = `<img src="${site_url}/assets/upload_img/product/${row.image}" width="100" height="100"/>`;
						} else {
							var item = `<img src="${site_url}/assets/upload_img/default_photo.png" width="100" height="100"/>`;
						}
						return item;
					},
				},
				{ data: "title" },
				{
					data: "category",
					render: function (data, type, row, meta) {
						let result = category_data.data.find(
							(item) => item.code == row.category
						);
						if (result == undefined) {
							return "Chưa phân loại";
						} else {
							return `${result.title}`;
						}
					},
				},
				{ data: "brand" },
				{ data: "origin" },
				{ data: "barcode" },
				{ data: "capacity" },
				{ data: "unit" },
				{ data: "quantity_sale" },
				{ data: "retail_price" },
				{ data: "expired_date" },
				{
					data: null,
					defaultContent: `<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button><div class="dropdown-menu"><a class="dropdown-item">Chi tiết</a></div></div>`,
					className: "dt-body-center",
					searchable: false,
					orderable: false,
				},
			],
			order: [[2, "asc"]],
			responsive: true,
			autoWidth: false,
			language: {
				lengthMenu: "Hiển thị _MENU_ sản phẩm",
				info: "Hiển thị _START_ - _END_ trên tổng _TOTAL_ sản phẩm",
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
					columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
					text: "Hiển thị",
				},
			],
		});

		table.buttons().container().appendTo("#product_wrapper .col-md-6:eq(0)");

		$("#brand_code").on("change", function () {
			$.ajax({
				type: "POST",
				url: site_url + "api/dashboard/product/loadproductdata",
				dataType: "json",
				data: { brand_code: $("#brand_code").val() },
				encode: true,
				async: false,
				headers: { Authorization: localStorage.getItem("auth_token") },
				success: function (response) {
					product_data = response;
				},
			});

			table.clear().rows.add(product_data.data).draw();
		});
	} else if (index2 == 2) {
		var table;
		var brand_data;
		var warehouse_data;
		var category_data;

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
			url: site_url + "api/dashboard/product/loadproductwarehousedata",
			dataType: "json",
			data: { brand_code: $("#brand_code").val() },
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				warehouse_data = response;
			},
		});

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/productcategory/loadproductcategorydata",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				category_data = response;
			},
		});

		table = $("#warehouse_table").DataTable({
			data: warehouse_data.data,
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
				{ data: "product_code" },
				{
					data: "image",
					searchable: false,
					orderable: false,
					render: function (data, type, row, meta) {
						if (row.image != "") {
							var item = `<img src="${site_url}/assets/upload_img/product/${row.image}" width="100" height="100"/>`;
						} else {
							var item = `<img src="${site_url}/assets/upload_img/default_photo.png" width="100" height="100"/>`;
						}
						return item;
					},
				},
				{ data: "title" },
				{ data: "quantity_sale" },
				{ data: "quantity_warehouse" },
				{ data: "retail_price" },
				{ data: "goods_cost" },
				{ data: "wholesale_price" },
				{
					data: "published",
					render: function (data, type, row, meta) {
						if (row.published == 1) {
							return "Được bán";
						} else {
							return "Không được bán";
						}
					},
				},
				{
					data: "product_code",
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
										data-value="${row.product_code}"
									>Chỉnh sửa
									</a>
									<a
										class="dropdown-item delete-product-temp"
										href="#"
										data-value="${row.product_code}"
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
			order: [[2, "asc"]],
			responsive: true,
			autoWidth: false,
			language: {
				lengthMenu: "Hiển thị _MENU_ sản phẩm",
				info: "Hiển thị _START_ - _END_ trên tổng _TOTAL_ sản phẩm",
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
					columns: [1, 2, 3, 4, 5, 6, 7, 8],
					text: "Hiển thị",
				},
			],
		});
		table.buttons().container().appendTo("#warehouse_wrapper .col-md-6:eq(0)");

		$("#brand_code").on("change", function () {
			$.ajax({
				type: "POST",
				url: site_url + "api/dashboard/product/loadproductwarehousedata",
				dataType: "json",
				data: { brand_code: $("#brand_code").val() },
				encode: true,
				async: false,
				headers: { Authorization: localStorage.getItem("auth_token") },
				success: function (response) {
					warehouse_data = response;
				},
			});

			table.clear().rows.add(warehouse_data.data).draw();
		});

		$(".edit-product-info").on("click", function () {
			var product_code = $(this).data("value");
			var product_info = getProductDataByCode(product_code);
			$("#product-code").val(product_code);
			$("#product-new-name").val(product_info[0]["title"]);
			$("#product-new-brand").val(product_info[0]["brand"]);
			$("#product-new-goodscost").val(product_info[0]["goods_cost"]);
			$("#product-new-retailprice").val(product_info[0]["retail_price"]);
			$("#product-new-qty").val(product_info[0]["quantity_warehouse"]);
			$("#product-new-capacity").val(product_info[0]["capacity"]);
			$("#product-new-unit").val(product_info[0]["unit"]);
			$("#product-new-ingred").val(product_info[0]["ingredient"]);
			if (product_info[0]["published"] == 0) {
				$("#product-unpublished").prop("checked", true);
			} else if (product_info[0]["published"] == 1) {
				$("#product-published").prop("checked", true);
			}
			$("#product-new-ingred").val(product_info[0]["ingredient"]);
			$("#product-new-description").val(product_info[0]["description"]);
			// $('form#editProductForm :input').prop('readonly', true);
			// $('#submit-edit-form').prop({
			// 	'disabled': true,
			// 	'hidden': true
			// });
			// $('#open-edit-form').prop('hidden', false)

			$("#editProductInfo").modal("toggle");
		});

		$("form").submit(function () {
			var formData = new FormData(this);
			// console.log(formData);

			$.ajax({
				url: site_url + "api/dashboard/product/updateproductinfobycode",
				type: "POST",
				data: formData,
				headers: { Authorization: localStorage.getItem("auth_token") },
				contentType: false,
				processData: false,
				success: function (response) {
					// window.location.href = site_url + "dashboard/product";
					console.log(response);
				},
			});
		});

		$(".delete-product-temp").on("click", function () {
			var product_code = $(this).data("value");

			$.ajax({
				url: site_url + "api/dashboard/product/deleteproducttemp",
				type: "POST",
				dataType: "json",
				data: { product_code: product_code },
				encode: true,
				headers: { Authorization: localStorage.getItem("auth_token") },
				success: function (response) {
					window.location.href =
						site_url + "dashboard/product/loadproductwarehouse";
				},
			});
		});
	} else if (index2 == 3) {
		var category_data;
		var warehouse_data;

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/productcategory/loadproductcategorydata",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				category_data = response.data;
			},
		});

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/brand/loadbranddata",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				warehouse_data = response.data;
			},
		});

		category_data.forEach((row) => {
			$("#product_category").append(
				'<option value="' + row.code + '">' + row.title + "</option>"
			);
		});

		warehouse_data.forEach((row) => {
			$("#product_warehouse").append(
				'<option value="' + row.code + '">' + row.name + "</option>"
			);
		});

		$("#product_file").on("change", function () {
			const choosedFile = this.files[0];
			if (choosedFile) {
				const reader = new FileReader();
				reader.addEventListener("load", function () {
					$("#product_photo").attr("src", reader.result);
				});
				reader.readAsDataURL(choosedFile);
			}
		});

		$("form#product_data").submit(function (e) {
			e.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: site_url + "api/dashboard/product/storenewproduct",
				type: "POST",
				data: formData,
				headers: { Authorization: localStorage.getItem("auth_token") },
				contentType: false,
				processData: false,
				success: function (data) {
					window.location.href = site_url + "dashboard/product";
				},
			});
		});
	} else if (index2 == 4) {
		var table;
		var brand_data;
		var trash_data;
		var category_data;

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
			url: site_url + "api/dashboard/product/loadproducttrashdata",
			dataType: "json",
			data: { brand_code: $("#brand_code").val() },
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				trash_data = response;
			},
		});

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/productcategory/loadproductcategorydata",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				category_data = response;
			},
		});

		table = $("#trash_list_table").DataTable({
			data: trash_data.data,
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
				{ data: "product_code" },
				{
					data: "image",
					searchable: false,
					orderable: false,
					render: function (data, type, row, meta) {
						if (row.image != "") {
							var item = `<img src="${site_url}/assets/upload_img/product/${row.image}" width="100" height="100"/>`;
						} else {
							var item = `<img src="${site_url}/assets/upload_img/default_photo.png" width="100" height="100"/>`;
						}
						return item;
					},
				},
				{ data: "title" },
				{
					data: "category",
					render: function (data, type, row, meta) {
						let result = category_data.data.find(
							(item) => item.code == row.category
						);
						if (result == undefined) {
							return "Chưa phân loại";
						} else {
							return `${result.title}`;
						}
					},
				},
				{ data: "barcode" },
				{
					data: "product_code",
					render: function (data, type, row, meta) {
						var item = `<div class="btn-group">
								<button
									type="button"
									class="btn btn-default dropdown-toggle dropdown-icon"
									data-toggle="dropdown"
								></button>
								<div class="dropdown-menu">
									<a
										class="dropdown-item restore-product-item"
										href="#"
										data-value="${row.product_code}"
									>Khôi phục
									</a>
									<a
										class="dropdown-item delete-product-for"
										href="#"
										data-value="${row.product_code}"
									>Xóa vĩnh viễn
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
			order: [[2, "asc"]],
			responsive: true,
			autoWidth: false,
			language: {
				lengthMenu: "Hiển thị _MENU_ sản phẩm",
				info: "Hiển thị _START_ - _END_ trên tổng _TOTAL_ sản phẩm",
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

		table.buttons().container().appendTo("#trash_wrapper .col-md-6:eq(0)");

		$("#brand_code").on("change", function () {
			$.ajax({
				type: "POST",
				url: site_url + "api/dashboard/product/loadproducttrashdata",
				dataType: "json",
				data: { brand_code: $("#brand_code").val() },
				encode: true,
				async: false,
				headers: { Authorization: localStorage.getItem("auth_token") },
				success: function (response) {
					warehouse_data = response;
				},
			});

			table.clear().rows.add(warehouse_data.data).draw();
		});

		$(".restore-product-item").on("click", function () {
			var product_code = $(this).data("value");

			$.ajax({
				url: site_url + "api/dashboard/product/restoreproductitem",
				type: "POST",
				dataType: "json",
				data: { product_code: product_code },
				encode: true,
				headers: { Authorization: localStorage.getItem("auth_token") },
				success: function (response) {
					window.location.href =
						site_url + "dashboard/product/loadproducttrash";
				},
			});
		});
	} else if (index2 == 5) {
		var table;
		var category_data;

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/productcategory/loadproductcategorydata",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				category_data = response;
			},
		});

		table = $("#product_category_list_table").DataTable({
			data: category_data.data,
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
				{ data: "title" },
				{ data: "code" },
				{ data: "description" },
				{
					data: null,
					defaultContent: `<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button><div class="dropdown-menu"><a class="dropdown-item" href="#">Chi tiết</a><a class="dropdown-item" href="#">Sửa</a><a class="dropdown-item" href="#">Xoá</a></div></div>`,
					className: "dt-body-center",
					searchable: false,
					orderable: false,
				},
			],
			order: [[2, "asc"]],
			responsive: true,
			autoWidth: false,
			language: {
				lengthMenu: "Hiển thị _MENU_ loại sản phẩm",
				info: "Hiển thị _START_ - _END_ trên tổng _TOTAL_ loại sản phẩm",
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
					columns: [1, 2, 3],
					text: "Hiển thị",
				},
			],
		});

		table
			.buttons()
			.container()
			.appendTo("#product_category_wrapper .col-md-6:eq(0)");
	} else if (index2 == 6) {
		$("form#product_category_data").submit(function (e) {
			e.preventDefault();

			var formData = new FormData(this);
			$.ajax({
				url: site_url + "api/dashboard/productcategory/storenewproductcategory",
				type: "POST",
				data: formData,
				headers: { Authorization: localStorage.getItem("auth_token") },
				contentType: false,
				processData: false,
				success: function (data) {
					window.location.href =
						site_url + "dashboard/product/loadproductcategory";
				},
			});
		});
	}
}

function getProductDataByCode(code) {
	var product_data;
	var site_url = window.location.origin + "/LVTNCI-3/";

	$.ajax({
		type: "POST",
		data: { product_code: code },
		url: site_url + "api/dashboard/product/searchproductbycode",
		dataType: "json",
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			product_data = response;
		},
	});
	return product_data.data;
}
