<?php

namespace App\Filament\Resources\GymClasses\Pages;

use App\Filament\Resources\GymClasses\GymClassResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageGymClasses extends ManageRecords
{
    protected static string $resource = GymClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
