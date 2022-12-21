function sale(index2, site_url) {
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

	branch_data.forEach((row) => {
		$("#branch_code").append(
			'<option value="' + row.code + '">' + row.name + "</option>"
		);
	});

	$(".list-group").css({
		"overflow-y": "auto",
		"max-height": "280px",
	});

	$("#product-search-result, #customer-search-result").css("display", "none");

	$("#gsearchsimple").keyup(function () {
		var query = $("#gsearchsimple").val();
		$("#product-search-result").css("display", "inline-block");
		if (query.length == 2) {
			$.ajax({
				type: "POST",
				data: { query: query },
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
							row.quantity_sale +
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
			url: site_url + "api/dashboard/customer/getCustomerInfo",
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
					discount: $("#customer-discount").data("value"),
					final_payment: $("#customer-payment").data("value"),
					customer_money: $("#customer-money").val(),
					customer_change: $("#change-money").data("value"),
					branch_code: $("#branch_code").val(),
				};
				const order_detail = [];
				for (let row of cart_items.data) {
					var item = {
						product_code: row.product_code,
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
	$(document).ready(function () {
		deleteAllItem();
	});
}
