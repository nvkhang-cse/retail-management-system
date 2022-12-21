function homepage(index_2, site_url) {
	var brand_data;
	var sales_report_in_day;

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
		$(
			"#brand_code_for_statistic_in_date, #brand_code_for_statistic_in_time, #brand_code_for_warehouse_report"
		).append('<option value="' + row.code + '">' + row.name + "</option>");
	});

	$.ajax({
		type: "POST",
		url: site_url + "api/dashboard/homepage/loadsalesreportinday",
		dataType: "json",
		data: { brand_code: $("#brand_code_for_statistic_in_date").val() },
		encode: true,
		async: false,
		headers: { Authorization: localStorage.getItem("auth_token") },
		success: function (response) {
			sales_report_in_day = response.data;
			console.log(sales_report_in_day);
			$("#total_sales_in_day").text(sales_report_in_day["total_sales"]);
			$("#new_order_in_day").text(sales_report_in_day["new_order"]);
			$("#return_order_in_day").text(sales_report_in_day["return_order"]);
		},
	});

	$("#brand_code_for_statistic_in_date").on("change", function () {
		$.ajax({
			type: "POST",
			url: site_url + "api/dashboard/homepage/loadsalesreportinday",
			dataType: "json",
			data: { brand_code: $("#brand_code_for_statistic_in_date").val() },
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				sales_report_in_day = response.data;
				$("#total_sales_in_day").text(sales_report_in_day["total_sales"]);
				$("#new_order_in_day").text(sales_report_in_day["new_order"]);
				$("#return_order_in_day").text(sales_report_in_day["return_order"]);
			},
		});
	});
}
