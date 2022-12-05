function productTable(index2, site_url) {
	"use strict";

	if (index2 == 1) {
		var table;
		var product_data;
		var category_data;

		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/product/loadtabledata",
			dataType: "json",
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

		table = $("#productListTable").DataTable({
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
					targets: [4, 5, 6, 7],
				},
			],
			columns: [
				{ data: "id" },
				{
					data: "image",
					searchable: false,
					orderable: false,
					render: function (data, type, row, meta) {
						if (row.image != "") {
							var a = `<img src="${site_url}/assets/upload_img/product/${row.image}" width="100" height="100"/>`;
						} else {
							var a = `<img src="${site_url}/assets/upload_img/default_photo.jpg" width="100" height="100"/>`;
						}
						return a;
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
				{ data: "barcode" },
				{ data: "capacity" },
				{ data: "unit" },
				{ data: "quantity" },
				{ data: "price" },
				{ data: "expired_date" },
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
				lengthMenu: "Hiển thị _MENU_ sản phẩm",
				info: "Hiển thị _START_ - _END_ trên tổng _TOTAL_ sản phẩm",
				paginate: {
					first: '<i class="fa fa-angle-double-left" ></i> Đầu tiên',
					previous: '<i class="fa fa-angle-double-left" ></i> Trước',
					next: 'Sau <i class="fa fa-angle-double-right" ></i>',
					last: 'Cuối cùng <i class="fa fa-angle-double-right" ></i>',
				},
				search: "Tìm kiếm",
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
					columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
					text: "Hiển thị",
				},
			],
			// initComplete: function () {
			// 	var api = this.api();
			// 	api
			// 		.columns()
			// 		.eq(0)
			// 		.each(function (colIdx) {
			// 			var cell = $(".filters th").eq(
			// 				$(api.column(colIdx).header()).index()
			// 			);
			// 			var title = $(cell).text();
			// 			if (
			// 				$(api.column(colIdx).header()).index() >= 2 &&
			// 				$(api.column(colIdx).header()).index() <= 10
			// 			) {
			// 				$(cell).html('<input type="text" class="form-control"/>');
			// 			} else if ($(api.column(colIdx).header()).index() == 1) {
			// 				$(cell).html(
			// 					'<button id="clearFilter" type="button" class="btn-sm btn-outline-primary">Xoá bộ lọc</button>'
			// 				);
			// 			} else if ($(api.column(colIdx).header()).index() == 0) {
			// 				$(cell).addClass("p-3");
			// 				$(cell).html(
			// 					'<button class="" style="border:none; background:none;"><i class="fas fa-cog"></i></button>'
			// 				);
			// 			} else {
			// 				$(cell).html("");
			// 			}
			// 			$(
			// 				"input",
			// 				$(".filters th").eq($(api.column(colIdx).header()).index())
			// 			)
			// 				.off("keyup change")
			// 				.on("change", function (e) {
			// 					$(this).attr("title", $(this).val());
			// 					var regularExpression = "({search})";
			// 					var cursorPosition = this.selectionStart;
			// 					api
			// 						.column(colIdx)
			// 						.search(
			// 							this.value != ""
			// 								? regularExpression.replace(
			// 										"{search}",
			// 										"(((" + this.value + ")))"
			// 								  )
			// 								: "",
			// 							this.value != "",
			// 							this.value == ""
			// 						)
			// 						.draw();
			// 				})
			// 				.on("keyup", function (e) {
			// 					e.stopPropagation();

			// 					$(this).trigger("change");
			// 					$(this)
			// 						.focus()[0]
			// 						.setSelectionRange(cursorPosition, cursorPosition);
			// 				});
			// 		});
			// },
		});

		table.buttons().container().appendTo("#product-wrapper .col-md-6:eq(0)");

		// $("#clearFilter").on("click", function () {
		// 	$("#productListTable thead input").val("").change();
		// });
	} else if (index2 == 2) {
		url_attr = "";
	} else if (index2 == 3) {
		url_attr = "";
	} else if (index2 == 4) {
		url_attr = "";
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

		table = $("#productCategoryListTable").DataTable({
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
			// initComplete: function () {
			// 	var api = this.api();
			// 	api
			// 		.columns()
			// 		.eq(0)
			// 		.each(function (colIdx) {
			// 			var cell = $(".filters th").eq(
			// 				$(api.column(colIdx).header()).index()
			// 			);
			// 			var title = $(cell).text();
			// 			if (
			// 				$(api.column(colIdx).header()).index() >= 2 &&
			// 				$(api.column(colIdx).header()).index() <= 10
			// 			) {
			// 				$(cell).html('<input type="text" class="form-control"/>');
			// 			} else if ($(api.column(colIdx).header()).index() == 1) {
			// 				$(cell).html(
			// 					'<button id="clearFilter" type="button" class="btn-sm btn-outline-primary">Xoá bộ lọc</button>'
			// 				);
			// 			} else if ($(api.column(colIdx).header()).index() == 0) {
			// 				$(cell).addClass("p-3");
			// 				$(cell).html(
			// 					'<button class="" style="border:none; background:none;"><i class="fas fa-cog"></i></button>'
			// 				);
			// 			} else {
			// 				$(cell).html("");
			// 			}
			// 			$(
			// 				"input",
			// 				$(".filters th").eq($(api.column(colIdx).header()).index())
			// 			)
			// 				.off("keyup change")
			// 				.on("change", function (e) {
			// 					$(this).attr("title", $(this).val());
			// 					var regularExpression = "({search})";
			// 					var cursorPosition = this.selectionStart;
			// 					api
			// 						.column(colIdx)
			// 						.search(
			// 							this.value != ""
			// 								? regularExpression.replace(
			// 										"{search}",
			// 										"(((" + this.value + ")))"
			// 								  )
			// 								: "",
			// 							this.value != "",
			// 							this.value == ""
			// 						)
			// 						.draw();
			// 				})
			// 				.on("keyup", function (e) {
			// 					e.stopPropagation();

			// 					$(this).trigger("change");
			// 					$(this)
			// 						.focus()[0]
			// 						.setSelectionRange(cursorPosition, cursorPosition);
			// 				});
			// 		});
			// },
		});

		table
			.buttons()
			.container()
			.appendTo("#product-category-wrapper .col-md-6:eq(0)");
	} else if (index2 == 6) {
	}
}

// lgtm [js/unused-local-variable]
