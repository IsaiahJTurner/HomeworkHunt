<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik;

use Exception;

// When set to true, all scheduled tasks will be triggered in all requests (careful!)
define('DEBUG_FORCE_SCHEDULED_TASKS', false);

/**
 * Manages scheduled task execution.
 * 
 * A scheduled task is a callback that should be executed every so often (such as daily,
 * weekly, monthly, etc.). They are registered with **TaskScheduler** through the
 * {@hook TaskScheduler.getScheduledTasks} event.
 * 
 * Tasks are executed when the cron core:archive command is executed.
 * 
 * ### Examples
 * 
 * **Scheduling a task**
 * 
 *     // event handler for TaskScheduler.getScheduledTasks event
 *     public function getScheduledTasks(&$tasks)
 *     {
 *         $tasks[] = new ScheduledTask(
 *             'Piwik\Plugins\CorePluginsAdmin\MarketplaceApiClient',
 *             'clearAllCacheEntries',
 *             null,
 *             ScheduledTime::factory('daily'),
 *             ScheduledTask::LOWEST_PRIORITY
 *         );
 *     }
 * 
 * **Executing all pending tasks**
 * 
 *     $results = TaskScheduler::runTasks();
 *     $task1Result = $results[0];
 *     $task1Name = $task1Result['task'];
 *     $task1Output = $task1Result['output'];
 * 
 *     echo "Executed task '$task1Name'. Task output:\n$task1Output";
 *
 * @method static \Piwik\TaskScheduler getInstance()
 */
class TaskScheduler extends Singleton
{
    const GET_TASKS_EVENT = "TaskScheduler.getScheduledTasks";

    private $isRunning = false;

    private $timetable = null;

    public function __construct()
    {
        $this->timetable = new ScheduledTaskTimetable();
    }

    /**
     * Executes tasks that are scheduled to run, then reschedules them.
     *
     * @return array An array describing the results of scheduled task execution. Each element
     *               in the array will have the following format:
     * 
     *               ```
     *               array(
     *                   'task' => 'task name',
     *                   'output' => '... task output ...'
     *               )
     *               ```
     */
    static public function runTasks()
    {
        return self::getInstance()->doRunTasks();
    }

    private function doRunTasks()
    {
        // collect tasks
        $tasks = array();

        /**
         * Triggered during scheduled task execution. Collects all the tasks to run.
         * 
         * Subscribe to this event to schedule code execution on an hourly, daily, weekly or monthly
         * basis.
         *
         * **Example**
         * 
         *     public function getScheduledTasks(&$tasks)
         *     {
         *         $tasks[] = new ScheduledTask(
         *             'Piwik\Plugins\CorePluginsAdmin\MarketplaceApiClient',
         *             'clearAllCacheEntries',
         *             null,
         *             ScheduledTime::factory('daily'),
         *             ScheduledTask::LOWEST_PRIORITY
         *         );
         *     }
         * 
         * @param ScheduledTask[] &$tasks List of tasks to run periodically.
         */
        Piwik::postEvent(self::GET_TASKS_EVENT, array(&$tasks));
        /** @var ScheduledTask[] $tasks */

        // remove from timetable tasks that are not active anymore
        $this->timetable->removeInactiveTasks($tasks);

        // for every priority level, starting with the highest and concluding with the lowest
        $executionResults = array();
        for ($priority = ScheduledTask::HIGHEST_PRIORITY;
             $priority <= ScheduledTask::LOWEST_PRIORITY;
             ++$priority) {
            // loop through each task
            foreach ($tasks as $task) {
                // if the task does not have the current priority level, don't execute it yet
                if ($task->getPriority() != $priority) {
                    continue;
                }

                $taskName = $task->getName();
                $shouldExecuteTask = $this->timetable->shouldExecuteTask($taskName);

                if ($this->timetable->taskShouldBeRescheduled($taskName)) {
                    $this->timetable->rescheduleTask($task);
                }

                if ($shouldExecuteTask) {
                    $this->isRunning = true;
                    $message = self::executeTask($task);
                    $this->isRunning = false;

                    $executionResults[] = array('task' => $taskName, 'output' => $message);
                }
            }
        }

        return $executionResults;
    }

    /**
     * Determines a task's scheduled time and persists it, overwriting the previous scheduled time.
     * 
     * Call this method if your task's scheduled time has changed due to, for example, an option that
     * was changed.
     * 
     * @param ScheduledTask $task Describes the scheduled task being rescheduled.
     * @api
     */
    static public function rescheduleTask(ScheduledTask $task)
    {
        self::getInstance()->timetable->rescheduleTask($task);
    }

    /**
     * Returns true if the TaskScheduler is currently running a scheduled task.
     * 
     * @return bool
     */
    static public function isTaskBeingExecuted()
    {
        return self::getInstance()->isRunning;
    }

    /**
     * Return the next scheduled time given the class and method names of a scheduled task.
     *
     * @param string $className The name of the class that contains the scheduled task method.
     * @param string $methodName The name of the scheduled task method.
     * @param string|null $methodParameter Optional method parameter.
     * @return mixed int|bool The time in miliseconds when the scheduled task will be executed
     *                        next or false if it is not scheduled to run.
     */
    static public function getScheduledTimeForMethod($className, $methodName, $methodParameter = null)
    {
        return self::getInstance()->timetable->getScheduledTimeForMethod($className, $methodName, $methodParameter);
    }

    /**
     * Executes the given taks
     *
     * @param ScheduledTask $task
     * @return string
     */
    static private function executeTask($task)
    {
        try {
            $timer = new Timer();
            call_user_func(array($task->getObjectInstance(), $task->getMethodName()), $task->getMethodParameter());
            $message = $timer->__toString();
        } catch (Exception $e) {
            $message = 'ERROR: ' . $e->getMessage();
        }

        return $message;
    }
}
