<?php

namespace App\Api;

use ApiPlatform\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Metadata\Operation;
use App\Entity\Comment;
use Doctrine\ORM\QueryBuilder;

class FilterPublishedCommentQueryExtension implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{
    public function applyToCollection(
        QueryBuilder $qb, QueryNameGeneratorInterface $queryNameGenerator, 
        string $resourceClass, Operation $operation = null, array $context = []): void
    {
        if (Comment::class === $resourceClass) {
            $qb->andWhere(sprintf("%s.state = 'published'", $qb->getRootAliases()[0]));
        }
    }

    public function applyToItem(
        QueryBuilder $qb, QueryNameGeneratorInterface $queryNameGenerator, 
        string $resourceClass, array $identifiers, Operation $operationName = null, array $context = []): void
    {
        if (Comment::class === $resourceClass) {
            $qb->andWhere(sprintf("%s.state = 'published'", $qb->getRootAliases()[0]));
        }
    }
}