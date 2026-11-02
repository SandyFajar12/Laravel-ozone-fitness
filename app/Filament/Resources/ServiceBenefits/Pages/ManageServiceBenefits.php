<?php

namespace App\Filament\Resources\ServiceBenefits\Pages;

use App\Filament\Resources\ServiceBenefits\ServiceBenefitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageServiceBenefits extends ManageRecords
{
    protected static string $resource = ServiceBenefitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
