/* global Chart:false */

function customerTable(index2, site_url) {
	"use strict";

	/* ChartJS
	 * -------
	 * Here we will create a few charts using ChartJS
	 */

	//-----------------------
	// - MONTHLY SALES CHART -
	//-----------------------

	// Get context with jQuery - using jQuery's .get() method.
	if (index2 == 1) {
		var url_attr = site_url + "api/dashboard/customer/loadTableData";
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
				// getResponse(response);
				data_table = response;
			},
		});

		table = $("#customerListTable").DataTable({
			data: data_table.data,
			// columnDefs: [ {
			//     orderable: false,
			//     className: 'select-checkbox',
			//     data: 'id',
			//     targets:   0
			// } ],
			columns: [
				{
					// "targets": [0],
					searchable: false,
					orderable: false,
					// 'className': 'select-checkbox',
					data: "id",
				},
				{ data: "name" },
				{ data: "phone" },
				{ data: "group_id" },
				{ data: "debt" },
				{ data: "spend" },
				{ data: "gender" },
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
			lengthChange: false,
			autoWidth: false,
			buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
		});
		// .buttons().container().appendTo('#customer-wrapper .col-md-6:eq(0)')

		$("#delete_btn").on("click", function () {
			var selected_rows = table.column(0).data();
			// $.each(selected_rows, function(key, id){
			//   console.log( id);
			// });
			console.log(selected_rows);
		});
		table.buttons().container().appendTo("#customer-wrapper .col-md-6:eq(0)");
	} else if (index2 == 2) {
		url_attr = "";
	} else if (index2 == 3) {
		url_attr = "";
	}

	function fillCustomerTable(res) {
		return $("#customerListTable")
			.DataTable({
				data: res.data,
				columns: [
					{
						targets: [0],
						searchable: false,
						orderable: false,
						className: "dt-body-center",
						checkboxes: {
							selectRow: true,
						},
						data: "id",
					},
					{ data: "name" },
					{ data: "phone" },
					{ data: "group_id" },
					{ data: "debt" },
					{ data: "spend" },
					{ data: "" },
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
				lengthChange: false,
				autoWidth: false,
				buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
			})
			.buttons()
			.container()
			.appendTo("#customer-wrapper .col-md-6:eq(0)");
	}
}

// lgtm [js/unused-local-variable]
