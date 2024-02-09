"use strict";

// Class Definition
import {ChartJs} from './chart';
import {Dashboard} from './dashboard';
import {Player} from './player';

const Utils = function () {

    return {

        /**
         * CSS variable value
         * @param {string} name
         * @returns {string}
         *--------------------------------------------------------------*/
        getCSSVarValue: function(name) {
            let hex = getComputedStyle(document.documentElement).getPropertyValue('--bs-' + name);
            if (hex && hex.length > 0) {
                hex = hex.trim();
            }

            return hex;
        },

        /**
         * Get local storage item by name
         * @param {string} name
         * @returns {object}
         *--------------------------------------------------------------*/
        getLocalItem: function(name) {
            return JSON.parse(localStorage.getItem(name));
        },

        /**
         * Set local storage item
         * @param {string} name
         * @param {object} obj
         *--------------------------------------------------------------*/
        setLocalItem: function(name, obj) {
            localStorage.setItem(name, JSON.stringify(obj));
        },

        /**
         * Remove local storage item
         * @param {string} name
         *--------------------------------------------------------------*/
        removeLocalItem: function(name) {
            localStorage.removeItem(name);
        },

        /**
         * Show sanckbar message
         * @param {string} message
         *--------------------------------------------------------------*/
        showMessage: function(message) {
            Snackbar.show({
                pos: this.isRTL() ? 'bottom-left' : 'bottom-right',
                text: message,
                showAction: false
            });
        },

        /**
         * Switch skin
         *--------------------------------------------------------------*/
        changeSkin: function() {
            setTimeout(() => {
                ChartJs.overrideDefaults();
                Dashboard.init();
                Player.volumeBackground();
            }, 10);
        },

        /**
         * Check dark mode
         *--------------------------------------------------------------*/
        isDarkMode: function() {
            return (document.querySelector('body').getAttribute("data-theme") === 'dark');
        },

        /**
         * Check right to left
         *--------------------------------------------------------------*/
        isRTL: function() {
            return (document.querySelector('html').getAttribute('direction') === 'rtl');
        }
    }

}();

export { Utils };
