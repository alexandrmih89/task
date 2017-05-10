<?php

use Phalcon\DI;

class Model extends \Phalcon\Mvc\Model
{
    public function safeSave() {

        try {
            if (!$this->save()) {
                $messages = $this->getMessages();
                var_dump($messages);
                exit;
                return false;
            }
            return true;
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
            exit;
            return false;
        }
    }

    public function safeDelete() {

        try {
            if (!$this->delete()) {
                $messages = $this->getMessages();
                foreach ($messages as $message) {
                    \App::log()->error($message . "\r\n" . __FILE__ . ' line: ' . __LINE__);
                }
                return false;
            }
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

}
