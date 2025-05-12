<?php

use vBulletin\Search\SearchService;
use vBulletin\Search\Model;

$searchService = new SearchService(new Model());
$searchService->handleRequest($_REQUEST);