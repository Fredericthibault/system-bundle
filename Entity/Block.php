<?php

namespace Viweb\SystemBundle\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;

/**
 * Block
 */
class Block implements ResourceInterface, TranslatableInterface
{
    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
    }

    public function __construct()
    {
        $this->currentLocale = $this->fallbackLocale = 'fr';
        $this->initializeTranslationsCollection();
    }

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Block
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function createTranslation()
    {
        return new BlockTranslation();
    }

    public function getBody()
    {
        return $this->getTranslation()->getBody();
    }

    public function setBody(string $body)
    {
        $this->getTranslation()->setBody($body);
        return $this;
    }
    /**
     * @var \Viweb\SystemBundle\Entity\BlockType
     */
    private $type;


    /**
     * Set type
     *
     * @param \Viweb\SystemBundle\Entity\BlockType $type
     *
     * @return Block
     */
    public function setType(\Viweb\SystemBundle\Entity\BlockType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Viweb\SystemBundle\Entity\BlockType
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @var \Viweb\SystemBundle\Entity\Section
     */
    private $section;


    /**
     * Set section
     *
     * @param \Viweb\SystemBundle\Entity\Section $section
     *
     * @return Block
     */
    public function setSection(\Viweb\SystemBundle\Entity\Section $section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return \Viweb\SystemBundle\Entity\Section
     */
    public function getSection()
    {
        return $this->section;
    }

}
