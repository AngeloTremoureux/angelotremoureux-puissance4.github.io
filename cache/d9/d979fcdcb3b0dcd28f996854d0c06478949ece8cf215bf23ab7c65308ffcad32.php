<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* header.html */
class __TwigTemplate_cc69832449f993ca8c80d0f5830ea285e81841a9d149625f7a778b9735a29d37 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<title>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["template"] ?? null), "title", [], "any", false, false, false, 1), "html", null, true);
        echo "</title>
<meta charset=\"utf-8\">

<!-- BEGIN LINKS -->

<link rel=\"icon\" href=\"../Model/images/pion_bleu.png\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"/styles/style.css\">
<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" 
integrity=\"sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl\" crossorigin=\"anonymous\">
";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["template"] ?? null), "metaLink", [], "any", false, false, false, 10));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 11
            echo "<link rel=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["link"], "rel", [], "any", false, false, false, 11), "html", null, true);
            echo "\" type=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["link"], "type", [], "any", false, false, false, 11), "html", null, true);
            echo "\" href=\"/styles/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["link"], "href", [], "any", false, false, false, 11), "html", null, true);
            echo "\">
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "
<!-- END LINKS -->
<!-- BEGIN SCRIPTS-->

<script src=\"https://kit.fontawesome.com/f1e20245fc.js\" crossorigin=\"anonymous\"></script>
<script src=\"https://code.jquery.com/jquery-3.5.1.min.js\" integrity=\"sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=\" crossorigin=\"anonymous\"></script>
";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["template"] ?? null), "metaScript", [], "any", false, false, false, 19));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 20
            echo "<script src=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["script"], "src", [], "any", false, false, false, 20), "html", null, true);
            echo "\"></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "
<!-- END SCRIPTS -->";
    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 22,  79 => 20,  75 => 19,  67 => 13,  54 => 11,  50 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "header.html", "C:\\wamp64\\www\\puissance4\\View\\header.html");
    }
}
