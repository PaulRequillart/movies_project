<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property int $user_from
 * @property int $user_to
 * @property \Cake\I18n\FrozenTime $created
 * @property string $body
 * @property \Cake\I18n\FrozenTime $modified
 */
class Message extends Entity
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
        'user_from' => true,
        'user_to' => true,
        'created' => true,
        'body' => true,
        'modified' => true
    ];
}
