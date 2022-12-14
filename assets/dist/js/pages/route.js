$(function () {
	"use strict";
	$(document).ready(function () {
		if (localStorage.getItem("auth_token")) {
			var index = $("#index").val();
			var index2 = $("#index2").val();
			var site_url = window.location.origin + "/LVTNCI-3/";
			var url_attr;

			if (index == 1) {
				url_attr = site_url + "api/dashboard/homepage/loadhomepage";
			} else if (index == 2) {
				if (index2 == 1) {
					url_attr = site_url + "api/dashboard/product/loadproductlist";
				} else if (index2 == 2) {
					url_attr = site_url + "api/dashboard/product/loadproductwarehouse";
				} else if (index2 == 3) {
					url_attr = site_url + "api/dashboard/product/loadproductadd";
				} else if (index2 == 4) {
					url_attr = site_url + "api/dashboard/product/loadproducttrash";
				} else if (index2 == 5) {
					url_attr =
						site_url + "api/dashboard/productcategory/loadproductcategory";
				} else if (index2 == 6) {
					url_attr =
						site_url + "api/dashboard/productcategory/loadproductcategoryadd";
				}
			} else if (index == 3) {
				if (index2 == 1) {
					url_attr = site_url + "api/dashboard/customer/loadcustomerlist";
				} else if (index2 == 2) {
					url_attr = site_url + "api/dashboard/customer/loadcustomeradd";
				} else if (index2 == 3) {
					url_attr =
						site_url + "api/dashboard/customergroup/loadcustomergrouplist";
				} else if (index2 == 4) {
					url_attr =
						site_url + "api/dashboard/customergroup/loadcustomergroupadd";
				}
			} else if (index == 4) {
				url_attr = site_url + "api/dashboard/sales/loadsalepage";
			} else if (index == 5) {
			} else if (index == 6) {
				if (index2 == 1) {
					url_attr = site_url + "api/dashboard/cashbook/loadcashbook";
				} else if (index2 == 2) {
					url_attr = site_url + "api/dashboard/cashbook/loadreceiptincomeadd";
				} else if (index2 == 3) {
					url_attr = site_url + "api/dashboard/cashbook/loadreceiptoutcomeadd";
				}
			} else if (index == 7) {
			} else if (index == 8) {
				if (index2 == 1) {
					url_attr = site_url + "api/dashboard/promotion/loadpromotionlist";
				} else if (index2 == 2) {
					url_attr = site_url + "api/dashboard/promotion/loadpromotionadd";
				}
			} else if (index == 9) {
				if (index2 == 1) {
					url_attr = site_url + "api/dashboard/brand/loadbrandlist";
				} else if (index2 == 2) {
					url_attr = site_url + "api/dashboard/brand/loadbrandadd";
				} else if (index2 == 3) {
					url_attr = site_url + "api/dashboard/employee/loademployeelist";
				} else if (index2 == 4) {
					url_attr = site_url + "api/dashboard/employee/loademployeeadd";
				}
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
			redirectLoginPage();
		}
	});
});

function add_script(index, index2, site_url) {
	if (index == 1) {
		$.getScript(site_url + "assets/dist/js/pages/barChart.js");
	} else if (index == 2) {
		productTable(index2, site_url);
	} else if (index == 3) {
		customerTable(index2, site_url);
	} else if (index == 4) {
		sale(index2, site_url);
	} else if (index == 5) {
	} else if (index == 6) {
		cashBookTable(index2, site_url);
	} else if (index == 7) {
	} else if (index == 8) {
		promotionTable(index2, site_url);
	} else if (index == 9) {
		if (index2 == 1 || index2 == 2) {
			brandTable(index2, site_url);
		} else if (index2 == 3 || index2 == 4) {
			employeeTable(index2, site_url);
		}
	}
}
