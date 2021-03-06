<?php

namespace Herzult\Bundle\ForumBundle\Model;

use Herzult\Bundle\ForumBundle\Util\Inflector;

abstract class Category
{
    protected $id;
    protected $name;
    protected $description;
    protected $slug;
    protected $position;
    protected $numTopics;
    protected $numPosts;
    protected $lastTopic;
    protected $lastPost;

    protected $parentCategory;

    /**
     * Initialize the Object
     */
    public function __construct()
    {
        $this->position  = 0;
        $this->numTopics = 0;
        $this->numPosts  = 0;
        $this->parentId  = null;
    }

    /**
     * Gets the id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the parent category
     *
     * @return Category
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }

    /**
     * Sets the parent category
     *
     * @param Category $parent
     */
    public function setParentCategory(Category $parent)
    {
        $this->parentCategory = $parent;
    }

    /**
     * Sets the name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Gets the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Gets the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = Inflector::slugify($slug);
    }

    /**
     * Gets the slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Generates the slug or updates it.
     */
    public function generateSlug()
    {
        $this->setSlug($this->getId()."-".$this->getName());
    }

    /**
     * Sets the position
     *
     * @param integer $position
     */
    public function setPosition($position)
    {
        $this->position = \intval($position);
    }

    /**
     * Gets the position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Sets the number of topics
     *
     * @param integer $numTopics
     */
    public function setNumTopics($numTopics)
    {
        $this->numTopics = \intval($numTopics);
    }

    /**
     * Gets the number of topics
     *
     * @return integer
     */
    public function getNumTopics()
    {
        return $this->numTopics;
    }

    /**
     * Increments the number of topics
     */
    public function incrementNumTopics()
    {
        if($this->parentCategory)
            $this->parentCategory->incrementNumTopics();

        $this->numTopics++;
    }

    /**
     * Decrements the number of topics
     */
    public function decrementNumTopics()
    {
        if($this->parentCategory)
            $this->parentCategory->decrementNumTopics();

        $this->numTopics--;
    }

    /**
     * Gets the number of posts
     *
     * @return integer
     */
    public function getNumPosts()
    {
        return $this->numPosts;
    }

    /**
     * Sets the number of posts
     *
     * @param integer $numPosts
     */
    public function setNumPosts($numPosts)
    {
        $this->numPosts = \intval($numPosts);
    }

    /**
     * Increments the number of posts
     */
    public function incrementNumPosts()
    {
        if($this->parentCategory)
            $this->parentCategory->incrementNumPosts();

        $this->numPosts++;
    }

    /**
     * Decrements the number of posts
     */
    public function decrementNumPosts()
    {
        if($this->parentCategory)
            $this->parentCategory->decrementNumPosts();

        $this->numPosts--;
    }

    /**
     * Sets the last topic
     *
     * @param Topic $topic
     */
    public function setLastTopic(Topic $topic)
    {
        if($this->parentCategory != null)
            $this->parentCategory->setLastTopic($topic);

        $this->lastTopic = $topic;
    }

    /**
     * Gets the last topic
     *
     * @return Topic
     */
    public function getLastTopic()
    {
        return $this->lastTopic;
    }

    /**
     * Gets the last post
     *
     * @return Post
     */
    public function getLastPost()
    {
        return $this->lastPost;
    }

    /**
     * Sets the last post
     *
     * @param Post $post
     */
    public function setLastPost(Post $post)
    {
        if($this->parentCategory != null)
            $this->parentCategory->setLastPost($post);

        $this->lastPost = $post;
    }

    public function __toString()
    {
        return $this->name;
    }
}
