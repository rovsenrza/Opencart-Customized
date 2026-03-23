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

/* catalog/view/template/sections/bloglar.twig */
class __TwigTemplate_f0fe5cc111270ed2fa2e4c196e98c34c extends Template
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
        yield "<section class=\"home-section home-section-bloglar\">
  <div class=\"section-head d-flex align-items-center justify-content-between\">
    <h2>";
        // line 5
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "headline", [], "any", false, false, false, 5)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "headline", [], "any", false, false, false, 5)) : ("Bloglar"));
        yield "</h2>
    ";
        // line 6
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["links"] ?? null), "view_all", [], "any", false, false, false, 6)) {
            // line 7
            yield "      <a href=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["links"] ?? null), "view_all", [], "any", false, false, false, 7);
            yield "\" class=\"view-all-link\">";
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["links"] ?? null), "view_all_text", [], "any", false, false, false, 7)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["links"] ?? null), "view_all_text", [], "any", false, false, false, 7)) : ("Hamısına bax"));
            yield "</a>
    ";
        }
        // line 9
        yield "  </div>

  ";
        // line 11
        if (($context["articles"] ?? null)) {
            // line 12
            yield "    <div class=\"row g-4\">
      ";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["articles"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 14
                yield "        <div class=\"col-12 col-md-6 col-lg-4\">
          <article class=\"card h-100 border-0\">
            <a href=\"";
                // line 16
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "href", [], "any", false, false, false, 16);
                yield "\">
              <img src=\"";
                // line 17
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["article"], "image", [], "any", false, false, false, 17)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["article"], "image", [], "any", false, false, false, 17)) : ("image/catalog/Screenshot 2026-03-23 at 5.15.41 PM.png"));
                yield "\" alt=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "name", [], "any", false, false, false, 17);
                yield "\" class=\"card-img-top w-100\"/>
            </a>
            <div class=\"card-body\">
              <h3 class=\"h5 card-title\"><a href=\"";
                // line 20
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "href", [], "any", false, false, false, 20);
                yield "\">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "name", [], "any", false, false, false, 20);
                yield "</a></h3>
              ";
                // line 21
                if (CoreExtension::getAttribute($this->env, $this->source, $context["article"], "date_added", [], "any", false, false, false, 21)) {
                    // line 22
                    yield "                <small class=\"text-muted d-block mb-2\">";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "date_added", [], "any", false, false, false, 22);
                    yield "</small>
              ";
                }
                // line 24
                yield "              ";
                if (CoreExtension::getAttribute($this->env, $this->source, $context["article"], "description", [], "any", false, false, false, 24)) {
                    // line 25
                    yield "                <p class=\"card-text\">";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "description", [], "any", false, false, false, 25);
                    yield "</p>
              ";
                }
                // line 27
                yield "            </div>
          </article>
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['article'], $context['_parent']);
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
        return "catalog/view/template/sections/bloglar.twig";
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
        return array (  125 => 33,  121 => 31,  112 => 27,  106 => 25,  103 => 24,  97 => 22,  95 => 21,  89 => 20,  81 => 17,  77 => 16,  73 => 14,  69 => 13,  66 => 12,  64 => 11,  60 => 9,  52 => 7,  50 => 6,  46 => 5,  42 => 3,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Auto-generated by Homepage Section Builder v2. #}
{# section_type: blog #}
<section class=\"home-section home-section-bloglar\">
  <div class=\"section-head d-flex align-items-center justify-content-between\">
    <h2>{{ fields.headline ?: 'Bloglar' }}</h2>
    {% if links.view_all %}
      <a href=\"{{ links.view_all }}\" class=\"view-all-link\">{{ links.view_all_text ?: 'Hamısına bax' }}</a>
    {% endif %}
  </div>

  {% if articles %}
    <div class=\"row g-4\">
      {% for article in articles %}
        <div class=\"col-12 col-md-6 col-lg-4\">
          <article class=\"card h-100 border-0\">
            <a href=\"{{ article.href }}\">
              <img src=\"{{ article.image ?: 'image/catalog/Screenshot 2026-03-23 at 5.15.41 PM.png' }}\" alt=\"{{ article.name }}\" class=\"card-img-top w-100\"/>
            </a>
            <div class=\"card-body\">
              <h3 class=\"h5 card-title\"><a href=\"{{ article.href }}\">{{ article.name }}</a></h3>
              {% if article.date_added %}
                <small class=\"text-muted d-block mb-2\">{{ article.date_added }}</small>
              {% endif %}
              {% if article.description %}
                <p class=\"card-text\">{{ article.description }}</p>
              {% endif %}
            </div>
          </article>
        </div>
      {% endfor %}
    </div>
  {% endif %}
</section>
", "catalog/view/template/sections/bloglar.twig", "/Applications/MAMP/htdocs/catalog/view/template/sections/bloglar.twig");
    }
}
