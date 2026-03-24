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

/* catalog/view/template/sections/mehsullarimiz.twig */
class __TwigTemplate_384d755b093ccc26090b4f0c9447b1ce extends Template
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
        // line 3
        yield "<section class=\"home-section home-section-mehsullarimiz\">
  <div class=\"section-head d-flex align-items-center justify-content-between\">
    <h2>";
        // line 5
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "headline", [], "any", false, false, false, 5)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "headline", [], "any", false, false, false, 5)) : ("Məhsullarımız"));
        yield "</h2>
    ";
        // line 6
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["links"] ?? null), "view_all", [], "any", false, false, false, 6)) {
            // line 7
            yield "      <a href=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["links"] ?? null), "view_all", [], "any", false, false, false, 7);
            yield "\" class=\"view-all-link\">";
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["links"] ?? null), "view_all_text", [], "any", false, false, false, 7)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["links"] ?? null), "view_all_text", [], "any", false, false, false, 7)) : ("Hamısına bax"));
            yield "</a>
    ";
        }
        // line 9
        yield "  </div>

  ";
        // line 11
        if (($context["products"] ?? null)) {
            // line 12
            yield "    <div class=\"swiper mehsullarimiz-swiper\">
      <div class=\"swiper-wrapper\">
        ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 15
                yield "          <div class=\"swiper-slide\">
            <article class=\"product-card\">
              <a href=\"";
                // line 17
                yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 17);
                yield "\" class=\"product-image\">
                ";
                // line 18
                if (CoreExtension::getAttribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 18)) {
                    // line 19
                    yield "                  <img src=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 19);
                    yield "\" alt=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 19);
                    yield "\" class=\"w-100\"/>
                ";
                }
                // line 21
                yield "              </a>
              <h3 class=\"product-title\"><a href=\"";
                // line 22
                yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 22);
                yield "\">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 22);
                yield "</a></h3>
            </article>
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['product'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            yield "      </div>

      <div class=\"swiper-pagination\"></div>
      <div class=\"swiper-button-prev\"></div>
      <div class=\"swiper-button-next\"></div>
    </div>

    <script>
      (function() {
        function initMehsullarimizSwiper() {
          if (typeof window.Swiper === 'undefined') {
            return;
          }

          document.querySelectorAll('.mehsullarimiz-swiper').forEach(function(node) {
            if (!node || node.swiper) {
              return;
            }

            new window.Swiper(node, {
              slidesPerView: 1.2,
              spaceBetween: 16,
              pagination: {
                el: node.querySelector('.swiper-pagination'),
                clickable: true
              },
              navigation: {
                nextEl: node.querySelector('.swiper-button-next'),
                prevEl: node.querySelector('.swiper-button-prev')
              },
              breakpoints: {
                576: { slidesPerView: 2, spaceBetween: 16 },
                992: { slidesPerView: 3, spaceBetween: 20 },
                1200: { slidesPerView: 4, spaceBetween: 24 }
              }
            });
          });
        }

        function ensureSwiperAssets(callback) {
          if (typeof window.Swiper !== 'undefined') {
            callback();
            return;
          }

          if (!document.getElementById('mehsullarimiz-swiper-css')) {
            var css = document.createElement('link');
            css.id = 'mehsullarimiz-swiper-css';
            css.rel = 'stylesheet';
            css.href = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css';
            document.head.appendChild(css);
          }

          var existing = document.getElementById('mehsullarimiz-swiper-js');

          if (existing) {
            existing.addEventListener('load', callback, { once: true });
            return;
          }

          var script = document.createElement('script');
          script.id = 'mehsullarimiz-swiper-js';
          script.src = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js';
          script.onload = callback;
          document.body.appendChild(script);
        }

        ensureSwiperAssets(initMehsullarimizSwiper);
      })();
    </script>
  ";
        }
        // line 97
        yield "</section>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "catalog/view/template/sections/mehsullarimiz.twig";
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
        return array (  180 => 97,  107 => 26,  95 => 22,  92 => 21,  84 => 19,  82 => 18,  78 => 17,  74 => 15,  70 => 14,  66 => 12,  64 => 11,  60 => 9,  52 => 7,  50 => 6,  46 => 5,  42 => 3,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Auto-generated by Homepage Section Builder v2. #}
{# section_type: products #}
<section class=\"home-section home-section-mehsullarimiz\">
  <div class=\"section-head d-flex align-items-center justify-content-between\">
    <h2>{{ fields.headline ?: 'Məhsullarımız' }}</h2>
    {% if links.view_all %}
      <a href=\"{{ links.view_all }}\" class=\"view-all-link\">{{ links.view_all_text ?: 'Hamısına bax' }}</a>
    {% endif %}
  </div>

  {% if products %}
    <div class=\"swiper mehsullarimiz-swiper\">
      <div class=\"swiper-wrapper\">
        {% for product in products %}
          <div class=\"swiper-slide\">
            <article class=\"product-card\">
              <a href=\"{{ product.href }}\" class=\"product-image\">
                {% if product.image %}
                  <img src=\"{{ product.image }}\" alt=\"{{ product.name }}\" class=\"w-100\"/>
                {% endif %}
              </a>
              <h3 class=\"product-title\"><a href=\"{{ product.href }}\">{{ product.name }}</a></h3>
            </article>
          </div>
        {% endfor %}
      </div>

      <div class=\"swiper-pagination\"></div>
      <div class=\"swiper-button-prev\"></div>
      <div class=\"swiper-button-next\"></div>
    </div>

    <script>
      (function() {
        function initMehsullarimizSwiper() {
          if (typeof window.Swiper === 'undefined') {
            return;
          }

          document.querySelectorAll('.mehsullarimiz-swiper').forEach(function(node) {
            if (!node || node.swiper) {
              return;
            }

            new window.Swiper(node, {
              slidesPerView: 1.2,
              spaceBetween: 16,
              pagination: {
                el: node.querySelector('.swiper-pagination'),
                clickable: true
              },
              navigation: {
                nextEl: node.querySelector('.swiper-button-next'),
                prevEl: node.querySelector('.swiper-button-prev')
              },
              breakpoints: {
                576: { slidesPerView: 2, spaceBetween: 16 },
                992: { slidesPerView: 3, spaceBetween: 20 },
                1200: { slidesPerView: 4, spaceBetween: 24 }
              }
            });
          });
        }

        function ensureSwiperAssets(callback) {
          if (typeof window.Swiper !== 'undefined') {
            callback();
            return;
          }

          if (!document.getElementById('mehsullarimiz-swiper-css')) {
            var css = document.createElement('link');
            css.id = 'mehsullarimiz-swiper-css';
            css.rel = 'stylesheet';
            css.href = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css';
            document.head.appendChild(css);
          }

          var existing = document.getElementById('mehsullarimiz-swiper-js');

          if (existing) {
            existing.addEventListener('load', callback, { once: true });
            return;
          }

          var script = document.createElement('script');
          script.id = 'mehsullarimiz-swiper-js';
          script.src = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js';
          script.onload = callback;
          document.body.appendChild(script);
        }

        ensureSwiperAssets(initMehsullarimizSwiper);
      })();
    </script>
  {% endif %}
</section>

{#
array elementlerini gormek ucun ucun:
<pre>{{ custom_fields|json_encode }}</pre>
#}", "catalog/view/template/sections/mehsullarimiz.twig", "/Applications/MAMP/htdocs/catalog/view/template/sections/mehsullarimiz.twig");
    }
}
