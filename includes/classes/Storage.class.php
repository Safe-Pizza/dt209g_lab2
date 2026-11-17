<?php

class Storage
{
    public function __construct(private Database $db)
    {
    }

    //get all rows from database
    public function getAll(): array
    {
        $rows = $this->db->run('SELECT * FROM buckets')->fetchAll();
        return array_map([$this, 'fromRow'], $rows);
    }

    //translate database row to Bucket-object
        private function fromRow(array $row): Bucket
    {
        return new Bucket(
            name:  $row['name'],
            description: $row['description'],
            priority: (int)$row['priority'],
            id:     (int)$row['id'],
            createdAt: $row['created_at']
        );
    }
}