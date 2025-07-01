<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    use Translatable;

    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('General Informations')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns([
                                'sm' => 3,
                                'xl' => 6,
                                '2xl' => 8,
                            ])
                            ->schema([
                                Forms\Components\Section::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('website')
                                            ->nullable()
                                            ->url()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('github_url')
                                            ->nullable()
                                            ->url()
                                            ->maxLength(255),
                                    ])->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),
                                Forms\Components\RichEditor::make('description')
                                    ->required()
                                    ->maxLength(255)
                                    ->grow()
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),
                            ])
                    ])
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 3,
                        '2xl' => 4,
                    ]),

                Forms\Components\Section::make('Relations')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns([
                                'sm' => 3,
                                'xl' => 6,
                                '2xl' => 8,
                            ])
                            ->schema([
                                Forms\Components\Section::make()
                                    ->schema([
                                        Forms\Components\Select::make('technologies')
                                            ->required()
                                            ->multiple()
                                            ->preload()
                                            ->relationship(titleAttribute: 'name'),
                                        Forms\Components\Select::make('experiences')
                                            ->multiple()
                                            ->preload()
                                            ->relationship(titleAttribute: 'name'),
                                    ])
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),
                                SpatieMediaLibraryFileUpload::make('cover_images')
                                    ->collection('cover_images')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 4,
                                    ]),
                            ])
                    ])->columnSpan([
                        'sm' => 2,
                        'xl' => 3,
                        '2xl' => 4,
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->html()
                    ->limit()
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->url(fn (?string $state): string => $state ? $state : '')
                    ->searchable(),
                Tables\Columns\TextColumn::make('github_url')
                    ->url(fn (?string $state): string => $state ? $state : '')
                    ->searchable(),
                Tables\Columns\TextColumn::make('technologies.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('experiences.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
