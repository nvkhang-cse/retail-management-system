function homepage(index_2) {
	"use strict";
	var branch_data;
	var sales_report_in_day;
	var sales_report_in_period_day;
	var warehouse_report;

	branch_data = getBranchData();

	branch_data.forEach((row) => {
		$(
			"#branch_code_for_statistic_in_date, #branch_code_for_statistic_in_time, #branch_code_for_warehouse_report"
		).append('<option value="' + row.code + '">' + row.name + "</option>");
	});

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/homepage/loadsalesreportinday",
		dataType: "json",
		data: { branch_code: $("#branch_code_for_statistic_in_date").val() },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			sales_report_in_day = response.data;
			$("#total_sales_in_day").text(
				sales_report_in_day["total_sales"].toLocaleString()
			);
			$("#success_order_in_day").text(sales_report_in_day["success_order"]);
			$("#online_order_in_day").text(sales_report_in_day["online_order"]);
			$("#cancel_order_in_day").text(sales_report_in_day["cancel_order"]);
		},
	});

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/homepage/loadwarehousereport",
		dataType: "json",
		data: { branch_code: $("#branch_code_for_warehouse_report").val() },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			warehouse_report = response.data;
			console.log(warehouse_report);
			$("#total_product").text(warehouse_report["total_product"]);
			$("#total_product_value").text(
				warehouse_report["total_value"].toLocaleString()
			);
		},
	});

	// $.ajax({
	// 	type: "POST",
	// 	url: site_url + "api/dashboard/homepage/loadsalesreportinperiodday",
	// 	dataType: "json",
	// 	data: { branch_code: $("#branch_code_for_statistic_in_date").val() },
	// 	encode: true,
	// 	async: false,
	// 	headers: { Authorization: localStorage.getItem("auth_token") },
	// 	success: function (response) {
	// 		sales_report_in_day = response.data;
	// 		$("#total_sales_in_day").text(sales_report_in_day["total_sales"]);
	// 		$("#success_order_in_day").text(sales_report_in_day["success_order"]);
	// 		$("#online_order_in_day").text(sales_report_in_day["online_order"]);
	// 		$("#cancel_order_in_day").text(sales_report_in_day["cancel_order"]);
	// 	},
	// });

	$("#branch_code_for_statistic_in_date").on("change", function () {
		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/homepage/loadsalesreportinday",
			dataType: "json",
			data: { branch_code: $("#branch_code_for_statistic_in_date").val() },
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				sales_report_in_day = response.data;
				$("#total_sales_in_day").text(
					sales_report_in_day["total_sales"].toLocaleString()
				);
				$("#success_order_in_day").text(sales_report_in_day["success_order"]);
				$("#online_order_in_day").text(sales_report_in_day["online_order"]);
				$("#cancel_order_in_day").text(sales_report_in_day["cancel_order"]);
			},
		});
	});
	$("#branch_code_for_warehouse_report").on("change", function () {
		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/homepage/loadwarehousereport",
			dataType: "json",
			data: { branch_code: $("#branch_code_for_warehouse_report").val() },
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				warehouse_report = response.data;
				console.log(warehouse_report);
				$("#total_product").text(warehouse_report["total_product"]);
				$("#total_product_value").text(
					warehouse_report["total_value"].toLocaleString()
				);
			},
		});
	});
}
