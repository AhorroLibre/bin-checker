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

    /** @var string $level */
    private $level;

    /** @var bool $valid */
    private $valid;

    /** @var string|null $country */
    private $country;

    /** @var string|null $countryCode */
    private $countryCode;

    /**
     * Bin constructor.
     * @param int $bin
     * @param null|string $bank
     * @param null|string $brand
     * @param null|string $type
     * @param null|string $level
     * @param null|string $valid
     * @param null|string $country
     * @param null|string $countryCode
     */
    public function __construct(int $bin, ?string $bank, ?string $brand, ?string $type, ?string $level, ?string $valid, ?string $country, ?string $countryCode)
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
        $this->level = $level;
        if ($valid !== null) {
            $this->valid = $valid === 'true';
        }
        $this->country = $country;
        $this->countryCode = $countryCode;
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
    public function getBank(): ?string
    {
        return $this->bank;
    }

    /**
     * @return string
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * @return int
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getLevel(): ?string
    {
        return $this->level;
    }

    /**
     * @return bool
     */
    public function isValid(): ?bool
    {
        return $this->valid;
    }

    /**
     * @return null|string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @return null|string
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
}