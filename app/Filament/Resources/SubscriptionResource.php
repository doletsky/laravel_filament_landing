<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionResource\Pages;
use App\Models\Subscription;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class SubscriptionResource extends Resource
{
    protected static ?string $model = Subscription::class;

    protected static ?string $navigationLabel = 'Подписки';

    protected static ?string $modelLabel = 'Подписка';

    protected static ?string $pluralModelLabel = 'Подписки';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ip_address')
                    ->label('IP адрес')
                    ->maxLength(45)
                    ->disabled(),
                Forms\Components\Textarea::make('user_agent')
                    ->label('User Agent')
                    ->disabled(),
                Forms\Components\Select::make('status')
                    ->label('Статус')
                    ->options([
                        'active' => 'Активна',
                        'unsubscribed' => 'Отписана',
                    ])
                    ->default('active'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Статус')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'active' => 'success',
                        'unsubscribed' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата подписки')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Активна',
                        'unsubscribed' => 'Отписана',
                    ]),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscriptions::route('/'),
        ];
    }
}
