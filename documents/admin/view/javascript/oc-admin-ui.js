(function($) {
    'use strict';

    if (!$) {
        return;
    }

    var SIDEBAR_BREAKPOINT = '(max-width: 991.98px)';

    function isMobileViewport() {
        return window.matchMedia(SIDEBAR_BREAKPOINT).matches;
    }

    function decoratePage() {
        var $content = $('#content');

        if (!$content.length) {
            return;
        }

        $content.addClass('oc-admin-page');
        $content.find('> .page-header .float-end').addClass('oc-toolbar');
        $content.find('.table-responsive').addClass('oc-table');
        $content.find('form[data-oc-toggle]').addClass('oc-form');
        $content.find('[id^="filter-"]').addClass('oc-filter-panel');
    }

    function setSidebarState(open) {
        var $body = $('body');
        var $sidebar = $('#column-left');

        if (!$sidebar.length) {
            return;
        }

        if (!isMobileViewport()) {
            $body.removeClass('oc-sidebar-open');
            $sidebar.removeClass('active');
            return;
        }

        $body.toggleClass('oc-sidebar-open', !!open);
        $sidebar.toggleClass('active', !!open);
    }

    function initSidebar() {
        var $sidebar = $('#column-left');

        if (!$sidebar.length) {
            return;
        }

        $(document).on('click.ocAdminUi', '#button-menu', function(e) {
            if (!isMobileViewport()) {
                return;
            }

            e.preventDefault();
            setSidebarState(!$('body').hasClass('oc-sidebar-open'));
        });

        $(document).on('click.ocAdminUi', function(e) {
            if (!isMobileViewport() || !$('body').hasClass('oc-sidebar-open')) {
                return;
            }

            if ($(e.target).closest('#column-left, #button-menu').length) {
                return;
            }

            setSidebarState(false);
        });

        $(document).on('keydown.ocAdminUi', function(e) {
            if (e.key === 'Escape') {
                setSidebarState(false);
            }
        });

        $sidebar.on('click.ocAdminUi', 'a', function() {
            if (isMobileViewport() && !$(this).hasClass('parent')) {
                setSidebarState(false);
            }
        });

        $(window).on('resize.ocAdminUi', function() {
            window.requestAnimationFrame(function() {
                setSidebarState(false);
            });
        });

        setSidebarState(false);
    }

    function initMobileFilterAutoClose() {
        $(document).on('click.ocAdminUi', '#button-filter', function() {
            if (!isMobileViewport()) {
                return;
            }

            var $panel = $(this).closest('[id^="filter-"]');

            if ($panel.length) {
                $panel.addClass('d-none');
            }
        });
    }

    $(function() {
        decoratePage();
        initSidebar();
        initMobileFilterAutoClose();
    });

    $(document).ajaxComplete(function() {
        decoratePage();
    });
})(window.jQuery);
