<?php
namespace Index;

class TaskController extends AccessController
{
    public function initialize()
    {
        parent::initialize();
        $this->view->setLayout('index');
    }

    public function indexAction()
    {
        $filter = [];

        if ($this->request->hasQuery("project")) {
            $filter['project'] = $this->request->getQuery("project");

        }

        if ($this->request->hasQuery("type")) {
            $filter['type'] = $this->request->getQuery("type");
        }

        if ($this->request->hasQuery("from")) {
            $from_parts = explode('/', $this->request->getQuery("from"));
            $from = date('d.m.Y', mktime(0, 0, 0, $from_parts[0], $from_parts[1], $from_parts[2]));
            $from_timestamp = strtotime($from);
            $filter['from'] = $this->getStartDay($from_timestamp);
        }

        if ($this->request->hasQuery("to")) {
            $to_parts = explode('/', $this->request->getQuery("to"));
            $to = date('d.m.Y', mktime(0, 0, 0, $to_parts[0], $to_parts[1], $to_parts[2]));
            $to_timestamp = strtotime($to);
            $filter['to'] = $this->getEndDay($to_timestamp);
        }

        if (!empty($filter)) {
            $tasks = \Ext\Tasks::findWithFilter($filter);
        } else {
            $tasks = \Tasks::find();
        }

        if (!empty($tasks)) {
            $this->view->setVars([
                'tasks' => $tasks
            ]);
        }

        $projects = \Ext\Tasks::getProjects();

        if (!empty($projects)) {
            $this->view->setVars([
                'projects' => $projects
            ]);
        }

        $types = \Ext\Tasks::getTypes();
        if (!empty($types)) {
            $this->view->setVars([
                'types' => $types
            ]);
        }

    }

    public function addAction()
    {
        if ($this->request->isPost()) {
            $tsk_name = \App::clearStr($this->request->getPost('tsk_name'));
            $tsk_description = \App::clearStr($this->request->getPost('tsk_description'));
            $tsk_project = \App::clearStr($this->request->getPost('tsk_project'));
            $tsk_type = \App::clearStr($this->request->getPost('tsk_type'));
            $tsk_link = \App::clearStr($this->request->getPost('tsk_link'));
            $tsk_date = \App::clearStr($this->request->getPost('tsk_date'));
            $tsk_time = \App::clearStr($this->request->getPost('tsk_time'));
            $tsk_work_time = \App::clearInt($this->request->getPost('tsk_work_time'));

            if (empty($tsk_name) or empty($tsk_description) or empty($tsk_project) or empty($tsk_type) or empty($tsk_link)) {
                return $this->flashSession->error($this->_msg['ERR_EMPTY_FIELDS']);
            }

            $task = new \Tasks();
            $task->setTskName($tsk_name);
            $task->setTskDescription($tsk_description);
            $task->setTskProject($tsk_project);
            $task->setTskType($tsk_type);
            $task->setTskLink($tsk_link);
            $date_parts = explode('/', $tsk_date);
            $time_parts = explode(':', $tsk_time);
            $time_start = mktime($time_parts[0], $time_parts[1], 0, $date_parts[0], $date_parts[1], $date_parts[2]);
            $task->setTskTimeStart(date('Y.m.d H:i:s', $time_start));
            $task->setTskWorkTime($tsk_work_time);
            $task->setTskTimeEnd(date('Y.m.d H:i:s', $time_start + 60 * $tsk_work_time));
            if (!$task->safeSave()) {
                return $this->flashSession->error($this->_msg['ERR_SAVE']);
            }
        }
    }

    private function getStartDay($timestamp)
    {
        $y = date('Y', $timestamp);
        $m = date('m', $timestamp);
        $d = date('d', $timestamp);
        return mktime(0, 0, 0, $m, $d, $y);
    }

    private function getEndDay($timestamp)
    {
        $y = date('Y', $timestamp);
        $m = date('m', $timestamp);
        $d = date('d', $timestamp);
        return mktime(24, 0, 0, $m, $d, $y);
    }
}

