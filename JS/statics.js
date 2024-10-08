google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawCharts);
function drawCharts() {


    var barData = google.visualization.arrayToDataTable([
        ['Month', 'In', 'Out'],
        ['January',  1050,      600],
        ['Febreuary',  1370,      910],
        ['March',  660,       400],
        ['Abril',  1030,      540],
        ['May',  1000,      480],
        ['June',  1170,      960],
        ['Julay',  660,       320]
    ]);
    // set bar chart options
    var barOptions = {
        focusTarget: 'category',
        backgroundColor: 'transparent',
        colors: ['darkblue', 'lightgray'],
        fontName: 'Open Sans',
        chartArea: {
            left: 50,
            top: 10,
            width: '100%',
            height: '70%'
        },
        bar: {
            groupWidth: '80%'
        },
        hAxis: {
            textStyle: {
                fontSize: 11,
                color: '#fff'
            }
        },
        vAxis: {
            minValue: 0,
            maxValue: 1500,
            baselineColor: '#DDD',
            gridlines: {
                color: '#DDD',
                count: 4
            },
            textStyle: {
                fontSize: 11,
                color: '#fff'
            }
        },
        legend: {
            position: 'bottom',
            textStyle: {
                fontSize: 12
            }
        },
        animation: {
            duration: 1200,
            easing: 'out',
            startup: true
        }
    };
    // draw bar chart twice so it animates
    var barChart = new google.visualization.ColumnChart(document.getElementById('bar-chart'));
    //barChart.draw(barZeroData, barOptions);
    barChart.draw(barData, barOptions);

    // BEGIN LINE GRAPH

    function randomNumber(base, step) {
        return Math.floor((Math.random()*step)+base);
    }
    function createData(year, start1, start2, step, offset) {
        var ar = [];
        for (var i = 0; i < 12; i++) {
            ar.push([new Date(year, i), randomNumber(start1, step)+offset, randomNumber(start2, step)+offset]);
        }
        return ar;
    }
    var randomLineData = [
        ['Year', 'Price ', 'Market ']
    ];
    for (var x = 0; x < 7; x++) {
        var newYear = createData(2007+x, 10000, 5000, 4000, 800*Math.pow(x,2));
        for (var n = 0; n < 12; n++) {
            randomLineData.push(newYear.shift());
        }
    }
    var lineData = google.visualization.arrayToDataTable(randomLineData);


    var lineOptions = {
        backgroundColor: 'transparent',
        colors: ['cornflowerblue', 'tomato'],
        fontName: 'Open Sans',
        focusTarget: 'category',
        chartArea: {
            left: 50,
            top: 10,
            width: '100%',
            height: '70%'
        },
        hAxis: {
            //showTextEvery: 12,
            textStyle: {
                fontSize: 11,
                color: '#fff'
            },
            baselineColor: 'transparent',
            gridlines: {
                color: 'transparent'
            }
        },
        vAxis: {
            minValue: 0,
            maxValue: 50000,
            baselineColor: '#DDD',
            gridlines: {
                color: '#DDD',
                count: 4
            },
            textStyle: {
                fontSize: 11,
                color: '#fff'
            }
        },
        legend: {
            position: 'bottom',
            textStyle: {
                fontSize: 12
            }
        },
        animation: {
            duration: 1200,
            easing: 'out',
            startup: true
        }
    };

    var lineChart = new google.visualization.LineChart(document.getElementById('line-chart'));
    //lineChart.draw(zeroLineData, lineOptions);
    lineChart.draw(lineData, lineOptions);

    // BEGIN PIE CHART

    // pie chart data
    var pieData = google.visualization.arrayToDataTable([
        ['Model', 'Buys'],
        ['Mercedes',      700],
        ['BMW',   500],
        ['Ferrari',  50],
        ['Audi',    400],
        ['Hundi',  450]
    ]);
    // pie chart options
    var pieOptions = {
        backgroundColor: 'transparent',
        pieHole: 0.4,
        colors: [ "cornflowerblue",
            "olivedrab",
            "orange",
            "tomato",
            "crimson",
            "purple",
            "turquoise",
            "forestgreen",
            "navy",
            "gray"],
        pieSliceText: 'value',
        tooltip: {
            text: 'percentage'
        },
        fontName: 'Open Sans',
        chartArea: {
            width: '100%',
            height: '94%'
        },
        legend: {
            textStyle: {
                fontSize: 13
            }
        }
    };
    // draw pie chart
    var pieChart = new google.visualization.PieChart(document.getElementById('pie-chart'));
    pieChart.draw(pieData, pieOptions);
}