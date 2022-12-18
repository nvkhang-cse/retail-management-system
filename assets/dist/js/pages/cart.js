function updateCartItem(obj, rowid) {
	"use strict";
	var site_url = window.location.origin + "/LVTNCI-3/";
	$.ajax({
		type: "POST",
		data: { rowid: rowid, qty: obj.value },
		url: site_url + "api/dashboard/sale/updateItemQty",
		dataType: "json",
		encode: true,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			reloadCart();
		},
	});
}

function deleteCartItem(rowid) {
	"use strict";
	var site_url = window.location.origin + "/LVTNCI-3/";
	$.ajax({
		type: "POST",
		data: { rowid: rowid },
		url: site_url + "api/dashboard/sale/removeCartItem",
		dataType: "json",
		encode: true,
		// async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			reloadCart();
		},
	});
}

function deleteAllItem() {
	"use strict";
	var site_url = window.location.origin + "/LVTNCI-3/";
	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/sale/removeAllItem",
		dataType: "json",
		encode: true,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			// $('#detail').html('');
			// $('#order-price').text('');
			reloadCart();
		},
	});
}

function getAllCartItems() {
	var site_url = window.location.origin + "/LVTNCI-3/";
	var cartItems;
	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/sale/getCartItems",
		dataType: "json",
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			cartItems = response;
		},
	});
	return cartItems;
}

function reloadCart() {
	"use strict";
	var cartItems = getAllCartItems();
	displayCart(cartItems);
}

function displayCart(product_detail) {
	"use strict";
	var output;
	var stt = 0;
	var total_price = 0;
	var total_payment = 0;

	output =
		'<table class="table table-bordered table-striped">' +
		"<tr>" +
		"<th>STT</th>" +
		"<th>Mã sản phẩm</th>" +
		"<th>Tên sản phẩm</th>" +
		"<th>Dung tích</th>" +
		"<th>Số lượng</th>" +
		"<th>Đơn giá</th>" +
		"<th>Chiết khấu</th>" +
		"<th>Thành tiền</th>" +
		"<th>Thao tác</th>" +
		"<tr>";
	if (product_detail.data.length > 0) {
		for (let row of product_detail.data) {
			var row_id = row.rowid;
			total_price += row.subtotal;
			total_payment += row.subtotal * (1 - row.percentage / 100);
			stt++;
			output +=
				"<tr>" +
				"<td>" +
				stt +
				"</td>" +
				"<td>" +
				row.product_code +
				"</td>" +
				"<td>" +
				row.name +
				"</td>" +
				"<td>" +
				row.capacity +
				row.unit +
				"</td>" +
				'<td><input type="number" class="form-control text-center" min="1" value="' +
				row.qty +
				'" onchange="updateCartItem(this,`' +
				row_id +
				'`)"></td>' +
				"<td>" +
				row.subtotal +
				row.currency +
				"</td>" +
				"<td>" +
				row.percentage +
				"%" +
				"</td>" +
				"<td>" +
				row.subtotal * (1 - row.percentage / 100) +
				row.currency +
				"</td>" +
				'<td><button type="button" class="btn btn-danger btn-sm mb-2" id="delete-item" onclick="deleteCartItem(`' +
				row_id +
				'`)">Xóa</button></td>' +
				"</tr>";
		}
		output +=
			"<tr>" +
			"<td></td>" +
			"<td>Tong tien</td>" +
			"<td></td>" +
			"<td></td>" +
			"<td></td>" +
			'<td id="total-price">' +
			total_price +
			"</td>" +
			"<td></td>" +
			'<td id="total-payment">' +
			total_payment +
			"</td>" +
			"</tr>";
	}

	output += "</table>";
	$("#detail").html(output);
	$("#order-price").data("value", total_payment);
	$("#order-price").text(total_payment);
	calculateCustumerPayment(
		total_payment,
		$("#customer-discount").data("value")
	);
	calculateCustumerChange(
		$("#customer-money").val(),
		$("#customer-payment").data("value")
	);
	// $('#customer-payment').data('value', fin_payment)
	// $('#customer-payment').text(fin_payment);
}

function getCustomerDiscount(group_code) {
	var site_url = window.location.origin + "/LVTNCI-3/";

	var discount_info;
	$.ajax({
		type: "POST",
		data: { group_code: group_code },
		url: site_url + "api/dashboard/customer/getCustomerDiscount",
		dataType: "json",
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			discount_info = response.data;
		},
	});
	if (discount_info.length > 0) {
		return discount_info[0].discount;
	}
	return 0;
}

function displayCustomerInfo(customer_info) {
	var info = customer_info.data;
	$("#customer-phone").text(info[0]["phone"]);
	$("#customer-debt").text(info[0]["debt"]);
	$("#customer-id").data("value", info[0]["id"]);
	$("#customer-id").text(info[0]["name"]);
	var cus_discount = getCustomerDiscount(info[0]["group_code"]);
	$("#customer-discount").data("value", cus_discount);
	$("#customer-discount").text(cus_discount + "%");
	reloadCart();
}

function displayCustomerChangeMn(customer_money) {
	$("#customer-money").val(customer_money);
	reloadCart();
}

function calculateCustumerPayment(order_price, discount = 0) {
	var fin_payment = order_price * (1 - discount / 100);
	$("#customer-payment").data("value", fin_payment);
	$("#customer-payment").text(fin_payment);
}

function calculateCustumerChange(customer_money, fin_payment) {
	var change = customer_money - fin_payment;
	$("#change-money").data("value", change);
	$("#change-money").text(change);
}

function submitOrder(order_data) {
	var site_url = window.location.origin + "/LVTNCI-3/";

	$.ajax({
		type: "POST",
		data: order_data,
		url: site_url + "api/dashboard/sale/createOrder",
		dataType: "json",
		encode: true,
		// async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			// discount_info = response.data;
			console.log(response);
			deleteAllItem();
		},
	});
}
