<?php

/* @Installation/tablesCreation.twig */
class __TwigTemplate_c4ccc73d2a7b44ef5d2efb04e5144cae6b29aad5148c48debf3c3cf991f3d30d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Installation/layout.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Installation/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<h2>";
        // line 5
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Tables")), "html", null, true);
        echo "</h2>

";
        // line 7
        if (array_key_exists("someTablesInstalled", $context)) {
            // line 8
            echo "    <div class=\"warning\">";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesWithSameNamesFound", "<span id='linkToggle'>", "</span>"));
            echo "
        <img src=\"plugins/Zeitgeist/images/warning_medium.png\"/>
    </div>
    <div id=\"toggle\" style=\"display:none;color:#4F2410;font-size: small;\">
            <em>";
            // line 12
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesFound")), "html", null, true);
            echo ": <br/>
                ";
            // line 13
            echo twig_escape_filter($this->env, (isset($context["tablesInstalled"]) ? $context["tablesInstalled"] : $this->getContext($context, "tablesInstalled")), "html", null, true);
            echo " </em>
    </div>
    ";
            // line 15
            if (array_key_exists("showReuseExistingTables", $context)) {
                // line 16
                echo "        <p>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesWarningHelp")), "html", null, true);
                echo "</p>
        <p class=\"nextStep\"><a href=\"";
                // line 17
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("action" => "reuseTables"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesReuse")), "html", null, true);
                echo " &raquo;</a></p>
    ";
            } else {
                // line 19
                echo "        <p class=\"nextStep\"><a href=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("action" => (isset($context["previousPreviousModuleName"]) ? $context["previousPreviousModuleName"] : $this->getContext($context, "previousPreviousModuleName"))))), "html", null, true);
                echo "\">&laquo; ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_GoBackAndDefinePrefix")), "html", null, true);
                echo "</a></p>
    ";
            }
            // line 21
            echo "    <p class=\"nextStep\"><a href=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("deleteTables" => 1))), "html", null, true);
            echo "\" id=\"eraseAllTables\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesDelete")), "html", null, true);
            echo " &raquo;</a></p>
";
        }
        // line 23
        echo "
";
        // line 24
        if (array_key_exists("existingTablesDeleted", $context)) {
            // line 25
            echo "    <div class=\"success\"> ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesDeletedSuccess")), "html", null, true);
            echo "
        <img src=\"plugins/Zeitgeist/images/success_medium.png\"/></div>
";
        }
        // line 28
        echo "
";
        // line 29
        if (array_key_exists("tablesCreated", $context)) {
            // line 30
            echo "    <div class=\"success\"> ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_TablesCreatedSuccess")), "html", null, true);
            echo "
        <img src=\"plugins/Zeitgeist/images/success_medium.png\"/></div>
";
        }
        // line 33
        echo "
<script>
    \$(document).ready(function () {
        var strConfirmEraseTables = \"";
        // line 36
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_ConfirmDeleteExistingTables", (("[" . (isset($context["tablesInstalled"]) ? $context["tablesInstalled"] : $this->getContext($context, "tablesInstalled"))) . "]"))), "html", null, true);
        echo " \";

        // toggle the display of the tables detected during the installation when clicking
        // on the span \"linkToggle\"
        \$(\"#linkToggle\")
            .css(\"border-bottom\", \"thin dotted #ff5502\")

            .hover(function () {
                \$(this).css({ cursor: \"pointer\"});
            },
            function () {
                \$(this).css({ cursor: \"auto\"});
            })
            .css(\"border-bottom\", \"thin dotted #ff5502\")
            .click(function () {
                \$(\"#toggle\").toggle();
            });

        \$(\"#eraseAllTables\").click(function () {
            if (!confirm(strConfirmEraseTables)) {
                return false;
            }
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "@Installation/tablesCreation.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 36,  112 => 33,  105 => 30,  103 => 29,  100 => 28,  93 => 25,  91 => 24,  88 => 23,  80 => 21,  72 => 19,  65 => 17,  60 => 16,  58 => 15,  53 => 13,  49 => 12,  41 => 8,  39 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
