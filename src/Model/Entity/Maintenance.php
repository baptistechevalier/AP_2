<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Maintenance Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $dates
 * @property int $computer_id
 *
 * @property \App\Model\Entity\Computer $computer
 */
class Maintenance extends Entity
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
        'dates' => true,
        'computer_id' => true,
        'computer' => true,
    ];
}
