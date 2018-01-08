<?php
/**
 * Created by PhpStorm.
 * User: SLI3763
 * Date: 28/12/2017
 * Time: 17:02
 */

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations  as MongoDB;

/**
 * Class Project
 * @package App\Document
 * @MongoDB\Document
 */
class Project
{
    /**
     * @MongoDB\Id
     */
    protected $id;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $name;
    /**
     * @MongoDB\Field(type="date")
     */
    protected $started_at;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStartedAt()
    {
        return $this->started_at;
    }

    /**
     * @param mixed $started_at
     */
    public function setStartedAt($started_at)
    {
        $this->started_at = $started_at;
    }


}