<?php

namespace App\Filament\Resources\Tasks\Resources\Subtasks\Pages;

use App\Filament\Resources\Tasks\Resources\Subtasks\SubtaskResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSubtask extends EditRecord
{
    protected static string $resource = SubtaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
