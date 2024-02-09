"use strict";

// Class Definition
import {Chart} from 'chart.js';
import {Utils} from "./utils";

export const Dashboard = function () {

    let totalUsersChart,
        totalSongsChart,
        purchasesChart,
        statisticsChart;

    /**
     * User chart
     * Plugin: Chart.js [https://www.chartjs.org/]
     *--------------------------------------------------------------*/
    const totalUsers = function() {
        let canvas = document.getElementById('total_user');

        if (totalUsersChart) {
            totalUsersChart.destroy();
        }

        if (canvas) {
            let config = {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [
                        {
                            label: 'Users',
                            data: [65, 59, 42, 73, 56, 55, 40],
                            backgroundColor: Utils.getCSSVarValue('red'),
                            borderColor: Utils.getCSSVarValue('red'),
                            borderWidth: 2,
                            pointRadius: 0,
                            pointHoverRadius: 5,
                            pointHoverBorderWidth: 12,
                            pointBackgroundColor: Chart.helpers.color(Utils.getCSSVarValue('red')).alpha(0).rgbString(),
                            pointBorderColor: Chart.helpers.color(Utils.getCSSVarValue('red')).alpha(0).rgbString(),
                            pointHoverBackgroundColor: Utils.getCSSVarValue('red'),
                            pointHoverBorderColor: Chart.helpers.color(Utils.getCSSVarValue('red')).alpha(0.1).rgbString(),
                        }
                    ]
                },
                options: {
                    title: {
                        display: false,
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    elements: {
                        borderJoinStyle: 'bevel',
                        borderCapStyle: 'round',
                        line: {
                            tension: 0.4
                        }
                    },
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            display: false,
                            min: 0,
                            max: 85
                        }
                    },
                    layout: {
                        margin: 0,
                        padding: 0
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                    }
                }
            };

            totalUsersChart = new Chart(canvas, config);
        }
    }

    /**
     * User chart
     * Plugin: Chart.js [https://www.chartjs.org/]
     *--------------------------------------------------------------*/
    const totalSongs = function() {
        let canvas = document.getElementById('total_songs');

        if (totalSongsChart) {
            totalSongsChart.destroy();
        }

        if (canvas) {
            let config = {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [
                        {
                            label: 'Songs',
                            data: [65, 59, 42, 73, 56, 55, 40],
                            backgroundColor: Utils.getCSSVarValue('green'),
                            borderWidth: 0,
                            barThickness: 16,
                            pointRadius: 0
                        }
                    ]
                },
                options: {
                    title: {
                        display: false,
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    elements: {
                        borderJoinStyle: 'bevel',
                        borderCapStyle: 'round',
                        line: {
                            tension: 0.4
                        }
                    },
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            display: false,
                            min: 0,
                            max: 85
                        }
                    },
                    layout: {
                        margin: 0,
                        padding: 0
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                    }
                }
            };

            totalSongsChart = new Chart(canvas, config);
        }
    }

    /**
     * User chart
     * Plugin: Chart.js [https://www.chartjs.org/]
     *--------------------------------------------------------------*/
    const purchases = function() {
        let canvas = document.getElementById('purchases');

        if (purchasesChart) {
            purchasesChart.destroy();
        }

        if (canvas) {
            let config = {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [
                        {
                            label: 'Purchases',
                            data: [65, 59, 42, 73, 56, 55, 40],
                            backgroundColor: 'transparent',
                            borderColor: '#000000',
                            borderWidth: 2,
                            pointRadius: 0,
                            pointHoverRadius: 5,
                            pointHoverBorderWidth: 12,
                            pointBackgroundColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                            pointBorderColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                            pointHoverBackgroundColor: '#000000',
                            pointHoverBorderColor: Chart.helpers.color('#000000').alpha(0.1).rgbString(),
                        }
                    ]
                },
                options: {
                    title: {
                        display: false,
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    elements: {
                        borderJoinStyle: 'bevel',
                        borderCapStyle: 'round',
                        line: {
                            tension: 0.4
                        }
                    },
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            display: false,
                            min: 0,
                            max: 85
                        }
                    },
                    layout: {
                        margin: 0,
                        padding: 0
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                    }
                }
            };

            purchasesChart = new Chart(canvas, config);
        }
    }

    /**
     * User chart
     * Plugin: Chart.js [https://www.chartjs.org/]
     *--------------------------------------------------------------*/
    const statistics = function() {
        let canvas = document.getElementById('user_statistics');

        if (statisticsChart) {
            statisticsChart.destroy();
        }

        if (canvas) {
            let config = {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [
                        {
                            label: 'Statistics',
                            data: [65, 59, 42, 73, 56, 55, 40],
                            backgroundColor: Utils.getCSSVarValue('purple'),
                            borderWidth: 0,
                            barThickness: 32,
                            pointRadius: 0
                        }
                    ]
                },
                options: {
                    title: {
                        display: false,
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    elements: {
                        borderJoinStyle: 'bevel',
                        borderCapStyle: 'round',
                        line: {
                            tension: 0.4
                        }
                    },
                    scales: {
                        y: {
                            min: 0,
                            max: 80,
                            grid: {
                                borderColor: Utils.isDarkMode() ? '#34343e' : '#EFF2F5',
                            }
                        },
                        x: {
                            grid: {
                                borderColor: Utils.isDarkMode() ? '#34343e' : '#EFF2F5',
                            }
                        }
                    },
                    layout: {
                        margin: 0,
                        padding: 0
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                    }
                }
            };

            statisticsChart = new Chart(canvas, config);
        }
    }

    return {
        init: function() {
            totalUsers();
            totalSongs();
            purchases();
            statistics();
        }
    }

}();

// Class initialization on page load
$(document).ready(function() {
    Dashboard.init();
});
