<?php

/* @Login/login.twig */
class __TwigTemplate_2b418df3bf66babaa92694d3944875880f887f04cd3896afcc0d9645a7a3fce0 extends Twig_Template
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
        echo "<!DOCTYPE html>
<!--[if lt IE 9 ]>
<html class=\"old-ie\"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html><!--<![endif]-->
<head>
    <meta charset=\"utf-8\">
    <title>";
        // line 8
        if (((isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo")) == false)) {
            echo "Piwik &rsaquo; ";
        }
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
        echo "</title>

    ";
        // line 10
        $this->env->loadTemplate("@CoreHome/_favicon.twig")->display($context);
        // line 11
        echo "    ";
        // line 12
        echo "    ";
        echo call_user_func_array($this->env->getFunction('includeAssets')->getCallable(), array(array("type" => "css")));
        echo "
    ";
        // line 14
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"plugins/Login/stylesheets/login.css\"/>
    <meta name=\"description\" content=\"";
        // line 15
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OpenSourceWebAnalytics")), "html", null, true);
        echo "\"/>
    <meta name=\"apple-itunes-app\" content=\"app-id=737216887\" />
    <meta name=\"google-play-app\" content=\"app-id=org.piwik.mobile2\">
    ";
        // line 18
        $this->env->loadTemplate("_jsCssIncludes.twig")->display($context);
        // line 19
        echo "    <script type=\"text/javascript\" src=\"libs/jquery/jquery.placeholder.js\"></script>
    <!--[if lt IE 9]>
    <script src=\"libs/html5shiv/html5shiv.js\"></script>
    <![endif]-->
    <script type=\"text/javascript\" src=\"libs/jquery/jquery.smartbanner.js\"></script>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"libs/jquery/stylesheets/jquery.smartbanner.css\" />

    <script type=\"text/javascript\">
        \$(function () {
            \$('#form_login').focus();
            \$('input').placeholder();
            \$.smartbanner({title: \"Piwik Mobile 2\", author: \"Piwik team\", icon: \"plugins/CoreHome/images/googleplay.png\"});
        });
\t</script>
\t</head>
\t<body id=\"loginPage\">
    ";
        // line 35
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.beforeTopBar", "login"));
        echo "
    ";
        // line 36
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.beforeContent", "login"));
        echo "

    ";
        // line 38
        $this->env->loadTemplate("_iframeBuster.twig")->display($context);
        // line 39
        echo "
    <div id=\"notificationContainer\">
    </div>

    <div id=\"logo\">
        ";
        // line 44
        if (((isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo")) == false)) {
            // line 45
            echo "            <a href=\"http://piwik.org\" title=\"";
            echo twig_escape_filter($this->env, (isset($context["linkTitle"]) ? $context["linkTitle"] : $this->getContext($context, "linkTitle")), "html", null, true);
            echo "\">
        ";
        }
        // line 47
        echo "        ";
        if ((isset($context["hasSVGLogo"]) ? $context["hasSVGLogo"] : $this->getContext($context, "hasSVGLogo"))) {
            // line 48
            echo "            <img src='";
            echo twig_escape_filter($this->env, (isset($context["logoSVG"]) ? $context["logoSVG"] : $this->getContext($context, "logoSVG")), "html", null, true);
            echo "' title=\"";
            echo twig_escape_filter($this->env, (isset($context["linkTitle"]) ? $context["linkTitle"] : $this->getContext($context, "linkTitle")), "html", null, true);
            echo "\" alt=\"Piwik\" class=\"ie-hide\"/>
            <!--[if lt IE 9]>
        ";
        }
        // line 51
        echo "        <img src='";
        echo twig_escape_filter($this->env, (isset($context["logoLarge"]) ? $context["logoLarge"] : $this->getContext($context, "logoLarge")), "html", null, true);
        echo "' title=\"";
        echo twig_escape_filter($this->env, (isset($context["linkTitle"]) ? $context["linkTitle"] : $this->getContext($context, "linkTitle")), "html", null, true);
        echo "\" alt=\"Piwik\" />
        ";
        // line 52
        if ((isset($context["hasSVGLogo"]) ? $context["hasSVGLogo"] : $this->getContext($context, "hasSVGLogo"))) {
            echo "<![endif]-->";
        }
        // line 53
        echo "
        ";
        // line 54
        if ((isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo"))) {
            // line 55
            echo "            ";
            ob_start();
            // line 56
            echo "            <i><a href=\"http://piwik.org/\" target=\"_blank\">";
            echo twig_escape_filter($this->env, (isset($context["linkTitle"]) ? $context["linkTitle"] : $this->getContext($context, "linkTitle")), "html", null, true);
            echo "</a></i>
            ";
            $context["poweredByPiwik"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 58
            echo "        ";
        }
        // line 59
        echo "
        ";
        // line 60
        if (((isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo")) == false)) {
            // line 61
            echo "            </a>
            <div class=\"description\">
                <a href=\"http://piwik.org\" title=\"";
            // line 63
            echo twig_escape_filter($this->env, (isset($context["linkTitle"]) ? $context["linkTitle"] : $this->getContext($context, "linkTitle")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["linkTitle"]) ? $context["linkTitle"] : $this->getContext($context, "linkTitle")), "html", null, true);
            echo "</a>
                <div class=\"arrow\"></div>
            </div>
        ";
        }
        // line 67
        echo "    </div>

    <section class=\"loginSection\">

        ";
        // line 72
        echo "        ";
        if (((array_key_exists("isValidHost", $context) && array_key_exists("invalidHostMessage", $context)) && ((isset($context["isValidHost"]) ? $context["isValidHost"] : $this->getContext($context, "isValidHost")) == false))) {
            // line 73
            echo "            ";
            $this->env->loadTemplate("@CoreHome/_warningInvalidHost.twig")->display($context);
            // line 74
            echo "        ";
        } else {
            // line 75
            echo "            <div id=\"message_container\">
                ";
            // line 76
            if ($this->getAttribute((isset($context["form_data"]) ? $context["form_data"] : $this->getContext($context, "form_data")), "errors")) {
                // line 77
                echo "                    <div class=\"message_error\">
                        ";
                // line 78
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form_data"]) ? $context["form_data"] : $this->getContext($context, "form_data")), "errors"));
                foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                    // line 79
                    echo "                            <strong>";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Error")), "html", null, true);
                    echo "</strong>: ";
                    echo (isset($context["data"]) ? $context["data"] : $this->getContext($context, "data"));
                    echo "<br/>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 81
                echo "                    </div>
                ";
            }
            // line 83
            echo "
                ";
            // line 84
            if ((isset($context["AccessErrorString"]) ? $context["AccessErrorString"] : $this->getContext($context, "AccessErrorString"))) {
                // line 85
                echo "                    <div class=\"message_error\">
                        <strong>";
                // line 86
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Error")), "html", null, true);
                echo "</strong>: ";
                echo (isset($context["AccessErrorString"]) ? $context["AccessErrorString"] : $this->getContext($context, "AccessErrorString"));
                echo "<br/>
                    </div>
                ";
            }
            // line 89
            echo "
                ";
            // line 90
            if ((isset($context["infoMessage"]) ? $context["infoMessage"] : $this->getContext($context, "infoMessage"))) {
                // line 91
                echo "                    <p class=\"message\">";
                echo (isset($context["infoMessage"]) ? $context["infoMessage"] : $this->getContext($context, "infoMessage"));
                echo "</p>
                ";
            }
            // line 93
            echo "            </div>
            <form ";
            // line 94
            echo $this->getAttribute((isset($context["form_data"]) ? $context["form_data"] : $this->getContext($context, "form_data")), "attributes");
            echo ">
                <h1>";
            // line 95
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
            echo "</h1>
                <fieldset class=\"inputs\">
                    <input type=\"text\" name=\"form_login\" id=\"login_form_login\" class=\"input\" value=\"\" size=\"20\"
                           tabindex=\"10\"
                           placeholder=\"";
            // line 99
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Username")), "html", null, true);
            echo "\" autofocus=\"autofocus\"/>
                    <input type=\"password\" name=\"form_password\" id=\"login_form_password\" class=\"input\" value=\"\" size=\"20\"
                           tabindex=\"20\"
                           placeholder=\"";
            // line 102
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Password")), "html", null, true);
            echo "\"/>
                    <input type=\"hidden\" name=\"form_nonce\" id=\"login_form_nonce\" value=\"";
            // line 103
            echo twig_escape_filter($this->env, (isset($context["nonce"]) ? $context["nonce"] : $this->getContext($context, "nonce")), "html", null, true);
            echo "\"/>
                </fieldset>

                <fieldset class=\"actions\">
                    <input name=\"form_rememberme\" type=\"checkbox\" id=\"login_form_rememberme\" value=\"1\" tabindex=\"90\"
                           ";
            // line 108
            if ($this->getAttribute($this->getAttribute((isset($context["form_data"]) ? $context["form_data"] : $this->getContext($context, "form_data")), "form_rememberme"), "value")) {
                echo "checked=\"checked\" ";
            }
            echo "/>
                    <label for=\"login_form_rememberme\">";
            // line 109
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_RememberMe")), "html", null, true);
            echo "</label>
                    <input class=\"submit\" id='login_form_submit' type=\"submit\" value=\"";
            // line 110
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
            echo "\"
                           tabindex=\"100\"/>
                </fieldset>
            </form>
            <form id=\"reset_form\" style=\"display:none;\">
                <fieldset class=\"inputs\">
                    <input type=\"text\" name=\"form_login\" id=\"reset_form_login\" class=\"input\" value=\"\" size=\"20\"
                           tabindex=\"10\"
                           placeholder=\"";
            // line 118
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LoginOrEmail")), "html", null, true);
            echo "\"/>
                    <input type=\"hidden\" name=\"form_nonce\" id=\"reset_form_nonce\" value=\"";
            // line 119
            echo twig_escape_filter($this->env, (isset($context["nonce"]) ? $context["nonce"] : $this->getContext($context, "nonce")), "html", null, true);
            echo "\"/>

                    <input type=\"password\" name=\"form_password\" id=\"reset_form_password\" class=\"input\" value=\"\" size=\"20\"
                           tabindex=\"20\" autocomplete=\"off\"
                           placeholder=\"";
            // line 123
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Password")), "html", null, true);
            echo "\"/>

                    <input type=\"password\" name=\"form_password_bis\" id=\"reset_form_password_bis\" class=\"input\" value=\"\"
                           size=\"20\" tabindex=\"30\" autocomplete=\"off\"
                           placeholder=\"";
            // line 127
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_PasswordRepeat")), "html", null, true);
            echo "\"/>
                </fieldset>

                <fieldset class=\"actions\">
                    <span class=\"loadingPiwik\" style=\"display:none;\">
                        <img alt=\"Loading\" src=\"plugins/Zeitgeist/images/loading-blue.gif\"/>
                    </span>
                    <input class=\"submit\" id='reset_form_submit' type=\"submit\"
                           value=\"";
            // line 135
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ChangePassword")), "html", null, true);
            echo "\" tabindex=\"100\"/>
                </fieldset>

                <input type=\"hidden\" name=\"module\" value=\"";
            // line 138
            echo twig_escape_filter($this->env, (isset($context["loginModule"]) ? $context["loginModule"] : $this->getContext($context, "loginModule")), "html", null, true);
            echo "\"/>
                <input type=\"hidden\" name=\"action\" value=\"resetPassword\"/>
            </form>
            <p id=\"nav\">
                <a id=\"login_form_nav\" href=\"#\"
                   title=\"";
            // line 143
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LostYourPassword")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LostYourPassword")), "html", null, true);
            echo "</a>
                <a id=\"alternate_reset_nav\" href=\"#\" style=\"display:none;\"
                   title=\"";
            // line 145
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
            echo "</a>
                <a id=\"reset_form_nav\" href=\"#\" style=\"display:none;\"
                   title=\"";
            // line 147
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Mobile_NavigationBack")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Cancel")), "html", null, true);
            echo "</a>
            </p>
            ";
            // line 149
            if (array_key_exists("poweredByPiwik", $context)) {
                // line 150
                echo "                <p id=\"piwik\">
                    ";
                // line 151
                echo twig_escape_filter($this->env, (isset($context["poweredByPiwik"]) ? $context["poweredByPiwik"] : $this->getContext($context, "poweredByPiwik")), "html", null, true);
                echo "
                </p>
            ";
            }
            // line 154
            echo "            <div id=\"lost_password_instructions\" style=\"display:none;\">
                <p class=\"message\">";
            // line 155
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_ResetPasswordInstructions")), "html", null, true);
            echo "</p>
            </div>
        ";
        }
        // line 158
        echo "    </section>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "@Login/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  364 => 158,  358 => 155,  355 => 154,  349 => 151,  346 => 150,  344 => 149,  337 => 147,  330 => 145,  323 => 143,  315 => 138,  309 => 135,  298 => 127,  291 => 123,  284 => 119,  280 => 118,  269 => 110,  265 => 109,  259 => 108,  251 => 103,  247 => 102,  241 => 99,  234 => 95,  230 => 94,  227 => 93,  221 => 91,  219 => 90,  216 => 89,  208 => 86,  205 => 85,  203 => 84,  200 => 83,  196 => 81,  185 => 79,  181 => 78,  178 => 77,  176 => 76,  173 => 75,  170 => 74,  167 => 73,  164 => 72,  158 => 67,  149 => 63,  145 => 61,  143 => 60,  140 => 59,  137 => 58,  131 => 56,  128 => 55,  126 => 54,  123 => 53,  119 => 52,  112 => 51,  103 => 48,  100 => 47,  94 => 45,  92 => 44,  85 => 39,  83 => 38,  78 => 36,  74 => 35,  56 => 19,  54 => 18,  48 => 15,  45 => 14,  40 => 12,  38 => 11,  36 => 10,  28 => 8,  19 => 1,);
    }
}
