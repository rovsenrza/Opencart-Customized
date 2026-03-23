function getURLVar(key) {
    var value = [];
    var query = String(document.location).split('?');
    var i;

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
        }
    }

    if (key === 'user_token' && window.ocUserToken) {
        return window.ocUserToken;
    }

    return '';
}

$(document).ready(function() {
    // Tooltip
    var oc_tooltip = function() {
        // Get tooltip instance
        tooltip = bootstrap.Tooltip.getOrCreateInstance(this);

        if (!tooltip) {
            // Apply to current element
            tooltip.show();
        }
    }

    $(document).on('mouseenter', '[data-bs-toggle=\'tooltip\']', oc_tooltip);

    $(document).on('click', 'button', function() {
        $('.tooltip').remove();
    });

    $(document).on('click', '[data-bs-toggle=\'pagination\'] a', function(e) {
        e.preventDefault();

        var element = this;

        //[data-bs-target='pagination']

        $(this.target).load(this.href);
    });

    // Admin alerts: transform default bootstrap alerts into animated toasts.
    if (typeof window.ocAdminInitAlertSystem === 'function') {
        window.ocAdminInitAlertSystem();
    }

    // Button
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
        }
    }(jQuery);
});

// Admin Toast Alerts
+function($) {
    var adminAlertObserver = null;

    function ensureAdminAlertStyle() {
        if (document.getElementById('oc-admin-alert-style')) {
            return;
        }

        var css = '' +
            '#oc-admin-alert-stack{' +
                'position:fixed;top:16px;right:16px;z-index:1110;display:flex;flex-direction:column;gap:10px;' +
                'max-width:460px;width:calc(100vw - 32px);pointer-events:none;' +
            '}' +
            '.oc-admin-alert{' +
                'pointer-events:auto;display:flex;gap:12px;align-items:flex-start;padding:12px 14px;border-radius:12px;color:#fff;' +
                'box-shadow:0 18px 42px rgba(0,0,0,.28);transform:translateY(-12px) scale(.97);opacity:0;' +
                'animation:ocAdminAlertIn .26s ease forwards;position:relative;overflow:hidden;' +
            '}' +
            '.oc-admin-alert-success{background:linear-gradient(135deg,#178f58,#1f7f5d);}' +
            '.oc-admin-alert-danger{background:linear-gradient(135deg,#c03535,#9d2a2a);}' +
            '.oc-admin-alert-warning{background:linear-gradient(135deg,#d1911d,#b9780d);}' +
            '.oc-admin-alert-info{background:linear-gradient(135deg,#177bb8,#1663a0);}' +
            '.oc-admin-alert-title{margin:0 0 2px;font-weight:700;font-size:.95rem;line-height:1.2;}' +
            '.oc-admin-alert-text{font-size:.9rem;line-height:1.35;word-break:break-word;}' +
            '.oc-admin-alert-text a{color:#fff;text-decoration:underline;}' +
            '.oc-admin-alert-close{border:0;background:transparent;color:inherit;opacity:.9;font-size:1.1rem;line-height:1;padding:0 0 0 4px;}' +
            '.oc-admin-alert-close:hover{opacity:1;}' +
            '.oc-admin-alert-progress{position:absolute;left:0;bottom:0;height:3px;width:100%;background:rgba(255,255,255,.35);transform-origin:left center;animation:ocAdminAlertProgress 4.8s linear forwards;}' +
            '.oc-admin-alert.oc-hide{animation:ocAdminAlertOut .24s ease forwards;}' +
            '@keyframes ocAdminAlertIn{to{opacity:1;transform:translateY(0) scale(1);}}' +
            '@keyframes ocAdminAlertOut{to{opacity:0;transform:translateY(-8px) scale(.96);}}' +
            '@keyframes ocAdminAlertProgress{to{transform:scaleX(0);}}';

        $('head').append('<style id="oc-admin-alert-style">' + css + '</style>');
    }

    function getAdminAlertStack() {
        var $stack = $('#oc-admin-alert-stack');

        if (!$stack.length) {
            $('body').append('<div id="oc-admin-alert-stack" aria-live="polite" aria-atomic="true"></div>');
            $stack = $('#oc-admin-alert-stack');
        }

        return $stack;
    }

    function getAlertTypeFromClass(className) {
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

    function getAlertTitle(type) {
        if (type === 'success') {
            return 'Success';
        }

        if (type === 'warning') {
            return 'Warning';
        }

        if (type === 'info') {
            return 'Notice';
        }

        return 'Error';
    }

    function hideAdminAlert($alert) {
        if (!$alert || !$alert.length || $alert.hasClass('oc-hide')) {
            return;
        }

        $alert.addClass('oc-hide');

        window.setTimeout(function() {
            $alert.remove();
        }, 260);
    }

    window.ocAdminShowAlert = function(type, html, timeout, title) {
        ensureAdminAlertStyle();

        var variant = type || 'info';
        var $stack = getAdminAlertStack();
        var alertTitle = title || getAlertTitle(variant);
        var $alert = $('<div class="oc-admin-alert oc-admin-alert-' + variant + '">' +
            '<div class="oc-admin-alert-body">' +
                '<p class="oc-admin-alert-title">' + alertTitle + '</p>' +
                '<div class="oc-admin-alert-text">' + html + '</div>' +
            '</div>' +
            '<button type="button" class="oc-admin-alert-close" aria-label="Close">&times;</button>' +
            '<span class="oc-admin-alert-progress"></span>' +
        '</div>');

        $alert.on('click', '.oc-admin-alert-close', function() {
            hideAdminAlert($alert);
        });

        $stack.prepend($alert);

        window.setTimeout(function() {
            hideAdminAlert($alert);
        }, timeout || 4800);
    };

    window.ocAdminConvertBootstrapAlerts = function(root) {
        var $scope = root ? $(root) : $(document.body);

        $scope.find('.alert.alert-dismissible').each(function() {
            var $native = $(this);
            var $clone = $native.clone();

            $clone.find('.btn-close').remove();
            $clone.find('.fa-solid, .fa-regular').first().remove();

            var html = $.trim($clone.html());

            if (html) {
                window.ocAdminShowAlert(getAlertTypeFromClass($native.attr('class') || ''), html);
            }

            $native.remove();
        });
    };

    window.ocAdminInitAlertSystem = function() {
        ensureAdminAlertStyle();
        window.ocAdminConvertBootstrapAlerts(document.body);

        if (adminAlertObserver) {
            return;
        }

        adminAlertObserver = new MutationObserver(function() {
            window.ocAdminConvertBootstrapAlerts(document.body);
        });

        adminAlertObserver.observe(document.body, {
            childList: true,
            subtree: true
        });
    };
}(jQuery);

function decodeHTMLEntities(html) {
    var d = document.createElement('div');

    d.innerHTML = html;

    return d.textContent;
}

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

// Forms
$(document).on('submit', 'form', function(e) {
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

        $.ajax({
            url: action.replaceAll('&amp;', '&'),
            type: method,
            data: $(form).serialize(),
            dataType: 'json',
            contentType: enctype,
            beforeSend: function() {
                $(button).button('loading');
            },
            complete: function() {
                $(button).button('reset');
            },
            success: function(json, textStatus) {
                console.log(json);
                console.log(textStatus);

                $('.alert-dismissible').remove();
                $(element).find('.is-invalid').removeClass('is-invalid');
                $(element).find('.invalid-feedback').removeClass('d-block');

                if (json['redirect']) {
                    location = json['redirect'];
                }

                if (typeof json['error'] == 'string') {
                    $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                }

                if (typeof json['error'] == 'object') {
                    if (json['error']['warning']) {
                        $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error']['warning'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                    }

                    for (key in json['error']) {
                        $('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                        $('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                    }
                }

                if (json['success']) {
                    $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

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
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
});

// Upload
$(document).on('click', '[data-oc-toggle=\'upload\']', function() {
    var element = this;

    if (!$(element).prop('disabled')) {
        $('#form-upload').remove();

        $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" value=""/></form>');

        $('#form-upload input[name=\'file\']').trigger('click');

        $('#form-upload input[name=\'file\']').on('change', function(e) {
            if ((this.files[0].size / 1024) > $(element).attr('data-oc-size-max')) {
                alert($(element).attr('data-oc-size-error'));

                $(this).val('');
            }
        });

        if (typeof timer != 'undefined') {
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
                            alert(json['error']);
                        }

                        if (json['success']) {
                            alert(json['success']);
                        }

                        if (json['code']) {
                            $($(element).attr('data-oc-target')).val(json['code']);

                            $(element).parent().find('[data-oc-toggle=\'download\'], [data-oc-toggle=\'clear\']').prop('disabled', false);
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

$(document).on('click', '[data-oc-toggle=\'download\']', function(e) {
    var element = this;

    var value = $($(element).attr('data-oc-target')).val();

    if (value != '') {
        location = 'index.php?route=tool/upload.download&user_token=' + getURLVar('user_token') + '&code=' + value;
    }
});

$(document).on('click', '[data-oc-toggle=\'clear\']', function() {
    var element = this;

    // Images
    var thumb = $(this).attr('data-oc-thumb');

    if (thumb !== undefined) {
        $(thumb).attr('src', $(thumb).attr('data-oc-placeholder'));
    }

    // Custom fields
    var download = $(element).parent().find('[data-oc-toggle=\'download\']');

    if (download.length) {
        $(element).parent().find('[data-oc-toggle=\'download\'], [data-oc-toggle=\'clear\']').prop('disabled', true);
    }

    $($(this).attr('data-oc-target')).val('');
});

// Image Manager
$(document).on('click', '[data-oc-toggle=\'image\']', function(e) {
    var element = this;

    $('#modal-image').remove();

    $.ajax({
        url: 'index.php?route=common/filemanager&user_token=' + getURLVar('user_token') + '&target=' + encodeURIComponent($(element).attr('data-oc-target')) + '&thumb=' + encodeURIComponent($(element).attr('data-oc-thumb')),
        dataType: 'html',
        beforeSend: function() {
            $(element).button('loading');
        },
        complete: function() {
            $(element).button('reset');
        },
        success: function(html) {
            $('body').append(html);

            $('#modal-image').modal('show');
        }
    });
});

// SEO Autofill
+function($) {
    var SEO_FIELD_SELECTOR = 'input[type=\'text\'][name*="_seo_url["]';

    function normalizeWhitespace(value) {
        if (value === undefined || value === null) {
            return '';
        }

        return value.toString().replace(/\s+/g, ' ').trim();
    }

    function toSlug(value) {
        if (value === undefined || value === null) {
            return '';
        }

        var text = value.toString();
        var transliterationMap = {
            'Ə': 'E',
            'ə': 'e',
            'Ğ': 'G',
            'ğ': 'g',
            'Ş': 'S',
            'ş': 's',
            'Ç': 'C',
            'ç': 'c',
            'Ö': 'O',
            'ö': 'o',
            'Ü': 'U',
            'ü': 'u',
            'İ': 'I',
            'ı': 'i'
        };

        text = text.replace(/[ƏəĞğŞşÇçÖöÜüİı]/g, function(character) {
            return transliterationMap[character] || character;
        });

        if (typeof text.normalize === 'function') {
            text = text.normalize('NFKD');
        }

        return text
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/['’`´]+/g, '')
            .replace(/&/g, ' and ')
            .replace(/[^a-zA-Z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '')
            .replace(/-{2,}/g, '-')
            .toLowerCase();
    }

    function fillField($form, fieldName, value) {
        var $target = $form.find('[name="' + fieldName + '"]');

        if ($target.length) {
            $target.val(value);
        }
    }

    function canAutoFillSeoField($field) {
        if (!$field.length) {
            return false;
        }

        if ($field.attr('data-oc-seo-manual') === '1') {
            return false;
        }

        if (normalizeWhitespace($field.val()) === '') {
            return true;
        }

        return $field.attr('data-oc-seo-auto') === '1';
    }

    function fillSeoField($field, value) {
        if (!canAutoFillSeoField($field)) {
            return;
        }

        $field.val(value);

        if (normalizeWhitespace(value) === '') {
            $field.removeAttr('data-oc-seo-auto');
        } else {
            $field.attr('data-oc-seo-auto', '1');
            $field.removeAttr('data-oc-seo-manual');
        }
    }

    function initializeSeoFieldState(scope) {
        $(scope).find(SEO_FIELD_SELECTOR).each(function() {
            var $field = $(this);

            if (normalizeWhitespace($field.val()) !== '' && $field.attr('data-oc-seo-auto') !== '1') {
                $field.attr('data-oc-seo-manual', '1');
            }
        });
    }

    function syncFromDescriptionField(element) {
        var $source = $(element);
        var sourceName = $source.attr('name') || '';
        var match = sourceName.match(/^([a-z_]+_description)\[(\d+)\]\[(name|title)\]$/);

        if (!match) {
            return false;
        }

        var descriptionKey = match[1];
        var languageId = match[2];
        var entityKey = descriptionKey.replace(/_description$/, '');
        var value = $source.val();
        var keyword = toSlug(value);
        var $form = $source.closest('form');

        fillField($form, descriptionKey + '[' + languageId + '][meta_title]', value);
        fillField($form, descriptionKey + '[' + languageId + '][meta_description]', value);
        fillField($form, descriptionKey + '[' + languageId + '][meta_keyword]', value);

        $form.find('input[type=\'text\'][name^="' + entityKey + '_seo_url["]').each(function() {
            var seoName = $(this).attr('name') || '';

            if (seoName.match(new RegExp('\\]\\[' + languageId + '\\]$'))) {
                fillSeoField($(this), keyword);
            }
        });

        return true;
    }

    function syncFromSimpleNameField(element) {
        var $source = $(element);
        var sourceName = $source.attr('name') || '';

        if (sourceName !== 'name') {
            return;
        }

        var $form = $source.closest('form');

        if (!$form.find('input[type=\'text\'][name^="manufacturer_seo_url["]').length) {
            return;
        }

        $form.find('input[type=\'text\'][name^="manufacturer_seo_url["]').each(function() {
            fillSeoField($(this), toSlug($source.val()));
        });
    }

    $(document).on('input', 'input[type=\'text\'][name$=\'[name]\'], input[type=\'text\'][name$=\'[title]\'], input[type=\'text\'][name=\'name\']', function() {
        if (!syncFromDescriptionField(this)) {
            syncFromSimpleNameField(this);
        }
    });

    $(document).on('input', SEO_FIELD_SELECTOR, function() {
        $(this).attr('data-oc-seo-manual', '1');
        $(this).removeAttr('data-oc-seo-auto');
    });

    $(function() {
        initializeSeoFieldState(document);
    });
}(jQuery);

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
                    this.timer = setTimeout(function(object) {
                        object.removeClass('show');
                    }, 50, $dropdown);
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
                $dropdown.find('li').remove();

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

                    $dropdown.html(html);
                } else {
                    $dropdown.removeClass('show');
                }
            }
        });
    }
}(jQuery);

$(document).ready(function() {
    // Header
    $('#header-notification [data-bs-toggle=\'modal\']').on('click', function(e) {
        e.preventDefault();

        var element = this;

        $('#modal-notification').remove();

        $.ajax({
            url: $(element).attr('href'),
            dataType: 'html',
            success: function(html) {
                $('body').append(html);

                $('#modal-notification').modal('show');
            }
        });
    });

    // Menu
    $('#button-menu').on('click', function(e) {
        e.preventDefault();

        $('#column-left').toggleClass('active');
    });

    // Set last page opened on the menu
    $('#menu a[href]').on('click', function() {
        sessionStorage.setItem('menu', $(this).attr('href'));
    });

    if (!sessionStorage.getItem('menu')) {
        $('#menu #menu-dashboard').addClass('active');
    } else {
        // Sets active and open to selected page in the left column menu.
        $('#menu a[href=\'' + sessionStorage.getItem('menu') + '\']').parent().addClass('active');
    }

    $('#menu a[href=\'' + sessionStorage.getItem('menu') + '\']').parents('li').children('a').removeClass('collapsed');

    $('#menu a[href=\'' + sessionStorage.getItem('menu') + '\']').parents('ul').addClass('show');

    $('#menu a[href=\'' + sessionStorage.getItem('menu') + '\']').parents('li').addClass('active');

    $('#nav-language .dropdown-item').on('click', function(e) {
        e.preventDefault();

        var element = this;
        var user_token = getURLVar('user_token');

        $.ajax({
            url: 'index.php?route=common/language.save' + (user_token ? '&user_token=' + encodeURIComponent(user_token) : ''),
            type: 'post',
            data: 'code=' + $(element).attr('href') + '&redirect=' + encodeURIComponent($('#input-redirect').val()),
            dataType: 'json',
            success: function(json) {
                console.log($(element).attr('href'));
                console.log($('input-redirect').val());

                if (json['redirect']) {
                    location = json['redirect'];
                }

                if (json['error']) {
                    $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
});
