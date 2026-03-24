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

/* catalog/view/template/product/category.twig */
class __TwigTemplate_1f5dea48c9cb69e2652dd8652ccd5bb2 extends Template
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
<div id=\"product-category\" class=\"container\">
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
      ";
        // line 11
        if ((($context["image"] ?? null) || ($context["description"] ?? null))) {
            // line 12
            yield "        <div class=\"row\">
          ";
            // line 13
            if (($context["image"] ?? null)) {
                // line 14
                yield "            <div class=\"col-3\"><img src=\"";
                yield ($context["image"] ?? null);
                yield "\" alt=\"";
                yield ($context["heading_title"] ?? null);
                yield "\" title=\"";
                yield ($context["heading_title"] ?? null);
                yield "\" class=\"img-thumbnail\"/></div>
          ";
            }
            // line 16
            yield "          ";
            if (($context["description"] ?? null)) {
                // line 17
                yield "            <div class=\"col-9\">";
                yield ($context["description"] ?? null);
                yield "</div>
          ";
            }
            // line 19
            yield "        </div>
        <hr/>
      ";
        }
        // line 22
        yield "
      ";
        // line 23
        if (($context["products"] ?? null)) {
            // line 24
            yield "        <div class=\"row\">
          ";
            // line 25
            if (($context["compare_enabled"] ?? null)) {
                // line 26
                yield "            <div class=\"col-lg-3\">
              <div class=\"mb-3\">
                <a href=\"";
                // line 28
                yield ($context["compare"] ?? null);
                yield "\" id=\"compare-total\" class=\"btn btn-primary d-block\"><i class=\"fa-solid fa-arrow-right-arrow-left\"></i> <span class=\"d-none d-xl-inline\">";
                yield ($context["text_compare"] ?? null);
                yield "</span></a>
              </div>
            </div>
          ";
            }
            // line 32
            yield "          <div class=\"col-lg-1 d-none d-lg-block\">
            <div class=\"btn-group\">
              <button type=\"button\" id=\"button-list\" class=\"btn btn-light\" data-bs-toggle=\"tooltip\" title=\"";
            // line 34
            yield ($context["button_list"] ?? null);
            yield "\"><i class=\"fa-solid fa-table-list\"></i></button>
              <button type=\"button\" id=\"button-grid\" class=\"btn btn-light\" data-bs-toggle=\"tooltip\" title=\"";
            // line 35
            yield ($context["button_grid"] ?? null);
            yield "\"><i class=\"fa-solid fa-table-cells\"></i></button>
            </div>
          </div>
          <div class=\"col-lg-4 offset-lg-1 col-6\">
            <div class=\"input-group mb-3\">
              <label for=\"input-sort\" class=\"input-group-text\">";
            // line 40
            yield ($context["text_sort"] ?? null);
            yield "</label>
              <select id=\"input-sort\" class=\"form-select\" onchange=\"location = this.value;\">
                ";
            // line 42
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["sorts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
                // line 43
                yield "                  <option value=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 43);
                yield "\"";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["sorts"], "value", [], "any", false, false, false, 43) == Twig\Extension\CoreExtension::sprintf("%s-%s", ($context["sort"] ?? null), ($context["order"] ?? null)))) {
                    yield " selected";
                }
                yield ">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 43);
                yield "</option>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['sorts'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            yield "              </select>
            </div>
          </div>
          <div class=\"col-lg-3 col-6\">
            <div class=\"input-group mb-3\">
              <label for=\"input-limit\" class=\"input-group-text\">";
            // line 50
            yield ($context["text_limit"] ?? null);
            yield "</label>
              <select id=\"input-limit\" class=\"form-select\" onchange=\"location = this.value;\">
                ";
            // line 52
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["limits"]);
            foreach ($context['_seq'] as $context["_key"] => $context["limits"]) {
                // line 53
                yield "                  <option value=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["limits"], "href", [], "any", false, false, false, 53);
                yield "\"";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["limits"], "value", [], "any", false, false, false, 53) == ($context["limit"] ?? null))) {
                    yield " selected";
                }
                yield ">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["limits"], "text", [], "any", false, false, false, 53);
                yield "</option>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['limits'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            yield "              </select>
            </div>
          </div>
        </div>

        <div id=\"product-list\" class=\"row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4\">
          ";
            // line 61
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 62
                yield "            <div class=\"col mb-3\">";
                yield $context["product"];
                yield "</div>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['product'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            yield "        </div>

        <div class=\"row\">
          <div class=\"col-sm-6 text-start\">";
            // line 67
            yield ($context["pagination"] ?? null);
            yield "</div>
          <div class=\"col-sm-6 text-end\">";
            // line 68
            yield ($context["results"] ?? null);
            yield "</div>
        </div>
      ";
        }
        // line 71
        yield "      ";
        if (( !($context["categories"] ?? null) &&  !($context["products"] ?? null))) {
            // line 72
            yield "        <p>";
            yield ($context["text_no_results"] ?? null);
            yield "</p>
        <div class=\"text-end\"><a href=\"";
            // line 73
            yield ($context["continue"] ?? null);
            yield "\" class=\"btn btn-primary\">";
            yield ($context["button_continue"] ?? null);
            yield "</a></div>
      ";
        }
        // line 75
        yield "      ";
        yield ($context["content_bottom"] ?? null);
        yield "</div>
    ";
        // line 76
        yield ($context["column_right"] ?? null);
        yield "</div>
</div>
";
        // line 78
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
        return "catalog/view/template/product/category.twig";
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
        return array (  264 => 78,  259 => 76,  254 => 75,  247 => 73,  242 => 72,  239 => 71,  233 => 68,  229 => 67,  224 => 64,  215 => 62,  211 => 61,  203 => 55,  188 => 53,  184 => 52,  179 => 50,  172 => 45,  157 => 43,  153 => 42,  148 => 40,  140 => 35,  136 => 34,  132 => 32,  123 => 28,  119 => 26,  117 => 25,  114 => 24,  112 => 23,  109 => 22,  104 => 19,  98 => 17,  95 => 16,  85 => 14,  83 => 13,  80 => 12,  78 => 11,  74 => 10,  70 => 9,  66 => 8,  63 => 7,  52 => 5,  48 => 4,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ header }}
<div id=\"product-category\" class=\"container\">
  <ul class=\"breadcrumb\">
    {% for breadcrumb in breadcrumbs %}
      <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
    {% endfor %}
  </ul>
  <div class=\"row\">{{ column_left }}
    <div id=\"content\" class=\"col\">{{ content_top }}
      <h1>{{ heading_title }}</h1>
      {% if image or description %}
        <div class=\"row\">
          {% if image %}
            <div class=\"col-3\"><img src=\"{{ image }}\" alt=\"{{ heading_title }}\" title=\"{{ heading_title }}\" class=\"img-thumbnail\"/></div>
          {% endif %}
          {% if description %}
            <div class=\"col-9\">{{ description }}</div>
          {% endif %}
        </div>
        <hr/>
      {% endif %}

      {% if products %}
        <div class=\"row\">
          {% if compare_enabled %}
            <div class=\"col-lg-3\">
              <div class=\"mb-3\">
                <a href=\"{{ compare }}\" id=\"compare-total\" class=\"btn btn-primary d-block\"><i class=\"fa-solid fa-arrow-right-arrow-left\"></i> <span class=\"d-none d-xl-inline\">{{ text_compare }}</span></a>
              </div>
            </div>
          {% endif %}
          <div class=\"col-lg-1 d-none d-lg-block\">
            <div class=\"btn-group\">
              <button type=\"button\" id=\"button-list\" class=\"btn btn-light\" data-bs-toggle=\"tooltip\" title=\"{{ button_list }}\"><i class=\"fa-solid fa-table-list\"></i></button>
              <button type=\"button\" id=\"button-grid\" class=\"btn btn-light\" data-bs-toggle=\"tooltip\" title=\"{{ button_grid }}\"><i class=\"fa-solid fa-table-cells\"></i></button>
            </div>
          </div>
          <div class=\"col-lg-4 offset-lg-1 col-6\">
            <div class=\"input-group mb-3\">
              <label for=\"input-sort\" class=\"input-group-text\">{{ text_sort }}</label>
              <select id=\"input-sort\" class=\"form-select\" onchange=\"location = this.value;\">
                {% for sorts in sorts %}
                  <option value=\"{{ sorts.href }}\"{% if sorts.value == '%s-%s'|format(sort, order) %} selected{% endif %}>{{ sorts.text }}</option>
                {% endfor %}
              </select>
            </div>
          </div>
          <div class=\"col-lg-3 col-6\">
            <div class=\"input-group mb-3\">
              <label for=\"input-limit\" class=\"input-group-text\">{{ text_limit }}</label>
              <select id=\"input-limit\" class=\"form-select\" onchange=\"location = this.value;\">
                {% for limits in limits %}
                  <option value=\"{{ limits.href }}\"{% if limits.value == limit %} selected{% endif %}>{{ limits.text }}</option>
                {% endfor %}
              </select>
            </div>
          </div>
        </div>

        <div id=\"product-list\" class=\"row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4\">
          {% for product in products %}
            <div class=\"col mb-3\">{{ product }}</div>
          {% endfor %}
        </div>

        <div class=\"row\">
          <div class=\"col-sm-6 text-start\">{{ pagination }}</div>
          <div class=\"col-sm-6 text-end\">{{ results }}</div>
        </div>
      {% endif %}
      {% if not categories and not products %}
        <p>{{ text_no_results }}</p>
        <div class=\"text-end\"><a href=\"{{ continue }}\" class=\"btn btn-primary\">{{ button_continue }}</a></div>
      {% endif %}
      {{ content_bottom }}</div>
    {{ column_right }}</div>
</div>
{{ footer }}
", "catalog/view/template/product/category.twig", "/Applications/MAMP/htdocs/catalog/view/template/product/category.twig");
    }
}
