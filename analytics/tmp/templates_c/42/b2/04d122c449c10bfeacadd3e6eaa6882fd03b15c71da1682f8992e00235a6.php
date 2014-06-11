<?php

/* @LanguagesManager/getLanguagesSelector.twig */
class __TwigTemplate_42b204d122c449c10bfeacadd3e6eaa6882fd03b15c71da1682f8992e00235a6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<span class=\"topBarElem\">
\t<span id=\"languageSelection\">
\t\t<form action=\"index.php?module=LanguagesManager&amp;action=saveLanguage\" method=\"post\">
            <select name=\"language\" id=\"language\">
                <option title=\"\" value=\"\"
                        href=\"?module=Proxy&amp;action=redirect&amp;url=http://piwik.org/translations/\">";
        // line 6
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("LanguagesManager_AboutPiwikTranslations")), "html", null, true);
        echo "</option>
                ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : $this->getContext($context, "languages")));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 8
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["language"]) ? $context["language"] : $this->getContext($context, "language")), "code"), "html", null, true);
            echo "\" ";
            if (($this->getAttribute((isset($context["language"]) ? $context["language"] : $this->getContext($context, "language")), "code") == (isset($context["currentLanguageCode"]) ? $context["currentLanguageCode"] : $this->getContext($context, "currentLanguageCode")))) {
                echo "selected=\"selected\"";
            }
            // line 9
            echo "                            title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["language"]) ? $context["language"] : $this->getContext($context, "language")), "name"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["language"]) ? $context["language"] : $this->getContext($context, "language")), "english_name"), "html", null, true);
            echo ")\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["language"]) ? $context["language"] : $this->getContext($context, "language")), "name"), "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "            </select>
            ";
        // line 13
        echo "            ";
        if (array_key_exists("token_auth", $context)) {
            echo "<input type=\"hidden\" name=\"token_auth\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["token_auth"]) ? $context["token_auth"] : $this->getContext($context, "token_auth")), "html", null, true);
            echo "\"/>";
        }
        // line 14
        echo "            <input type=\"submit\" value=\"go\"/>
        </form>
\t</span>
</span>
";
    }

    public function getTemplateName()
    {
        return "@LanguagesManager/getLanguagesSelector.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 14,  57 => 13,  54 => 11,  41 => 9,  34 => 8,  30 => 7,  26 => 6,  19 => 1,);
    }
}
