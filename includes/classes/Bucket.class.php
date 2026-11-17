<?php

class Bucket
{
    public function __construct(
        private string $name,
        private string $description,
        private int $priority,
        private ?int $id = null,
        private ?string $createdAt = null

    ) {   
    }

    public function getId(): ?int               { return $this->id; }
    public function getName(): string           { return $this->name; }
    public function getDescription(): string    { return $this->description; }
    public function getPriority(): int          { return $this->priority; }
    public function getCreatedAt(): ?string     { return $this->createdAt; }
}