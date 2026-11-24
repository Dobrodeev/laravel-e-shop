<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Models\Order;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

/**
 * Заказ создаёт покупатель на сайте. В админке меняется только статус,
 * остальное показывается для справки.
 */
class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Items')
                    ->columnSpan(2)
                    ->schema([
                        Repeater::make('items')
                            ->hiddenLabel()
                            ->relationship()
                            ->disabled()
                            ->dehydrated(false)
                            ->addable(false)
                            ->deletable(false)
                            ->reorderable(false)
                            ->columns(4)
                            ->schema([
                                TextInput::make('name')->columnSpan(2),
                                TextInput::make('qty'),
                                TextInput::make('total')->prefix('$'),
                            ]),
                        Placeholder::make('totals')
                            ->hiddenLabel()
                            ->content(fn (?Order $record) => $record
                                ? sprintf('Subtotal $%s · Shipping $%s · Total $%s', $record->subtotal, $record->shipping, $record->total)
                                : null),
                    ]),

                Section::make('Status')
                    ->columnSpan(1)
                    ->schema([
                        Select::make('status')
                            ->options(Order::STATUSES)
                            ->required()
                            ->native(false)
                            ->helperText('Cancelling returns the items to stock. A cancelled order cannot be reopened.')
                            ->disabled(fn (?Order $record) => $record?->getOriginal('status') === 'cancelled'),
                        Placeholder::make('number')
                            ->content(fn (?Order $record) => $record?->number),
                        Placeholder::make('payment')
                            ->content(fn (?Order $record) => $record?->paymentMethodLabel()),
                        Placeholder::make('created_at')
                            ->label('Placed')
                            ->content(fn (?Order $record) => $record?->created_at?->format('d.m.Y H:i')),
                    ]),

                Section::make('Customer')
                    ->columnSpanFull()
                    ->columns(3)
                    ->disabled()
                    ->dehydrated(false)
                    ->schema([
                        TextInput::make('first_name'),
                        TextInput::make('last_name'),
                        TextInput::make('email'),
                        TextInput::make('phone'),
                        TextInput::make('country'),
                        TextInput::make('city'),
                        TextInput::make('address')->columnSpan(2),
                        TextInput::make('postcode'),
                        Textarea::make('notes')->columnSpanFull(),
                    ]),
            ]);
    }
}
