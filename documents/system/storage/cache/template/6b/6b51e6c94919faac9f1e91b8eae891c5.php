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

/* catalog/view/template/sections/banner.twig */
class __TwigTemplate_bbb3dd0f531a3fac8629784c7b234467 extends Template
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
        yield "<section class=\"home-section home-section-banner\">
  ";
        // line 4
        $context["banner_items"] = Twig\Extension\CoreExtension::slice($this->env->getCharset(), ($context["items"] ?? null), 1);
        // line 5
        yield "
  ";
        // line 6
        if (($context["banner_items"] ?? null)) {
            // line 7
            yield "    <div class=\"swiper simple-banner-swiper\">
      <div class=\"swiper-wrapper\">
        ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["banner_items"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 10
                yield "          ";
                if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, false, 10)) {
                    // line 11
                    yield "            ";
                    $context["image_src"] = ("image/" . CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, false, 11));
                    // line 12
                    yield "            <div class=\"swiper-slide\">
              <article class=\"simple-banner-slide\">
                ";
                    // line 14
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, false, 14)) {
                        // line 15
                        yield "                  <a href=\"";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, false, 15);
                        yield "\" class=\"simple-banner-media\">
                    <img src=\"";
                        // line 16
                        yield ($context["image_src"] ?? null);
                        yield "\" alt=\"";
                        yield ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, false, 16)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, false, 16)) : (((CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "headline", [], "any", false, false, false, 16)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "headline", [], "any", false, false, false, 16)) : ("Banner"))));
                        yield "\"/>
                  </a>
                ";
                    } else {
                        // line 19
                        yield "                  <div class=\"simple-banner-media\">
                    <img src=\"";
                        // line 20
                        yield ($context["image_src"] ?? null);
                        yield "\" alt=\"";
                        yield ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, false, 20)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, false, 20)) : (((CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "headline", [], "any", false, false, false, 20)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "headline", [], "any", false, false, false, 20)) : ("Banner"))));
                        yield "\"/>
                  </div>
                ";
                    }
                    // line 23
                    yield "
                ";
                    // line 24
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, false, 24) || CoreExtension::getAttribute($this->env, $this->source, $context["item"], "subtext", [], "any", false, false, false, 24))) {
                        // line 25
                        yield "                  <div class=\"simple-banner-caption\">
                    ";
                        // line 26
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, false, 26)) {
                            yield "<h3>";
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, false, 26);
                            yield "</h3>";
                        }
                        // line 27
                        yield "                    ";
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "subtext", [], "any", false, false, false, 27)) {
                            yield "<p>";
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "subtext", [], "any", false, false, false, 27);
                            yield "</p>";
                        }
                        // line 28
                        yield "                  </div>
                ";
                    }
                    // line 30
                    yield "              </article>
            </div>
          ";
                }
                // line 33
                yield "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            yield "      </div>

      <div class=\"swiper-pagination\"></div>
      <div class=\"swiper-button-prev\"></div>
      <div class=\"swiper-button-next\"></div>
    </div>

    <style>
      .simple-banner-swiper { position: relative; border-radius: 16px; overflow: hidden; }
      .simple-banner-slide { position: relative; }
      .simple-banner-media { display: block; }
      .simple-banner-media img { width: 100%; display: block; aspect-ratio: 16 / 6; object-fit: cover; }
      .simple-banner-caption {
        position: absolute;
        left: 24px;
        bottom: 24px;
        max-width: min(560px, calc(100% - 48px));
        color: #fff;
        background: linear-gradient(180deg, rgba(0,0,0,0), rgba(0,0,0,.65));
        padding: 16px 18px;
        border-radius: 12px;
      }
      .simple-banner-caption h3 { margin: 0 0 8px; font-size: clamp(18px, 3vw, 34px); line-height: 1.15; }
      .simple-banner-caption p { margin: 0; opacity: .92; }
      .simple-banner-swiper .swiper-button-prev,
      .simple-banner-swiper .swiper-button-next {
        width: 40px; height: 40px; border-radius: 50%;
        background: rgba(255,255,255,.85); color: #111;
      }
      .simple-banner-swiper .swiper-button-prev:after,
      .simple-banner-swiper .swiper-button-next:after { font-size: 16px; font-weight: 700; }
      .simple-banner-swiper .swiper-pagination-bullet { background: #fff; opacity: .65; }
      .simple-banner-swiper .swiper-pagination-bullet-active { opacity: 1; }
      @media (max-width: 767.98px) {
        .simple-banner-media img { aspect-ratio: 4 / 3; }
        .simple-banner-caption { left: 12px; bottom: 12px; max-width: calc(100% - 24px); padding: 12px 14px; }
        .simple-banner-caption p { font-size: 14px; }
      }
    </style>

    <script>
      (function() {
        function initSimpleBannerSwiper() {
          if (typeof window.Swiper === 'undefined') {
            return;
          }

          document.querySelectorAll('.simple-banner-swiper').forEach(function(node) {
            if (!node || node.swiper) {
              return;
            }

            new window.Swiper(node, {
              loop: true,
              slidesPerView: 1,
              spaceBetween: 0,
              autoplay: {
                delay: 4500,
                disableOnInteraction: false
              },
              pagination: {
                el: node.querySelector('.swiper-pagination'),
                clickable: true
              },
              navigation: {
                nextEl: node.querySelector('.swiper-button-next'),
                prevEl: node.querySelector('.swiper-button-prev')
              }
            });
          });
        }

        function ensureSwiperAssets(callback) {
          if (typeof window.Swiper !== 'undefined') {
            callback();
            return;
          }

          if (!document.getElementById('simple-banner-swiper-css')) {
            var css = document.createElement('link');
            css.id = 'simple-banner-swiper-css';
            css.rel = 'stylesheet';
            css.href = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css';
            document.head.appendChild(css);
          }

          var existing = document.getElementById('simple-banner-swiper-js');

          if (existing) {
            existing.addEventListener('load', callback, { once: true });
            return;
          }

          var script = document.createElement('script');
          script.id = 'simple-banner-swiper-js';
          script.src = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js';
          script.onload = callback;
          document.body.appendChild(script);
        }

        ensureSwiperAssets(initSimpleBannerSwiper);
      })();
    </script>
  ";
        }
        // line 138
        yield "</section>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "catalog/view/template/sections/banner.twig";
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
        return array (  238 => 138,  132 => 34,  126 => 33,  121 => 30,  117 => 28,  110 => 27,  104 => 26,  101 => 25,  99 => 24,  96 => 23,  88 => 20,  85 => 19,  77 => 16,  72 => 15,  70 => 14,  66 => 12,  63 => 11,  60 => 10,  56 => 9,  52 => 7,  50 => 6,  47 => 5,  45 => 4,  42 => 3,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Auto-generated by Homepage Section Builder v2. #}
{# section_type: homepage_slider #}
<section class=\"home-section home-section-banner\">
  {% set banner_items = items|slice(1) %}

  {% if banner_items %}
    <div class=\"swiper simple-banner-swiper\">
      <div class=\"swiper-wrapper\">
        {% for item in banner_items %}
          {% if item.image %}
            {% set image_src = 'image/' ~ item.image %}
            <div class=\"swiper-slide\">
              <article class=\"simple-banner-slide\">
                {% if item.link %}
                  <a href=\"{{ item.link }}\" class=\"simple-banner-media\">
                    <img src=\"{{ image_src }}\" alt=\"{{ item.text ?: fields.headline ?: 'Banner' }}\"/>
                  </a>
                {% else %}
                  <div class=\"simple-banner-media\">
                    <img src=\"{{ image_src }}\" alt=\"{{ item.text ?: fields.headline ?: 'Banner' }}\"/>
                  </div>
                {% endif %}

                {% if item.text or item.subtext %}
                  <div class=\"simple-banner-caption\">
                    {% if item.text %}<h3>{{ item.text }}</h3>{% endif %}
                    {% if item.subtext %}<p>{{ item.subtext }}</p>{% endif %}
                  </div>
                {% endif %}
              </article>
            </div>
          {% endif %}
        {% endfor %}
      </div>

      <div class=\"swiper-pagination\"></div>
      <div class=\"swiper-button-prev\"></div>
      <div class=\"swiper-button-next\"></div>
    </div>

    <style>
      .simple-banner-swiper { position: relative; border-radius: 16px; overflow: hidden; }
      .simple-banner-slide { position: relative; }
      .simple-banner-media { display: block; }
      .simple-banner-media img { width: 100%; display: block; aspect-ratio: 16 / 6; object-fit: cover; }
      .simple-banner-caption {
        position: absolute;
        left: 24px;
        bottom: 24px;
        max-width: min(560px, calc(100% - 48px));
        color: #fff;
        background: linear-gradient(180deg, rgba(0,0,0,0), rgba(0,0,0,.65));
        padding: 16px 18px;
        border-radius: 12px;
      }
      .simple-banner-caption h3 { margin: 0 0 8px; font-size: clamp(18px, 3vw, 34px); line-height: 1.15; }
      .simple-banner-caption p { margin: 0; opacity: .92; }
      .simple-banner-swiper .swiper-button-prev,
      .simple-banner-swiper .swiper-button-next {
        width: 40px; height: 40px; border-radius: 50%;
        background: rgba(255,255,255,.85); color: #111;
      }
      .simple-banner-swiper .swiper-button-prev:after,
      .simple-banner-swiper .swiper-button-next:after { font-size: 16px; font-weight: 700; }
      .simple-banner-swiper .swiper-pagination-bullet { background: #fff; opacity: .65; }
      .simple-banner-swiper .swiper-pagination-bullet-active { opacity: 1; }
      @media (max-width: 767.98px) {
        .simple-banner-media img { aspect-ratio: 4 / 3; }
        .simple-banner-caption { left: 12px; bottom: 12px; max-width: calc(100% - 24px); padding: 12px 14px; }
        .simple-banner-caption p { font-size: 14px; }
      }
    </style>

    <script>
      (function() {
        function initSimpleBannerSwiper() {
          if (typeof window.Swiper === 'undefined') {
            return;
          }

          document.querySelectorAll('.simple-banner-swiper').forEach(function(node) {
            if (!node || node.swiper) {
              return;
            }

            new window.Swiper(node, {
              loop: true,
              slidesPerView: 1,
              spaceBetween: 0,
              autoplay: {
                delay: 4500,
                disableOnInteraction: false
              },
              pagination: {
                el: node.querySelector('.swiper-pagination'),
                clickable: true
              },
              navigation: {
                nextEl: node.querySelector('.swiper-button-next'),
                prevEl: node.querySelector('.swiper-button-prev')
              }
            });
          });
        }

        function ensureSwiperAssets(callback) {
          if (typeof window.Swiper !== 'undefined') {
            callback();
            return;
          }

          if (!document.getElementById('simple-banner-swiper-css')) {
            var css = document.createElement('link');
            css.id = 'simple-banner-swiper-css';
            css.rel = 'stylesheet';
            css.href = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css';
            document.head.appendChild(css);
          }

          var existing = document.getElementById('simple-banner-swiper-js');

          if (existing) {
            existing.addEventListener('load', callback, { once: true });
            return;
          }

          var script = document.createElement('script');
          script.id = 'simple-banner-swiper-js';
          script.src = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js';
          script.onload = callback;
          document.body.appendChild(script);
        }

        ensureSwiperAssets(initSimpleBannerSwiper);
      })();
    </script>
  {% endif %}
</section>
", "catalog/view/template/sections/banner.twig", "/Applications/MAMP/htdocs/catalog/view/template/sections/banner.twig");
    }
}
