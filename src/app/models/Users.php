<?php

class Users extends \Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=32, nullable=false)
     */
    protected $usr_id;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    protected $usr_login;

    /**
     *
     * @var string
     * @Column(type="string", length=40, nullable=false)
     */
    protected $usr_password;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $usr_created;

    /**
     * Method to set the value of field usr_id
     *
     * @param integer $usr_id
     * @return $this
     */
    public function setUsrId($usr_id)
    {
        $this->usr_id = $usr_id;

        return $this;
    }

    /**
     * Method to set the value of field usr_login
     *
     * @param string $usr_login
     * @return $this
     */
    public function setUsrLogin($usr_login)
    {
        $this->usr_login = $usr_login;

        return $this;
    }

    /**
     * Method to set the value of field usr_password
     *
     * @param string $usr_password
     * @return $this
     */
    public function setUsrPassword($usr_password)
    {
        $this->usr_password = $usr_password;

        return $this;
    }

    /**
     * Method to set the value of field usr_created
     *
     * @param string $usr_created
     * @return $this
     */
    public function setUsrCreated($usr_created)
    {
        $this->usr_created = $usr_created;

        return $this;
    }

    /**
     * Returns the value of field usr_id
     *
     * @return integer
     */
    public function getUsrId()
    {
        return $this->usr_id;
    }

    /**
     * Returns the value of field usr_login
     *
     * @return string
     */
    public function getUsrLogin()
    {
        return $this->usr_login;
    }

    /**
     * Returns the value of field usr_password
     *
     * @return string
     */
    public function getUsrPassword()
    {
        return $this->usr_password;
    }

    /**
     * Returns the value of field usr_created
     *
     * @return string
     */
    public function getUsrCreated()
    {
        return $this->usr_created;
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
        return 'users';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]|Users
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
