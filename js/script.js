// SIDEBAR OPEN
var openSidebar = false;
var sidebar = document.getElementById("sidebar");

function openSidebar(){
    if(!sidebarOpen){
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen = true;
    }
}

function closeSidebar(){
    if(!sidebarOpen){
        sidebar.classList.remove("sidebar-responsive");
        sidebar = false;
    }
}

/* ---------------- CHART ---------------- */
// BAR CHART
var barChartOptions = {
    series: [
    {
        name: 'PRODUCTS',
        data: [0, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380, 500, 0]
    }, {
        name: 'Purchase Orders',
        data: [0, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380, 1500, 0]
    }, {
        name: 'SALES Orders',
        data: [0, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380, 1500, 0]
    }, {
        name: 'Inventory ALERTS',
        data: [0, 430, 448, 470, 40, 50, 690, 1100, 1200, 1380, 1500, 1620]
    }],
    chart: {
    type: 'bar',
    height: 350,
    toolbar:{
        show: false,
    },
    },
    colors: [
        '#246dec',
        '#cc3c43',
        '#367952',
        '#f5b74f',
    ],
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded',
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        labels: {
            style: {
                colors: "#000000",
            },
        },
    },
    yaxis: {
        title: {
            text: '$ (thousands)',
            style: {
                color: '#000000',
            },
        },
        labels: {
            style: {
                colors: '#000000',
            },
        },
    },
};

var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
barChart.render();

// Area CHART -- Purchase and Sales Orders

var areaChartOptions = {
    series: [{
    name: 'Purchase Orders',
    data: [31, 40, 28, 51, 42, 110, 100, 300, 120, 500, 900, 1000]
  }, {
    name: 'SALES Orders',
    data: [11, 32, 45, 32, 55, 40, 90, 100, 45, 50, 550, 310]
  }],
    chart: {
    height: 350,
    type: 'area',
    toolbar: {
        show: false,
    },
  },
  colors: ["#4f35a1", "#246dec"],
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: 'smooth'
  },
  labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
  markers: {
    size: 0
  },
  yaxis: [
    {
      title: {
        text: 'Purchase Orders',
      },
    },
    {
      opposite: true,
      title: {
        text: 'SALES Orders',
      },
    },
  ],
  tooltip: {
    shared: true,
    intersect: false,
  }
};

  var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);
  areaChart.render();
