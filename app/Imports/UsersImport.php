<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\User;

class UsersImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {
        User::insert($collection->toArray());
    }
}
