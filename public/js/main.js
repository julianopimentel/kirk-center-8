/* eslint-disable object-shorthand */
/* global Chart, coreui, coreui.Utils.getStyle, coreui.Utils.hexToRgba */

/**
 * --------------------------------------------------------------------------
 * CoreUI Boostrap Admin Template (v3.0.0): main.js
 * Licensed under MIT (https://coreui.io/license)
 * --------------------------------------------------------------------------
 */

/* eslint-disable no-magic-numbers */
// Disable the on-canvas tooltip
// eslint-disable-next-line no-unused-vars
const mainChart = new Chart(document.getElementById('main-chart'), {
  type: 'line',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    datasets: [
      {
        label: 'Ano Atual',
        backgroundColor: coreui.Utils.hexToRgba(coreui.Utils.getStyle('--info'), 10),
        borderColor: coreui.Utils.getStyle('--info'),
        pointHoverBackgroundColor: '#fff',
        borderWidth: 2,
        data: [15000, 11000, 13000, 17000],
      },
      {
        label: 'Ano Anterior',
        backgroundColor: 'transparent',
        borderColor: coreui.Utils.getStyle('--success'),
        pointHoverBackgroundColor: '#fff',
        borderWidth: 2,
        data:  [16000, 1200, 5000, 7000, 20000, 22000, 11000, 10000, 7000, 10000, 13000, 12000],
      },
      {
        label: 'Meta',
        backgroundColor: 'transparent',
        borderColor: coreui.Utils.getStyle('--danger'),
        pointHoverBackgroundColor: '#fff',
        borderWidth: 1,
        borderDash: [8, 5],
        data:  [12000, 12000, 12000, 12000, 12000, 12000, 12000, 12000, 12000, 12000, 12000, 12000],
      }
    ]
  },
  options: {
    maintainAspectRatio: false,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          drawOnChartArea: false
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true,
          maxTicksLimit: 10,
          stepSize: Math.ceil(250 / 5),
        }
      }]
    },
    elements: {
      point: {
        radius: 0,
        hitRadius: 10,
        hoverRadius: 4,
        hoverBorderWidth: 3
      }
    },
    tooltips: {
      intersect: true,
      callbacks: {
        labelColor: function(tooltipItem, chart) {
          return { backgroundColor: chart.data.datasets[tooltipItem.datasetIndex].borderColor };
        }
      }
    }
  }
})
