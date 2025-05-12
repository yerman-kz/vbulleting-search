<?php
namespace vBulletin\Search;

class SearchService
{
    private $repository;
    private $logger;
    private $renderer;

    public function __construct(SearchRepository $repository)
    {
        $this->repository = $repository;
        $this->logger = new Logger();
        $this->renderer = new Renderer();
    }

    public function handleRequest(array $params): void
    {
        if (isset($params['searchid'])) {
            $results = $this->repository->findResultsBySearchId((int)$params['searchid']);            
        } elseif (!empty($params['q'])) {
            $results = $this->repository->searchPosts($params['q']);            
            $this->logger->log($params['q']);
        } else {
            $this->renderer->showForm();
            return;
        }

        $this->renderer->renderResults($results, [5]);
    }
}