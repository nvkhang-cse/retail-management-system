function homepage(index_2, site_url) {
	var brand_data;

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
}
