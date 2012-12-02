<?php
// entities/User.php
/**
 * @Entity @Table(name="users")
 **/
class User
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     **/
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     **/
    protected $name;

    /**
     * @OneToMany(targetEntity="Post", mappedBy="creator")
     * @var Post[]
     **/
    protected $postedArticles = null;

    /**
     * @OneToMany(targetEntity="Comment", mappedBy="commentor")
     * @var Comment[]
     **/
    protected $postedComments = null;

    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->postedArticles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->postedComments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return User
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
     * Add postedArticles
     *
     * @param Post $postedArticles
     * @return User
     */
    public function addPostedArticle(\Post $postedArticles)
    {
        $this->postedArticles[] = $postedArticles;
    
        return $this;
    }

    /**
     * Remove postedArticles
     *
     * @param Post $postedArticles
     */
    public function removePostedArticle(\Post $postedArticles)
    {
        $this->postedArticles->removeElement($postedArticles);
    }

    /**
     * Get postedArticles
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPostedArticles()
    {
        return $this->postedArticles;
    }

    /**
     * Add postedComments
     *
     * @param Comment $postedComments
     * @return User
     */
    public function addPostedComment(\Comment $postedComments)
    {
        $this->postedComments[] = $postedComments;
    
        return $this;
    }

    /**
     * Remove postedComments
     *
     * @param Comment $postedComments
     */
    public function removePostedComment(\Comment $postedComments)
    {
        $this->postedComments->removeElement($postedComments);
    }

    /**
     * Get postedComments
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPostedComments()
    {
        return $this->postedComments;
    }
}