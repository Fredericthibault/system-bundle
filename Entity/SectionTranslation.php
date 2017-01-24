<?php

namespace Viweb\SystemBundle\Entity;

use Sylius\Component\Resource\Model\AbstractTranslation;
use Sylius\Component\Resource\Model\ResourceInterface;
use Viweb\SeoBundle\Model\SeoTrait;

/**
 * SectionTransltion
 */
class SectionTranslation extends AbstractTranslation implements ResourceInterface
{
    use SeoTrait {
        __construct as intializeSeo;
    }

    public function __construct()
    {
        $this->intializeSeo();
    }

    public function getDefaultKeys(): array
    {
        return ['description', 'title', 'keywords'];
    }
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $slug;


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
     * Set title
     *
     * @param string $title
     *
     * @return SectionTranslation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return SectionTranslation
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
