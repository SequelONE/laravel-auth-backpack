import * as Amplitude from "amplitudejs";
import {Utils} from "./utils";
// Class Definition
export const Player = function () {

    let show = 'show';
    let active = 'active';

    let $body = $('body');
    let $playlist = $('#playlist');
    let songs = [];
    let playerConfig = Amplitude.getConfig();
    let mediaControls = {
        playPause: false,
        nextPrev: false
    };

    /**
     * Bind local storage songs with player
     *--------------------------------------------------------------*/
    let player = function() {
        if (Utils.getLocalItem('songs') && Utils.getLocalItem('songs').length) {
            songs = Utils.getLocalItem('songs');

            initPlayer(false);
            setPlayerPaused(); // Add and remove class to player play pause button

            if (songs.length > 1) {
                for (let i = 0; i < songs.length; i++) {
                    let song = songs[i];
                    if (i === 0) {
                        $playlist.html(playlistItem(song));
                    } else {
                        $playlist.append(playlistItem(song));
                    }
                }
            }
        }
    }

    /**
     * Play pause song
     *--------------------------------------------------------------*/
    let playPause = function() {
        $body.on('click', '[data-play-id]', function () {
            let song = getSongObject(this);
            let index = songs.findIndex(item => item.id === song.id);

            // Check song status is pause
            if ($(this).hasClass(active)) {
                Amplitude.pause();
                setPlayerPaused(); // Add and remove class to player play pause button

            } else {
                // Add song if not exist
                if (index === -1) {
                    songs.push(song);

                    // Initialize player
                    if (songs.length === 1) {
                        initPlayer();
                    } else {
                        $playlist.append(playlistItem(song));
                        Amplitude.playSongAtIndex(songs.length - 1);
                    }

                } else { // Play exist song
                    Amplitude.playSongAtIndex(index);
                }
            }

            Utils.setLocalItem('songs', songs);
        });
    }

    /**
     * Add song in playlist
     *--------------------------------------------------------------*/
    const addToQueue = function() {
        $body.on('click', '[data-queue-id]', function () {
            let song = getSongObject(this);
            let index = songs.findIndex(item => item.id === song.id);

            // Add song if not exist
            if (index === -1) {
                songs.push(song);
                songs.length === 1 ? initPlayer() : $playlist.append(playlistItem(song));

            } else { // Show message exist song
                Utils.showMessage('Song already in Queue');
            }

            Utils.setLocalItem('songs', songs);
        });
    }

    /**
     * Add song in playlist for play next
     *--------------------------------------------------------------*/
    const nextToPlay = function() {
        $body.on('click', '[data-next-id]', function () {
            let song = getSongObject(this);
            let activeIndex = Amplitude.getActiveIndex();
            let index = songs.findIndex(item => item.id === song.id);

            if (songs && !songs.length) {
                songs.push(song);
                initPlayer();

            } else {
                // Add song if not exist
                if (index === -1) {
                    songs.splice(activeIndex + 1, 0, song);
                    $playlist.find('.list__item').eq(activeIndex).after(playlistItem(song));

                } else { // Show message exist song
                    Utils.showMessage('Song already in Queue');
                }
            }

            Utils.setLocalItem('songs', songs);
        });
    }

    /**
     * Play all songs in list
     *--------------------------------------------------------------*/
     const playAll = function() {
        $body.on('click', '[data-collection-play-id]', function () {
            let id = $(this).attr('data-collection-play-id');
            let $el = $('[data-collection-song-id=' + id + ']');
            let $list = $el.find('[data-song-id]');
            let songList = [];
            let index = 0;

            $list.each(function() {
                let song = getSongObject(this);
                songList.push(song);
            });

            if (songs && !songs.length) {
                songs = songList;
                initPlayer();
                index = 1;

            } else {
                songs.push(...songList);
            }

            for (let i = index; i < songList.length; i++) {
                $playlist.append(playlistItem(songList[i]));
            }

            Utils.setLocalItem('songs', songs);
        });
    }

    /**
     * Remove song from playlist
     *--------------------------------------------------------------*/
    const removeSong = function() {
        $body.on('click', '[data-remove-song-id]', function (e) {
            e.stopPropagation();

            let id = parseInt($(this).data('remove-song-id'));
            let $item = $(this).closest('[data-song-id');
            let index = songs.findIndex(song => song.id === id);

            if (index > -1) {
                $item.remove();
                Amplitude.removeSong(index);
                if (songs.length === 0) {
                    emptyPlaylist();
                }
            }

            Utils.setLocalItem('songs', songs);
        });
    }

    /**
     * Clear song from playlist
     *--------------------------------------------------------------*/
    const clearPlaylist = function() {
        $('#clear_playlist').on('click', function () {
            if (songs.length >= 1) {
                // Remove songs from list
                for (let i = 0; i < songs.length; i++) {
                    $playlist.find('.list__item').eq(i).remove();
                }

                // Remove songs from player
                for (let i = songs.length - 1; i > -1; i--) {
                    let song = songs[i];
                    let activeSong = Amplitude.getActiveSongMetadata();

                    if (song.id !== activeSong.id) {
                        Amplitude.removeSong(i);
                    }
                }

                // Set empty playlist view
                emptyPlaylist();
            }
        });
    }

    /**
     * Changed volume icon on its value
     *--------------------------------------------------------------*/
    const volume = function() {
        let $volume = $('.player-volume');
        let $input = $volume.find('input[type="range"]');

        $input.on('input', function () {
            let $mute = $volume.find('.ri-volume-mute-fill');
            let $down = $volume.find('.ri-volume-down-fill');
            let $up = $volume.find('.ri-volume-up-fill');
            let $this = $(this);

            let value = parseInt($this.val(), 10);
            let block = 'd-block';
            let none = 'd-none';

            // Change background
            Player.volumeBackground();

            // Change icon volume on input value
            if (value === 0) {
                $mute.removeClass(none).addClass(block);
                $down.addClass(none);
                $up.addClass(none);
            } else if (value > 0 && value < 70) {
                $mute.addClass(none);
                $down.removeClass(none).addClass(block);
                $up.addClass(none);
            } else if (value > 70) {
                $mute.addClass(none);
                $down.addClass(none);
                $up.removeClass(none).addClass(block);
            }
        })
    }

    /**
     * Player play pause event
     *--------------------------------------------------------------*/
    const playerEvent = function() {
        $('.amplitude-play-pause').on('click', function () {
            mediaSession();
            playerDelay(() => {
                Amplitude.getPlayerState() === 'playing' ? setPlayButtonView() : $('[data-play-id]').removeClass(active);
            });
        });

        $('.amplitude-prev').on('click', function() {
            playerConfig.player_state = 'playing';
        });

        $('.amplitude-next').on('click', function() {
            playerConfig.player_state = Amplitude.getActiveIndex() ? 'playing' : 'stopped';
        });
    }

    /**
     * Delay between song change
     *--------------------------------------------------------------*/
    const playerDelay = function(callback) {
        setTimeout(callback, Amplitude.getDelay());
    }

    /**
     * Initialize player
     * @param {boolean} isPlay
     *--------------------------------------------------------------*/
    const initPlayer = function(isPlay = true) {
        // Show player UI
        $('#player').addClass(show);

        if (Amplitude.getSongs() && Amplitude.getSongs().length === 1) {
            Amplitude.pause();
            playerDelay(() => {
                Player.volumeBackground(); // Change volume input background
            });
        }

        // Init Amplitude plugin
        Amplitude.init({
            songs: songs,
            callbacks: {
                song_change: function() {
                    // Change play pause button view
                    playerDelay(() => {
                        mediaSession();
                        Amplitude.getPlayerState() === 'playing' ? setPlayButtonView() : $('[data-play-id]').removeClass(active);
                        changePlayerOptions(song); // Change player options when song changed
                    });
                }
            }
        });

        let song = songs[0];
        $playlist.html(playlistItem(song));
        disablePlayerControls(false);

        setPlayerPlaying(); // Add and remove class to player play pause button

        if (isPlay) {
            Amplitude.play();
            setPlayButtonView();
            mediaSession();
        }

        // Change player options when song changed
        changePlayerOptions(song);
    }

    /**
     * Get song object to bind with player
     * @param {object} the
     * @returns {object}
     *--------------------------------------------------------------*/
    const getSongObject = function(the) {
        let element = $(the).closest('[data-song-id]');
        return {
            id: parseInt(element.data('song-id')),
            name: element.data('song-name'),
            artist: element.data('song-artist'),
            album: element.data('song-album'),
            url: element.data('song-url'),
            cover_art_url: element.data('song-cover')
        };
    }

    /**
     * Changed active song option that bind with player
     * @param {object} song
     *--------------------------------------------------------------*/
    const changePlayerOptions = function(song) {
        let $options = $('#player_options');

        $options.find('[data-favorite-id]').attr('data-favorite-id', song.id);
        $options.find('[data-playlist-id]').attr('data-playlist-id', song.id);
        $options.find('[download]').attr('href', song.url);
    }

    /**
     * Set player button disable attribute
     * @param {boolean} disabled
     *--------------------------------------------------------------*/
    const disablePlayerControls = function(disabled = true) {
        $('.amplitude-repeat, .amplitude-prev, .amplitude-next, .amplitude-shuffle').prop('disabled', disabled);
    }

    /**
     * Playlist song item view
     * @param {object} song
     * @returns {string}
     *--------------------------------------------------------------*/
    const playlistItem = function(song) {
        let activeSong = Amplitude.getActiveSongMetadata();

        return `<div class="list__item"
        data-song-id="${song.id}"
        data-song-name="${song.name}"
        data-song-artist="${song.artist}"
        data-song-album="${song.album}"
        data-song-url="${song.url}"
        data-song-cover="${song.cover_art_url}">
            <div class="list__cover">
                <img src="${song.cover_art_url}" alt="${song.name}">
                <a href="javascript:void(0);" class="btn btn-play btn-sm btn-default btn-icon rounded-pill ${song.id === activeSong.id ? 'active' : ''}" data-play-id="${song.id}">
                    <i class="ri-play-fill icon-play"></i>
                    <i class="ri-pause-fill icon-pause"></i>
                </a>
            </div>
            <div class="list__content">
                <a href="song-details.html" class="list__title text-truncate">${song.name}</a>
                <p class="list__subtitle text-truncate">
                    <a href="artist-details.html">${song.artist}</a>
                </p>
            </div>
            <ul class="list__option">
                <li class="list__icon-hover">
                    <a href="javascript:void(0);" role="button" class="d-inline-flex" data-remove-song-id="${song.id}">
                        <i class="ri-close-line fs-6"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" role="button" class="d-inline-flex" data-favorite-id="${song.id}">
                        <i class="ri-heart-line heart-empty"></i>
                        <i class="ri-heart-fill heart-fill"></i>
                    </a>
                </li>
            </ul>
        </div>`;
    }

    /**
     * Empty playlist view
     *--------------------------------------------------------------*/
    const emptyPlaylist = function() {
        // Set empty playlist view
        songs = [];
        disablePlayerControls();

        Amplitude.pause();
        playerConfig.player_state = 'paused';

        // Remove songs from local storage
        Utils.removeLocalItem('songs');

        $playlist.html(`<div class="col-sm-8 col-10 mx-auto mt-5 text-center">
            <i class="ri-music-2-line mb-3"></i>
            <p>No songs, album or playlist are added on lineup.</p>
        </div>`);

        playerDelay(() => {
            setPlayerPaused();
            mediaSession();
        });
    }

    /**
     * Global play/pause button view
     *--------------------------------------------------------------*/
    const setPlayButtonView = function() {
        let song = Amplitude.getActiveSongMetadata();
        $('[data-play-id]').removeClass(active);
        $('[data-play-id=' + song.id + ']').addClass(active);
    }

    /**
     * Player play button view
     *--------------------------------------------------------------*/
    const setPlayerPlaying = function() {
        $('.amplitude-play-pause').removeClass('amplitude-paused').addClass('amplitude-playing');
    }

    /**
     * Player pause button view
     *--------------------------------------------------------------*/
    const setPlayerPaused = function() {
        $('.amplitude-play-pause').removeClass('amplitude-playing').addClass('amplitude-paused');
        $('[data-play-id]').removeClass(active);
    }

    /**
     * Set media session
     *--------------------------------------------------------------*/
    const mediaSession = function() {
        let song = Amplitude.getActiveSongMetadata();
        let playlist = Amplitude.getActivePlaylist() ? Amplitude.getActivePlaylist() : '';

        // Media play onclick
        const mediaPlay = function() {
            Amplitude.play();
            setPlayerPlaying();
            setPlayButtonView();
        }

        // Media pause onclick
        const mediaPause = function() {
            Amplitude.pause();
            setPlayerPaused();
        }

        if ('mediaSession' in navigator) {
            let MEDIA = navigator.mediaSession;
            // Set song meta on notification
            MEDIA.metadata = new MediaMetadata({
                title: song.name,
                artist: song.artist,
                album: song.album,
                artwork: [
                    { src: song.cover_art_url, sizes: '96x96',   type: 'image/jpg' },
                    { src: song.cover_art_url, sizes: '128x128', type: 'image/jpg' },
                    { src: song.cover_art_url, sizes: '192x192', type: 'image/jpg' },
                    { src: song.cover_art_url, sizes: '256x256', type: 'image/jpg' },
                    { src: song.cover_art_url, sizes: '384x384', type: 'image/jpg' },
                    { src: song.cover_art_url, sizes: '512x512', type: 'image/jpg' },
                ]
            });

            if (songs.length >= 1 && !mediaControls.playPause) {
                mediaControls.playPause = true;
                MEDIA.setActionHandler('play', () => mediaPlay());
                MEDIA.setActionHandler('pause', () => mediaPause());
            }

            if (songs.length >= 2 && !mediaControls.nextPrev) {
                mediaControls.nextPrev = true;
                MEDIA.setActionHandler('previoustrack', () => Amplitude.prev(playlist));
                MEDIA.setActionHandler('nexttrack', () => Amplitude.next(playlist));
            }
        }
    }

    return {
        /**
         * Set volume slider background style
         *--------------------------------------------------------------*/
        volumeBackground: function() {
            let $volume = $('.player-volume input[type="range"]');
            let value = parseInt($volume.val(), 10);

            // Change input background gradient
            let color = Utils.isDarkMode() ? '255, 255, 255' : Utils.getCSSVarValue('dark-rgb');
            let gradient = 'linear-gradient(to right, rgb(' +
                color + ') 0%, rgb(' + color + ') ' + value + '%, rgba(' +
                color + ', 0) ' + value + '%, rgba(' + color + ', 0) 100%)';

            $volume.css('background', gradient);
        },

        init: function() {
            player();
            playPause();
            addToQueue();
            nextToPlay();
            playAll();
            removeSong();
            clearPlaylist();
            volume();
            playerEvent();
        }
    }

}();


// Class initialization on page load
$(document).ready(function() {
    Player.init();
});
