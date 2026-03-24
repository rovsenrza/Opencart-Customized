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

/* catalog/view/template/information/information.twig */
class __TwigTemplate_d9485d9895d01bcf26d310f219c2e63f extends Template
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
<div id=\"information-information\" class=\"container\">
  <ul class=\"breadcrumb\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 5
            yield "    <li class=\"breadcrumb-item\"><a href=\"";
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
      ";
        // line 10
        $context["page_title"] = Twig\Extension\CoreExtension::lower($this->env->getCharset(), ($context["heading_title"] ?? null));
        // line 11
        yield "      ";
        if (CoreExtension::inFilter(($context["page_title"] ?? null), ["haqqimizda", "haqqımızda", "about us"])) {
            // line 12
            yield "        <section class=\"about-hero mb-4 p-4 p-lg-5 rounded-3\" style=\"background: linear-gradient(135deg, #e8f6ff 0%, #f7fbff 100%); border: 1px solid #d8ebf8;\">
          <h1 class=\"mb-3\">";
            // line 13
            yield ($context["heading_title"] ?? null);
            yield "</h1>
          <p class=\"mb-0 text-muted\">Brendimiz, dəyərlərimiz və gördüyümüz iş barədə qısa məlumat.</p>
        </section>

        <section class=\"about-content card border-0 shadow-sm\">
          <div class=\"card-body p-4 p-lg-5\">
            ";
            // line 19
            yield ($context["description"] ?? null);
            yield "
          </div>
        </section>
      ";
        } else {
            // line 23
            yield "        <h1>";
            yield ($context["heading_title"] ?? null);
            yield "</h1>
        ";
            // line 24
            yield ($context["description"] ?? null);
            yield "
      ";
        }
        // line 26
        yield "      ";
        yield ($context["content_bottom"] ?? null);
        yield "</div>
    ";
        // line 27
        yield ($context["column_right"] ?? null);
        yield "</div>
</div>
";
        // line 29
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
        return "catalog/view/template/information/information.twig";
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
        return array (  118 => 29,  113 => 27,  108 => 26,  103 => 24,  98 => 23,  91 => 19,  82 => 13,  79 => 12,  76 => 11,  74 => 10,  70 => 9,  66 => 8,  63 => 7,  52 => 5,  48 => 4,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ header }}
<div id=\"information-information\" class=\"container\">
  <ul class=\"breadcrumb\">
    {% for breadcrumb in breadcrumbs %}
    <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
    {% endfor %}
  </ul>
  <div class=\"row\">{{ column_left }}
    <div id=\"content\" class=\"col\">{{ content_top }}
      {% set page_title = heading_title|lower %}
      {% if page_title in ['haqqimizda', 'haqqımızda', 'about us'] %}
        <section class=\"about-hero mb-4 p-4 p-lg-5 rounded-3\" style=\"background: linear-gradient(135deg, #e8f6ff 0%, #f7fbff 100%); border: 1px solid #d8ebf8;\">
          <h1 class=\"mb-3\">{{ heading_title }}</h1>
          <p class=\"mb-0 text-muted\">Brendimiz, dəyərlərimiz və gördüyümüz iş barədə qısa məlumat.</p>
        </section>

        <section class=\"about-content card border-0 shadow-sm\">
          <div class=\"card-body p-4 p-lg-5\">
            {{ description }}
          </div>
        </section>
      {% else %}
        <h1>{{ heading_title }}</h1>
        {{ description }}
      {% endif %}
      {{ content_bottom }}</div>
    {{ column_right }}</div>
</div>
{{ footer }}
", "catalog/view/template/information/information.twig", "/Applications/MAMP/htdocs/catalog/view/template/information/information.twig");
    }
}
