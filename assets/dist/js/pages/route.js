const site_url = window.location.origin + "/LVTNCI-3/";

$(function () {
	"use strict";
	$(document).ready(function () {
		if (localStorage.getItem("auth_token")) {
			var index = $("#index").val();
			var index2 = $("#index2").val();

			var url_attr;
			var permission_check;

			$.ajax({
				type: "POST",
				url: site_url + "api/dashboard/permission/getpermission",
				dataType: "json",
				encode: true,
				async: false,
				headers: {
					Authorization: localStorage.getItem("auth_token"),
				},
				success: function (response) {
					permission_check = response.data;
				},
			});

			if (permission_check == "1") {
			} else if (permission_check == "2") {
				$("#branch_list_page").hide();
			} else {
				$(
					"#home_page, #product_warehouse_page, #product_import_page, #product_transfer_page, #product_trash_page, #cashbook_list_page, #receipt_income_page, #receipt_outcome_page, #report_page, #branch_list_page, #employee_list_page, #cashbook_wrapper_page,#system_setting_page, #customer_group_list_page, #promotion_list_page, #product_page"
				).hide();
			}

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
				url_attr = site_url + "api/dashboard/sale/loadsalepage";
			} else if (index == 5) {
				if (index2 == 1) {
					url_attr = site_url + "api/dashboard/order/loadorderlist";
				}
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
					url_attr = site_url + "api/dashboard/branch/loadbranchlist";
				} else if (index2 == 2) {
					url_attr = site_url + "api/dashboard/branch/loadbranchadd";
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
					$("#user_full_name").text(localStorage.getItem("full_name"));
					$("#page_content").html(response.data);
					$("#page_content").on("load", add_script(index, index2));
				},
			});
		} else {
			redirectLoginPage();
		}
	});
});

function add_script(index, index2) {
	if (index == 1) {
		$.getScript(site_url + "assets/dist/js/barChart.js");
		homepage(index2);
	} else if (index == 2) {
		productTable(index2);
	} else if (index == 3) {
		customerTable(index2);
	} else if (index == 4) {
		sale(index2);
	} else if (index == 5) {
		order(index2);
	} else if (index == 6) {
		cashBookTable(index2);
	} else if (index == 7) {
	} else if (index == 8) {
		promotionTable(index2);
	} else if (index == 9) {
		if (index2 == 1 || index2 == 2) {
			branchTable(index2);
		} else if (index2 == 3 || index2 == 4) {
			employeeTable(index2);
		}
	}
}
