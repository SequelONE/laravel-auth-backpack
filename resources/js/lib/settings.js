/**
 * Theme Settings v1.0.0
 * Copyright 2019 Kri8thm
 * Licensed under MIT
 *------------------------------------*/

import {Utils} from "./utils";
(function ($, window, document, undefined) {

    $.fn.extend({
        settings: function(options) {
            options = $.extend({}, $.settings.defaults, options);

            // this creates a plugin for each element in the selector or runs the function once per selector.
            this.each(function() {
                new $.settings(this, options);
            });
            return;
        }
    });

    $.settings = function(element, options) {
        var body = document.body;
        var skin = 'skin';
        // settings constant config
        var config = {
            name: 'setting',
            title: 'Theme Settings',
            colors: ['yellow', 'orange', 'red', 'green', 'blue', 'purple', 'indigo', 'dark'],
            theme: ['light', 'dark'],
        };

        var dataAttr = {
            theme: 'data-theme',
            header: 'data-header',
            sidebar: 'data-sidebar',
            player: 'data-player',
        }

        var init = () => {
            var header = document.getElementById('header');
            var sidebar = document.getElementById('sidebar');
            var player = document.getElementById('player');

            var dark = 'dark';

            var skinObj = {
                dark: options.dark,
                header: options.header,
                sidebar: options.sidebar,
                player: options.player
            };

            // Set object in local storage
            Utils.setLocalItem(skin, skinObj);
            skinObj.dark ? body.setAttribute(dataAttr.theme, dark) : body.removeAttribute(dataAttr.theme);

            if (header && options.header) {
                header.setAttribute(dataAttr.header, options.header);
            }

            if (sidebar && options.sidebar) {
                sidebar.setAttribute(dataAttr.sidebar, options.sidebar);
            }

            if (player && options.player) {
                player.setAttribute(dataAttr.player, options.player);
            }
        };

        // setting template to append in DOM
        var template = () => {
            var setting = document.createElement('div');
            var html = `<a href="javascript:void(0);" id="${config.name}_toggler">Settings</a>
                    <div class="${config.name}__wrapper">
                        <div class="${config.name}__head">${config.title}</div>
                        <div class="${config.name}__body">`;

            html += optionsTemplate(config.theme, 'Theme', 'theme'); // Bind theme skin options
            html += optionsTemplate(config.colors, 'Header', 'header'); // Bind header skin options
            html += optionsTemplate(config.colors, 'Sidebar', 'sidebar'); // Bind sidebar skin options
            html += optionsTemplate(config.colors, 'Player', 'player'); // Bind player skin options
            html += `<p class="mt-4">Note: You can see the color change effect of the header, sidebar and player in the inner pages.</p></div></div>`;

            setting.id = config.name;
            setting.innerHTML = html;
            body.appendChild(setting);
            events();
        };

        var optionsTemplate = (list, label, name) => {
            var optionHtml = `<div class="${config.name}__body__item"><span class="${config.name}__title">${label}</span>
                <div class="${config.name}__options">`;

            for (let i = 0; i < list.length; i++) {
                var color = list[i];
                optionHtml += `<a href="javascript:void(0);" class="${config.name}__option ${config.name}__option--${color}" data-${name}-option="${color}"></a>`
            }

            optionHtml += `</div></div>`;
            return optionHtml;
        };

        // events for settings option
        var events = () => {
            var setting = $(`#${config.name}`);
            var toggler = $(`#${config.name}_toggler`);
            var link = $(`.${config.name}__option`);
            var show = 'show';
            var active = 'active';

            $(body).on('click', () => {
                setting.removeClass(show);
            });

            toggler.on('click', () => {
                setting.toggleClass(show);
            });

            setting.on('click', (e) => {
                e.stopPropagation();
            });

            link.on('click', function() {
                var $this = $(this);
                var theme = $this.data('theme-option');
                var headerTheme = $this.data('header-option');
                var sidebarTheme = $this.data('sidebar-option');
                var playerTheme = $this.data('player-option');

                if (theme) {
                    $('[data-theme-option]').removeClass(active);
                    theme === 'dark' ? options.dark = true : options.dark = false;
                    Utils.changeSkin();

                } else if (headerTheme) {
                    $('[data-header-option]').removeClass(active);
                    options.header = headerTheme;

                } else if (sidebarTheme) {
                    $('[data-sidebar-option]').removeClass(active);
                    options.sidebar = sidebarTheme;

                } else if (playerTheme) {
                    $('[data-player-option]').removeClass(active);
                    options.player = playerTheme;
                }

                $this.addClass(active);
                init();
            });
        };

        var initAttr = () => {
            options.dark ? $('[data-theme-option="dark"]').addClass('active') : $('[data-theme-option="light"]').addClass('active');
            $('[data-header-option=' + options.header + ']').addClass('active');
            $('[data-sidebar-option=' + options.sidebar + ']').addClass('active');
            $('[data-player-option=' + options.player + ']').addClass('active');
        };

        (() => {
            var obj = Utils.getLocalItem(skin);
            if (obj) {
                options = $.extend({}, options, obj);
            }

            init();
            template();
            initAttr();
        })();
    };

    // setting default options
    $.settings.defaults = {
        dark: false,
        header: null,
        sidebar: null,
        player: null,
    };

})(jQuery, window, document);
