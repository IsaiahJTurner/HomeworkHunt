<?php

/* @Installation/_systemCheckSection.twig */
class __TwigTemplate_454f04229d10f30597231ef6c51c1bff71f358c7cc7893ede88753f5e8aee2d3 extends Twig_Template
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
        $context["ok"] = ('' === $tmp = "<img src='plugins/Zeitgeist/images/ok.png' />") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 2
        $context["error"] = ('' === $tmp = "<img src='plugins/Zeitgeist/images/error.png' />") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 3
        $context["warning"] = ('' === $tmp = "<img src='plugins/Zeitgeist/images/warning.png' />") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 4
        $context["link"] = ('' === $tmp = "<img src='plugins/Zeitgeist/images/link.gif' />") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 5
        echo "
<table class=\"infosServer\" id=\"systemCheckRequired\">
    <tr>
        ";
        // line 8
        ob_start();
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckPhp")), "html", null, true);
        echo " &gt; ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "phpVersion_minimum"), "html", null, true);
        $context["MinPHP"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 9
        echo "        <td class=\"label\">";
        echo twig_escape_filter($this->env, (isset($context["MinPHP"]) ? $context["MinPHP"] : $this->getContext($context, "MinPHP")), "html", null, true);
        echo "</td>

        <td>
            ";
        // line 12
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "phpVersion_ok")) {
            // line 13
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
            echo "
            ";
        } else {
            // line 15
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
            echo " <span class=\"err\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Error")), "html", null, true);
            echo ": ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Required", (isset($context["MinPHP"]) ? $context["MinPHP"] : $this->getContext($context, "MinPHP"))));
            echo "</span>
            ";
        }
        // line 17
        echo "        </td>
    </tr>
    <tr>
        <td class=\"label\">PDO ";
        // line 20
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Extension")), "html", null, true);
        echo "</td>
        <td>
            ";
        // line 22
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "pdo_ok")) {
            // line 23
            echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
        } else {
            // line 25
            echo "                -
            ";
        }
        // line 27
        echo "        </td>
    </tr>
    ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "adapters"));
        foreach ($context['_seq'] as $context["adapter"] => $context["port"]) {
            // line 30
            echo "        <tr>
            <td class=\"label\">";
            // line 31
            echo twig_escape_filter($this->env, (isset($context["adapter"]) ? $context["adapter"] : $this->getContext($context, "adapter")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Extension")), "html", null, true);
            echo "</td>
            <td>";
            // line 32
            echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['adapter'], $context['port'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "    ";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "adapters")) == 0)) {
            // line 36
            echo "        <tr>
            <td colspan=\"2\" class=\"error\" style=\"font-size: small;\">
                ";
            // line 38
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckDatabaseHelp")), "html", null, true);
            echo "
                <p>
                    ";
            // line 40
            if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "isWindows")) {
                // line 41
                echo "                        ";
                echo nl2br(call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckWinPdoAndMysqliHelp", "<br /><br /><code>extension=php_mysqli.dll</code><br /><code>extension=php_pdo.dll</code><br /><code>extension=php_pdo_mysql.dll</code><br />")));
                echo "
                    ";
            } else {
                // line 43
                echo "                        ";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckPdoAndMysqliHelp", "<br /><br /><code>--with-mysqli</code><br /><code>--with-pdo-mysql</code><br /><br />", "<br /><br /><code>extension=mysqli.so</code><br /><code>extension=pdo.so</code><br /><code>extension=pdo_mysql.so</code><br />"));
                echo "
                    ";
            }
            // line 45
            echo "                    ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_RestartWebServer")), "html", null, true);
            echo "
                    <br/>
                    <br/>
                    ";
            // line 48
            echo nl2br(call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckPhpPdoAndMysqli", "<a style=\"color:red\" href=\"http://php.net/pdo\">", "</a>", "<a style=\"color:red\" href=\"http://php.net/mysqli\">", "</a>")));
            echo "
                </p>
            </td>
        </tr>
    ";
        }
        // line 53
        echo "    <tr>
        <td class=\"label\">";
        // line 54
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckExtensions")), "html", null, true);
        echo "</td>
        <td>
            ";
        // line 56
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "needed_extensions"));
        foreach ($context['_seq'] as $context["_key"] => $context["needed_extension"]) {
            // line 57
            echo "                ";
            if (twig_in_filter((isset($context["needed_extension"]) ? $context["needed_extension"] : $this->getContext($context, "needed_extension")), $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "missing_extensions"))) {
                // line 58
                echo "                    ";
                echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
                echo "
                    ";
                // line 59
                $context["hasError"] = ('' === $tmp = "1") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 60
                echo "                ";
            } else {
                // line 61
                echo "                    ";
                echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
                echo "
                ";
            }
            // line 63
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["needed_extension"]) ? $context["needed_extension"] : $this->getContext($context, "needed_extension")), "html", null, true);
            echo "
                <br/>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['needed_extension'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "            <br/>";
        if (array_key_exists("hasError", $context)) {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_RestartWebServer")), "html", null, true);
        }
        // line 67
        echo "        </td>
    </tr>
    ";
        // line 69
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "missing_extensions")) > 0)) {
            // line 70
            echo "        <tr>
            <td colspan=\"2\" class=\"error\" style=\"font-size: small;\">
                ";
            // line 72
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "missing_extensions"));
            foreach ($context['_seq'] as $context["_key"] => $context["missing_extension"]) {
                // line 73
                echo "                    <p>
                        <em>";
                // line 74
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute((isset($context["helpMessages"]) ? $context["helpMessages"] : $this->getContext($context, "helpMessages")), (isset($context["missing_extension"]) ? $context["missing_extension"] : $this->getContext($context, "missing_extension")), array(), "array"))), "html", null, true);
                echo "</em>
                    </p>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['missing_extension'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "            </td>
        </tr>
    ";
        }
        // line 80
        echo "    <tr>
        <td class=\"label\">";
        // line 81
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckFunctions")), "html", null, true);
        echo "</td>
        <td>
            ";
        // line 83
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "needed_functions"));
        foreach ($context['_seq'] as $context["_key"] => $context["needed_function"]) {
            // line 84
            echo "                ";
            if (twig_in_filter((isset($context["needed_function"]) ? $context["needed_function"] : $this->getContext($context, "needed_function")), $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "missing_functions"))) {
                // line 85
                echo "                    ";
                echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
                echo "
                    <span class='err'>";
                // line 86
                echo twig_escape_filter($this->env, (isset($context["needed_function"]) ? $context["needed_function"] : $this->getContext($context, "needed_function")), "html", null, true);
                echo "</span>
                    ";
                // line 87
                $context["hasError"] = ('' === $tmp = "1") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 88
                echo "                    <p>
                        <em>";
                // line 89
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute((isset($context["helpMessages"]) ? $context["helpMessages"] : $this->getContext($context, "helpMessages")), (isset($context["needed_function"]) ? $context["needed_function"] : $this->getContext($context, "needed_function")), array(), "array"))), "html", null, true);
                echo "</em>
                    </p>
                ";
            } else {
                // line 92
                echo "                    ";
                echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, (isset($context["needed_function"]) ? $context["needed_function"] : $this->getContext($context, "needed_function")), "html", null, true);
                echo "
                    <br/>
                ";
            }
            // line 95
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['needed_function'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        echo "            <br/>";
        if (array_key_exists("hasError", $context)) {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_RestartWebServer")), "html", null, true);
        }
        // line 97
        echo "        </td>
    </tr>
    <tr>
        <td valign=\"top\">
            ";
        // line 101
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckWriteDirs")), "html", null, true);
        echo "
        </td>
        <td style=\"font-size: small;\">
            ";
        // line 104
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "directories"));
        foreach ($context['_seq'] as $context["dir"] => $context["bool"]) {
            // line 105
            echo "                ";
            if ((isset($context["bool"]) ? $context["bool"] : $this->getContext($context, "bool"))) {
                // line 106
                echo "                    ";
                echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
                echo "
                ";
            } else {
                // line 108
                echo "                    <span style=\"color:red;\">";
                echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
                echo "</span>
                ";
            }
            // line 110
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["dir"]) ? $context["dir"] : $this->getContext($context, "dir")), "html", null, true);
            echo "
                <br/>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['dir'], $context['bool'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "        </td>
    </tr>
    ";
        // line 115
        if ((isset($context["problemWithSomeDirectories"]) ? $context["problemWithSomeDirectories"] : $this->getContext($context, "problemWithSomeDirectories"))) {
            // line 116
            echo "        <tr>
            <td colspan=\"2\" class=\"error\">
                ";
            // line 118
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckWriteDirsHelp")), "html", null, true);
            echo ":
                ";
            // line 119
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "directories"));
            foreach ($context['_seq'] as $context["dir"] => $context["bool"]) {
                // line 120
                echo "                    <ul>
                        ";
                // line 121
                if ((!(isset($context["bool"]) ? $context["bool"] : $this->getContext($context, "bool")))) {
                    // line 122
                    echo "                            <li>
                                <pre>chmod a+w ";
                    // line 123
                    echo twig_escape_filter($this->env, (isset($context["dir"]) ? $context["dir"] : $this->getContext($context, "dir")), "html", null, true);
                    echo "</pre>
                            </li>
                        ";
                }
                // line 126
                echo "                    </ul>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['dir'], $context['bool'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 128
            echo "            </td>
        </tr>
    ";
        }
        // line 131
        echo "</table>
<br/>

<h2>";
        // line 134
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Optional")), "html", null, true);
        echo "</h2>
<table class=\"infos\" id=\"systemCheckOptional\">
    <tr>
        <td class=\"label\">";
        // line 137
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckFileIntegrity")), "html", null, true);
        echo "</td>
        <td>
            ";
        // line 139
        if (twig_test_empty($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "integrityErrorMessages"))) {
            // line 140
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
            echo "
            ";
        } else {
            // line 142
            echo "                ";
            if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "integrity")) {
                // line 143
                echo "                    ";
                echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
                echo "
                    <em>";
                // line 144
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "integrityErrorMessages"), 0, array(), "array"), "html", null, true);
                echo "</em>
                ";
            } else {
                // line 146
                echo "                    ";
                echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
                echo "
                    <em>";
                // line 147
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "integrityErrorMessages"), 0, array(), "array"), "html", null, true);
                echo "</em>
                ";
            }
            // line 149
            echo "                ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "integrityErrorMessages")) > 1)) {
                // line 150
                echo "                    <button id=\"more-results\" class=\"ui-button ui-state-default ui-corner-all\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Details")), "html", null, true);
                echo "</button>
                ";
            }
            // line 152
            echo "            ";
        }
        // line 153
        echo "        </td>
    </tr>
    <tr>
        <td class=\"label\">";
        // line 156
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckTracker")), "html", null, true);
        echo "</td>
        <td>
            ";
        // line 158
        if (($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "tracker_status") == 0)) {
            // line 159
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
            echo "
            ";
        } else {
            // line 161
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
            echo "
                <span class=\"warn\">";
            // line 162
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "tracker_status"), "html", null, true);
            echo "
                    <br/>";
            // line 163
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckTrackerHelp")), "html", null, true);
            echo " </span>
                <br/>
                ";
            // line 165
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_RestartWebServer")), "html", null, true);
            echo "
            ";
        }
        // line 167
        echo "        </td>
    </tr>
    <tr>
        <td class=\"label\">";
        // line 170
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckMemoryLimit")), "html", null, true);
        echo "</td>
        <td>
            ";
        // line 172
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "memory_ok")) {
            // line 173
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "memoryCurrent"), "html", null, true);
            echo "
            ";
        } else {
            // line 175
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
            echo "
                <span class=\"warn\">";
            // line 176
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "memoryCurrent"), "html", null, true);
            echo "</span>
                <br/>
                ";
            // line 178
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckMemoryLimitHelp")), "html", null, true);
            echo "
                ";
            // line 179
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_RestartWebServer")), "html", null, true);
            echo "
            ";
        }
        // line 181
        echo "        </td>
    </tr>
    <tr>
        <td class=\"label\">";
        // line 184
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_Timezone")), "html", null, true);
        echo "</td>
        <td>
            ";
        // line 186
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "timezone")) {
            // line 187
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
            echo "
            ";
        } else {
            // line 189
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
            echo "
                <span class=\"warn\">";
            // line 190
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_AdvancedTimezoneSupportNotFound")), "html", null, true);
            echo " </span>
                <br/>
                <a href=\"http://php.net/manual/en/datetime.installation.php\" target=\"_blank\">Timezone PHP documentation</a>
                .
            ";
        }
        // line 195
        echo "        </td>
    </tr>
    <tr>
        <td class=\"label\">";
        // line 198
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckOpenURL")), "html", null, true);
        echo "</td>
        <td>
            ";
        // line 200
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "openurl")) {
            // line 201
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "openurl"), "html", null, true);
            echo "
            ";
        } else {
            // line 203
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
            echo "
                <span class=\"warn\">";
            // line 204
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckOpenURLHelp")), "html", null, true);
            echo "</span>
            ";
        }
        // line 206
        echo "            ";
        if ((!$this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "can_auto_update"))) {
            // line 207
            echo "                <br/>
                ";
            // line 208
            echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
            echo " <span class=\"warn\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckAutoUpdateHelp")), "html", null, true);
            echo "</span>
            ";
        }
        // line 210
        echo "        </td>
    </tr>
    <tr>
        <td class=\"label\">";
        // line 213
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckGDFreeType")), "html", null, true);
        echo "</td>
        <td>
            ";
        // line 215
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "gd_ok")) {
            // line 216
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
            echo "
            ";
        } else {
            // line 218
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
            echo " <span class=\"warn\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckGDFreeType")), "html", null, true);
            echo "
                <br/>
                ";
            // line 220
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckGDHelp")), "html", null, true);
            echo " </span>
            ";
        }
        // line 222
        echo "        </td>
    </tr>
    <tr>
        <td class=\"label\">";
        // line 225
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckOtherExtensions")), "html", null, true);
        echo "</td>
        <td>
            ";
        // line 227
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "desired_extensions"));
        foreach ($context['_seq'] as $context["_key"] => $context["desired_extension"]) {
            // line 228
            echo "                ";
            if (twig_in_filter((isset($context["desired_extension"]) ? $context["desired_extension"] : $this->getContext($context, "desired_extension")), $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "missing_desired_extensions"))) {
                // line 229
                echo "                    ";
                echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
                echo "<span class=\"warn\">";
                echo twig_escape_filter($this->env, (isset($context["desired_extension"]) ? $context["desired_extension"] : $this->getContext($context, "desired_extension")), "html", null, true);
                echo "</span>
                    <p>";
                // line 230
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute((isset($context["helpMessages"]) ? $context["helpMessages"] : $this->getContext($context, "helpMessages")), (isset($context["desired_extension"]) ? $context["desired_extension"] : $this->getContext($context, "desired_extension")), array(), "array"))), "html", null, true);
                echo "</p>
                ";
            } else {
                // line 232
                echo "                    ";
                echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, (isset($context["desired_extension"]) ? $context["desired_extension"] : $this->getContext($context, "desired_extension")), "html", null, true);
                echo "
                    <br/>
                ";
            }
            // line 235
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['desired_extension'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 236
        echo "        </td>
    </tr>
    <tr>
        <td class=\"label\">";
        // line 239
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckOtherFunctions")), "html", null, true);
        echo "</td>
        <td>
            ";
        // line 241
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "desired_functions"));
        foreach ($context['_seq'] as $context["_key"] => $context["desired_function"]) {
            // line 242
            echo "                ";
            if (twig_in_filter((isset($context["desired_function"]) ? $context["desired_function"] : $this->getContext($context, "desired_function")), $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "missing_desired_functions"))) {
                // line 243
                echo "                    ";
                echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
                echo "
                    <span class=\"warn\">";
                // line 244
                echo twig_escape_filter($this->env, (isset($context["desired_function"]) ? $context["desired_function"] : $this->getContext($context, "desired_function")), "html", null, true);
                echo "</span>
                    <p>";
                // line 245
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute((isset($context["helpMessages"]) ? $context["helpMessages"] : $this->getContext($context, "helpMessages")), (isset($context["desired_function"]) ? $context["desired_function"] : $this->getContext($context, "desired_function")), array(), "array"))), "html", null, true);
                echo "</p>
                ";
            } else {
                // line 247
                echo "                    ";
                echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, (isset($context["desired_function"]) ? $context["desired_function"] : $this->getContext($context, "desired_function")), "html", null, true);
                echo "
                    <br/>
                ";
            }
            // line 250
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['desired_function'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 251
        echo "        </td>
    </tr>
    <tr>
        <td class=\"label\">";
        // line 254
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Filesystem")), "html", null, true);
        echo "</td>
        <td>
            ";
        // line 256
        if ((!$this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "is_nfs"))) {
            // line 257
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Ok")), "html", null, true);
            echo "
                <br/>
            ";
        } else {
            // line 260
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
            echo "
                <span class=\"warn\">";
            // line 261
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_NfsFilesystemWarning")), "html", null, true);
            echo "</span>
                ";
            // line 262
            if ((!twig_test_empty((isset($context["duringInstall"]) ? $context["duringInstall"] : $this->getContext($context, "duringInstall"))))) {
                // line 263
                echo "                    <p>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_NfsFilesystemWarningSuffixInstall")), "html", null, true);
                echo "</p>
                ";
            } else {
                // line 265
                echo "                    <p>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_NfsFilesystemWarningSuffixAdmin")), "html", null, true);
                echo "</p>
                ";
            }
            // line 267
            echo "            ";
        }
        // line 268
        echo "        </td>
    </tr>

    <tr>
        <td class=\"label\">";
        // line 272
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckCronArchiveProcess")), "html", null, true);
        echo "</td>
        <td>
            ";
        // line 275
        echo "            ";
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "cli_process_ok")) {
            // line 276
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckCronArchiveProcessCLI")), "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Ok")), "html", null, true);
            echo "
            ";
        } else {
            // line 278
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckCronArchiveProcessCLI")), "html", null, true);
            echo ":
                ";
            // line 279
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_NotSupported")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Optional")), "html", null, true);
            echo "
            ";
        }
        // line 281
        echo "        </td>
    </tr>

    ";
        // line 284
        if (twig_test_empty((isset($context["duringInstall"]) ? $context["duringInstall"] : $this->getContext($context, "duringInstall")))) {
            // line 285
            echo "    <tr>
        <td class=\"label\">";
            // line 286
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Geolocation")), "html", null, true);
            echo "</td>
        <td>
            ";
            // line 288
            if ($this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "extra"), "geolocation_ok")) {
                // line 289
                echo "                ";
                echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Ok")), "html", null, true);
                echo "
                <br/>
            ";
            } elseif ($this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "extra"), "geolocation_using_non_recommended")) {
                // line 292
                echo "                ";
                echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
                echo "
                <span class=\"warn\">";
                // line 293
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_GeoIpLocationProviderNotRecomnended")), "html", null, true);
                echo "
                    ";
                // line 294
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_GeoIpLocationProviderDesc_ServerBased2", "<a href=\"http://piwik.org/docs/geo-locate/\" target=\"_blank\">", "", "", "</a>"));
                echo "</span>
                <br/>
            ";
            } else {
                // line 297
                echo "                ";
                echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
                echo "
                <span class=\"warn\">";
                // line 298
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_DefaultLocationProviderDesc1")), "html", null, true);
                echo "
                    ";
                // line 299
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_DefaultLocationProviderDesc2", "<a href=\"http://piwik.org/docs/geo-locate/\" target=\"_blank\">", "", "", "</a>"));
                echo " </span>
                </span>
            ";
            }
            // line 302
            echo "        </td>
    </tr>
    ";
        }
        // line 305
        echo "    ";
        if ($this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : null), "extra", array(), "any", false, true), "load_data_infile_available", array(), "any", true, true)) {
            // line 306
            echo "        <tr>
            <td class=\"label\">";
            // line 307
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_DatabaseAbilities")), "html", null, true);
            echo "</td>
            <td>
                ";
            // line 309
            if ($this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "extra"), "load_data_infile_available")) {
                // line 310
                echo "                    ";
                echo twig_escape_filter($this->env, (isset($context["ok"]) ? $context["ok"] : $this->getContext($context, "ok")), "html", null, true);
                echo " LOAD DATA INFILE
                    <br/>
                ";
            } else {
                // line 313
                echo "                    ";
                echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
                echo "
                    <span class=\"warn\">LOAD DATA INFILE</span>
                    <br/>
                    <br/>
                    <p>";
                // line 317
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_LoadDataInfileUnavailableHelp", "LOAD DATA INFILE", "FILE")), "html", null, true);
                echo "</p>
                    <p>";
                // line 318
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_LoadDataInfileRecommended")), "html", null, true);
                echo "</p>
                    ";
                // line 319
                if ($this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : null), "extra", array(), "any", false, true), "load_data_infile_error", array(), "any", true, true)) {
                    // line 320
                    echo "                        <em><strong>";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Error")), "html", null, true);
                    echo ":</strong></em>
                        ";
                    // line 321
                    echo $this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "extra"), "load_data_infile_error");
                    echo "
                    ";
                }
                // line 323
                echo "                    <p>Troubleshooting: <a target='_blank' href=\"?module=Proxy&action=redirect&url=http://piwik.org/faq/troubleshooting/%23faq_194\">FAQ on piwik.org</a></p>
                ";
            }
            // line 325
            echo "            </td>
        </tr>
    ";
        }
        // line 328
        echo "

</table>

";
        // line 332
        $this->env->loadTemplate("@Installation/_integrityDetails.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "@Installation/_systemCheckSection.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  905 => 332,  899 => 328,  894 => 325,  890 => 323,  885 => 321,  880 => 320,  878 => 319,  874 => 318,  870 => 317,  862 => 313,  855 => 310,  853 => 309,  848 => 307,  845 => 306,  842 => 305,  837 => 302,  831 => 299,  827 => 298,  822 => 297,  816 => 294,  812 => 293,  807 => 292,  798 => 289,  796 => 288,  791 => 286,  788 => 285,  786 => 284,  781 => 281,  774 => 279,  767 => 278,  757 => 276,  754 => 275,  749 => 272,  743 => 268,  740 => 267,  734 => 265,  728 => 263,  726 => 262,  722 => 261,  717 => 260,  708 => 257,  706 => 256,  701 => 254,  696 => 251,  690 => 250,  681 => 247,  676 => 245,  672 => 244,  667 => 243,  664 => 242,  660 => 241,  655 => 239,  650 => 236,  644 => 235,  635 => 232,  630 => 230,  623 => 229,  620 => 228,  616 => 227,  611 => 225,  606 => 222,  601 => 220,  593 => 218,  587 => 216,  585 => 215,  580 => 213,  575 => 210,  568 => 208,  565 => 207,  562 => 206,  557 => 204,  552 => 203,  544 => 201,  542 => 200,  537 => 198,  532 => 195,  524 => 190,  519 => 189,  513 => 187,  511 => 186,  506 => 184,  501 => 181,  496 => 179,  492 => 178,  487 => 176,  482 => 175,  474 => 173,  472 => 172,  467 => 170,  462 => 167,  457 => 165,  452 => 163,  448 => 162,  443 => 161,  437 => 159,  435 => 158,  430 => 156,  425 => 153,  422 => 152,  416 => 150,  413 => 149,  408 => 147,  403 => 146,  398 => 144,  393 => 143,  390 => 142,  384 => 140,  382 => 139,  377 => 137,  371 => 134,  366 => 131,  361 => 128,  354 => 126,  348 => 123,  345 => 122,  343 => 121,  340 => 120,  336 => 119,  332 => 118,  328 => 116,  326 => 115,  322 => 113,  312 => 110,  306 => 108,  300 => 106,  297 => 105,  293 => 104,  287 => 101,  281 => 97,  276 => 96,  270 => 95,  261 => 92,  255 => 89,  252 => 88,  250 => 87,  246 => 86,  241 => 85,  238 => 84,  234 => 83,  229 => 81,  226 => 80,  221 => 77,  212 => 74,  209 => 73,  205 => 72,  201 => 70,  199 => 69,  195 => 67,  190 => 66,  180 => 63,  174 => 61,  171 => 60,  169 => 59,  164 => 58,  161 => 57,  157 => 56,  152 => 54,  149 => 53,  141 => 48,  134 => 45,  128 => 43,  122 => 41,  120 => 40,  115 => 38,  111 => 36,  108 => 35,  99 => 32,  93 => 31,  90 => 30,  86 => 29,  82 => 27,  78 => 25,  75 => 23,  73 => 22,  68 => 20,  63 => 17,  53 => 15,  47 => 13,  38 => 9,  32 => 8,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,  77 => 29,  72 => 27,  67 => 24,  65 => 23,  62 => 22,  60 => 21,  55 => 19,  52 => 18,  48 => 16,  45 => 12,  43 => 14,  31 => 4,  28 => 3,);
    }
}
