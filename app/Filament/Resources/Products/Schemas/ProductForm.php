<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Product')
                    ->columnSpan(2)
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                // заполняем slug, пока его не правили вручную
                                if (blank($get('slug')) || $get('slug') === Str::slug((string) $old)) {
                                    $set('slug', Str::slug((string) $state));
                                }
                            }),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->alphaDash()
                            ->unique(ignoreRecord: true),
                        TextInput::make('sku')
                            ->label('SKU')
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Select::make('categories')
                            ->relationship('categories', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable(),
                        Textarea::make('description')
                            ->rows(8)
                            ->helperText('Separate paragraphs with an empty line.')
                            ->columnSpanFull(),
                    ]),

                Section::make('Price & stock')
                    ->columnSpan(1)
                    ->schema([
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->prefix('$'),
                        TextInput::make('old_price')
                            ->label('Old price')
                            ->helperText('Fill in to show the SALE badge.')
                            ->numeric()
                            ->prefix('$')
                            ->gt('price'),
                        TextInput::make('stock')
                            ->required()
                            ->integer()
                            ->minValue(0)
                            ->default(0),
                        Toggle::make('is_active')
                            ->label('Visible on site')
                            ->default(true),
                        Toggle::make('is_featured')
                            ->label('Featured'),
                    ]),

                Section::make('Images')
                    ->columnSpanFull()
                    ->schema([
                        FileUpload::make('image')
                            ->label('Main image')
                            ->image()
                            ->imageEditor()
                            ->disk('site')
                            ->directory('uploads/products')
                            ->maxSize(4096),
                        Repeater::make('images')
                            ->label('Gallery')
                            ->relationship()
                            ->orderColumn('sort_order')
                            ->reorderable()
                            ->grid(4)
                            ->defaultItems(0)
                            ->schema([
                                FileUpload::make('path')
                                    ->hiddenLabel()
                                    ->image()
                                    ->required()
                                    ->disk('site')
                                    ->directory('uploads/products')
                                    ->maxSize(4096),
                            ]),
                    ]),
            ]);
    }
}
