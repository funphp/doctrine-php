<?php
// entities/Post.php
/**
 * @Entity @Table(name="posts")
 **/
class Post
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     **/
    protected $id;
     /**
     * @Column(type="string")
     **/
    protected $title;

    /**
     * @Column(type="string")
     **/
    protected $description;
    /**
     * @Column(type="datetime")
     **/
    protected $created;
    /**
     * @Column(type="string")
     **/
    protected $status;

    /**
     * @OneToMany(targetEntity="Comment", mappedBy="postId")
     * @var Comment[]
     **/
    protected $articleComments = null;

   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articleComments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set title
     *
     * @param string $title
     * @return Post
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
     * Set description
     *
     * @param string $description
     * @return Post
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Post
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Post
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add articleComments
     *
     * @param Comment $articleComments
     * @return Post
     */
    public function addArticleComment(\Comment $articleComments)
    {
        $this->articleComments[] = $articleComments;
    
        return $this;
    }

    /**
     * Remove articleComments
     *
     * @param Comment $articleComments
     */
    public function removeArticleComment(\Comment $articleComments)
    {
        $this->articleComments->removeElement($articleComments);
    }

    /**
     * Get articleComments
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getArticleComments()
    {
        return $this->articleComments;
    }
}