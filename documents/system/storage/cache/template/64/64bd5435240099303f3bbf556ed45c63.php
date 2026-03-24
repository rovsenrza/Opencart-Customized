<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* catalog/view/template/account/wishlist.twig */
class __TwigTemplate_e405d4e437dc7257e6cb72833f674ed6 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield ($context["header"] ?? null);
        yield "
<div id=\"account-wishlist\" class=\"container\">
  <ul class=\"breadcrumb\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 5
            yield "      <li class=\"breadcrumb-item\"><a href=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 5);
            yield "\">";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 5);
            yield "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['breadcrumb'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        yield "  </ul>
  <div class=\"row\">";
        // line 8
        yield ($context["column_left"] ?? null);
        yield "
    <div id=\"content\" class=\"col\">";
        // line 9
        yield ($context["content_top"] ?? null);
        yield "
      <h1>";
        // line 10
        yield ($context["heading_title"] ?? null);
        yield "</h1>
      <div id=\"wishlist\" data-guest=\"";
        // line 11
        yield ((($context["guest"] ?? null)) ? ("1") : ("0"));
        yield "\" data-guest-list=\"";
        yield ($context["guest_list"] ?? null);
        yield "\">";
        yield ($context["list"] ?? null);
        yield "</div>
      <div class=\"text-end\"><a href=\"";
        // line 12
        yield ($context["continue"] ?? null);
        yield "\" class=\"btn btn-primary\">";
        yield ($context["button_continue"] ?? null);
        yield "</a></div>
      ";
        // line 13
        yield ($context["content_bottom"] ?? null);
        yield "</div>
    ";
        // line 14
        yield ($context["column_right"] ?? null);
        yield "</div>
</div>
<script type=\"text/javascript\"><!--
var \$wishlist = \$('#wishlist');
var guestMode = String(\$wishlist.attr('data-guest')) === '1' || !window.ocCustomerLogged;
var wishlistLanguage = '";
        // line 19
        yield ($context["language_code"] ?? null);
        yield "';
var wishlistCustomerToken = '";
        // line 20
        yield ($context["customer_token"] ?? null);
        yield "';

function loadGuestWishlist() {
    if (!guestMode) {
        return;
    }

    var ids = [];

    if (typeof window.ocGuestWishlistGet === 'function') {
        ids = window.ocGuestWishlistGet();
    }

    \$.ajax({
        url: \$wishlist.data('guestList'),
        type: 'post',
        data: {
            product_ids: JSON.stringify(ids)
        },
        success: function(html) {
            // Keep localStorage aligned with products that are actually renderable on server side.
            // This removes stale IDs (e.g. deleted/invalid products) that otherwise stay stuck.
            var renderedIds = [];
            var seen = {};
            var productId;

            \$('<div>').html(html).find('.btn-wishlist-remove[data-product-id]').each(function() {
                productId = parseInt(\$(this).attr('data-product-id'), 10);

                if (productId > 0 && !seen[productId]) {
                    seen[productId] = true;
                    renderedIds.push(productId);
                }
            });

            if (typeof window.ocGuestWishlistSet === 'function') {
                window.ocGuestWishlistSet(renderedIds);
            }

            if (typeof window.ocGuestWishlistSyncTotal === 'function') {
                window.ocGuestWishlistSyncTotal();
            }

            \$wishlist.html(html);
        }
    });
}

if (guestMode) {
    loadGuestWishlist();
}

\$('#wishlist').on('click', '.btn-wishlist-remove', function(e) {
    e.preventDefault();

    var element = this;

    if (guestMode) {
        var product_id = parseInt(\$(element).attr('data-product-id'), 10);

        if (product_id > 0 && typeof window.ocGuestWishlistRemove === 'function') {
            window.ocGuestWishlistRemove(product_id);

            if (typeof window.ocGuestWishlistSyncTotal === 'function') {
                window.ocGuestWishlistSyncTotal();
            }

            loadGuestWishlist();

            if (typeof window.ocShowFrontendAlert === 'function') {
                window.ocShowFrontendAlert('success', 'Product removed from wishlist.', 3200, 'Wishlist');
            }
        }

        return;
    }

    var productId = parseInt(\$(element).attr('data-product-id'), 10);
    var removeUrl = 'index.php?route=account/wishlist.remove&language=' + encodeURIComponent(wishlistLanguage) + '&product_id=' + productId;

    if (wishlistCustomerToken) {
        removeUrl += '&customer_token=' + encodeURIComponent(wishlistCustomerToken);
    }

    \$.ajax({
        url: removeUrl,
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            console.log(json);

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#wishlist').load('";
        // line 123
        yield Twig\Extension\CoreExtension::replace(($context["list_url"] ?? null), ["&" => "&amp;"]);
        yield "'.replaceAll('&amp;', '&'));

                if (window.ocCustomerLogged) {
                    var \$wishlistTotal = \$('#wishlist-total span');
                    var currentText = \$.trim(\$wishlistTotal.text());
                    var match = currentText.match(/\\((\\d+)\\)/);

                    if (match) {
                        var nextCount = Math.max(0, parseInt(match[1], 10) - 1);
                        var nextText = currentText.replace(/\\(\\d+\\)/, '(' + nextCount + ')');

                        if (typeof window.ocWishlistSyncTotalFromServerText === 'function') {
                            window.ocWishlistSyncTotalFromServerText(nextText);
                        }
                    }
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log('Wishlist remove failed:', {
                status: xhr.status,
                statusText: xhr.statusText,
                responseURL: xhr.responseURL,
                responseText: xhr.responseText
            });
            \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> Unable to remove wishlist item right now. Please refresh and try again. <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
        }
    });
});
//--></script>
";
        // line 153
        yield ($context["footer"] ?? null);
        yield "
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "catalog/view/template/account/wishlist.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  247 => 153,  214 => 123,  108 => 20,  104 => 19,  96 => 14,  92 => 13,  86 => 12,  78 => 11,  74 => 10,  70 => 9,  66 => 8,  63 => 7,  52 => 5,  48 => 4,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ header }}
<div id=\"account-wishlist\" class=\"container\">
  <ul class=\"breadcrumb\">
    {% for breadcrumb in breadcrumbs %}
      <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
    {% endfor %}
  </ul>
  <div class=\"row\">{{ column_left }}
    <div id=\"content\" class=\"col\">{{ content_top }}
      <h1>{{ heading_title }}</h1>
      <div id=\"wishlist\" data-guest=\"{{ guest ? '1' : '0' }}\" data-guest-list=\"{{ guest_list }}\">{{ list }}</div>
      <div class=\"text-end\"><a href=\"{{ continue }}\" class=\"btn btn-primary\">{{ button_continue }}</a></div>
      {{ content_bottom }}</div>
    {{ column_right }}</div>
</div>
<script type=\"text/javascript\"><!--
var \$wishlist = \$('#wishlist');
var guestMode = String(\$wishlist.attr('data-guest')) === '1' || !window.ocCustomerLogged;
var wishlistLanguage = '{{ language_code }}';
var wishlistCustomerToken = '{{ customer_token }}';

function loadGuestWishlist() {
    if (!guestMode) {
        return;
    }

    var ids = [];

    if (typeof window.ocGuestWishlistGet === 'function') {
        ids = window.ocGuestWishlistGet();
    }

    \$.ajax({
        url: \$wishlist.data('guestList'),
        type: 'post',
        data: {
            product_ids: JSON.stringify(ids)
        },
        success: function(html) {
            // Keep localStorage aligned with products that are actually renderable on server side.
            // This removes stale IDs (e.g. deleted/invalid products) that otherwise stay stuck.
            var renderedIds = [];
            var seen = {};
            var productId;

            \$('<div>').html(html).find('.btn-wishlist-remove[data-product-id]').each(function() {
                productId = parseInt(\$(this).attr('data-product-id'), 10);

                if (productId > 0 && !seen[productId]) {
                    seen[productId] = true;
                    renderedIds.push(productId);
                }
            });

            if (typeof window.ocGuestWishlistSet === 'function') {
                window.ocGuestWishlistSet(renderedIds);
            }

            if (typeof window.ocGuestWishlistSyncTotal === 'function') {
                window.ocGuestWishlistSyncTotal();
            }

            \$wishlist.html(html);
        }
    });
}

if (guestMode) {
    loadGuestWishlist();
}

\$('#wishlist').on('click', '.btn-wishlist-remove', function(e) {
    e.preventDefault();

    var element = this;

    if (guestMode) {
        var product_id = parseInt(\$(element).attr('data-product-id'), 10);

        if (product_id > 0 && typeof window.ocGuestWishlistRemove === 'function') {
            window.ocGuestWishlistRemove(product_id);

            if (typeof window.ocGuestWishlistSyncTotal === 'function') {
                window.ocGuestWishlistSyncTotal();
            }

            loadGuestWishlist();

            if (typeof window.ocShowFrontendAlert === 'function') {
                window.ocShowFrontendAlert('success', 'Product removed from wishlist.', 3200, 'Wishlist');
            }
        }

        return;
    }

    var productId = parseInt(\$(element).attr('data-product-id'), 10);
    var removeUrl = 'index.php?route=account/wishlist.remove&language=' + encodeURIComponent(wishlistLanguage) + '&product_id=' + productId;

    if (wishlistCustomerToken) {
        removeUrl += '&customer_token=' + encodeURIComponent(wishlistCustomerToken);
    }

    \$.ajax({
        url: removeUrl,
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            console.log(json);

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#wishlist').load('{{ list_url|replace({'&':'&amp;'}) }}'.replaceAll('&amp;', '&'));

                if (window.ocCustomerLogged) {
                    var \$wishlistTotal = \$('#wishlist-total span');
                    var currentText = \$.trim(\$wishlistTotal.text());
                    var match = currentText.match(/\\((\\d+)\\)/);

                    if (match) {
                        var nextCount = Math.max(0, parseInt(match[1], 10) - 1);
                        var nextText = currentText.replace(/\\(\\d+\\)/, '(' + nextCount + ')');

                        if (typeof window.ocWishlistSyncTotalFromServerText === 'function') {
                            window.ocWishlistSyncTotalFromServerText(nextText);
                        }
                    }
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log('Wishlist remove failed:', {
                status: xhr.status,
                statusText: xhr.statusText,
                responseURL: xhr.responseURL,
                responseText: xhr.responseText
            });
            \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> Unable to remove wishlist item right now. Please refresh and try again. <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
        }
    });
});
//--></script>
{{ footer }}
", "catalog/view/template/account/wishlist.twig", "/Applications/MAMP/htdocs/catalog/view/template/account/wishlist.twig");
    }
}
