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

/* catalog/view/template/cms/blog.twig */
class __TwigTemplate_e256632bb5c0eb78bac5e53288c272b3 extends Template
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
      ";
        // line 13
        if (($context["image"] ?? null)) {
            // line 14
            yield "        <img src=\"";
            yield ($context["image"] ?? null);
            yield "\" alt=\"";
            yield ($context["heading_title"] ?? null);
            yield "\" title=\"";
            yield ($context["heading_title"] ?? null);
            yield "\" class=\"img-fluid cms-original-image mb-3\"/>
      ";
        }
        // line 16
        yield "      ";
        if (($context["description"] ?? null)) {
            // line 17
            yield "        <div class=\"mb-3\">";
            yield ($context["description"] ?? null);
            yield "</div>
      ";
        }
        // line 19
        yield "      <hr/>
      
      ";
        // line 21
        if (($context["topics"] ?? null)) {
            // line 22
            yield "        <div class=\"input-group dropdown mb-3\">
          <select name=\"topic_id\" id=\"input-topic\" class=\"form-select\">
            <option value=\"\">";
            // line 24
            yield ($context["text_all"] ?? null);
            yield "</option>
            ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["topics"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["topic"]) {
                // line 26
                yield "              <option value=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["topic"], "topic_id", [], "any", false, false, false, 26);
                yield "\"";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["topic"], "topic_id", [], "any", false, false, false, 26) == ($context["topic_id"] ?? null))) {
                    yield " selected";
                }
                yield ">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["topic"], "name", [], "any", false, false, false, 26);
                yield "</option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['topic'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            yield "          </select>
        </div>
      ";
        }
        // line 31
        yield "      ";
        if (($context["articles"] ?? null)) {
            // line 32
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["articles"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 33
                yield "          <div class=\"mb-3\">
            <h2><a href=\"";
                // line 34
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "href", [], "any", false, false, false, 34);
                yield "\">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "name", [], "any", false, false, false, 34);
                yield "</a></h2>
            ";
                // line 35
                if (CoreExtension::getAttribute($this->env, $this->source, $context["article"], "image", [], "any", false, false, false, 35)) {
                    // line 36
                    yield "              <div><a href=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "href", [], "any", false, false, false, 36);
                    yield "\"><img src=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "image", [], "any", false, false, false, 36);
                    yield "\" title=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "name", [], "any", false, false, false, 36);
                    yield "\" alt=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "name", [], "any", false, false, false, 36);
                    yield "\" class=\"img-fluid cms-original-image mb-1\"/></a></div>
            ";
                }
                // line 38
                yield "            <ul class=\"list-inline\">
              <li class=\"list-inline-item\">";
                // line 39
                yield ($context["text_by"] ?? null);
                yield " <a href=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "filter_author", [], "any", false, false, false, 39);
                yield "\">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "author", [], "any", false, false, false, 39);
                yield "</a></li>
              <li class=\"list-inline-item\">";
                // line 40
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "date_added", [], "any", false, false, false, 40);
                yield "</li>
              <li class=\"list-inline-item\">";
                // line 41
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "comment_total", [], "any", false, false, false, 41);
                yield " ";
                yield ($context["text_comment"] ?? null);
                yield "</li>
            </ul>
            <p class=\"mb-3\">";
                // line 43
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "description", [], "any", false, false, false, 43);
                yield "</p>
            <div class=\"text-end\"><a href=\"";
                // line 44
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "href", [], "any", false, false, false, 44);
                yield "\" class=\"btn btn-primary\">";
                yield ($context["button_continue"] ?? null);
                yield "</a></div>
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['article'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            yield "        <div class=\"row\">
          <div class=\"col-sm-6 text-start\">";
            // line 48
            yield ($context["pagination"] ?? null);
            yield "</div>
          <div class=\"col-sm-6 text-end\">";
            // line 49
            yield ($context["results"] ?? null);
            yield "</div>
        </div>
      ";
        } else {
            // line 52
            yield "        <p class=\"text-center\">";
            yield ($context["text_no_results"] ?? null);
            yield "</p>
      ";
        }
        // line 54
        yield "      ";
        yield ($context["content_bottom"] ?? null);
        yield "
    </div>
    ";
        // line 56
        yield ($context["column_right"] ?? null);
        yield "
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('#input-topic').on('change', function() {
    url = 'index.php?route=cms/blog&language=";
        // line 61
        yield ($context["language"] ?? null);
        yield "';

    var topic_id = \$('#input-topic').prop('value');

    if (topic_id > 0) {
        url += '&topic_id=' + topic_id;
    }

    location = url;
});
//--></script>
";
        // line 72
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
        return "catalog/view/template/cms/blog.twig";
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
        return array (  254 => 72,  240 => 61,  232 => 56,  226 => 54,  220 => 52,  214 => 49,  210 => 48,  207 => 47,  196 => 44,  192 => 43,  185 => 41,  181 => 40,  173 => 39,  170 => 38,  158 => 36,  156 => 35,  150 => 34,  147 => 33,  142 => 32,  139 => 31,  134 => 28,  119 => 26,  115 => 25,  111 => 24,  107 => 22,  105 => 21,  101 => 19,  95 => 17,  92 => 16,  82 => 14,  80 => 13,  76 => 12,  72 => 11,  67 => 9,  63 => 7,  52 => 5,  48 => 4,  42 => 1,);
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
  <div class=\"row\">
    {{ column_left }}
    <div id=\"content\" class=\"col\">
      {{ content_top }}
      <h1>{{ heading_title }}</h1>
      {% if image %}
        <img src=\"{{ image }}\" alt=\"{{ heading_title }}\" title=\"{{ heading_title }}\" class=\"img-fluid cms-original-image mb-3\"/>
      {% endif %}
      {% if description %}
        <div class=\"mb-3\">{{ description }}</div>
      {% endif %}
      <hr/>
      
      {% if topics %}
        <div class=\"input-group dropdown mb-3\">
          <select name=\"topic_id\" id=\"input-topic\" class=\"form-select\">
            <option value=\"\">{{ text_all }}</option>
            {% for topic in topics %}
              <option value=\"{{ topic.topic_id }}\"{% if topic.topic_id == topic_id %} selected{% endif %}>{{ topic.name }}</option>
            {% endfor %}
          </select>
        </div>
      {% endif %}
      {% if articles %}
        {% for article in articles %}
          <div class=\"mb-3\">
            <h2><a href=\"{{ article.href }}\">{{ article.name }}</a></h2>
            {% if article.image %}
              <div><a href=\"{{ article.href }}\"><img src=\"{{ article.image }}\" title=\"{{ article.name }}\" alt=\"{{ article.name }}\" class=\"img-fluid cms-original-image mb-1\"/></a></div>
            {% endif %}
            <ul class=\"list-inline\">
              <li class=\"list-inline-item\">{{ text_by }} <a href=\"{{ article.filter_author }}\">{{ article.author }}</a></li>
              <li class=\"list-inline-item\">{{ article.date_added }}</li>
              <li class=\"list-inline-item\">{{ article.comment_total }} {{ text_comment }}</li>
            </ul>
            <p class=\"mb-3\">{{ article.description }}</p>
            <div class=\"text-end\"><a href=\"{{ article.href }}\" class=\"btn btn-primary\">{{ button_continue }}</a></div>
          </div>
        {% endfor %}
        <div class=\"row\">
          <div class=\"col-sm-6 text-start\">{{ pagination }}</div>
          <div class=\"col-sm-6 text-end\">{{ results }}</div>
        </div>
      {% else %}
        <p class=\"text-center\">{{ text_no_results }}</p>
      {% endif %}
      {{ content_bottom }}
    </div>
    {{ column_right }}
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('#input-topic').on('change', function() {
    url = 'index.php?route=cms/blog&language={{ language }}';

    var topic_id = \$('#input-topic').prop('value');

    if (topic_id > 0) {
        url += '&topic_id=' + topic_id;
    }

    location = url;
});
//--></script>
{{ footer }}
", "catalog/view/template/cms/blog.twig", "/Applications/MAMP/htdocs/catalog/view/template/cms/blog.twig");
    }
}
