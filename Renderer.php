<?php
namespace vBulletin\Search;

class Renderer
{
    public function showForm(): void
    {
        echo '<h2>Search in forum</h2><form><input name="q"><button type="submit">Search</button></form>';
    }

    public function renderResults(array $results, array $excludedForums = [5]): void
    {
        foreach ($results as $row) {
            if (!in_array($row['forumid'], $excludedForums)) {
                echo '<div class="search-result">'.htmlspecialchars($row['text']).'</div>';
            }
        }
    }
}