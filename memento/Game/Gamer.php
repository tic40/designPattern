<?php
namespace Game;

class Gamer
{
    private $money;
    private $fruits = [];
    const FRUITS_NAME = ["リンゴ", "ぶどう", "バナナ", "みかん"];

    public function __construct(int $money)
    {
        $this->money = $money;
    }

    public function getMoney(): int
    {
        return $this->money;
    }

    public function bet()
    {
        switch (rand(1, 6)) {
            case 1:
                $this->money += 100;
                echo "所持金が増えました。" . PHP_EOL;
                break;
            case 2:
                $this->money /= 2;
                echo "所持金が半分になりました。" . PHP_EOL;
                break;
            case 6:
                $f = $this->getFruit();
                echo "フルーツ(" . $f . ")をもらいました。" . PHP_EOL;
                $this->fruits[] = $f;
                break;
            default:
                echo "何も起こりませんでした。" . PHP_EOL;
        }
    }

    public function createMemento(): Memento
    {
        $m = new Memento($this->money);
        foreach ($this->fruits as $v) {
            if (substr($v, 0, strlen("おいしい")) === "おいしい") {
                $m->addFruit($v);
            }
        }
        return $m;
    }

    public function restoreMemento(Memento $memento)
    {
        $this->money = $memento->money;
        $this->fruits = $memento->getFruits();
    }

    public function __toString(): string
    {
        return "[money = " . $this->money . ", fruits = " . join(', ', $this->fruits) . "]";
    }

    private function getFruit(): string
    {
        $suffix = boolval(rand(0, 1)) ? "おいしい" : "";
        return $suffix . self::FRUITS_NAME[rand(0, count(self::FRUITS_NAME)-1)];
    }
}
