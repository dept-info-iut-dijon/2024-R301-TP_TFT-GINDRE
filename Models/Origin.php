<?php

namespace Models;

class Origin
{
    private ?int $id;
    private string $name;
    private string $url_img;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getUrlImg(): string
    {
        return $this->url_img;
    }

    public function setUrlImg(string $url_img): void
    {
        $this->url_img = $url_img;
    }

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data): void
    {
        $this->id = $data['id'] ?? $this->id ?? null;
        $this->name = $data['name'] ?? $this->name;
        $this->url_img = $data['url_img'] ?? $this->url_img;
    }
}