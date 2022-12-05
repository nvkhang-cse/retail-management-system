$(function () {
	"use strict";
	$(document).ready(function () {
		if (localStorage.getItem("auth_token")) {
			var index = $("#idx1").val();
			var index2 = $("#idx2").val();
			var site_url = window.location.origin + "/LVTNCI-3/";
			var url_attr;

			if (index == 1) {
				url_attr = site_url + "api/dashboard/homepage/loadhomepage";
			} else if (index == 2) {
				if (index2 == 1) {
					url_attr = site_url + "api/dashboard/product/loadproductlist";
				} else if (index2 == 2) {
					url_attr = site_url + "api/dashboard/product/loadproducttrash";
				} else if (index2 == 3) {
					url_attr = site_url + "api/dashboard/product/loadproductadd";
				} else if (index2 == 4) {
					url_attr = site_url + "api/dashboard/product/loadproductwarehouse";
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
			} else if (index == 7) {
			} else if (index == 8) {
			} else if (index == 9) {
				if (index2 == 1) {
					url_attr = site_url + "api/dashboard/brand/loadbrandlist";
				} else if (index2 == 2) {
					url_attr = site_url + "api/dashboard/brand/loadbrandadd";
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
			$("#nav_content").hide();
			$("#left_sidebar_content").hide();
			$("#right_sidebar_content").hide();
			$("#footer_content").hide();
		}
	});
});

function add_script(index, index2, site_url) {
	if (index == 1) {
	} else if (index == 2) {
		if (index2 == 1) {
			productTable(index2, site_url);
		} else if (index2 == 2) {
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
		} else if (index2 == 5) {
			productTable(index2, site_url);
		} else if (index2 == 6) {
			$("form#product_category_data").submit(function (e) {
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url:
						site_url + "api/dashboard/productcategory/storenewproductcategory",
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
	} else if (index == 2) {
	} else if (index == 3) {
		if (index2 == 1) {
			customerTable(index2, site_url);
		} else if (index2 == 2) {
			var customer_group_data;

			$.ajax({
				type: "POST",
				url: site_url + "api/dashboard/customergroup/loadtabledata",
				dataType: "json",
				encode: true,
				async: false,
				headers: { Authorization: localStorage.getItem("auth_token") },
				success: function (response) {
					customer_group_data = response.data;
				},
			});

			customer_group_data.forEach((row) => {
				$("#customer_group").append(
					'<option value="' + row.code + '">' + row.name + "</option>"
				);
			});

			$("form#customer_data").submit(function (e) {
				e.preventDefault();
				var formData = new FormData(this);

				$.ajax({
					url: site_url + "api/dashboard/customer/storenewcustomer",
					type: "POST",
					data: formData,
					headers: { Authorization: localStorage.getItem("auth_token") },
					contentType: false,
					processData: false,
					success: function (data) {
						window.location.href = site_url + "dashboard/customer";
					},
				});
			});
		} else if (index2 == 3) {
			customerGroupTable(index2, site_url);
		} else if (index2 == 4) {
			$("form#customer_group_data").submit(function (e) {
				e.preventDefault();
				var formData = new FormData(this);

				$.ajax({
					url: site_url + "api/dashboard/customergroup/storenewcustomergroup",
					type: "POST",
					data: formData,
					headers: { Authorization: localStorage.getItem("auth_token") },
					contentType: false,
					processData: false,
					success: function (data) {
						window.location.href = site_url + "dashboard/customergroup";
					},
				});
			});
		}
	} else if (index == 4) {
	} else if (index == 5) {
	} else if (index == 6) {
	} else if (index == 7) {
	} else if (index == 8) {
	} else if (index == 9) {
		if (index2 == 1) {
			brandTable(index2, site_url);
		} else if (index2 == 2) {
			$("form#brand_data").submit(function (e) {
				e.preventDefault();
				var formData = new FormData(this);

				$.ajax({
					url: site_url + "api/dashboard/brand/storenewbrand",
					type: "POST",
					data: formData,
					headers: { Authorization: localStorage.getItem("auth_token") },
					contentType: false,
					processData: false,
					success: function (data) {
						window.location.href = site_url + "dashboard/brand";
					},
				});
			});
		}
	}
}

// lgtm [js/unused-local-variable]
