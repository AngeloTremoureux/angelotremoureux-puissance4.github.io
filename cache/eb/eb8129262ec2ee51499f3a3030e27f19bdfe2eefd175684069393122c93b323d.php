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

/* template.html */
class __TwigTemplate_11d560e13eefa5b7774fe2345b20cf893a8d2bddf7661f69e0518cdb35eb5760 extends Template
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
        echo "<!DOCTYPE html>
<html lang=\"fr\">
    <head>
        ";
        // line 4
        echo twig_include($this->env, $context, "header.html");
        echo "
    </head>
    <body>
        ";
        // line 7
        $this->loadTemplate("nav.html", "template.html", 7)->display(twig_array_merge($context, ($context["navbar"] ?? null)));
        // line 8
        echo "        ";
        $this->loadTemplate(($context["pagePath"] ?? null), "template.html", 8)->display(twig_array_merge($context, ($context["template"] ?? null)));
        // line 9
        echo "    </body>
</html>

";
    }

    public function getTemplateName()
    {
        return "template.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 9,  50 => 8,  48 => 7,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "template.html", "C:\\wamp64\\www\\puissance4\\View\\template.html");
    }
}
