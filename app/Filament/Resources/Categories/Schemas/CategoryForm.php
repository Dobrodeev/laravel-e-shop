<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        if (blank($get('slug')) || $get('slug') === Str::slug((string) $old)) {
                            $set('slug', Str::slug((string) $state));
                        }
                    }),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->alphaDash()
                    ->unique(ignoreRecord: true),
                Select::make('parent_id')
                    ->label('Parent category')
                    ->helperText('Collections from the header menu live under “Collections”.')
                    // нельзя выбрать саму себя родителем
                    ->relationship('parent', 'name', fn (Builder $query, $record) => $record ? $query->whereKeyNot($record->id) : $query)
                    ->searchable()
                    ->preload(),
                TextInput::make('sort_order')
                    ->integer()
                    ->default(0),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->disk('site')
                    ->directory('uploads/categories')
                    ->maxSize(4096),
                Toggle::make('is_active')
                    ->label('Visible on site')
                    ->default(true),
            ]);
    }
}
