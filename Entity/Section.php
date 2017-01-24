<?php

namespace Viweb\SystemBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;

/**
 * Section
 */
class Section implements ResourceInterface, TranslatableInterface
{
    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
    }

    public function __construct()
    {
        $this->currentLocale = $this->fallbackLocale = 'fr';
        $this->initializeTranslationsCollection();

        $this->children = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
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
     * @return Section
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

    // Translation pass through
    public function setTitle(string $title)
    {
        $this->getTranslation()->setTitle($title);
        return $this;
    }

    public function getTitle() : string
    {
        return $this->getTranslation()->getTitle();
    }

    public function setSlug(string $slug)
    {
        $this->getTranslation()->setSlug($slug);

        return $this;
    }

    public function getSlug()
    {
        return $this->getTranslation()->getSLug();
    }

    public function createTranslation()
    {
        return new SectionTranslation();
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Viweb\SystemBundle\Entity\Section
     */
    private $parent;


    /**
     * Add child
     *
     * @param \Viweb\SystemBundle\Entity\Section $child
     *
     * @return Section
     */
    public function addChild(\Viweb\SystemBundle\Entity\Section $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \Viweb\SystemBundle\Entity\Section $child
     */
    public function removeChild(\Viweb\SystemBundle\Entity\Section $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \Viweb\SystemBundle\Entity\Section $parent
     *
     * @return Section
     */
    public function setParent(\Viweb\SystemBundle\Entity\Section $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Viweb\SystemBundle\Entity\Section
     */
    public function getParent()
    {
        return $this->parent;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $blocks;


    /**
     * Add block
     *
     * @param \ViwebSystem\Entity\Block $block
     *
     * @return Section
     */
    public function addBlock(\Viweb\SystemBundle\Entity\Block $block)
    {
        $this->blocks[] = $block;

        return $this;
    }

    /**
     * Remove block
     *
     * @param \ViwebSystem\Entity\Block $block
     */
    public function removeBlock(\Viweb\SystemBundle\Entity\Block $block)
    {
        $this->blocks->removeElement($block);
    }

    /**
     * Get blocks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlocks()
    {
        return $this->blocks;
    }
}
