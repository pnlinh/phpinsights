<?php

declare(strict_types=1);

namespace NunoMaduro\PhpInsights\Infrastructure\Repositories;

use NunoMaduro\PhpInsights\Domain\Contracts\Repositories\FilesRepository;
use Symfony\Component\Finder\Finder;

/**
 * @internal
 */
final class LocalFilesRepository implements FilesRepository
{
    /**
     * @var \Symfony\Component\Finder\Finder
     */
    private $finder;

    /**
     * LocalFilesRepository constructor.
     *
     * @param  \Symfony\Component\Finder\Finder  $finder
     */
    public function __construct(Finder $finder)
    {
        $this->finder = $finder;
    }

    /**
     * {@inheritdoc}
     */
    public function getFiles(): iterable
    {
        return $this->finder->getIterator();
    }

    /**
     * {@inheritdoc}
     */
    public function in(array $dirs): FilesRepository
    {
        $this->finder->files()->in($dirs);

        return $this;
    }
}