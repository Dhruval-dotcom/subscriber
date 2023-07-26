<?php

namespace App\Factory;

use App\Entity\Todolist;
use App\Repository\TodolistRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Todolist>
 *
 * @method        Todolist|Proxy                     create(array|callable $attributes = [])
 * @method static Todolist|Proxy                     createOne(array $attributes = [])
 * @method static Todolist|Proxy                     find(object|array|mixed $criteria)
 * @method static Todolist|Proxy                     findOrCreate(array $attributes)
 * @method static Todolist|Proxy                     first(string $sortedField = 'id')
 * @method static Todolist|Proxy                     last(string $sortedField = 'id')
 * @method static Todolist|Proxy                     random(array $attributes = [])
 * @method static Todolist|Proxy                     randomOrCreate(array $attributes = [])
 * @method static TodolistRepository|RepositoryProxy repository()
 * @method static Todolist[]|Proxy[]                 all()
 * @method static Todolist[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Todolist[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Todolist[]|Proxy[]                 findBy(array $attributes)
 * @method static Todolist[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Todolist[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class TodolistFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->text(10),
            'toDoAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Todolist $todolist): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Todolist::class;
    }
}
