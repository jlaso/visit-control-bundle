<?php

namespace Jaitec\ClickBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jaitec\ClickBundle\Entity\Click
 *
 * @ORM\Table(name="jaitec_click")
 * @ORM\Entity
 */
class Click
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $entity_type
     *
     * @ORM\Column(name="entity_type", type="string", length=30)
     */
    private $entity_type;

    /**
     * @var integer $entity_id
     *
     * @ORM\Column(name="entity_id", type="integer", nullable="true")
     */
    private $entity_id;

    /**
     * @var integer $entity_name
     *
     * @ORM\Column(name="entity_name", type="string", length=255, nullable="true")
     */
    private $entity_name;

    /**
     * @var integer $clicks
     *
     * @ORM\Column(name="clicks", type="integer")
     */
    private $clicks;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set entity_type
     *
     * @param string $entityType
     */
    public function setEntityType($entityType)
    {
        $this->entity_type = $entityType;
    }

    /**
     * Get entity_type
     *
     * @return string 
     */
    public function getEntityType()
    {
        return $this->entity_type;
    }

    /**
     * Set entity_id
     *
     * @param integer $entityId
     */
    public function setEntityId($entityId)
    {
        $this->entity_id = $entityId;
    }

    /**
     * Get entity_id
     *
     * @return integer 
     */
    public function getEntityId()
    {
        return $this->entity_id;
    }

    /**
     * Set clicks
     *
     * @param integer $clicks
     */
    public function setClicks($clicks)
    {
        $this->clicks = $clicks;
    }

    /**
     * Get clicks
     *
     * @return integer 
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * Set entity_name
     *
     * @param string $entityName
     */
    public function setEntityName($entityName)
    {
        $this->entity_name = $entityName;
    }

    /**
     * Get entity_name
     *
     * @return string 
     */
    public function getEntityName()
    {
        return $this->entity_name;
    }
}