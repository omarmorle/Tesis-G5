$(function() {

	// Set the default dates
	var startDate	= Date.create().addDays(-6),	// 7 days ago
		endDate		= Date.create(); 				// today

	var range = $('#range');

	// Show the dates in the range input
	range.val(startDate.format('{MM}/{dd}/{yyyy}') + ' - ' + endDate.format('{MM}/{dd}/{yyyy}'));

	// Load chart
	ajaxLoadChart(startDate,endDate);
	
	range.daterangepicker({
		
		startDate: startDate,
		endDate: endDate,
		
		ranges: {
            'Hoy': ['today', 'today'],
            'Ayer': ['yesterday', 'yesterday'],
            'Ultimos 7 dias': [Date.create().addDays(-6), 'today'],
            'Ultimos 30 dias': [Date.create().addDays(-29), 'today']
        }
	},function(start, end){
		
		ajaxLoadChart(start, end);
		
	});
	
	// The tooltip shown over the chart
	var tt = $('<div class="ex-tooltip">').appendTo('body'),
		topOffset = -32;

	var data = {
		"xScale" : "time",
		"yScale" : "linear",
		"main" : [{
			className : ".stats",
			"data" : []
		}]
	};

	var opts = {
		paddingLeft : 50,
		paddingTop : 20,
		paddingRight : 10,
		axisPaddingLeft : 25,
		tickHintX: 9, // How many ticks to show horizontally

		dataFormatX : function(x) {
			
			// This turns converts the timestamps coming from
			// ajax.php into a proper JavaScript Date object
			
			return Date.create(x);
		},

		tickFormatX : function(x) {
			
			// Provide formatting for the x-axis tick labels.
			// This uses sugar's format method of the date object. 

			return x.format('{MM}/{dd}');
		},
		
		"mouseover": function (d, i) {
			var pos = $(this).offset();
			
			tt.text(d.x.format('{Month} {ord}') + ': ' + d.y).css({
				
				top: topOffset + pos.top,
				left: pos.left
				
			}).show();
		},
		
		"mouseout": function (x) {
			tt.hide();
		}
	};

	// Create a new xChart instance, passing the type
	// of chart a data set and the options object
	
	var chart = new xChart('line-dotted', data, '#chart' , opts);
	
	// Function for loading data via AJAX and showing it on the chart
	function ajaxLoadChart(startDate,endDate) {

		// If no data is passed (the chart was cleared)
		
		if(!startDate || !endDate){
			chart.setData({
				"xScale" : "time",
				"yScale" : "linear",
				"main" : [{
					className : ".stats",
					data : []
				}]
			});
			
			return;
		}

		// Otherwise, issue an AJAX request

		$.getJSON('ajax.php', {
			
			start:	startDate.format('{yyyy}-{MM}-{dd}'),
			end:	endDate.format('{yyyy}-{MM}-{dd}')
			
		}, function(data) {
			
			var set = [];
			$.each(data, function() {
				set.push({
					x : this.label,
					y : parseInt(this.value, 10)
				});
			});
			
			chart.setData({
				"xScale" : "time",
				"yScale" : "linear",
				"main" : [{
					className : ".stats",
					data : set
				}]
			});

		});
	}
});
