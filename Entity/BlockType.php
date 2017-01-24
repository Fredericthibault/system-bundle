<?php

namespace Viweb\SystemBundle\Entity;

/**
 * BlockType
 */
class BlockType
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $form;


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
     * @return BlockType
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

    /**
     * Set form
     *
     * @param string $form
     *
     * @return BlockType
     */
    public function setForm($form)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get form
     *
     * @return string
     */
    public function getForm()
    {
        return $this->form;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $block;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->block = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add block
     *
     * @param \Viweb\SystemBundle\Entity\Block $block
     *
     * @return BlockType
     */
    public function addBlock(\Viweb\SystemBundle\Entity\Block $block)
    {
        $this->block[] = $block;

        return $this;
    }

    /**
     * Remove block
     *
     * @param \Viweb\SystemBundle\Entity\Block $block
     */
    public function removeBlock(\Viweb\SystemBundle\Entity\Block $block)
    {
        $this->block->removeElement($block);
    }

    /**
     * Get block
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlock()
    {
        return $this->block;
    }
}
