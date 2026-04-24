<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LandingResource\Pages;
use App\Models\Landing;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class LandingResource extends Resource
{
    protected static ?string $model = Landing::class;

    protected static ?string $navigationLabel = 'Лендинг';

    protected static ?string $modelLabel = 'Элемент лендинга';

    protected static ?string $pluralModelLabel = 'Элементы лендинга';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Основная информация')
                    ->schema([
                        Forms\Components\Select::make('section_key')
                            ->label('Секция')
                            ->required()
                            ->options([
                                'hero' => 'Герой (главное изображение)',
                                'about' => 'О бренде',
                                'collection' => 'Коллекция',
                                'products' => 'Хиты продаж',
                                'lookbook' => 'Lookbook',
                                'features' => 'Преимущества',
                                'testimonials' => 'Отзывы',
                                'subscribe' => 'Подписка',
                                'contact' => 'Контакты',
                            ]),
                        Forms\Components\Select::make('content_type')
                            ->label('Тип контента')
                            ->required()
                            ->options([
                                'title' => 'Заголовок',
                                'subtitle' => 'Подзаголовок',
                                'description' => 'Описание',
                                'image' => 'Изображение',
                                'card' => 'Карточка товара',
                                'testimonial' => 'Отзыв',
                                'feature' => 'Преимущество',
                                'button_text' => 'Текст кнопки',
                                'contact_info' => 'Контактная информация',
                            ]),
                    ])
                    ->columns(2),

                Section::make('Контент')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Заголовок')
                            ->maxLength(500),
                        Forms\Components\Textarea::make('description')
                            ->label('Описание')
                            ->rows(4),
                        Forms\Components\TextInput::make('image_url')
                            ->label('URL изображения')
                            ->maxLength(1000),
                        Forms\Components\TextInput::make('price')
                            ->label('Цена (если товар)')
                            ->numeric()
                            ->minValue(0)
                            ->step(0.01),
                    ]),

                Section::make('Параметры')
                    ->schema([
                        Forms\Components\TextInput::make('order')
                            ->label('Порядок')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Активно')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section_key')
                    ->label('Секция')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('content_type')
                    ->label('Тип')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Заголовок')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активно')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Порядок')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('section_key')
                    ->options([
                        'hero' => 'Герой',
                        'about' => 'О бренде',
                        'collection' => 'Коллекция',
                        'products' => 'Хиты продаж',
                        'lookbook' => 'Lookbook',
                        'features' => 'Преимущества',
                        'testimonials' => 'Отзывы',
                        'subscribe' => 'Подписка',
                        'contact' => 'Контакты',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Активно'),
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
            ->defaultSort('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLandings::route('/'),
        ];
    }
}
