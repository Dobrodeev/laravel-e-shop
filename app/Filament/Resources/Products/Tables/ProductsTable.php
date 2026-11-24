<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('image')
                    ->disk('site')
                    ->square(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('categories.name')
                    ->badge()
                    ->toggleable(),
                TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('old_price')
                    ->label('Old price')
                    ->money('USD')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('stock')
                    ->numeric()
                    ->sortable()
                    ->color(fn (int $state) => $state < 1 ? 'danger' : ($state < 5 ? 'warning' : null)),
                ToggleColumn::make('is_active')
                    ->label('Visible'),
                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('categories')
                    ->relationship('categories', 'name')
                    ->multiple()
                    ->preload(),
                TernaryFilter::make('is_active')->label('Visible'),
                Filter::make('on_sale')
                    ->label('On sale')
                    ->query(fn (Builder $query) => $query->onSale()),
                Filter::make('out_of_stock')
                    ->label('Out of stock')
                    ->query(fn (Builder $query) => $query->where('stock', '<', 1)),
            ])
            ->recordActions([
                Action::make('view')
                    ->label('On site')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(fn ($record) => route('product', $record))
                    ->openUrlInNewTab(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
