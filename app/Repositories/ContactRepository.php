<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository extends BaseRepository
{

    protected function determineModelClass(): string
    {
        return Contact::class;
    }
}
