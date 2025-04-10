<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                    Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(User::class, 'email', ignoreRecord: true), // Abaikan email user sendiri                

                    Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->dehydrated(fn($state) => !empty($state)) // Hanya simpan jika diisi
                    ->required(fn($context) => $context === 'create')
                    ->maxLength(255)
                    ->placeholder('******') // Agar tampil sebagai "******" saat edit
                    ->afterStateHydrated(fn ($state, callable $set) => $set('password', '')),
                
                    Forms\Components\TextInput::make('no_hp')
                    ->label('No. HP')
                    ->tel() // Format nomor telepon
                    ->maxLength(15),

                    Forms\Components\Textarea::make('alamat')
                    ->label('Alamat')
                    ->maxLength(500)
                    ->rows(3)
                    ->columnSpanFull(),

                Forms\Components\Select::make('role')
                    ->label('Kategori')
                    ->options([
                        'user' => 'User',
                        'employee' => 'Employee',
                        'admin' => 'Admin',
                    ])
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(), // Menambahkan pencarian pada nama

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(), // Menambahkan pencarian pada email

                Tables\Columns\TextColumn::make('role')
                    ->label('Peran')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'user' => 'info',
                        'employee' => 'success',
                        'admin' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('no_hp')
                    ->label('Nomor HP')
                    ->sortable()
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(50) // Batasi tampilan teks panjang
                    ->tooltip(fn ($record) => $record->alamat), // Tampilkan tooltip jika teks terlalu panjang
    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(), // Bisa diurutkan berdasarkan waktu
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->label('Filter Kategori')
                    ->options([
                        'user' => 'User',
                        'employee' => 'Employee',
                        'admin' => 'Admin',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
