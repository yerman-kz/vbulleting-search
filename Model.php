<?php
namespace vBulletin\Search;

class Model implements SearchRepository
{
    private \PDO $db;
    private $config = [
        'dsn' => 'mysql:dbname=vbforum;host=127.0.0.1',
        'username' => 'forum',
        'password' => '123456',
    ];    

    public function __construct()
    {
        $this->db = new \PDO($this->config['dsn'], $this->config['username'], $this->config['password']);
    }

    public function searchPosts(string $query): array
    {
        $stmt = $this->db->prepare('SELECT * FROM vb_post WHERE text LIKE :query');
        $stmt->execute([':query' => "%$query%"]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findResultsBySearchId(int $searchId): array
    {
        $stmt = $this->db->prepare('SELECT * FROM vb_searchresult WHERE searchid = :searchId');
        $stmt->execute([':searchId' => $searchId]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}