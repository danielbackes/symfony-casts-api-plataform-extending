<?php 

namespace App\Dto;

use Carbon\Carbon;
use Symfony\Component\Serializer\Annotation\Groups;

class CheeseListingOutput
{
  /**
   * The title of this listing
   * 
   * @var string
   * @Groups({"cheese:read", "user:read"})
   */
  public $title;

  /**
   * @var string
   * @Groups({"cheese:read"})
   */
  public $description;

  /**
   * @var int
   * @Groups({"cheese:read", "user:read"})
   */
  public $price;

  /**
   * @var User
   * @Groups({"cheese:read"})
   */
  public $owner;

  public $createdAt;

  /**
   * @Groups("cheese:read")
   */
  public function getShortDescription(): ?string
  {
      if (strlen($this->description) < 40) {
          return $this->description;
      }

      return substr($this->description, 0, 40).'...';
  }

      /**
     * How long ago in text that this cheese listing was added.
     *
     * @Groups("cheese:read")
     */
    public function getCreatedAtAgo(): string
    {
        return Carbon::instance($this->createdAt)->diffForHumans();
    }

}