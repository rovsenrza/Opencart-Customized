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

/* admin/view/template/common/login.twig */
class __TwigTemplate_b64e9cf4e5f388f7c84b6f62c2eb34f0 extends Template
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
<div id=\"content\" class=\"oc-admin-page oc-page-login\">
  <div class=\"container-fluid oc-auth-shell\">
    <div class=\"row justify-content-center py-4 py-lg-5\">
      <div class=\"col-12 col-sm-10 col-md-8 col-lg-5\">
        <div class=\"card\">
          <div class=\"card-header\"><i class=\"fa-solid fa-lock\"></i> ";
        // line 7
        yield ($context["text_login"] ?? null);
        yield "</div>
          <div class=\"card-body\">
            <form id=\"form-login\" action=\"";
        // line 9
        yield ($context["login"] ?? null);
        yield "\" method=\"post\" data-oc-toggle=\"ajax\">
              ";
        // line 10
        if (($context["error_warning"] ?? null)) {
            // line 11
            yield "                <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ";
            yield ($context["error_warning"] ?? null);
            yield " <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>
              ";
        }
        // line 13
        yield "              ";
        if (($context["success"] ?? null)) {
            // line 14
            yield "                <div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ";
            yield ($context["success"] ?? null);
            yield " <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>
              ";
        }
        // line 16
        yield "              <div class=\"mb-3\">
                <label for=\"input-username\" class=\"form-label\">";
        // line 17
        yield ($context["entry_username"] ?? null);
        yield "</label>
                <div class=\"input-group\">
                  <div class=\"input-group-text\"><i class=\"fa-solid fa-user\"></i></div>
                  <input type=\"text\" name=\"username\" value=\"\" placeholder=\"";
        // line 20
        yield ($context["entry_username"] ?? null);
        yield "\" id=\"input-username\" class=\"form-control\"/>
                </div>
              </div>
              <div class=\"mb-3\">
                <label for=\"input-password\" class=\"form-label\">";
        // line 24
        yield ($context["entry_password"] ?? null);
        yield "</label>
                <div class=\"input-group mb-2\">
                  <div class=\"input-group-text\"><i class=\"fa-solid fa-lock\"></i></div>
                  <input type=\"password\" name=\"password\" value=\"\" placeholder=\"";
        // line 27
        yield ($context["entry_password"] ?? null);
        yield "\" id=\"input-password\" class=\"form-control\"/>
                </div>
                ";
        // line 29
        if (($context["forgotten"] ?? null)) {
            // line 30
            yield "                <div class=\"mb-3\"><a href=\"";
            yield ($context["forgotten"] ?? null);
            yield "\">";
            yield ($context["text_forgotten"] ?? null);
            yield "</a></div>
                ";
        }
        // line 32
        yield "              </div>
              <div class=\"text-end\">
                <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa-solid fa-key\"></i> ";
        // line 34
        yield ($context["button_login"] ?? null);
        yield "</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
";
        // line 43
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
        return "admin/view/template/common/login.twig";
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
        return array (  130 => 43,  118 => 34,  114 => 32,  106 => 30,  104 => 29,  99 => 27,  93 => 24,  86 => 20,  80 => 17,  77 => 16,  71 => 14,  68 => 13,  62 => 11,  60 => 10,  56 => 9,  51 => 7,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ header }}
<div id=\"content\" class=\"oc-admin-page oc-page-login\">
  <div class=\"container-fluid oc-auth-shell\">
    <div class=\"row justify-content-center py-4 py-lg-5\">
      <div class=\"col-12 col-sm-10 col-md-8 col-lg-5\">
        <div class=\"card\">
          <div class=\"card-header\"><i class=\"fa-solid fa-lock\"></i> {{ text_login }}</div>
          <div class=\"card-body\">
            <form id=\"form-login\" action=\"{{ login }}\" method=\"post\" data-oc-toggle=\"ajax\">
              {% if error_warning %}
                <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> {{ error_warning }} <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>
              {% endif %}
              {% if success %}
                <div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> {{ success }} <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>
              {% endif %}
              <div class=\"mb-3\">
                <label for=\"input-username\" class=\"form-label\">{{ entry_username }}</label>
                <div class=\"input-group\">
                  <div class=\"input-group-text\"><i class=\"fa-solid fa-user\"></i></div>
                  <input type=\"text\" name=\"username\" value=\"\" placeholder=\"{{ entry_username }}\" id=\"input-username\" class=\"form-control\"/>
                </div>
              </div>
              <div class=\"mb-3\">
                <label for=\"input-password\" class=\"form-label\">{{ entry_password }}</label>
                <div class=\"input-group mb-2\">
                  <div class=\"input-group-text\"><i class=\"fa-solid fa-lock\"></i></div>
                  <input type=\"password\" name=\"password\" value=\"\" placeholder=\"{{ entry_password }}\" id=\"input-password\" class=\"form-control\"/>
                </div>
                {% if forgotten %}
                <div class=\"mb-3\"><a href=\"{{ forgotten }}\">{{ text_forgotten }}</a></div>
                {% endif %}
              </div>
              <div class=\"text-end\">
                <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa-solid fa-key\"></i> {{ button_login }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{ footer }}
", "admin/view/template/common/login.twig", "/Applications/MAMP/htdocs/admin/view/template/common/login.twig");
    }
}
