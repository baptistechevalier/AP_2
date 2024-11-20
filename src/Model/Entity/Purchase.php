<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Purchase Entity
 *
 * @property int $id
 * @property string $user_id
 * @property int $package_id
 * @property \Cake\I18n\FrozenTime|null $purchase_date
 * @property \Cake\I18n\FrozenTime|null $expiration_date
 * @property string|null $status
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Package $package
 */
class Purchase extends Entity
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
        'package_id' => true,
        'purchase_date' => true,
        'expiration_date' => true,
        'status' => true,
        'user' => true,
        'package' => true,
    ];
}
