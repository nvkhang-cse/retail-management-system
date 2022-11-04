/* global Chart:false */

function customerGroupTable(index2, site_url) {
	"use strict";

	/* ChartJS
	 * -------
	 * Here we will create a few charts using ChartJS
	 */

	//-----------------------
	// - MONTHLY SALES CHART -
	//-----------------------

	// Get context with jQuery - using jQuery's .get() method.
	if (index2 == 3) {
		var url_attr = site_url + "api/dashboard/customergroup/loadTableData";
		var table;
		var data_table;

		$.ajax({
			type: "POST",
			url: url_attr,
			dataType: "json",
			encode: true,
			async: false,
			headers: { Authorization: localStorage.getItem("auth_token") },
			success: function (response) {
				data_table = response;
			},
		});

		table = $("#customerGroupListTable").DataTable({
			data: data_table.data,
			columnDefs: [
				{
					orderable: false,
					searchable: false,
					checkboxes: {
						selectRow: true,
					},
					targets: 0,
				},
			],
			columns: [
				{ data: null },
				{ data: "group_name" },
				{ data: "id" },
				{ data: "description" },
				{ data: null, defaultContent: "0" },
				{ data: "created_date" },
				{
					data: null,
					defaultContent:
						'<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button><div class="dropdown-menu"><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item" href="#">Delete</a></div></div>',
					className: "dt-body-center",
					searchable: false,
					orderable: false,
				},
			],
			order: [[1, "asc"]],
			responsive: true,
			lengthMenu: [5, 10],
			autoWidth: false,
			buttons: [
				{
					extend: "copy",
					className: "btn btn-sm",
				},
				{
					extend: "csv",
					className: "btn btn-sm",
				},
				{
					extend: "excel",
					className: "btn btn-sm",
				},
				{
					extend: "pdf",
					className: "btn btn-sm",
				},
				{
					extend: "print",
					className: "btn btn-sm",
				},
				{
					extend: "colvis",
					columns: [1, 2, 3, 4, 5],
					text: "Hiển thị",
				},
			],
		});

		$("#delete_btn").on("click", function () {
			var selected_rows = table.column(0).data();
			// $.each(selected_rows, function(key, id){
			//   console.log( id);
			// });
			console.log(selected_rows);
		});
		table
			.buttons()
			.container()
			.appendTo("#customer-group-wrapper .col-md-6:eq(0)");
	} else if (index2 == 2) {
		url_attr = "";
	} else if (index2 == 3) {
		url_attr = "";
	}
}

// lgtm [js/unused-local-variable]
