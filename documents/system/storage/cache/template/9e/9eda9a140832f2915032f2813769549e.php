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

/* catalog/view/template/product/dynamic_filter.twig */
class __TwigTemplate_8e23442a3a09c76761ba7f941401e599 extends Template
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
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["dynamic_filters"] ?? null), "attributes", [], "any", false, false, false, 1) || CoreExtension::getAttribute($this->env, $this->source, ($context["dynamic_filters"] ?? null), "options", [], "any", false, false, false, 1))) {
            // line 2
            yield "  <form action=\"";
            yield ($context["dynamic_filter_action"] ?? null);
            yield "\" method=\"get\" class=\"card mt-3\">
    <div class=\"card-body\">
      <div class=\"d-flex justify-content-between align-items-center mb-3\">
        <h5 class=\"mb-0\">Filters</h5>
        ";
            // line 6
            if (($context["dynamic_filter_has_selection"] ?? null)) {
                // line 7
                yield "          <a href=\"";
                yield ($context["dynamic_filter_clear"] ?? null);
                yield "\" class=\"btn btn-sm btn-outline-secondary\">Clear</a>
        ";
            }
            // line 9
            yield "      </div>

      ";
            // line 11
            if (($context["sort"] ?? null)) {
                // line 12
                yield "        <input type=\"hidden\" name=\"sort\" value=\"";
                yield ($context["sort"] ?? null);
                yield "\"/>
      ";
            }
            // line 14
            yield "      ";
            if (($context["order"] ?? null)) {
                // line 15
                yield "        <input type=\"hidden\" name=\"order\" value=\"";
                yield ($context["order"] ?? null);
                yield "\"/>
      ";
            }
            // line 17
            yield "      ";
            if (($context["limit"] ?? null)) {
                // line 18
                yield "        <input type=\"hidden\" name=\"limit\" value=\"";
                yield ($context["limit"] ?? null);
                yield "\"/>
      ";
            }
            // line 20
            yield "
      ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["dynamic_filters"] ?? null), "attributes", [], "any", false, false, false, 21));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["attribute"]) {
                // line 22
                yield "        <div class=\"mb-3\">
          <strong class=\"d-block mb-2\">";
                // line 23
                yield CoreExtension::getAttribute($this->env, $this->source, $context["attribute"], "name", [], "any", false, false, false, 23);
                yield "</strong>
          ";
                // line 24
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["attribute"], "values", [], "any", false, false, false, 24));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                    // line 25
                    yield "            <div class=\"form-check\">
              <input class=\"form-check-input\" type=\"checkbox\" id=\"af-side-";
                    // line 26
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["attribute"], "id", [], "any", false, false, false, 26);
                    yield "-";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 26);
                    yield "\" name=\"af[";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["attribute"], "id", [], "any", false, false, false, 26);
                    yield "][]\" value=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 26);
                    yield "\"";
                    if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 26), ((CoreExtension::getAttribute($this->env, $this->source, ($context["attribute_filter"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["attribute"], "id", [], "any", false, false, false, 26), [], "array", true, true, false, 26)) ? (Twig\Extension\CoreExtension::default((($_v0 = ($context["attribute_filter"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, $context["attribute"], "id", [], "any", false, false, false, 26)] ?? null) : null), [])) : ([])))) {
                        yield " checked";
                    }
                    yield ">
              <label class=\"form-check-label\" for=\"af-side-";
                    // line 27
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["attribute"], "id", [], "any", false, false, false, 27);
                    yield "-";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 27);
                    yield "\">";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["value"], "label", [], "any", false, false, false, 27);
                    yield " (";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["value"], "total", [], "any", false, false, false, 27);
                    yield ")</label>
            </div>
          ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 30
                yield "        </div>
      ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['attribute'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            yield "
      ";
            // line 33
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["dynamic_filters"] ?? null), "options", [], "any", false, false, false, 33));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                // line 34
                yield "        <div class=\"mb-3\">
          <strong class=\"d-block mb-2\">";
                // line 35
                yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 35);
                yield "</strong>
          ";
                // line 36
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["option"], "values", [], "any", false, false, false, 36));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                    // line 37
                    yield "            <div class=\"form-check\">
              <input class=\"form-check-input\" type=\"checkbox\" id=\"of-side-";
                    // line 38
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "id", [], "any", false, false, false, 38);
                    yield "-";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 38);
                    yield "\" name=\"of[";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "id", [], "any", false, false, false, 38);
                    yield "][]\" value=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 38);
                    yield "\"";
                    if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 38), ((CoreExtension::getAttribute($this->env, $this->source, ($context["option_filter"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["option"], "id", [], "any", false, false, false, 38), [], "array", true, true, false, 38)) ? (Twig\Extension\CoreExtension::default((($_v1 = ($context["option_filter"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[CoreExtension::getAttribute($this->env, $this->source, $context["option"], "id", [], "any", false, false, false, 38)] ?? null) : null), [])) : ([])))) {
                        yield " checked";
                    }
                    yield ">
              <label class=\"form-check-label\" for=\"of-side-";
                    // line 39
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "id", [], "any", false, false, false, 39);
                    yield "-";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 39);
                    yield "\">";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["value"], "label", [], "any", false, false, false, 39);
                    yield " (";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["value"], "total", [], "any", false, false, false, 39);
                    yield ")</label>
            </div>
          ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 42
                yield "        </div>
      ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            yield "
      <button type=\"submit\" class=\"btn btn-primary btn-sm\">Apply</button>
    </div>
  </form>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "catalog/view/template/product/dynamic_filter.twig";
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
        return array (  288 => 44,  273 => 42,  250 => 39,  236 => 38,  233 => 37,  216 => 36,  212 => 35,  209 => 34,  192 => 33,  189 => 32,  174 => 30,  151 => 27,  137 => 26,  134 => 25,  117 => 24,  113 => 23,  110 => 22,  93 => 21,  90 => 20,  84 => 18,  81 => 17,  75 => 15,  72 => 14,  66 => 12,  64 => 11,  60 => 9,  54 => 7,  52 => 6,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if dynamic_filters.attributes or dynamic_filters.options %}
  <form action=\"{{ dynamic_filter_action }}\" method=\"get\" class=\"card mt-3\">
    <div class=\"card-body\">
      <div class=\"d-flex justify-content-between align-items-center mb-3\">
        <h5 class=\"mb-0\">Filters</h5>
        {% if dynamic_filter_has_selection %}
          <a href=\"{{ dynamic_filter_clear }}\" class=\"btn btn-sm btn-outline-secondary\">Clear</a>
        {% endif %}
      </div>

      {% if sort %}
        <input type=\"hidden\" name=\"sort\" value=\"{{ sort }}\"/>
      {% endif %}
      {% if order %}
        <input type=\"hidden\" name=\"order\" value=\"{{ order }}\"/>
      {% endif %}
      {% if limit %}
        <input type=\"hidden\" name=\"limit\" value=\"{{ limit }}\"/>
      {% endif %}

      {% for attribute in dynamic_filters.attributes %}
        <div class=\"mb-3\">
          <strong class=\"d-block mb-2\">{{ attribute.name }}</strong>
          {% for value in attribute.values %}
            <div class=\"form-check\">
              <input class=\"form-check-input\" type=\"checkbox\" id=\"af-side-{{ attribute.id }}-{{ loop.index }}\" name=\"af[{{ attribute.id }}][]\" value=\"{{ value.value }}\"{% if value.value in (attribute_filter[attribute.id]|default([])) %} checked{% endif %}>
              <label class=\"form-check-label\" for=\"af-side-{{ attribute.id }}-{{ loop.index }}\">{{ value.label }} ({{ value.total }})</label>
            </div>
          {% endfor %}
        </div>
      {% endfor %}

      {% for option in dynamic_filters.options %}
        <div class=\"mb-3\">
          <strong class=\"d-block mb-2\">{{ option.name }}</strong>
          {% for value in option.values %}
            <div class=\"form-check\">
              <input class=\"form-check-input\" type=\"checkbox\" id=\"of-side-{{ option.id }}-{{ loop.index }}\" name=\"of[{{ option.id }}][]\" value=\"{{ value.value }}\"{% if value.value in (option_filter[option.id]|default([])) %} checked{% endif %}>
              <label class=\"form-check-label\" for=\"of-side-{{ option.id }}-{{ loop.index }}\">{{ value.label }} ({{ value.total }})</label>
            </div>
          {% endfor %}
        </div>
      {% endfor %}

      <button type=\"submit\" class=\"btn btn-primary btn-sm\">Apply</button>
    </div>
  </form>
{% endif %}
", "catalog/view/template/product/dynamic_filter.twig", "/Applications/MAMP/htdocs/catalog/view/template/product/dynamic_filter.twig");
    }
}
