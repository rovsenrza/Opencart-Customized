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

/* admin/view/template/cms/article_form.twig */
class __TwigTemplate_1cbc36fbddf58cde1215e71f4d77b9ec extends Template
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
        yield ($context["column_left"] ?? null);
        yield "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\"><button type=\"submit\" form=\"form-article\" data-bs-toggle=\"tooltip\" title=\"";
        // line 5
        yield ($context["button_save"] ?? null);
        yield "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"";
        // line 6
        yield ($context["back"] ?? null);
        yield "\" data-bs-toggle=\"tooltip\" title=\"";
        yield ($context["button_back"] ?? null);
        yield "\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a>
      </div>
      <h1>";
        // line 8
        yield ($context["heading_title"] ?? null);
        yield "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            yield "          <li class=\"breadcrumb-item\"><a href=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            yield "\">";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            yield "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['breadcrumb'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        yield "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 18
        yield ($context["text_form"] ?? null);
        yield "</div>
      <div class=\"card-body\">
        <form id=\"form-article\" action=\"";
        // line 20
        yield ($context["save"] ?? null);
        yield "\" method=\"post\" data-oc-toggle=\"ajax\">
          <ul class=\"nav nav-tabs\">
            <li class=\"nav-item\"><a href=\"#tab-general\" data-bs-toggle=\"tab\" class=\"nav-link active\">";
        // line 22
        yield ($context["tab_general"] ?? null);
        yield "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-data\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 23
        yield ($context["tab_data"] ?? null);
        yield "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-seo\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 24
        yield ($context["tab_seo"] ?? null);
        yield "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-design\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 25
        yield ($context["tab_design"] ?? null);
        yield "</a></li>
          </ul>
          <div class=\"tab-content\">
            <div id=\"tab-general\" class=\"tab-pane active\">
              <ul class=\"nav nav-tabs\">
                ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["languages"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 31
            yield "                  <li class=\"nav-item\"><a href=\"#language-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 31);
            yield "\" data-bs-toggle=\"tab\" class=\"nav-link";
            if (CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 31)) {
                yield " active";
            }
            yield "\"><img src=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 31);
            yield "\" title=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 31);
            yield "\"/> ";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 31);
            yield "</a></li>
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
        unset($context['_seq'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        yield "              </ul>
              <div class=\"tab-content\">
                ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["languages"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 36
            yield "                  <div id=\"language-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 36);
            yield "\" class=\"tab-pane";
            if (CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 36)) {
                yield " active";
            }
            yield "\">
                    <div class=\"row mb-3 required\">
                      <label for=\"input-name-";
            // line 38
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 38);
            yield "\" class=\"col-sm-2 col-form-label\">";
            yield ($context["entry_name"] ?? null);
            yield "</label>
                      <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"article_description[";
            // line 40
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 40);
            yield "][name]\" value=\"";
            yield (((($_v0 = ($context["article_description"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 40)] ?? null) : null)) ? (CoreExtension::getAttribute($this->env, $this->source, (($_v1 = ($context["article_description"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 40)] ?? null) : null), "name", [], "any", false, false, false, 40)) : (""));
            yield "\" placeholder=\"";
            yield ($context["entry_name"] ?? null);
            yield "\" id=\"input-name-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 40);
            yield "\" class=\"form-control\"/>
                        <div id=\"error-name-";
            // line 41
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 41);
            yield "\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-description-";
            // line 45
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 45);
            yield "\" class=\"col-sm-2 col-form-label\">";
            yield ($context["entry_description"] ?? null);
            yield "</label>
                      <div class=\"col-sm-10\">
                        <textarea name=\"article_description[";
            // line 47
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 47);
            yield "][description]\" placeholder=\"";
            yield ($context["entry_description"] ?? null);
            yield "\" id=\"input-description-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 47);
            yield "\" data-oc-toggle=\"ckeditor\" data-lang=\"";
            yield ($context["ckeditor"] ?? null);
            yield "\" class=\"form-control\">";
            yield (((($_v2 = ($context["article_description"] ?? null)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 47)] ?? null) : null)) ? (CoreExtension::getAttribute($this->env, $this->source, (($_v3 = ($context["article_description"] ?? null)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 47)] ?? null) : null), "description", [], "any", false, false, false, 47)) : (""));
            yield "</textarea>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label class=\"col-sm-2 col-form-label\">";
            // line 51
            yield ($context["entry_image"] ?? null);
            yield "</label>
                      <div class=\"col-sm-10\">
                        <div class=\"border rounded d-block\" style=\"max-width: 300px;\">
                          <img src=\"";
            // line 54
            yield (((($_v4 = ($context["article_description"] ?? null)) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 54)] ?? null) : null)) ? (CoreExtension::getAttribute($this->env, $this->source, (($_v5 = ($context["article_description"] ?? null)) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 54)] ?? null) : null), "thumb", [], "any", false, false, false, 54)) : (($context["placeholder"] ?? null)));
            yield "\" alt=\"\" title=\"\" id=\"thumb-image-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 54);
            yield "\" data-oc-placeholder=\"";
            yield ($context["placeholder"] ?? null);
            yield "\" class=\"img-fluid\"/>
                          <input type=\"hidden\" name=\"article_description[";
            // line 55
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 55);
            yield "][image]\" value=\"";
            yield (((($_v6 = ($context["article_description"] ?? null)) && is_array($_v6) || $_v6 instanceof ArrayAccess ? ($_v6[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 55)] ?? null) : null)) ? (CoreExtension::getAttribute($this->env, $this->source, (($_v7 = ($context["article_description"] ?? null)) && is_array($_v7) || $_v7 instanceof ArrayAccess ? ($_v7[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 55)] ?? null) : null), "image", [], "any", false, false, false, 55)) : (""));
            yield "\" id=\"input-image-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 55);
            yield "\"/>
                          <div class=\"d-grid\">
                            <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image-";
            // line 57
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 57);
            yield "\" data-oc-thumb=\"#thumb-image-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 57);
            yield "\" class=\"btn btn-primary rounded-0\"><i class=\"fa-solid fa-pencil\"></i> ";
            yield ($context["button_edit"] ?? null);
            yield "</button>
                            <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image-";
            // line 58
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 58);
            yield "\" data-oc-thumb=\"#thumb-image-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 58);
            yield "\" class=\"btn btn-warning rounded-0\"><i class=\"fa-regular fa-trash-can\"></i> ";
            yield ($context["button_clear"] ?? null);
            yield "</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-tag-";
            // line 64
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 64);
            yield "\" class=\"col-sm-2 col-form-label\">";
            yield ($context["entry_tag"] ?? null);
            yield "</label>
                      <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"article_description[";
            // line 66
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 66);
            yield "][tag]\" value=\"";
            yield (((($_v8 = ($context["article_description"] ?? null)) && is_array($_v8) || $_v8 instanceof ArrayAccess ? ($_v8[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 66)] ?? null) : null)) ? (CoreExtension::getAttribute($this->env, $this->source, (($_v9 = ($context["article_description"] ?? null)) && is_array($_v9) || $_v9 instanceof ArrayAccess ? ($_v9[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 66)] ?? null) : null), "tag", [], "any", false, false, false, 66)) : (""));
            yield "\" placeholder=\"";
            yield ($context["entry_tag"] ?? null);
            yield "\" id=\"input-tag-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 66);
            yield "\" class=\"form-control\"/>
                        <div id=\"error-tag-";
            // line 67
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 67);
            yield "\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3 required\">
                      <label for=\"input-meta-title-";
            // line 71
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 71);
            yield "\" class=\"col-sm-2 col-form-label\">";
            yield ($context["entry_meta_title"] ?? null);
            yield "</label>
                      <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"article_description[";
            // line 73
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 73);
            yield "][meta_title]\" value=\"";
            yield (((($_v10 = ($context["article_description"] ?? null)) && is_array($_v10) || $_v10 instanceof ArrayAccess ? ($_v10[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 73)] ?? null) : null)) ? (CoreExtension::getAttribute($this->env, $this->source, (($_v11 = ($context["article_description"] ?? null)) && is_array($_v11) || $_v11 instanceof ArrayAccess ? ($_v11[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 73)] ?? null) : null), "meta_title", [], "any", false, false, false, 73)) : (""));
            yield "\" placeholder=\"";
            yield ($context["entry_meta_title"] ?? null);
            yield "\" id=\"input-meta-title-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 73);
            yield "\" class=\"form-control\"/>
                        <div id=\"error-meta-title-";
            // line 74
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 74);
            yield "\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-meta-description-";
            // line 78
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 78);
            yield "\" class=\"col-sm-2 col-form-label\">";
            yield ($context["entry_meta_description"] ?? null);
            yield "</label>
                      <div class=\"col-sm-10\">
                        <textarea name=\"article_description[";
            // line 80
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 80);
            yield "][meta_description]\" rows=\"5\" placeholder=\"";
            yield ($context["entry_meta_description"] ?? null);
            yield "\" id=\"input-meta-description-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 80);
            yield "\" class=\"form-control\">";
            yield (((($_v12 = ($context["article_description"] ?? null)) && is_array($_v12) || $_v12 instanceof ArrayAccess ? ($_v12[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 80)] ?? null) : null)) ? (CoreExtension::getAttribute($this->env, $this->source, (($_v13 = ($context["article_description"] ?? null)) && is_array($_v13) || $_v13 instanceof ArrayAccess ? ($_v13[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 80)] ?? null) : null), "meta_description", [], "any", false, false, false, 80)) : (""));
            yield "</textarea>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-meta-keyword-";
            // line 84
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 84);
            yield "\" class=\"col-sm-2 col-form-label\">";
            yield ($context["entry_meta_keyword"] ?? null);
            yield "</label>
                      <div class=\"col-sm-10\">
                        <textarea name=\"article_description[";
            // line 86
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 86);
            yield "][meta_keyword]\" rows=\"5\" placeholder=\"";
            yield ($context["entry_meta_keyword"] ?? null);
            yield "\" id=\"input-meta-keyword-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 86);
            yield "\" class=\"form-control\">";
            yield (((($_v14 = ($context["article_description"] ?? null)) && is_array($_v14) || $_v14 instanceof ArrayAccess ? ($_v14[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 86)] ?? null) : null)) ? (CoreExtension::getAttribute($this->env, $this->source, (($_v15 = ($context["article_description"] ?? null)) && is_array($_v15) || $_v15 instanceof ArrayAccess ? ($_v15[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 86)] ?? null) : null), "meta_keyword", [], "any", false, false, false, 86)) : (""));
            yield "</textarea>
                      </div>
                    </div>
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
        unset($context['_seq'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        yield "              </div>
            </div>
            <div id=\"tab-data\" class=\"tab-pane\">
              <div class=\"row mb-3 required\">
                <label for=\"input-author\" class=\"col-sm-2 col-form-label\">";
        // line 95
        yield ($context["entry_author"] ?? null);
        yield "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"author\" value=\"";
        // line 97
        yield ($context["author"] ?? null);
        yield "\" placeholder=\"";
        yield ($context["entry_author"] ?? null);
        yield "\" id=\"input-author\" class=\"form-control\"/>
                  <div id=\"error-author\" class=\"invalid-feedback\"></div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-topic\" class=\"col-sm-2 col-form-label\">";
        // line 102
        yield ($context["entry_topic"] ?? null);
        yield "</label>
                <div class=\"col-sm-10\">
                  <select name=\"topic_id\" id=\"input-topic\" class=\"form-select\">
                    <option value=\"0\">";
        // line 105
        yield ($context["text_none"] ?? null);
        yield "</option>
                    ";
        // line 106
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["topics"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["topic"]) {
            // line 107
            yield "                      <option value=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["topic"], "topic_id", [], "any", false, false, false, 107);
            yield "\"";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["topic"], "topic_id", [], "any", false, false, false, 107) == ($context["topic_id"] ?? null))) {
                yield " selected";
            }
            yield ">";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["topic"], "name", [], "any", false, false, false, 107);
            yield "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['topic'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 109
        yield "                  </select>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">";
        // line 113
        yield ($context["entry_store"] ?? null);
        yield "</label>
                <div class=\"col-sm-10\">
                  <div class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    ";
        // line 116
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 117
            yield "                      <div class=\"form-check\">
                        <input type=\"checkbox\" name=\"article_store[]\" value=\"";
            // line 118
            yield CoreExtension::getAttribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 118);
            yield "\" id=\"input-store-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 118);
            yield "\" class=\"form-check-input\"";
            if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 118), ($context["article_store"] ?? null))) {
                yield " checked";
            }
            yield "/> <label for=\"input-store-";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 118);
            yield "\" class=\"form-check-label\">";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 118);
            yield "</label>
                      </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['store'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        yield "                  </div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">";
        // line 125
        yield ($context["entry_status"] ?? null);
        yield "</label>
                <div class=\"col-sm-10\">
                  <div class=\"form-check form-switch form-switch-lg\">
                    <input type=\"hidden\" name=\"status\" value=\"0\"/>
                    <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"";
        // line 129
        if (($context["status"] ?? null)) {
            yield " checked";
        }
        yield "/>
                  </div>
                </div>
              </div>
            </div>
            <div id=\"tab-seo\" class=\"tab-pane\">
              <div class=\"alert alert-info\"><i class=\"fa-solid fa-info-circle\"></i> ";
        // line 135
        yield ($context["text_keyword"] ?? null);
        yield "</div>
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <th>";
        // line 140
        yield ($context["entry_store"] ?? null);
        yield "</th>
                      <th>";
        // line 141
        yield ($context["entry_keyword"] ?? null);
        yield "</th>
                    </tr>
                  </thead>
                  <tbody>
                    ";
        // line 145
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 146
            yield "                      <tr>
                        <td>";
            // line 147
            yield CoreExtension::getAttribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 147);
            yield "</td>
                        <td>
                          ";
            // line 149
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["languages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 150
                yield "                            <div class=\"input-group\">
                              <div class=\"input-group-text\"><img src=\"";
                // line 151
                yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 151);
                yield "\" title=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 151);
                yield "\"/></div>
                              <input type=\"text\" name=\"article_seo_url[";
                // line 152
                yield CoreExtension::getAttribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 152);
                yield "][";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 152);
                yield "]\" value=\"";
                if ((($_v16 = (($_v17 = ($context["article_seo_url"] ?? null)) && is_array($_v17) || $_v17 instanceof ArrayAccess ? ($_v17[CoreExtension::getAttribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 152)] ?? null) : null)) && is_array($_v16) || $_v16 instanceof ArrayAccess ? ($_v16[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 152)] ?? null) : null)) {
                    yield (($_v18 = (($_v19 = ($context["article_seo_url"] ?? null)) && is_array($_v19) || $_v19 instanceof ArrayAccess ? ($_v19[CoreExtension::getAttribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 152)] ?? null) : null)) && is_array($_v18) || $_v18 instanceof ArrayAccess ? ($_v18[CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 152)] ?? null) : null);
                }
                yield "\" placeholder=\"";
                yield ($context["entry_keyword"] ?? null);
                yield "\" id=\"input-keyword-";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 152);
                yield "-";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 152);
                yield "\" class=\"form-control\"/>
                            </div>
                            <div id=\"error-keyword-";
                // line 154
                yield CoreExtension::getAttribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 154);
                yield "-";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 154);
                yield "\" class=\"invalid-feedback\"></div>
                          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['language'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 155
            yield "</td>
                      </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['store'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 158
        yield "                  </tbody>
                </table>
              </div>
            </div>
            <div id=\"tab-design\" class=\"tab-pane\">
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <th>";
        // line 167
        yield ($context["entry_store"] ?? null);
        yield "</th>
                      <th>";
        // line 168
        yield ($context["entry_layout"] ?? null);
        yield "</th>
                    </tr>
                  </thead>
                  <tbody>
                    ";
        // line 172
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 173
            yield "                      <tr>
                        <td>";
            // line 174
            yield CoreExtension::getAttribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 174);
            yield "</td>
                        <td><select name=\"article_layout[";
            // line 175
            yield CoreExtension::getAttribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 175);
            yield "]\" class=\"form-select\">
                            <option value=\"\"></option>
                            ";
            // line 177
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["layouts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["layout"]) {
                // line 178
                yield "                              <option value=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 178);
                yield "\"";
                if (((($_v20 = ($context["article_layout"] ?? null)) && is_array($_v20) || $_v20 instanceof ArrayAccess ? ($_v20[CoreExtension::getAttribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 178)] ?? null) : null) && ((($_v21 = ($context["article_layout"] ?? null)) && is_array($_v21) || $_v21 instanceof ArrayAccess ? ($_v21[CoreExtension::getAttribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 178)] ?? null) : null) == CoreExtension::getAttribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 178)))) {
                    yield " selected";
                }
                yield ">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["layout"], "name", [], "any", false, false, false, 178);
                yield "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['layout'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 180
            yield "                          </select></td>
                      </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['store'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 183
        yield "                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <input type=\"hidden\" name=\"article_id\" value=\"";
        // line 188
        yield ($context["article_id"] ?? null);
        yield "\" id=\"input-article-id\"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('textarea[data-oc-toggle=\\'ckeditor\\']').ckeditor({
    language: '";
        // line 196
        yield ($context["ckeditor"] ?? null);
        yield "'
});
//--></script>
";
        // line 199
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
        return "admin/view/template/cms/article_form.twig";
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
        return array (  663 => 199,  657 => 196,  646 => 188,  639 => 183,  631 => 180,  616 => 178,  612 => 177,  607 => 175,  603 => 174,  600 => 173,  596 => 172,  589 => 168,  585 => 167,  574 => 158,  566 => 155,  556 => 154,  539 => 152,  533 => 151,  530 => 150,  526 => 149,  521 => 147,  518 => 146,  514 => 145,  507 => 141,  503 => 140,  495 => 135,  484 => 129,  477 => 125,  471 => 121,  452 => 118,  449 => 117,  445 => 116,  439 => 113,  433 => 109,  418 => 107,  414 => 106,  410 => 105,  404 => 102,  394 => 97,  389 => 95,  383 => 91,  358 => 86,  351 => 84,  338 => 80,  331 => 78,  324 => 74,  314 => 73,  307 => 71,  300 => 67,  290 => 66,  283 => 64,  270 => 58,  262 => 57,  253 => 55,  245 => 54,  239 => 51,  224 => 47,  217 => 45,  210 => 41,  200 => 40,  193 => 38,  183 => 36,  166 => 35,  162 => 33,  135 => 31,  118 => 30,  110 => 25,  106 => 24,  102 => 23,  98 => 22,  93 => 20,  88 => 18,  81 => 13,  70 => 11,  66 => 10,  61 => 8,  54 => 6,  50 => 5,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\"><button type=\"submit\" form=\"form-article\" data-bs-toggle=\"tooltip\" title=\"{{ button_save }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"{{ back }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_back }}\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a>
      </div>
      <h1>{{ heading_title }}</h1>
      <ol class=\"breadcrumb\">
        {% for breadcrumb in breadcrumbs %}
          <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
        {% endfor %}
      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> {{ text_form }}</div>
      <div class=\"card-body\">
        <form id=\"form-article\" action=\"{{ save }}\" method=\"post\" data-oc-toggle=\"ajax\">
          <ul class=\"nav nav-tabs\">
            <li class=\"nav-item\"><a href=\"#tab-general\" data-bs-toggle=\"tab\" class=\"nav-link active\">{{ tab_general }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-data\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_data }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-seo\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_seo }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-design\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_design }}</a></li>
          </ul>
          <div class=\"tab-content\">
            <div id=\"tab-general\" class=\"tab-pane active\">
              <ul class=\"nav nav-tabs\">
                {% for language in languages %}
                  <li class=\"nav-item\"><a href=\"#language-{{ language.language_id }}\" data-bs-toggle=\"tab\" class=\"nav-link{% if loop.first %} active{% endif %}\"><img src=\"{{ language.image }}\" title=\"{{ language.name }}\"/> {{ language.name }}</a></li>
                {% endfor %}
              </ul>
              <div class=\"tab-content\">
                {% for language in languages %}
                  <div id=\"language-{{ language.language_id }}\" class=\"tab-pane{% if loop.first %} active{% endif %}\">
                    <div class=\"row mb-3 required\">
                      <label for=\"input-name-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_name }}</label>
                      <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"article_description[{{ language.language_id }}][name]\" value=\"{{ article_description[language.language_id] ? article_description[language.language_id].name }}\" placeholder=\"{{ entry_name }}\" id=\"input-name-{{ language.language_id }}\" class=\"form-control\"/>
                        <div id=\"error-name-{{ language.language_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-description-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_description }}</label>
                      <div class=\"col-sm-10\">
                        <textarea name=\"article_description[{{ language.language_id }}][description]\" placeholder=\"{{ entry_description }}\" id=\"input-description-{{ language.language_id }}\" data-oc-toggle=\"ckeditor\" data-lang=\"{{ ckeditor }}\" class=\"form-control\">{{ article_description[language.language_id] ? article_description[language.language_id].description }}</textarea>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label class=\"col-sm-2 col-form-label\">{{ entry_image }}</label>
                      <div class=\"col-sm-10\">
                        <div class=\"border rounded d-block\" style=\"max-width: 300px;\">
                          <img src=\"{{ article_description[language.language_id] ? article_description[language.language_id].thumb : placeholder }}\" alt=\"\" title=\"\" id=\"thumb-image-{{ language.language_id }}\" data-oc-placeholder=\"{{ placeholder }}\" class=\"img-fluid\"/>
                          <input type=\"hidden\" name=\"article_description[{{ language.language_id }}][image]\" value=\"{{ article_description[language.language_id] ? article_description[language.language_id].image }}\" id=\"input-image-{{ language.language_id }}\"/>
                          <div class=\"d-grid\">
                            <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image-{{ language.language_id }}\" data-oc-thumb=\"#thumb-image-{{ language.language_id }}\" class=\"btn btn-primary rounded-0\"><i class=\"fa-solid fa-pencil\"></i> {{ button_edit }}</button>
                            <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image-{{ language.language_id }}\" data-oc-thumb=\"#thumb-image-{{ language.language_id }}\" class=\"btn btn-warning rounded-0\"><i class=\"fa-regular fa-trash-can\"></i> {{ button_clear }}</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-tag-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_tag }}</label>
                      <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"article_description[{{ language.language_id }}][tag]\" value=\"{{ article_description[language.language_id] ? article_description[language.language_id].tag }}\" placeholder=\"{{ entry_tag }}\" id=\"input-tag-{{ language.language_id }}\" class=\"form-control\"/>
                        <div id=\"error-tag-{{ language.language_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3 required\">
                      <label for=\"input-meta-title-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_meta_title }}</label>
                      <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"article_description[{{ language.language_id }}][meta_title]\" value=\"{{ article_description[language.language_id] ? article_description[language.language_id].meta_title }}\" placeholder=\"{{ entry_meta_title }}\" id=\"input-meta-title-{{ language.language_id }}\" class=\"form-control\"/>
                        <div id=\"error-meta-title-{{ language.language_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-meta-description-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_meta_description }}</label>
                      <div class=\"col-sm-10\">
                        <textarea name=\"article_description[{{ language.language_id }}][meta_description]\" rows=\"5\" placeholder=\"{{ entry_meta_description }}\" id=\"input-meta-description-{{ language.language_id }}\" class=\"form-control\">{{ article_description[language.language_id] ? article_description[language.language_id].meta_description }}</textarea>
                      </div>
                    </div>
                    <div class=\"row mb-3\">
                      <label for=\"input-meta-keyword-{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_meta_keyword }}</label>
                      <div class=\"col-sm-10\">
                        <textarea name=\"article_description[{{ language.language_id }}][meta_keyword]\" rows=\"5\" placeholder=\"{{ entry_meta_keyword }}\" id=\"input-meta-keyword-{{ language.language_id }}\" class=\"form-control\">{{ article_description[language.language_id] ? article_description[language.language_id].meta_keyword }}</textarea>
                      </div>
                    </div>
                  </div>
                {% endfor %}
              </div>
            </div>
            <div id=\"tab-data\" class=\"tab-pane\">
              <div class=\"row mb-3 required\">
                <label for=\"input-author\" class=\"col-sm-2 col-form-label\">{{ entry_author }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"author\" value=\"{{ author }}\" placeholder=\"{{ entry_author }}\" id=\"input-author\" class=\"form-control\"/>
                  <div id=\"error-author\" class=\"invalid-feedback\"></div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-topic\" class=\"col-sm-2 col-form-label\">{{ entry_topic }}</label>
                <div class=\"col-sm-10\">
                  <select name=\"topic_id\" id=\"input-topic\" class=\"form-select\">
                    <option value=\"0\">{{ text_none }}</option>
                    {% for topic in topics %}
                      <option value=\"{{ topic.topic_id }}\"{% if topic.topic_id == topic_id %} selected{% endif %}>{{ topic.name }}</option>
                    {% endfor %}
                  </select>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">{{ entry_store }}</label>
                <div class=\"col-sm-10\">
                  <div class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    {% for store in stores %}
                      <div class=\"form-check\">
                        <input type=\"checkbox\" name=\"article_store[]\" value=\"{{ store.store_id }}\" id=\"input-store-{{ store.store_id }}\" class=\"form-check-input\"{% if store.store_id in article_store %} checked{% endif %}/> <label for=\"input-store-{{ store.store_id }}\" class=\"form-check-label\">{{ store.name }}</label>
                      </div>
                    {% endfor %}
                  </div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\">{{ entry_status }}</label>
                <div class=\"col-sm-10\">
                  <div class=\"form-check form-switch form-switch-lg\">
                    <input type=\"hidden\" name=\"status\" value=\"0\"/>
                    <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"{% if status %} checked{% endif %}/>
                  </div>
                </div>
              </div>
            </div>
            <div id=\"tab-seo\" class=\"tab-pane\">
              <div class=\"alert alert-info\"><i class=\"fa-solid fa-info-circle\"></i> {{ text_keyword }}</div>
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <th>{{ entry_store }}</th>
                      <th>{{ entry_keyword }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    {% for store in stores %}
                      <tr>
                        <td>{{ store.name }}</td>
                        <td>
                          {% for language in languages %}
                            <div class=\"input-group\">
                              <div class=\"input-group-text\"><img src=\"{{ language.image }}\" title=\"{{ language.name }}\"/></div>
                              <input type=\"text\" name=\"article_seo_url[{{ store.store_id }}][{{ language.language_id }}]\" value=\"{% if article_seo_url[store.store_id][language.language_id] %}{{ article_seo_url[store.store_id][language.language_id] }}{% endif %}\" placeholder=\"{{ entry_keyword }}\" id=\"input-keyword-{{ store.store_id }}-{{ language.language_id }}\" class=\"form-control\"/>
                            </div>
                            <div id=\"error-keyword-{{ store.store_id }}-{{ language.language_id }}\" class=\"invalid-feedback\"></div>
                          {% endfor %}</td>
                      </tr>
                    {% endfor %}
                  </tbody>
                </table>
              </div>
            </div>
            <div id=\"tab-design\" class=\"tab-pane\">
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <th>{{ entry_store }}</th>
                      <th>{{ entry_layout }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    {% for store in stores %}
                      <tr>
                        <td>{{ store.name }}</td>
                        <td><select name=\"article_layout[{{ store.store_id }}]\" class=\"form-select\">
                            <option value=\"\"></option>
                            {% for layout in layouts %}
                              <option value=\"{{ layout.layout_id }}\"{% if article_layout[store.store_id] and article_layout[store.store_id] == layout.layout_id %} selected{% endif %}>{{ layout.name }}</option>
                            {% endfor %}
                          </select></td>
                      </tr>
                    {% endfor %}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <input type=\"hidden\" name=\"article_id\" value=\"{{ article_id }}\" id=\"input-article-id\"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('textarea[data-oc-toggle=\\'ckeditor\\']').ckeditor({
    language: '{{ ckeditor }}'
});
//--></script>
{{ footer }}
", "admin/view/template/cms/article_form.twig", "/Applications/MAMP/htdocs/admin/view/template/cms/article_form.twig");
    }
}
