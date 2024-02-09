
// Class Definition
import {Chart} from 'chart.js';
import {Utils} from "./utils";

export const ChartJs = function () {

    return {

        /**
         * Override chart defaults object
         *--------------------------------------------------------------*/
        overrideDefaults() {
            // Chart defaults
            let defaults = Chart.defaults;

            // Chart defaults config settings
            let config = {
                color: Utils.isDarkMode() ? '#92929F' : Utils.getCSSVarValue('body-color'),
                borderColor: Utils.isDarkMode() ? '#34343e' : '#EFF2F5',

                // Chart typo
                font: {
                    family: Utils.getCSSVarValue('body-font-family'),
                    size: 13
                },

                // Chart hover settings
                hover: {
                    intersect: false,
                    mode: 'index'
                }
            };

            // Chart tooltip settings
            const tooltip = {
                titleMarginBottom: 6,
                caretSize: 6,
                caretPadding: 10,
                boxWidth: 10,
                boxHeight: 10,
                boxPadding: 4,
                intersect: false,
                mode: 'index',

                padding: {
                    top: 8,
                    right: 12,
                    bottom: 8,
                    left: 12
                }
            }

            // Override Chart js defaults object
            Object.assign(defaults, config);
            Object.assign(defaults.plugins.tooltip, tooltip);
        }
    }

}();

// Call init function when DOM is ready
$(() => { ChartJs.overrideDefaults(); });
