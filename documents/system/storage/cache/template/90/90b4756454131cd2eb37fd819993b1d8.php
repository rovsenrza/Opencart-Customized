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

/* catalog/view/template/sections/partnyorlar.twig */
class __TwigTemplate_9fef854955a0637bf344d9c51b25f795 extends Template
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
        yield "<section class=\"home-section home-section-partnyorlar\">
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
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["items"] ?? null)) > 1)) {
            // line 9
            yield "    <div class=\"row g-3\">
      ";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ($context["items"] ?? null), 1));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 11
                yield "        <div class=\"col-6 col-md-3\">
          ";
                // line 12
                if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "href", [], "any", false, false, false, 12)) {
                    // line 13
                    yield "            <a href=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "href", [], "any", false, false, false, 13);
                    yield "\" class=\"d-flex align-items-center justify-content-center border rounded p-3 h-100\">
              ";
                    // line 14
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, false, 14)) {
                        // line 15
                        yield "                <img src=\"image/";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, false, 15);
                        yield "\" alt=\"partner\" class=\"img-fluid\"/>
              ";
                    }
                    // line 17
                    yield "            </a>
          ";
                } else {
                    // line 19
                    yield "            <div class=\"d-flex align-items-center justify-content-center border rounded p-3 h-100\">
              ";
                    // line 20
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, false, 20)) {
                        // line 21
                        yield "                <img src=\"image/";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, false, 21);
                        yield "\" alt=\"partner\" class=\"img-fluid\"/>
              ";
                    }
                    // line 23
                    yield "            </div>
          ";
                }
                // line 25
                yield "        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            yield "    </div>
  ";
        }
        // line 29
        yield "</section>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "catalog/view/template/sections/partnyorlar.twig";
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
        return array (  113 => 29,  109 => 27,  102 => 25,  98 => 23,  92 => 21,  90 => 20,  87 => 19,  83 => 17,  77 => 15,  75 => 14,  70 => 13,  68 => 12,  65 => 11,  61 => 10,  58 => 9,  56 => 8,  53 => 7,  47 => 5,  45 => 4,  42 => 3,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Auto-generated by Homepage Section Builder v2. #}
{# section_type: partners #}
<section class=\"home-section home-section-partnyorlar\">
  {% if fields.headline %}
    <h2>{{ fields.headline }}</h2>
  {% endif %}

  {% if items|length > 1 %}
    <div class=\"row g-3\">
      {% for item in items|slice(1) %}
        <div class=\"col-6 col-md-3\">
          {% if item.href %}
            <a href=\"{{ item.href }}\" class=\"d-flex align-items-center justify-content-center border rounded p-3 h-100\">
              {% if item.image %}
                <img src=\"image/{{ item.image }}\" alt=\"partner\" class=\"img-fluid\"/>
              {% endif %}
            </a>
          {% else %}
            <div class=\"d-flex align-items-center justify-content-center border rounded p-3 h-100\">
              {% if item.image %}
                <img src=\"image/{{ item.image }}\" alt=\"partner\" class=\"img-fluid\"/>
              {% endif %}
            </div>
          {% endif %}
        </div>
      {% endfor %}
    </div>
  {% endif %}
</section>

{#
array elementlerini gormek ucun ucun:
<pre>{{ custom_fields|json_encode }}</pre>
#}", "catalog/view/template/sections/partnyorlar.twig", "/Applications/MAMP/htdocs/catalog/view/template/sections/partnyorlar.twig");
    }
}
