<?php

class Storage
{
    public function __construct(private Database $db) {}

    //get all rows from database
    public function getAll(): array
    {
        $rows = $this->db->run('SELECT * FROM buckets')->fetchAll();
        return array_map([$this, 'fromRow'], $rows);
    }

    public function create(Bucket $bucket): bool
    {
        try {
            $this->db->run(
                'INSERT INTO buckets (name, description, priority)
             VALUES (:name, :description, :priority)',
                [
                    ':name'  => $bucket->getName(),
                    ':description' => $bucket->getDescription(),
                    ':priority'   => $bucket->getPriority(),
                ]
            );
            return true;
        } catch (PDOException $e) {
            error_log('Något gick fel vid skapandet av ny bucket' . e($e->getMessage()));
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $stmt = $this->db->run(
                'DELETE FROM buckets WHERE id = :id',
                [
                    ':id' => $id
                ]
            );
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log('Något gick fel vid skapandet av ny bucket' . e($e->getMessage()));
            return false;
        }
    }

    //translate database row to Bucket-object
    private function fromRow(array $row): Bucket
    {
        return new Bucket(
            name: $row['name'],
            description: $row['description'],
            priority: (int)$row['priority'],
            id: (int)$row['id'],
            createdAt: $row['created_at']
        );
    }
}