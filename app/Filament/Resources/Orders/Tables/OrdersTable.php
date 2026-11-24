<?php

namespace App\Filament\Resources\Orders\Tables;

use App\Models\Order;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('number')
                    ->searchable()
                    ->copyable()
                    ->weight('bold'),
                TextColumn::make('created_at')
                    ->label('Placed')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
                TextColumn::make('customer')
                    ->state(fn (Order $record) => "{$record->first_name} {$record->last_name}")
                    ->description(fn (Order $record) => $record->email)
                    ->searchable(['first_name', 'last_name', 'email']),
                TextColumn::make('items_count')
                    ->label('Items')
                    ->counts('items'),
                TextColumn::make('total')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('payment_method')
                    ->label('Payment')
                    ->formatStateUsing(fn (string $state) => Order::PAYMENT_METHODS[$state] ?? $state)
                    ->toggleable(),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (string $state) => Order::STATUSES[$state] ?? $state)
                    ->color(fn (string $state) => Order::STATUS_COLORS[$state] ?? 'gray'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(Order::STATUSES)
                    ->multiple(),
            ])
            ->recordActions([
                EditAction::make()->label('Open'),
            ]);
    }
}
