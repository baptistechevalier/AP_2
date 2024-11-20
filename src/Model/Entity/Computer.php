<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Computer Entity
 *
 * @property int $id
 * @property string $processeur
 * @property string $os
 * @property string $ram
 * @property string $gpu
 * @property string $stockage
 * @property string $alim
 * @property bool $disponiblie
 *
 * @property \App\Model\Entity\Maintenance[] $maintenances
 * @property \App\Model\Entity\Game[] $games
 */
class Computer extends Entity
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
        'processeur' => true,
        'os' => true,
        'ram' => true,
        'gpu' => true,
        'stockage' => true,
        'alim' => true,
        'disponiblie' => true,
        'maintenances' => true,
        'games' => true,
    ];
}
