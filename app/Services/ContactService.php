<?php

namespace App\Services;

use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Database\Eloquent\Collection;

class ContactService
{

    public function __construct(private readonly ContactRepository $contactRepository)
    {
    }

    public function getAll(): Collection
    {
        return $this->contactRepository->getAll();
    }

    public function create(array $data): Contact
    {
        return $this->contactRepository->create($data);
    }

    public function update(int $contactId, array $data): Contact
    {
        $this->contactRepository->update($contactId, $data);

        return $this->contactRepository->getById($contactId);
    }

    public function delete(int $contactId): void
    {
        $this->contactRepository->delete($contactId);
    }
}
