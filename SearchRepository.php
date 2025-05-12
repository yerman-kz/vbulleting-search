<?php
namespace vBulletin\Search;

interface SearchRepository
{
    public function searchPosts(string $query): array;
    public function findResultsBySearchId(int $searchId): array;
}