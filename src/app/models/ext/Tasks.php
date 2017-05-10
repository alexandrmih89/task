<?php

namespace Ext;

use Phalcon\Di as DI;
use Phalcon\Mvc\Model\Query;

class Tasks extends \Tasks
{
    public static function getProjects()
    {
        try{
            $sql = "SELECT DISTINCT(tsk_project) as tsk_project  FROM \Tasks";
            $query = new Query($sql, DI::getDefault());
            $searches = $query->execute();
            return $searches;
        } catch (\Exception $e) {
           return false;
        }
    }

    public static function getTypes()
    {
        try{
            $sql = "SELECT DISTINCT(tsk_type) as tsk_type FROM \Tasks";
            $query = new Query($sql, DI::getDefault());
            $searches = $query->execute();
            return $searches;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function findWithFilter($data)
    {

        $params = [];
        $bind = [];
        $conditions = '';

        if (!empty($data['from'])) {
            $from = (int)$data['from'];
            $conditions = 'tsk_time_start >= :from:';
            $bind['from'] = date('Y.m.d H:i:s', $from);
        }


        if (!empty($data['to'])) {
            if (count($data) > 0) {
                $conditions .= ' AND ';
            }

            $to = (int)$data['to'];
            $conditions .= 'tsk_time_end <= :to:';
            $bind['to'] = date('Y.m.d H:i:s', $to);
        }


        if (!empty($data['project'])) {
            if (count($data) > 0) {
                $conditions .= ' AND ';
            }
            $conditions .= ' tsk_project = :tsk_project:';
            $bind['tsk_project'] = $data['project'];
        }


        if (!empty($data['type'])) {
            if (count($data) > 0) {
                $conditions .= ' AND ';
            }
            $conditions .= ' tsk_type = :tsk_type:';
            $bind['tsk_type'] = $data['type'];
        }


        if (!empty($conditions)) {
            $params['conditions'] = $conditions;
            $params['bind'] = $bind;
        }


        try{
            $count = parent::find($params);
            return $count;
        } catch (\Exception $e) {
            echo $e->getMessage();exit;
            return false;
        }
    }
}