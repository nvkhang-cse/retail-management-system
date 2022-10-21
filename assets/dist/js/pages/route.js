/* global Chart:false */

$(function () {
	"use strict";
	$(document).ready(function () {
		if (localStorage.getItem("auth_token")) {
			var index = $("#idx1").val();
			var index2 = $("#idx2").val();
			var site_url = window.location.origin + "/LVTNCI-3/";
			var url_attr;

			if (index == 1) {
				url_attr = site_url + "api/dashboard/homepage/loadHomePage";
			} else if (index == 2) {
				if (index2 == 1) {
					url_attr = site_url + "api/dashboard/product/loadProductList";
				} else if (index2 == 2) {
					url_attr = site_url + "api/dashboard/product/loadProductTrash";
				} else if (index2 == 3) {
					url_attr = site_url + "api/dashboard/product/loadProductAdd";
				} else if (index2 == 4) {
					url_attr = site_url + "api/dashboard/product/loadProductWareHouse";
				}
			} else if (index == 3) {
				if (index2 == 1) {
					url_attr = site_url + "api/dashboard/customer/loadCustomerList";
				} else if (index2 == 2) {
					url_attr = site_url + "api/dashboard/customer/loadCustomerAdd";
				}
			} else if (index == 4) {
				url_attr = site_url + "api/dashboard/sales/loadSalePage";
			} else if (index == 5) {
			} else if (index == 6) {
			} else if (index == 7) {
			} else if (index == 8) {
			}
			$.ajax({
				type: "POST",
				url: url_attr,
				dataType: "json",
				encode: true,
				headers: { Authorization: localStorage.getItem("auth_token") },
				success: function (response) {
					$("#page_content").html(response.data);
					$("#page_content").on("load", add_script(index, index2, site_url));
				},
			});
		} else {
			$("#nav_content").hide();
			$("#left_sidebar_content").hide();
			$("#right_sidebar_content").hide();
			$("#footer_content").hide();
		}
	});
});

function load_main_content(url_attr) {
	$.ajax({
		type: "POST",
		url: url_attr,
		dataType: "json",
		encode: true,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			$("#page_content").html(response.data);
			$("#page_content").on("load", add_script());
		},
	});
}

function add_script(index, index2, site_url) {
	if (index == 1) {
		$.getScript(site_url + "/assets/dist/js/pages/dashboard2.js");
	} else if (index == 2) {
		if (index2 == 1) {
			productTable(index2, site_url);
		} else if (index2 == 2) {
		} else if (index2 == 3) {
		} else if (index2 == 4) {
		}
	} else if (index == 3) {
	} else if (index == 4) {
	}
}

// lgtm [js/unused-local-variable]
