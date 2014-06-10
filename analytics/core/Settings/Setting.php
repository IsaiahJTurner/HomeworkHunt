<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\Settings;

/**
 * Base setting type class.
 *
 * @api
 */
abstract class Setting
{
    /**
     * Describes the setting's PHP data type. When saved, setting values will always be casted to this
     * type.
     * 
     * See {@link Piwik\Plugin\Settings} for a list of supported data types.
     *
     * @var string
     */
    public $type = null;

    /**
     * Describes what HTML element should be used to manipulate the setting through Piwik's UI.
     *
     * See {@link Piwik\Plugin\Settings} for a list of supported control types.
     * 
     * @var string
     */
    public $uiControlType = null;

    /**
     * Name-value mapping of HTML attributes that will be added HTML form control, eg,
     * `array('size' => 3)`. Attributes will be escaped before outputting.
     * 
     * @var array
     */
    public $uiControlAttributes = array();

    /**
     * The list of all available values for this setting. If null, the setting can have any value.
     * 
     * If supplied, this field should be an array mapping available values with their prettified
     * display value. Eg, if set to `array('nb_visits' => 'Visits', 'nb_actions' => 'Actions')`,
     * the UI will display **Visits** and **Actions**, and when the user selects one, Piwik will
     * set the setting to **nb_visits** or **nb_actions** respectively.
     * 
     * The setting value will be validated if this field is set. If the value is not one of the
     * available values, an error will be triggered.
     * 
     * _Note: If a custom validator is supplied (see {@link $validate}), the setting value will
     * not be validated._
     *
     * @var null|array
     */
    public $availableValues = null;

    /**
     * Text that will appear above this setting's section in the _Plugin Settings_ admin page.
     * 
     * @var null|string
     */
    public $introduction    = null;

    /**
     * Text that will appear directly underneath the setting title in the _Plugin Settings_ admin
     * page. If set, should be a short description of the setting.
     * 
     * @var null|string
     */
    public $description     = null;

    /**
     * Text that will appear next to the setting's section in the _Plugin Settings_ admin page. If set,
     * it should contain information about the setting that is more specific than a general description,
     * such as the format of the setting value if it has a special format.
     * 
     * @var null|string
     */
    public $inlineHelp      = null;

    /**
     * A closure that does some custom validation on the setting before the setting is persisted.
     * 
     * The closure should take two arguments: the setting value and the {@link Setting} instance being
     * validated. If the value is found to be invalid, the closure should throw an exception with
     * a message that describes the error.
     * 
     * **Example**
     * 
     *     $setting->validate = function ($value, Setting $setting) {
     *         if ($value > 60) {
     *             throw new \Exception('The time limit is not allowed to be greater than 60 minutes.');
     *         }
     *     }
     *
     * @var null|\Closure
     */
    public $validate        = null;

    /**
     * A closure that transforms the setting value. If supplied, this closure will be executed after
     * the setting has been validated.
     * 
     * _Note: If a transform is supplied, the setting's {@link $type} has no effect. This means the
     * transformation function will be responsible for casting the setting value to the appropriate
     * data type._
     *
     * **Example**
     * 
     *     $setting->transform = function ($value, Setting $setting) {
     *         if ($value > 30) {
     *             $value = 30;
     *         }
     *
     *         return (int) $value;
     *     }
     *
     * @var null|\Closure
     */
    public $transform          = null;

    /**
     * Default value of this setting.
     * 
     * The default value is not casted to the appropriate data type. This means _**you**_ have to make
     * sure the value is of the correct type.
     *
     * @var mixed
     */
    public $defaultValue    = null;

    /**
     * This setting's display name, for example, `'Refresh Interval'`.
     *
     * @var string
     */
    public $title           = '';

    protected $key;
    protected $name;
    protected $displayedForCurrentUser = false;

    /**
     * @var StorageInterface
     */
    private $storage;

    /**
     * Constructor.
     *
     * @param string $name    The setting's persisted name. Only alphanumeric characters are allowed, eg,
     *                        `'refreshInterval'`.
     * @param string $title   The setting's display name, eg, `'Refresh Interval'`.
     */
    public function __construct($name, $title)
    {
        $this->key   = $name;
        $this->name  = $name;
        $this->title = $title;
    }

    /**
     * Returns the setting's persisted name, eg, `'refreshInterval'`.
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns `true` if this setting can be displayed for the current user, `false` if otherwise.
     * 
     * @return bool
     */
    public function canBeDisplayedForCurrentUser()
    {
        return $this->displayedForCurrentUser;
    }

    /**
     * Sets the object used to persist settings.
     * 
     * @return StorageInterface
     */
    public function setStorage(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * Returns the previously persisted setting value. If no value was set, the default value
     * is returned.
     * 
     * @return mixed
     * @throws \Exception If the current user is not allowed to change the value of this setting.
     */
    public function getValue()
    {
        return $this->storage->getSettingValue($this);
    }

    /**
     * Sets and persists this setting's value overwriting any existing value.
     * 
     * @param mixed $value
     * @throws \Exception If the current user is not allowed to change the value of this setting.
     */
    public function setValue($value)
    {
        return $this->storage->setSettingValue($this, $value);
    }

    /**
     * Returns the unique string key used to store this setting.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Returns the display order. The lower the return value, the earlier the setting will be displayed.
     * 
     * @return int
     */
    public function getOrder()
    {
        return 100;
    }
}
