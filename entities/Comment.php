<?php
// entities/Comment.php
/**
 * @Entity @Table(name="comments")
 **/
class Comment
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $description;


    /**
     * @ManyToOne(targetEntity="User", inversedBy="postedComments")
     **/
    protected $commentor;

     /**
     * @ManyToOne(targetEntity="Post", inversedBy="articleComments")
     **/
    protected $postId;
    

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
     * Set description
     *
     * @param string $description
     * @return Comment
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
     * Set commentor
     *
     * @param User $commentor
     * @return Comment
     */
    public function setCommentor(\User $commentor = null)
    {
        $this->commentor = $commentor;
    
        return $this;
    }

    /**
     * Get commentor
     *
     * @return User 
     */
    public function getCommentor()
    {
        return $this->commentor;
    }

    /**
     * Set postId
     *
     * @param Post $postId
     * @return Comment
     */
    public function setPostId(\Post $postId = null)
    {
        $this->postId = $postId;
    
        return $this;
    }

    /**
     * Get postId
     *
     * @return Post 
     */
    public function getPostId()
    {
        return $this->postId;
    }
}