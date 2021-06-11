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

/* profile.html */
class __TwigTemplate_a53c81c5a02aab0772f4b83a3b76a22714ce538e9a932d87ab2893ed65c075ab extends Template
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
        echo "<div id=\"page\">
    <table>
        <tbody>
            <tr>
                <td>
                    <div class=\"module\">
                        <div class=\"header\">
                            <span class=\"online\">Connecté</span>
                            <span class=\"align-right\">";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "createdAccount", [], "any", false, false, false, 9), "html", null, true);
        echo "</span>
                        </div>
                        <div class=\"profile-image\">
                            <img src=\"/Model/images/icon.jpg\" alt=\"Photo de profile\">
                        </div>
                        <div class=\"content\">
                            <h2>";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "username", [], "any", false, false, false, 15), "html", null, true);
        echo "</h2>
                            <div class=\"informations\">
                                <h3>Informations privées</h3>
                                <hr>
                                <form action=\"editprofile\" method=\"post\">
                                    <div class=\"line\">
                                        <span>Pays: ";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "country", [], "any", false, false, false, 21), "html", null, true);
        echo " </span><a href=\"#\"
                                            class=\"align-right spaced\">[modifier]</a>
                                    </div>
                                    <div class=\"line\">
                                        <span>Adresse e-mail:
                                            ";
        // line 26
        if (twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "email", [], "any", false, false, false, 26))) {
            // line 27
            echo "                                                Aucune
                                            ";
        } else {
            // line 29
            echo "                                                ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "email", [], "any", false, false, false, 29), "html", null, true);
            echo "
                                            ";
        }
        // line 31
        echo "                                        </span><a href=\"#\" class=\"align-right spaced\">[modifier]</a>
                                    </div>
                                    <div class=\"line\">
                                        <span>Mot-de-passe: *********</span>
                                        <a href=\"#\" class=\"align-right spaced\">[modifier]</a>
                                    </div>
                                </form>
                                <hr>
                                <div class=\"line\">
                                    <span><a href=\"#\">Supprimer mon compte et ses données</a></span>

                                </div>
                                <div class=\"line\">
                                    <span><a href=\"#\">Voir les CGU</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class=\"module\">
                        <div class=\"part\">
                            <span class=\"name\">Amis (";
        // line 53
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["friends"] ?? null)), "html", null, true);
        echo ")</span>
                            <div class=\"widget-content\">
                                ";
        // line 55
        if (1 === twig_compare(twig_length_filter($this->env, ($context["friends"] ?? null)), 0)) {
            // line 56
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["friends"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["playerData"]) {
                // line 57
                echo "                                        <div class='case-friend'>
                                            <img src='";
                // line 58
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["playerData"], 1, [], "any", false, false, false, 58), "html", null, true);
                echo "' title='";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["playerData"], 0, [], "any", false, false, false, 58), "html", null, true);
                echo "'>
                                            ";
                // line 59
                if (twig_get_attribute($this->env, $this->source, $context["playerData"], 2, [], "any", false, false, false, 59)) {
                    // line 60
                    echo "                                            <div class='info-logged online' title=\"Ce joueur est en ligne\"></div>
                                            ";
                } else {
                    // line 62
                    echo "                                            <div class='info-logged offline' title=\"Ce joueur est hors ligne\"></div>
                                            ";
                }
                // line 64
                echo "                                        </div>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['playerData'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "                                ";
        } else {
            // line 67
            echo "                                    <span>Me laisse pas solo</span>
                                ";
        }
        // line 69
        echo "                            </div>
                        </div>
                        <div class=\"part\">
                            <span class=\"name\">Historique des parties</span>
                            <div class=\"widget-content\">
                                <div class=\"partie\"><span class=\"vs\">AngeloTMX <span class=\"mid\">vs.</span>
                                        Admin</span><span class=\"state victory align-right\">Victoire</span></div>
                                <div class=\"partie\"><span class=\"vs\">AngeloTMX <span class=\"mid\">vs.</span>
                                        Robot</span><span class=\"state victory align-right\">Victoire</span></div>
                                <div class=\"partie\"><span class=\"vs\">AngeloTMX <span class=\"mid\">vs.</span>
                                        Robot</span><span class=\"state loose align-right\">Défaite</span></div>
                                <div class=\"partie\"><span class=\"vs\">AngeloTMX <span class=\"mid\">vs.</span>
                                        Admin4</span><span class=\"state victory align-right\">Victoire</span></div>
                                <div class=\"partie\"><span class=\"vs\">AngeloTMX <span class=\"mid\">vs.</span>
                                        AngeloTMX2</span><span class=\"state loose align-right\">Défaite</span></div>
                            </div>
                        </div>
                        <div class=\"part\">
                            <span class=\"name\">Statistiques</span>
                            <div class=\"widget-content\">
                                <div class=\"line\"><span>Nombres de parties jouées: 4</span></div>
                                <div class=\"line\"><span>Ratio V/D : 1.00/1.00</span></div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>";
    }

    public function getTemplateName()
    {
        return "profile.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 69,  150 => 67,  147 => 66,  140 => 64,  136 => 62,  132 => 60,  130 => 59,  124 => 58,  121 => 57,  116 => 56,  114 => 55,  109 => 53,  85 => 31,  79 => 29,  75 => 27,  73 => 26,  65 => 21,  56 => 15,  47 => 9,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "profile.html", "C:\\wamp64\\www\\puissance4\\View\\profile.html");
    }
}
