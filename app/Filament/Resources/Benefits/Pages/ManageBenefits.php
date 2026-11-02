<?php

namespace App\Filament\Resources\Benefits\Pages;

use App\Filament\Resources\Benefits\BenefitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageBenefits extends ManageRecords
{
    protected static string $resource = BenefitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
