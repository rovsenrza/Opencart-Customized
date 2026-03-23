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

/* catalog/view/template/sections/ustunlukler.twig */
class __TwigTemplate_5c358b81af78b7a41eeb484fa7e243b4 extends Template
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
        yield "<section class=\"home-section home-section-ustunlukler\">
  ";
        // line 4
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "headline", [], "any", false, false, false, 4)) {
            // line 5
            yield "    <h2>";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "headline", [], "any", false, false, false, 5);
            yield "</h2>
  ";
        }
        // line 7
        yield "
  ";
        // line 8
        if (($context["items"] ?? null)) {
            // line 9
            yield "    <div class=\"row g-4\">
      ";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 11
                yield "        <div class=\"col-12 col-sm-6 col-md-3\">
          <div class=\"card h-100 border-0 text-center\">
            ";
                // line 13
                if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, false, 13)) {
                    // line 14
                    yield "              <div class=\"card-img-top p-3\">
                <img src=\"image/";
                    // line 15
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, false, 15);
                    yield "\" alt=\"";
                    yield ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, false, 15)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, false, 15)) : (CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "headline", [], "any", false, false, false, 15)));
                    yield "\" class=\"img-fluid\"/>
              </div>
            ";
                }
                // line 18
                yield "            <div class=\"card-body\">
              ";
                // line 19
                if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, false, 19)) {
                    // line 20
                    yield "                <h5 class=\"card-title mb-2\">";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, false, 20);
                    yield "</h5>
              ";
                }
                // line 22
                yield "              ";
                if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "subtext", [], "any", false, false, false, 22)) {
                    // line 23
                    yield "                <p class=\"card-text mb-0\">";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "subtext", [], "any", false, false, false, 23);
                    yield "</p>
              ";
                }
                // line 25
                yield "            </div>
          </div>
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            yield "    </div>
  ";
        }
        // line 31
        yield "</section>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "catalog/view/template/sections/ustunlukler.twig";
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
        return array (  115 => 31,  111 => 29,  102 => 25,  96 => 23,  93 => 22,  87 => 20,  85 => 19,  82 => 18,  74 => 15,  71 => 14,  69 => 13,  65 => 11,  61 => 10,  58 => 9,  56 => 8,  53 => 7,  47 => 5,  45 => 4,  42 => 3,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Auto-generated by Homepage Section Builder v2. #}
{# section_type: advantages #}
<section class=\"home-section home-section-ustunlukler\">
  {% if fields.headline %}
    <h2>{{ fields.headline }}</h2>
  {% endif %}

  {% if items %}
    <div class=\"row g-4\">
      {% for item in items %}
        <div class=\"col-12 col-sm-6 col-md-3\">
          <div class=\"card h-100 border-0 text-center\">
            {% if item.image %}
              <div class=\"card-img-top p-3\">
                <img src=\"image/{{ item.image }}\" alt=\"{{ item.text ?: fields.headline }}\" class=\"img-fluid\"/>
              </div>
            {% endif %}
            <div class=\"card-body\">
              {% if item.text %}
                <h5 class=\"card-title mb-2\">{{ item.text }}</h5>
              {% endif %}
              {% if item.subtext %}
                <p class=\"card-text mb-0\">{{ item.subtext }}</p>
              {% endif %}
            </div>
          </div>
        </div>
      {% endfor %}
    </div>
  {% endif %}
</section>
", "catalog/view/template/sections/ustunlukler.twig", "/Applications/MAMP/htdocs/catalog/view/template/sections/ustunlukler.twig");
    }
}
