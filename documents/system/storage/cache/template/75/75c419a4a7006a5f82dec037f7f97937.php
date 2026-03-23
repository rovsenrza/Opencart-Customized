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

/* catalog/view/template/sections/cta.twig */
class __TwigTemplate_53baa1c359af848386ca5088272c2fef extends Template
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
        yield "<section class=\"home-section home-section-cta\">
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
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "description", [], "any", false, false, false, 8)) {
            // line 9
            yield "    <p>";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "description", [], "any", false, false, false, 9);
            yield "</p>
  ";
        }
        // line 11
        yield "
  ";
        // line 12
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["items"] ?? null)) > 1)) {
            // line 13
            yield "    <div class=\"d-flex flex-wrap gap-2\">
      ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ($context["items"] ?? null), 1));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 15
                yield "        ";
                if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "href", [], "any", false, false, false, 15)) {
                    // line 16
                    yield "          <a href=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "href", [], "any", false, false, false, 16);
                    yield "\" class=\"btn btn-outline-primary d-inline-flex align-items-center gap-2\">
            ";
                    // line 17
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 17)) {
                        // line 18
                        yield "              <img src=\"image/";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 18);
                        yield "\" alt=\"";
                        yield ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 18)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 18)) : ("social"));
                        yield "\" style=\"width: 20px; height: 20px; object-fit: contain;\"/>
            ";
                    }
                    // line 20
                    yield "            <span>";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 20);
                    yield "</span>
          </a>
        ";
                } else {
                    // line 23
                    yield "          <span class=\"btn btn-outline-secondary d-inline-flex align-items-center gap-2\">
            ";
                    // line 24
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 24)) {
                        // line 25
                        yield "              <img src=\"image/";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 25);
                        yield "\" alt=\"";
                        yield ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 25)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 25)) : ("social"));
                        yield "\" style=\"width: 20px; height: 20px; object-fit: contain;\"/>
            ";
                    }
                    // line 27
                    yield "            <span>";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 27);
                    yield "</span>
          </span>
        ";
                }
                // line 30
                yield "      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            yield "    </div>
  ";
        }
        // line 33
        yield "</section>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "catalog/view/template/sections/cta.twig";
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
        return array (  131 => 33,  127 => 31,  121 => 30,  114 => 27,  106 => 25,  104 => 24,  101 => 23,  94 => 20,  86 => 18,  84 => 17,  79 => 16,  76 => 15,  72 => 14,  69 => 13,  67 => 12,  64 => 11,  58 => 9,  56 => 8,  53 => 7,  47 => 5,  45 => 4,  42 => 3,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Auto-generated by Homepage Section Builder v2. #}
{# section_type: cta #}
<section class=\"home-section home-section-cta\">
  {% if fields.headline %}
    <h2>{{ fields.headline }}</h2>
  {% endif %}

  {% if fields.description %}
    <p>{{ fields.description }}</p>
  {% endif %}

  {% if items|length > 1 %}
    <div class=\"d-flex flex-wrap gap-2\">
      {% for item in items|slice(1) %}
        {% if item.href %}
          <a href=\"{{ item.href }}\" class=\"btn btn-outline-primary d-inline-flex align-items-center gap-2\">
            {% if item.icon %}
              <img src=\"image/{{ item.icon }}\" alt=\"{{ item.label ?: 'social' }}\" style=\"width: 20px; height: 20px; object-fit: contain;\"/>
            {% endif %}
            <span>{{ item.label }}</span>
          </a>
        {% else %}
          <span class=\"btn btn-outline-secondary d-inline-flex align-items-center gap-2\">
            {% if item.icon %}
              <img src=\"image/{{ item.icon }}\" alt=\"{{ item.label ?: 'social' }}\" style=\"width: 20px; height: 20px; object-fit: contain;\"/>
            {% endif %}
            <span>{{ item.label }}</span>
          </span>
        {% endif %}
      {% endfor %}
    </div>
  {% endif %}
</section>
", "catalog/view/template/sections/cta.twig", "/Applications/MAMP/htdocs/catalog/view/template/sections/cta.twig");
    }
}
