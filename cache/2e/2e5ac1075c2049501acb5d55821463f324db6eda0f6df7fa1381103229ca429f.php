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

/* nav.html */
class __TwigTemplate_d589f8ebf6a8f567a40f12ecb4d7b0c98490627fa394adb31ca5c9787c6865de extends Template
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
        echo "<script type=\"text/javascript\" src=\"/Controller/scripts/panel.js\"></script>
<div id=\"mySidenav\" class=\"sidenav\">
    <a href=\"javascript:void(0)\" class=\"closebtn\" onclick=\"closeNav()\">&times;</a>
    <h2>Puissance 4</h2>

    ";
        // line 6
        if (($context["isConnected"] ?? null)) {
            // line 7
            echo "        <div class=\"icon\">
        ";
            // line 8
            if ((0 === twig_compare(($context["path"] ?? null), "/play") || 0 === twig_compare(($context["path"] ?? null), "/"))) {
                // line 9
                echo "            <a href=\"#\" class=\"actual\"><div class=\"iconi\"><i class=\"far fa-circle\"></i></div>
            <p class=\"navtxt\">Jouer</p></a>
        ";
            } else {
                // line 12
                echo "            <a href=\"/play\"><div class=\"iconi\"><i class=\"far fa-circle\"></i></div>
            <p class=\"navtxt\">Jouer</p></a>
        ";
            }
            // line 15
            echo "        </div>
        <div class=\"icon\">
        ";
            // line 17
            if (0 === twig_compare(($context["path"] ?? null), "/account/me")) {
                // line 18
                echo "            <a href=\"#\" class=\"actual\"><div class=\"iconi\"><i class=\"far fa-user-circle\"></i></div>
            <p class=\"navtxt\">Mon profil</p></a>
        ";
            } else {
                // line 21
                echo "            <a href=\"/account/me\"><div class=\"iconi\"><i class=\"far fa-user-circle\"></i></div>
            <p class=\"navtxt\">Mon profil</p></a>
        ";
            }
            // line 24
            echo "        </div>
        <div class=\"icon\">
        ";
            // line 26
            if (0 === twig_compare(($context["path"] ?? null), "/members")) {
                // line 27
                echo "            <a href=\"#\" class=\"actual\"><div class=\"iconi\"><i class=\"fas fa-coffee\"></i></div>
            <p class=\"navtxt\">Membres</p></a>
        ";
            } else {
                // line 30
                echo "            <a href=\"/members\"><div class=\"iconi\"><i class=\"fas fa-coffee\"></i></div>
            <p class=\"navtxt\">Membres</p></a>
        ";
            }
            // line 33
            echo "        </div>
        <div class=\"icon\">
            <a href=\"/account/logout\"><div class=\"iconi\"><i class=\"fas fa-sign-out-alt\"></i></div>
            <p class=\"navtxt\">Déconnexion</p></a>
        </div>
    ";
        } else {
            // line 39
            echo "        <div class=\"icon\">
        ";
            // line 40
            if (0 === twig_compare(($context["path"] ?? null), "/play")) {
                // line 41
                echo "            <a href=\"#\" class=\"actual\"><div class=\"iconi\"><i class=\"far fa-circle\"></i></div>
            <p class=\"navtxt\">Jouer</p></a>
        ";
            } else {
                // line 44
                echo "            <a href=\"/play\"><div class=\"iconi\"><i class=\"far fa-circle\"></i></div>
            <p class=\"navtxt\">Jouer</p></a>
        ";
            }
            // line 47
            echo "        </div>
        <div class=\"icon\">
        ";
            // line 49
            if (0 === twig_compare(($context["path"] ?? null), "/account/login")) {
                // line 50
                echo "            <a href=\"#\" class=\"actual\"><div class=\"iconi\"><i class=\"fas fa-key\"></i></div>
            <p class=\"navtxt\">Se connecter</p></a>
        ";
            } else {
                // line 53
                echo "            <a href=\"/account/login\"><div class=\"iconi\"><i class=\"fas fa-key\"></i></div>
            <p class=\"navtxt\">Se connecter</p></a>
        ";
            }
            // line 56
            echo "        </div>
        <div class=\"icon\">
        ";
            // line 58
            if (0 === twig_compare(($context["path"] ?? null), "/account/register")) {
                // line 59
                echo "            <a href=\"#\" class=\"actual\"><div class=\"iconi\"><i class=\"fas fa-door-open\"></i></div>
            <p class=\"navtxt\">S\\'enregistrer</p></a>
        ";
            } else {
                // line 62
                echo "            <a href=\"/account/register\"><div class=\"iconi\"><i class=\"fas fa-door-open\"></i></div>
            <p class=\"navtxt\">S\\'enregistrer</p></a>
        ";
            }
            // line 65
            echo "        </div>
    ";
        }
        // line 67
        echo "</div>

<div id=\"panel\">
    <span onclick=\"openNav()\">&#9776; Menu</span>
</div>";
    }

    public function getTemplateName()
    {
        return "nav.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 67,  148 => 65,  143 => 62,  138 => 59,  136 => 58,  132 => 56,  127 => 53,  122 => 50,  120 => 49,  116 => 47,  111 => 44,  106 => 41,  104 => 40,  101 => 39,  93 => 33,  88 => 30,  83 => 27,  81 => 26,  77 => 24,  72 => 21,  67 => 18,  65 => 17,  61 => 15,  56 => 12,  51 => 9,  49 => 8,  46 => 7,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "nav.html", "C:\\wamp64\\www\\puissance4\\View\\nav.html");
    }
}
