function sale(index2) {
	"use strict";
	var branch_data;
	var customer_group_data;

	branch_data = getBranchData();

	branch_data.forEach((row) => {
		$("#branch_code").append(
			'<option value="' + row.code + '">' + row.name + "</option>"
		);
	});

	$("#product-search-result, #customer-search-result").css("display", "none");

	$("#gsearchsimple").keyup(function () {
		var query = $("#gsearchsimple").val();
		$("#product-search-result").css("display", "inline-block");
		if (query.length == 2) {
			$.ajax({
				type: "POST",
				data: { query: query, branch_code: $("#branch_code").val() },
				url: site_url + "api/dashboard/product/searchproduct",
				dataType: "json",
				encode: true,
				headers: { Authorization: localStorage.getItem("auth_token") },
				success: function (response) {
					var img;
					var search_data = "";

					for (let row of response.data) {
						if (row.image == "") {
							img = site_url + "/assets/upload_img/default_photo.jpg";
						} else {
							img = site_url + "/assets/upload_img/product/" + row.image;
						}
						search_data +=
							'<li class="list-group-item contsearch">' +
							'<div class="row">' +
							'<div class="col-md-2 image-parent">' +
							'<img src="' +
							img +
							'" width="60" height="60" class="img-fluid"/>' +
							"</div>" +
							'<div class="col-md-10">' +
							'<a href="javascript:void(0)" class="gsearch list-group-item-heading text-gray-dark" data-value="' +
							row.product_code +
							'">' +
							row.title +
							"</a>" +
							'<p class="list-group-item-text"><strong>' +
							row.retail_price +
							" " +
							row.currency +
							"</strong></p>" +
							'<p class="list-group-item-text">Số lượng: ' +
							(row.quantity_sale != "0" ? row.quantity_sale : "Hết hàng") +
							"</p>";
						"</div>" + "</div></li>";
					}
					$("#product-search-result").html(search_data);
				},
			});
		}
		if (query.length == 0) {
			$("#product-search-result").css("display", "none");
		}
	});

	$("#customersearch").keyup(function () {
		var query = $("#customersearch").val();
		$("#customer-search-result").css({
			display: "inline-block",
			width: "auto",
		});
		if (query.length >= 2) {
			$.ajax({
				type: "POST",
				data: { query: query },
				url: site_url + "api/dashboard/customer/searchcustomer",
				dataType: "json",
				encode: true,
				headers: { Authorization: localStorage.getItem("auth_token") },
				success: function (response) {
					var search_data = "";

					for (let row of response.data) {
						search_data +=
							'<li class="list-group-item cussearch">' +
							'<div class="row">' +
							'<div class="col-md-2 d-flex align-items-center justify-content-center">' +
							'<img src="' +
							site_url +
							"/assets/upload_img/customer-default.png" +
							'" width="100" height="100" class="img-fluid"/>' +
							"</div>" +
							'<div class="col-md-10">' +
							'<a href="javascript:void(0)" class="csearch list-group-item-heading text-gray-dark" data-value="' +
							row.customer_code +
							'">' +
							row.name +
							"</a>" +
							'<p class="list-group-item-text"><strong>' +
							row.phone +
							"</strong></p>" +
							"</div>" +
							"</div></li>";
					}
					$("#customer-search-result").html(search_data);
				},
			});
		}
		if (query.length == 0) {
			$("#customer-search-result").css("display", "none");
		}
	});

	$("#localSearchSimple").jsLocalSearch({
		action: "Show",
		html_search: true,
		mark_text: "marktext",
	});

	customer_group_data = getCustomerGroupData();
	customer_group_data.forEach((row) => {
		$("#customer_group_new").append(
			'<option value="' + row.code + '">' + row.name + "</option>"
		);
	});

	$("#add_customer").on("click", function () {
		var customer_phone = $("#customersearch").val();
		$("#customer_phone_new").val(customer_phone);
		$("#addCustomerInfo").modal("toggle");
	});

	$("#addCustomerForm").submit(function (e) {
		e.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			url: site_url + "api/dashboard/customer/storenewcustomer",
			type: "POST",
			data: formData,
			headers: { Authorization: localStorage.getItem("auth_token") },
			contentType: false,
			processData: false,
			success: function (response) {
				$("#addCustomerForm").trigger("reset");
				$("#addCustomerInfo").modal("toggle");
			},
		});
	});

	$(document).on("click", ".gsearch", function () {
		var product_code = $(this).data("value");
		var product_detail;
		$(".list-group").css("display", "none");
		$.ajax({
			type: "POST",
			data: { product_code: product_code },
			url: site_url + "api/dashboard/sale/addToCart",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				product_detail = response;
			},
		});
		displayCart(product_detail);
	});

	$(document).on("click", ".csearch", function () {
		var customer_code = $(this).data("value");
		var customer_info;
		$(".list-group").css("display", "none");
		$.ajax({
			type: "POST",
			data: { code: customer_code },
			url: site_url + "api/dashboard/customer/getcustomerinfo",
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				customer_info = response;
			},
		});
		displayCustomerInfo(customer_info);
	});

	$(document).click(function () {
		$(".list-group").hide();
	});

	var new_date = new Date();
	var date_to_search = new_date.toISOString().substring(0, 10);
	var promotion_info = searchPromotion($("#branch_code").val(), date_to_search);
	promotion_info.forEach((row) => {
		$("#select-promotion").append(
			'<option value="' +
				row.code +
				'">' +
				row.bill_from +
				" đến " +
				row.bill_to +
				" - " +
				row.bill_value +
				(row.bill_type == 2 ? "%" : "") +
				"</option>"
		);
	});
	$("#select-promotion").on("change", function () {
		var code_check = $("#select-promotion").val();
		var money = $("#order-price").data("value");

		var result = promotion_info.find((item) => item.code == code_check);
		if (
			result != undefined &&
			result.bill_from <= money &&
			result.bill_to >= money
		) {
			$("#customer-bill-discount").data("value", result.bill_value);
			$("#customer-bill-discount").text(
				"" + result.bill_value + (result.bill_type == 2 ? "%" : "")
			);
		} else {
			$("#customer-bill-discount").data("value", 0);
			$("#customer-bill-discount").text("0%");
		}
		reloadCart();
	});

	$("#customer-money").keyup(function () {
		displayCustomerChangeMn($("#customer-money").val());
	});

	$("#payacheck").click(function () {
		var cart_items = getAllCartItems();
		if (cart_items.data.length > 0) {
			if ($("#change-money").data("value") >= 0) {
				var order_info = {
					customer: $("#customer_code").data("value"),
					total_price: $("#order-price").data("value"),
					discount: parseInt($("#customer-discount").data("value")),
					discount_bill: parseInt($("#customer-bill-discount").data("value")),
					discount_bill_type:
						parseInt($("#customer-bill-discount").data("value")) <= 100 ? 2 : 1,
					final_payment: $("#customer-payment").data("value"),
					customer_money: $("#customer-money").val(),
					customer_change: $("#change-money").data("value"),
					branch_code: $("#branch_code").val(),
				};
				const order_detail = [];
				for (let row of cart_items.data) {
					var item = {
						product_code: row.product_code,
						barcode: row.barcode,
						product_name: row.product_name,
						quantity: row.qty,
						product_price: row.price,
						subtotal_price: row.subtotal,
						discount: row.percentage,
					};
					order_detail.push(item);
				}
				var order_data = {
					order_info: order_info,
					order_detail: order_detail,
				};
				submitOrder(order_data);
			} else {
			}
		} else {
		}
	});

	$("#createorderonline").click(function () {
		var cart_items = getAllCartItems();
		if (cart_items.data.length > 0 && $("#customer_code").data("value") != "") {
			var order_info = {
				customer: $("#customer_code").data("value"),
				total_price: $("#order-price").data("value"),
				discount:
					$("#customer-discount").data("value") +
					$("#customer-bill-discount").data("value"),
				final_payment: $("#customer-payment").data("value"),
				customer_money: $("#customer-money").val(),
				customer_change: $("#change-money").data("value"),
				branch_code: $("#branch_code").val(),
			};
			const order_detail = [];
			for (let row of cart_items.data) {
				var item = {
					product_code: row.product_code,
					barcode: row.barcode,
					product_name: row.product_name,
					quantity: row.qty,
					product_price: row.price,
					subtotal_price: row.subtotal,
					discount: row.percentage,
				};
				order_detail.push(item);
			}
			var order_data = {
				order_info: order_info,
				order_detail: order_detail,
			};
			createOrderOnline(order_data);
		} else {
		}
	});

	$(document).ready(function () {
		deleteAllItem();
	});
}
