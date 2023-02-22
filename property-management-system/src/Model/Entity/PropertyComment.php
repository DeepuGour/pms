<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PropertyComment Entity
 *
 * @property int $id
 * @property int $property_id
 * @property int $user_id
 * @property string $comments
 * @property \Cake\I18n\FrozenTime $create_date
 * @property \Cake\I18n\FrozenTime $modifie_date
 *
 * @property \App\Model\Entity\Property $property
 * @property \App\Model\Entity\User $user
 */
class PropertyComment extends Entity
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
        'property_id' => true,
        'user_id' => true,
        'user_name'=>true,
        'comments' => true,
        'property' => true,
        'user' => true,
    ];
}
