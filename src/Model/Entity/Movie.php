<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Movie Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $duration
 * @property int $country_id
 * @property int $category_id
 * @property string $image
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Like[] $likes
 * @property \App\Model\Entity\Recommendation[] $recommendations
 * @property \App\Model\Entity\Score[] $scores
 * @property \App\Model\Entity\ToWatchMovie[] $to_watch_movies
 * @property \App\Model\Entity\ViewMovie[] $view_movies
 */
class Movie extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'duration' => true,
        'country_id' => true,
        'category_id' => true,
        'image' => true,
        'created' => true,
        'modified' => true,
        'country' => true,
        'category' => true,
        'likes' => true,
        'recommendations' => true,
        'scores' => true,
        'to_watch_movies' => true,
        'view_movies' => true
    ];
}
