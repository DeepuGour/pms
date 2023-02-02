<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $category_name
 * @property string $property_title
 * @property string $property_description
 * @property string $property_category
 * @property string $property_tags
 * @property string $image
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime $modify_date
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\PropertyComment[] $property_comments
 */
class Property extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_id' => true,
        'category_name' => true,
        'property_title' => true,
        'property_description' => true,
        'property_category' => true,
        'property_tags' => true,
        'image' => true,
        'status' => true,
        'created_date' => true,
        'modify_date' => true,
        'user' => true,
        'property_comments' => true,
    ];
}
