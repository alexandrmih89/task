<?php

class Tasks extends \Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=32, nullable=false)
     */
    protected $tsk_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $tsk_name;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $tsk_description;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $tsk_project;

    /**
     *
     * @var string
     * @Column(type="string", length=70, nullable=false)
     */
    protected $tsk_type;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $tsk_link;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $tsk_time_start;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $tsk_work_time;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $tsk_time_end;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $tsk_created;

    /**
     * Method to set the value of field tsk_id
     *
     * @param integer $tsk_id
     * @return $this
     */
    public function setTskId($tsk_id)
    {
        $this->tsk_id = $tsk_id;

        return $this;
    }

    /**
     * Method to set the value of field tsk_name
     *
     * @param string $tsk_name
     * @return $this
     */
    public function setTskName($tsk_name)
    {
        $this->tsk_name = $tsk_name;

        return $this;
    }

    /**
     * Method to set the value of field tsk_description
     *
     * @param string $tsk_description
     * @return $this
     */
    public function setTskDescription($tsk_description)
    {
        $this->tsk_description = $tsk_description;

        return $this;
    }

    /**
     * Method to set the value of field tsk_project
     *
     * @param string $tsk_project
     * @return $this
     */
    public function setTskProject($tsk_project)
    {
        $this->tsk_project = $tsk_project;

        return $this;
    }

    /**
     * Method to set the value of field tsk_type
     *
     * @param string $tsk_type
     * @return $this
     */
    public function setTskType($tsk_type)
    {
        $this->tsk_type = $tsk_type;

        return $this;
    }

    /**
     * Method to set the value of field tsk_link
     *
     * @param string $tsk_link
     * @return $this
     */
    public function setTskLink($tsk_link)
    {
        $this->tsk_link = $tsk_link;

        return $this;
    }

    /**
     * Method to set the value of field tsk_time_start
     *
     * @param string $tsk_time_start
     * @return $this
     */
    public function setTskTimeStart($tsk_time_start)
    {
        $this->tsk_time_start = $tsk_time_start;

        return $this;
    }

    /**
     * Method to set the value of field tsk_work_time
     *
     * @param string $tsk_work_time
     * @return $this
     */
    public function setTskWorkTime($tsk_work_time)
    {
        $this->tsk_work_time = $tsk_work_time;

        return $this;
    }

    /**
     * Method to set the value of field tsk_time_end
     *
     * @param string $tsk_time_end
     * @return $this
     */
    public function setTskTimeEnd($tsk_time_end)
    {
        $this->tsk_time_end = $tsk_time_end;

        return $this;
    }

    /**
     * Method to set the value of field tsk_created
     *
     * @param string $tsk_created
     * @return $this
     */
    public function setTskCreated($tsk_created)
    {
        $this->tsk_created = $tsk_created;

        return $this;
    }

    /**
     * Returns the value of field tsk_id
     *
     * @return integer
     */
    public function getTskId()
    {
        return $this->tsk_id;
    }

    /**
     * Returns the value of field tsk_name
     *
     * @return string
     */
    public function getTskName()
    {
        return $this->tsk_name;
    }

    /**
     * Returns the value of field tsk_description
     *
     * @return string
     */
    public function getTskDescription()
    {
        return $this->tsk_description;
    }

    /**
     * Returns the value of field tsk_project
     *
     * @return string
     */
    public function getTskProject()
    {
        return $this->tsk_project;
    }

    /**
     * Returns the value of field tsk_type
     *
     * @return string
     */
    public function getTskType()
    {
        return $this->tsk_type;
    }

    /**
     * Returns the value of field tsk_link
     *
     * @return string
     */
    public function getTskLink()
    {
        return $this->tsk_link;
    }

    /**
     * Returns the value of field tsk_time_start
     *
     * @return string
     */
    public function getTskTimeStart()
    {
        return $this->tsk_time_start;
    }

    /**
     * Returns the value of field tsk_work_time
     *
     * @return string
     */
    public function getTskWorkTime()
    {
        return $this->tsk_work_time;
    }

    /**
     * Returns the value of field tsk_time_end
     *
     * @return string
     */
    public function getTskTimeEnd()
    {
        return $this->tsk_time_end;
    }

    /**
     * Returns the value of field tsk_created
     *
     * @return string
     */
    public function getTskCreated()
    {
        return $this->tsk_created;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tasks';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tasks[]|Tasks
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tasks
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
