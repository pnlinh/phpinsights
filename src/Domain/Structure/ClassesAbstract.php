<?php

declare(strict_types=1);

namespace NunoMaduro\PhpInsights\Domain\Structure;

use NunoMaduro\PhpInsights\Domain\Contracts\HasPercentage;
use NunoMaduro\PhpInsights\Domain\Contracts\HasValue;
use NunoMaduro\PhpInsights\Domain\Publisher;

/**
 * @internal
 */
final class ClassesAbstract implements HasValue, HasPercentage
{
    /**
     * {@inheritdoc}
     */
    public function getValue(Publisher $publisher): string
    {
        return sprintf('%d', $publisher->getAbstractClasses());
    }

    /**
     * {@inheritdoc}
     */
    public function getPercentage(Publisher $publisher): float
    {
        return $publisher->getClasses() > 0 ? ($publisher->getAbstractClasses() / $publisher->getClasses()) * 100 : 0;
    }
}