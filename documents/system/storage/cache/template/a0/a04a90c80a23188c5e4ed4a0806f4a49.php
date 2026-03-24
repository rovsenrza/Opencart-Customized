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

/* catalog/view/template/product/product.twig */
class __TwigTemplate_79eaa4a829e1e45d985521157daabd60 extends Template
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
<div id=\"product-info\" class=\"container\">
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
    <div id=\"content\" class=\"col\">
      ";
        // line 10
        yield ($context["content_top"] ?? null);
        yield "
      <div class=\"row mb-3\">
        ";
        // line 12
        if ((($context["thumb"] ?? null) || ($context["images"] ?? null))) {
            // line 13
            yield "          <div class=\"col-sm\">
            <div class=\"image magnific-popup\">
              ";
            // line 15
            if (($context["thumb"] ?? null)) {
                // line 16
                yield "                <a href=\"";
                yield ($context["popup"] ?? null);
                yield "\" title=\"";
                yield ($context["heading_title"] ?? null);
                yield "\"><img src=\"";
                yield ($context["thumb"] ?? null);
                yield "\" title=\"";
                yield ($context["heading_title"] ?? null);
                yield "\" alt=\"";
                yield ($context["heading_title"] ?? null);
                yield "\" class=\"img-thumbnail mb-3\"/></a>
              ";
            }
            // line 18
            yield "              ";
            if (($context["images"] ?? null)) {
                // line 19
                yield "                <div>
                  ";
                // line 20
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["images"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                    // line 21
                    yield "                    <a href=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["image"], "popup", [], "any", false, false, false, 21);
                    yield "\" title=\"";
                    yield ($context["heading_title"] ?? null);
                    yield "\"><img src=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["image"], "thumb", [], "any", false, false, false, 21);
                    yield "\" title=\"";
                    yield ($context["heading_title"] ?? null);
                    yield "\" alt=\"";
                    yield ($context["heading_title"] ?? null);
                    yield "\" class=\"img-thumbnail\"/></a>&nbsp;
                  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['image'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 23
                yield "                </div>
              ";
            }
            // line 25
            yield "            </div>
          </div>
        ";
        }
        // line 28
        yield "        <div class=\"col-sm\">
          <h1>";
        // line 29
        yield ($context["heading_title"] ?? null);
        yield "</h1>
          <ul class=\"list-unstyled\">
            ";
        // line 31
        if (($context["manufacturer"] ?? null)) {
            // line 32
            yield "              <li>";
            yield ($context["text_manufacturer"] ?? null);
            yield " <a href=\"";
            yield ($context["manufacturers"] ?? null);
            yield "\">";
            yield ($context["manufacturer"] ?? null);
            yield "</a></li>
            ";
        }
        // line 34
        yield "            <li>";
        yield ($context["text_model"] ?? null);
        yield " ";
        yield ($context["model"] ?? null);
        yield "</li>
            ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["product_codes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_code"]) {
            // line 36
            yield "              <li>";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["product_code"], "code", [], "any", false, false, false, 36);
            yield ": ";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["product_code"], "value", [], "any", false, false, false, 36);
            yield "</li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['product_code'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        yield "            ";
        if (($context["reward"] ?? null)) {
            // line 39
            yield "              <li>";
            yield ($context["text_reward"] ?? null);
            yield " ";
            yield ($context["reward"] ?? null);
            yield "</li>
            ";
        }
        // line 41
        yield "            <li>";
        yield ($context["text_stock"] ?? null);
        yield " ";
        yield ($context["stock"] ?? null);
        yield "</li>
          </ul>
          ";
        // line 43
        if (($context["review_status"] ?? null)) {
            // line 44
            yield "            <div class=\"rating\">
              <p>
                ";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 47
                yield "                  ";
                if ((($context["rating"] ?? null) < $context["i"])) {
                    // line 48
                    yield "                    <span class=\"fa-stack\"><i class=\"fa-regular fa-star fa-stack-1x\"></i></span>
                  ";
                } else {
                    // line 50
                    yield "                    <span class=\"fa-stack\"><i class=\"fa-solid fa-star fa-stack-1x\"></i><i class=\"fa-regular fa-star fa-stack-1x\"></i></span>
                  ";
                }
                // line 52
                yield "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            yield "                <a href=\"#\" onclick=\"\$('a[href=\\'#tab-review\\']').tab('show'); return false;\">";
            yield ($context["text_reviews"] ?? null);
            yield "</a> / <a href=\"#\" onclick=\"\$('a[href=\\'#tab-review\\']').tab('show'); return false;\">";
            yield ($context["text_write"] ?? null);
            yield "</a></p>
            </div>
          ";
        }
        // line 56
        yield "          ";
        if (($context["price"] ?? null)) {
            // line 57
            yield "            <ul class=\"list-unstyled\">
              ";
            // line 58
            if ( !($context["special"] ?? null)) {
                // line 59
                yield "                <li><h2><span class=\"price-new\">";
                yield ($context["price"] ?? null);
                yield "</span></h2></li>
              ";
            } else {
                // line 61
                yield "                <li><span class=\"price-old\">";
                yield ($context["price"] ?? null);
                yield "</span></li>
                <li><h2><span class=\"price-new\">";
                // line 62
                yield ($context["special"] ?? null);
                yield "</span></h2></li>
              ";
            }
            // line 64
            yield "              ";
            if (($context["tax"] ?? null)) {
                // line 65
                yield "                <li>";
                yield ($context["text_tax"] ?? null);
                yield " ";
                yield ($context["tax"] ?? null);
                yield "</li>
              ";
            }
            // line 67
            yield "              ";
            if (($context["points"] ?? null)) {
                // line 68
                yield "                <li>";
                yield ($context["text_points"] ?? null);
                yield " ";
                yield ($context["points"] ?? null);
                yield "</li>
              ";
            }
            // line 70
            yield "              ";
            if (($context["discounts"] ?? null)) {
                // line 71
                yield "                <li>
                  <hr>
                </li>
                ";
                // line 74
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["discounts"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["discount"]) {
                    // line 75
                    yield "                  <li>";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["discount"], "quantity", [], "any", false, false, false, 75);
                    yield ($context["text_discount"] ?? null);
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["discount"], "price", [], "any", false, false, false, 75);
                    yield "</li>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['discount'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 77
                yield "              ";
            }
            // line 78
            yield "            </ul>
          ";
        }
        // line 80
        yield "          <form method=\"post\" data-oc-toggle=\"ajax\">
            <div class=\"btn-group\">
              ";
        // line 82
        if (($context["wishlist_enabled"] ?? null)) {
            // line 83
            yield "                <button type=\"submit\" formaction=\"";
            yield ($context["wishlist_add"] ?? null);
            yield "\" data-bs-toggle=\"tooltip\" class=\"btn btn-light btn-lg\" title=\"";
            yield ($context["button_wishlist"] ?? null);
            yield "\"><i class=\"fa-solid fa-heart\"></i></button>
              ";
        }
        // line 85
        yield "              ";
        if (($context["compare_enabled"] ?? null)) {
            // line 86
            yield "                <button type=\"submit\" formaction=\"";
            yield ($context["compare_add"] ?? null);
            yield "\" data-bs-toggle=\"tooltip\" class=\"btn btn-light btn-lg\" title=\"";
            yield ($context["button_compare"] ?? null);
            yield "\"><i class=\"fa-solid fa-arrow-right-arrow-left\"></i></button>
              ";
        }
        // line 88
        yield "            </div>
            <input type=\"hidden\" name=\"product_id\" value=\"";
        // line 89
        yield ($context["product_id"] ?? null);
        yield "\"/>
          </form>
          <br/>
          ";
        // line 92
        if (($context["cart_enabled"] ?? null)) {
            // line 93
            yield "            <div id=\"product\">
            <form id=\"form-product\">
              ";
            // line 95
            if (($context["options"] ?? null)) {
                // line 96
                yield "                <hr>
                <h3>";
                // line 97
                yield ($context["text_option"] ?? null);
                yield "</h3>
                <div>
                  ";
                // line 99
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["options"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                    // line 100
                    yield "
                    ";
                    // line 101
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["option"], "type", [], "any", false, false, false, 101) == "select")) {
                        // line 102
                        yield "                      <div class=\"mb-3";
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["option"], "required", [], "any", false, false, false, 102)) {
                            yield " required";
                        }
                        yield "\">
                        <label for=\"input-option-";
                        // line 103
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 103);
                        yield "\" class=\"form-label\">";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 103);
                        yield "</label>
                        <select name=\"option[";
                        // line 104
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 104);
                        yield "]\" id=\"input-option-";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 104);
                        yield "\" class=\"form-select\">
                          <option value=\"\">";
                        // line 105
                        yield ($context["text_select"] ?? null);
                        yield "</option>
                          ";
                        // line 106
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_value", [], "any", false, false, false, 106));
                        foreach ($context['_seq'] as $context["_key"] => $context["option_value"]) {
                            // line 107
                            yield "                            <option value=\"";
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "product_option_value_id", [], "any", false, false, false, 107);
                            yield "\">";
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "name", [], "any", false, false, false, 107);
                            yield "
                              ";
                            // line 108
                            if (CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price", [], "any", false, false, false, 108)) {
                                // line 109
                                yield "                                (";
                                yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price_prefix", [], "any", false, false, false, 109);
                                yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price", [], "any", false, false, false, 109);
                                yield ")
                              ";
                            }
                            // line 110
                            yield "</option>
                          ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['option_value'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 112
                        yield "                        </select>
                        <div id=\"error-option-";
                        // line 113
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 113);
                        yield "\" class=\"invalid-feedback\"></div>
                      </div>
                    ";
                    }
                    // line 116
                    yield "
                    ";
                    // line 117
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["option"], "type", [], "any", false, false, false, 117) == "radio")) {
                        // line 118
                        yield "                      <div class=\"mb-3";
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["option"], "required", [], "any", false, false, false, 118)) {
                            yield " required";
                        }
                        yield "\">
                        <label class=\"form-label\">";
                        // line 119
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 119);
                        yield "</label>
                        <div id=\"input-option-";
                        // line 120
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 120);
                        yield "\">
                          ";
                        // line 121
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_value", [], "any", false, false, false, 121));
                        foreach ($context['_seq'] as $context["_key"] => $context["option_value"]) {
                            // line 122
                            yield "                            <div class=\"form-check\">
                              <input type=\"radio\" name=\"option[";
                            // line 123
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 123);
                            yield "]\" value=\"";
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "product_option_value_id", [], "any", false, false, false, 123);
                            yield "\" id=\"input-option-value-";
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "product_option_value_id", [], "any", false, false, false, 123);
                            yield "\" class=\"form-check-input\"/>
                              <label for=\"input-option-value-";
                            // line 124
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "product_option_value_id", [], "any", false, false, false, 124);
                            yield "\" class=\"form-check-label\">
                                ";
                            // line 125
                            if (CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "image", [], "any", false, false, false, 125)) {
                                // line 126
                                yield "                                  <img src=\"";
                                yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "image", [], "any", false, false, false, 126);
                                yield "\" alt=\"";
                                yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "name", [], "any", false, false, false, 126);
                                yield " ";
                                if (CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price", [], "any", false, false, false, 126)) {
                                    yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price_prefix", [], "any", false, false, false, 126);
                                    yield " ";
                                    yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price", [], "any", false, false, false, 126);
                                }
                                yield "\" class=\"img-thumbnail\"/>";
                            }
                            // line 127
                            yield "                                ";
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "name", [], "any", false, false, false, 127);
                            yield "
                                ";
                            // line 128
                            if (CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price", [], "any", false, false, false, 128)) {
                                // line 129
                                yield "                                  (";
                                yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price_prefix", [], "any", false, false, false, 129);
                                yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price", [], "any", false, false, false, 129);
                                yield ")
                                ";
                            }
                            // line 130
                            yield "</label>
                            </div>
                          ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['option_value'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 133
                        yield "                        </div>
                        <div id=\"error-option-";
                        // line 134
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 134);
                        yield "\" class=\"invalid-feedback\"></div>
                      </div>
                    ";
                    }
                    // line 137
                    yield "
                    ";
                    // line 138
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["option"], "type", [], "any", false, false, false, 138) == "checkbox")) {
                        // line 139
                        yield "                      <div class=\"mb-3";
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["option"], "required", [], "any", false, false, false, 139)) {
                            yield " required";
                        }
                        yield "\">
                        <label class=\"form-label\">";
                        // line 140
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 140);
                        yield "</label>
                        <div id=\"input-option-";
                        // line 141
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 141);
                        yield "\">
                          ";
                        // line 142
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_value", [], "any", false, false, false, 142));
                        foreach ($context['_seq'] as $context["_key"] => $context["option_value"]) {
                            // line 143
                            yield "                            <div class=\"form-check\">
                              <input type=\"checkbox\" name=\"option[";
                            // line 144
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 144);
                            yield "][]\" value=\"";
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "product_option_value_id", [], "any", false, false, false, 144);
                            yield "\" id=\"input-option-value-";
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "product_option_value_id", [], "any", false, false, false, 144);
                            yield "\" class=\"form-check-input\"/> 
\t\t\t\t\t\t\t                <label for=\"input-option-value-";
                            // line 145
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "product_option_value_id", [], "any", false, false, false, 145);
                            yield "\" class=\"form-check-label\">
                                ";
                            // line 146
                            if (CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "image", [], "any", false, false, false, 146)) {
                                // line 147
                                yield "                                  <img src=\"";
                                yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "image", [], "any", false, false, false, 147);
                                yield "\" alt=\"";
                                yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "name", [], "any", false, false, false, 147);
                                yield " ";
                                if (CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price", [], "any", false, false, false, 147)) {
                                    yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price_prefix", [], "any", false, false, false, 147);
                                    yield " ";
                                    yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price", [], "any", false, false, false, 147);
                                }
                                yield "\" class=\"img-thumbnail\"/>";
                            }
                            // line 148
                            yield "                                ";
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "name", [], "any", false, false, false, 148);
                            yield "
                                ";
                            // line 149
                            if (CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price", [], "any", false, false, false, 149)) {
                                // line 150
                                yield "                                  (";
                                yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price_prefix", [], "any", false, false, false, 150);
                                yield CoreExtension::getAttribute($this->env, $this->source, $context["option_value"], "price", [], "any", false, false, false, 150);
                                yield ")
                                ";
                            }
                            // line 151
                            yield "</label>
                            </div>
                          ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['option_value'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 154
                        yield "                        </div>
                        <div id=\"error-option-";
                        // line 155
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 155);
                        yield "\" class=\"invalid-feedback\"></div>
                      </div>
                    ";
                    }
                    // line 158
                    yield "
                    ";
                    // line 159
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["option"], "type", [], "any", false, false, false, 159) == "text")) {
                        // line 160
                        yield "                      <div class=\"mb-3";
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["option"], "required", [], "any", false, false, false, 160)) {
                            yield " required";
                        }
                        yield "\">
                        <label for=\"input-option-";
                        // line 161
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 161);
                        yield "\" class=\"form-label\">";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 161);
                        yield "</label> <input type=\"text\" name=\"option[";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 161);
                        yield "]\" value=\"";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, false, 161);
                        yield "\" placeholder=\"";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 161);
                        yield "\" id=\"input-option-";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 161);
                        yield "\" class=\"form-control\"/>
                        <div id=\"error-option-";
                        // line 162
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 162);
                        yield "\" class=\"invalid-feedback\"></div>
                      </div>
                    ";
                    }
                    // line 165
                    yield "
                    ";
                    // line 166
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["option"], "type", [], "any", false, false, false, 166) == "textarea")) {
                        // line 167
                        yield "                      <div class=\"mb-3";
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["option"], "required", [], "any", false, false, false, 167)) {
                            yield " required";
                        }
                        yield "\">
                        <label for=\"input-option-";
                        // line 168
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 168);
                        yield "\" class=\"form-label\">";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 168);
                        yield "</label> <textarea name=\"option[";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 168);
                        yield "]\" rows=\"5\" placeholder=\"";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 168);
                        yield "\" id=\"input-option-";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 168);
                        yield "\" class=\"form-control\">";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, false, 168);
                        yield "</textarea>
                        <div id=\"error-option-";
                        // line 169
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 169);
                        yield "\" class=\"invalid-feedback\"></div>
                      </div>
                    ";
                    }
                    // line 172
                    yield "
                    ";
                    // line 173
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["option"], "type", [], "any", false, false, false, 173) == "file")) {
                        // line 174
                        yield "                      <div class=\"mb-3";
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["option"], "required", [], "any", false, false, false, 174)) {
                            yield " required";
                        }
                        yield "\">
                        <label for=\"button-upload-";
                        // line 175
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 175);
                        yield "\" class=\"form-label\">";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 175);
                        yield "</label>
                        <div>
                          <button type=\"button\" id=\"button-upload-";
                        // line 177
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 177);
                        yield "\" data-oc-toggle=\"upload\" data-oc-url=\"";
                        yield ($context["upload"] ?? null);
                        yield "\" data-oc-target=\"#input-option-";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 177);
                        yield "\" data-oc-size-max=\"";
                        yield ($context["config_file_max_size"] ?? null);
                        yield "\" data-oc-size-error=\"";
                        yield ($context["error_upload_size"] ?? null);
                        yield "\" class=\"btn btn-light btn-block\"><i class=\"fa-solid fa-upload\"></i> ";
                        yield ($context["button_upload"] ?? null);
                        yield "</button>
                          <input type=\"hidden\" name=\"option[";
                        // line 178
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 178);
                        yield "]\" value=\"\" id=\"input-option-";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 178);
                        yield "\"/>
                        </div>
                        <div id=\"error-option-";
                        // line 180
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 180);
                        yield "\" class=\"invalid-feedback\"></div>
                      </div>
                    ";
                    }
                    // line 183
                    yield "
                    ";
                    // line 184
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["option"], "type", [], "any", false, false, false, 184) == "date")) {
                        // line 185
                        yield "                      <div class=\"mb-3";
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["option"], "required", [], "any", false, false, false, 185)) {
                            yield " required";
                        }
                        yield "\">
                        <label for=\"input-option-";
                        // line 186
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 186);
                        yield "\" class=\"form-label\">";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 186);
                        yield "</label>
                        <input type=\"date\" name=\"option[";
                        // line 187
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 187);
                        yield "]\" value=\"";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, false, 187);
                        yield "\" id=\"input-option-";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 187);
                        yield "\" class=\"form-control\"/>
                        <div id=\"error-option-";
                        // line 188
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 188);
                        yield "\" class=\"invalid-feedback\"></div>
                      </div>
                    ";
                    }
                    // line 191
                    yield "
                    ";
                    // line 192
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["option"], "type", [], "any", false, false, false, 192) == "time")) {
                        // line 193
                        yield "                      <div class=\"mb-3";
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["option"], "required", [], "any", false, false, false, 193)) {
                            yield " required";
                        }
                        yield "\">
                        <label for=\"input-option-";
                        // line 194
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 194);
                        yield "\" class=\"form-label\">";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 194);
                        yield "</label>
                        <input type=\"time\" name=\"option[";
                        // line 195
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 195);
                        yield "]\" value=\"";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, false, 195);
                        yield "\" id=\"input-option-";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 195);
                        yield "\" class=\"form-control\"/>
                        <div id=\"error-option-";
                        // line 196
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 196);
                        yield "\" class=\"invalid-feedback\"></div>
                      </div>
                    ";
                    }
                    // line 199
                    yield "
                    ";
                    // line 200
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["option"], "type", [], "any", false, false, false, 200) == "datetime")) {
                        // line 201
                        yield "                      <div class=\"mb-3";
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["option"], "required", [], "any", false, false, false, 201)) {
                            yield " required";
                        }
                        yield "\">
                        <label for=\"input-option-";
                        // line 202
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 202);
                        yield "\" class=\"form-label\">";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 202);
                        yield "</label>
                        <input type=\"datetime-local\" name=\"option[";
                        // line 203
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 203);
                        yield "]\" value=\"";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, false, 203);
                        yield "\" id=\"input-option-";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 203);
                        yield "\" class=\"form-control\"/>
                        <div id=\"error-option-";
                        // line 204
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["option"], "product_option_id", [], "any", false, false, false, 204);
                        yield "\" class=\"invalid-feedback\"></div>
                      </div>
                    ";
                    }
                    // line 207
                    yield "                  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['option'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 208
                yield "                </div>
              ";
            }
            // line 210
            yield "
              ";
            // line 211
            if (($context["subscription_plans"] ?? null)) {
                // line 212
                yield "                <hr/>
                <h3>";
                // line 213
                yield ($context["text_subscription"] ?? null);
                yield "</h3>
                <div class=\"mb-3 required\">
                  <select name=\"subscription_plan_id\" id=\"input-subscription\" class=\"form-select\">
                    <option value=\"\">";
                // line 216
                yield ($context["text_select"] ?? null);
                yield "</option>
                    ";
                // line 217
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["subscription_plans"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["subscription_plan"]) {
                    // line 218
                    yield "                      <option value=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["subscription_plan"], "subscription_plan_id", [], "any", false, false, false, 218);
                    yield "\">";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["subscription_plan"], "name", [], "any", false, false, false, 218);
                    yield "</option>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['subscription_plan'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 220
                yield "                  </select>
                  ";
                // line 221
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["subscription_plans"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["subscription_plan"]) {
                    // line 222
                    yield "                    <div id=\"subscription-description-";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["subscription_plan"], "subscription_plan_id", [], "any", false, false, false, 222);
                    yield "\" class=\"form-text subscription d-none\">";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["subscription_plan"], "description", [], "any", false, false, false, 222);
                    yield "</div>
                  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['subscription_plan'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 224
                yield "                  <div id=\"error-subscription\" class=\"invalid-feedback\"></div>
                </div>
              ";
            }
            // line 227
            yield "              <div class=\"mb-3\">
                <div class=\"input-group\">
                  <div class=\"input-group-text\">";
            // line 229
            yield ($context["entry_qty"] ?? null);
            yield "</div>
                  <input type=\"text\" name=\"quantity\" value=\"";
            // line 230
            yield ($context["minimum"] ?? null);
            yield "\" size=\"2\" id=\"input-quantity\" class=\"form-control\"/>
                  <button type=\"submit\" id=\"button-cart\" class=\"btn btn-primary btn-lg btn-block\">";
            // line 231
            yield ($context["button_cart"] ?? null);
            yield "</button>
                </div>
                <input type=\"hidden\" name=\"product_id\" value=\"";
            // line 233
            yield ($context["product_id"] ?? null);
            yield "\" id=\"input-product-id\"/>
                <div id=\"error-quantity\" class=\"form-text\"></div>
              </div>
              ";
            // line 236
            if ((($context["minimum"] ?? null) > 1)) {
                // line 237
                yield "                <div class=\"alert alert-warning\"><i class=\"fa-solid fa-circle-info\"></i> ";
                yield ($context["text_minimum"] ?? null);
                yield "</div>
              ";
            }
            // line 239
            yield "            </form>
            </div>
          ";
        }
        // line 242
        yield "        </div>
      </div>
      <ul class=\"nav nav-tabs\">
        <li class=\"nav-item\"><a href=\"#tab-description\" data-bs-toggle=\"tab\" class=\"nav-link active\">";
        // line 245
        yield ($context["tab_description"] ?? null);
        yield "</a></li>
        ";
        // line 246
        if (($context["attribute_groups"] ?? null)) {
            // line 247
            yield "          <li class=\"nav-item\"><a href=\"#tab-specification\" data-bs-toggle=\"tab\" class=\"nav-link\">";
            yield ($context["tab_attribute"] ?? null);
            yield "</a></li>
        ";
        }
        // line 249
        yield "        ";
        if (($context["review_status"] ?? null)) {
            // line 250
            yield "          <li class=\"nav-item\"><a href=\"#tab-review\" data-bs-toggle=\"tab\" class=\"nav-link\">";
            yield ($context["tab_review"] ?? null);
            yield "</a></li>
        ";
        }
        // line 252
        yield "      </ul>
      <div class=\"tab-content\">
        <div id=\"tab-description\" class=\"tab-pane fade show active mb-4\">";
        // line 254
        yield ($context["description"] ?? null);
        yield "
          ";
        // line 255
        if (($context["tags"] ?? null)) {
            // line 256
            yield "            <p>";
            yield ($context["text_tags"] ?? null);
            yield "
              ";
            // line 257
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["tags"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 258
                yield "                <a href=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "href", [], "any", false, false, false, 258);
                yield "\">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "tag", [], "any", false, false, false, 258);
                yield "</a>";
                if ( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 258)) {
                    yield ",";
                }
                // line 259
                yield "              ";
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
            unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 260
            yield "            </p>
          ";
        }
        // line 262
        yield "        </div>
        ";
        // line 263
        if (($context["attribute_groups"] ?? null)) {
            // line 264
            yield "          <div id=\"tab-specification\" class=\"tab-pane fade\">
            <div class=\"table-responsive\">
              <table class=\"table table-bordered\">
                ";
            // line 267
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["attribute_groups"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["attribute_group"]) {
                // line 268
                yield "                  <thead>
                    <tr>
                      <td colspan=\"2\"><strong>";
                // line 270
                yield CoreExtension::getAttribute($this->env, $this->source, $context["attribute_group"], "name", [], "any", false, false, false, 270);
                yield "</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    ";
                // line 274
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["attribute_group"], "attribute", [], "any", false, false, false, 274));
                foreach ($context['_seq'] as $context["_key"] => $context["attribute"]) {
                    // line 275
                    yield "                      <tr>
                        <td>";
                    // line 276
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["attribute"], "name", [], "any", false, false, false, 276);
                    yield "</td>
                        <td>";
                    // line 277
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["attribute"], "text", [], "any", false, false, false, 277);
                    yield "</td>
                      </tr>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['attribute'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 280
                yield "                  </tbody>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['attribute_group'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 282
            yield "              </table>
            </div>
          </div>
        ";
        }
        // line 286
        yield "        ";
        if (($context["review_status"] ?? null)) {
            // line 287
            yield "          <div id=\"tab-review\" class=\"tab-pane fade mb-4\">";
            yield ($context["review"] ?? null);
            yield "</div>
        ";
        }
        // line 289
        yield "      </div>
      ";
        // line 290
        yield ($context["related"] ?? null);
        yield "
      ";
        // line 291
        yield ($context["content_bottom"] ?? null);
        yield "
    </div>
    ";
        // line 293
        yield ($context["column_right"] ?? null);
        yield "
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('#input-subscription').on('change', function(e) {
    var element = this;

    \$('.subscription').addClass('d-none');

    \$('#subscription-description-' + \$(element).val()).removeClass('d-none');
});

";
        // line 305
        if (($context["cart_enabled"] ?? null)) {
            // line 306
            yield "\$('#form-product').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=checkout/cart.add&language=";
            // line 310
            yield ($context["language"] ?? null);
            yield "',
        type: 'post',
        data: \$('#form-product').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        cache: false,
        processData: false,
        beforeSend: function() {
            \$('#button-cart').button('loading');
        },
        complete: function() {
            \$('#button-cart').button('reset');
        },
        success: function(json) {
            console.log(json);

            \$('#form-product').find('.is-invalid').removeClass('is-invalid');
            \$('#form-product').find('.invalid-feedback').removeClass('d-block');

            var cart_alert_handled = false;

            if (typeof window.ocShowCartResponseAlerts === 'function') {
                cart_alert_handled = window.ocShowCartResponseAlerts(json);
            }

            if (json['error']) {
                for (key in json['error']) {
                    \$('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                    \$('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                }

                if (!cart_alert_handled) {
                    if (typeof json['error'] == 'string') {
                        \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                    } else if (json['error']['warning']) {
                        \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                    }
                }
            }

            if (json['success']) {
                if (!cart_alert_handled) {
                    \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                \$('#cart').load('index.php?route=common/cart.info&language=";
            // line 355
            yield ($context["language"] ?? null);
            yield "');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});
";
        }
        // line 364
        yield "
\$(document).ready(function() {
    \$('.magnific-popup').magnificPopup({
        type: 'image',
        delegate: 'a',
        gallery: {
            enabled: true
        }
    });
});
//--></script>
";
        // line 375
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
        return "catalog/view/template/product/product.twig";
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
        return array (  1163 => 375,  1150 => 364,  1138 => 355,  1090 => 310,  1084 => 306,  1082 => 305,  1067 => 293,  1062 => 291,  1058 => 290,  1055 => 289,  1049 => 287,  1046 => 286,  1040 => 282,  1033 => 280,  1024 => 277,  1020 => 276,  1017 => 275,  1013 => 274,  1006 => 270,  1002 => 268,  998 => 267,  993 => 264,  991 => 263,  988 => 262,  984 => 260,  970 => 259,  961 => 258,  944 => 257,  939 => 256,  937 => 255,  933 => 254,  929 => 252,  923 => 250,  920 => 249,  914 => 247,  912 => 246,  908 => 245,  903 => 242,  898 => 239,  892 => 237,  890 => 236,  884 => 233,  879 => 231,  875 => 230,  871 => 229,  867 => 227,  862 => 224,  851 => 222,  847 => 221,  844 => 220,  833 => 218,  829 => 217,  825 => 216,  819 => 213,  816 => 212,  814 => 211,  811 => 210,  807 => 208,  801 => 207,  795 => 204,  787 => 203,  781 => 202,  774 => 201,  772 => 200,  769 => 199,  763 => 196,  755 => 195,  749 => 194,  742 => 193,  740 => 192,  737 => 191,  731 => 188,  723 => 187,  717 => 186,  710 => 185,  708 => 184,  705 => 183,  699 => 180,  692 => 178,  678 => 177,  671 => 175,  664 => 174,  662 => 173,  659 => 172,  653 => 169,  639 => 168,  632 => 167,  630 => 166,  627 => 165,  621 => 162,  607 => 161,  600 => 160,  598 => 159,  595 => 158,  589 => 155,  586 => 154,  578 => 151,  571 => 150,  569 => 149,  564 => 148,  551 => 147,  549 => 146,  545 => 145,  537 => 144,  534 => 143,  530 => 142,  526 => 141,  522 => 140,  515 => 139,  513 => 138,  510 => 137,  504 => 134,  501 => 133,  493 => 130,  486 => 129,  484 => 128,  479 => 127,  466 => 126,  464 => 125,  460 => 124,  452 => 123,  449 => 122,  445 => 121,  441 => 120,  437 => 119,  430 => 118,  428 => 117,  425 => 116,  419 => 113,  416 => 112,  409 => 110,  402 => 109,  400 => 108,  393 => 107,  389 => 106,  385 => 105,  379 => 104,  373 => 103,  366 => 102,  364 => 101,  361 => 100,  357 => 99,  352 => 97,  349 => 96,  347 => 95,  343 => 93,  341 => 92,  335 => 89,  332 => 88,  324 => 86,  321 => 85,  313 => 83,  311 => 82,  307 => 80,  303 => 78,  300 => 77,  289 => 75,  285 => 74,  280 => 71,  277 => 70,  269 => 68,  266 => 67,  258 => 65,  255 => 64,  250 => 62,  245 => 61,  239 => 59,  237 => 58,  234 => 57,  231 => 56,  222 => 53,  216 => 52,  212 => 50,  208 => 48,  205 => 47,  201 => 46,  197 => 44,  195 => 43,  187 => 41,  179 => 39,  176 => 38,  165 => 36,  161 => 35,  154 => 34,  144 => 32,  142 => 31,  137 => 29,  134 => 28,  129 => 25,  125 => 23,  108 => 21,  104 => 20,  101 => 19,  98 => 18,  84 => 16,  82 => 15,  78 => 13,  76 => 12,  71 => 10,  66 => 8,  63 => 7,  52 => 5,  48 => 4,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ header }}
<div id=\"product-info\" class=\"container\">
  <ul class=\"breadcrumb\">
    {% for breadcrumb in breadcrumbs %}
      <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
    {% endfor %}
  </ul>
  <div class=\"row\">{{ column_left }}
    <div id=\"content\" class=\"col\">
      {{ content_top }}
      <div class=\"row mb-3\">
        {% if thumb or images %}
          <div class=\"col-sm\">
            <div class=\"image magnific-popup\">
              {% if thumb %}
                <a href=\"{{ popup }}\" title=\"{{ heading_title }}\"><img src=\"{{ thumb }}\" title=\"{{ heading_title }}\" alt=\"{{ heading_title }}\" class=\"img-thumbnail mb-3\"/></a>
              {% endif %}
              {% if images %}
                <div>
                  {% for image in images %}
                    <a href=\"{{ image.popup }}\" title=\"{{ heading_title }}\"><img src=\"{{ image.thumb }}\" title=\"{{ heading_title }}\" alt=\"{{ heading_title }}\" class=\"img-thumbnail\"/></a>&nbsp;
                  {% endfor %}
                </div>
              {% endif %}
            </div>
          </div>
        {% endif %}
        <div class=\"col-sm\">
          <h1>{{ heading_title }}</h1>
          <ul class=\"list-unstyled\">
            {% if manufacturer %}
              <li>{{ text_manufacturer }} <a href=\"{{ manufacturers }}\">{{ manufacturer }}</a></li>
            {% endif %}
            <li>{{ text_model }} {{ model }}</li>
            {% for product_code in product_codes %}
              <li>{{ product_code.code }}: {{ product_code.value }}</li>
            {% endfor %}
            {% if reward %}
              <li>{{ text_reward }} {{ reward }}</li>
            {% endif %}
            <li>{{ text_stock }} {{ stock }}</li>
          </ul>
          {% if review_status %}
            <div class=\"rating\">
              <p>
                {% for i in 1..5 %}
                  {% if rating < i %}
                    <span class=\"fa-stack\"><i class=\"fa-regular fa-star fa-stack-1x\"></i></span>
                  {% else %}
                    <span class=\"fa-stack\"><i class=\"fa-solid fa-star fa-stack-1x\"></i><i class=\"fa-regular fa-star fa-stack-1x\"></i></span>
                  {% endif %}
                {% endfor %}
                <a href=\"#\" onclick=\"\$('a[href=\\'#tab-review\\']').tab('show'); return false;\">{{ text_reviews }}</a> / <a href=\"#\" onclick=\"\$('a[href=\\'#tab-review\\']').tab('show'); return false;\">{{ text_write }}</a></p>
            </div>
          {% endif %}
          {% if price %}
            <ul class=\"list-unstyled\">
              {% if not special %}
                <li><h2><span class=\"price-new\">{{ price }}</span></h2></li>
              {% else %}
                <li><span class=\"price-old\">{{ price }}</span></li>
                <li><h2><span class=\"price-new\">{{ special }}</span></h2></li>
              {% endif %}
              {% if tax %}
                <li>{{ text_tax }} {{ tax }}</li>
              {% endif %}
              {% if points %}
                <li>{{ text_points }} {{ points }}</li>
              {% endif %}
              {% if discounts %}
                <li>
                  <hr>
                </li>
                {% for discount in discounts %}
                  <li>{{ discount.quantity }}{{ text_discount }}{{ discount.price }}</li>
                {% endfor %}
              {% endif %}
            </ul>
          {% endif %}
          <form method=\"post\" data-oc-toggle=\"ajax\">
            <div class=\"btn-group\">
              {% if wishlist_enabled %}
                <button type=\"submit\" formaction=\"{{ wishlist_add }}\" data-bs-toggle=\"tooltip\" class=\"btn btn-light btn-lg\" title=\"{{ button_wishlist }}\"><i class=\"fa-solid fa-heart\"></i></button>
              {% endif %}
              {% if compare_enabled %}
                <button type=\"submit\" formaction=\"{{ compare_add }}\" data-bs-toggle=\"tooltip\" class=\"btn btn-light btn-lg\" title=\"{{ button_compare }}\"><i class=\"fa-solid fa-arrow-right-arrow-left\"></i></button>
              {% endif %}
            </div>
            <input type=\"hidden\" name=\"product_id\" value=\"{{ product_id }}\"/>
          </form>
          <br/>
          {% if cart_enabled %}
            <div id=\"product\">
            <form id=\"form-product\">
              {% if options %}
                <hr>
                <h3>{{ text_option }}</h3>
                <div>
                  {% for option in options %}

                    {% if option.type == 'select' %}
                      <div class=\"mb-3{% if option.required %} required{% endif %}\">
                        <label for=\"input-option-{{ option.product_option_id }}\" class=\"form-label\">{{ option.name }}</label>
                        <select name=\"option[{{ option.product_option_id }}]\" id=\"input-option-{{ option.product_option_id }}\" class=\"form-select\">
                          <option value=\"\">{{ text_select }}</option>
                          {% for option_value in option.product_option_value %}
                            <option value=\"{{ option_value.product_option_value_id }}\">{{ option_value.name }}
                              {% if option_value.price %}
                                ({{ option_value.price_prefix }}{{ option_value.price }})
                              {% endif %}</option>
                          {% endfor %}
                        </select>
                        <div id=\"error-option-{{ option.product_option_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    {% endif %}

                    {% if option.type == 'radio' %}
                      <div class=\"mb-3{% if option.required %} required{% endif %}\">
                        <label class=\"form-label\">{{ option.name }}</label>
                        <div id=\"input-option-{{ option.product_option_id }}\">
                          {% for option_value in option.product_option_value %}
                            <div class=\"form-check\">
                              <input type=\"radio\" name=\"option[{{ option.product_option_id }}]\" value=\"{{ option_value.product_option_value_id }}\" id=\"input-option-value-{{ option_value.product_option_value_id }}\" class=\"form-check-input\"/>
                              <label for=\"input-option-value-{{ option_value.product_option_value_id }}\" class=\"form-check-label\">
                                {% if option_value.image %}
                                  <img src=\"{{ option_value.image }}\" alt=\"{{ option_value.name }} {% if option_value.price %}{{ option_value.price_prefix }} {{ option_value.price }}{% endif %}\" class=\"img-thumbnail\"/>{% endif %}
                                {{ option_value.name }}
                                {% if option_value.price %}
                                  ({{ option_value.price_prefix }}{{ option_value.price }})
                                {% endif %}</label>
                            </div>
                          {% endfor %}
                        </div>
                        <div id=\"error-option-{{ option.product_option_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    {% endif %}

                    {% if option.type == 'checkbox' %}
                      <div class=\"mb-3{% if option.required %} required{% endif %}\">
                        <label class=\"form-label\">{{ option.name }}</label>
                        <div id=\"input-option-{{ option.product_option_id }}\">
                          {% for option_value in option.product_option_value %}
                            <div class=\"form-check\">
                              <input type=\"checkbox\" name=\"option[{{ option.product_option_id }}][]\" value=\"{{ option_value.product_option_value_id }}\" id=\"input-option-value-{{ option_value.product_option_value_id }}\" class=\"form-check-input\"/> 
\t\t\t\t\t\t\t                <label for=\"input-option-value-{{ option_value.product_option_value_id }}\" class=\"form-check-label\">
                                {% if option_value.image %}
                                  <img src=\"{{ option_value.image }}\" alt=\"{{ option_value.name }} {% if option_value.price %}{{ option_value.price_prefix }} {{ option_value.price }}{% endif %}\" class=\"img-thumbnail\"/>{% endif %}
                                {{ option_value.name }}
                                {% if option_value.price %}
                                  ({{ option_value.price_prefix }}{{ option_value.price }})
                                {% endif %}</label>
                            </div>
                          {% endfor %}
                        </div>
                        <div id=\"error-option-{{ option.product_option_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    {% endif %}

                    {% if option.type == 'text' %}
                      <div class=\"mb-3{% if option.required %} required{% endif %}\">
                        <label for=\"input-option-{{ option.product_option_id }}\" class=\"form-label\">{{ option.name }}</label> <input type=\"text\" name=\"option[{{ option.product_option_id }}]\" value=\"{{ option.value }}\" placeholder=\"{{ option.name }}\" id=\"input-option-{{ option.product_option_id }}\" class=\"form-control\"/>
                        <div id=\"error-option-{{ option.product_option_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    {% endif %}

                    {% if option.type == 'textarea' %}
                      <div class=\"mb-3{% if option.required %} required{% endif %}\">
                        <label for=\"input-option-{{ option.product_option_id }}\" class=\"form-label\">{{ option.name }}</label> <textarea name=\"option[{{ option.product_option_id }}]\" rows=\"5\" placeholder=\"{{ option.name }}\" id=\"input-option-{{ option.product_option_id }}\" class=\"form-control\">{{ option.value }}</textarea>
                        <div id=\"error-option-{{ option.product_option_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    {% endif %}

                    {% if option.type == 'file' %}
                      <div class=\"mb-3{% if option.required %} required{% endif %}\">
                        <label for=\"button-upload-{{ option.product_option_id }}\" class=\"form-label\">{{ option.name }}</label>
                        <div>
                          <button type=\"button\" id=\"button-upload-{{ option.product_option_id }}\" data-oc-toggle=\"upload\" data-oc-url=\"{{ upload }}\" data-oc-target=\"#input-option-{{ option.product_option_id }}\" data-oc-size-max=\"{{ config_file_max_size }}\" data-oc-size-error=\"{{ error_upload_size }}\" class=\"btn btn-light btn-block\"><i class=\"fa-solid fa-upload\"></i> {{ button_upload }}</button>
                          <input type=\"hidden\" name=\"option[{{ option.product_option_id }}]\" value=\"\" id=\"input-option-{{ option.product_option_id }}\"/>
                        </div>
                        <div id=\"error-option-{{ option.product_option_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    {% endif %}

                    {% if option.type == 'date' %}
                      <div class=\"mb-3{% if option.required %} required{% endif %}\">
                        <label for=\"input-option-{{ option.product_option_id }}\" class=\"form-label\">{{ option.name }}</label>
                        <input type=\"date\" name=\"option[{{ option.product_option_id }}]\" value=\"{{ option.value }}\" id=\"input-option-{{ option.product_option_id }}\" class=\"form-control\"/>
                        <div id=\"error-option-{{ option.product_option_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    {% endif %}

                    {% if option.type == 'time' %}
                      <div class=\"mb-3{% if option.required %} required{% endif %}\">
                        <label for=\"input-option-{{ option.product_option_id }}\" class=\"form-label\">{{ option.name }}</label>
                        <input type=\"time\" name=\"option[{{ option.product_option_id }}]\" value=\"{{ option.value }}\" id=\"input-option-{{ option.product_option_id }}\" class=\"form-control\"/>
                        <div id=\"error-option-{{ option.product_option_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    {% endif %}

                    {% if option.type == 'datetime' %}
                      <div class=\"mb-3{% if option.required %} required{% endif %}\">
                        <label for=\"input-option-{{ option.product_option_id }}\" class=\"form-label\">{{ option.name }}</label>
                        <input type=\"datetime-local\" name=\"option[{{ option.product_option_id }}]\" value=\"{{ option.value }}\" id=\"input-option-{{ option.product_option_id }}\" class=\"form-control\"/>
                        <div id=\"error-option-{{ option.product_option_id }}\" class=\"invalid-feedback\"></div>
                      </div>
                    {% endif %}
                  {% endfor %}
                </div>
              {% endif %}

              {% if subscription_plans %}
                <hr/>
                <h3>{{ text_subscription }}</h3>
                <div class=\"mb-3 required\">
                  <select name=\"subscription_plan_id\" id=\"input-subscription\" class=\"form-select\">
                    <option value=\"\">{{ text_select }}</option>
                    {% for subscription_plan in subscription_plans %}
                      <option value=\"{{ subscription_plan.subscription_plan_id }}\">{{ subscription_plan.name }}</option>
                    {% endfor %}
                  </select>
                  {% for subscription_plan in subscription_plans %}
                    <div id=\"subscription-description-{{ subscription_plan.subscription_plan_id }}\" class=\"form-text subscription d-none\">{{ subscription_plan.description }}</div>
                  {% endfor %}
                  <div id=\"error-subscription\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}
              <div class=\"mb-3\">
                <div class=\"input-group\">
                  <div class=\"input-group-text\">{{ entry_qty }}</div>
                  <input type=\"text\" name=\"quantity\" value=\"{{ minimum }}\" size=\"2\" id=\"input-quantity\" class=\"form-control\"/>
                  <button type=\"submit\" id=\"button-cart\" class=\"btn btn-primary btn-lg btn-block\">{{ button_cart }}</button>
                </div>
                <input type=\"hidden\" name=\"product_id\" value=\"{{ product_id }}\" id=\"input-product-id\"/>
                <div id=\"error-quantity\" class=\"form-text\"></div>
              </div>
              {% if minimum > 1 %}
                <div class=\"alert alert-warning\"><i class=\"fa-solid fa-circle-info\"></i> {{ text_minimum }}</div>
              {% endif %}
            </form>
            </div>
          {% endif %}
        </div>
      </div>
      <ul class=\"nav nav-tabs\">
        <li class=\"nav-item\"><a href=\"#tab-description\" data-bs-toggle=\"tab\" class=\"nav-link active\">{{ tab_description }}</a></li>
        {% if attribute_groups %}
          <li class=\"nav-item\"><a href=\"#tab-specification\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_attribute }}</a></li>
        {% endif %}
        {% if review_status %}
          <li class=\"nav-item\"><a href=\"#tab-review\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_review }}</a></li>
        {% endif %}
      </ul>
      <div class=\"tab-content\">
        <div id=\"tab-description\" class=\"tab-pane fade show active mb-4\">{{ description }}
          {% if tags %}
            <p>{{ text_tags }}
              {% for tag in tags %}
                <a href=\"{{ tag.href }}\">{{ tag.tag }}</a>{% if not loop.last %},{% endif %}
              {% endfor %}
            </p>
          {% endif %}
        </div>
        {% if attribute_groups %}
          <div id=\"tab-specification\" class=\"tab-pane fade\">
            <div class=\"table-responsive\">
              <table class=\"table table-bordered\">
                {% for attribute_group in attribute_groups %}
                  <thead>
                    <tr>
                      <td colspan=\"2\"><strong>{{ attribute_group.name }}</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    {% for attribute in attribute_group.attribute %}
                      <tr>
                        <td>{{ attribute.name }}</td>
                        <td>{{ attribute.text }}</td>
                      </tr>
                    {% endfor %}
                  </tbody>
                {% endfor %}
              </table>
            </div>
          </div>
        {% endif %}
        {% if review_status %}
          <div id=\"tab-review\" class=\"tab-pane fade mb-4\">{{ review }}</div>
        {% endif %}
      </div>
      {{ related }}
      {{ content_bottom }}
    </div>
    {{ column_right }}
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('#input-subscription').on('change', function(e) {
    var element = this;

    \$('.subscription').addClass('d-none');

    \$('#subscription-description-' + \$(element).val()).removeClass('d-none');
});

{% if cart_enabled %}
\$('#form-product').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=checkout/cart.add&language={{ language }}',
        type: 'post',
        data: \$('#form-product').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        cache: false,
        processData: false,
        beforeSend: function() {
            \$('#button-cart').button('loading');
        },
        complete: function() {
            \$('#button-cart').button('reset');
        },
        success: function(json) {
            console.log(json);

            \$('#form-product').find('.is-invalid').removeClass('is-invalid');
            \$('#form-product').find('.invalid-feedback').removeClass('d-block');

            var cart_alert_handled = false;

            if (typeof window.ocShowCartResponseAlerts === 'function') {
                cart_alert_handled = window.ocShowCartResponseAlerts(json);
            }

            if (json['error']) {
                for (key in json['error']) {
                    \$('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                    \$('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                }

                if (!cart_alert_handled) {
                    if (typeof json['error'] == 'string') {
                        \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                    } else if (json['error']['warning']) {
                        \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                    }
                }
            }

            if (json['success']) {
                if (!cart_alert_handled) {
                    \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                \$('#cart').load('index.php?route=common/cart.info&language={{ language }}');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});
{% endif %}

\$(document).ready(function() {
    \$('.magnific-popup').magnificPopup({
        type: 'image',
        delegate: 'a',
        gallery: {
            enabled: true
        }
    });
});
//--></script>
{{ footer }}
", "catalog/view/template/product/product.twig", "/Applications/MAMP/htdocs/catalog/view/template/product/product.twig");
    }
}
