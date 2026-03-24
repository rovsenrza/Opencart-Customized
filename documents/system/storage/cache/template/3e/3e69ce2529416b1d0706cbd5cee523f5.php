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

/* catalog/view/template/product/search.twig */
class __TwigTemplate_e43f294fca90b938d5cc7c7b30d54227 extends Template
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
<div id=\"product-search\" class=\"container\">
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
  <div class=\"row\">
    ";
        // line 9
        yield ($context["column_left"] ?? null);
        yield "
    <div id=\"content\" class=\"col\">
      ";
        // line 11
        yield ($context["content_top"] ?? null);
        yield "
      <h1>";
        // line 12
        yield ($context["heading_title"] ?? null);
        yield "</h1>
      <h2>";
        // line 13
        yield ($context["text_search"] ?? null);
        yield "</h2>
      ";
        // line 14
        if (($context["products"] ?? null)) {
            // line 15
            yield "        <div id=\"display-control\" class=\"row\">
          <div class=\"col-md-3\">
            <div class=\"mb-3\">
              <a href=\"";
            // line 18
            yield ($context["compare"] ?? null);
            yield "\" id=\"compare-total\" class=\"btn btn-primary d-block\"><i class=\"fa-solid fa-arrow-right-arrow-left\"></i> <span class=\"d-inline d-md-none d-lg-inline\">";
            yield ($context["text_compare"] ?? null);
            yield "</span></a>
            </div>
          </div>
          <div class=\"col-md-1 d-none d-md-block\">
            <div class=\"btn-group\">
              <button type=\"button\" id=\"button-list\" class=\"btn btn-light\" data-bs-toggle=\"tooltip\" title=\"";
            // line 23
            yield ($context["button_list"] ?? null);
            yield "\"><i class=\"fa-solid fa-table-list\"></i></button>
              <button type=\"button\" id=\"button-grid\" class=\"btn btn-light\" data-bs-toggle=\"tooltip\" title=\"";
            // line 24
            yield ($context["button_grid"] ?? null);
            yield "\"><i class=\"fa-solid fa-table-cells\"></i></button>
            </div>
          </div>
          <div class=\"col-md-4 offset-md-1 col-6\">
            <div class=\"input-group mb-3\">
              <label for=\"input-sort\" class=\"input-group-text\">";
            // line 29
            yield ($context["text_sort"] ?? null);
            yield "</label>
              <select id=\"input-sort\" class=\"form-select\" onchange=\"location = this.value;\">
                ";
            // line 31
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["sorts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
                // line 32
                yield "                  <option value=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 32);
                yield "\"";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["sorts"], "value", [], "any", false, false, false, 32) == Twig\Extension\CoreExtension::sprintf("%s-%s", ($context["sort"] ?? null), ($context["order"] ?? null)))) {
                    yield " selected";
                }
                yield ">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 32);
                yield "</option>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['sorts'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            yield "              </select>
            </div>
          </div>
          <div class=\"col-md-3 col-6\">
            <div class=\"input-group mb-3\">
              <label for=\"input-limit\" class=\"input-group-text\">";
            // line 39
            yield ($context["text_limit"] ?? null);
            yield "</label>
              <select id=\"input-limit\" class=\"form-select\" onchange=\"location = this.value;\">
                ";
            // line 41
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["limits"]);
            foreach ($context['_seq'] as $context["_key"] => $context["limits"]) {
                // line 42
                yield "                  <option value=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["limits"], "href", [], "any", false, false, false, 42);
                yield "\"";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["limits"], "value", [], "any", false, false, false, 42) == ($context["limit"] ?? null))) {
                    yield " selected";
                }
                yield ">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["limits"], "text", [], "any", false, false, false, 42);
                yield "</option>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['limits'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            yield "              </select>
            </div>
          </div>
        </div>
        <div id=\"product-list\" class=\"row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4\">
          ";
            // line 49
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 50
                yield "            <div class=\"col mb-3\">";
                yield $context["product"];
                yield "</div>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['product'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            yield "        </div>
        <div class=\"row\">
          <div class=\"col-sm-6 text-start\">";
            // line 54
            yield ($context["pagination"] ?? null);
            yield "</div>
          <div class=\"col-sm-6 text-end\">";
            // line 55
            yield ($context["results"] ?? null);
            yield "</div>
        </div>
      ";
        } else {
            // line 58
            yield "        <p>";
            yield ($context["text_no_results"] ?? null);
            yield "</p>
      ";
        }
        // line 60
        yield "      ";
        yield ($context["content_bottom"] ?? null);
        yield "
    </div>
    ";
        // line 62
        yield ($context["column_right"] ?? null);
        yield "
  </div>
</div>
";
        // line 65
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
        return "catalog/view/template/product/search.twig";
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
        return array (  220 => 65,  214 => 62,  208 => 60,  202 => 58,  196 => 55,  192 => 54,  188 => 52,  179 => 50,  175 => 49,  168 => 44,  153 => 42,  149 => 41,  144 => 39,  137 => 34,  122 => 32,  118 => 31,  113 => 29,  105 => 24,  101 => 23,  91 => 18,  86 => 15,  84 => 14,  80 => 13,  76 => 12,  72 => 11,  67 => 9,  63 => 7,  52 => 5,  48 => 4,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ header }}
<div id=\"product-search\" class=\"container\">
  <ul class=\"breadcrumb\">
    {% for breadcrumb in breadcrumbs %}
      <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
    {% endfor %}
  </ul>
  <div class=\"row\">
    {{ column_left }}
    <div id=\"content\" class=\"col\">
      {{ content_top }}
      <h1>{{ heading_title }}</h1>
      <h2>{{ text_search }}</h2>
      {% if products %}
        <div id=\"display-control\" class=\"row\">
          <div class=\"col-md-3\">
            <div class=\"mb-3\">
              <a href=\"{{ compare }}\" id=\"compare-total\" class=\"btn btn-primary d-block\"><i class=\"fa-solid fa-arrow-right-arrow-left\"></i> <span class=\"d-inline d-md-none d-lg-inline\">{{ text_compare }}</span></a>
            </div>
          </div>
          <div class=\"col-md-1 d-none d-md-block\">
            <div class=\"btn-group\">
              <button type=\"button\" id=\"button-list\" class=\"btn btn-light\" data-bs-toggle=\"tooltip\" title=\"{{ button_list }}\"><i class=\"fa-solid fa-table-list\"></i></button>
              <button type=\"button\" id=\"button-grid\" class=\"btn btn-light\" data-bs-toggle=\"tooltip\" title=\"{{ button_grid }}\"><i class=\"fa-solid fa-table-cells\"></i></button>
            </div>
          </div>
          <div class=\"col-md-4 offset-md-1 col-6\">
            <div class=\"input-group mb-3\">
              <label for=\"input-sort\" class=\"input-group-text\">{{ text_sort }}</label>
              <select id=\"input-sort\" class=\"form-select\" onchange=\"location = this.value;\">
                {% for sorts in sorts %}
                  <option value=\"{{ sorts.href }}\"{% if sorts.value == '%s-%s'|format(sort, order) %} selected{% endif %}>{{ sorts.text }}</option>
                {% endfor %}
              </select>
            </div>
          </div>
          <div class=\"col-md-3 col-6\">
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
      {% else %}
        <p>{{ text_no_results }}</p>
      {% endif %}
      {{ content_bottom }}
    </div>
    {{ column_right }}
  </div>
</div>
{{ footer }}
", "catalog/view/template/product/search.twig", "/Applications/MAMP/htdocs/catalog/view/template/product/search.twig");
    }
}
