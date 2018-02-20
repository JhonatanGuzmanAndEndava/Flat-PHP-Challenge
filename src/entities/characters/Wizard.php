<?php

namespace Domain\Entities\Characters;

use Domain\Entities\Characters\Character as Character;

    class Wizard extends Character {

        public function __construct($lifePoints = 100) {
            parent::__construct($lifePoints);

            $this->strengh = 12;
            $this->smart = 65;
            $this->speed = 4;
            $this->resistance = 8;
        }

        public function calculeDamage() {
            if ($this->weapon instanceof Wand) {
                return $this->smart + $this->weapon->getDamage() + Config::$weaponBonus;
            }else {
                return $this->strengh + $this->weapon->getDamage();
            }
        }

        public function calculeDefend(Character $enemyChar) {
            if ($enemyChar->getWeapon() instanceof Wand) {
                return $this->resistance + $this->armor->getShieldPoints() + Config::$armorBonus;
            }
            return $this->resistance + $this->armor->getShieldPoints();
        }
    }

?>