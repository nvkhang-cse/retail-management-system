$(function () {
	"use strict";
	/* ChartJS
	 * -------
	 * Here we will create a few charts using ChartJS
	 */

	//--------------
	//- AREA CHART -
	//--------------

	// Get context with jQuery - using jQuery's .get() method.
	// var areaChartCanvas = $("#areaChart").get(0).getContext("2d");

	var areaChartData = {
		labels: [
			"04-01-2023",
			"05-01-2023",
			"06-01-2023",
			"07-01-2023",
			"08-01-2023",
			"09-01-2023",
			"10-01-2023",
		],
		datasets: [
			{
				label: "Doanh thu",
				backgroundColor: "#007bff",
				borderColor: "rgba(60,141,188,0.8)",
				pointRadius: false,
				pointColor: "#3b8bba",
				pointStrokeColor: "rgba(60,141,188,1)",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(60,141,188,1)",
				data: [2000000, 4800000, 1600000, 1900000, 860000, 2700000, 2000000],
			},
			// {
			// 	label: "Đơn mới",
			// 	backgroundColor: "#28a745",
			// 	borderColor: "rgba(210, 214, 222, 1)",
			// 	pointRadius: false,
			// 	pointColor: "rgba(210, 214, 222, 1)",
			// 	pointStrokeColor: "#c1c7d1",
			// 	pointHighlightFill: "#fff",
			// 	pointHighlightStroke: "rgba(220,220,220,1)",
			// 	data: [65, 59, 80, 81, 56, 55, 20],
			// },
		],
	};

	// var areaChartOptions = {
	// 	maintainAspectRatio: false,
	// 	responsive: true,
	// 	legend: {
	// 		display: false,
	// 	},
	// 	scales: {
	// 		xAxes: [
	// 			{
	// 				gridLines: {
	// 					display: false,
	// 				},
	// 			},
	// 		],
	// 		yAxes: [
	// 			{
	// 				gridLines: {
	// 					display: false,
	// 				},
	// 			},
	// 		],
	// 	},
	// };

	// This will get the first returned node in the jQuery collection.
	// new Chart(areaChartCanvas, {
	// 	type: "line",
	// 	data: areaChartData,
	// 	options: areaChartOptions,
	// });

	//-------------
	//- LINE CHART -
	//--------------
	// var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
	// var lineChartOptions = $.extend(true, {}, areaChartOptions);
	// var lineChartData = $.extend(true, {}, areaChartData);
	// lineChartData.datasets[0].fill = false;
	// lineChartData.datasets[1].fill = false;
	// lineChartOptions.datasetFill = false;

	// var lineChart = new Chart(lineChartCanvas, {
	// 	type: "line",
	// 	data: lineChartData,
	// 	options: lineChartOptions,
	// });

	// //-------------
	// //- DONUT CHART -
	// //-------------
	// // Get context with jQuery - using jQuery's .get() method.
	// var donutChartCanvas = $("#donutChart").get(0).getContext("2d");
	// var donutData = {
	// 	labels: ["Chrome", "IE", "FireFox", "Safari", "Opera", "Navigator"],
	// 	datasets: [
	// 		{
	// 			data: [700, 500, 400, 600, 300, 100],
	// 			backgroundColor: [
	// 				"#f56954",
	// 				"#00a65a",
	// 				"#f39c12",
	// 				"#00c0ef",
	// 				"#3c8dbc",
	// 				"#d2d6de",
	// 			],
	// 		},
	// 	],
	// };
	// var donutOptions = {
	// 	maintainAspectRatio: false,
	// 	responsive: true,
	// };
	// //Create pie or douhnut chart
	// // You can switch between pie and douhnut using the method below.
	// new Chart(donutChartCanvas, {
	// 	type: "doughnut",
	// 	data: donutData,
	// 	options: donutOptions,
	// });

	// //-------------
	// //- PIE CHART -
	// //-------------
	// // Get context with jQuery - using jQuery's .get() method.
	// var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
	// var pieData = donutData;
	// var pieOptions = {
	// 	maintainAspectRatio: false,
	// 	responsive: true,
	// };
	// //Create pie or douhnut chart
	// // You can switch between pie and douhnut using the method below.
	// new Chart(pieChartCanvas, {
	// 	type: "pie",
	// 	data: pieData,
	// 	options: pieOptions,
	// });

	//-------------
	//- BAR CHART -
	//-------------
	var barChartCanvas = $("#barChart").get(0).getContext("2d");
	var barChartData = $.extend(true, {}, areaChartData);
	var temp0 = areaChartData.datasets[0];
	// var temp1 = areaChartData.datasets[1];
	barChartData.datasets[0] = temp0;
	// barChartData.datasets[1] = temp1;

	var barChartOptions = {
		responsive: true,
		maintainAspectRatio: false,
		datasetFill: false,
	};

	new Chart(barChartCanvas, {
		type: "bar",
		data: barChartData,
		options: barChartOptions,
	});

	//---------------------
	//- STACKED BAR CHART -
	//---------------------
	// var stackedBarChartCanvas = $("#stackedBarChart").get(0).getContext("2d");
	// var stackedBarChartData = $.extend(true, {}, barChartData);

	// var stackedBarChartOptions = {
	// 	responsive: true,
	// 	maintainAspectRatio: false,
	// 	scales: {
	// 		xAxes: [
	// 			{
	// 				stacked: true,
	// 			},
	// 		],
	// 		yAxes: [
	// 			{
	// 				stacked: true,
	// 			},
	// 		],
	// 	},
	// };

	// new Chart(stackedBarChartCanvas, {
	// 	type: "bar",
	// 	data: stackedBarChartData,
	// 	options: stackedBarChartOptions,
	// });
});
