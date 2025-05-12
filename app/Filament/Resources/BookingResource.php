<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        // Generate time slots from 08:00 - 19:00
        $slots = [];
        for ($hour = 8; $hour < 19; $hour++) {
            $start = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00';
            $end = str_pad($hour + 1, 2, '0', STR_PAD_LEFT) . ':00';
            $label = "$start - $end";
            $slots[$hour] = $label;
        }

        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('employee_id')
                    ->relationship('employee', 'name')
                    ->required(),
                Forms\Components\DatePicker::make('booking_date')
                    ->required(),
                Forms\Components\CheckboxList::make('time_slots')
                    ->options($slots)
                    ->columns(2)
                    ->required(),
                Forms\Components\TextInput::make('category')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('employee.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('booking_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('time_slots')
                    ->label('Time Slots')
                    ->getStateUsing(function ($record) {
                        if (!is_array($record->time_slots)) {
                            return '';
                        }
                        
                        $formattedSlots = [];
                        foreach ($record->time_slots as $slot) {
                            $hour = (int) $slot;
                            $start = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00';
                            $end = str_pad($hour + 1, 2, '0', STR_PAD_LEFT) . ':00';
                            $formattedSlots[] = "$start - $end";
                        }
                        
                        return implode(', ', $formattedSlots);
                    }),
                Tables\Columns\TextColumn::make('category')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'primary' => 'confirmed', 
                        'success' => 'completed',
                        'danger' => 'cancelled',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}