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

/* admin/view/template/extension/marketplace.twig */
class __TwigTemplate_9217a207a29691319723bb0bd569d0e7 extends Template
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
        yield ($context["promotion"] ?? null);
        yield "
<fieldset>
  <legend>";
        // line 3
        yield ($context["heading_title"] ?? null);
        yield "</legend>
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <th>";
        // line 8
        yield ($context["column_name"] ?? null);
        yield "</th>
          <th>";
        // line 9
        yield ($context["column_status"] ?? null);
        yield "</th>
          <th class=\"text-end\">";
        // line 10
        yield ($context["column_action"] ?? null);
        yield "</th>
        </tr>
      </thead>
      <tbody>
        ";
        // line 14
        if (($context["extensions"] ?? null)) {
            // line 15
            yield "          ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["extensions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                // line 16
                yield "            <tr>
              <td>";
                // line 17
                yield CoreExtension::getAttribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 17);
                yield "</td>
              <td>";
                // line 18
                yield CoreExtension::getAttribute($this->env, $this->source, $context["extension"], "status", [], "any", false, false, false, 18);
                yield "</td>
              <td class=\"text-end text-nowrap\">

                ";
                // line 21
                if (CoreExtension::getAttribute($this->env, $this->source, $context["extension"], "installed", [], "any", false, false, false, 21)) {
                    // line 22
                    yield "                  <a href=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["extension"], "edit", [], "any", false, false, false, 22);
                    yield "\" data-bs-toggle=\"tooltip\" title=\"";
                    yield ($context["button_edit"] ?? null);
                    yield "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a>
                ";
                } else {
                    // line 24
                    yield "                  <button type=\"button\" class=\"btn btn-primary\" disabled=\"disabled\"><i class=\"fa-solid fa-pencil\"></i></button>
                ";
                }
                // line 26
                yield "
                ";
                // line 27
                if ( !CoreExtension::getAttribute($this->env, $this->source, $context["extension"], "installed", [], "any", false, false, false, 27)) {
                    // line 28
                    yield "                  <a href=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["extension"], "install", [], "any", false, false, false, 28);
                    yield "\" data-bs-toggle=\"tooltip\" title=\"";
                    yield ($context["button_install"] ?? null);
                    yield "\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></a>
                ";
                } else {
                    // line 30
                    yield "                  <a href=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["extension"], "uninstall", [], "any", false, false, false, 30);
                    yield "\" data-bs-toggle=\"tooltip\" title=\"";
                    yield ($context["button_uninstall"] ?? null);
                    yield "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></a>
                ";
                }
                // line 31
                yield "</td>

            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['extension'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            yield "        ";
        } else {
            // line 36
            yield "          <tr>
            <td class=\"text-center\" colspan=\"3\">";
            // line 37
            yield ($context["text_no_results"] ?? null);
            yield "</td>
          </tr>
        ";
        }
        // line 40
        yield "      </tbody>
    </table>
  </div>
</fieldset>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/view/template/extension/marketplace.twig";
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
        return array (  146 => 40,  140 => 37,  137 => 36,  134 => 35,  125 => 31,  117 => 30,  109 => 28,  107 => 27,  104 => 26,  100 => 24,  92 => 22,  90 => 21,  84 => 18,  80 => 17,  77 => 16,  72 => 15,  70 => 14,  63 => 10,  59 => 9,  55 => 8,  47 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ promotion }}
<fieldset>
  <legend>{{ heading_title }}</legend>
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <th>{{ column_name }}</th>
          <th>{{ column_status }}</th>
          <th class=\"text-end\">{{ column_action }}</th>
        </tr>
      </thead>
      <tbody>
        {% if extensions %}
          {% for extension in extensions %}
            <tr>
              <td>{{ extension.name }}</td>
              <td>{{ extension.status }}</td>
              <td class=\"text-end text-nowrap\">

                {% if extension.installed %}
                  <a href=\"{{ extension.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a>
                {% else %}
                  <button type=\"button\" class=\"btn btn-primary\" disabled=\"disabled\"><i class=\"fa-solid fa-pencil\"></i></button>
                {% endif %}

                {% if not extension.installed %}
                  <a href=\"{{ extension.install }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_install }}\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></a>
                {% else %}
                  <a href=\"{{ extension.uninstall }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_uninstall }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></a>
                {% endif %}</td>

            </tr>
          {% endfor %}
        {% else %}
          <tr>
            <td class=\"text-center\" colspan=\"3\">{{ text_no_results }}</td>
          </tr>
        {% endif %}
      </tbody>
    </table>
  </div>
</fieldset>
", "admin/view/template/extension/marketplace.twig", "/Applications/MAMP/htdocs/admin/view/template/extension/marketplace.twig");
    }
}
