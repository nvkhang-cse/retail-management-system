function sale(index2, site_url) {
	"use strict";
	var warehouse_data;

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

	warehouse_data.forEach((row) => {
		$("#warehouse_code").append(
			'<option value="' + row.code + '">' + row.name + "</option>"
		);
	});
}
