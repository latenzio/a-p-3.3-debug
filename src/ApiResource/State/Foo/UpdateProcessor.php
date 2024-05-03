<?php

declare(strict_types=1);

namespace App\ApiResource\State\Foo;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\ApiResource\Dto\Foo\Update;

final readonly class UpdateProcessor implements ProcessorInterface
{
    /** @param Update $data */
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        dump('something could happen here', $data);
    }
}
