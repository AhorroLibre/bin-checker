<?php

/**
 * Created by PhpStorm.
 * User: user1
 * Date: 5/9/17
 * Time: 8:40 AM
 */

namespace LuisDC\BinChecker;

class Bin
{
    const DEBIT = 1;
    const CREDIT = 2;

    /** @var int $bin */
    private $bin;

    /** @var string $bank */
    private $bank;

    /** @var string $brand */
    private $brand;

    /** @var int $type */
    private $type;

    /**
     * Bin constructor.
     * @param $bin
     * @param $bank
     * @param $brand
     * @param $type
     */
    public function __construct(int $bin, ?string $bank, ?string $brand, ?string $type)
    {
        $this->bin = $bin;
        $this->bank = $bank;
        $this->brand = $brand;
        if ($type) {
            if ($type === "CREDIT") {
                $this->type = self::CREDIT;
            } else if ($type === "DEBIT") {
                $this->type = self::DEBIT;
            }
        }
    }

    /**
     * @return int
     */
    public function getBin(): int
    {
        return $this->bin;
    }

    /**
     * @return string
     */
    public function getBank(): string
    {
        return $this->bank;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

}