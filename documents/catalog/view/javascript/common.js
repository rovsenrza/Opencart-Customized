function getURLVar(key) {
    var value = [];

    var query = String(document.location).split('?');

    if (query[1]) {
        var part = query[1].split('&');

        for (i = 0; i < part.length; i++) {
            var data = part[i].split('=');

            if (data[0] && data[1]) {
                value[data[0]] = data[1];
            }
        }

        if (value[key]) {
            return value[key];
        } else {
            return '';
        }
    }
}

var OC_GUEST_WISHLIST_KEY = 'oc_guest_wishlist';

function ocSanitizeGuestWishlist(ids) {
    var cleaned = [];
    var map = {};
    var i;
    var value;

    if (!Array.isArray(ids)) {
        return cleaned;
    }

    for (i = 0; i < ids.length; i++) {
        value = parseInt(ids[i], 10);

        if (value > 0 && !map[value]) {
            map[value] = true;
            cleaned.push(value);
        }
    }

    return cleaned;
}

window.ocGuestWishlistGet = function() {
    var value = '';
    var parsed = [];

    try {
        value = localStorage.getItem(OC_GUEST_WISHLIST_KEY) || '';
    } catch (error) {
        value = '';
    }

    if (value) {
        try {
            parsed = JSON.parse(value);
        } catch (error) {
            parsed = [];
        }
    }

    return ocSanitizeGuestWishlist(parsed);
};

window.ocGuestWishlistSet = function(ids) {
    var cleaned = ocSanitizeGuestWishlist(ids);

    try {
        localStorage.setItem(OC_GUEST_WISHLIST_KEY, JSON.stringify(cleaned));
    } catch (error) {
        return [];
    }

    return cleaned;
};

window.ocGuestWishlistClear = function() {
    try {
        localStorage.removeItem(OC_GUEST_WISHLIST_KEY);
    } catch (error) {
        return [];
    }

    return [];
};

window.ocGuestWishlistAdd = function(product_id) {
    var ids = window.ocGuestWishlistGet();

    if (ids.indexOf(product_id) === -1) {
        ids.push(product_id);
        window.ocGuestWishlistSet(ids);

        return true;
    }

    return false;
};

window.ocGuestWishlistRemove = function(product_id) {
    var ids = window.ocGuestWishlistGet().filter(function(id) {
        return id !== product_id;
    });

    window.ocGuestWishlistSet(ids);

    return ids;
};

window.ocGuestWishlistSyncTotal = function() {
    if (window.ocCustomerLogged) {
        return;
    }

    var $wishlist = $('#wishlist-total');
    var count = window.ocGuestWishlistGet().length;
    var template = $wishlist.attr('data-wishlist-template') || 'Wish List (%s)';
    var text = template.replace('%s', count);

    if ($wishlist.length) {
        $wishlist.attr('title', text);
        $wishlist.find('span').text(text);
    }
};

window.ocWishlistSyncTotalFromServerText = function(totalText) {
    var $wishlist = $('#wishlist-total');

    if ($wishlist.length && totalText) {
        $wishlist.attr('title', totalText);
        $wishlist.find('span').text(totalText);
    }
};

// Observe
+function($) {
    $.fn.observe = function(callback) {
        observer = new MutationObserver(callback);

        observer.observe($(this)[0], {
            characterData: false,
            childList: true,
            attributes: false
        });
    };
}(jQuery);

$(document).ready(function() {
    // Tooltip
    var oc_tooltip = function() {
        // Get tooltip instance
        tooltip = bootstrap.Tooltip.getInstance(this);

        if (!tooltip) {
            // Apply to current element
            tooltip = bootstrap.Tooltip.getOrCreateInstance(this);
            tooltip.show();
        }
    }

    $(document).on('mouseenter', '[data-bs-toggle=\'tooltip\']', oc_tooltip);

    $(document).on('click', 'button', function() {
        $('.tooltip').remove();
    });

    // Frontend alerts: convert all bootstrap alert banners into animated toasts.
    if (typeof window.ocInitFrontendAlertSystem === 'function') {
        window.ocInitFrontendAlertSystem();
    }

    if (!window.ocCustomerLogged && typeof window.ocGuestWishlistSyncTotal === 'function') {
        window.ocGuestWishlistSyncTotal();
    }
});

// Button
$(document).ready(function() {
    +function($) {
        $.fn.button = function(state) {
            return this.each(function() {
                var element = this;

                if (state == 'loading') {
                    this.html = $(element).html();
                    this.state = $(element).prop('disabled');

                    $(element).prop('disabled', true).width($(element).width()).html('<i class="fa-solid fa-circle-notch fa-spin text-light"></i>');
                }

                if (state == 'reset') {
                    $(element).prop('disabled', this.state).width('').html(this.html);
                }
            });
        };
    }(jQuery);
});

// Frontend Toast Alerts
+function($) {
    var frontendAlertObserver = null;

    function ensureFrontendAlertStyle() {
        if (document.getElementById('oc-front-alert-style')) {
            return;
        }

        var css = '' +
            '#oc-front-alert-stack{' +
                'position:fixed;top:20px;right:20px;z-index:1090;display:flex;flex-direction:column;gap:10px;max-width:420px;width:calc(100vw - 32px);pointer-events:none;' +
            '}' +
            '.oc-front-alert{' +
                'pointer-events:auto;display:flex;align-items:flex-start;gap:10px;padding:12px 14px;border-radius:12px;color:#fff;' +
                'box-shadow:0 16px 40px rgba(0,0,0,.28);transform:translateY(-12px) scale(.97);opacity:0;' +
                'animation:ocFrontAlertIn .28s ease forwards;overflow:hidden;position:relative;background:#2a7f4f;' +
            '}' +
            '.oc-front-alert-danger{background:#b53b3b;}' +
            '.oc-front-alert-success{background:#2a7f4f;}' +
            '.oc-front-alert-warning{background:#b9780d;}' +
            '.oc-front-alert-info{background:#1663a0;}' +
            '.oc-front-alert-close{border:0;background:transparent;color:inherit;opacity:.9;line-height:1;font-size:1.15rem;padding:0 0 0 6px;}' +
            '.oc-front-alert-close:hover{opacity:1;}' +
            '.oc-front-alert-body{min-width:0;}' +
            '.oc-front-alert-title{font-weight:700;font-size:.95rem;margin:0 0 2px;}' +
            '.oc-front-alert-text{font-size:.9rem;line-height:1.35;word-break:break-word;}' +
            '.oc-front-alert-text ul{margin:6px 0 0 18px;padding:0;}' +
            '.oc-front-alert a{color:#fff;text-decoration:underline;}' +
            '.oc-front-alert.oc-hide{animation:ocFrontAlertOut .24s ease forwards;}' +
            '.oc-front-alert-progress{position:absolute;left:0;bottom:0;height:3px;width:100%;background:rgba(255,255,255,.38);transform-origin:left center;animation:ocFrontAlertProgress linear forwards;}' +
            '@keyframes ocFrontAlertIn{to{transform:translateY(0) scale(1);opacity:1;}}' +
            '@keyframes ocFrontAlertOut{to{transform:translateY(-10px) scale(.96);opacity:0;}}' +
            '@keyframes ocFrontAlertProgress{to{transform:scaleX(0);}}';

        $('head').append('<style id="oc-front-alert-style">' + css + '</style>');
    }

    function getFrontendAlertStack() {
        var $stack = $('#oc-front-alert-stack');

        if (!$stack.length) {
            $('body').append('<div id="oc-front-alert-stack" aria-live="polite" aria-atomic="true"></div>');
            $stack = $('#oc-front-alert-stack');
        }

        return $stack;
    }

    function getFrontendAlertTypeFromClass(className) {
        if (className.indexOf('alert-success') !== -1) {
            return 'success';
        }

        if (className.indexOf('alert-warning') !== -1) {
            return 'warning';
        }

        if (className.indexOf('alert-info') !== -1) {
            return 'info';
        }

        return 'danger';
    }

    function getFrontendAlertTitle(type) {
        if (type === 'success') {
            return 'Success';
        }

        if (type === 'warning') {
            return 'Warning';
        }

        if (type === 'danger') {
            return 'Error';
        }

        return 'Notice';
    }

    function hideFrontendAlert($alert) {
        if (!$alert || !$alert.length || $alert.hasClass('oc-hide')) {
            return;
        }

        $alert.addClass('oc-hide');

        window.setTimeout(function() {
            $alert.remove();
        }, 260);
    }

    window.ocShowFrontendAlert = function(type, html, timeout, title) {
        ensureFrontendAlertStyle();

        var variant = (type === 'success' || type === 'danger' || type === 'warning') ? type : 'info';
        var alertTitle = title || getFrontendAlertTitle(variant);
        var parsedTimeout = parseInt(timeout, 10);
        var alertTimeout = isNaN(parsedTimeout) ? 5000 : parsedTimeout;
        var $stack = getFrontendAlertStack();
        var $alert = $('<div class="oc-front-alert oc-front-alert-' + variant + '">' +
            '<div class="oc-front-alert-body">' +
                '<p class="oc-front-alert-title">' + alertTitle + '</p>' +
                '<div class="oc-front-alert-text">' + html + '</div>' +
            '</div>' +
            '<button type="button" class="oc-front-alert-close" aria-label="Close">&times;</button>' +
            '<span class="oc-front-alert-progress" style="animation-duration:' + alertTimeout + 'ms"></span>' +
        '</div>');

        $alert.on('click', '.oc-front-alert-close', function() {
            hideFrontendAlert($alert);
        });

        $stack.prepend($alert);

        window.setTimeout(function() {
            hideFrontendAlert($alert);
        }, alertTimeout);
    };

    window.ocConvertBootstrapAlerts = function(root) {
        var $scope = root ? $(root) : $(document.body);
        var $alerts = $scope.find('.alert.alert-dismissible');

        if ($scope.is('.alert.alert-dismissible')) {
            $alerts = $alerts.add($scope);
        }

        $alerts.each(function() {
            var $native = $(this);
            var $clone = $native.clone();

            $clone.find('.btn-close').remove();
            $clone.find('.fa-solid, .fa-regular').first().remove();

            var html = $.trim($clone.html());

            if (html) {
                window.ocShowFrontendAlert(getFrontendAlertTypeFromClass($native.attr('class') || ''), html);
            }

            $native.remove();
        });
    };

    window.ocInitFrontendAlertSystem = function() {
        ensureFrontendAlertStyle();
        window.ocConvertBootstrapAlerts(document.body);

        if (frontendAlertObserver) {
            return;
        }

        frontendAlertObserver = new MutationObserver(function() {
            window.ocConvertBootstrapAlerts(document.body);
        });

        frontendAlertObserver.observe(document.body, {
            childList: true,
            subtree: true
        });
    };

    function renderErrorList(error) {
        var rows = [];
        var key;

        if (typeof error === 'string') {
            rows.push(error);
        } else if (typeof error === 'object' && error !== null) {
            if (error.warning) {
                rows.push(error.warning);
            }

            for (key in error) {
                if (key !== 'warning') {
                    rows.push(error[key]);
                }
            }
        }

        if (!rows.length) {
            return '';
        }

        return '<ul><li>' + rows.join('</li><li>') + '</li></ul>';
    }

    window.ocShowCartAlert = function(type, title, html, timeout) {
        var alertType = type === 'success' ? 'success' : 'danger';

        window.ocShowFrontendAlert(alertType, html, timeout, title);
    };

    window.ocShowCartResponseAlerts = function(json) {
        var shown = false;

        if (json && json.error) {
            var details = renderErrorList(json.error);

            if (details && json.redirect) {
                details += '<p class="mt-2 mb-0"><a href="' + json.redirect + '">Open product page</a></p>';
            }

            if (details) {
                window.ocShowCartAlert('danger', 'Cart Update Failed', details);
                shown = true;
            }
        }

        if (json && json.success) {
            window.ocShowCartAlert('success', 'Added To Cart', json.success);
            shown = true;
        }

        return shown;
    };
}(jQuery);

// Forms
$(document).on('submit', 'form', function (e) {
    var element = this;
    var button = (e.originalEvent !== undefined && e.originalEvent.submitter !== undefined) ? e.originalEvent.submitter : '';

    if ($(element).attr('data-oc-toggle') == 'ajax' || $(button).attr('data-oc-toggle') == 'ajax') {
        e.preventDefault();

        var form = e.target;
        var action = $(button).attr('formaction') || $(form).attr('action');
        var method = $(button).attr('formmethod') || $(form).attr('method') || 'post';
        var enctype = $(button).attr('formenctype') || $(form).attr('enctype') || 'application/x-www-form-urlencoded';

        console.log(e);
        console.log(element);
        console.log('action ' + action);
        console.log('button ' + button);
        console.log('method ' + method);
        console.log('enctype ' + enctype);
        console.log($(element).serialize());

        // https://github.com/opencart/opencart/issues/9690
        if (typeof CKEDITOR != 'undefined') {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        }

        var request_url = action.replaceAll('&amp;', '&');
        var normalized_request_url = request_url.toLowerCase();
        var is_cart_add = normalized_request_url.indexOf('route=checkout/cart.add') !== -1 || normalized_request_url.indexOf('/checkout/cart.add') !== -1;
        var is_wishlist_add = normalized_request_url.indexOf('route=account/wishlist.add') !== -1 || normalized_request_url.indexOf('/account/wishlist.add') !== -1;
        var is_login = normalized_request_url.indexOf('route=account/login.login') !== -1 || normalized_request_url.indexOf('/account/login.login') !== -1;

        if (is_wishlist_add && !window.ocCustomerLogged) {
            var product_id = parseInt($(form).find('input[name=\'product_id\']').first().val(), 10);
            var wishlist_href = $('#wishlist-total').attr('href');
            var message = '';

            if (product_id > 0) {
                if (window.ocGuestWishlistAdd(product_id)) {
                    message = 'Product added to wishlist.';

                    if (wishlist_href) {
                        message += ' <a href=\"' + wishlist_href + '\">Open wishlist</a>';
                    }
                } else {
                    message = 'Product already exists in wishlist.';
                }

                window.ocGuestWishlistSyncTotal();

                if (typeof window.ocShowFrontendAlert === 'function') {
                    window.ocShowFrontendAlert('success', message, 4200, 'Wishlist');
                }

                // Keep server-side guest session wishlist in sync with localStorage.
                $.ajax({
                    url: request_url,
                    type: method,
                    data: $(form).serialize(),
                    dataType: 'json'
                });
            } else if (typeof window.ocShowFrontendAlert === 'function') {
                window.ocShowFrontendAlert('danger', 'Unable to add this product to wishlist.', 4200, 'Wishlist');
            }

            return;
        }

        $.ajax({
            url: request_url,
            type: method,
            data: $(form).serialize(),
            dataType: 'json',
            contentType: enctype,
            beforeSend: function () {
                $(button).button('loading');
            },
            complete: function () {
                $(button).button('reset');
            },
            success: function (json, textStatus) {
                console.log(json);
                console.log(textStatus);

                if (!is_cart_add) {
                    $('.alert-dismissible').remove();
                }
                $(element).find('.is-invalid').removeClass('is-invalid');
                $(element).find('.invalid-feedback').removeClass('d-block');

                if (json['redirect']) {
                    if (is_login && typeof window.ocGuestWishlistClear === 'function') {
                        window.ocGuestWishlistClear();
                    }

                    if (!is_cart_add) {
                        location = json['redirect'];
                    }
                }

                if (is_wishlist_add && json['total'] && typeof window.ocWishlistSyncTotalFromServerText === 'function') {
                    window.ocWishlistSyncTotalFromServerText(json['total']);
                }

                if (is_cart_add && typeof window.ocShowCartResponseAlerts === 'function') {
                    window.ocShowCartResponseAlerts(json);
                }

                if (!is_cart_add && typeof json['error'] == 'string') {
                    $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                }

                if (!is_cart_add && typeof json['error'] == 'object') {
                    if (json['error']['warning']) {
                        $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error']['warning'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                    }

                    for (key in json['error']) {
                        $('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                        $('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                    }
                }

                if (json['success']) {
                    if (!is_cart_add) {
                        $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                    }

                    // Refresh
                    var url = $(form).attr('data-oc-load');
                    var target = $(form).attr('data-oc-target');

                    if (url !== undefined && target !== undefined) {
                        $(target).load(url);
                    }
                }

                // Replace any form values that correspond to form names.
                for (key in json) {
                    $(element).find('[name=\'' + key + '\']').val(json[key]);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
});

// Upload
$(document).on('click', 'button[data-oc-toggle=\'upload\']', function() {
    var element = this;

    if (!$(element).prop('disabled')) {
        $('#form-upload').remove();

        $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" value=""/></form>');

        $('#form-upload input[name=\'file\']').trigger('click');

        $('#form-upload input[name=\'file\']').on('change', function(e) {
            if ((this.files[0].size / 1024) > $(element).attr('data-oc-size-max')) {
                if (typeof window.ocShowFrontendAlert === 'function') {
                    window.ocShowFrontendAlert('danger', $(element).attr('data-oc-size-error'), 5000, 'Upload Error');
                } else {
                    alert($(element).attr('data-oc-size-error'));
                }

                $(this).val('');
            }
        });

        if (typeof timer !== 'undefined') {
            clearInterval(timer);
        }

        var timer = setInterval(function() {
            if ($('#form-upload input[name=\'file\']').val() != '') {
                clearInterval(timer);

                $.ajax({
                    url: $(element).attr('data-oc-url'),
                    type: 'post',
                    data: new FormData($('#form-upload')[0]),
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $(element).button('loading');
                    },
                    complete: function() {
                        $(element).button('reset');
                    },
                    success: function(json) {
                        console.log(json);

                        if (json['error']) {
                            if (typeof window.ocShowFrontendAlert === 'function') {
                                window.ocShowFrontendAlert('danger', json['error'], 5000, 'Upload Error');
                            } else {
                                alert(json['error']);
                            }
                        }

                        if (json['success']) {
                            if (typeof window.ocShowFrontendAlert === 'function') {
                                window.ocShowFrontendAlert('success', json['success'], 5000, 'Upload Complete');
                            } else {
                                alert(json['success']);
                            }
                        }

                        if (json['code']) {
                            $($(element).attr('data-oc-target')).attr('value', json['code']);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            }
        }, 500);
    }
});

// Chain ajax calls.
class Chain {
    constructor() {
        this.start = false;
        this.data = [];
    }

    attach(call) {
        this.data.push(call);

        if (!this.start) {
            this.execute();
        }
    }

    execute() {
        if (this.data.length) {
            this.start = true;

            var call = this.data.shift();

            var jqxhr = call();

            jqxhr.done(function() {
                chain.execute();
            });
        } else {
            this.start = false;
        }
    }
}

var chain = new Chain();

// Autocomplete
+function($) {
    $.fn.autocomplete = function(option) {
        return this.each(function() {
            var element = this;
            var $dropdown = $('#' + $(element).attr('data-oc-target'));

            this.timer = null;
            this.items = [];

            $.extend(this, option);

            // Focus in
            $(element).on('focusin', function() {
                element.request();
            });

            // Focus out
            $(element).on('focusout', function(e) {
                if (!e.relatedTarget || !$(e.relatedTarget).hasClass('dropdown-item')) {
                    $dropdown.removeClass('show');
                }
            });

            // Input
            $(element).on('input', function(e) {
                element.request();
            });

            // Click
            $dropdown.on('click', 'a', function(e) {
                e.preventDefault();

                var value = $(this).attr('href');

                if (element.items[value] !== undefined) {
                    element.select(element.items[value]);

                    $dropdown.removeClass('show');
                }
            });

            // Request
            this.request = function() {
                clearTimeout(this.timer);

                $('#autocomplete-loading').remove();

                $dropdown.prepend('<li id="autocomplete-loading"><span class="dropdown-item text-center disabled"><i class="fa-solid fa-circle-notch fa-spin"></i></span></li>');
                $dropdown.addClass('show');

                this.timer = setTimeout(function(object) {
                    object.source($(object).val(), $.proxy(object.response, object));
                }, 150, this);
            }

            // Response
            this.response = function(json) {
                var html = '';
                var category = {};
                var name;
                var i = 0, j = 0;

                if (json.length) {
                    for (i = 0; i < json.length; i++) {
                        // update element items
                        this.items[json[i]['value']] = json[i];

                        if (!json[i]['category']) {
                            // ungrouped items
                            html += '<li><a href="' + json[i]['value'] + '" class="dropdown-item">' + json[i]['label'] + '</a></li>';
                        } else {
                            // grouped items
                            name = json[i]['category'];

                            if (!category[name]) {
                                category[name] = [];
                            }

                            category[name].push(json[i]);
                        }
                    }

                    for (name in category) {
                        html += '<li><h6 class="dropdown-header">' + name + '</h6></li>';

                        for (j = 0; j < category[name].length; j++) {
                            html += '<li><a href="' + category[name][j]['value'] + '" class="dropdown-item">' + category[name][j]['label'] + '</a></li>';
                        }
                    }
                }

                $dropdown.html(html);
            }
        });
    }
}(jQuery);

$(document).ready(function() {
    // Currency
    $('#form-currency .dropdown-item').on('click', function(e) {
        e.preventDefault();

        $('#form-currency input[name=\'code\']').val($(this).attr('href'));

        $('#form-currency').submit();
    });

    // Language
    $('#form-language .dropdown-item').on('click', function(e) {
        e.preventDefault();

        $('#form-language input[name=\'code\']').val($(this).attr('href'));

        $('#form-language').submit();
    });

    // Product List
    $('#button-list').on('click', function() {
        var element = this;

        $('#product-list').attr('class', 'row row-cols-1 product-list');

        $('#button-grid').removeClass('active');
        $('#button-list').addClass('active');

        localStorage.setItem('display', 'list');
    });

    // Product Grid
    $('#button-grid').on('click', function() {
        var element = this;

        // What a shame bootstrap does not take into account dynamically loaded columns
        $('#product-list').attr('class', 'row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3');

        $('#button-list').removeClass('active');
        $('#button-grid').addClass('active');

        localStorage.setItem('display', 'grid');
    });

    // Local Storage
    if (localStorage.getItem('display') == 'list') {
        $('#product-list').attr('class', 'row row-cols-1 product-list');
        $('#button-list').addClass('active');
    } else {
        $('#product-list').attr('class', 'row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3');
        $('#button-grid').addClass('active');
    }

    /* Agree to Terms */
    $('body').on('click', '.modal-link', function(e) {
        e.preventDefault();

        var element = this;

        $('#modal-information').remove();

        $.ajax({
            url: $(element).attr('href'),
            dataType: 'html',
            success: function(html) {
                $('body').append(html);

                $('#modal-information').modal('show');
            }
        });
    });

    // Cookie Policy
    $('#cookie button').on('click', function() {
        var element = this;

        $.ajax({
            url: $(this).val(),
            type: 'get',
            dataType: 'json',
            beforeSend: function() {
                $(element).button('loading');
            },
            complete: function() {
                $(element).button('reset');
            },
            success: function(json) {
                if (json['success']) {
                    $('#cookie').fadeOut(400, function() {
                        $('#cookie').remove();
                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
});
