<?php
namespace App\Factory;

interface FactoryInterface {
    public static function create(array $data): object;
}